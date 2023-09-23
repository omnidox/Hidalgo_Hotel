<?php


// guest Model
function getGuestByUsername($pdo, $username)
{
    $query = "SELECT * FROM guest_user WHERE username = :username";
    $stmt = $pdo->prepare($query);
    $stmt->execute(array(':username' => $username));

    // Check if the current user is an admin
    if ($stmt->rowCount() == 0) {
        // The current user is not an admin
        die('Error: Inputted Username does not exist!');
    } else {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

}

function guestLoginDashboard($pdo, $username, $password)
{
    // Query the database for the user

    $user = getGuestByUsername($pdo, $username);

    // Check if the user exists and the password is correct
    if ($user && password_verify($password, $user['password'])) {
        // Login successful, start a session and redirect to the dashboard
        session_start();
        $_SESSION['guest_user'] = $user;

        // Replace with the current user's ID
        $_SESSION['user_id'] = $user['guest_user_id'];

        // Store the address fields in the session
        $_SESSION['apt_number'] = $user['apt_number'];
        $_SESSION['street_number'] = $user['street_number'];
        $_SESSION['street_name'] = $user['street_name'];
        $_SESSION['city'] = $user['city'];
        $_SESSION['zip_code'] = $user['zip_code'];
        $_SESSION['state'] = $user['state'];
        $_SESSION['country'] = $user['country'];

        redirect('index.php');
        // header('Location: dashboard.php');
        exit;
    } else {
        // Login failed, display an error message
        alert('error', 'Login failed - wrong password!');
    }
}

// Room model

function delete_room($room_number)
{
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM room WHERE room_number = :room_number");
    $stmt->bindParam(':room_number', $room_number);
    $stmt->execute();
    return true;
}


function edit_room($room_number, $price_per_night, $room_type, $max_occupancy, $room_description, $availability)
{
    global $pdo;
    $stmt = $pdo->prepare("UPDATE room SET price_per_night = :price_per_night, availability = :availability, room_type = :room_type, max_occupancy = :max_occupancy, room_description = :room_description WHERE room_number = :room_number");
    $stmt->bindParam(':room_number', $room_number);
    $stmt->bindParam(':price_per_night', $price_per_night);
    $stmt->bindParam(':availability', $availability);
    $stmt->bindParam(':room_type', $room_type);
    $stmt->bindParam(':max_occupancy', $max_occupancy);
    $stmt->bindParam(':room_description', $room_description);
    $stmt->execute();
    return true;
}


function view_rooms()
{
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM room");
    $rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Loop through the rooms and fetch the corresponding images
    foreach ($rooms as &$room) {
        $stmt = $pdo->prepare("SELECT room_image FROM room_images WHERE room_number_fk = ?");
        $stmt->execute([$room['room_number']]);
        $images = $stmt->fetchAll(PDO::FETCH_COLUMN);

        // Add the images to the room data
        $room['images'] = $images;
    }

    return $rooms;
}



// reservation models


function getAvailableRooms($pdo, $checkInDate, $checkOutDate)
{
    $stmt = $pdo->prepare("
        SELECT room_number, price_per_night, room_type, max_occupancy, room_description
        FROM room
        WHERE availability = 'vacant' AND room_number NOT IN (
            SELECT room_number_fk
            FROM reserve_room
            WHERE conf_number_fk IN (
                SELECT conf_number
                FROM reservation
                WHERE (ck_in_date <= :checkInDate AND ck_out_date >= :checkInDate)
                OR (ck_in_date <= :checkOutDate AND ck_out_date >= :checkOutDate)
            )
        )
    ");
    $stmt->bindParam(':checkInDate', $checkInDate);
    $stmt->bindParam(':checkOutDate', $checkOutDate);
    $stmt->execute();
    $rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Loop through the rooms and fetch the corresponding images
    foreach ($rooms as &$room) {
        $stmt = $pdo->prepare("SELECT room_image FROM room_images WHERE room_number_fk = ?");
        $stmt->execute([$room['room_number']]);
        $images = $stmt->fetchAll(PDO::FETCH_COLUMN);

        // Add the images to the room data
        $room['images'] = $images;
    }

    return $rooms;
}

function calculateTotalCost($pdo, $room_number, $checkin_date, $checkout_date)
{
    $stmt = $pdo->prepare("SELECT price_per_night FROM room WHERE room_number = ?");
    $stmt->execute([$room_number]);
    $price_per_night = $stmt->fetchColumn();
    $num_nights = ceil((strtotime($checkout_date) - strtotime($checkin_date)) / (60 * 60 * 24));
    $total_cost = $price_per_night * $num_nights;
    return $total_cost;
}

function checkMaxOccupancy($pdo, $room_number, $num_adults, $num_children)
{
    $stmt = $pdo->prepare("SELECT max_occupancy FROM room WHERE room_number = ?");
    $stmt->execute([$room_number]);
    $max_occupancy = $stmt->fetchColumn();

    if ($num_adults == 0) {
        throw new Exception("At least one adult is required in the booking.");
    }

    if ($num_adults + $num_children > $max_occupancy) {
        throw new Exception("The number of guests exceeds the maximum occupancy of the room.");
    }
}



function checkRoomAvailability($pdo, $room_number, $checkin_date, $checkout_date)
{
    $stmt = $pdo->prepare("SELECT * FROM reserve_room
                           JOIN reservation ON reserve_room.conf_number_fk = reservation.conf_number
                           WHERE reserve_room.room_number_fk = ?
                           AND reservation.ck_in_date < ?
                           AND reservation.ck_out_date > ?");
    $stmt->execute([$room_number, $checkout_date, $checkin_date]);
    $reservation = $stmt->fetch();
    if ($reservation) {
        throw new Exception("Room $room_number is not available for the selected dates.");
    }
}



function bookRooms($guest_user_id, $rooms, $num_adults, $num_children, $checkin_date, $checkout_date, $pdo)
{
    // Start a transaction
    $pdo->beginTransaction();

    try {
        // Check the maximum occupancy of each room
        foreach ($rooms as $room_number) {
            checkMaxOccupancy($pdo, $room_number, $num_adults, $num_children);
            checkRoomAvailability($pdo, $room_number, $checkin_date, $checkout_date);
        }

        // Calculate the total cost of the reservation
        $total_cost = 0;
        foreach ($rooms as $room_number) {
            $total_cost = calculateTotalCost($pdo, $room_number, $checkin_date, $checkout_date);
        }

        // Insert a new reservation into the reservation table
        $stmt = $pdo->prepare("INSERT INTO reservation (number_child, number_adult, ck_in_date, ck_out_date, total_cost, guest_user_id_fk)
                               VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$num_children, $num_adults, $checkin_date, $checkout_date, $total_cost, $guest_user_id]);
        $conf_number = $pdo->lastInsertId();

        // Insert entries into the reserve_room table for each room that was booked
        foreach ($rooms as $room_number) {
            $stmt = $pdo->prepare("INSERT INTO reserve_room (conf_number_fk, room_number_fk)
                                   VALUES (?, ?)");
            $stmt->execute([$conf_number, $room_number]);

            // Update the availability of the room
            // $stmt = $pdo->prepare("UPDATE room SET availability = 'not available' WHERE room_number = ?");
            // $stmt->execute([$room_number]);
        }

        // Commit the transaction
        $pdo->commit();

        return $conf_number;
    } catch (Exception $e) {
        // Roll back the transaction on failure
        $pdo->rollBack();
        throw $e;
    }
}



function getRoomDetails($pdo, $room_number)
{
    $stmt = $pdo->prepare("SELECT * FROM room WHERE room_number = ?");
    $stmt->execute([$room_number]);
    $room = $stmt->fetch();


    $stmt = $pdo->prepare("SELECT room_image FROM room_images WHERE room_number_fk = ?");
    $stmt->execute([$room['room_number']]);
    $images = $stmt->fetchAll(PDO::FETCH_COLUMN);

    // Add the images to the room data
    $room['images'] = $images;

    return $room;
}

// function getRoomImage($pdo, $room_number)
// {
//     $stmt = $pdo->prepare("SELECT room_image FROM room_images WHERE room_number_fk = ? LIMIT 1");
//     $stmt->execute([$room_number]);
//     return $stmt->fetchColumn();
// }

// User Information

function initializeVariables()
{
    global $first_name, $middle_name, $last_name, $password, $username, $apt_number, $street_number, $street_name, $user_picture;
    global $guest_phone_number, $guest_email, $errors;

    $first_name = $middle_name = $last_name = $password = $username = $apt_number = $street_number = $street_name = $user_picture = "";
    $guest_phone_number = $guest_email = "";
    $errors = array();
}



function validateInputFields(&$errors, $post)
{

    global $first_name, $middle_name, $last_name, $password, $username, $apt_number, $street_number, $street_name, $user_picture, $city, $zip_code, $state, $country;
    global $guest_phone_number, $guest_email;

    $first_name = trim($post["first_name"]);
    if (empty($first_name)) {
        array_push($errors, "First name is required");
    }

    $middle_name = trim($post["middle_name"]);

    $last_name = trim($post["last_name"]);
    if (empty($last_name)) {
        array_push($errors, "Last name is required");
    }

    $password = password_hash(trim($post["password"]), PASSWORD_DEFAULT);

    $username = trim($post["username"]);
    if (empty($username)) {
        array_push($errors, "Username is required");
    }

    $apt_number = trim($post["apt_number"]);
    if (empty($apt_number)) {
        array_push($errors, "Apartment number is required");
    }

    $street_number = trim($post["street_number"]);
    if (empty($street_number)) {
        array_push($errors, "Street number is required");
    }

    $street_name = trim($post["street_name"]);
    if (empty($street_name)) {
        array_push($errors, "Street name is required");
    }

    $city = trim($post["city"]);
    if (empty($city)) {
        array_push($errors, "City is required");
    }

    $zip_code = trim($post["zip_code"]);
    if (empty($zip_code)) {
        array_push($errors, "Zip Code is required");
    }

    $state = trim($post["state"]);
    if (empty($state)) {
        array_push($errors, "State is required");
    }

    $country = trim($post["country"]);
    if (empty($country)) {
        array_push($errors, "Country is required");
    }

    return $errors;
}




function process_user_picture(&$errors, &$user_picture)
{
    // Process optional user picture
    if ($_FILES["user_picture"]["name"] != "") {
        $target_dir = "uploads/";

        $room_image = $_FILES["user_picture"]['name'];

        $imageFileType = strtolower(end(explode('.', $room_image)));


        $allowed_types = array("jpg", "jpeg", "png", "gif");
        if (in_array($imageFileType, $allowed_types)) {


            $new_file_name = uniqid('', true) . '.' . $imageFileType;

            $target_file = $target_dir . $new_file_name;


            if (move_uploaded_file($_FILES["user_picture"]["tmp_name"], $target_file)) {
                $user_picture = $target_file;
            } else {
                array_push($errors, "Error uploading file");
            }
        } else {
            array_push($errors, "File type not allowed");
        }
    }
}

function validate_contact_info(&$errors, $post)
{

    global $guest_phone_number, $guest_email;

    $guest_phone_number = $post["guest_phone_number"];
    if (!empty($guest_phone_number)) {
        if (!preg_match("/^[0-9]{10}$/", $guest_phone_number)) {
            array_push($errors, "Guest phone number must be 10 digits");
        }
    }

    $guest_email = trim($post["guest_email"]);
    if (!empty($guest_email)) {
        if (!filter_var($guest_email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Invalid guest email format");
        }
    }
}

// Prepare and execute SQL statement to insert new guest user
function insertGuestUser(&$pdo, $first_name, $middle_name, $last_name, $password, $username, $apt_number, $street_number, $street_name, $user_picture, $city, $zip_code, $state, $country)
{
    $stmt = $pdo->prepare("INSERT INTO guest_user (first_name, middle_name, last_name, password, username, apt_number, street_number, street_name, user_picture, city, zip_code, state, country) 
    VALUES (:first_name, :middle_name, :last_name, :password, :username, :apt_number, :street_number, :street_name, :user_picture, :city, :zip_code, :state, :country)");

    $stmt->bindParam(':first_name', $first_name);
    $stmt->bindParam(':middle_name', $middle_name);
    $stmt->bindParam(':last_name', $last_name);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':apt_number', $apt_number);
    $stmt->bindParam(':street_number', $street_number);
    $stmt->bindParam(':street_name', $street_name);
    $stmt->bindParam(':user_picture', $user_picture);
    $stmt->bindParam(':city', $city);
    $stmt->bindParam(':zip_code', $zip_code);
    $stmt->bindParam(':state', $state);
    $stmt->bindParam(':country', $country);

    $stmt->execute();
    return $pdo->lastInsertId();
}

function insertGuestUserPhoneNumber(&$pdo, $guest_user_id, $guest_phone_number)
{
    $stmt = $pdo->prepare("INSERT INTO guest_phone_number (guest_user_id_fk, guest_phone_number) VALUES (:guest_user_id, :phone_number)");
    $stmt->bindParam(':guest_user_id', $guest_user_id);
    $stmt->bindParam(':phone_number', $guest_phone_number);
    $stmt->execute();
}

function insertGuestUserEmail(&$pdo, $guest_user_id, $guest_email)
{
    $stmt = $pdo->prepare("INSERT INTO guest_email (guest_user_id_fk, guest_email) VALUES (:guest_user_id, :email)");
    $stmt->bindParam(':guest_user_id', $guest_user_id);
    $stmt->bindParam(':email', $guest_email);
    $stmt->execute();
}

?>