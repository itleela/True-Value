<?php

    require_once("connection.php");

    if(isset($_POST['submit']))
    {
      
        
            $UserYour_Name = $_POST['Your_Name'];
            $UserYour_Email = $_POST['Your_Email'];
            $UserSubject = $_POST['Subject'];
			$UserMessage = $_POST['Message'];
            

             $query = " insert into Contact(Your_Name,Your_Email,Subject,Message) values('$UserYour_Name','$UserYour_Email','$UserSubject','$UserMessage')";
            $result = mysqli_query($con,$query);
			
			if($result)
           {
             header("location:Contact.php");
            }
           else
            {
               echo '  Please Check Your Query ';
           }
    }
?>
   


