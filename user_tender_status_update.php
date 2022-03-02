<?php


        include 'connection.php';
        
         $tender_id =$_GET['tender_id'];
		 
		 echo $user_id;

        $q="select Status from tender_table where tender_id='$tender_id'";
		$data=mysqli_query($con,$q);
		$total=mysqli_fetch_assoc($data);
		if($total['Status']==1){
			
			 $updateque="update tender_table set Status=2 where  tender_id='$tender_id'"; 
             $result=mysqli_query($con,$updateque);
            
             if($result){             
                header('location:tender.php');
                }
		}
		
	
		?>