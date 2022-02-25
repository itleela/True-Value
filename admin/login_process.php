<?php 
	session_start();
	require 'config.php';
	// Data fetch
	 $email = $_POST['email'];
	 $pwd = $_POST['password'];

	 // Query
	 $select_sql = "SELECT * FROM owner_register WHERE Email='$email'";
	 // echo $select_sql;
	 $result = $conn->query($select_sql);

	 if ($result->num_rows>0) {
	 	while ($row = $result->fetch_assoc()) {
	 			$email_verify = $row['Email'];
	 			$pwd_verify = $row['Password'];
	 			$id = $row['id'];
	 			$name = $row['Name'];
	 			if($email == $email_verify && $pwd == $pwd_verify){

	 				// echo "Login Successfull";
	 				header('Location:dashboard.php');
	 				echo $_SESSION["a_email"] = $email_verify;
	 				echo $_SESSION["a_name"] = $name;
	 				echo $_SESSION["a_id"] = $id;

	 			}else{
	 				echo "Login Error";
	 				header('Location:index.php');
	 			}
	 	}
	 }
?>