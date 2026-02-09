@extends('_layouts.master')
@section('content')

    <section class="creation py-lg-5 py-4 bg-black min-vh-100 d-flex align-items-center">
        <div class="container-fluid">
            <div class="row justify-content-center text-center">
                <div class="col-lg-12">
                    <h1 class="display-1">404</h1>
                    <h2>Oops! Page Not Found</h2>
                    <p>The page you are looking for doesn’t exist or has been moved.</p>
                    <a href="{{ url('/') }}" class="custom-btn mt-4 d-inline-block">
                        Go back to Home
                    </a>
                </div>
            </div>
        </div>
    </section>


@endsection