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
                <a class="navbar-brand" href="#">
                    <img src="images/devel-log.png" alt="">
                </a>
                <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button> -->

                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <!-- <span class="navbar-toggler-icon"> <i class="fa-solid fa-bars text-white"></i> </span> -->
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>

                </button>

                <div class="collapse navbar-collapse" id="navbarsExample05">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link text-white active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" aria-current="page" href="#">Our Vodka</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" aria-current="page" href="#">The Story</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" aria-current="page" href="#">Cocktails</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" aria-current="page" href="#">Cocktails CLUB</a>
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

    <div class="cocktail-creation panel-space mt-5">
        <div class="container">
            <h2 class="h2-heading mb-4">{{ $content->sec6_title }}</h2>
            <p class="text-white mb-5 w-75">{{ $content->sec6_description }}</p>
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="bg-white p-4">
                        <form id="contactForm">
                            <div class="mb-3">
                                <label class="form-label">Your Name</label>
                                <input type="text" name="uname" value="" class="form-control" placeholder="Tell us who we’re speaking to.">
                                <small id="name-error" class="text-danger"></small>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">E-mail address </label>
                                <input type="email" name="email" value="" class="form-control"
                                    placeholder="So we can whisper a reply back to you.">
                                <small id="email-error" class="text-danger"></small>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Subject</label>
                                <input type="text" name="subject" value="" class="form-control" placeholder="What’s this conversation about?">
                                <small id="subject-error" class="text-danger"></small>
                            </div>


                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <label class="form-label m-0">Message</label>
                                    <!-- <div class="editor-toolbar">
                                        <i class="fa-solid fa-bold"></i>
                                        <i class="fa-solid fa-italic"></i>
                                        <i class="fa-solid fa-list"></i>
                                    </div> -->
                                </div>
                                <div class="rich-editor-box">
                                    <textarea class="editor-textarea" name="message" placeholder="List everything that went into your mix — from the base to the final flourish."></textarea>
                                </div>
                                <small id="message-error" class="text-danger"></small>
                            </div>


                            <button type="submit" class="btn btn-submit w-100">Send to the Devil’s Desk</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h3 class="fw-bold mb-4 text-28">Prefer a More Direct Summon?</h3>

                    <div class="d-flex flex-column gap-3 mb-5">
                        <div class="d-flex align-items-center">
                            <i class="fa-solid fa-mobile-screen contact-icon fs-5"></i>
                            <span class="fs-6">{{ $settings->phone ?? '' }}</span>
                        </div>
                        <div class="m-0">
                            <a href="mailto:contact@devilsjuice.com" class="text-white">
                                <div class="d-flex align-items-center">
                                    <i class="fa-regular fa-envelope contact-icon fs-5"></i>
                                    <span class="fs-6">{{ $settings->email ?? '' }}</span>
                                </div>
                            </a>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="fa-regular fa-clock contact-icon fs-5"></i>
                            <span class="fs-6">{{ $settings->opening_hours ?? '' }}</span>
                        </div>
                    </div>

                    <div class="map-container">
                        <!-- <img src="{{ $settings->map_address }}" alt="Map Location" class="map-image"> -->
                         <iframe 
                            src="{{ $settings->map_address }}"
                            width="100%" 
                            height="400" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy">
                        </iframe>


                        <!-- <div class="office-card">
                            <h5 class="fw-bold mb-2">Visit our office</h5>
                            <p class="text-secondary mb-4" style="font-size: 0.9rem; line-height: 1.5;">
                                {{ $settings->address ?? '' }}
                            </p>
                            <a href="{{ $settings->map_direction }}" target="blank" class="btn btn-directions text-decoration-none">
                                Get Directions <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div> -->
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

</html> */ ?>

@endsection