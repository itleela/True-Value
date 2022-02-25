<?php
session_start();
require_once("connection.php");

// Data Fetch
$Email = $_POST['Email'];
$Password = $_POST['Password'];

// Query
$select_sql = "SELECT * FROM customer_register Where email='$Email' ";
// echo $select_sql;

$result = $con->query($select_sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $email_verify = $row['email'];
        $password_verify = $row['password'];
        $phone = $row['phone'];
        $name = $row['name'];
        $id = $row['id'];
	
	
	
}
if(isset($_POST['submit']))
	{
        if ($Email == $email_verify && $Password == $password_verify)
		{
            $_SESSION["email"] = $email_verify;
            $_SESSION["name"] = $name;
            $_SESSION["id"] = $id;
            $_SESSION["phone"] = $phone;
            header('Location:home.php');

        } 		
    }
}
?>