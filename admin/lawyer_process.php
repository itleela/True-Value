<?php 
	//Import 
	require 'config.php';

	//Data Fetch
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$city = $_POST['lcity'];
	$address = $_POST['address'];

	//Query
	$insert_lawyer = "INSERT INTO `lawyer` (`l_name`, `l_email`, `l_phone`,`city`,`address`) VALUES ('$name','$email','$phone','$city','$address')";
	// echo $insert_lawyer;

	$result = $conn->query($insert_lawyer);

	echo $result;

	if ($result) {
		header('Location:lawyer.php');
	}else{
		echo "<script>alert('Error Occured')</script>";
		header('Location:lawyer.php');
	}

?>