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

<div class="cocktail-creation panel-space mt-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6">
                <div class="uploading-panel">
                    <h4 class="fw-bold mb-3 text-white">Upload Your Cocktail Creation</h4>
                    <?php if(Session::has('message')){ 
                        echo alertBS(session('message')['msg'], session('message')['type']);
                    } ?>

                    <div class="upload-area d-flex flex-column justify-content-center align-items-center">

                        <div class="upload-icon-wrapper">
                            <i class="fa-regular fa-image main-icon"></i>
                            <i class="fa-solid fa-plus plus-icon"></i>
                        </div>

                        <p class="upload-text">Drag & drop your cocktail photo into the box or browse</p>
                        <p class="support-text">Support JPG, PNG, JPEG & WEBP</p>

                        <!-- <input type="file" class="d-none" id="fileInput" name="cocktail_image" accept="image/*"> -->
                        @error('cocktail_image')
                            <small class="text-danger d-block mt-2">{{ $message }}</small>
                        @enderror

                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="bg-white p-4">
                    <h2 class="fw-bold mb-4 text-black text-28">Tell us what you’ve crafted.</h2>

                    <form action="{{ url()->current() }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="cocktail_image" id="fileInput" class="d-none" accept="image/*">
                        <div class="mb-3">
                            <label class="form-label">Your Name</label>
                            <input type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name"  value="{{ old('user_name') }}" placeholder="Who's behind this creation?">
                            @error('user_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Instagram user name <span
                                    class="optional-text">(optional)</span></label>
                            <input type="text" class="form-control" name="instagram" value="{{ old('instagram') }}"
                                placeholder="Add your @handle so we can credit you in the Devil's Circle.">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Cocktail Name</label>
                            <input type="text" class="form-control @error('cocktail_name') is-invalid @enderror" name="cocktail_name" value="{{ old('cocktail_name') }}" placeholder="Give your drink a bold, unforgettable title.">
                            @error('cocktail_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Short Description <span
                                    class="optional-text">(optional)</span></label>
                            <input type="text" class="form-control" name="description" value="{{ old('description') }}" placeholder="A fiery one-liner that captures the soul of your cocktail.">
                        </div>

                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <label class="form-label m-0">Ingredients</label>
                                <!-- <div class="editor-toolbar">
                                    <i class="fa-solid fa-bold" data-action="bold"></i>
                                    <i class="fa-solid fa-italic" data-action="italic"></i>
                                    <i class="fa-solid fa-list" data-action="list"></i>
                                </div> -->
                            </div>
                            <div class="rich-editor-box form-control @error('ingredients') is-invalid @enderror">
                                <textarea name="ingredients" class="editor-textarea " placeholder="List everything that went into your mix — from the base to the final flourish.">{{ old('ingredients') }}</textarea>
                               
                            </div>
                            @error('ingredients')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <label class="form-label m-0">Instructions</label>
                                <!-- <div class="editor-toolbar">
                                    <i class="fa-solid fa-bold" data-action="bold"></i>
                                    <i class="fa-solid fa-italic" data-action="italic"></i>
                                    <i class="fa-solid fa-list" data-action="list"></i>
                                </div> -->
                            </div>
                            <div class="rich-editor-box form-control @error('instructions') is-invalid @enderror">
                                <textarea name="instructions" class="editor-textarea " placeholder="Break down your ritual, step by step, so others can recreate your magic.">{{ old('instructions') }}</textarea>
                                
                            </div>
                            @error('instructions')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-submit w-100">Publish Cocktail</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

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