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
          <h2>Reparing Product</h2>
          <ol>
            <li><a href="home.php">Home</a></li>
            <li>Reparing Product</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        
        
		<div class="row">
			<div class="col-lg-4 mt-5 mt-lg-0">
			
				<form  method="POST" action="reparing_product_process.php" enctype="multipart/form-data">
				<div class="bg-danger">
				  <h3 class="text-light  p-2">Your Product</h3>
				</div>
				  <div class="row">
				  
					<div class="col-md-6 form-group">
					  <input type="hidden" name="id" class="form-control" id="id" value="<?php echo $id ?>"placeholder="Product Name" required>
					  <input type="text" name="name" class="form-control" id="name" placeholder="Product Name" required>
					</div>
					<div class="col-md-6 form-group mt-3 mt-md-0">
					  <Input class="form-control" type="text" name="description"  placeholder="Product Description" required />
					</div>
				  </div>
				  <div class="row mt-3">
				  <div class="col-md-6 form-group">
					<input type="file"  name="fileToUpload" class="form-control" id="fileToUpload" required="TRUE"/>
				 </div>
				 <div class="col-md-6 form-group mt-3 mt-md-0">
					<Input class="form-control" type="date" min = <?php echo date('Y-m-d');?> name="date" rows="3" placeholder="Select Date" required />
				 </div>
				 </div>
				  <div class="form-group mt-3 mb-3">
					<textarea class="form-control" type="text" name="address" rows="5" placeholder="Address" required></textarea>
				  </div>
				  
				  <div class="text-center bg-danger"><button class="btn bg-danger text-light" type="submit" name="submit">Submit</button></div>
				</form>
				
				

			  </div>
			  <div class="col-lg-8 mt-5 mt-lg-0">
			  <div class="bg-danger">
				  <h3 class="text-light p-2">Your Product</h3>
				</div>
			
				<div >
                                <table class="table  table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Reparing Date</th>
                                            <th>Address</th>
                                            <th>Reparing Amount</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <?php 
                                        // Query
										$select_sql_book = "SELECT * FROM `reparing_product` where c_id = '$id'";
                                        
                                        $result = $con->query($select_sql_book);

                                        if ($result->num_rows>0) {
											
											$id  = 1;
											
                                            while($row = $result->fetch_assoc()){ 
                                            
                                            $product_id = $row["id"];
                                            $name = $row["name"];
                                            $description = $row["description"];
                                            $image = $row["image"];
                                            $reparing_date = $row["reparing_date"];
                                            $address = $row["address"];
                                            $price = $row["price"];
                                            $status = $row["Status"];
                                        ?>
                                        <tbody>
                                        <tr>
                                            <td><?php echo $id ?></td>
                                            <td><?php echo $name; ?></td>
                                            <td><?php echo $description; ?></td>
                                            <td><img src="<?php echo "admin/".$image.""; ?>" class="img-fluid" alt="" style="height:50px;"></td>
                                            <td><?php echo $reparing_date; ?></td>
                                            <td><?php echo $address; ?></td>
											<td><?php 
											
											if($price==0)
											{
												echo "Pending amount";
											}
											else{
												echo $price; 
											}
											
											?></td>
                                            <?php
											if ($block=$row["Status"] == 0) {

												  echo "<td class='text-center text-dark' class='linq'  ><a class='btn btn-outline-warning btn-sm' href='#'>Pending</a></td>";
												
												} else {

												  echo "<td class='text-center text-success' class='linq'><a class='btn btn-outline-success btn-sm' href='#'>Approved by admin</a></td> ";
												}
											
											if($price==0)
											{
												echo "<td class='text-center text-warning'><button class='btn btn-warning btn-sm'>pending</button></td>";
											}
											else
											{
											

												  echo "<td class='text-center text-dark' class='linq'><a class='btn btn-primary btn-sm mb-2' href='user_update_status.php?uid=$row[id]'>Conferm</a>
												  <br><a class='btn btn-danger btn-sm' href='user_reject status.php?uid=$row[id]'>Reject</a></td></tr>";
												
											

												 
											
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

        </div>

      </div>
    </section><!-- End Contact Section -->
<?php include 'footer.php'?>