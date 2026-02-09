@extends('_layouts.master')
@section('content')

    {{-- Banner Section --}}
    <div class="vodka-banner panel-space">
        <div class="container-fluid text-center">
            <h1 class="banner-title text-center w-100 mt-5">Pay with Card</h1>
        </div>
    </div>

    <div class="bg-black container-fluid">
        <div class="devider bg-black mb-md-0 mb-4"></div>
    </div>

    {{-- Card Payment Section --}}
    <section class="payment-section py-5 bg-black text-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">

                    <h3 class="text-center mb-4">Pay with Card</h3>

                    <form id="card-form" class="bg-dark p-4 rounded">

                        <div class="mb-3">
                            <label class="form-label">Card Holder Name</label>
                            <input type="text" id="card-holder-name" class="form-control" placeholder="John Doe" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Card Number</label>
                            <div id="card-number" class="form-control bg-white"></div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Expiry Date</label>
                                <div id="expiration-date" class="form-control bg-white"></div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">CVV</label>
                                <div id="cvv" class="form-control bg-white"></div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-light w-100 mt-3">
                            Pay Now
                        </button>

                    </form>

                </div>
            </div>
        </div>
    </section>

    @php
    $clientId = config('paypal.mode') === 'sandbox' 
                ? config('paypal.sandbox.client_id') 
                : config('paypal.live.client_id');
    @endphp

<script src="https://www.paypal.com/sdk/js?client-id={{ $clientId }}&components=hosted-fields&currency=USD&intent=capture"></script>


<!-- <script src="https://www.paypal.com/sdk/js?client-id=SANDBOX_CLIENT_ID&components=hosted-fields&currency=USD"></script> -->
<script>
paypal.HostedFields.render({

    createOrder: function () {
        return fetch("{{ url('paypal-create-order') }}", {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(res => res.json())
        .then(data => data.order_id);
    },

    styles: {
        'input': {
            'font-size': '16px',
            'color': '#000'
        }
    },

    fields: {
        number: {
            selector: '#card-number',
            placeholder: '4111 1111 1111 1111'
        },
        expirationDate: {
            selector: '#expiration-date',
            placeholder: 'MM/YY'
        },
        cvv: {
            selector: '#cvv',
            placeholder: '123'
        }
    }

}).then(function (hf) {

    document.getElementById('card-form').addEventListener('submit', function (e) {
        e.preventDefault();

        hf.submit({
            cardholderName: document.getElementById('card-holder-name').value
        }).then(function () {

            fetch("{{ url('paypal-capture-order') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }).then(() => {
                alert('Payment Successful');
            });

        }).catch(function (err) {
            alert(err.message);
        });
    });

});
</script>




@endsection
