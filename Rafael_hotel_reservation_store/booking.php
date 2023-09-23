<?php
require('inc/header.php');

guestLogin();

// Get the room number, check-in date, and check-out date from the query string
$room_number = $_GET['room_number'];
$check_in_date = $_GET['check_in_date'];
$check_out_date = $_GET['check_out_date'];

// Get room details and image
$room = getRoomDetails($pdo, $_GET['room_number']);

$total_cost = calculateTotalCost($pdo, $room_number, $check_in_date, $check_out_date);


// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the number of adults and children from the form
    $num_adults = $_POST['num_adults'];
    $num_children = $_POST['num_children'];

    // Book the room
    try {
        $confirmation_number = bookRooms($_SESSION['guest_user']['guest_user_id'], [$room_number], $num_adults, $num_children, $check_in_date, $check_out_date, $pdo);
        // Redirect to the confirmation page

        $url = "confirmation.php?room_number=$room_number&check_in_date=$check_in_date&check_out_date=$check_out_date&confirmation_number=$confirmation_number&num_adults=$num_adults&num_children=$num_children";


        header("Location: $url");
        exit;
    } catch (Exception $e) {
        // Handle the error
        $error = $e->getMessage();
    }
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




    <h1>Book Room
        <?php echo $room['room_number']; ?>
    </h1>

    <?php if (isset($error)): ?>
        <div class="alert alert-danger">
            <?php echo $error; ?>
        </div>
    <?php endif; ?>

    <form method="POST">

        <?php
        foreach ($room['images'] as $image) {
            echo '<img src="' . "admin/uploads/" . $image . '" width="500">';
        }
        ?>
        <div class="form-group">
            <label for="num_adults">Number of Adults</label>
            <input type="number" class="form-control" name="num_adults" id="num_adults" value="1" min="1" required>
        </div>

        <div class="form-group">
            <label for="num_children">Number of Children</label>
            <input type="number" class="form-control" name="num_children" id="num_children" value="0" min="0" required>
        </div>

        <div class="form-group">
            <label for="check_in_date">Check-in Date</label>
            <p class="form-control-static">
                <?php echo date('m-d-Y', strtotime($check_in_date)); ?>
            </p>
        </div>

        <div class="form-group">
            <label for="check_out_date">Check-out Date</label>
            <p class="form-control-static">
                <?php echo date('m-d-Y', strtotime($check_out_date)); ?>
            </p>
        </div>

        <h3 class="text-center mb-4">Total Cost: $
            <?php echo $total_cost; ?>
        </h3>

        <button type="submit" class="btn btn-primary">Book Now</button>
    </form>


    <?php require('inc/footer.php'); ?>
</body>

</html>