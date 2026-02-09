<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Devil’s | Juice </title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/frontend/images/logo.png') }}">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/media-query.css') }}">

    <!-- <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/aos.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="{{ asset('assets/frontend/css/all.min.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/toastr.min.css') }}" >

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        window.$zoho=window.$zoho || {};$zoho.salesiq=$zoho.salesiq||{
            ready:function(){}}
    </script>
    <script id="zsiqscript" src="https://salesiq.zohopublic.com/widget?wc=siqb086e522f0ef4491a06c2cbd555b854cc47877a0bfc28f1905567aa7e0a817cb%22" defer></script>
</head>
<body>
    @php
        $segment1 = Request::segment(1);
        $segment2 = Request::segment(2);
        $segments = ['member-login','member-register','age-verify','forgot-password','reset-password'];
    @endphp
    @if(!in_array($segment1, $segments))
    @include('_layouts.header')
    @include('_layouts.ajaxloader')
    @endif

    @yield('content')

    @if(!in_array($segment1, $segments))
    @include('_layouts.footer')
    @endif

    <!-- <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> -->
    <script src="{{ asset('assets/frontend/js/aos.js') }}"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script> -->
    <script src="{{ asset('assets/frontend/js/jquery-3.6.1.min.js') }}"></script>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script> -->
    <script src="{{ asset('assets/frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/toastr.min.js') }}"></script>
    
    <script>
        window.APP_URL = "{{ url('/') }}";
        window.MAINTAIN_STOCK = '{{ MAINTAIN_STOCK }}';
    </script>
    <script src="{{ asset('assets/frontend/js/custom.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/owl.carousel.js') }}"></script>

    <script>
        AOS.init();
    </script>

    <script>

        $(document).ready(function () {

            $('.coctel-slider').owlCarousel({
                loop: true,
                margin: 0,
                nav: true,
                dots: false,
                // autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                center: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            });
            $('.collection-slider').owlCarousel({
                loop: true,
                margin: 20,
                nav: true,
                dots: false,
                // autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 3
                    }
                }
            });
            $('.testimonial-slider').owlCarousel({
                loop: true,
                margin: 20,
                nav: true,
                dots: false,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            });

            $('.similar-cocktails-slider').owlCarousel({
                loop: true,
                margin: 20,
                nav: true,
                dots: false,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                center: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 3
                    }
                }
            });


        });

    </script>




</body>

</html>