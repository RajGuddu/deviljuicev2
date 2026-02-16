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
    </div>*/ ?>

    <div class="panel-space product-detail-page overflow-hidden">
        <div class="container-fluid mt-5">
            <div class="row g-5">
                <div class="col-lg-7">

                    <div class="row product-gallery-bs">

                        <!-- Left: vertical tabs (thumbnails) -->
                        <div class="col-2">
                            <ul class="nav nav-pills flex-column" id="productTab" role="tablist"
                                aria-orientation="vertical">
                                <li class="nav-item mb-2" role="presentation">
                                    <button class="nav-link active p-0" id="img1-tab" data-bs-toggle="tab"
                                        data-bs-target="#img1-pane" type="button" role="tab" aria-controls="img1-pane"
                                        aria-selected="true">
                                        <img src="{{ url(IMAGE_PATH.$product->image1) }}" class="img-fluid" alt="{{$product->alt1 ?? ''}}">
                                    </button>
                                </li>
                                @if($product->image2 != '')
                                
                                <li class="nav-item mb-2" role="presentation">
                                    <button class="nav-link p-0" id="img2-tab" data-bs-toggle="tab"
                                        data-bs-target="#img2-pane" type="button" role="tab" aria-controls="img2-pane"
                                        aria-selected="false">
                                        <img src="{{ url(IMAGE_PATH.$product->image2) }}" class="img-fluid" alt="{{$product->alt2 ?? ''}}">
                                    </button>
                                </li>
                                @endif
                                @if($product->image3 != '')
                                <li class="nav-item mb-2" role="presentation">
                                    <button class="nav-link p-0" id="img3-tab" data-bs-toggle="tab"
                                        data-bs-target="#img3-pane" type="button" role="tab" aria-controls="img3-pane"
                                        aria-selected="false">
                                        <img src="{{ url(IMAGE_PATH.$product->image3) }}" class="img-fluid" alt="{{$product->alt3 ?? ''}}">
                                    </button>
                                </li>
                                @endif
                                @if($product->image4 != '')
                                <li class="nav-item mb-2" role="presentation">
                                    <button class="nav-link p-0" id="img4-tab" data-bs-toggle="tab"
                                        data-bs-target="#img4-pane" type="button" role="tab" aria-controls="img4-pane"
                                        aria-selected="false">
                                        <img src="{{ url(IMAGE_PATH.$product->image4) }}" class="img-fluid" alt="{{$product->alt4 ?? ''}}">
                                    </button>
                                </li>
                                @endif
                                @if($product->image5 != '')
                                <li class="nav-item mb-2" role="presentation">
                                    <button class="nav-link p-0" id="img5-tab" data-bs-toggle="tab"
                                        data-bs-target="#img5-pane" type="button" role="tab" aria-controls="img5-pane"
                                        aria-selected="false">
                                        <img src="{{ url(IMAGE_PATH.$product->image5) }}" class="img-fluid" alt="{{$product->alt5 ?? ''}}">
                                    </button>
                                </li>
                                @endif
                            </ul>
                        </div>

                        <!-- Right: big image (tab content) -->
                        <div class="col-10">
                            <div class="tab-content" id="productTabContent">
                                <div class="tab-pane fade show active" id="img1-pane" role="tabpanel"
                                    aria-labelledby="img1-tab">
                                    <img src="{{ url(IMAGE_PATH.$product->image1) }}" class="img-fluid main-product-img" alt="{{$product->alt1 ?? ''}}">
                                </div>
                                @if($product->image2 != '')
                                <div class="tab-pane fade" id="img2-pane" role="tabpanel" aria-labelledby="img2-tab">
                                    <img src="{{ url(IMAGE_PATH.$product->image2) }}" class="img-fluid main-product-img" alt="{{$product->alt2 ?? ''}}">
                                </div>
                                @endif
                                @if($product->image3 != '')
                                <div class="tab-pane fade" id="img3-pane" role="tabpanel" aria-labelledby="img3-tab">
                                    <img src="{{ url(IMAGE_PATH.$product->image3) }}" class="img-fluid main-product-img" alt="{{$product->alt3 ?? ''}}">
                                </div>
                                @endif
                                @if($product->image4 != '')
                                <div class="tab-pane fade" id="img4-pane" role="tabpanel" aria-labelledby="img4-tab">
                                    <img src="{{ url(IMAGE_PATH.$product->image4) }}" class="img-fluid main-product-img" alt="{{$product->alt4 ?? ''}}">
                                </div>
                                @endif
                                @if($product->image5 != '')
                                <div class="tab-pane fade" id="img5-pane" role="tabpanel" aria-labelledby="img5-tab">
                                    <img src="{{ url(IMAGE_PATH.$product->image5) }}" class="img-fluid main-product-img" alt="{{$product->alt5 ?? ''}}">
                                </div>
                                @endif
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-lg-5">

                    <div class="product-dtl-cnt">
                        <h4 class="product-dtl-title">{{ ucwords($product->pro_name) }}</h4>

                        <div class="price-box mb-4">
                            <!-- <span class="current-price">${{ $product->sp }}</span> -->
                            @if($product->discount != null)
                                <span class="current-price"> <strong>{{ $product->discount }}</strong></span>
                            @else
                                <span class="current-price"> <strong>${{ $product->sp }}</strong></span>
                            @endif
                            <!-- <span class="original-price">$80.65</span> -->
                        </div>

                        {!! $product->details !!}
                        <?php /* <p class="">
                            This first release of 5,000 bottles marks the beginning of the Devil’s Juice legacy.
                            Each bottle is crafted for collectors and fans who want to own a piece of the brand’s story.
                        </p>

                        <p class="product-desc">
                            Packaged in a premium gift box, this novelty edition is priced at $50 and available
                            exclusively
                            for pre-order.
                        </p>

                        <ul class="product-features">
                            <li>Only 5,000 bottles available.</li>
                            <li>Includes collector’s gift box.</li>
                            <li>$50 each — pre-order special pricing.</li>
                            <li>Ships once the first batch is bottled and approved.</li>
                        </ul> */ ?>

                        <div class="product-actions">
                            <div class="quantity-selector qty-wrapper" data-stock="{{ $product->stock }}">
                                <button class="qty-btn decrement" >-</button>
                                <span class="qty qty-value">1</span>
                                <button class="qty-btn increment" >+</button>
                            </div>
                           
                            <button class="add-cart-btn addToCart" data-pro_id="{{ $product->pro_id }}" data-qty="1" data-stock="{{ $product->stock }}">Pre-order</button>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <section class="product-description-tabs py-md-5">
        <div class="container">

            <!-- Tabs -->
            <ul class="nav nav-tabs justify-content-center product-tab-nav" id="productTabsUnique" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="descTabUnique" data-bs-toggle="tab"
                        data-bs-target="#descPaneUnique" type="button" role="tab">
                        Description
                    </button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="infoTabUnique" data-bs-toggle="tab" data-bs-target="#infoPaneUnique"
                        type="button" role="tab">
                        Additional information
                    </button>
                </li>
            </ul>

            <!-- Tab Content -->
            <div class="tab-content mt-4">

                <!-- Description Tab -->
                <div class="tab-pane fade show active" id="descPaneUnique" role="tabpanel">
                    <div class="tab-inner-text">

                        {!! $product->description !!}
                        <?php /* <h5 class="weight-700 mb-3">Born of fire, crafted in darkness.</h5>
                        <p>
                            Devil’s Juice Vodka is a bold expression of purity and power — distilled to perfection
                            for those who dare to taste
                            beyond the ordinary. Each bottle of Devil’s Barrel captures the spirit of rebellion,
                            blending meticulous craftsmanship
                            with an untamed edge.
                        </p>

                        <p>
                            From its crystal-clear smoothness to its devilishly refined finish, this limited-edition
                            release embodies temptation in
                            its purest form. Enclosed in a striking collector’s box, it’s not just vodka — it’s a
                            symbol of indulgence, rebellion,
                            and refined taste.
                        </p>

                        <h6 class="mt-4 weight-700 mb-3">Tasting Notes:</h6>
                        <p>
                            Smooth entry with subtle heat. Hints of grain sweetness balanced by a clean, lingering
                            finish.
                        </p>

                        <h6 class="mt-4 weight-700 mb-3">Perfect For:</h6>
                        <p>
                            Neat pours, bold cocktails, or as a centerpiece in any premium spirits collection.
                        </p> */ ?>

                    </div>
                </div>

                <!-- Additional Info Tab -->
                <div class="tab-pane fade" id="infoPaneUnique" role="tabpanel">
                    <div class="tab-inner-text">
                        <?php /* <p>• Bottle Volume: 750ml</p>
                        <p>• Alcohol: 40%</p>
                        <p>• Packaging: Premium collector’s gift box</p>
                        <p>• Edition: Limited to 5,000 units</p> */ ?>
                        {!! $product->additional_info !!}
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="product-dtl-hell-fire">
        <div class="container-fluid">
            <div class="row align-items-center g-4">
                <div class="col-lg-6">
                    <h3 class="hell-fire-heading weight-600">Our Signature Cocktails <br> By Devil’s Juice</h3>
                    <div class="hell-fire">
                        <h4 class="weight-600 text-30 mb-4">{{ $featuredcockt->cocktail_name ?? '' }}</h4>
                        {{ $featuredcockt->short_desc ?? ''}}
                        <?php /* <p>Fill a highball glass with ice. Pour in Devil’s Juics Vodka, add chili syrup, and top with
                            chilled ginger beer.</p>
                        <p>Finish with a fresh squeeze of lime and a quick stir. Garnish with a chili slice for that
                            devilish touch.</p> */ ?>

                        <h6>Ingredients : </h6>
                        {!! $featuredcockt->ingredients ?? '' !!}
                        <?php /* <ul>
                            <li>60 ml Devil’s Juics Vodka</li>
                            <li>120 ml Ginger Beer</li>
                            <li>15 ml Chili Syrup</li>
                            <li>A squeeze of Fresh Lime</li>
                            <li>Ice Cubes</li>
                            <li>Chili Slice or Lime Wheel (for garnish)</li>
                        </ul> */ ?>

                        <a href="{{ url('cocktails') }}" class="view-all">View all</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="{{ url(IMAGE_PATH. $featuredcockt->image) }}" alt="" class="w-100">
                </div>
            </div>
        </div>
    </section>

    <!-- The Devil’s Finest Creation -->
    <section class="creation panel-space">
        <div class="container-fluid">
            <h2 class="h2-heading mb-4">Related Products</h2>

            <div class="row g-4">
                <?php /* @if(isset($simiProduct) && $simiProduct->isNotEmpty())
                @foreach($simiProduct as $list)
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
                    <p class="text-danger">No Similar Product Available.</p>
                @endif */ ?>
                @if(isset($simiProduct) && $simiProduct->isNotEmpty())
                @foreach($simiProduct as $list)
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
                    <p class="text-danger">No Similar Product Available.</p>
                @endif
                <?php /* <div class="col-md-4">
                    <div class="product-card">
                        <div class="product-image">
                            <img src="{{ asset('assets/frontend/images/creation2.png') }}" alt="Devil's Juice Vodka">
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