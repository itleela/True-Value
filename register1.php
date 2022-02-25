<?php

    require_once("connection.php");

    if(isset($_POST['Login']))
    {
      
        
           echo $UserName = $_POST['Name'];
            $UserEmail = $_POST['Email'];
            $UserPassword = $_POST['Password'];
			

             $query = "insert into owner_register(Name,Email,Password) values('$UserName','$UserEmail','$UserPassword')";
            $result = mysqli_query($con,$query);
			
			if($result)
           {
             header("location:register.php");
			 echo "register succefully";
			
            }
           else
            {
               echo '  Please Check Your Query ';
           }
    }
?>
   


