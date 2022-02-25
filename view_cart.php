<?php 

include 'header.php';
include 'connection.php';


if(isset($_SESSION["id"]))
{
$user_id = $_SESSION["id"];
}


$q = "SELECT * from customer_register where id= '$id'";
$select_customer = $con->query($q);

if ($select_customer->num_rows>0) {
	
	 while($data = $select_customer->fetch_assoc()){ 
        
		
		$name = $data['name'];                                    
        $email = $data['email'];
        $phone = $data['phone'];
        $address = $data['address'];
        
        
	
	
}

}



?>
 
 <?php  ?>  
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

        
        
		<div class="row ">
		
			  <div class="col-lg-10 mt-5 mt-lg-0">
			  <div class="bg-danger">
				  <h3 class="text-light p-2">Your Cart</h3>
				</div>
			
				
                                <table class="table  table-bordered table-hover">
                                  
									<thead>
									<?php 
										$tot = 0;
										$t_qty = 0;
                                        // Query
										$q = "SELECT * from cart where user_id= '$id'";
										$result = $con->query($q);

                                        if ($result->num_rows>0) {
											
											$id  = 1;
											?>
                                        <tr>
                                            <th>#</th>
                                            <th>product Name</th>
                                            <th>Image</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Actoin</th>
											
                                            
                                        </tr>
                                    </thead>
                                     
                                        <tbody>
										
										<?php
                                            while($row = $result->fetch_assoc()){ 
                                            
                                            $c_id = $row["cart_id"];
                                            $p_id = $row["product_id"];
                                            $u_id = $row["user_id"];
                                            $p_name = $row["p_name"];
                                            $price = $row["total_price"];
                                            $image = $row["p_image"];
                                            $qty = $row["qty"];
                                            
                                        ?>	 
                                        <tr>
                                            <td><?php echo $id ?></td>
                                            <td><?php echo $p_name; ?></td>
											<td><img src="<?php echo "admin/".$image.""; ?>" class="img-fluid" alt="" style="height:100px;"></td>
                                            <td>
										<form  method="post" action="update_cart.php">

                                        
                                        <input type="number" name="c_qty" value="<?php echo $qty; ?>">
                                        <input type="hidden" name="cart_id" value="<?php echo $c_id ?>">

                                      
											</td>
                                            
                                            <td><?php echo $total=$price*$qty; ?></td>
                                            <td><button class="btn btn-info mb-2" type="submit" name="submit">Edit</button></br>
											<a  class="btn btn-danger" href='delete_cart.php?<?php echo"c_id=$row[cart_id]"; ?>'>Delete</a></td>
                                            
                                          </form>										  
                                        
                                        </tr>
										
										
										<?php 
										
										$tot +=  $row['qty']*$row['total_price'];
										$t_qty  +=  $row['qty'];
										$id++;
										}
                                        }
										else
										{
											echo "<div class='text-danger'><h3>Your cart is empaty<h3></div>";
										}
                                  ?>
								   <form method="POST" >	
								  <?php 
								  if ($result->num_rows>0) { ?>
								  
								  
									  
										
									<input type="hidden" name="u_id" value="<?php echo $user_id; ?>" id="user_id">
									<input type="hidden" name="u_name" value="<?php echo $name;?>" id="customer_name">
									<input type="hidden" name="u_email" value="<?php echo $email;?>" id="c_email">
									<input type="hidden" name="u_phone" value="<?php echo $phone;?>">
									<input type="hidden" name="u_address" value="<?php echo $address ?>">
									<input type="hidden" name="p_price" value="<?php echo $tot ?>" id="total_amount">               
									<input type="hidden" name="p_qty" value="<?php echo $t_qty ?>">   
										<tr>
										<td colspan="4"><b>Total Amount</b></td>
										<td>Rs.<?php echo $tot;?>/-</td>
										<td><button class="btn btn-info mb-2" type="submit" id="razor-pay-now" name="submit">Proceed to Pay</button></br>
										<tr>	
									</form>
										
										
										
									
								 <?php } ?>
								 
								 
								
																
									
									            
									                
									                  
									   
										
										
								
								 
								 
								 
                                </tbody>
								 

								 
                                </table>
								
								
                           
			  </div>
			  

			  </div>

        </div>

      </div>
    </section><!-- End Contact Section -->
	
	<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script type="text/javascript">
   jQuery(document).on('click', '#razor-pay-now', function (e) { 
     e.preventDefault();
     //alert("button click");
			   var total_amount = $('#total_amount').val();
			 var customer_name = $('#customer_name').val();
			 var c_email = $('#c_email').val();
			 var book_date1 = $('#book_date').val();
			    var res_id = $('#user_id').val();
			   var omember = $('#omember').val();
			   // var password = $('#password').val();
			    
				//var image = $("#ph_image").prop("files")[0];
				
				//alert(total_amount);

	var totalAmount = total_amount*100;

    var merchant_total = totalAmount;
    
    var merchant_order_id = "123";
    var currency_code_id = "INR";
     var options = {
    "key": "rzp_test_98Ozda9wzffKQ6",
    "amount": merchant_total, // 2000 paise = INR 20
    "name": "tenant tale",
    "description": "Booking & Payment confirmation from True value",

    "currency" : "INR",
    "netbanking" : true,
    prefill: {
            name: customer_name,
           email: c_email,
            contact: 9898989898,

        },
    notes: {
            soolegal_order_id: merchant_order_id,
        },
    "handler": function (response){
    	  	//alert("inside ajax");
			 window.location.href = 'http://localhost/truevalus/True/final_order_proccess.php?res_id='+res_id;
			  //   window.location = res.redirectURL;
			 
    },

    "theme": {
        "color": "#528FF0"
    }
  };
  
  var rzp1 = new Razorpay(options);
  rzp1.open();
  e.preventDefault();

} );


</script>
<?php include 'footer.php'?>