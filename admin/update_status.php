
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
		
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 /* if($data){
       
        
        $updateque="update reg_form set status='Unblock' where enroll='$uenroll'";
        
        
        
           //echo "<script>confirm('do you want to delete');</script>";
            
           
            
            $result=mysqli_query($conn,$updateque);
            
            if($result){
                
               
                header('location:index2.php');
            }
 }
 
	 else{
	  $q2="select * from reg_form where status='Unblock' && enroll='$uenroll'";
		$data2=mysqli_query($conn,$q2);
		if($data2){
		
	 $updateque1="update reg_form set status='Block' where enroll='$uenroll'";
        
        
        
           //echo "<script>confirm('do you want to delete');</script>";
            
           
            
            $result1=mysqli_query($conn,$updateque1);
            
            if($result1){
                
                
                header('location:index2.php');
		}
	 
	 }}
        */ 
        
        ?>


    
  
