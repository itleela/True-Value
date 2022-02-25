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
						   Quatation Details</h1>
                    </div>
                </div>
                <div class="row">

				<div class="col-md-6">
										<div class="panel panel-default">
				
		
                        <div class="panel-heading">
                            Quatation Details
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
									<?php
									$select_sql_resource = "SELECT * FROM  quotaton_table where qut_id = 5";
                                    $result = $conn->query($select_sql_resource);
									if($result->num_rows>0){
										$row = $result->fetch_object();
										
									}
									?>
									<tr>
                                        
                                            <th colspan="3" class="text-danger">
											Persion Name:-<?php echo $row->persion_name?></br>
											Persion Mobile:-<?php echo $row->persion_mobile?></br>
											Persion Email:-<?php echo $row->persion_email?></br>
									</th>
                                           
                                           
                                    </tr>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                           
                                        </tr>
                                    </thead>
                                    <?php
									$total = 0;
                                    // Query
                                    $select_sql_resource = "SELECT * FROM  quotaton_details_table where qut_id = 5";
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

					
                </div>
					
                  <!--   Kitchen Sink -->

				
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
