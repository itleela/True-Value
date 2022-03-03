<?php
session_start();
 require("connection.php");
 
$cust_id=$_SESSION["id"];

    // Fetch Data
$c_id = $_POST["id"];
$name = $_POST["name"];
$description = $_POST["description"];
$date = $_POST["date"];
$address = $_POST["address"];


// Image
$move_target_dir = "admin/reparing_image/";
$move_image = $move_target_dir . basename($_FILES["fileToUpload"]["name"]);

$target_dir = "reparing_image/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image2wbmp(image)
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}


// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $move_image)) {
        echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
$req_id=rand(1000,9999);
//$_SESSION["req_id"]=$req_id;
echo "my request id is :::::".$req_id;
// Query
$insert_sql = "INSERT INTO reparing_product(c_id,name,description,image,reparing_date,address,req_id)VALUES
('$c_id','$name','$description','$target_file','$date','$address','$req_id')";
// echo $insert_sql;
	mysqli_query($con,$insert_sql);

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

    $mail->Subject =  'Recived new service for as details followed';

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
    $mail->Body .= '<td style="border-radius:5px;"><p style="color:green;font-size:12px;" >Product Name</p> </td>';
    $mail->Body .= '<td style="border-radius:5px;"><p style="color:green;font-size:12px;" >Product Description </p></td>';
    $mail->Body .= '<td style="border-radius:5px;"><p style="color:green;font-size:12px;" >Product Date </p></td>';
    $mail->Body .= '<td style="border-radius:5px;"><p style="color:green;font-size:12px;" >Address</p></td>';
    $mail->Body .= '</tr>';

	//echo $f=$_SESSION['req_id'];
	echo "still my request id is ::::::".$req_id;
					echo	$select_sql_book = "SELECT * FROM reparing_product where c_id = '$cust_id' and req_id='$req_id'";
                        $result1 = $con->query($select_sql_book);
						while($row1 = $result1->fetch_assoc()){ 
                       
                      echo  $name = $row1["name"];
                        $description = $row1["description"];
                        $reparing_date = $row1["reparing_date"];
                        $address = $row1["address"];
                       
								

					
    $mail->Body .= '<tr>';
    $mail->Body .= '<td style="border-radius:5px;"><p style="color:red;font-size:12px;" >'.$name.'</p> </td>';
    $mail->Body .= '<td style="border-radius:5px;"><p style="color:red;font-size:12px;" >'.$description.'</p></td>';
    $mail->Body .= '<td style="border-radius:5px;"><p style="color:red;font-size:12px;" >'.$reparing_date.'</p></td>';
    $mail->Body .= '<td style="border-radius:5px;"><p style="color:red;font-size:12px;" >'.$address.'</p></td>';
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