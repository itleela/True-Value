<?php 


    require 'config.php';
						
					if(isset($_POST['submit']))
						{
							$p_id = $_POST['p_id'];
							
							//echo $p_id;
							
							$Q = "SELECT P_name,P_price from products where id = '$p_id' ";
							$data = $conn->query($Q);
							$result1 = mysqli_num_rows($data);
							$row = mysqli_fetch_assoc($data);
	
							$name = $row['P_name'];
							$price = $row['P_price'];
							
							$query = "INSERT INTO temp_product(`p_id`, `p_name`, `p_price`)values('$p_id','$name','$price')";
							$result = mysqli_query($conn,$query);
							
							if($result)
							{
								 header("location:add_quotation.php");
							}
						}	
						
						//Add Quotation detail
						
						
						if(isset($_POST['Quatation']))
						{
						$p_name = $_POST['qp_name'];
						$p_mobile = $_POST['qp_mobile'];
						$p_email = $_POST['qp_email'];
						$q_date = $_POST['qp_date'];
						$q_total= $_POST['qp_total'];
							
						mysqli_query($conn,"INSERT INTO quotaton_table(`persion_name`, `persion_mobile`,`persion_email`,`q_date`,`total_amount`)
						values('$p_name','$p_mobile','$p_email','$q_date','$q_total')");
					
						$qut_id = mysqli_insert_id($conn);

						
							
						$query2=mysqli_query($conn,"select * from temp_product")or die(mysqli_error($conn));
						while ($row=mysqli_fetch_array($query2))
						{	  
								$p_id = $row['p_id'];
								$p_name	 = $row['p_name'];
								$p_price= $row['p_price'];
								
								$quotation = "INSERT INTO quotaton_details_table(`qut_id`,`p_id`, `p_name`,`p_price`)
								values('$qut_id','$p_id','$p_name','$p_price')";
								$q_result = mysqli_query($conn,$quotation);
								
						
						}
						
						mysqli_query($conn,"DELETE FROM temp_product") or die(mysqli_error($con));
						
						
						
						
						
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
    $mail->Username = 'Enter your Email Address';                 // SMTP username
    $mail->Password = 'Enter Your Password';                           // SMTP password
    
    $mail->setFrom('Rathva Leela');
    $mail->addAddress($p_email, 'Enlighten');     // Add a recipient

   // $mail->addReplyTo('info@example.com', 'Information');
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject =  'Quotation details of'.$persion_name;

    //$message = '<html><body>';

    $mail->Body .= '<h3 style="color:black;">Dear '.$s_name.'</h3>';

    $mail->Body .= '<h3 style="color:black;">Your quotation details:-</h3>';

    $mail->Body .= '<table border="1px;" style="border-radius:5px;" width="50%;">';
	
	$select_persion_detail=mysqli_query($conn,"select * from quotaton_table where qut_id='$qut_id' ")or die(mysqli_error($conn));
						while ($row=mysqli_fetch_array($select_persion_detail))
						{	  
								$persion_id = $row['qut_id'];
								$persion_name= $row['persion_name'];
								$persion_email= $row['persion_email'];
								$persion_mobile= $row['persion_mobile'];
								

						
    $mail->Body .= '<tr>';
    $mail->Body .= '<td colspan="2" >Persion Name:-'.$persion_name.'</td>';
	$mail->Body .= '</tr>';
	
	$mail->Body .= '<tr>';
    $mail->Body .= '<td colspan="2" >Persion Email:-'.$persion_email.'</td>';
	$mail->Body .= '</tr>';
	$mail->Body .= '<tr>';
    $mail->Body .= '<td colspan="2" >Persion Mobile No:-'.$persion_mobile.'</td>';
	$mail->Body .= '</tr>';
	}
	
	
	
    $mail->Body .= '<tr>';
    $mail->Body .= '<td style="border-radius:5px;"><p style="color:green;font-size:12px;" >Product Name</p> </td>';
    $mail->Body .= '<td style="border-radius:5px;"><p style="color:green;font-size:12px;" >product Price </p></td>';
    $mail->Body .= '</tr>';

	
						$select_quotation_detail=mysqli_query($conn,"select * from quotaton_details_table where qut_id='$qut_id' ")or die(mysqli_error($conn));
						while ($row=mysqli_fetch_array($select_quotation_detail))
						{	  
								$p_id1 = $row['p_id'];
								$p_name1= $row['p_name'];
								$p_price1= $row['p_price'];
								

					
    $mail->Body .= '<tr>';
    $mail->Body .= '<td style="border-radius:5px;"><p style="color:red;font-size:12px;" >'.$p_name1.'</p> </td>';
    $mail->Body .= '<td style="border-radius:5px;"><p style="color:red;font-size:12px;" >'.$p_price1.'</p></td>';
    $mail->Body .= '</tr>';
    
	}

    $mail->Body .= '</table>';

    $mail->Body .= '<h2 style="color:red;">Thank You!!!</h2>';
    $mail->Body .= '<h4 style="color:green">Regards</h4>';
    $mail->Body .= '<h3 style="color:#CD4542;">Enlighten Infosystems Team</h3>';

    //$mail->Body .= '</body></html>';


    if ($mail->send()) {

        //echo 'Success.';
		echo"<script>window.open('dashboard.php','_self')</script>";

    } else {

        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
						
						
						
						
						
						
						
					}
						
						
						
						
						
						?>