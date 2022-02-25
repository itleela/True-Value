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
                        <h1 class="page-head-line">Lawyers</h1>
                    </div>
                </div>
                
                <div class="row">
                <div class="col-md-8">
                  <!--   Kitchen Sink -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Lawyer List
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>City</th>
                                            <th>Address</th>
                                            <th>Actoin</th>
                                        </tr>
                                    </thead>
                                    <?php 
                                        // Query
                                        $select_sql_book = "SELECT * FROM `lawyer`";
                                        
                                        $result = $conn->query($select_sql_book);

                                        if ($result->num_rows>0) {
											
											$id  = 1;
											
                                            while($row = $result->fetch_assoc()){ 
                                            
                                            $name = $row["l_name"];
                                            $occupants = $row["l_email"];
                                            $email = $row["l_phone"];
                                            $city = $row["city"];
                                            $address = $row["address"];
                                        ?>
                                        <tbody>
                                        <tr>
                                            <td><?php echo $id ?></td>
                                            <td><?php echo $name; ?></td>
                                            <td><?php echo $occupants; ?></td>
                                            <td><?php echo $email; ?></td>
                                            <td><?php echo $city; ?></td>
                                            <td><?php echo $address; ?></td>
                                            <?php
											if ($block=$row["block"] == 0) {

												  echo "<td class='text-center text-dark' class='linq'><a class='btn btn-danger' href='block_lawyer.php?uid=$row[id]'>Block</a></td></tr>";
												
												} else {

												  echo "<td class='text-center text-dark' class='linq'><a class='btn btn-danger' href='block_lawyer.php?uid=$row[id]'>Unblock</a></td></tr> ";
												}
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
                </div>
               
            </div>
    
            </div>
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
