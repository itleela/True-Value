<?php 
session_start();

include 'connection.php';

if(isset($_SESSION["id"]))
{
$id = $_SESSION["id"];
}



if(isset($_POST['submit']))
{

	
	$cat_qty= $_POST['c_qty'];
	$cat_id= $_POST['cart_id'];
	//echo $pro_id ;
	
	$query ="SELECT * FROM cart where cart_id = '$cat_id'";
	$data = mysqli_query($con, $query);
	$result = mysqli_num_rows($data);
	$row = mysqli_fetch_assoc($data);
	
	$c_q = $row['qty'];
    $c_id = $row['cart_id'];
   
	//echo $c_id,$c_q ;
	
	$update_cart = "UPDATE  `cart` set `qty` = '$cat_qty' where cart_id = '$cat_id'";
	$data1 = mysqli_query($con, $update_cart);
	
	
	if($data1)
	{
		header("location:view_cart.php");
	}

	
	
	
	
}



	
	
	
	


?>