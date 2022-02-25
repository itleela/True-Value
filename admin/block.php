
<?php

		session_start();

        if(!isset($_SESSION['admin_id'])){

            header("location:login.php");
        }

        

		require 'config.php';
        
         $user_id=$_GET['uid'];

        $q="select block from register where id='$user_id'";
		$data=mysqli_query($conn,$q);
		$total=mysqli_fetch_assoc($data);
		if($total['block']==0){
			
			 $updateque="update register set block=1 where  id='$user_id'"; 
             $result=mysqli_query($conn,$updateque);
            
             if($result){             
                header('location:users.php');
                }
		}
		else{
			$updateque1="update register set block=0 where id='$user_id'"; 
             $result1=mysqli_query($conn,$updateque1);
            
             if($result1){             
                header('location:users.php');
                }
		}
		
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
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


    
  
