<?php

// Start the session
session_start();

require('inc/essentials.php');
require('inc/db_connect.php');
require('inc/db_config.php');
adminLogin();

// Get the user data from the session
$user = $_SESSION['user'];

$action_done = false;

if (isset($_GET['room_number'])) {
    $room_number = $_GET['room_number'];

} elseif (isset($_POST['room_number'])) {

    $room_number = $_POST['room_number'];
}



// Fetch the room information from the database

$room = getRoomData($pdo, $room_number);

// Fetch the room images from the database

$room_images = getRoomImages($pdo, $room_number);

// Extract the values from the room array for use in the HTML form
$price_per_night = $room['price_per_night'];
$availability = $room['availability'];
$room_type = $room['room_type'];
$max_occupancy = $room['max_occupancy'];
$room_description = $room['room_description'];


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
    if (isset($_POST["delete_images"])) {

        deleteRoomImages($pdo, $room_number, $_POST["delete_images"]);

        
    }

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

        // Edit the room data into the 'room' table


        // Get the room ID
        $room_id = $room_number;

        edit_room($room_number, $price_per_night, $room_type, $max_occupancy, $room_description, $availability);

        if ($_FILES['new_images']['name'][0] == "") {
            echo "There are no images uploaded";
        } else {
            // Upload the room image(s) to the server and insert the file name(s) into the 'room_images' table

            uploadRoomImages($pdo, $room_number, $_FILES['new_images']);

        }

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
                <h3 class="text-center mb-4">Edit Room <?php echo $room_number; ?></h3>


                <form method="post" action="edit_room.php" enctype="multipart/form-data">
                    <input type="hidden" name="room_number" value="<?php echo $room_number; ?>">
                    <div class="form-group">
                        <label for="price_per_night">Price per night</label>
                        <input type="text" class="form-control" id="price_per_night" name="price_per_night"
                            value="<?php echo $price_per_night; ?>">
                    </div>
                    <div class="form-group">
                        <label for="availability">Availability</label>
                        <select class="form-control" id="availability" name="availability">
                            <option value="vacant" <?php if ($availability == "vacant")
                                echo "selected"; ?>>Vacant
                            </option>
                            <option value="not available" <?php if ($availability == "not available")
                                echo "selected"; ?>>
                                Not Available</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="room_type">Room type</label>
                        <input type="text" class="form-control" id="room_type" name="room_type"
                            value="<?php echo $room_type; ?>">
                    </div>
                    <div class="form-group">
                        <label for="max_occupancy">Max occupancy</label>
                        <input type="text" class="form-control" id="max_occupancy" name="max_occupancy"
                            value="<?php echo $max_occupancy; ?>">
                    </div>
                    <div class="form-group">
                        <label for="room_description">Room description</label>
                        <textarea class="form-control" id="room_description" name="room_description" rows="3">
                            <?php echo $room_description; ?>
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="existing_images">Choose which images to delete</label>
                        <div id="existing_images">
                            <?php foreach ($room_images as $room_image): ?>
                                <div class="existing-image">
                                    <input type="checkbox" name="delete_images[]"
                                        value="<?php echo $room_image['room_image']; ?>">
                                    <img src="<?php echo 'uploads/' . $room_image['room_image']; ?>" class="img-thumbnail"
                                        width="200">
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="new_images">Choose which images to add</label>
                        <div id="new_images">
                            <input type="file" name="new_images[]" multiple>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>

    <?php require('inc/scripts.php'); ?>
</body>
</html>