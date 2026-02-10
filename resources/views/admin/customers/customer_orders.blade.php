@extends('admin._layout.master')

@section('content')
@php use App\Models\Common_model;
    $commonmodel = new Common_model;
@endphp
<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-fluid">

        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0">Customer Orders</h1>
                <p class="text-muted">Orders placed by <strong>{{ $customer->name }}</strong></p>
            </div>
            <div class="col-auto">
                <a class="btn app-btn-secondary" href="{{ url('admin/customers') }}">← Back to Customers</a>
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
                    $status = '<span class="badge bg-primary">Order Placed</span>';
                    if($order->status == 2)
                        $status = '<span class="badge bg-warning text-dark">Shipped</span>';
                    elseif($order->status == 3)
                        $status = '<span class="badge bg-success">Delivered</span>';
                    elseif($order->status == 4)
                        $status = '<span class="badge bg-danger">Cancelled</span>';
                    
                @endphp

                <div class="app-card shadow-sm mb-4">
                    <div class="app-card-header p-3 d-flex justify-content-between align-items-center" style="background:#222222; color:white">
                        <div class="">
                            <strong>#{{ $sn++; }} Order ID:</strong> {{ $order->order_id }} <br>
                            <small class="text-muted">Order Date: {{ date('M d, Y', strtotime($order->orderdate)) }}</small>
                        </div>
                        <div class="text-end">
                            {!! $status !!}
                            <div class="fw-bold mt-1">${{ $order->net_total }}</div>
                        </div>
                    </div>

                    {{-- Address Section --}}
                    @php $address = $commonmodel->crudOperation('R1','tbl_member_address','',['add_id'=>$order->add_id]); @endphp
                    <div class="app-card-body p-3 border-bottom" style="background:#fafafa;">
                        <h6 class="fw-bold mb-2 text-secondary">Shipping Details:  {{ $address->name ?? '' }} {{ $address->last_name ?? '' }}</h6>
                        <div class="row">
                            <div class="col-md-4">
                                <p class="mb-1"><strong>Email: {{ $address->email ?? '' }}</strong> </p>
                            </div>
                            <div class="col-md-4">
                                <p class="mb-1"><strong>Address:</strong> {{ $address->address ?? '' }}</p>
                            </div>
                            <div class="col-md-4">
                                <p class="mb-1"><strong>Phone:</strong> {{ $address->code.' '.$address->phone }}, {{ $address->alt_phone != ''?$address->alt_code.' '.$address->alt_phone:'' }}</p>
                            </div>
                            
                            <div class="col-md-4">
                                <p class="mb-1"><strong>Zip Code:</strong> {{ $address->zipcode ?? '' }}</p>
                            </div>
                            <div class="col-md-4">
                                <p class="mb-1"><strong>City/State:</strong> {{ $address->city ?? '' }}, {{ $address->state ?? '' }}</p>
                            </div>
                            <div class="col-md-4">
                                <p class="mb-1"><strong>Landmark:</strong> {{ $address->landmark ?? '' }}</p>
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
            <p class="text-danger text-center">No Orders Found for this Customer!</p>
        @endif

    </div><!--//container-fluid-->
</div><!--//app-content-->
@endsection
