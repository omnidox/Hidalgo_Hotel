<?php
require('inc/essentials.php');
require('inc/db_config.php');

session_start();
// Check if the user is logged in
if (isset($_SESSION['guest_user'])) {
    // If not, redirect to the login page
    redirect('index.php');
    exit;
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Panel</title>
    <?php require('inc/links.php'); ?>

    <style>
        div.login-form {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
        }
    </style>

</head>
<body class="bg-light">

    <div class="login-form text-center rounded bg-white example-shadow overflow-hidden">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <h4 class="bg-dark text-white py-3">
                Login Panel
            </h4>

            <h3 class="bg-dark text-white py-3">
                Please Login Prior to room booking
            </h3>
            <div class="p-4">
                <div class="mb-3">
                    <input name="guest-name" required type="text" class="form-control shadow-none text-center"
                        placeholder="Guest Name">
                </div>
                <div class="mb-4">
                    <input name="guest-pass" required type="password" class="form-control shadow-none text-center"
                        placeholder="Password">
                </div>
                <button name="login" type="submit" class="btn text-white custom-bg shadow-none">Login</button>
                <a href="index.php" class="btn text-white custom-bg shadow-none">Go Home</a>
            </div>
        </form>
    </div>



</body>



</html>

<?php
require('inc/links.php');
include('inc/db_connect.php');
// require('inc/essentials.php');

// Check for form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $username = $_POST['guest-name'];
    $password = $_POST['guest-pass'];

    //calls a function to login admin to dashboard
    guestLoginDashboard($pdo, $username, $password);
}

include('inc/db_close.php');

?>