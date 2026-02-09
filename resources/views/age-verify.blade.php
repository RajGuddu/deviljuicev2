@extends('_layouts.master')
@section('content')

    <div class="age-verification text-center py-5" style="background-image: url(images/footer-bg.gif);">
        <div class="container-fluid">
            <img src="{{ asset('assets/frontend/images/devel-log.png') }}" alt="">
            @if (Session::has('err') && Session::get('err') != '')
                <h1 class="text-danger mb-5">{{ Session::get('err') }} </h1>
            @endif
            @if ($errors->has('age'))
                <div class="text-danger mb-3">
                    {{ $errors->first('age') }}
                </div>
            @elseif($errors->has('dd') || $errors->has('mm') || $errors->has('yy'))
                <div class="text-danger mb-3">
                    Please enter a valid Date of Birth.
                </div>
            @endif
            <form action="{{ url()->current() }}" method="post">
            @csrf
            <input type="hidden" name="country" id="selectedCountry" value="USA">
            <div class="mb-5">
                <div class="country-select">
                    <button class="country-btn mx-auto bg-trannsparant" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fa-solid fa-location-dot me-2"></i>
                        <span id="selectedCountryText" >USA</span>
                        <i class="fa-solid fa-chevron-down ms-2 arrow-icon"></i>
                    </button>

                    <ul class="dropdown-menu dropdown-menu-dark rounded-0">
                        <li><a class="dropdown-item active" href="javascript:void(0)">USA</a></li>
                        <li><a class="dropdown-item" href="javascript:void(0)">UK</a></li>
                        <li><a class="dropdown-item" href="javascript:void(0)">CANADA</a></li>
                        <li><a class="dropdown-item " href="javascript:void(0)">INDIA</a></li>
                    </ul>
                </div>
            </div>

            <h2 class="text-28 weight-700  text-uppercase mb-5">
                Devil’s Juice is crafted for those old enough<br>
                to handle the fire.
            </h2>

            <div class="d-flex gap-3 justify-content-center mb-5 mt-3 age-verify-box">

            
                <input type="text" name="dd" value="{{ old('dd') }}" class="form-control date-input" required placeholder="DD" maxlength="2">
                <input type="text" name="mm" value="{{ old('mm') }}" class="form-control date-input" required placeholder="MM" maxlength="2">
                <input type="text" name="yy" value="{{ old('yy') }}" class="form-control date-input" required placeholder="YYYY" maxlength="4">
            </div>

            <button type="submit" class="custom-btn w-25">Enter</button>
            </form>

        </div>
    </div>
    <div class="bg-black py-5">
        <p class="legal-text mb-2 w-50 text-center">
            By clicking Enter, you confirm that you are of legal drinking age and agree to our
            <a href="{{ url('terms-condition') }}" class="text-white text-decoration-underline">Terms of Use</a>
            and 
            <a href="{{ url('privacy-policy') }}" class="text-white text-decoration-underline">Privacy Policy.</a>
        </p>

        <div class="container text-center py-4">
            <a href="{{ url('terms-condition') }}" class="footer-link text-white">Terms of use</a>
            <a href="{{ url('privacy-policy') }}" class="footer-link text-white">Privacy Policy</a>
            <a href="{{ url('contact') }}" class="footer-link text-white">Contact us</a>
        </div>
    </div>
    
@endsection