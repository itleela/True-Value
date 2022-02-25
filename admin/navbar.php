        <nav class="navbar navbar-default navbar-cls-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a  class="navbar-brand" href="dashboard.php">True Value Admin</a>
            </div>

            <div class="notifications-wrapper">
            <ul class="nav">       
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-users"></i></a>
                    <ul class="dropdown-menu dropdown-user">
                       <!--  <li><a href="#"><i class="fa fa-user-plus"></i> My Profile</a> -->
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
               
            </div>
        </nav>
	
        <!-- /. NAV TOP  -->
        <nav  class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div class="user-img-div">
                            <h3 style="color: #f1f1f1f1;"><?php echo $_SESSION["a_name"]; ?></h3>
                        </div>
                    </li>
                    <li>
                        <a class="active-menu"  href="dashboard.php"><i class="fa fa-dashboard "></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-plus "></i>Products<span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="add_product.php"></i>Add Product</a>
                            </li>
                             <li>
                                <a href="manage_products.php"></i>Manage Products</a>
                            </li>                         
                        </ul>
                    </li> 
                    <li>
                        <a href="customers.php"><i class="fa fa-users"></i>Customer</a>
                        <a href="reparing_product.php"><i class="fa fa-ticket"></i>Reparing Product </a>
                        <a href="view_final_order.php"><i class="fa fa-carts"></i>Final Order</a>
                    </li> 
					<li>
                        <a href="#"><i class="fa fa-plus "></i>Quotation<span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="add_quotation.php"></i>Add Quotation</a>
                            </li>
							<li>
                                <a href="view_quotation.php"></i>Manage Quotation</a>
                            </li>
                                                     
                        </ul>
                    </li> 
					
					<!--<a href="#"><i class="fa fa-users "></i>Lawyers<span class="fa arrow"></span></a>						
						<ul class="nav nav-second-level">
                            <li>
                                <a href="lawyer.php"></i>Add Lawyer</a>
                            </li>
                             <li>
                                <a href="manage_lawyer.php"></i>Manage Lawyer</a>
                            </li>                         
                        </ul>
						
                    </li> -->					
                </ul>
            </div>

        </nav>