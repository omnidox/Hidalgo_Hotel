<?php
require('inc/header.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the search criteria from the form
    $search_email = $_POST['search_email'];
    $search_conf_number = $_POST['search_conf_number'];

    // Perform the search
    if (!empty($search_email)) {
        // Search by email
        $stmt = $pdo->prepare('SELECT * FROM reservation WHERE guest_user_id_fk IN (SELECT guest_user_id_fk FROM guest_email WHERE guest_email = :search_email)');
        $stmt->bindParam(':search_email', $search_email);

        $stmt->execute();
        $reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt = $pdo->prepare('SELECT room_number_fk FROM reserve_room WHERE conf_number_fk IN (SELECT conf_number FROM reservation WHERE guest_user_id_fk IN (SELECT guest_user_id_fk FROM guest_email WHERE guest_email = :search_email))');
        $stmt->bindParam(':search_email', $search_email);

        $stmt->execute();
        $room_number = $stmt->fetchAll(PDO::FETCH_ASSOC);


    } else if (!empty($search_conf_number)) {
        // Search by confirmation number
        $stmt = $pdo->prepare('SELECT * FROM reservation WHERE conf_number = :search_conf_number');
        $stmt->bindParam(':search_conf_number', $search_conf_number);

        $stmt->execute();
        $reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt = $pdo->prepare('SELECT room_number_fk FROM reserve_room WHERE conf_number_fk = :search_conf_number');
        $stmt->bindParam(':search_conf_number', $search_conf_number);

        $stmt->execute();
        $room_number = $stmt->fetchAll(PDO::FETCH_ASSOC);

    } else {
        // No search criteria provided
        echo 'Please provide a search criteria.';
        exit;
    }

    // $stmt->execute();
    // $reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Display the results
    if (count($reservations) == 0) {
        echo 'No reservations found.';
    } else {
        echo '<style>table { text-align: center; }</style>';
        echo '<style>th { padding: 10px; }</style>';
        echo '<style>td { padding: 10px; }</style>';
        echo '<table>';
        echo '<tr><th>Confirmation number</th><th>Room Number</th><th>Check-in date</th><th>Check-out date</th><th>Total cost</th></tr>';
        foreach ($reservations as $index => $reservation) {
            echo '<tr>';
            echo '<td>' . $reservation['conf_number'] . '</td>';
            echo '<td>' . $room_number[$index]['room_number_fk'] . '</td>';
            echo '<td>' . $reservation['ck_in_date'] . '</td>';
            echo '<td>' . $reservation['ck_out_date'] . '</td>';
            echo '<td>' . $reservation['total_cost'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
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
    <h1>Search for Reservation</h1>
    <form action="search.php" method="POST">
        <label for="search_email">Search by email:</label>
        <input type="text" name="search_email" id="search_email">
        <label for="search_conf_number">Search by confirmation number:</label>
        <input type="text" name="search_conf_number" id="search_conf_number">
        <input type="submit" value="Search">
    </form>
</body>
</html>