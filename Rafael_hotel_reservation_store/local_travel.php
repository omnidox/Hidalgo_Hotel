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
    <title>RH Hotel - Rooms</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <?php require('inc/links.php'); ?>
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
<body>

    <?php require 'inc/header.php'; ?>


    <header>
        <h1 class="h-font" style="text-align:center">Enjoy Our City</h1>
    </header>
    <main>



        <div class="card mb-4 border-0 example-shadow">
            <div class="row g-0 p-3 align-items-center">
                <div class="col-md-6 mb-lg-0 mb-md-0 mb-3">
                    <img src="uploads/hike.jpg" class="img-fluid rounded">
                </div>
                <div class="col-md-6 px-lg-3 px-md-3 px-0">
                    <h5 class="mb-3">Take a hike!</h5>

                    <div class="features mb-3">
                        <p>
                            Our hiking tours offer breathtaking views of the surrounding mountains and valleys. Whether
                            you are a seasoned hiker or just starting out, our experienced guides will lead you on a
                            safe and exhilarating adventure. Take in the fresh air and natural beauty while learning
                            about the local flora and fauna. Our tours range from easy to challenging, so there is
                            something for everyone. Come explore the great outdoors with us!
                        </p>
                    </div>
                </div>
            </div>
        </div>



        <div class="card mb-4 border-0 example-shadow">
            <div class="row g-0 p-3 align-items-center">

                <div class="col-md-6 px-lg-3 px-md-3 px-0">
                    <h5 class="mb-3">Enjoy the city!</h5>

                    <div class="features mb-3">
                        <p>
                            Discover the hidden gems of our city with our guided tours. From historic landmarks to
                            modern attractions, our tours offer a unique perspective on the city's culture and history.
                            Our knowledgeable guides will take you on a journey through time, sharing stories and
                            anecdotes along the way. Experience the local cuisine, music, and art scene as you explore
                            the vibrant neighborhoods that make our city so special. Let us show you the sights and
                            sounds of our beloved city.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 mb-lg-0 mb-md-0 mb-3">
                    <img src="uploads/city.jpg" class="img-fluid rounded">
                </div>
            </div>
        </div>




        <div class="card mb-4 border-0 example-shadow">
            <div class="row g-0 p-3 align-items-center">
                <div class="col-md-6 mb-lg-0 mb-md-0 mb-3">
                    <img src="uploads/museum.jpg" class="img-fluid rounded">
                </div>
                <div class="col-md-6 px-lg-3 px-md-3 px-0">
                    <h5 class="mb-3">Take a trip to the museum!</h5>

                    <div class="features mb-3">
                        <p>
                            Explore the world of art, science, and history with our museum tour. Our curated tour
                            offers a fascinating look at the exhibits and collections at oue city's renowned museum.
                            From ancient artifacts to contemporary masterpieces, our tour covers a
                            wide range of topics and interests. Our expert guides will provide context and insight,
                            bringing the exhibits to life and making the experience unforgettable. Whether you are a
                            lifelong museum-goer or a first-time visitor, our tour is sure to delight and inspire.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php require 'inc/footer.php'; ?>
</body>
</html>