<?php

// Start the session
session_start();

require('inc/essentials.php');
require('inc/db_connect.php');
require('inc/db_config.php');
adminLogin();

// Get the user data from the session
$user = $_SESSION['user'];

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

    <?php require('inc/header.php') ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">Rooms</h3>

                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Room Number</th>
                                    <th>Price per Night</th>
                                    <th>Availability</th>
                                    <th>Room Type</th>
                                    <th>Max Occupancy</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Query the database to get the list of rooms
                                $rooms = view_rooms();

                                // Loop through the rooms and display them in the table
                                foreach ($rooms as $room) {
                                    echo '<tr>';
                                    echo '<td>' . $room['room_number'] . '</td>';
                                    echo '<td>' . $room['price_per_night'] . '</td>';
                                    echo '<td>' . $room['availability'] . '</td>';
                                    echo '<td>' . $room['room_type'] . '</td>';
                                    echo '<td>' . $room['max_occupancy'] . '</td>';

                                    echo '<td>';
                                    echo '<a href="edit_room.php?room_number=' . $room['room_number'] . '" class="btn btn-primary">Edit</a> ';
                                    echo '<a href="delete_room.php?room_number=' . $room['room_number'] . '" class="btn btn-danger">Delete</a>';
                                    echo '</td>';

                                    echo '<tr>';
                                    echo '<td>';
                                    foreach ($room['images'] as $image) {
                                        echo '<img src="' . "uploads/" . $image . '" width="100">';
                                    }
                                    echo '</td>';




                                    echo '</tr>';


                                    echo '</tr>';
                                }
                                ?>
                            </tbody>
                        </table>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <a href="add_room.php" class="btn btn-success">Add Room</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php require('inc/scripts.php'); ?>
</body>
</html>