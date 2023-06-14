<?php
include "inc/header.php";
if (isset($_GET['fsid'])) {
    $farmer_seller_id = $_GET['fsid'];
}else {
    header("Location: farmers.php");
}
?>

<!-- Left side column. contains the logo and sidebar -->
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
            <li><a href="add_product.php"><i class="fa fa-plus text-green"></i> <span>Add New Product</span></a></li>
            <li><a href="farmers.php"><i class="fa fa-user text-green"></i> <span>Farmers</span></a></li>
            <li>
                <?php
                $ordersql = "SELECT * FROM sales WHERE status ='placed'";
                $orderresult = mysqli_query($cxn, $ordersql);
                $ordercount = mysqli_num_rows($orderresult);
                ?>
                <a href="order.php">
                    <i class="fa fa-cart-plus text-blue""></i> <span>New Orders</span>
             <span class=" pull-right-container">
                        <small class="label pull-right bg-blue"><?php echo $ordercount; ?></small>
                        </span>
                </a>
            </li>
            <li>
                <?php
                $sugsql = "SELECT * FROM wishlist WHERE state ='new'";
                $sugresult = mysqli_query($cxn, $sugsql);
                $sugcount = mysqli_num_rows($sugresult);
                ?>
                <a href="sug.php">
                    <i class="fa fa-sign-out text-yellow"></i> <span>suggestion list</span><span class=" pull-right-container">
                        <small class="label pull-right bg-blue"><?php echo $sugcount; ?></small>
                    </span></a>
            </li>
            <li><a href="signout.php"><i class="fa fa-sign-out text-yellow"></i> <span>Sign Out</span></a></li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo "<small>Hello " . $admin_name . ", welcome.</small>"; ?>
        </h1>
        <ol class="breadcrumb">
            <li><i class="fa fa-dashboard"></i> Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <section class="col-lg-12 cxnectedSortable">

                <!-- Map box -->

                <div class="box box-solid bg-blue-gradient">
                    <div class="box-header">
                        <i class="fa fa-list"></i>

                        <h3 class="box-title">Farmer Products</h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <!-- button with a dropdown -->
                            <!-- <a href="add_product.php">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm pull-right" style="background-color:orange;color:#fff"><i class="fa fa-plus"></i> Add New
                                        Item</button>
                                </div>
                            </a> -->
                        </div>
                        <!-- /. tools -->
                    </div>
                    <div class="box-footer text-black card text-center">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered farmers-product-table" style="width: 920px;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Product Name</th>
                                            <th>Category</th>
                                            <th>Price</th>
                                            <th>Type</th>
                                            <th>Size</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $cnt = 1;
                                        $query_farmer_product = mysqli_query($cxn, "SELECT * FROM products WHERE seller_id='$farmer_seller_id' ORDER BY product_id DESC");
                                        while ($fetch_farmer_product = mysqli_fetch_assoc($query_farmer_product)) {
                                        ?>
                                            <tr>
                                                <td scope="row"><?= $cnt++; ?></td>
                                                <td><?= $fetch_farmer_product['product_name']; ?></td>
                                                <td><?= $fetch_farmer_product['product_category']; ?></td>
                                                <td><?= $fetch_farmer_product['price']; ?></td>
                                                <td><?= $fetch_farmer_product['product_type']; ?></td>
                                                <td><?= $fetch_farmer_product['size']; ?></td>
                                                <td><a href="farmer-product.php?fpid=<?= $fetch_farmer_product['product_id']; ?>" class="btn btn-info btn-sm">View Product</a></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>

    <?php
    include "inc/footer.php";
    ?>

    <script>
        $(document).ready(function() {
            $('.farmers-product-table').DataTable();
        });
    </script>