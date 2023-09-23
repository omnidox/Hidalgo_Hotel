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
        <h1 class="h-font" style="text-align:center">Enjoy our Fine Dining!</h1>
    </header>
    <main>



        <div class="card mb-4 border-0 example-shadow">
            <div class="row g-0 p-3 align-items-center">
                <div class="col-md-6 mb-lg-0 mb-md-0 mb-3">
                    <img src="uploads/food.jpg" class="img-fluid rounded">
                </div>
                <div class="col-md-6 px-lg-3 px-md-3 px-0">
                    <h5 class="mb-3">Enjoy Our Food!</h5>

                    <div class="features mb-3">
                        <p>
                            At our fine dining restaurant, we pride ourselves on serving only the highest quality dishes
                            prepared with the freshest ingredients. Our menu is carefully crafted to satisfy even the
                            most discerning palate. From succulent steak to delicate seafood, our culinary team has
                            created an experience that will leave you craving more.
                        </p>
                    </div>
                </div>
            </div>
        </div>



        <div class="card mb-4 border-0 example-shadow">
            <div class="row g-0 p-3 align-items-center">

                <div class="col-md-6 px-lg-3 px-md-3 px-0">
                    <h5 class="mb-3">Enjoy Our Drinks!</h5>

                    <div class="features mb-3">
                        <p>
                            Pair your meal with one of our expertly crafted cocktails or choose from our extensive wine
                            list. Our bartenders are skilled at creating classic cocktails as well as inventive new
                            drinks, using only the finest ingredients. Whether you prefer a bold red wine or a
                            refreshing craft beer, we have a drink to satisfy your taste.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 mb-lg-0 mb-md-0 mb-3">
                    <img src="uploads/drinks.jpg" class="img-fluid rounded">
                </div>
            </div>
        </div>




        <div class="card mb-4 border-0 example-shadow">
            <div class="row g-0 p-3 align-items-center">
                <div class="col-md-6 mb-lg-0 mb-md-0 mb-3">
                    <img src="uploads/dj.jpg" class="img-fluid rounded">
                </div>
                <div class="col-md-6 px-lg-3 px-md-3 px-0">
                    <h5 class="mb-3">Vibe with our Nightly DJ!</h5>

                    <div class="features mb-3">
                        <p>
                            As the evening wears on, our fine dining restaurant transforms into a sophisticated
                            nightlife destination. Our nightly DJ creates an electric atmosphere, playing the latest
                            hits and classic tunes that will keep you dancing all night long. So whether you're looking
                            for a romantic dinner or a night out with friends, our restaurant offers the perfect
                            combination of fine dining and entertainment.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php require 'inc/footer.php'; ?>
</body>
</html>