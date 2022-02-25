<?php

 require("connection.php");

    // Fetch Data
$c_id = $_POST["id"];
$name = $_POST["name"];
$description = $_POST["description"];
$date = $_POST["date"];
$address = $_POST["address"];


// Image
$move_target_dir = "admin/reparing_image/";
$move_image = $move_target_dir . basename($_FILES["fileToUpload"]["name"]);

$target_dir = "reparing_image/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image2wbmp(image)
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
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
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $move_image)) {
        echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

// Query
$insert_sql = "INSERT INTO reparing_product(c_id,name,description,image,reparing_date,address)VALUES
('$c_id','$name','$description','$target_file','$date','$address')";
// echo $insert_sql;

if ($con->query($insert_sql) === TRUE) {
    echo "Data Inserted";
    header('Location:home.php');
} else {
    ?>
    <script type="text/javascript">
        alert("Error In Inserting Resources");
    </script>
    <?php
    header('Location:home.php');
}
?>