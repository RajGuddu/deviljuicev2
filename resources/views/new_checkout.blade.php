@extends('_layouts.master')
@section('content')

<?php /* 
$clientId = config('paypal.mode') === 'sandbox' 
            ? config('paypal.sandbox.client_id') 
            : config('paypal.live.client_id');


<script src="https://www.paypal.com/sdk/js?client-id={{ $clientId }}&currency={{ PAYPAL_CURRENCY }}"></script>*/ ?>

<!-- <div class="vodka-banner panel-space">
    <div class="container">
        <h1 class="h2-heading  w-100 mt-5">Checkout</h1>

    </div>
</div> -->

<section class="shipping-address-wrappe panel-space vodka-banner mt-5 cart-page overflow-hidden">
    <div class="container">
        <div class="row g-5">
            <div class="col-md-7">
                <form action="{{ url('save-address') }}" method="post"  class="shipping-form bg-white p-4">
                    @csrf
                    <h3 class="mb-3 text-black weight-600">Shipping Address</h3>
                    @if(Session::has('message'))
                        {!! alertBS(session('message')['msg'], session('message')['type']) !!}
                    @endif
                    @php $new_checked = 'checked'; @endphp
                    @if(isset($addresses) && $addresses->isNotEmpty())
                    @php $new_checked = ''; @endphp
                    @foreach($addresses as $key => $addr)
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div class="form-check mb-2">
                            <input class="form-check-input text-black" type="radio" name="address_option" value="{{ $addr->add_id }}" id="address_option{{ $key }}" {{ $key==0 ? 'checked' : '' }}>
                            <label class="form-check-label text-black weight-500" for="address_option{{ $key }}">
                                <div class="fw-bold">
                                    {{ $addr->name }} {{ $addr->last_name }} ({{ $addr->email.', '.$addr->code.' '.$addr->phone }})
                                </div>
                                <div class=""><small>{{ $addr->address }}, {{ $addr->city }}, {{ $addr->state }}, {{ $addr->zipcode }}</small></div>
                                <small>{{ $addr->landmark }}, {{ ($addr->alt_phone != '')?$addr->alt_code.', '.$addr->alt_phone:'' }}</small>
                            </label>
                        </div>
                        <a href="{{ url('/member-addresses/'.$addr->add_id) }}" class="btn btn-sm btn-outline-dark">Edit</a>
                    </div>
                    @endforeach
                    @endif
                    <div class="form-check mb-3">
                        <input class="form-check-input text-black" type="radio" name="address_option" value="new" id="address_option_new" {{ old('address_option') == 'new' ? 'checked' : $new_checked }}>
                        <label class="form-check-label text-black weight-500" for="address_option_new">
                            Use New Address
                        </label>
                    </div>

                    <!-- First & Last Name -->
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label">First name</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter your first name">
                            @error('name') <span class="text-danger"> {{ $message }} </span> @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Last name</label>
                            <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control"  placeholder="Enter your last name">
                            @error('last_name') <span class="text-danger"> {{ $message }} </span> @enderror
                        </div>
                    </div>

                    <!-- Email & Phone -->
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label">E-mail address</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Enter your email address">
                            @error('email') <span class="text-danger"> {{ $message }} </span> @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Phone number</label>
                            <div class="input-group">
                                <select name="code" class="form-select weight-500" style="max-width:80px">
                                    <option value="+1" {{ old('code') == '+1' ? 'selected' : '' }}>US</option>
                                    <option value="+44" {{ old('code') == '+44' ? 'selected' : '' }}>UK</option>
                                    <option value="+1" {{ old('code') == '+1' ? 'selected' : '' }}>CA</option>
                                    <option value="+91" {{ old('code') == '+91' ? 'selected' : '' }}>IN</option>
                                </select>
                                <input type="tel" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="Enter your phone number">
                            </div>
                            @error('code') <span class="text-danger"> {{ $message }} </span> @enderror
                            @error('phone') <span class="text-danger"> {{ $message }} </span> @enderror
                        </div>
                    </div>

                    <!-- City State Zip -->
                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <label class="form-label">City</label>
                            <input type="text" name="city" value="{{ old('city') }}" class="form-control" placeholder="Enter your city">
                            @error('city') <span class="text-danger"> {{ $message }} </span> @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">State</label>
                            <input type="text" name="state" value="{{ old('state') }}" class="form-control" placeholder="Enter your state">
                            @error('state') <span class="text-danger"> {{ $message }} </span> @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Zip code</label>
                            <input type="text" name="zipcode" value="{{ old('zipcode') }}" class="form-control" placeholder="Enter your zip code">
                            @error('zipcode') <span class="text-danger"> {{ $message }} </span> @enderror
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <textarea class="form-control" rows="3" name="address"
                            placeholder="House number, street name, apartment, etc.">{{ old('address') }}</textarea>
                        @error('address') <span class="text-danger"> {{ $message }} </span> @enderror
                    </div>

                    <!-- Landmark & Alternate Phone -->
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Landmark (optional)</label>
                            <input type="text" name="landmark" value="{{ old('landmark') }}" class="form-control" placeholder="Nearby landmark">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Alternate Phone (optional)</label>
                            <div class="input-group">
                                <select name="alt_code" class="form-select weight-500" style="max-width:80px">
                                    <option value="+1" {{ old('alt_code') == '+1' ? 'selected' : '' }}>US</option>
                                    <option value="+44" {{ old('alt_code') == '+44' ? 'selected' : '' }}>UK</option>
                                    <option value="+1" {{ old('alt_code') == '+1' ? 'selected' : '' }}>CA</option>
                                    <option value="+91" {{ old('alt_code') == '+91' ? 'selected' : '' }}>IN</option>
                                </select>
                                <input type="tel" name="alt_phone" value="{{ old('alt_phone') }}" class="form-control" placeholder="Enter an alternate phone number">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 text-end">
                        <button type="submit" class="btn btn-submit save-address me-3">Save Address</button>
                        <button type="reset" class="btn btn-directions reset-button py-3">Reset</button>
                    </div>

                </form>


            </div>
            <div class="col-md-5">
                <div class="cart-wrapper">
                    <div class="cart-box">

                        <h4 class="cart-title">Your Cart</h4>
                        <p class="secure-text mt-3 add-car-payment mb-0">
                            Secure checkout. Your information is encrypted. 
                            <img src="{{ IMAGE_PATH .'visa-card.png' }}" alt="">
                        </p>

                        <!-- Cart Item -->
                        @if(cart()->getTotalQuantity() === 0)
                            <div class="text-danger my-4">Your cart is empty</div>
                        @else
                        @foreach(cart()->getItems() as $item)
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
                        @endif

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
                        <div class="summary-row">
                            <span>Subtotal</span>
                            <span class="weight-600" id="subtotal">${{ number_format(cart()->getTotal(),2) }}</span>
                        </div>
                        <div class="summary-row">
                            <span>Shipping</span>
                            <span class="weight-600">0.00</span>
                        </div>
                        <div class="summary-row total">
                            <span>Total</span>
                            <span id="total">${{ number_format(cart()->getTotal(),2) }}</span>
                        </div>

                        <button id="preorder-btn" class="custom-btn w-100 mt-2">
                            Pre-order
                        </button>
                        <!-- <div id="paypal-button"></div> -->
                        

                    </div>

                    <!-- <div id="paypal-button"></div> -->
                </div>
            </div>
        </div>
    </div>
</section>
<?php /* 
<script>
    function renderPayPalButton() {
        // 1. Fetch amount and order_id from controller
        document.getElementById('paypal-button').innerHTML = '';

        fetch("{{ url('get-cart-amount') }}", {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(res => res.json())
        .then(data => {
            //document.getElementById('amount').value = data.amount;
            //document.getElementById('order_id').value = data.order_id;

            // 2. Render PayPal button dynamically
            paypal.Buttons({
                fundingSource: paypal.FUNDING.CARD,

                onClick: function(data, actions) {
                    const selectedAddress = document.querySelector('input[name="address_option"]:checked')?.value;
                    if (selectedAddress === 'new') {
                        alert('Please save your address before proceeding with payment.');
                        return actions.reject(); // Prevent PayPal form from opening
                    }
                    // Check cart count
                    const cartCount = parseInt(document.getElementById('cart-count')?.innerText || '0');
                    if (cartCount <= 0) {
                        alert('Your cart is empty. Please add items before proceeding.');
                        return actions.reject();
                    }
                    $('#ajax-loader').show();
                },
                

                createOrder: function(data2, actions) {
                    
                    const amount = data.amount;
                    // const orderId = data.order_id;
                    const selectedAddress = document.querySelector('input[name="address_option"]:checked')?.value;

                    return actions.order.create({
                        purchase_units: [{
                            reference_id: selectedAddress,
                            amount: { value: data.amount.toString() }
                        }]
                    }).then(amount => {
                        // Form is about to show → hide loader
                        $('#ajax-loader').hide();
                        return amount;
                    });
                    
                },


                onApprove: function (data2, actions) {
                    return actions.order.capture().then(function (details) {
                        console.log('Payment response:', details);

                        // Capture ke baad loader + scroll
                        window.scrollTo({ top: 0, behavior: 'smooth' });
                        $('#ajax-loader').show();

                        // Server ko data bhejo
                        return fetch("{{ url('checkout') }}", {
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
        });
    }
    renderPayPalButton();
</script> */ ?>
@endsection