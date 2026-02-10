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

    <div class="bg-black container-fluid ">
        <div class="devider bg-black mb-md-0 mb-4"></div>
    </div>

    <section class="creation py-lg-5 py-4 bg-black">
        <div class="container-fluid">
            <!-- <h2 class="h2-heading">The Devil’s Finest Creation</h2> -->

            <div class="row g-4">
                <?php /*@if(isset($products) && $products->isNotEmpty())
                @foreach($products as $list)
                <div class="col-md-4">
                    <div class="product-card">
                        <a href="{{ url('our-vodka/'.$list->pro_url) }}">
                        <div class="product-image">
                            <img src="{{ url(IMAGE_PATH.$list->image1) }}" alt="{{ $list->alt1 }}">
                        </div>
                        </a>
                        <div class="product-details">
                            <h2 class="product-title">{{ ucwords($list->pro_name) }}</h2>
                            <p class="product-desc">{{ substr(strip_tags($list->sub_title),0,150) }}</p>
                            @if($list->discount != null)
                                <span class="signle-price"> <strong>{{ $list->discount }}</strong></span>
                            @elseif($list->is_comming)
                                <span class="signle-price"><strong>Coming Soon</strong></span>
                            @else
                                <span class="signle-price"> <strong>${{ $list->sp }}</strong></span>
                            @endif
                            <div class="product-actions">
                                <div class="quantity-selector qty-wrapper" data-stock="{{ $list->stock }}">
                                    <button class="qty-btn decrement" >-</button>
                                    <span class="qty qty-value">1</span>
                                    <button class="qty-btn increment" >+</button>
                                </div>
                                @if($list->is_comming)
                                <button class="add-cart-btn text-danger">Coming Soon </button>
                                @elseif(MAINTAIN_STOCK == 'Yes' && $list->stock < 1)
                                <button class="add-cart-btn text-danger">out of stock </button>
                                @else
                                <button class="add-cart-btn addToCart" data-pro_id="{{ $list->pro_id }}" data-qty="1">Add to cart</button>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
                @endforeach
                @else
                    <p class="text-danger">No Product Available.</p>
                @endif */ ?>
                @if(isset($products) && $products->isNotEmpty())
                @foreach($products as $list)
                <div class="col-md-4">
                    <div class="product-card">
                        <a href="{{ url('our-vodka/'.$list->pro_url) }}">
                        <div class="product-image">
                            <img src="{{ url(IMAGE_PATH.$list->image1) }}" alt="{{ $list->alt1 }}">
                        </div>
                        </a>
                        <div class="product-details">
                            <h2 class="product-title">{{ ucwords($list->pro_name) }}</h2>
                            <p class="product-desc">{{ substr(strip_tags($list->sub_title),0,150) }}</p>
                            
                            @if($list->discount != null)
                            <span class="signle-price"> <strong>{{ $list->discount }}</strong></span>
                            @else
                            <span class="signle-price"><strong>${{ $list->sp }}</strong></span>
                            @endif
                            <div class="product-actions">
                                <!-- <div class="quantity-selector">
                                    <button class="qty-btn" id="decrement">-</button>
                                    <span class="qty" id="qty-value">1</span>
                                    <button class="qty-btn" id="increment">+</button>
                                </div> -->
                                <button class="view-all mt-0 addToCart" data-pro_id="{{ $list->pro_id }}" data-qty="1" data-stock="{{ $list->stock }}">Pre-order</button>
                                
                            </div>
                        </div>
                    </div>
                    
                </div>
                @endforeach
                @else
                    <p class="text-danger">No Product Available.</p>
                @endif
                <?php /* <div class="col-md-4">
                    <div class="product-card">
                        <a href="{{ url('our-vodka/devil-juice') }}">
                        <div class="product-image">
                            <img src="{{ asset('assets/frontend/images/creation2.png') }}" alt="Devil's Juice Vodka">
                        </div>
                        </a>
                        <div class="product-details">
                            <h2 class="product-title">Devil’s Juice Vodka</h2>
                            <p class="product-desc">Smooth as sin, born of fire, made to tempt.</p>
                            <div class="product-actions">
                                <div class="quantity-selector">
                                    <button class="qty-btn" id="decrement">-</button>
                                    <span class="qty" id="qty-value">1</span>
                                    <button class="qty-btn" id="increment">+</button>
                                </div>

                                <button class="add-cart-btn">Add to cart</button>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="product-card">
                        <div class="product-image">
                            <img src="{{ asset('assets/frontend/images/creation1.png') }}" alt="Devil's Juice Vodka">
                        </div>
                        <div class="product-details">
                            <h2 class="product-title">Devil’s Juice Vodka</h2>
                            <p class="product-desc">Smooth as sin, born of fire, made to tempt.</p>
                            <div class="product-actions">
                                <div class="quantity-selector">
                                    <button class="qty-btn" id="decrement">-</button>
                                    <span class="qty" id="qty-value">1</span>
                                    <button class="qty-btn" id="increment">+</button>
                                </div>

                                <button class="add-cart-btn">Add to cart</button>
                            </div>
                        </div>
                    </div>

                </div> */ ?>
            </div>
        </div>
    </section>

    <!-- The Devil’s Hour -->
    @include('_layouts/devil-hour')
    <?php /* <section class="panel-space devils-hour bg-black">
        <h2 class="h2-heading text-center mb-4 weight-600">The Devil’s Hour</h2>
        <p class="w-50 text-center mx-auto mb-5 pb-lg-5 px-3">Where the night slows, and the fire rises. A moment to unwind,
            indulge, and taste the luxury of rebellion — one pour at a time.</p>

        <div class="container-fluid">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="devils-hour-profile">
                        <img src="{{ asset('assets/frontend/images/devil1.jpg') }}" alt="devil1" class="w-100">
                    </div>
                    <small>Ammy, @ammy_23 </small>
                </div>
                <div class="col-md-4">
                    <div class="devils-hour-profile">
                        <img src="{{ asset('assets/frontend/images/devil2.jpg') }}" alt="devil1" class="w-100">
                    </div>
                    <small>Ammy, @ammy_23 </small>
                </div>
                <div class="col-md-4">
                    <div class="devils-hour-profile">
                        <img src="{{ asset('assets/frontend/images/devil3.jpg') }}" alt="devil1" class="w-100">
                    </div>
                    <small>Ammy, @ammy_23 </small>
                </div>
            </div>
        </div>
    </section> */ ?>
    


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

</html> */ ?>

@endsection