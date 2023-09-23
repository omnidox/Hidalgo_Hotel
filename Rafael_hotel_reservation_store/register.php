<?php
// Connect to the database using PDO
require('inc/header.php');

// Initialize variables
global $first_name, $middle_name, $last_name, $password, $username, $apt_number, $street_number, $street_name, $user_picture, $city, $zip_code, $state, $country;
global $guest_phone_number, $guest_email, $errors;

$first_name = $middle_name = $last_name = $password = $username = $apt_number = $street_number = $street_name = $user_picture = $city = $zip_code = $state = $country = "";
$guest_phone_number = $guest_email = "";
$errors = array();

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input fields

    $input_fields = $_POST;
    validateInputFields($errors, $input_fields);

    // Process optional user picture

    process_user_picture($errors, $user_picture);

    // Validate guest phone number and email fields

    validate_contact_info($errors, $input_fields);

    // Insert data into database if no errors
    if (count($errors) == 0) {
        try {
            // Prepare and execute SQL statement to insert new guest user
            // Get the ID of the newly inserted guest user

            $guest_user_id = insertGuestUser($pdo, $first_name, $middle_name, $last_name, $password, $username, $apt_number, $street_number, $street_name, $user_picture, $city, $zip_code, $state, $country);

            // Insert guest user phone number if provided
            if (!empty($guest_phone_number)) {
                insertGuestUserPhoneNumber($pdo, $guest_user_id, $guest_phone_number);
            }

            // Insert guest user email if provided
            if (!empty($guest_email)) {
                insertGuestUserEmail($pdo, $guest_user_id, $guest_email);
            }

            // Redirect to success page
            header("Location: login.php");
            exit();

        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    } else {
        // Display errors if any
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
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


    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h3 class="text-center mb-4">Registration Page</h3>
                <form method="post" action="register.php" enctype="multipart/form-data">
                    <form method="post" enctype="multipart/form-data">

                        <div class="mb-3">

                            <label for="first_name">First Name:</label>
                            <input type="text" class="form-control" name="first_name" id="first_name" required>


                        </div>

                        <div class="mb-3">

                            <label for="middle_name">Middle Name:</label>
                            <input type="text" class="form-control" name="middle_name" id="middle_name">


                        </div>

                        <div class="mb-3">


                            <label for="last_name">Last Name:</label>
                            <input type="text" class="form-control" name="last_name" id="last_name" required>


                        </div>



                        <div class="mb-3">

                            <label for="username">Username:</label>
                            <input type="text" class="form-control" name="username" id="username" required>



                        </div>

                        <div class="mb-3">

                            <label for="password">Password:</label>
                            <input type="password" class="form-control" name="password" id="password" required>




                        </div>


                        <div class="mb-3">

                            <label for="apt_number">Apartment Number:</label>
                            <input type="text" class="form-control" name="apt_number" id="apt_number" required>


                        </div>

                        <div class="mb-3">

                            <label for="street_number">Street Number:</label>
                            <input type="text" class="form-control" name="street_number" id="street_number" required>


                        </div>

                        <div class="mb-3">

                            <label for="street_name">Street Name:</label>
                            <input type="text" class="form-control" name="street_name" id="street_name" required>


                        </div>

                        <div class="mb-3">

                            <label for="city">City:</label>
                            <input type="text" class="form-control" name="city" id="city" required>


                        </div>

                        <div class="mb-3">

                            <label for="zip_code">Zip Code:</label>
                            <input type="text" class="form-control" name="zip_code" id="zip_code" required>


                        </div>

                        <div class="mb-3">

                            <label for="state">State:</label>
                            <input type="text" class="form-control" name="state" id="state" required>


                        </div>

                        <div class="mb-3">

                            <label for="country">Country:</label>
                            <input type="text" class="form-control" name="country" id="country" required>


                        </div>

                        <div class="mb-3">

                            <label for="user_picture">User Picture:</label>
                            <input type="file" class="form-control" name="user_picture" id="user_picture">


                        </div>

                        <div class="mb-3">


                            <label for="guest_phone_number">Guest Phone Number:</label>
                            <input type="tel" class="form-control" name="guest_phone_number" id="guest_phone_number"
                                pattern="[0-9]{10}">

                        </div>

                        <div class="mb-3">

                            <label for="guest_email">Guest Email:</label>
                            <input type="email" class="form-control" name="guest_email" id="guest_email">


                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </form>
            </div>
        </div>
    </div>

    <?php require 'inc/footer.php'; ?>
</body>
</html>