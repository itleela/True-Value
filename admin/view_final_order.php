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
                        <h1 class="page-head-line">Final Order List</h1>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-12">
				
                  <!--   Kitchen Sink -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Final Order
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
											
											
											<th>Customer Name</th>
											<th>Customer Email</th>
											<th>Customer Address</th>
											<th>Customer Mobile_No</th>
											<th>Quantity</th>
											<th>Order Type</th>
											<th>Amount Paid</th>
											<th>Purchase Date</th>
                                            
                                        </tr>
                                    </thead>
                                    <?php 
                                        // Query
                                        $select_sql_book = "SELECT * FROM `final_order`";
                                        
                                        $result = $conn->query($select_sql_book);

                                        if ($result->num_rows>0) {
											$id  = 1;
                                            while($row = $result->fetch_assoc()){ 
                                            $pro_price = $row["product_price"];
                                            $qty = $row["qty"];
                                            $order_type = $row["order_type"];
                                            $user_id = $row["user_id"];
                                            $user_name = $row["user_name"];
                                            $user_email = $row["user_email"];
                                            $user_mobile = $row["user_mobile"];
                                            $address = $row["user_address"];
                                            $date = $row["date"];
                                           
                                            
                                           
                                    ?>
                                        <tbody>
                                        <tr>
                                            <td><?php echo $id; ?></td>
                                            
                                            
											<td><?php echo $user_name; ?></td>
											<td><?php echo $user_email; ?></td>
											<td><?php echo $address; ?></td>
											<td><?php echo $user_mobile; ?></td>
											<td><?php echo $qty; ?></td>
											<td><?php echo $order_type; ?></td>
                                            
											<td><?php echo $pro_price; ?></td>
                                            <td><?php echo $date; ?></td>
                                            
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
				
				<div id="myDIV" class="col-md-4" hidden>
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            Product Detail
                        </div>
                        <div class="panel-body">
						<?php 
                                        // Query
                                        $select_sql_book = "SELECT * FROM `reparing_product`";
                                        
                                        $result = $conn->query($select_sql_book);

                                        if ($result->num_rows>0) {
											$id  = 1;
                                            while($row = $result->fetch_assoc()){ 
                                            $pro_id = $row["id"];
                                            $name = $row["name"];
                                            $description = $row["description"];
                                            $image = $row["image"];
                                            $address = $row["address"];
                                            $r_date = $row["reparing_date"];
                                            $price = $row["price"];
                                            
                                           
                                    ?>
                       <form method="POST" action="update_status.php" enctype="multipart/form-data">
                          
                          <div class="form-group">
                            <label for="exampleInputEmail1">Enter reparing amount here.</label>
                            <input type="number" name="price" class="form-control" id="price" value="<?php $pro_id ?>" placeholder="₹ 1,000" required="TRUE" />
                            <input type="number" name="price" class="form-control" id="price" value="<?php $pro_id ?>" placeholder="₹ 1,000" required="TRUE" />

                          </div>                          
                        
						
                        
                        <div class="btn-group">
                          <button type="submit" name="submit" class="btn btn-success btn-lg">Submit</button>
                        </div>  
                        </form>
						<?php
						 }
                                        }
                                    ?>
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
