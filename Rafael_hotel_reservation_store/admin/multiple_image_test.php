<!DOCTYPE html>
<html>
<head>
	<title>Image Upload</title>
</head>
<body>
<form action="multiple_image_test.php" method="post" enctype="multipart/form-data">
    <label for="image_upload">Select Images:</label>
    <input type="file" name="image_upload[]" id="image_upload" multiple>
    <input type="submit" name="submit" value="Upload">
</form>

</body>
</html>

<?php
if(isset($_POST['submit'])){
    $target_dir = "uploads/";
    $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
    $files = $_FILES['image_upload'];

    foreach ($files['tmp_name'] as $key => $tmp_name) {
        $file_name = $files['name'][$key];
        $file_size = $files['size'][$key];
        $file_tmp = $files['tmp_name'][$key];
        $file_type = $files['type'][$key];
        $file_ext = strtolower(end(explode('.', $file_name)));
        
        if(in_array($file_ext, $allowed_types) === false){
            echo "Only images with extensions jpg, jpeg, png and gif are allowed.";
            exit();
        }

        if($file_size > 2097152){
            echo 'File size must be less than 2 MB';
            exit();
        }

        $new_file_name = uniqid('', true) . '.' . $file_ext;
        $target_file = $target_dir . $new_file_name;

        if(move_uploaded_file($file_tmp, $target_file)){
            echo "File $file_name uploaded successfully.<br>";
        }
        else{
            echo "File upload failed.<br>";
        }
    }
}
?>

