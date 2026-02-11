@extends('admin._layout.master')

@section('content')
<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-fluid">

        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0">{{ $pageTitle }}</h1>
                <p class="text-muted">View all customer orders with details</p>
            </div>
        </div><!--//row-->

        {{-- Flash Message --}}
        @if(Session::has('message'))
            {!! alertBS(session('message')['msg'], session('message')['type']) !!}
        @endif

        @if($orders->isNotEmpty())
            @php $sn = 1; @endphp
            @foreach($orders as $order)
                @php 
                    $status = get_product_order_status($order->status);
                @endphp

                <div class="app-card shadow-sm mb-4">
                    {{-- Header --}}
                    <div class="app-card-header p-3 d-flex justify-content-between align-items-center" style="background:#222222; color:white">
                        <div>
                            <strong>#{{ $sn++; }} Order ID:</strong> {{ $order->order_id }} <br>
                            <small class="text-muted">Order Date: {{ date('M d, Y', strtotime($order->orderdate)) }}</small>
                        </div>
                        <div class="text-end">
                            {!! $status !!}
                            <div class="fw-bold mt-1">${{ $order->net_total }}</div>
                            <!-- Change Status Button -->
                            <button type="button" 
                                    class="btn btn-sm btn-link p-0 text-primary ms-1" 
                                    onclick="changeStatus({{ $order->id }})">
                                Change Status
                            </button>
                        </div>
                    </div>

                    {{-- Customer Details --}}
                    <div class="app-card-body p-3 border-bottom" style="background:#fafafa;">
                        <h6 class="fw-bold mb-2 text-secondary">Customer Details: {{ $order->name }} {{ $order->last_name }}</h6>
                        <div class="row">
                            <div class="col-md-4">
                                <p class="mb-1"><strong>Email:</strong> {{ $order->email }}</p>
                            </div>
                            <div class="col-md-4">
                                <p class="mb-1"><strong>Address:</strong> {{ $order->address }}</p>
                            </div>
                            <div class="col-md-4">
                                <p class="mb-1"><strong>Phone:</strong> {{ $order->code.' '.$order->phone }}, {{ ($order->alt_phone != '')?$order->alt_code.' '.$order->alt_phone:'' }}</p>
                            </div>

                            <div class="col-md-4">
                                <p class="mb-1"><strong>Zip Code:</strong> {{ $order->zipcode ?? '' }}</p>
                            </div>
                            <div class="col-md-4">
                                <p class="mb-1"><strong>City/State:</strong> {{ $order->city ?? '' }}, {{ $order->state ?? '' }}</p>
                            </div>
                            <div class="col-md-4">
                                <p class="mb-1"><strong>Landmark:</strong> {{ $order->landmark ?? '' }}</p>
                            </div>
                            
                        </div>
                    </div>

                    {{-- Products Table --}}
                    <div class="app-card-body p-3">
                        @php 
                            $products = json_decode($order->product_details);
                        @endphp

                        @if(!empty($products))
                            <div class="table-responsive px-3 px-md-4">
                                <table class="table app-table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Rate</th>
                                            <th>Qty</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $product)
                                            <tr>
                                                <td>
                                                    <img src="{{ url(IMAGE_PATH.$product->attributes->image) }}" 
                                                         alt="{{ $product->name }}" 
                                                         class="img-fluid rounded" 
                                                         style="width:60px; height:60px;">
                                                </td>
                                                <td>{{ $product->name }}</td>
                                                <td>${{ $product->price }}</td>
                                                <td>{{ $product->quantity }}</td>
                                                <td class="fw-bold">${{ $product->subtotal }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-danger text-center">No Orders Found!</p>
        @endif

    </div><!--//container-fluid-->
</div><!--//app-content-->

<!-- Change Status Modal -->
<div class="modal fade" id="changeStatusModal" tabindex="-1" aria-labelledby="changeStatusLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title" id="changeStatusLabel">Change Order Status</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="{{ url('admin/change_order_status') }}" method="POST">
        @csrf
        <input type="hidden" id="orderid" name="orderid" value="">
        <div class="modal-body">
          <div class="mb-3">
            <label for="statusSelect" class="form-label">Select New Status</label>
            <select class="form-select" id="statusSelect" name="status" required>
              <option value="">-- Choose Status --</option>
              <option value="2">Payment Requested</option>
              <option value="4">Shipped</option>
              <option value="5">Delivered(Completed)</option>
              <option value="6">Pre-Order Cancelled</option>
            </select>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>

    </div>
  </div>
</div>

<script>
    function changeStatus(id){
        $("#orderid").val(id);
        $("#changeStatusModal").modal('show');
    }
</script>

@endsection
