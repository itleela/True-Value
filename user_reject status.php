
<?php


        include 'connection.php';
        
         $user_id =$_GET['uid'];
		 
		 echo $user_id;

        $q="select Status from reparing_product where id='$user_id'";
		$data=mysqli_query($con,$q);
		$total=mysqli_fetch_assoc($data);
		if($total['Status']==1){
			
			 $updateque="update reparing_product set Status=3 where  id='$user_id'"; 
             $result=mysqli_query($con,$updateque);
            
             if($result){             
                header('location:home.php');
                }
		}
		
	
		?>
	
		
		
		

		