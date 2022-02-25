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
                        <h1 class="page-head-line">Quotaions Detail</h1>
                    </div>
                </div>
                <div class="row">
                <!-- <div class="col-md-8"> -->
                  <!--   Kitchen Sink -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Quotaions Detail List
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Contact No.</th>
                                            <th>Quotation Date</th>
                                            <th>Quotation Amount</th>
											
                                        </tr>
                                    </thead>
                                    <?php 
                                        // Query
                                        $select_sql_user = "SELECT * FROM quotaton_table";
                                        
                                        $result = $conn->query($select_sql_user);

                                        if ($result->num_rows>0) {
											
 
											$id  = 1;
											
                                            while($row = $result->fetch_assoc()){ 
											
                                           
                                            $name = $row["persion_name"];
											$phone = $row["persion_mobile"];
                                            $email = $row["persion_email"];
                                            $q_date = $row["q_date"];
											$amount = $row["total_amount"];
                                            
                                            
                                             
                                                ?>
                                        <tbody>      
                                         <tr>
                                            <td><?php echo $id; ?></td>
                                            <td><?php echo $name; ?></td>
                                            <td><?php echo $email; ?></td>
                                            <td><?php echo $phone; ?></td>
                                            <td><?php echo $q_date; ?></td>
                                            <td><?php echo $amount; ?></td>
                                            
                          
											<!--User Block or Unblock Code-->
											<?php
											/*if ($block=$row["block"] == 0) {

												  echo "<td class='text-center text-dark' class='linq'><a class='btn btn-danger' href='block.php?uid=$row[id]'>Block</a></td></tr>";
												
												} else {

												  echo "<td class='text-center text-dark' class='linq'><a class='btn btn-danger' href='block.php?uid=$row[id]'>Unblock</a></td></tr> ";
												}*/
											?>
                                            
                                        </tr>
                                   <?php  
										$id++;
										
											}
                                        }
                                    ?>
                                </tbody>
                                </table>
    

                            </div>
                        </div>
                    </div>
                     <!-- End  Kitchen Sink -->
                <!-- </div> -->
               
            </div>
                
              

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
   <footer >
        &copy; 2019 Enlighten Infosystems | By : <a href="http://www.enlighteninfosystems.com/" target="_blank">Admin Design</a>
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
