<?php 
session_start(); 
// $_SESSION['email'] = ''; 
unset($_SESSION['a_id']); 
// session_destroy(); 
header('location:index.php'); 
?>
