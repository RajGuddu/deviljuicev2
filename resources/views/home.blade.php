@extends('_layouts.master')
@section('content')
<!-- <div class="banner homne-banner" style="background-image: url(images/banner.png);">
    <div class="container-fluid">
        <h1 class="banner-title">First 5,000 Bottles. One Legendary Box.</h1>
        <p class="banner-subtitle">Pre-order your Limited-Edition Devil’s Juice — only 5,000 bottles available. Each
            comes in an exclusive novelty gift box for collectors and true enthusiasts.</p>

        <a href="#" class="custom-btn">
            Pre-Order Now
        </a>
    </div>
</div> -->

<div class="video-hero-section homne-banner">
    @php
        $url = asset('assets/frontend/videos/temptation-video.mp4');
        if(isset($banner) && $banner->video != '')
            $url = url(VIDEO_PATH.$banner->video);
    @endphp
    <video class="bg-video" autoplay loop muted playsinline>
        <source src="{{ $url }}" type="video/mp4">
        <!-- Agar browser video nahi play kar pata, fallback text -->
        Your browser does not support the video tag.
    </video>
    <div class="overlay-content">
        <h2>{{ $banner->main_title ?? '' }}</h2>
        <p>
            {{ $banner->sub_title ?? '' }}
        </p>
    </div>
</div>
<!-- The Devil’s Finest Creation -->
<section class="creation panel-space">
    <div class="container-fluid">
        <h2 class="h2-heading">The Devil’s Finest Creation</h2>

        <div class="row g-4">
            <?php /*  @if(isset($products) && $products->isNotEmpty())
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
            @endif  */ ?>
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
                        @if($list->is_comming)
                        @elseif(MAINTAIN_STOCK == 'Yes' && $list->stock < 1)
                        @elseif($list->discount != null)
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
                            @if($list->is_comming)
                            <button class="view-all mt-0" onclick="window.location.href='{{ url('contact') }}'">Notify Me on Launch</button>
                            @elseif(MAINTAIN_STOCK == 'Yes' && $list->stock < 1)
                            <button class="view-all mt-0">Out of Stock</button>
                            @else
                            <button class="view-all mt-0 addToCart" data-pro_id="{{ $list->pro_id }}" data-qty="1" data-stock="{{ $list->stock }}">Add to cart</button>
                            @endif
                            @if($list->is_comming)
                            <span class="add-cart-btn coming-soon">Coming Soon</span>
                            @endif
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
                    <div class="product-image">
                        <img src="{{ asset('assets/frontend/images/21.png') }}" alt="Devil's Juice Vodka">
                    </div>
                    <div class="product-details">
                        <h2 class="product-title">Devil’s Juice Vodka</h2>
                        <p class="product-desc">Smooth as sin, born of fire, made to tempt.</p>
                        <span class="signle-price"> <strong>$49.99</strong></span>
                         <div class="product-actions">
                            <!-- <div class="quantity-selector">
                                <button class="qty-btn" id="decrement">-</button>
                                <span class="qty" id="qty-value">1</span>
                                <button class="qty-btn" id="increment">+</button>
                            </div> -->

                            <button class="view-all mt-0">Add to cart</button>
                            <span class="add-cart-btn coming-soon">Coming Soon</span>
                        </div>
                    </div>
                </div>

            </div>  */ ?>
        </div>
    </div>
</section>


<!-- Be First to Own Devil’s Juice -->

<!-- <section class="panel-space first-shots text-center overflow-hidden"
        style="background-image: url(images/fire-burning.jpg);">
        <h2 class="h2-heading weight-600 mb-4">Be First to Own Devil’s Juice </h2>
        <p class="w-50 mx-auto">Only 5,000 bottles will ever exist. Each one comes in an exclusive novelty gift box —
            crafted for collectors, thrill-seekers, and those who live bold.</p>
        <p class="weight-600 mt-4">$50 — includes the limited-edition gift box</p>
        <a href="#" class="custom-btn mt-4">
            Pre-Order Now
        </a>
        <div class="fire-botel-img">
            <img src="images/fire-botal.png" alt="">
        </div>
    </section> -->

<section class="panel-space first-shots text-center overflow-hidden">

    <!-- Background Video -->
    @php

        $url2 = asset('assets/frontend/videos/fire.mp4');
        if(isset($content) && $content->bg_video != '')
            $url2 = url(VIDEO_PATH.$content->bg_video);
    @endphp
    <video class="bg-video" autoplay muted loop playsinline>
        <source src="{{ $url2 }}" type="video/mp4">
    </video>

    <!-- Content -->
    <div class="content">
        <h2 class="h2-heading weight-600 mb-4">{{ $content->about_title ?? '' }}</h2>
        {!! $content->about_details ?? '' !!}
        <?php /* <p class="w-50 mx-auto">
            Only 5,000 bottles will ever exist. Each one comes in an exclusive novelty gift box —
            crafted for collectors, thrill-seekers, and those who live bold.
        </p>

        <p class="weight-600 mt-4">$50 — includes the limited-edition gift box</p> */ ?>

        <a href="{{ url('contact') }}" class="custom-btn mt-4">
            Pre-Order Now
        </a>
        @php
            $url3 = asset('assets/frontend/images/fire-botal.png');
            if(isset($content) && $content->about_image != '')
                $url3 = url(IMAGE_PATH.$content->about_image);
        @endphp
        <div class="fire-botel-img">
            <img src="{{ $url3 }}" alt="">
        </div>
    </div>
</section>

<!-- Witness the Art of Temptation -->

<section class="witness-art">
    <div class="container-fluid">
        <!-- <div class="video-hero-section">
                <video class="bg-video" autoplay loop muted playsinline>
                    <source src="videos/temptation-video.mp4" type="video/mp4">
                  
                    Your browser does not support the video tag.
                </video>
                <div class="overlay-content">
                    <h2>Witness the Art of Temptation</h2>
                    <p>
                        Step inside the world where fire meets finesse. Watch how every drop of Devil’s Juice Vodka is
                        born,
                        distilled in darkness, perfected in passion.
                    </p>
                </div>
            </div>

            <div class="devider my-4"></div> -->

        <div class="row g-4">
            <div class="col-md-6">
                <div class="coctel-slider">
                    @if(isset($cockSlides) && $cockSlides->isNotEmpty())
                    @foreach($cockSlides as $list)
                    <div class="item">
                        <div class="witness-art-slid-panel position-relative">
                            <img src="{{ url(IMAGE_PATH.$list->image) }}" alt="coctel" class="w-100">
                            <div class="witness-art-dtl">
                                <h3>COCKTAIL CREATIONS</h3>
                                <p>Where the daring pour their passion. Share your mix, show your fire, and become
                                    part of
                                    the Devil’s circle — one creation at a time.</p>
                                <a href="{{ url('cocktail-creation') }}" class="share-creation">Share Your Creation</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="row g-4">
                    @if(isset($cockRows) && $cockRows->isNotEmpty())
                    @foreach($cockRows as $list)
                    <div class="col-md-4">
                        <div class="witness-art-small-panel">
                            <img src="{{ url(IMAGE_PATH.$list->image) }}" alt="coctel" class="w-100">
                        </div>
                    </div>
                    @endforeach
                    @endif
                    <?php /* <div class="col-md-4">
                        <div class="witness-art-small-panel">
                            <img src="{{ asset('assets/frontend/images/creation1.png') }}" alt="coctel" class="w-100">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="witness-art-small-panel">
                            <img src="{{ asset('assets/frontend/images/creation2.png') }}" alt="coctel" class="w-100">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="witness-art-small-panel">
                            <img src="{{ asset('assets/frontend/images/coctel2.jpg') }}" alt="coctel" class="w-100">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="witness-art-small-panel">
                            <img src="{{ asset('assets/frontend/images/coctel3.jpg') }}" alt="coctel" class="w-100">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="witness-art-small-panel">
                            <img src="{{ asset('assets/frontend/images/coctel4.jpg') }}" alt="coctel" class="w-100">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="witness-art-small-panel">
                            <img src="{{ asset('assets/frontend/images/coctel5.jpg') }}" alt="coctel" class="w-100">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="witness-art-small-panel">
                            <img src="{{ asset('assets/frontend/images/coctel6.jpg') }}" alt="coctel" class="w-100">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="witness-art-small-panel">
                            <img src="{{ asset('assets/frontend/images/coctel.jpg') }}" alt="coctel" class="w-100">
                        </div>
                    </div> */ ?>
                </div>
            </div>
        </div>


        <div class="devider my-4"></div>

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


<!-- The Devil’s Hour -->

@include('_layouts/devil-hour')

@endsection