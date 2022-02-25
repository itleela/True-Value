


<?php
require_once("connection.php");
 include 'header.php' 
 
 
 
?>

  <main id="main">
  
	<!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Products</h2>
          <ol>
            <li><a href="home.php">Home</a></li>
            <li>Products</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Product Section ======= -->
	
	
    <section id="pricing" class="pricing">
		<div class="container">

			<div class="row">
			<?php 
			$Select_sql_products ="SELECT * FROM products";
			$data = mysqli_query($con, $Select_sql_products);
			$result = mysqli_num_rows($data);
	
	
                    $products = $con->query($Select_sql_products);
                        if ($Select_sql_products) {
                        while ($row = $products->fetch_assoc()) {
							
							
							
							$p_img = $row['P_image'];
                            $p_price = $row['P_price'];
                            $p_name = $row['P_name'];
                            $id = $row['id'];
                            
						
			?>
							
				
				<div class="col-lg-3 mb-5">
				
					<form method="post" action="addcart.php">
					<div class="box featured">
					  <h3><?php echo $p_name ?></h3>
					  
					  <h4><sup>₹ </sup><?php echo $p_price ?><span></span></h4>
					  <div class="pic"><img src="<?php echo "admin/".$p_img.""; ?>" class="img-fluid" alt="" style="height:200px;"></div>
					  <div class="btn-wrap">
						<a  class="btn-buy" href='addcart.php?<?php echo"res_id=$row[id]"; ?>'>Buy Now</a>
					  </div>
					</div>
					
					  <input type="text" name="quantity" value="1" hidden>
								  
					  </form>
				</div>
				<?php } }  ?>
				
				
				
			</div>
		</div>
	</section>

		 

    

  </main><!-- End #main -->
  <?php  include 'footer.php' ?>
