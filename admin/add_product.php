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
    <title>True Admin</title>
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
                        <h1 class="page-head-line">Add Product</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            Product Detail
                        </div>
                        <div class="panel-body">
                       <form method="POST" action="add_product_process.php" enctype="multipart/form-data">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
							<input type="text" name="name" class="form-control" id="name" placeholder="Enter product name" required="TRUE" />
                          
                            
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Price</label>
                            <input type="number" name="price" class="form-control" id="price" placeholder="₹ 1,000" required="TRUE" />
                          </div>                          
                        
						
                        <div class="form-group">
                            <label for="resource_image">Image</label>
                            <input type="file"  name="fileToUpload" class="form-control" id="fileToUpload" required="TRUE"/>
                        </div>
                        <div class="btn-group">
                          <button type="submit" class="btn btn-success btn-lg">Submit</button>
                        </div>  
                        </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer >
        &<!-- copy; 2019 Enlighten Infosystems | By : <a href="http://www.enlighteninfosystems.com/" target="_blank">Admin Design</a> -->
    </footer>
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
