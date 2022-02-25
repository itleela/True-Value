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

      <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	
	
<script>
function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
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
                        <h1 class="page-head-line">Update Product</h1>
                    </div>
                </div>
                <?php
						
						$p_id = $_GET['uid'];
						
						//echo $p_id;
						
						$Select_product_sql = "SELECT * FROM reparing_product where  id = '$p_id'";
						$result = $conn->query($Select_product_sql);
							if ($result->num_rows>0) {
							  while ($row = $result->fetch_assoc()) {
			
								$p_price = $row['price'];
								$Status = $row['Status'];
								$id = $row['id'];   
								
						?>
						
						
				<div class="row">
				<div id="myDIV" class="col-md-4" >
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            Product Detail
                        </div>
                        <div class="panel-body">
						
                                        
						
                       <form method="POST" action="update_status.php" enctype="multipart/form-data">
                          
                          <div class="form-group">
                            <label for="exampleInputEmail1">Enter reparing amount here.</label>
                            <input type="text" name="price" class="form-control" id="price" value="<?php echo $p_price ?>" placeholder="₹ 1,000" required="TRUE" />
                            <input type="hidden" name="status" class="form-control" id="status" value="<?php echo $Status; ?>" placeholder="₹ 1,000" required="TRUE" />
                            <input type="hidden" name="r_id" class="form-control"  id="r_id" value="<?php echo $id ;?>" placeholder="₹ 1,000" required="TRUE" />

                          </div>                          
                        
									<?php
						}
				}
						?>
                        
                        <div class="btn-group">
                          <button type="submit" name="submit" class="btn btn-success btn-lg">Submit</button>
                        </div>  
                        </form>
						
                        </div>
                        </div>
                    </div>
               
            </div>
			
			
                
              

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
   <footer>
        <!-- &copy; 2019 Enlighten Infosystems | By : <a href="http://www.enlighteninfosystems.com/" target="_blank">Admin Design</a> -->
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
