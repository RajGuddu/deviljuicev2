@extends('_layouts.master')
@section('content')
<?php /* <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title> Devil’s | Juice </title>


    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/media-query.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Head ke andar ye line add karo -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>*/ ?>


    <div class="age-verification sign-up-panel py-5" style="background-image: url({{ asset('assets/frontend/images/footer-bg.gif') }});">
        <div class="container-fluid">
            <div class="sign-up-logo">
                <a href="{{ url('/') }}"><img src="{{ asset('assets/frontend/images/devel-log.png') }}" alt=""></a>
            </div>


            <div class="sign-up-box  mx-auto">
                <div class="text-center mb-4">
                    <h2 class="fw-bold mb-2">Create account</h2>
                    <p class="small text-white mb-md-5 mb-4">Become part of the inner circle. It only takes a moment.</p>
                </div>
                <?php if(Session::has('err')){ 
                    echo alertBS(session('err'), 'danger');
                } ?>

                <form action="{{ url()->current() }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="form-label">Full name</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control custom-input" placeholder="Enter your full name">
                        @error('name') <span class="text-danger"> {{ $message }} </span> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">E-mail</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control custom-input" placeholder="Enter your e-mail">
                        @error('email') <span class="text-danger"> {{ $message }} </span> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Mobile number</label>
                        <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" class="form-control custom-input" placeholder="Enter your mobile number">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Create Password</label>
                        <div class="password-wrapper">
                            <input type="password" id="password" name="password" value="{{ old('password') }}" class="form-control custom-input" placeholder="Enter your password">
                            <i class="fa-solid fa-eye-slash toggle-password" style="cursor: pointer;"></i>
                        </div>
                        @error('password') <span class="text-danger"> {{ $message }} </span> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Confirm Password</label>
                        <div class="password-wrapper">
                            <input type="password" id="cpassword" name="cpassword" value="{{ old('cpassword') }}" class="form-control custom-input" placeholder="Enter confirm password">
                            <i class="fa-solid fa-eye-slash toggle-password" style="cursor: pointer;"></i>
                        </div>
                        @error('cpassword') <span class="text-danger"> {{ $message }} </span> @enderror
                    </div>

                    <button type="submit" class="custom-btn w-100">Create Account</button>

                    <div class="divider">
                        <span class="text-white">Already have an account?</span>
                    </div>

                    <button type="button" class="view-all w-100 mt-0" onclick="window.location.href='{{ url('member-login') }}'">Log In</button>

                </form>
            </div>

        </div>
    </div>



    <?php /* <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
    <script src="js/custom.js"></script>
    <script src="js/owl.carousel.js"></script>

    <script>
        AOS.init();
    </script>


    <script>
        const toggleIcons = document.querySelectorAll('.toggle-password');

        toggleIcons.forEach(icon => {
            icon.addEventListener('click', function () {
                const input = this.previousElementSibling;
                const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                input.setAttribute('type', type);
                this.classList.toggle('fa-eye-slash');
                this.classList.toggle('fa-eye');
            });
        });

    </script>





</body>

</html>*/ ?>

@endsection