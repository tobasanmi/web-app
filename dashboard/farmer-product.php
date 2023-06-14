<?php
include "inc/header.php";
if (isset($_GET['fpid'])) {
  $farmer_product_id = $_GET['fpid'];
  $query_product_details = mysqli_query($cxn, "SELECT * FROM products WHERE product_id='$farmer_product_id'");
  $row = mysqli_fetch_assoc($query_product_details);
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
      <li><a href="add_product.php"><i class="fa fa-cart-plus text-green"></i> <span>Add New Product</span></a></li>
      <li><a href="#"><i class="fa fa-edit text-green"></i> <span>Edit Profile</span></a></li>
      <li><a href="#"><i class="fa fa-edit text-yellow"></i> <span>Edit Store Details</span></a></li>
      <li><a href="Signout.php"><i class="fa fa-sign-out text-yellow"></i> <span>Sign Out</span></a></li>
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
      <li><i class="fa fa-dashboard"></i> Product page</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <section class="col-lg-8 connectedSortable">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="nav-tabs-custom">
          <!-- Tabs within a box -->
          <div class="nav nav-tabs pull-right">
            <li class="pull-left header"><i class="fa fa-bar-camera"></i>Farmer Products Images</li>
            <div class="pull-right box-tools">
              <!-- button with a dropdown -->
              <a href="edit_product.php?id=<?php echo $row['product_id']; ?>">
                <div class="btn-group" style=" padding:5px">

                  <button type="button" class="btn btn-sm pull-right" style="background-color:deepskyblue;color:#fff; padding:5px"><i class="fa fa-edit"></i> Edit Product</button>
                </div>
              </a>
            </div>
          </div>
          <div class="tab-content no-padding">
            <div class="tab-pane active" style="position: relative">
              <center><span><img src="<?= $row['seller_id'] != 0 ? '../farmer/'. $row['product_img'] : $row['product_img']; ?>" style="width:90%; max-width:500px" /></span></center>
            </div>
          </div>
        </div>

        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs pull-right">
            <li class="pull-left header">Price </li>
          </ul>
          <div style="padding:20px">
            <div style="width:37%; float:right; color:gray; font-size:14px"><b>Price</b><br>
              <div style="border:1px solid #ede9f2; padding:5px; font-size:13px"><?php echo $row['price']; ?></div>
            </div>
            <div style="width:60%; color:gray; font-size:14px"><b>Product Name</b><br>
              <div style="border:1px solid #ede9f2; padding:5px; font-size:13px"> <?php echo $row['product_name']; ?></div>
            </div>
            <br>
            <div style="width:100%; max-width:408px; color:gray; font-size:14px"><b>Category</b><br>
              <div style="border:1px solid #ede9f2; padding:5px; font-size:13px"><?php echo $row['product_category']; ?></div>
            </div>
            <br>
            <p>Description</p>
            <div style="border:1px solid #ede9f2; width:100% auto; padding:5px"><?php echo nl2br($row['product_desc']); ?> </div>
          </div>
          <div class="tab-content no-padding">
            <div class="tab-pane active" style="position: relative">
            </div>
          </div>

        </div>
        <br>
        <a href="delete_product.php?id=<?= $row['product_id']; ?>"> <button type="button" class="btn btn-sm pull-right" style="background-color:orangered;color:#fff; padding:5px"> Delete this Product</button></a>

        <!-- /.nav-tabs-custom -->

        <!-- Chat box -->
        <!-- /.box (chat box) -->

        <!-- TO DO List -->
        <!-- /.box -->

        <!-- quick email widget -->
      </section>
      <!-- /.Left col -->
      <!-- right col (We are only adding the ID to make the widgets sortable)-->
      <section class="col-lg-4 connectedSortable">

        <!-- Map box -->


        <div class="box box-solid bg-blue-gradient">
          <div class="box-header">
            <i class="fa fa-list"></i>

            <h3 class="box-title">Product List</h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
              <!-- button with a dropdown -->
              <a href="add_product.php">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm pull-right" style="background-color:orange;color:#fff"><i class="fa fa-plus"></i> Add New Item</button>
                </div>
              </a>
            </div>
            <!-- /. tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
            <!--The calendar -->
            <div id="calendar" style="width: 100%"></div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer text-black">
            <ul class="todo-list">
              <?php
              $sql = "SELECT * FROM products ORDER BY time DESC LIMIT 10";
              $result = mysqli_query($cxn, $sql);
              while ($row = mysqli_fetch_assoc($result)) {
                echo "<li>
							<a href='product.php?id=" . $row['product_id'] . "' style='color:#444444'><span class='text'>" . $row['product_name'] . "</span></a>
							";
                echo "
                            </li>
				           ";
              }
              ?>

            </ul>
            <div class="col text-center mt-3 mb-1">
              <a href="all_products.php" class="btn btn-primary">All Products</a>
            </div>
          </div>
        </div>
      </section>
      <!-- right col -->
    </div>
    <!-- /.row (main row) -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include "inc/footer.php";
?>