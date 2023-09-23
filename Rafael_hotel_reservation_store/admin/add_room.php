<?php

// Start the session
session_start();

require('inc/essentials.php');
require('inc/db_connect.php');
require('inc/db_config.php');
adminLogin();

// Get the user data from the session
$user = $_SESSION['user'];

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {



    // Get the form data
    $room_number = $_POST['room_number'];
    $price_per_night = $_POST['price_per_night'];
    $availability = $_POST['availability'];
    $room_type = $_POST['room_type'];
    $max_occupancy = $_POST['max_occupancy'];
    $room_description = $_POST['room_description'];

    try {
        // Begin the transaction
        $pdo->beginTransaction();

        // Insert the room data into the 'room' table

        insert_room_data($pdo, $room_number, $price_per_night, $availability, $room_type, $max_occupancy, $room_description);

        // Get the room ID
        $room_id = $room_number;



        // Upload the room image(s) to the server and insert the file name(s) into the 'room_images' table
        uploadRoomImages($pdo, $room_number, $_FILES['room_image']);

        // Commit the transaction
        $pdo->commit();

        // Redirect to the success page
        header("Location: rooms.php");
        exit();
    } catch (PDOException $e) {
        // Roll back the transaction and display the error message
        $pdo->rollBack();
        echo "Error: " . $e->getMessage();
    }

    // Close the database connection
    $pdo = null;





}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Rooms</title>
    <?php require('inc/links.php'); ?>
    <style>
        .nav-link {
            font-size: 14px;
        }
    </style>
</head>
<body class="bg-light">
    <?php require('inc/header.php'); ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h3 class="text-center mb-4">Add New Room</h3>
                <form method="post" action="add_room.php" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="room_number" class="form-label">Room Number</label>
                        <input type="number" class="form-control" id="room_number" name="room_number" required>
                    </div>
                    <div class="mb-3">
                        <label for="price_per_night" class="form-label">Price Per Night</label>
                        <input type="text" class="form-control" id="price_per_night" name="price_per_night" required>
                    </div>
                    <div class="mb-3">
                        <label for="availability" class="form-label">Availability</label>
                        <select class="form-select" id="availability" name="availability" required>
                            <option value="vacant">Vacant</option>
                            <option value="not available">Not Available</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="room_image" class="form-label">Room Image</label>
                        <input type="file" multiple class="form-control" id="room_image" name="room_image[]"
                            accept="image/*" required>
                    </div>
                    <div class="mb-3">
                        <label for="room_type" class="form-label">Room Type</label>
                        <input type="text" class="form-control" id="room_type" name="room_type" required>
                    </div>
                    <div class="mb-3">
                        <label for="max_occupancy" class="form-label">Max Occupancy</label>
                        <input type="number" class="form-control" id="max_occupancy" name="max_occupancy" required>
                    </div>
                    <div class="mb-3">
                        <label for="room_description" class="form-label">Room Description</label>
                        <textarea class="form-control" id="room_description" name="room_description"
                            required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Room</button>
                </form>
            </div>
        </div>
    </div>

    <?php require('inc/scripts.php'); ?>
</body>
</html>