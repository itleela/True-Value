
<?php



        

        

		require 'config.php';
        
         
		 $tender_amount = $_POST['tender_amount'];
		 $tender_status = $_POST['tender_status'];
		 $tender_id = $_POST['tender_id'];
	
		
		//echo $t;
		if(isset($_POST["submit"]))
		{
		if($tender_status==0){
			
			 $updateque = "update tender_table set Status ='1',amount='$tender_amount' where  tender_id='$tender_id'"; 
             $result=mysqli_query($conn,$updateque);
            
             if($result){             
                header('location:manage_ tender.php');
                }
		}
		}
		
			?>
		
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
