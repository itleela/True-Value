<!DOCTYPE html>
<?php 
session_start();
include 'connection.php';

	$id = $_SESSION["id"];
	


    $select_carts_sql = "SELECT * FROM cart where user_id = '$id'";
	$total_cart = mysqli_query($con,$select_carts_sql);
    if($total_cart){
        $row = mysqli_num_rows($total_cart);
        }
		
           


?>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>True value</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

 
  <!-- =======================================================
  * Template Name: Sailor - v4.7.0
  * Template URL: https://bootstrapmade.com/sailor-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
 
  
</head>

<body> 
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="home.php">True value</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
	  <div class="max-2">
	  <?php if(isset($_SESSION["name"])){ ?>
		<a class="btn btn-primary"> <?php  echo 'Welcome:-'.$_SESSION["name"];  ?></a>
		   
			
		   <a href="view_cart.php" class="btn btn-danger fa-user">
           Shopping Cart &nbsp;[<?php  
								 if($row>0)
								 {
									 echo $booked = $row; 
								 }
								 else
								 {
									 echo "empty";
								 }
								 ?>]
        </a>
	  <a href="my_orders.php" class="btn btn-primary">My Order</a>
		<a href="logout.php" class="btn btn-danger">Logout </a>
		<?php } else{ ?>
		
		<button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
		<button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#signupModal">Signup</button>
		<?php } ?>
		</div>
		<!-- Button trigger modal -->






      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="home.php" class="active">Home</a></li>
		   <li><a href="about.php">About</a></li>
         <li class="dropdown"><a href="services.php"><span>Services</span> 
           
          <li><a href="portfolio.php">Gallery</a></li>
        <!---  <li><a href="pricing.html">Pricing</a></li>
          <li><a href="blog.html">Blog</a></li>------>

          <li><a href="contact.php">Contact</a></li>
          
		  

            
       <!--   <li><a href="index.html" class="getstarted">Get Started</a></li>---->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
		
      </nav><!-- .navbar -->

    </div>
	</div>
  </header><!-- End Header -->
  
  
<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1"  aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Login to True Value</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form  <form action="login.php" method="post">
  <div class="mb-3">
    <label for="exampleInputId1" class="form-label">Email</label>
    <input type="text" class="form-control" id="exampleInputId1" aria-describedby="IdHelp" name="Email" pattern="[^ @]*@[^ @]*" required>
    <div id="IdHelp" class="form-text"></div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="Password" required>
  </div>
 
  <input type="submit" class="btn btn-primary" Value="LOGIN" name="submit" >
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupModalLabel">Create Account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    <form action="register.php" method="post">
		<div class="mb-3">
			<label for="exampleInputName1" class="form-label" >Name</label>
			<input type="text" name="Name" class="form-control" id="exampleInputName" aria-describedby="NameHelp" onkeypress="return (event.charCode > 64 && event.charCode < 91 ) || (event.charCode > 96 && event.charCode < 123 ) || (event.charCode == 32)" required>
			<div id="NameHelp" class="form-text"></div>
		</div>
		<div class="mb-3">
			<label for="exampleInputName1" class="form-label" >Phone</label>
			<input type="text" name="Phone" class="form-control" id="exampleInputName" aria-describedby="NameHelp" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="10" minlength="10" required>
			<div id="phoneHelp" class="form-text"></div>
		</div>
		<div class="mb-3">
			<label for="exampleInputPassword1" class="form-label">Email</label>
			<input type="email" name="Email" class="form-control" id="exampleInputPassword1" required>
		</div>
		<div class="mb-3">
			<label for="exampleInputPassword1" class="form-label">Password</label>
			<input type="Password" name="Password" class="form-control" id="exampleInputPassword1" required>
		</div>
		<div class="mb-3">
			<label for="exampleInputCity1" class="form-label">City</label>
			<input type="City" name="City"  class="form-control" id="exampleInputCity1" aria-describedby="CityHelp" onkeypress="return (event.charCode > 64 && event.charCode < 91 ) || (event.charCode > 96 && event.charCode < 123 ) || (event.charCode == 32)" required>
			<div id="CityHelp" class="form-text"></div>
		</div>
		<div>
			<label for="exampleInputAddress" class="form-label">Address</label>
			<input type="text"  name="Address" class="form-control" id="exampleInpuAddress1" aria-describedby="Address1Help" required>
			<div id="Address1Help" class="form-text"></div>
		</div>
		
		
		
		

	
 
  <!--button type="submit" class="btn btn-primary">Submit</button-->
  <input type="submit" class="btn btn-primary" Value="Submit" name="submit" >
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>