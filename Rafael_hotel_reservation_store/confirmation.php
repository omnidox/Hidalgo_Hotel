<?php
require('inc/header.php');
guestLogin();

// Get the confirmation number from the last inserted row
$confirmation_number = $_GET['confirmation_number'];

// Get the booked room details
$room_number = $_GET['room_number'];
$check_in_date = $_GET['check_in_date'];
$check_out_date = $_GET['check_out_date'];
$room = getRoomDetails($pdo, $room_number);

// Calculate the total cost
$total_cost = calculateTotalCost($pdo, $room_number, $check_in_date, $check_out_date);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Booking Confirmation</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <?php require('inc/links.php'); ?>
</head>
<body>

    <div class="container mt-5">
        <h1>Booking Confirmation</h1>
        <hr>

        <div class="row">
            <div class="col-md-6">
                <h3>Booking Details</h3>
                <p><strong>Room Number:</strong> <?php echo $room_number; ?></p>
                <p><strong>Room Type:</strong> <?php echo $room['room_type']; ?></p>
                <p><strong>Check-in Date:</strong> <?php echo date('m-d-Y', strtotime($check_in_date)); ?></p>
                <p><strong>Check-out Date:</strong> <?php echo date('m-d-Y', strtotime($check_out_date)); ?></p>
                <p><strong>Number of Adults:</strong> <?php echo $_GET['num_adults']; ?></p>
                <p><strong>Number of Children:</strong> <?php echo $_GET['num_children']; ?></p>
            </div>

            <div class="col-md-6">
                <h3>Payment Details</h3>
                <p><strong>Total Cost:</strong> $<?php echo $total_cost; ?></p>
                <p><strong>Confirmation Number:</strong> <?php echo $confirmation_number; ?></p>
                <p><strong>Payment Method:</strong> Credit Card</p>
            </div>

            <div class="col-md-6">
                <h3>Billing Address</h3>
                <p><strong>Apt Number:</strong> <?php echo $_SESSION['apt_number']; ?></p>
                <p><strong>Street Address:</strong> <?php echo $_SESSION['street_number'] . " " .  $_SESSION['street_name']; ?></p>
                <p><strong>City:</strong> <?php echo $_SESSION['city']; ?></p>
                <p><strong>State:</strong> <?php echo $_SESSION['state']; ?></p>
                <p><strong>Zip Code:</strong> <?php echo $_SESSION['zip_code']; ?></p>
                <p><strong>Country:</strong> <?php echo  $_SESSION['country']; ?></p>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-12 text-center">
                <p>Thank you for booking with us!</p>
                <a href="index.php" class="btn btn-primary">Back to Home</a>
            </div>
        </div>
    </div>


    <?php require 'inc/footer.php';?>
</body>
</html>
