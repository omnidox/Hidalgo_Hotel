<?php

// Start the session

require('inc/header.php');


if (isset($_POST['checkInDate']) && isset($_POST['checkOutDate'])) {
    $_SESSION['checkInDate'] = $_POST['checkInDate'];
    $_SESSION['checkOutDate'] = $_POST['checkOutDate'];
}

if (isset($_SESSION['checkInDate']) && isset($_SESSION['checkOutDate'])) {
    $checkInDate = $_SESSION['checkInDate'];
    $checkOutDate = $_SESSION['checkOutDate'];
    $rooms = getAvailableRooms($pdo, $checkInDate, $checkOutDate);
    if (count($rooms) === 0) {
        $message = "No rooms are available for the selected dates.";
    }
} else {
    $_SESSION['checkInDate'] = '';
    $_SESSION['checkOutDate'] = '';

    $checkInDate = $_SESSION['checkInDate'];
    $checkOutDate = $_SESSION['checkOutDate'];


    $rooms = view_rooms();
}

?>



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

<body class="bg-light">




    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">Our Rooms</h2>
        <div class="h-line bg-dark"></div>
    </div>


    <div class="container">
        <div class="row">

            <div class="col-lg-3 col-md-12 mb-lg-0 mb-4 px-lg-0">
                <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
                    <div class="container-fluid flex-lg-column align-items-stretch">
                        <h4 class="mt-2">Filters<h4>
                                <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse flex-column align-items-stretch mt-2"
                                    id="filterDropdown">


                                    <div class="border bg-light p-3 rounded mb-3">
                                        <div class="border bg-light p-3 rounded mb-3">
                                            <h5 class="mb-3" style="font-size: 18px;">Check Availability</h5>
                                            <form method="POST" action="">
                                                <label class="form-label" style="font-size: 14px;">Check-in</label>
                                                <input type="date" class="form-control shadow-none" name="checkInDate"
                                                    value="<?php echo $_SESSION['checkInDate'] ?? ''; ?>">
                                                <label class="form-label" style="font-size: 14px;">Check-out</label>
                                                <input type="date" class="form-control shadow-none" name="checkOutDate"
                                                    value="<?php echo $_SESSION['checkOutDate'] ?? ''; ?>">
                                                <button type="submit" class="btn btn-primary mt-3">Check
                                                    Availability</button>
                                                <button type="submit" class="btn btn-secondary mt-3"
                                                    onclick="resetDates()">Reset Dates</button>
                                            </form>
                                        </div>
                                    </div>


                                    <div class="border bg-light p-3 rounded mb-3">
                                        <h5 class="mb-3" style="font-size: 18px;">Facilities</h5>
                                        <div class="mb-2">
                                            <input type="checkbox" id="f1" class="form-check-input shadow-none me-1">
                                            <label class="form-check-label" for="f1" style="font-size: 14px;">Facility
                                                one</label>
                                        </div>
                                        <div class="mb-2">
                                            <input type="checkbox" id="f2" class="form-check-input shadow-none me-1">
                                            <label class="form-check-label" for="f2" style="font-size: 14px;">Facility
                                                two</label>
                                        </div>
                                        <div class="mb-2">
                                            <input type="checkbox" id="f3" class="form-check-input shadow-none me-1">
                                            <label class="form-check-label" for="f3" style="font-size: 14px;">Facility
                                                three</label>
                                        </div>
                                    </div>
                                    <div class="border bg-light p-3 rounded mb-3">
                                        <h5 class="mb-3" style="font-size: 18px;">Guests</h5>
                                        <div class="d-flex">
                                            <div class="me-3">
                                                <label class="form-label" style="font-size: 14px;">Adults</label>
                                                <input type="number" class="form-control shadow-none">
                                            </div>
                                            <div>
                                                <label class="form-label" style="font-size: 14px;">Children</label>
                                                <input type="number" class="form-control shadow-none">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                    </div>
                </nav>

            </div>

            <div class="col-lg-9 col-md-12 px-4">

                <table class="table table-striped">
                    <thead>
                        <tr>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Query the database to get the list of rooms
                        

                        // Loop through the rooms and display them in the table
                        foreach ($rooms as $room) {

                            echo '<div class="card mb-4 border-0 example-shadow">
                                    <div class="row g-0 p-3 align-items-center">
                                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                                            <img src="' . "admin/uploads/" . $room['images'][0] . '" class="img-fluid rounded">
                                        </div>
                                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                                            <h5 class="mb-3">' . $room['room_type'] . '</h5>
                
                                            <div class="features mb-3">
                                                <h6 class="mb-1">Description</h6>
                                                <p>' .
                                $room['room_description']
                                . '</p> 
                                            </div>
                
                                            <div class="guests">
                                                <h6 class="mb-1">Guests</h6>
                                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                                ' .
                                $room['max_occupancy']
                                . " guests" . '
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
                                            <h6 class="mb-4">' .
                                $room['price_per_night']
                                . " $ per night" . '</h6>';
                            
                            if (!($checkInDate == "") && !($checkOutDate=="")) {
                                echo '<a href="booking.php?room_number=' . $room['room_number'] . '&check_in_date=' . $checkInDate . '&check_out_date=' . $checkOutDate . '" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Book Now!</a>';
                            }
                            echo '</div>
                                    </div>
                                </div>';
                        }
                        ?>
                    </tbody>
                </table>






            </div>

        </div>
    </div>

    <?php require 'inc/footer.php'; ?>
</body>


</html>