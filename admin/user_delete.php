<?php
require 'config.php';
// Data Fetch
$user_id = $_POST['usr_id'];
echo $user_id;
// Query
$delete_sql = "DELETE FROM register WHERE id='$user_id'";

$result = $conn->query($delete_sql);
if ($result) {
    echo "Row Deleted";
    header('location:users.php');
}


?>