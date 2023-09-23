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
        <h1 class="h-font" style="text-align:center">Enjoy Our Facilities</h1>
    </header>
    <main>



        <div class="card mb-4 border-0 example-shadow">
            <div class="row g-0 p-3 align-items-center">
                <div class="col-md-6 mb-lg-0 mb-md-0 mb-3">
                    <img src="uploads/pool.jpg" class="img-fluid rounded">
                </div>
                <div class="col-md-6 px-lg-3 px-md-3 px-0">
                    <h5 class="mb-3">Enjoy Our Pool!</h5>

                    <div class="features mb-3">
                        <p>
                            Cool off and relax by our outdoor swimming pool. We provide pool towels and lounge chairs
                            for our guests.
                        </p>
                    </div>
                </div>
            </div>
        </div>



        <div class="card mb-4 border-0 example-shadow">
            <div class="row g-0 p-3 align-items-center">

                <div class="col-md-6 px-lg-3 px-md-3 px-0">
                    <h5 class="mb-3">Play in the Casino!</h5>

                    <div class="features mb-3">
                        <p>
                            All work and no play makes Jack a dull boy. Show Jack how play is really done at our casino!
                        </p>
                    </div>
                </div>
                <div class="col-md-6 mb-lg-0 mb-md-0 mb-3">
                    <img src="uploads/casino.jpg" class="img-fluid rounded">
                </div>
            </div>
        </div>




        <div class="card mb-4 border-0 example-shadow">
            <div class="row g-0 p-3 align-items-center">
                <div class="col-md-6 mb-lg-0 mb-md-0 mb-3">
                    <img src="uploads/spa.jpg" class="img-fluid rounded">
                </div>
                <div class="col-md-6 px-lg-3 px-md-3 px-0">
                    <h5 class="mb-3">Relax at the Spa!</h5>

                    <div class="features mb-3">
                        <p>
                            Pamper yourself with our spa services, which include massages, facials, and body treatments.
                            Our
                            experienced staff will ensure that you leave feeling refreshed and rejuvenated.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php require 'inc/footer.php'; ?>
</body>
</html>