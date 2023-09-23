<?php

// Start the session
session_start();

require('inc/essentials.php');
require('inc/db_connect.php');
require('inc/db_config.php');
adminLogin();

// Get the user data from the session
$user = $_SESSION['user'];

// Check if the room number is set
if(isset($_GET['room_number'])){

    // Get the room number from the URL
    $room_number = $_GET['room_number'];

    // Delete the room from the database
    delete_room($room_number);

    // Redirect to the rooms page
    header('Location: rooms.php');
    exit();

}

?>