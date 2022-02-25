<?php
session_start();
require 'config.php';

// Fetch Data
$pro_id = $_POST['p_id'];
$p_name = $_POST['p_name'];
$p_price = $_POST['price'];


// Image
$target_dir = "upload/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image2wbmp(image)
if (isset($_POST['submit'])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }



// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

// Query
$insert_sql = "UPDATE  `products` set `P_name` = '$p_name', `P_price` = '$p_price', `P_image` = '$target_file'  where id = '$pro_id'";
// echo $insert_sql;

if ($conn->query($insert_sql) === TRUE) {
    echo "Data Inserted";
    header('Location:manage_products.php');
} else {
    ?>
    <script type="text/javascript">
        alert("Error In Inserting Resources");
    </script>
    <?php
    header('Location:dashboard.php');
}
}
?>