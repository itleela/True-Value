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
                        <h1 class="page-head-line">
						Quatation</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            Quatation Product
                        </div>
                        <div class="panel-body">
						
						
						
						
						
                       <form action="q_proccess.php"  method="POST"  enctype="multipart/form-data">
					   
						
                          <div class="form-group">
						  <?php 

								$product_query = "SELECT id,P_name,P_price from products";
								$exe = $conn->query($product_query);

							?>

                        <label for="exampleInputEmail1">Name</label>
                        <select type="select" class="form-control mb-2" name="p_id" id="exampleInputName1" placeholder="Select name" required="TRUE">
							
						<?php while ($obj = $exe->fetch_object()) {
						?>
							<option value='<?php echo $obj->id?>'><?php echo $obj->P_name?>  </option>
						<?php } ?>
                        </select>
						</div>
						
						<div class="form-group">
                          <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                        </div>  
						
                        </form>
                        </div>
                        </div>
					
					<div class="panel panel-default">
				
		
                        <div class="panel-heading">
                            Quatation Products list
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                           
                                        </tr>
                                    </thead>
                                    <?php
									$total = 0;
                                    // Query
                                    $select_sql_resource = "SELECT * FROM temp_product";
                                    $result = $conn->query($select_sql_resource);
                                    if($result->num_rows>0){
										$id =1;
                                        while($row = $result->fetch_assoc()){
											

                                            $name = $row["p_name"];
                                            $price = $row["p_price"];
                                           
                                         ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $id; ?></td>
                                            <td><?php echo $name; ?></td>
                                            <td><?php echo $price; ?></td>
                                           
                                             
                                        </tr>
										
                                           <?php
										   $total +=  $row['p_price'];
										   $id++;
                                        }
										
                                    }
                                    ?>
                                    <tr>
										<td colspan="2"><b>Total Amount</b></td>
										<td>Rs.<?php echo $total; ?>/-</td>
										</tr>
                                    </tbody>
                                </table>    
                             
                         
                        </div>
                    </div>
                     <!-- End  Kitchen Sink -->
                </div>
					
                    </div>
					
                  <!--   Kitchen Sink -->

				<!-- Add Persion DEati -->
				                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            Persion Detail
                        </div>
                        <div class="panel-body">
                       <form method="POST" action="q_proccess.php" enctype="multipart/form-data">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
							<input type="text" name="qp_name" class="form-control" id="name" placeholder="Enter person name" required="TRUE" />
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Contact No</label>
                            <input type="text" name="qp_mobile" class="form-control" id="date" placeholder="7845896589" required="TRUE" />
                          </div>
						  <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" name="qp_email" class="form-control" id="email" placeholder="example@gmail.com" required="TRUE" />
                          </div>
						<div class="form-group">
                            <label for="exampleInputEmail1">Quatation Date</label>
                            <input type="date" name="qp_date"  class="form-control" id="date" placeholder="7845896589" required="TRUE" />
                            <input type="hidden" name="qp_total"  class="form-control" value="<?php echo $total; ?>" id="total" placeholder="7845896589" required="TRUE" />
                        </div> 
						
                        <div class="btn-group">
                          <button type="submit" name="Quatation" class="btn btn-success btn-lg">Submit</button>
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
