<?php 
	session_start();
	require 'config.php';

	// Get Resource id
	$id = $_GET['product_id'];
	
	

	//Query 
    $Select_resource_sql = "SELECT * FROM products where  id = '$id'";
	
	 
               

	

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
                        <h1 class="page-head-line">Edit Product</h1>
                    </div>
                </div>
				<?php
				 $result = $conn->query($Select_resource_sql);
                    if ($result->num_rows>0) {
                      while ($row = $result->fetch_assoc()) {
						$p_name = $row['P_name'];   
						$p_img = $row['P_image']; 
						$p_price = $row['P_price'];
						$p_id = $row['id'];   
                         
                   
                     ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            Product Detail
                        </div>
                        <div class="panel-body">
                       <form method="POST" action="update_product.php" enctype="multipart/form-data">
					   <div class="form-group text-center">
					   <img src="<?php echo $p_img; ?>" alt="room photos" style="height:150px;width:200px;">
						 </div>	
                          <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
							
							<input type="hidden" class="form-control" name="p_id" value="<?php echo $p_id ?>">
							<input type="text" class="form-control" value="<?php echo $p_name ?>" name="p_name">
					
                            
                          </div>
						
                          <div class="form-group">
                            <label for="exampleInputEmail1">Price</label>
                            <input type="number" name="price" class="form-control" id="price" placeholder="₹ 1,000" value="<?php echo $p_price ?>" required="TRUE"/>
                          </div>                          
                        

                        <div class="form-group">
                            <label for="resource_image">Image</label>
                            <input type="file" id="image" name="fileToUpload" class="form-control" id="fileToUpload" required="TRUE"/>
							
                        </div>
						<?php
						}
				}
						?>
                        <div class="btn-group">
                          <button type="submit" name="submit" class="btn btn-success btn-lg">Update</button>
                        </div>  
                        </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<footer >
        &<!-- copy; 2019 Enlighten Infosystems | By : <a href="http://www.enlighteninfosystems.com/" target="_blank">Admin Design</a> -->
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