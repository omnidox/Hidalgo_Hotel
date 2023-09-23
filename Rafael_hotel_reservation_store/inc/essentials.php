<?php

function guestLogin()
{
    // Check if the user is logged in
    // session_start();
    if (!isset($_SESSION['guest_user'])) {
        // If not, redirect to the login page
        redirect('login.php');
        // exit;
    }
    session_regenerate_id(true);
}

function redirect($url){
    header('Location: '. $url);
}

function alert($type, $msg)
{

    $bs_class = ($type == "success") ? "alert-success" : "alert-danger";

    echo <<<alert
    <div class="alert $bs_class alert-dismissible fade show custom-alert" role="alert">
     <strong class="me-3">$msg</strong>
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
alert;


}


?>