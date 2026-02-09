@extends('_layouts.master')
@section('content')
<!-- banner panel -->

<section class="creation py-lg-5 py-4 bg-black min-vh-100 d-flex align-items-center">
    <div class="container-fluid">
        <div class="row justify-content-center text-center">
            <div class="col-lg-12">
                <h1 class="display-1">Oops! Payment Cancelled</h1>
                <h2>The payment process was cancelled.<br> You have not been charged.</h2>
                <a href="{{ url('/') }}" class="custom-btn mt-4 d-inline-block">
                    Go back to Home
                </a>
            </div>
        </div>
    </div>
</section>
@endsection