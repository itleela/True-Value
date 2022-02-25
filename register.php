<?php

    require_once("connection.php");

    if(isset($_POST['submit']))
    {
      
        
            $Name = $_POST['Name'];
            $Phone = $_POST['Phone'];
            $Email = $_POST['Email'];
            $Password = $_POST['Password'];
			$City = $_POST['City'];
            $Address = $_POST['Address'];
           
			

             $query = " insert into customer_register(name,phone,email,password,city,address) 
			 values('$Name','$Phone','$Email','$Password','$City','$Address')";
            $result = mysqli_query($con,$query);
			
			if($result)
           {
             header("location:home.php");
            }
           else
            {
               echo '  Please Check Your Query ';
           }
    }
?>
   


