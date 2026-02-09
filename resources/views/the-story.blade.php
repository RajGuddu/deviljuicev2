@extends('_layouts.master')
@section('content')
<?php /* <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Devil’s | Juice </title>


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

<body>

   <div class="header">
        <nav class="navbar navbar-expand-lg" aria-label="Fifth navbar example">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.html">
                    <img src="images/devel-log.png" alt="">
                </a>
             

                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>

                </button>

                <div class="collapse navbar-collapse" id="navbarsExample05">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link text-white active" aria-current="page" href="index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" aria-current="page" href="our-vodka.html">Our Vodka</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" aria-current="page" href="the-story.html">The Story</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" aria-current="page" href="coctails.html">Cocktails</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" aria-current="page" href="coctails-club.html">Cocktails CLUB</a>
                        </li>

                    </ul>

                </div>
                <div class="user-panel">
                    <a href="#"><img src="images/user-icon.svg" alt=""></a>
                    <a href="#"><img src="images/cart-icon.svg" alt=""></a>
                </div>
            </div>
        </nav>
    </div> */ ?>

    <div class="vodka-banner panel-space">
        <div class="container-fluid text-center">
            <h1 class="banner-title text-center w-100 mt-5">{{ $banner->main_title ?? '' }}</h1>
            <p class="text-center">{{ $banner->sub_title ?? '' }}</p>
        </div>
    </div>

    <!-- <div class="bg-black container-fluid ">
        <div class="devider bg-black"></div>
    </div> -->

    <section class="panel-space first-shots text-center overflow-hidden the-story-filre-panel">

        <!-- Background Video -->
        <video class="bg-video" autoplay="" muted="" loop="" playsinline="">
             @php
                $url = asset('assets/frontend/videos/the-story-filre.mp4');
                if(isset($content) && $content->bg_video != '')
                    $url = url(VIDEO_PATH.$content->bg_video);
            @endphp
            <source src="{{ $url }}" type="video/mp4">
        </video>

        <!-- Content -->
        <div class="content w-50 text-start">
            <h2 class="h2-heading weight-600 mb-4">{{ $content->about_title ?? '' }}</h2>

            {!! $content->about_details ?? '' !!}
            <?php /* <p class="mb-3">
                Yahan aap apna pehla paragraph likh sakte hain. Example: "Humari shuruwat wahan se hui jahan sab ruk
                gaye the."
            </p>

            <p class="highlight-text">
                Yahan dusra paragraph likhein. Apne product ya service ki khaasiyat batayein.
            </p>

            <p class="highlight-text">
                Yahan teesra paragraph likhein.
            </p>

            <p class="punchline">
                Yeh last line hai jo thodi bold dikhegi.
            </p> */ ?>
        </div>
    </section>

    <section class="born-from-obsession">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-3">
                    @php
                        $sec2Image = asset('assets/frontend/images/obsession-1.png');
                        if($content->sec2_image1 != '')
                            $sec2Image = url(IMAGE_PATH.$content->sec2_image1);
                    @endphp
                    <img src="{{ $sec2Image }}" alt="" class="w-100 d-md-block d-none">
                </div>
                <div class="col-md-6 text-center">
                    <h2 class="h2-heading weight-600 mb-4">{{ $content->sec2_title ?? '' }}</h2>

                    {!! $content->sec2_description ?? '' !!}
                    <?php /* <p class="mb-3">
                        Every great spirit comes from craft. <br> Ours comes from craft, precision, and a touch of
                        rebellion.
                    </p>

                    <p class="highlight-text">
                        We didn’t chase trends. <br> We perfected a process — slow, deliberate, relentless — until the
                        result wassmooth enough to seduce and bold enough to remember.
                    </p>

                    <p class="highlight-text">
                        The journey wasn’t easy. <br> Fire never is. <br> But the outcome? A vodka that stands alone.
                    </p>*/ ?>


                </div>
                <div class="col-md-3">
                    @php
                        $sec2Image2 = asset('assets/frontend/images/obsession-2.png');
                        if($content->sec2_image2 != '')
                            $sec2Image2 = url(IMAGE_PATH.$content->sec2_image2);
                    @endphp
                    <img src="{{ $sec2Image2 }}" alt="" class="w-100 d-md-block d-none">
                </div>
            </div>
        </div>
    </section>


    <section class="witness-art pb-0">
        <div class="container-fluid">
            <div class="video-hero-section">
                @php
                    $url2 = asset('assets/frontend/videos/temptation-video.mp4');
                    if(isset($content) && $content->sec3_bg_video != '')
                        $url2 = url(VIDEO_PATH.$content->sec3_bg_video);
                @endphp
                <video class="bg-video" autoplay="" loop="" muted="" playsinline="">
                    <source src="{{ $url2 }}" type="video/mp4">
                    <!-- Agar browser video nahi play kar pata, fallback text -->
                    Your browser does not support the video tag.
                </video>
             
            </div>


        </div>

    </section>




    <?php /* <footer class="footer-panel py-md-5 py-4 text-center position-relative"
        style="background-image: url(images/footer-bg.gif);">
        <div class="container-fluid">
            <a href="#" class="footer-logo">
                <img src="images/devel-log.png" alt="">
            </a>
            <ul class="social-links d-flex align-items-center justify-content-center gap-md-4">
                <li><a href="https://www.instagram.com/devils_juice_dj/"><img src="images/instagram.svg" alt=""></a>
                </li>
                <li><a href="https://www.facebook.com/people/Devils-Juice"><img src="images/facebook.svg" alt=""></a>
                </li>
                <li><a href="#"><img src="images/tiktok.svg" alt=""></a></li>
                <li><a href="#"><img src="images/twitter.svg" alt=""></a></li>
            </ul>
            <div class="footer-nav">
                <ul class="d-lg-flex align-items-center justify-content-center gap-5">
                    <li><a href="#" class="text-white">Contact</a></li>
                    <li><a href="#" class="text-white">Terms & Conditions</a></li>
                    <li><a href="#" class="text-white">Privacy Policy</a></li>
                    <li><a href="#" class="text-white">All Vodkas</a></li>
                    <li><a href="#" class="text-white">Our Story</a></li>
                    <li><a href="#" class="text-white">Our Cocktails</a></li>
                    <li><a href="#" class="text-white">Cocktail Club</a></li>
                </ul>
            </div>
            <p>© 2025 Devil’s Juics. All rights reserved. Crafted with fire. Served with temptation. <br> Please enjoy
                responsibly. For adults of legal drinking age only. </p>
        </div>
    </footer>



    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
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
        const decrement = document.getElementById('decrement');
        const increment = document.getElementById('increment');
        const qtyValue = document.getElementById('qty-value');
        let qty = 1;

        decrement.addEventListener('click', function () {
            if (qty > 1) {
                qty--;
                qtyValue.textContent = qty;
            }
        });

        increment.addEventListener('click', function () {
            qty++;
            qtyValue.textContent = qty;
        });
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


        });

    </script>




</body>

</html>*/ ?>

@endsection