<?php
    session_start();
    require 'config.php';
        if(!isset($_SESSION["a_email"])){
        header('location:index.php');
    }
 ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PG2ME</title>
    <link rel="icon" type="image/icon" href="assets/img/favicon.ico">
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME ICONS STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM STYLES-->
    <link href="assets/css/style.css" rel="stylesheet" />
</head>
<body>
    <div id="wrapper">
        <!-- /. NAV TOP  -->
         <?php
		include('navbar.php');
		?>
        <!-- /. SIDEBAR MENU (navbar-side) -->
        <div id="page-wrapper" class="page-wrapper-cls">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Add LAwyer</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            Fill Lawyer Details
                        </div>
                        <div class="panel-body">
                       <form method="POST" action="lawyer_process.php" enctype="multipart/form-data">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="name" class="form-control" name="name" id="exampleInputName1" placeholder="Enter name" required="TRUE"/>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="Email" class="form-control" name="email" id="email" placeholder="Enter Email" required="TRUE"/>
                          </div>                  
                           <div class="form-group">
                            <label for="exampleInputEmail1">Phone</label>
                            <input type="number" class="form-control" name="phone"  id="phone" placeholder="Enter Phone" required="TRUE"/>
                          </div>       
                            <div class="form-group">
                            <label for="exampleInputEmail1">city</label>
                            <input type="text" class="form-control" name="lcity"  id="city" placeholder="Enter city" required="TRUE"/>
                          </div>    
						<div class="form-group">
                            <label for="exampleInputEmail1">Address</label>
                            <textarea type="text" class="form-control" name="address" rows="5"  id="address" placeholder="Enter address" required="TRUE"></textarea>
                          </div> 
                        <div class="btn-group">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>  
                        </form>
                        </div>
                        </div>

                    </div>
                </div>
            </div>

<footer >
        &copy; 2019 Enlighten Infosystems | By : <a href="http://www.enlighteninfosystems.com/" target="_blank">Admin Design</a>
    </footer>

    
            </div>
	
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


</body>
</html>
