@extends('_layouts.master')
@section('content')
<div class="age-verification sign-up-panel py-5"
    style="background-image: url({{ asset('assets/frontend/images/footer-bg.gif') }});">
    <div class="container-fluid">

        <div class="sign-up-logo">
            <a href="{{ url('/') }}">
                <img src="{{ asset('assets/frontend/images/devel-log.png') }}" alt="">
            </a>
        </div>

        <div class="sign-up-box mx-auto">
            <div class="text-center mb-4">
                <h2 class="fw-bold mb-2">Reset Password</h2>
                <p class="small text-white mb-5">
                    Create a new password for your account.
                </p>

                <?php if(Session::has('err')){ 
                    echo alertBS(session('err'), 'danger');
                } ?>

                <?php if(Session::has('msg')){ 
                    echo alertBS(session('msg'), 'success');
                } ?>
            </div>

            <form action="{{ url()->current() }}" method="POST">
                @csrf

                <!-- Token -->
                <input type="hidden" name="token" value="{{ $token }}">

                <!-- Email -->
                <div class="mb-4">
                    <label class="form-label">E-mail</label>
                    <input type="email" class="form-control custom-input" name="email"
                        value="{{ old('email', $email ?? '') }}" placeholder="Enter your e-mail" required>
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- New Password -->
                <div class="mb-4">
                    <label class="form-label">New Password</label>
                    <div class="password-wrapper">
                        <input type="password" class="form-control custom-input" name="password"
                            placeholder="Enter new password" required>
                        <i class="fa-solid fa-eye-slash toggle-password" style="cursor:pointer;"></i>
                    </div>
                    @error('password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mb-4">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" class="form-control custom-input" name="password_confirmation"
                        placeholder="Confirm new password" required>
                </div>

                <button type="submit" class="custom-btn w-100">
                    Reset Password
                </button>

                <div class="divider">
                    <span class="text-white">or</span>
                </div>

                <button type="button" class="view-all w-100 mt-0" onclick="window.location.href='{{ url('member-login') }}'">
                    Back to Login
                </button>

            </form>
        </div>
    </div>
</div>

@endsection