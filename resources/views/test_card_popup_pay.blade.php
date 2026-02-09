@extends('_layouts.master')
@section('content')

    <div class="container-fluid panel-space my-4">
        <div class="bg-white p-4 p-md-5 rounded shadow" style="color:#000; background-color:#fff;">

            <h2 class="mb-4 fw-bold" style="color:#000;">Checkout</h2>

            <div class="row g-4">

                <!-- Cart -->
                 <?php echo '<pre>'; print_r($intent); echo '</pre>';?>
                <div class="col-md-6">
                    <div class="mb-2">
                        <label for="" class="form-label">Enter Amount</label>
                        <input type="text" name="amount" id="amount" class="form-control" onchange="update_paypal()">
                    </div>

                    <h5 style="color:#000;">Your Cart Payment</h5>
                    <div id="paypal-button"></div>

                </div>
            </div>
        </div>
    </div>

    <input type="hidden" name="add_id" value="1">

    @php
    $clientId = config('paypal.mode') === 'sandbox' 
                ? config('paypal.sandbox.client_id') 
                : config('paypal.live.client_id');
    @endphp

    <script src="https://www.paypal.com/sdk/js?client-id={{ $clientId }}&currency=USD"></script>

    <script>
        function update_paypal(){
            let inputVal = parseFloat(document.getElementById('amount').value);
            if (isNaN(inputVal) || inputVal <= 0) {
                alert('Please enter a valid amount');
                document.getElementById('amount').value = 0;
                return;
            }
            fetch("{{ url('/api/set_cart') }}",{
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                body: JSON.stringify({amount: inputVal})
            })
            .then(res => res.json())
            .then(data => {
                console.log(data);
                renderPayPalButton();
            })
        }

        function renderPayPalButton() {
            // 1. Fetch amount and order_id from controller
            document.getElementById('paypal-button').innerHTML = '';

            fetch("{{ url('/api/get-order') }}")
            .then(res => res.json())
            .then(data => {
                //document.getElementById('amount').value = data.amount;
                //document.getElementById('order_id').value = data.order_id;

                // 2. Render PayPal button dynamically
                paypal.Buttons({
                    fundingSource: paypal.FUNDING.CARD,

                    onClick: function() {
                        const addId = document.querySelector('input[name="add_id"]').value;
                        if (addId === 'new') {
                            // Stop payment
                            alert('Please save your address before proceeding with payment.');
                            return actions.reject(); // Prevent PayPal form from opening
                        }
                        $('#ajax-loader').show();
                    },
                    

                    createOrder: function(data2, actions) {
                        
                        const amount = data.amount;
                        const orderId = data.order_id;

                        return actions.order.create({
                            purchase_units: [{
                                reference_id: orderId, // optional, your order_id
                                amount: { value: data.amount.toString() }
                            }]
                        }).then(orderId => {
                            // Form is about to show → hide loader
                            $('#ajax-loader').hide();
                            return orderId;
                        });
                        
                    },


                    onApprove: function(data2, actions) {
                        return actions.order.capture().then(function(details) {
                            console.log('Payment response:', details);

                            // 3. Send response to server to save
                            fetch("{{ url('/api/save-payment') }}", {
                                method: 'POST',
                                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                                body: JSON.stringify(details)
                            }).then(res => res.json())
                            .then(resp => console.log(resp));

                            alert('Payment completed successfully!');
                        }).finally(() => {
                            // Loader hide after payment is processed
                            $('#ajax-loader').hide();
                        });
                    }
                }).render('#paypal-button');
            });
        }
        renderPayPalButton();
    </script>

    <?php /*<script>
        paypal.Buttons({
        fundingSource: paypal.FUNDING.CARD,
        createOrder: function (data, actions) {
            return actions.order.create({
            purchase_units: [{
                amount: { value: '10.00' }
            }]
            });
        },
        onApprove: function (data, actions) {
            return actions.order.capture().then(function (details) {
            alert('Payment Success');
            });
        }
        }).render('#paypal-button');
    </script> */ ?>


@endsection