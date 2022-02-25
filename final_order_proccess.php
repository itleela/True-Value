<?php
session_start();

 require_once("connection.php");
 $cust_id=$_SESSION["email"];
 $order_id=strtotime("now");
 $_SESSION['order_no']= $order_id;
 $res_id=$_GET['res_id'];
 
 
 
  $query1=" SELECT * FROM customer_register where  id = '$res_id'";
  $result2 = mysqli_query($con,$query1);
        $tot = 0;     
        while($row=mysqli_fetch_array($result2)){
			
            $u_id= $row['id'];
            $u_name= $row['name'];
            $u_phone= $row['phone'];
			$u_email= $row['email'];
			$R_occupant=$row['city'];
			$u_address=$row['address'];
 
			$q = "SELECT * from cart where user_id= '$u_id'";
			$result = $con->query($q);
			$row1 = $result->fetch_assoc();
			
			
			$qty=$row1['qty'];
			$total_price=$row1['total_price'];
			$p_image=$row1['p_image'];
			
			$tot +=  $qty*$total_price;
			
			
			
			
			
	 
			$query = " insert into final_order(qty,product_price,p_image,user_id,user_name,user_email,user_mobile,user_address,date,time) 
			values('$qty','$tot','$p_image','$u_id','$u_name','$u_email','$u_phone','$u_address',NOW(),NOW())";
			$result = mysqli_query($con,$query);
		}	
			
					
					
				$del = "DELETE FROM `cart` WHERE user_id= '$u_id'";
				$data = mysqli_query($con, $del);
					  

		


    require 'phpmail/PHPMailerAutoload.php';
    $mail = new PHPMailer;

    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    $mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->SMTPSecure = 'STARTTLS';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'Enter your Email Address';                 // SMTP username
    $mail->Password = 'Enter Your Password';                          // SMTP password
    
    //$mail->setFrom('26it2017@gmail.com', 'Jigar Patel');
    
	$mail->addAddress($u_email, 'Customer Name');     // Add a recipient

    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Order is Confirmed..!';


    $mail->Body .= '<img src="https://static.vecteezy.com/system/resources/thumbnails/003/047/085/small/order-confirmation-and-verification-vector.jpg">
	';
 
    if ($mail->send()) {

      //  echo 'Success.';
		
echo"<script>window.open('thank_you.php','_self')</script>";


    } else {

        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }

?>
   



									
									
