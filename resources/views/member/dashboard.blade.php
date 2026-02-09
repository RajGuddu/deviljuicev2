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
                    Dashboard Overview
                </h4>

                <!-- Cards -->
                <div class="row g-4">

                    <div class="col-6 col-lg-3">
                        <div class="card h-100 border-0 shadow-sm text-center">
                            <div class="card-body">
                                <h6 class="text-dark mb-2">Placed Orders</h6>
                                <h4 class="fw-bold text-dark">{{ $ODplaced }}</h4>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3">
                        <div class="card h-100 border-0 shadow-sm text-center">
                            <div class="card-body">
                                <h6 class="text-dark mb-2">Shipped Orders</h6>
                                <h4 class="fw-bold text-dark">{{ $ODshipped }}</h4>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3">
                        <div class="card h-100 border-0 shadow-sm text-center">
                            <div class="card-body">
                                <h6 class="text-dark mb-2">Delivered Orders</h6>
                                <h4 class="fw-bold text-dark">{{ $ODdlvd }}</h4>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-lg-3">
                        <div class="card h-100 border-0 shadow-sm text-center">
                            <div class="card-body">
                                <h6 class="text-dark mb-2">Cancelled Orders</h6>
                                <h4 class="fw-bold text-dark">{{ $ODcanceled }}</h4>
                            </div>
                        </div>
                    </div>

                    

                </div>
                <!-- /row -->

            </div>
        </div>

    </div>
</div>

@endsection
