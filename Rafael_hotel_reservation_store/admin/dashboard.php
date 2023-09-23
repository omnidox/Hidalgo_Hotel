<?php

// Start the session
session_start();

require('inc/essentials.php');

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
    <title>Admin Panel - Dashboard</title>
    <?php require('inc/links.php'); ?>
    <style>
        .nav-link {
            font-size: 14px;
        }
    </style>
</head>
<body class="bg-light">

<?php require('inc/header.php')?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Assumenda doloribus fugiat exercitationem corrupti deleniti sapiente? Sunt hic ea nesciunt eius eum veritatis blanditiis cumque. Velit nobis repellendus, libero officiis accusantium modi quisquam laboriosam itaque, iste explicabo nostrum nesciunt earum! Laborum quasi et itaque cupiditate? Explicabo quisquam labore ipsam in nesciunt quia nobis aliquid asperiores quae voluptatibus hic eveniet consequuntur voluptates, facere veniam, nemo reiciendis magnam voluptate numquam amet facilis repellendus accusantium. Quaerat unde eligendi sequi amet et dolores accusamus excepturi totam maiores cum? Quas, asperiores, eius fuga soluta odit placeat eos doloremque, eveniet dicta vel ipsa? Exercitationem ea corrupti minima possimus facere, deserunt excepturi quia rerum? Suscipit, asperiores dolorem. Id, eius fugit. Odio fuga quam vero doloremque, earum sed animi alias provident neque necessitatibus consequatur voluptatem, ea omnis ducimus quos rerum exercitationem similique. Laboriosam ducimus ab consectetur eos corporis cum, officia quibusdam repellat accusamus nostrum? Nostrum facilis cupiditate nisi quam tenetur amet modi ullam? Perspiciatis beatae facere praesentium suscipit omnis dignissimos. Dolore quaerat quisquam ratione nulla, consectetur unde iste sit ducimus totam omnis facilis fugiat sunt labore. Tempora, cumque. Earum natus veritatis ipsum voluptates odit officia placeat facilis nam labore repellendus possimus repudiandae vel ratione quae quidem eum ipsa animi blanditiis, ab accusamus, harum iste eius laboriosam! Fugiat ex debitis provident reprehenderit itaque adipisci nesciunt animi suscipit magnam qui saepe quis reiciendis est consequatur, earum repellendus, illum veniam ad necessitatibus exercitationem eligendi. Aperiam modi esse deserunt velit iste? Vel officiis, explicabo delectus non eos, ut architecto illum vero neque et facere provident, sed aut sequi impedit quis blanditiis tempora rerum. Quos velit, unde necessitatibus inventore vel ipsam iste quam soluta totam autem accusamus hic, saepe harum! Dolore porro maxime nisi 
            </div>
        </div>
    </div>
    
    <?php require('inc/scripts.php'); ?>
</body>
</html>