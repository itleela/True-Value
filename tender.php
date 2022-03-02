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
          <h2>Tender</h2>
          <ol>
            <li><a href="home.php">Home</a></li>
            <li>Tender </li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        
        
		<div class="row">
			<div class="col-lg-4 mt-5 mt-lg-0">
			
				<form  method="POST" action="tender_process.php" enctype="multipart/form-data">
				<div class="bg-danger">
				  <h3 class="text-light  p-2">Tender request</h3>
				</div>
				  <div class="row">
				  
					<div class="col-md-12 form-group mb-3">
					  <input type="hidden" name="id" class="form-control" id="id" value="<?php echo $id ?>"placeholder="Product Name" required>
					  <Select type="select" name="type" class="form-control" id="type" placeholder="Select type of Building" required>
					  <option>Flat</option>
					  <option>Building</option>
					  <option>Office</option>
					  </select>
					</div>
					
				  </div>
				  <div class="col-md-12 form-group mt-3 mt-md-0">
					<Input class="form-control" type="text" name="square_feet" rows="3" placeholder="Enter square feet" required />
				 </div>
				 
				  <div class="row mt-3">
				  
				 <div class="col-md-12 form-group mt-3 mt-md-0">
					<Input class="form-control" type="date" min = <?php echo date('Y-m-d');?> name="date" rows="3" placeholder="Select Date" required />
				 </div>
				 </div>
				  <div class="form-group mt-3 mb-3">
					<textarea class="form-control" type="text" name="description" rows="5" placeholder="Description" required></textarea>
				  </div>
				  
				  <div class="text-center bg-danger"><button class="btn bg-danger text-light" type="submit" name="submit">Submit</button></div>
				</form>
				
				

			  </div>
			  <div class="col-lg-8 mt-5 mt-lg-0">
			  <div class="bg-danger">
				  <h3 class="text-light p-2">Your Tender Details</h3>
				</div>
			
				<div >
				<?php
														$select_sql_book = "SELECT * FROM `tender_table` where customer_id = '$id'";
                                        
                                        $result = $con->query($select_sql_book);

                                        if ($result->num_rows>0) {
				?>
                                <table class="table  table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Buiklding Type</th>
                                            <th>Square Feet</th>
                                            <th>Tender Date</th>
                                            <th>Description</th>
                                            <th>Amount</th>
											<th>Status</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <?php 
                                        // Query

											
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
                                            <td><?php echo $id ?></td>
                                            <td><?php echo $name; ?></td>
											<td><?php echo $square_feet; ?></td>
                                            <td><?php echo $tender_date; ?></td>
											<td><?php echo $description; ?></td>
                                            
                                            
                                            
											<td><?php 
											
											if($amount==0)
											{
												echo "Pending amount";
											}
											else{
												echo $amount; 
											}
											
											?></td>
                                            <?php
											if ($block=$row["Status"] == 0) {

												  echo "<td class='text-center text-dark' class='linq'  ><a class='btn btn-outline-warning btn-sm' href='#'>Pending</a></td>";
												
												} else {

												  echo "<td class='text-center text-success' class='linq'><a class='btn btn-outline-success btn-sm' href='#'>Approved by admin</a></td> ";
												}
											
											if($amount==0)
											{
												echo "<td class='text-center text-warning'><button class='btn btn-warning btn-sm'>pending</button></td>";
											}
											else
											{
											

												  echo "<td class='text-center text-dark' class='linq'><a class='btn btn-primary btn-sm mb-2' href='user_tender_status_update.php?tender_id=$row[tender_id]'>confirm</a>
												  <br><a class='btn btn-danger btn-sm' href='user_reject_tender.php?tender_id=$row[tender_id]'>Reject</a></td></tr>";
												
											

												 
											
											}
											?>
                                        
                                        </tr>
                                   <?php   
										$id++;
										}
                                      
										
                                    ?>
                                </tbody>
                                </table>
								<?php
										}
										else
										{
											echo "<div class='text-danger'><h3>No tender detail available<h3></div>";
										}
										?>
                            </div>
				
				

			  </div>

			  </div>

        </div>

      </div>
    </section><!-- End Contact Section -->
<?php include 'footer.php'?>