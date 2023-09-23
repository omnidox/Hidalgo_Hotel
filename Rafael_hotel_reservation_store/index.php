<!DOCTYPE html>
<html lang="en">
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <![endif]-->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>RH Hotel</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <?php require('inc/links.php');?>
    <style>
        .availability-form {
            margin-top: -50px;
            z-index: 2;
            position: relative;
        }

        @media screen and (max-width: 575px) {
            .availability-form {
                margin-top: 25px;
                padding: 0 35px;
            }
        }
    </style>
</head>




<body class="bg-light">
    <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <?php require 'inc/header.php';?>

    <!-- carousel -->

    <div class="container-fluid px-lg-4 mt-4">
        <div class="swiper swiper-container">
            <div class="swiper-wrapper" style="height: 15em;">
                <div class="swiper-slide">
                    <img src="images/carousel/1.jpg" class="h-100 w-100 d-block">
                </div>
                <div class="swiper-slide">
                    <img src="images/carousel/2.jpg" class="h-100 w-100 d-block">
                </div>
                <div class="swiper-slide">
                    <img src="images/carousel/3.jpg" class="h-100 w-100 d-block">
                </div>
            </div>
        </div>
    </div>


    <!-- Our Amenities -->

    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Our Amenities</h2>

    <div class="container">
        <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
            <div class="col-lg-2 col-md-2 text-center bh-white rounded example-shadow py-4 my-3">
                <img src="images/amenities/Wireless-icon.svg" width="80px">
                <h5 class="mt-3">WiFi</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bh-white rounded example-shadow py-4 my-3">
                <img src="images/amenities/television.svg" width="80px">
                <h5 class="mt-3">TV</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bh-white rounded example-shadow py-4 my-3">
                <img src="images/amenities/air-conditioner-icon.svg" width="80px">
                <h5 class="mt-3">AC</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bh-white rounded example-shadow py-4 my-3">
                <img src="images/amenities/heater-icon.svg" width="80px">
                <h5 class="mt-3">Room Heater</h5>
            </div>
        </div>
    </div>


    <!-- Testimonials -->


    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Testimonials</h2>

    <div class="container mt-5">
        <!-- Swiper -->
        <div class="swiper swiper-testimonials">
            <div class="swiper-wrapper mb-5">

                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex align-items-center mb-3">
                        <img src="Images/amenities/air-conditioner-icon.svg" width="30px">
                        <h6 class="m-0 ms-2">Random user1</h6>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Odio praesentium voluptates commodi consectetur ducimus ullam at,
                        fuga culpa non repellat!
                    </p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div>

                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex align-items-center mb-3">
                        <img src="Images/amenities/air-conditioner-icon.svg" width="30px">
                        <h6 class="m-0 ms-2">Random user2</h6>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Odio praesentium voluptates commodi consectetur ducimus ullam at,
                        fuga culpa non repellat!
                    </p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div>

                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex align-items-center mb-3">
                        <img src="Images/amenities/air-conditioner-icon.svg" width="30px">
                        <h6 class="m-0 ms-2">Random user3</h6>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Odio praesentium voluptates commodi consectetur ducimus ullam at,
                        fuga culpa non repellat!
                    </p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div>

            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <!-- Reach Us -->

    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Reach Us</h2>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
                <iframe class="w-100 rounded" height="320"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3017.2402010477995!2d-74.19983198472754!3d40.86660257931531!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2fe352883ec55%3A0xeece028744cfc9ae!2sMontclair%20State%20University!5e0!3m2!1sen!2sus!4v1676683423854!5m2!1sen!2sus"
                    loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="bg-white p-4 rounded mb-4">
                    <h5>Call Us</h5>
                    <a href="tel: 555-555-5555" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill"></i>555-555-5555
                    </a>
                    <br>
                    <a href="tel: 555-555-5555" class="d-inline-block text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill"></i>555-555-5555
                    </a>
                </div>
                <div class="bg-white p-4 rounded mb-4">
                    <h5>Follow Us</h5>
                    <a href="#" class="d-inline-block mb-3">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-twitter me-1"></i> Twitter
                        </span>
                    </a>
                    <br>
                    <a href="#" class="d-inline-block mb-3">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-facebook me-1"></i> Facebook
                        </span>
                    </a>
                    <br>
                    <a href="#" class="d-inline-block">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-instagram me-1"></i> Instagram
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>



    <?php require 'inc/footer.php';?>


    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="" async defer></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".swiper-container", {
            spaceBetween: 30,
            effect: "fade",
            loop: true,
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            }
        });


        var swiper = new Swiper(".swiper-testimonials", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            slidesPerView: "3",
            loop: true,
            coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: false,
            },
            pagination: {
                el: ".swiper-pagination",
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                },
                640: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
            }
        });
    </script>
</body>

</html>