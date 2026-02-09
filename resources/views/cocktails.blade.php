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

    @php
        $url = asset('assets/frontend/images/coctel-banner.jpg');
        if(isset($banner) && $banner->image != '')
            $url = url(IMAGE_PATH.$banner->image);
    @endphp
    <div class="banner homne-banner coctail-banner" style="background-image: url({{ $url }});">
        <div class="container-fluid">
            <h1 class="banner-title mx-auto text-center">{{ $banner->main_title ?? '' }}</h1>
            <p class="banner-subtitle mx-auto text-center w-100">{{ $banner->sub_title ?? '' }}</p>
        </div>
    </div>

    <section class="panel-space coctail-category">
        <div class="container-fluid">
            <div class="d-md-flex align-items-center justify-content-between mb-5">
                <div class="search-bar">
                    
                    <input type="text" id="searchInput" placeholder="search by name or ingredients" value="{{ request('q') }}">
                    <button type="submit" id="searchBtn" class="search-icon" aria-label="Search">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                    
                </div>
                <p class="mb-0 weight-600">{{ isset($cocktails) ? $cocktails->count() : 0 }} Cocktails 
                    <a class="view-all px-2 py-1 ms-2" href="{{ url('cocktails') }}">Reset</a>
                </p>
                

            </div>

            <div class="row g-4">
                @if(isset($cocktails) && $cocktails->isNotEmpty())
                @foreach($cocktails as $list)
                <div class="col-md-4">
                    <div class="product-card mt-0">
                        <a href="{{ url('cocktails/'.$list->slug) }}" class="text-white">

                            <div class="product-image">
                                <img src="{{ url(IMAGE_PATH.$list->image) }}" alt="{{ $list->cocktail_name }}">
                            </div>
                            <div class="product-details">
                                <h2 class="product-title">{{ $list->cocktail_name }}</h2>
                                <p class="product-desc mb-0">{{ substr($list->short_desc,0,150) }}</p>
                            </div>
                        </a>
                    </div>

                </div>
                @endforeach
                @endif
                <?php /*
                <div class="col-md-4">
                    <div class="product-card mt-0">
                        <a href="#" class="text-white">

                            <div class="product-image">
                                <img src="{{ asset('assets/frontend/images/coctail-2.jpg') }}" alt="Devil's Juice Vodka">
                            </div>
                            <div class="product-details">
                                <h2 class="product-title">Midnight Flame</h2>
                                <p class="product-desc mb-0">For those who love their nights like their drinks — smooth and burning.</p>

                            </div>
                        </a>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="product-card mt-0">
                        <a href="#" class="text-white">

                            <div class="product-image">
                                <img src="{{ asset('assets/frontend/images/coctail-3.jpg') }}" alt="Devil's Juice Vodka">
                            </div>
                            <div class="product-details">
                                <h2 class="product-title">Inferno Martini</h2>
                                <p class="product-desc mb-0">The ultimate power move in a glass.</p>

                            </div>
                        </a>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="product-card mt-0">
                        <a href="#" class="text-white">

                            <div class="product-image">
                                <img src="{{ asset('assets/frontend/images/coctail-4.jpg') }}" alt="Devil's Juice Vodka">
                            </div>
                            <div class="product-details">
                                <h2 class="product-title">Scarlet Smoke</h2>
                                <p class="product-desc mb-0">Where passion meets danger.</p>

                            </div>
                        </a>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="product-card mt-0">
                        <a href="#" class="text-white">

                            <div class="product-image">
                                <img src="{{ asset('assets/frontend/images/coctail-5.jpg') }}" alt="Devil's Juice Vodka">
                            </div>
                            <div class="product-details">
                                <h2 class="product-title">Frostbite Elixir</h2>
                                <p class="product-desc mb-0">Cold as sin.</p>

                            </div>
                        </a>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="product-card mt-0">
                        <a href="#" class="text-white">

                            <div class="product-image">
                                <img src="{{ asset('assets/frontend/images/coctail-6.jpg') }}" alt="Devil's Juice Vodka">
                            </div>
                            <div class="product-details">
                                <h2 class="product-title">Share Your Creation</h2>
                                <p class="product-desc mb-0">Upload your cocktail recipe and photo — join the Devil’s
                                    circle and let the world taste your fire.</p>

                            </div>
                        </a>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="product-card mt-0">
                        <a href="#" class="text-white">

                            <div class="product-image">
                                <img src="{{ asset('assets/frontend/images/coctail-7.jpg') }}" alt="Devil's Juice Vodka">
                            </div>
                            <div class="product-details">
                                <h2 class="product-title">Dark Ritual</h2>
                                <p class="product-desc mb-0">Sip it to summon the night.</p>

                            </div>
                        </a>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="product-card mt-0">
                        <a href="#" class="text-white">

                            <div class="product-image">
                                <img src="{{ asset('assets/frontend/images/coctail-8.jpg') }}" alt="Devil's Juice Vodka">
                            </div>
                            <div class="product-details">
                                <h2 class="product-title">Crimson Tide</h2>
                                <p class="product-desc mb-0">A seductive swirl of strength and sweetness.</p>

                            </div>
                        </a>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="product-card mt-0">
                        <a href="#" class="text-white">

                            <div class="product-image">
                                <img src="{{ asset('assets/frontend/images/coctail-9.jpg') }}" alt="Devil's Juice Vodka">
                            </div>
                            <div class="product-details">
                                <h2 class="product-title">Hellfire Spritz</h2>
                                <p class="product-desc mb-0">Light it up — the fiery take on a summer favorite.</p>

                            </div>
                        </a>
                    </div>

                </div>
                */ ?>

            </div>

            <?php /* 
            <div class="d-flex align-items-center justify-content-center pt-5">
                <div class="pagination-minimal">
                    <!-- Previous -->
                    <a href="#" class="page prev disabled">
                        <i class="fa-solid fa-chevron-left"></i>
                    </a>

                    <!-- Numbers -->
                    <a href="#" class="page active">1</a>
                    <a href="#" class="page">2</a>
                    <a href="#" class="page">3</a>

                    <!-- Next -->
                    <a href="#" class="page next">
                        <i class="fa-solid fa-chevron-right"></i>
                    </a>
                </div>
            </div>
            */ ?>

        </div>
    </section>


    <?php /* 
    <footer class="footer-panel py-md-5 py-4 text-center position-relative"
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