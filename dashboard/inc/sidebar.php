<?php
	$pendingprod = mysqli_num_rows(mysqli_query($conn, "select product_id from products where status = 0"));
	$pendingcomment = mysqli_num_rows(mysqli_query($conn, "select id from comments where status = 0"));
?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel --> 
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header"></li>
            <li><a href="index"><i class="fa fa-home text-green"></i> <span>Dashboard</span></a></li>
            <li><a href="all_products"><i class="fa fa-plus text-green"></i> <span>Products </span> <span class="pull-right-container">
					<small class="label pull-right bg-blue"><?php echo $pendingprod;?></small></span></a></li>
            <li><a href="add_product"><i class="fa fa-plus text-green"></i> <span>Add New Product</span></a></li>
            <li><a href="farmers"><i class="fa fa-user text-green"></i> <span>Farmers</span></a></li>
            <li><a href="product-review"><i class="fa fa-pencil text-green"></i> <span>Product Review</span> <span class="pull-right-container">
					<small class="label pull-right bg-blue"><?php echo $pendingcomment;?></small></span></a></li>
            <li><a href="sale-record"><i class="fa fa-cart-plus text-green"></i> <span>Sales Record</span></a></li>
            <li>
                <?php
                	$ordersql = "SELECT * FROM sales WHERE status ='placed'";
                	$orderresult = mysqli_query($cxn, $ordersql); $ordercount = mysqli_num_rows($orderresult);
                ?>
                <a href="order">
                    <i class="fa fa-cart-plus text-blue"></i> 
					<span>New Orders</span>
             		<span class="pull-right-container">
					<small class="label pull-right bg-blue"><?php echo $ordercount; ?></small></span>
                </a>
            </li>
            <li>
                <?php
                $sugsql = "SELECT * FROM wishlist WHERE state ='new'";
                $sugresult = mysqli_query($cxn, $sugsql);
                $sugcount = mysqli_num_rows($sugresult);
                ?>
                <a href="sug">
                    <i class="fa fa-sign-out text-yellow"></i> <span>suggestion list</span><span class=" pull-right-container">
                        <small class="label pull-right bg-blue"><?php echo $sugcount; ?></small>
                    </span></a>
            </li>
            <li><a href="signout"><i class="fa fa-sign-out text-yellow"></i> <span>Sign Out</span></a></li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>