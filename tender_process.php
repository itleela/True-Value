<?php
session_start();
 require("connection.php");
 
$cust_id=$_SESSION["id"];

    // Fetch Data
$c_id = $_POST["id"];
$type = $_POST["type"];
$square_feet = $_POST["square_feet"];
$description = $_POST["description"];
$date = $_POST["date"];




$rendom_tender_id=rand(1000,9999);
//$_SESSION["rendom_tender_id"]=$rendom_tender_id;
//echo "my request id is :::::".$req_id;
// Query
$insert_sql = "INSERT INTO `tender_table`(`customer_id`,`rendom_tender_id`,`building_type`, `square_feet`,`tender_date`,`description`) 
VALUES ('$c_id','$rendom_tender_id','$type','$square_feet','$date','$description')";
mysqli_query($con,$insert_sql);

//header("location:tender.php");

			$q = "SELECT * from owner_register";
			$result = $con->query($q);
			$row1 = $result->fetch_assoc();
			
			
			$Email=$row1['Email'];
			$Name=$row1['Name'];
			
	$s_name = 'Rathva Leela';
    $email = 'ADMIN@GMAIL.com';
    $mobile = '8000569940';
    $msg = 'My email message.';

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
    $mail->Username = '';                 // SMTP username
    $mail->Password = '';                           // SMTP password
    
    $mail->setFrom('Rathva Leela');
    $mail->addAddress($Email, 'Enlighten');     // Add a recipient

   // $mail->addReplyTo('info@example.com', 'Information');
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject =  'Recived new Tender request.';

    //$message = '<html><body>';

	$mail->Body .= '<h3 style="color:black;">Dear Mr/Miss</h3>';

    $mail->Body .= '<h3 style="color:black;">Recived new service notification </h3>';

    $mail->Body .= '<table border="1px;" style="border-radius:5px;" width="50%;">';
	
	$select_persion_detail=mysqli_query($con,"select * from customer_register where id='$cust_id' ")or die(mysqli_error($conn));
						while ($row=mysqli_fetch_array($select_persion_detail))
						{	  
								
								$persion_name= $row['name'];
								$persion_email= $row['email'];
								$persion_mobile= $row['phone'];
								

						
    $mail->Body .= '<tr>';
    $mail->Body .= '<td colspan="4" >Persion Name:-'.$persion_name.'</td>';
	$mail->Body .= '</tr>';
	
	$mail->Body .= '<tr>';
    $mail->Body .= '<td colspan="4" >Persion Email:-'.$persion_email.'</td>';
	$mail->Body .= '</tr>';
	$mail->Body .= '<tr>';
    $mail->Body .= '<td colspan="4" >Persion Mobile No:-'.$persion_mobile.'</td>';
	$mail->Body .= '</tr>';
	}
	
	
	
    $mail->Body .= '<tr>';
    $mail->Body .= '<td style="border-radius:5px;"><p style="color:green;font-size:12px;" >Building Type</p> </td>';
    $mail->Body .= '<td style="border-radius:5px;"><p style="color:green;font-size:12px;" >Square Feet</p></td>';
    $mail->Body .= '<td style="border-radius:5px;"><p style="color:green;font-size:12px;">Tender Date</p></td>';
    $mail->Body .= '</tr>';

	//echo $f=$_SESSION['req_id'];
	echo "still my request id is ::::::".$req_id;
					echo	$select_sql_book = "SELECT * FROM  tender_table where customer_id = '$cust_id' and rendom_tender_id='$rendom_tender_id'";
                        $result1 = $con->query($select_sql_book);
						while($row1 = $result1->fetch_assoc()){ 
                       
                      echo  $building_type = $row1["building_type"];
                        $square_feet = $row1["square_feet"];
                        $tender_date = $row1["tender_date"];
                        //$address = $row1["amount"];
                       
								

					
    $mail->Body .= '<tr>';
    $mail->Body .= '<td style="border-radius:5px;"><p style="color:red;font-size:12px;" >'.$building_type.'</p> </td>';
    $mail->Body .= '<td style="border-radius:5px;"><p style="color:red;font-size:12px;" >'.$square_feet.'</p></td>';
    $mail->Body .= '<td style="border-radius:5px;"><p style="color:red;font-size:12px;" >'.$tender_date.'</p></td>';
    $mail->Body .= '</tr>'; 

    
	}	

    $mail->Body .= '</table>';

    $mail->Body .= '<h2 style="color:red;">Thank You!!!</h2>';
    $mail->Body .= '<h4 style="color:green">Regards</h4>';
    $mail->Body .= '<h3 style="color:#CD4542;">Enlighten Infosystems Team</h3>';

    //$mail->Body .= '</body></html>';


    if ($mail->send()) {

        //echo 'Success.';
		 echo"<script>window.open('home.php','_self')</script>";

    } else {

        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }





?>