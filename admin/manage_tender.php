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
                        <h1 class="page-head-line">Tender List</h1>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-8">
				
                  <!--   Kitchen Sink -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Tender Details
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Buiklding Type</th>
                                            <th>Square Feet</th>
                                            <th>Tender Date</th>
                                            <th>Description</th>
                                            <th>Amount</th>
                                            <th> Status</th>
                                            
                                        </tr>
                                    </thead>
                                    <?php 
                                        // Query
                                       $select_sql_book = "SELECT * FROM `tender_table` ";
                                        
                                        $result = $conn->query($select_sql_book);

                                        if ($result->num_rows>0)  {
											$id  = 1;
                                            while($row = $result->fetch_assoc()){ 
                                            
                                            $customer_id = $row["customer_id"];
                                            $name = $row["building_type"];
                                            $square_feet = $row["square_feet"];
											$description = $row["description"];
                                            $tender_date = $row["tender_date"];
                                            $amount = $row["amount"];
                                            
                                           
                                    ?>
                                        <tbody>
                                        <tr>
                                            <td><?php echo $id; ?></td>
                                            <td><?php echo $name; ?></td>
                                            <td><?php echo $square_feet; ?></td>
                                            <td><?php echo $description; ?></td>
                                            <td><?php echo $tender_date; ?></td>
                                            <td><?php echo $amount; ?></td>
                                            <?php
											
												
											
											if ($block=$row["Status"] == 0) {

												  echo "<td class='text-center text-dark' class='linq'><a class='btn btn-warning' href='tender_amount.php?tender_id=$row[tender_id]'>Pending</a></td></tr> ";

												
												} 
												else if($block=$row["Status"] == 1) {

												  echo "<td class='text-center text-dark' class='linq'><a class='btn btn-success' href='update_status.php?tender_id=$row[tender_id]'>Approved</a></td></tr> ";
												}
												else if($block=$row["Status"] == 2) {

												  echo "<td class='text-center text-dark' class='linq'><a class='btn btn-primary' href='update_status.php?tender_id=$row[tender_id]'>confirm</a></td></tr> ";
												}
												else if($block=$row["Status"] == 3) {

												  echo "<td class='text-center text-dark' class='linq'><a class='btn btn-danger' href='update_status.php?tender_id=$row[tender_id]'>Rejected</a></td></tr> ";
												}
												
											
									
											?>
                                        </tr>
                                   <?php $id++;
								   }
                                        }
                                    ?>
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
					
                     <!-- End  Kitchen Sink -->
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
