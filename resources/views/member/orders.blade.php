@extends('_layouts.master')
@section('content')

<div class="container-fluid panel-space">
    <div class="row g-0 min-vh-100">

        <!-- Sidebar -->
        <div class="col-12 col-md-3 col-lg-2 bg-black text-white">
            @include('member.sidebar')
        </div>

        <!-- Main Content -->
        <div class="col-12 col-md-9 col-lg-10 bg-light p-4 text-dark">
            <div class="p-0 p-md-4">

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
                            <div class="card-header d-flex justify-content-between align-items-center bg-dark text-light order-detail">
                                <div>
                                    <strong>#{{ $sn++ }} Order ID:</strong> {{ $order->order_id }} <br>
                                    <small class="">
                                        Order Date: {{ date('M d, Y', strtotime($order->orderdate)) }}
                                    </small>
                                </div>
                                <div class="text-end d-flex flex-column align-items-end gap-2">
                                    
                                    {!! $status !!}
                                    <div class="fw-bold">
                                        ${{ $order->net_total }}
                                    </div>
                                    @if($order->status == 1)
                                    <!-- Cancel Button -->
                                    <?php /* <form action="{{ url()->current() }}" method="POST" onsubmit="return confirm('Are you sure you want to cancel this pre-order?');">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $order->id }}">
                                        <button type="submit" class="badge bg-danger border-0 p-2">
                                            Cancel Pre-Order
                                        </button>
                                    </form> */ ?>
                                    <button 
                                        type="button" 
                                        class="badge bg-danger border-0 p-2"
                                        data-bs-toggle="modal" 
                                        data-bs-target="#cancelModal"
                                        data-order-id="{{ $order->id }}">
                                        Cancel Pre-Order
                                    </button>
                                    @endif
                                    @if($order->status == 6)
                                    <button 
                                        type="button"
                                        class="badge bg-info border-0 p-2"
                                        data-bs-toggle="modal"
                                        data-bs-target="#reasonModal"
                                        data-reason="{{ $order->cancel_reason }}">
                                        View Cancel Reason
                                    </button>
                                    @endif
                                </div>
                            </div>

                            <!-- Order Body -->
                            <div class="card-body px-2 px-md-5">
                                @php 
                                    $products = json_decode($order->product_details);
                                @endphp

                                @if(!empty($products))
                                    @foreach ($products as $product)
                                        <div class="row align-items-center {{ !$loop->last ? 'mb-3 border-bottom pb-3' : '' }}">
                                            <div class="col-md-2 mb-2 mb-md-0">
                                                <img 
                                                    src="{{ url(IMAGE_PATH.$product->attributes->image) }}" 
                                                    class="img-fluid rounded" 
                                                    style="max-width:60px;"
                                                    alt="{{ $product->name }}">
                                            </div>
                                            <div class="col-7 col-md-7">
                                                <h6 class="mb-1">{{ $product->name }}</h6>
                                                <small class="d-block">
                                                    Rate: ${{ $product->price }} | Qty: {{ $product->quantity }}
                                                </small>
                                            </div>
                                            <div class="col-5 col-md-3 text-end fw-bold">
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

<!-- Cancel Modal -->
<div class="modal fade" id="cancelModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title ">Cancel Pre-Order</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>

      <form action="{{ url()->current() }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="" id="cancel_order_id">

        <div class="modal-body">
          <p class="text-dark">Are you sure you want to cancel this pre-order?</p>

          <div class="mb-3">
            <label class="form-label">Reason for Cancellation</label>
            <textarea 
                name="cancel_reason" 
                class="form-control" 
                rows="4" 
                required 
                placeholder="Please enter cancellation reason..."></textarea>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            Close
          </button>
          <button type="submit" class="btn btn-danger">
            Confirm Cancel
          </button>
        </div>
      </form>

    </div>
  </div>
</div>

<!-- Cancel Reason Modal -->
<div class="modal fade" id="reasonModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header bg-dark text-white">
        <h5 class="modal-title">Cancellation Reason</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
        <p id="cancel_reason_text" style="white-space: pre-wrap; 
                    background:#f8f9fa; 
                    padding:10px; 
                    border-radius:6px; 
                    color:#000;">
        </p>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          Close
        </button>
      </div>

    </div>
  </div>
</div>




@endsection
