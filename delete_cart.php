<?php 
session_start();

include 'connection.php';

if(isset($_SESSION["id"]))
{
$id = $_SESSION["id"];
}



  $cat_id = $_GET['c_id'];
  echo $cat_id;
  
  $del = "DELETE FROM `cart` WHERE cart_id= '$cat_id'";
  $data = mysqli_query($con, $del);
  
  if($data)
  {
	  header("location:view_cart.php");
  }
  
  



?>


	
	
	
	

	
	
	
	
	


