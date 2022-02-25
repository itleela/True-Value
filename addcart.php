<?php 
session_start();

include 'connection.php';

if(!isset($_SESSION["id"]))
{
	header("location:home.php");
}
else
{
	$id = $_SESSION["id"];
}


	$pro_id = $_GET['res_id'];
	//echo $pro_id ;
	
	$Select_sql_products ="SELECT * FROM products where id = '$pro_id'";
	$data = mysqli_query($con, $Select_sql_products);
	$result = mysqli_num_rows($data);
	$row = mysqli_fetch_assoc($data);
	
	$p_img = $row['P_image'];
    $p_price = $row['P_price'];
    $p_name = $row['P_name'];
    $pid = $row['id'];
	
	
	
	
	
	
	
	$query = "insert into cart(product_id,p_name,p_image,qty,total_price,user_id)
	values('$pid','$p_name','$p_img','1','$p_price','$id')";
            $result = mysqli_query($con,$query);
			
			if($result)
           {
             header("location:home.php");
			 echo "register succefully";
			
            }


?>








  
