@extends('_layouts.master')
@section('content')

<div class="container-fluid panel-space">
    <div class="row g-0 min-vh-100">

        <!-- Sidebar -->
        <div class="col-12 col-md-3 col-lg-2 bg-black text-white min-vh-100">
            @include('member.sidebar')
        </div>

        <!-- Main Content -->
        <div class="col-12 col-md-9 col-lg-10 bg-light p-4 text-dark">
            <div class="p-4">

                <!-- Heading -->
                <h4 class="fw-bold mb-4 text-uppercase">
                    My Orders
                </h4>
                <?php if(Session::has('message')){ 
                    echo alertBS(session('message')['msg'], session('message')['type']);
                } ?>

                @if($orders->isNotEmpty())
                  @php $sn = 1; @endphp
                    @foreach ($orders as $order)

                        @php 
                            $status = get_product_order_status($order->status);
                        @endphp

                        <div class="card mb-4 border-0 shadow-sm">

                            <!-- Order Header -->
                            <div class="card-header d-flex justify-content-between align-items-center bg-dark text-light">
                                <div>
                                    <strong>#{{ $sn++ }} Order ID:</strong> {{ $order->order_id }} <br>
                                    <small class="">
                                        Order Date: {{ date('M d, Y', strtotime($order->orderdate)) }}
                                    </small>
                                </div>
                                <div class="text-end d-flex align-items-center gap-2">
                                    @if($order->status == 1)
                                    <!-- Cancel Button -->
                                    <form action="{{ url()->current() }}" method="POST" onsubmit="return confirm('Are you sure you want to cancel this pre-order?');">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $order->id }}">
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            Cancel
                                        </button>
                                    </form>
                                    @endif
                                    {!! $status !!}
                                    <div class="fw-bold mt-1">
                                        ${{ $order->net_total }}
                                    </div>
                                </div>
                            </div>

                            <!-- Order Body -->
                            <div class="card-body px-5">
                                @php 
                                    $products = json_decode($order->product_details);
                                @endphp

                                @if(!empty($products))
                                    @foreach ($products as $product)
                                        <div class="row align-items-center mb-3 border-bottom pb-3">
                                            <div class="col-3 col-md-2">
                                                <img 
                                                    src="{{ url(IMAGE_PATH.$product->attributes->image) }}" 
                                                    class="img-fluid rounded" 
                                                    style="max-width:60px;"
                                                    alt="{{ $product->name }}">
                                            </div>
                                            <div class="col-6 col-md-7">
                                                <h6 class="mb-1">{{ $product->name }}</h6>
                                                <small class="d-block">
                                                    Rate: ${{ $product->price }} | Qty: {{ $product->quantity }}
                                                </small>
                                            </div>
                                            <div class="col-3 text-end fw-bold">
                                                ${{ $product->subtotal }}
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>

                        </div>
                    @endforeach
                @else
                    <p class="text-danger text-center fw-semibold">
                        No Orders Found!
                    </p>
                @endif

            </div>
        </div>

    </div>
</div>

@endsection
