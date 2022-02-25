
<?php
require 'config.php';
        
        
         $user_id=$_GET['uid'];

        $q="select Status from reparing_product where id='$user_id'";
		$data=mysqli_query($conn,$q);
		$total=mysqli_fetch_assoc($data);
		if($total['Status']==1){
			
			 $updateque="update reparing_product set Status=2 where  id='$user_id'"; 
             $result=mysqli_query($conn,$updateque);
            
             if($result){             
                header('location:home.php');
                }
		}
		
	
		?>
	
		
		
		
?>
		