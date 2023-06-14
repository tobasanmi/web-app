<?php
include "inc/header.php";

if ((!isset($_SESSION['super_admin_id']))) {
  header("Location: signin.php");
}

$sql = "SELECT * FROM wishlist WHERE state ='new' ";
$result = mysqli_query($cxn, $sql);
$msgcounter = mysqli_num_rows($result);

if ($msgcounter == 0) {
  $msgcount = "";
} else {
  $msgcount = $msgcounter;
}



$url = $_SERVER['REQUEST_URI'];

if (($msg = strpos($url, "?")) !== FALSE) {
  $msgg = substr($url, $msg + 1);
  $message = str_replace(array('%20'), ' ', $msgg);
} else {
  $message = "";
}


$sql = "SELECT * FROM wishlist WHERE id =$message";
$result = mysqli_query($cxn, $sql);
$row = mysqli_fetch_assoc($result);


echo $message;
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
          <a href="pages/calendar.html">
          </a>
          </li>
          <li><a href="#"><i class="fa fa-sign-out text-yellow"></i> <span>Sign Out</span></a></li>
          <!---
		<li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
		-->
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <ol class="breadcrumb">
          <li><i class="fa fa-cart-plus "></i> Add New Product</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <div class="login-panel panel panel-default">
              <div class="panel-heading" style="background-color:#B1C4FF">
                <h3 class="panel-title" style="font-size:12px; color:#ffffff;">
                  <center><b>Message Details</b></center>
                </h3>
              </div>
              <div class="panel-body">
                <ul class="todo-list">
                  <?php
                  echo "<li>
							<a  style='color:dimgray'><span class='text'>" . $row['product_name'] . "</span></a>
							</li>
							<li>
							<a  style='color:dimgray'><span class='text'>" . $row['phone'] . "</span></a>
							</li>
							<li>
							<a  style='color:dimgray'><span class='text'>" . $row['email'] . "</span></a>
							</li>
							<li>
							<a  style='color:dimgray;'><span class='text'>" . $row['region'] . "</span></a>
							</li>
							";
                  ?>
                </ul>
<div> 
		 <a href="darkcode/sug_treat.php?<?php echo $row['id']; ?>"> <button type="button" class="btn btn-sm pull-right" style="background-color:green;color:#fff; padding:5px"> Recommendation treated</button></a>
         </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->

        <!-- /.row (main row) -->

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php
    include "inc/footer.php";
    ?>