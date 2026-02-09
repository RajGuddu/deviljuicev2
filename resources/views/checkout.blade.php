@extends('_layouts.master')
@section('content')

<div class="container-fluid panel-space my-4">
  <div class="bg-white p-4 p-md-5 rounded shadow" style="color:#000; background-color:#fff;">

    <h2 class="mb-4 fw-bold" style="color:#000;">Checkout</h2>

    @if(Session::has('message'))
    {!! alertBS(session('message')['msg'], session('message')['type']) !!}
    @endif

    <div class="row g-4">

      <!-- Cart -->
      <div class="col-md-6">
        <h5 style="color:#000;">Your Cart</h5>

        @if(cart()->getTotalQuantity() === 0)
        <div class="text-danger my-4">Your cart is empty</div>
        @else
        <div class="table-responsive">
          <table class="table table-bordered align-middle" style="color:#000;">
            <thead style="background:#f8f9fa; color:#000;">
              <tr>
                <th>Image</th>
                <th>Product Name</th>
                <th width="80">Qty</th>
                <th width="100">Price</th>
                <th width="120">Subtotal</th>
                <th width="80">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach(cart()->getItems() as $item)
              <tr>
                <td>
                  <img src="{{ url(IMAGE_PATH.$item['attributes']['image']) }}"
                    style="width:70px;height:70px;object-fit:cover;border-radius:6px;">
                </td>
                <td><strong>{{ $item['name'] }}</strong></td>
                <!-- <td>{{ $item['quantity'] }}</td> -->
                <td>
                  <div class="d-flex align-items-center justify-content-center gap-1">
                    <button type="button" class="btn btn-sm btn-outline-dark"
                      onclick="updateQty('{{ $item['id'] }}', -1)">−</button>

                    <span class="px-2 fw-bold" id="qty-{{ $item['id'] }}">{{ $item['quantity'] }}</span>

                    <button type="button" class="btn btn-sm btn-outline-dark"
                      onclick="updateQty('{{ $item['id'] }}', 1)">+</button>
                  </div>
                </td>

                <td>${{ number_format($item['price'],2) }}</td>
                <td id="subtotal-{{ $item['id'] }}">${{ number_format($item->getPriceSum(),2) }}</td>
                <td class="text-center">
                  <a href="{{ url('remove-item/'.$item['id']) }}" class="btn btn-sm btn-dark"
                    onclick="return confirm('Remove this item?')">
                    Remove
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th colspan="4" class="text-end">Total</th>
                <th colspan="2" id="total">${{ number_format(cart()->getTotal(),2) }}</th>
              </tr>
            </tfoot>
          </table>
        </div>
        @endif

        <a href="{{ url('/our-vodka') }}" class="btn btn-dark mt-3">
          Continue Shopping
        </a>
      </div>

      <!-- Address -->
      <div class="col-md-6">
        <h5 style="color:#000;">Select Delivery Address</h5>

        <form action="{{ url('checkout') }}" method="post" class="mt-3">
          @csrf

          <div class="list-group mb-3">
            @if(isset($addresses) && $addresses->isNotEmpty())
            @foreach($addresses as $key => $addr)

            <label class="list-group-item d-flex justify-content-between align-items-center gap-2" style="color:#000;">
              <div class="d-flex align-items-center gap-2">
                <!-- Radio Button -->
                <input type="radio" name="address_option" value="{{ $addr->add_id }}" class="form-check-input mt-1" {{
                  $key==0 ? 'checked' : '' }}>

                <!-- Address Info -->
                <div>
                  <div class="fw-bold">
                    {{ $addr->name }} ({{ $addr->phone }})
                  </div>
                  <small>{{ $addr->address }}, {{ $addr->city }}, {{ $addr->state }}, {{ $addr->landmark }}, {{
                    $addr->zipcode }}</small>
                </div>
              </div>
              <a href="{{ url('/member-addresses/'.$addr->add_id) }}" class="btn btn-sm btn-outline-dark">Edit</a>
            </label>
            @endforeach
            @endif

            <label class="list-group-item d-flex gap-2" style="color:#000;">
              <input type="radio" name="address_option" value="new" class="form-check-input">
              <div>
                <div class="fw-bold">Use New Address</div>
                <small>Enter details below</small>
              </div>
            </label>
          </div>

          <!-- New Address -->
          <div class="row">
            <div class="col-md-12">
              <div class="mb-3">
                <label class="form-label">Full Name *</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                @error('name') <span class="text-danger"> {{ $message }} </span> @enderror
              </div>
            </div>
            <div class="col-md-12">
              <div class="mb-3">
                <label class="form-label">Address *</label>
                <textarea name="address" class="form-control" rows="3">{{ old('address') }}</textarea>
                @error('address') <span class="text-danger"> {{ $message }} </span> @enderror
              </div>
            </div>

            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Phone *</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                @error('phone') <span class="text-danger"> {{ $message }} </span> @enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="zipcode" class="form-label">Zip code</label>
                <input type="text" name="zipcode" id="zipcode" class="form-control" value="{{ old('zipcode') }}">
                @error('zipcode')<span class="text-danger">{{ $message }}</span>@enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <input type="text" name="city" id="city" class="form-control" value="{{ old('city') }}">
                @error('city')<span class="text-danger">{{ $message }}</span>@enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="state" class="form-label">State</label>
                <input type="text" name="state" id="state" class="form-control" value="{{ old('state') }}">
                @error('state')<span class="text-danger">{{ $message }}</span>@enderror
              </div>
            </div>

            <div class="col-md-12">
              <div class="mb-3">
                <label for="landmark" class="form-label">Landmark</label>
                <input type="text" name="landmark" id="landmark" class="form-control" value="{{ old('landmark') }}">
                @error('landmark')<span class="text-danger">{{ $message }}</span> @enderror
              </div>
            </div>
            <div class="col-md-12">
              <div class="mb-3">
                <label for="alt_phone" class="form-label">Alternate Phone</label>
                <input type="text" name="alt_phone" id="alt_phone" class="form-control" value="{{ old('alt_phone') }}">
                @error('alt_phone') <span class="text-danger">{{ $message }}</span> @enderror
              </div>
            </div>

          </div>

          <button type="submit" class="btn btn-dark w-100">
            Place Order (<span id="ord-btn-txt">${{ number_format(cart()->getTotal(),2) }}</span>)
          </button>
        </form>
      </div>

    </div>
  </div>
</div>

@endsection