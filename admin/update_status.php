
<?php



        

        

		require 'config.php';
        
         
		 $price = $_POST['price'];
		 $status = $_POST['status'];
		 $r_id = $_POST['r_id'];
	
		
		//echo $t;
		if(isset($_POST["submit"]))
		{
		if($status==0){
			
			 $updateque = "update reparing_product set Status ='1',price='$price' where  id='$r_id'"; 
             $result=mysqli_query($conn,$updateque);
            
             if($result){             
                header('location:reparing_product.php');
                }
		}
		}
		
			?>
		
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 


    
  
