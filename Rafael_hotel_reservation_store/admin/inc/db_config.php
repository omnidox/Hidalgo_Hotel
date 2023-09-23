<?php


// Admin Model
function getAdminByUsername($pdo, $username)
{
    $query = "SELECT * FROM admin_user WHERE username = :username";
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

function adminLoginDashboard($pdo, $username, $password)
{
    // Query the database for the user

    $user = getAdminByUsername($pdo, $username);

    // Check if the user exists and the password is correct
    if ($user && password_verify($password, $user['password'])) {
        // Login successful, start a session and redirect to the dashboard
        session_start();
        $_SESSION['user'] = $user;

        $current_user_id = $user['admin_user_id'];

        $_SESSION['user_id'] = $current_user_id; // Replace with the current user's ID

        echo "Password Works!";
        redirect('dashboard.php');
        // header('Location: dashboard.php');
        exit;
    } else {
        // Login failed, display an error message
        alert('error', 'Login failed - wrong password!');
    }
}

// Room model


function insert_room_data($pdo, $room_number, $price_per_night, $availability, $room_type, $max_occupancy, $room_description) {
    $stmt = $pdo->prepare("INSERT INTO room (room_number, price_per_night, availability, room_type, max_occupancy, room_description) 
                            VALUES (:room_number, :price_per_night, :availability, :room_type, :max_occupancy, :room_description)");
    $stmt->bindParam(':room_number', $room_number);
    $stmt->bindParam(':price_per_night', $price_per_night);
    $stmt->bindParam(':availability', $availability);
    $stmt->bindParam(':room_type', $room_type);
    $stmt->bindParam(':max_occupancy', $max_occupancy);
    $stmt->bindParam(':room_description', $room_description);
    $stmt->execute();
    return $stmt;
}


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

function getRoomData($pdo, $room_number) {
  $stmt = $pdo->prepare("SELECT * FROM room WHERE room_number = :room_number");
  $stmt->bindParam(':room_number', $room_number, PDO::PARAM_INT);
  $stmt->execute();
  $room = $stmt->fetch(PDO::FETCH_ASSOC);
  return $room;
}


function getRoomImages($pdo, $room_number) {
  $stmt = $pdo->prepare("SELECT * FROM room_images WHERE room_number_fk = :room_number");
  $stmt->bindParam(':room_number', $room_number, PDO::PARAM_INT);
  $stmt->execute();
  $room_images = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $room_images;
}

function deleteRoomImages($pdo, $room_number, $delete_images) {
  foreach ($delete_images as $delete_image) {
      // Delete the image file from the server
      $filename = "uploads/" . $delete_image;
      if (file_exists($filename)) {
          unlink($filename);
      }

      // Delete the image record from the database
      $stmt = $pdo->prepare("DELETE FROM room_images WHERE room_number_fk = :room_number AND room_image = :room_image");
      $stmt->bindParam(':room_number', $room_number, PDO::PARAM_INT);
      $stmt->bindParam(':room_image', $delete_image, PDO::PARAM_STR);
      $stmt->execute();
  }
}


function uploadRoomImages($pdo, $room_number, $new_images) {
  $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
  $room_id = $room_number;

  $total = count($new_images['name']);
  for ($i = 0; $i < $total; $i++) {
      $room_image = $new_images['name'][$i];
      $tmp_name = $new_images['tmp_name'][$i];

      $file_ext = strtolower(end(explode('.', $room_image)));

      if (in_array($file_ext, $allowed_types) === false) {
          echo "Only images with extensions jpg, jpeg, png and gif are allowed.";
          exit();
      }

      $new_file_name = uniqid('', true) . '.' . $file_ext;

      // Move the uploaded file to the server
      $upload_dir = "uploads/";
      $target_file = $upload_dir . $new_file_name;

      if (move_uploaded_file($tmp_name, $target_file)) {
          echo "File $new_file_name uploaded successfully.<br>";
      } else {
          echo "File upload failed.<br>";
      }

      // Insert the file name into the 'room_images' table
      $stmt = $pdo->prepare("INSERT INTO room_images (room_number_fk, room_image) 
                              VALUES (:room_id, :room_image)");
      $stmt->bindParam(':room_id', $room_id);
      $stmt->bindParam(':room_image', $new_file_name);
      $stmt->execute();
  }
}



// User Information

function initializeVariables() {
    global $first_name, $middle_name, $last_name, $password, $username, $apt_number, $street_number, $street_name, $user_picture;
    global $guest_phone_number, $guest_email, $errors;
  
    $first_name = $middle_name = $last_name = $password = $username = $apt_number = $street_number = $street_name = $user_picture = "";
    $guest_phone_number = $guest_email = "";
    $errors = array();
  }



  function validateInputFields(&$errors, $post) {

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

    return $errors;
}




  function process_user_picture(&$errors, &$user_picture) {
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

?>