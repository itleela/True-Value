<?php 
session_start();
if(!$_SESSION["name"])
{
	header("location:home.php");
}
include 'connection.php';
include 'header.php';



?>
 

  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>My Order</h2>
          <ol>
            <li><a href="home.php">Home</a></li>
            <li>My Order</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        
        
		<div class="row">
			
			  <div class="col-lg-8 mt-5 mt-lg-0">
			  <div class="bg-danger">
				  <h3 class="text-light p-2">My Order</h3>
				</div>
			
				<div >
                                <table class="table  table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Product Image</th>
                                            <th>quentity</th>
											<th>Product Price</th>
											<th>Order Type</th>
                                            <th>Order Date</th>
											</tr>
                                    </thead>
                                    <?php 
                                        // Query
										$select_sql_book = "SELECT * FROM `final_order` where user_id = '$id'";
                                        
                                        $result = $con->query($select_sql_book);

                                        if ($result->num_rows>0) {
											
											$id  = 1;
											
                                            while($row = $result->fetch_assoc()){ 
                                            
                                           
                                            $user_name = $row["user_name"];
                                            $p_image = $row["p_image"];
											$qty = $row["qty"];
                                            $product_price = $row["product_price"];
                                            $order_type = $row["order_type"];
                                            $date = $row["date"];
                                            
                                        ?>
                                        <tbody>
                                        <tr>
										
                                            <td><?php echo $id ?></td>
                                            <td><?php echo $user_name; ?></td>
											<td><img src="<?php echo "admin/".$p_image.""; ?>" class="img-fluid" alt="" style="height:50px;"></td>
                                            <td><?php echo $qty; ?></td>
                                            <td><?php echo $product_price; ?></td>
                                            <td><?php echo $order_type; ?></td>
                                            <td><?php echo $date; ?></td>
											
                                            
                                        
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

        </div>

      </div>
    </section><!-- End Contact Section -->
<?php include 'footer.php'?>