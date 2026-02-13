@extends('_layouts.master')
@section('content')

@php
$clientId = config('paypal.mode') === 'sandbox' 
            ? config('paypal.sandbox.client_id') 
            : config('paypal.live.client_id');
@endphp

<script src="https://www.paypal.com/sdk/js?client-id={{ $clientId }}&currency={{ PAYPAL_CURRENCY }}"></script>

<!-- <div class="vodka-banner panel-space">
    <div class="container">
        <h1 class="h2-heading  w-100 mt-5">Checkout</h1>

    </div>
</div> -->

<section class="shipping-address-wrappe panel-space vodka-banner mt-5 cart-page overflow-hidden">
    <div class="container">
        <div class="row g-5">
            
            <div class="offset-md-3 col-md-6">
                <div class="cart-wrapper">
                    <div class="cart-box">

                        <h4 class="cart-title">Pre-Order Payment</h4>
                        <p class="secure-text mt-3 add-car-payment mb-0">
                            Secure Pre-Order Payment. Your information is encrypted. 
                            <img src="{{ url(IMAGE_PATH .'visa-card.png') }}" alt="">
                        </p>
                        <!-- Cart Item -->
                        @if(!isset($order) && empty($order))
                            <div class="text-danger my-4">Token Expired!</div>
                            <button class="custom-btn w-100 mt-2" onclick="window.location.href='{{ url('/') }}'">
                                Back
                            </button>
                        @else
                        <div class="order-detail">
                            <p>Order Id: {{ $order->order_id ?? '' }}</p>
                            <p>Customer Name: {{ ucwords($customer->name ?? '') }}</p>
                            <p>Email: {{ $customer->email ?? '' }}</p>
                        </div>
                        <?php /* @foreach(cart()->getItems() as $item)
                        <div class="cart-item d-flex mt-3">
                            <img src="{{ url(IMAGE_PATH.$item['attributes']['image']) }}"
                                class="cart-img" alt="{{ $item['name'] }}">

                            <div class="cart-info flex-grow-1 ms-3">
                                <p class="cart-name">{{ $item['name'] }}</p>
                                <div class="quantity-selector qty-wrapper">
                                    <button type="button" class="qty-btn "
                                        onclick="updateQty('{{ $item['id'] }}', -1)">−</button>

                                    <span class="qty qty-value text-white" id="qty-{{ $item['id'] }}">{{ $item['quantity'] }}</span>

                                    <button type="button" class="qty-btn "
                                        onclick="updateQty('{{ $item['id'] }}', 1)">+</button>
                                </div>
                            </div>
                            <!-- <div class="cart-price">${{ number_format($item['price'],2) }}</div> -->
                             <div class="d-flex flex-column align-items-end">
                                <div class="cart-price mb-2">${{ number_format($item['price'],2) }}</div>
                                <a href="{{ url('remove-item/'.$item['id']) }}" class="btn btn-sm btn-outline-light mt-2" onclick="return confirm('Remove this item?')">
                                    Remove
                                </a>
                            </div>
                                
                        </div>
                        @endforeach
                        @endif */ ?>

                        <?php /* <div class="cart-item d-flex">
                            <img src="https://wps-dev.com/dev/deviljuice/public/assets/uploads/images/proImage1-nJ4Q8aAJ.webp"
                                class="cart-img" alt="">
                            <div class="cart-info flex-grow-1 ms-3">
                                <p class="cart-name">Devil’s Juice Vodka</p>
                                <div class="quantity-selector qty-wrapper">
                                    <button type="button" class="qty-btn decrement"
                                        onclick="updateQty('4', -1)">−</button>

                                    <span class="qty qty-value text-white" id="qty-4">1</span>

                                    <button type="button" class="qty-btn increment"
                                        onclick="updateQty('4', 1)">+</button>
                                </div>
                            </div>
                            <div class="cart-price">$49.99</div>
                        </div> */ ?>

                        <hr class="cart-divider">

                        <!-- Summary -->
                        <?php /* <div class="summary-row">
                            <span>Subtotal</span>
                            <span class="weight-600" id="subtotal">${{ number_format($order->getTotal(),2) }}</span>
                        </div>
                        <div class="summary-row">
                            <span>Shipping</span>
                            <span class="weight-600">0.00</span>
                        </div> */ ?>
                        <div class="summary-row total">
                            <span>Amount</span>
                            <span id="total">${{ number_format($order->net_total,2) }}</span>
                        </div>

                        <!-- <button id="preorder-btn" class="custom-btn w-100 mt-2">
                            Pre-order
                        </button> -->
                        <!-- <div id="paypal-button"></div> -->
                        

                    </div>

                    <div id="paypal-button"></div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@if(isset($order) && !empty($order))
<script>
function renderPayPalButton() {

    document.getElementById('paypal-button').innerHTML = '';

    // Fixed amount from backend
    const amount = "{{ $order->net_total }}";
    const refrence_id = "{{ $order->id }}";

    paypal.Buttons({
        fundingSource: paypal.FUNDING.CARD,

        // ✅ Only loader
        onClick: function (data, actions) {
            $('#ajax-loader').show();
        },

        createOrder: function (data, actions) {

            return actions.order.create({
                purchase_units: [{
                    reference_id: refrence_id,
                    amount: { value: parseFloat(amount).toFixed(2) }
                }]
            }).then(function(orderId) {
                $('#ajax-loader').hide(); // hide loader when PayPal popup opens
                return orderId;
            });
        },

        onApprove: function (data, actions) {
            return actions.order.capture().then(function (details) {

                window.scrollTo({ top: 0, behavior: 'smooth' });
                $('#ajax-loader').show();

                return fetch("{{ url('/api/save-payment') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify(details)
                });
            })
            .then(res => res.json())
            .then(resp => {
                if (resp.status === 'success') {
                    window.location.href = "{{ url('payment-success') }}";
                } else {
                    $('#ajax-loader').hide();
                    alert('Payment failed. Please try again.');
                }
            })
            .catch(err => {
                $('#ajax-loader').hide();
                console.error(err);
                alert('Something went wrong. Please try again.');
            });
        }

    }).render('#paypal-button');
}

renderPayPalButton();

</script>
@endif

@endsection