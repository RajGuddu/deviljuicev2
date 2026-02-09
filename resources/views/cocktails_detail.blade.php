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
    </div>*/ ?>

    @php
        $url = asset('assets/frontend/images/coctail-club-banner.jpg');
        if(isset($banner) && $banner->image != '')
            $url = url(IMAGE_PATH.$banner->image);
    @endphp
    <div class="vodka-banner panel-space coctail-club-bannr"
        style="background-image: url({{ $url }});">
        <div class="container-fluid text-center">
            <h1 class="banner-title text-center w-100 mt-lg-5">{{ $banner->main_title ?? '' }}</h1>
            <p class="text-center">{{ $banner->sub_title ?? '' }}</p>
        </div>
    </div>




    <section class="panel-space devil-Mule-panel">
        <div class="container-fluid">
            <h2 class="text-36 weight-600 mb-lg-5 mb-4">Essentials for Summoning the Perfect Pour</h2>

            <div class="row">

                <div class="col-md-12 col-lg-3 mb-4 ">
                    <h4 class="section-title mb-4 weight-600">{{ $cocktail->cocktail_name ?? '' }} by</h4>

                    <div class="devil-Mule-box d-flex align-items-center justify-content-between  mb-4">

                        <div class="d-flex align-items-center gap-3">
                            <i class="fa-solid fa-user fs-5"></i>

                            <span class="fs-5 fw-bold fst-italic">{{ $cocktail->created_by ?? '' }}</span>
                        </div>

                        <div class="d-flex align-items-center gap-2">
                            <i class="fa-brands fa-instagram fs-5 insta-gradient"></i>

                            <span class="fs-5 fw-light">{{ $cocktail->insta_user_name ?? '' }}</span>
                        </div>

                    </div>

                    <p>{{ $cocktail->short_desc ?? '' }}</p>
                </div>

                <div class="col-md-12 col-lg-6 mb-4 d-flex justify-content-lg-center">
                    <div class="m-0 w-75 mx-auto">
                        <div class="mb-md-5 mb-4">
                            <h5 class="sub-title mb-3">Ingredients</h5>
                            {!! $cocktail->ingredients ?? '' !!}
                            <?php /* <ul class="ingredient-list">
                                <li><strong>60ml</strong> Devil’s Juice Vodka</li>
                                <li><strong>120ml</strong> Ginger Beer (strong + spicy works best)</li>
                                <li><strong>15ml</strong> Fresh Lime Juice</li>
                                <li><strong>5ml</strong> Smoked Brown Sugar Syrup (optional but wicked)</li>
                                <li>Crushed ice</li>
                                <li>Fresh mint sprig</li>
                                <li>Lime wheel</li>
                                <li>A small slice of fresh ginger (for garnish)</li>
                            </ul> */ ?>
                        </div>

                        <div>
                            <h5 class="sub-title mb-3">Instructions</h5>
                            {!! $cocktail->instructions ?? '' !!}
                            <?php /* <ol class="instruction-list">
                                <li>Fill a copper mug (or chilled glass) with crushed ice.</li>
                                <li>Pour in Devil’s Juice Vodka for that deep, fiery base.</li>
                                <li>Add lime juice and the optional smoked brown sugar syrup for a slow-building
                                    sweetness.</li>
                                <li>Top with ginger beer, giving it a bold kick.</li>
                                <li>Stir gently — let the smoke, lime, and fire come together.</li>
                                <li>Garnish with a mint sprig, lime wheel, and a thin slice of ginger for aroma.</li>
                            </ol> */ ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-lg-3 text-end d-flex flex-column align-items-lg-end">
                    <div class="cocktail-image-wrapper mb-4">
                        <img src="{{ url(IMAGE_PATH.$cocktail->image) }}" alt="{{ $cocktail->cocktail_name ?? '' }}" class="img-fluid">
                    </div>
                    <div class="d-flex align-items-center justify-content-center w-100">
                        <a href="{{ url('cocktail-creation') }}" class="custom-btn">
                            Submit Your Cocktail
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <section class="panel-space pt-0">
        <div class="container-fluid">

             <h2 class="text-36 weight-600 mb-5">Similar Cocktails</h2>
            <div class="similar-cocktails-slider">

                @if(isset($simiCocktail) && $simiCocktail->isNotEmpty())
                @foreach($simiCocktail as $list)
                <div class="item">
                    <div class="product-card mt-0">
                        <a href="{{ url('cocktails/'.$list->slug) }}" class="text-white">

                            <div class="product-image">
                                <img src="{{ url(IMAGE_PATH.$list->image) }}" alt="Devil's Juice Vodka">
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

                <?php /* <div class="item">
                    <div class="product-card mt-0">
                        <a href="#" class="text-white">

                            <div class="product-image">
                                <img src="{{ asset('assets/frontend/images/coctail-2.jpg') }}" alt="Devil's Juice Vodka">
                            </div>
                            <div class="product-details">
                                <h2 class="product-title">Midnight Flame</h2>
                                <p class="product-desc mb-0">For those who love their nights like their drinks — smooth
                                    and burning.</p>

                            </div>
                        </a>
                    </div>

                </div>

                <div class="item">
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

                </div> */ ?>

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

</html>*/ ?>

@endsection