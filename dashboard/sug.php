<?php
include "inc/header.php";

if (!isset($_SESSION['super_admin_id'])) {
  header("Location: signin.php");
}

$sql = "SELECT * FROM msg WHERE state ='new' ";
$result = mysqli_query($cxn, $sql);
$msgcounter = mysqli_num_rows($result);

if ($msgcounter == 0) {
  $msgcount = "";
} else {
  $msgcount = $msgcounter;
}


$sqlx = "SELECT * FROM wishlist  WHERE state ='new' ORDER BY timestamp DESC";
$resultx = mysqli_query($cxn, $sqlx);
$msgcounterx = mysqli_num_rows($resultx);

include 'inc/sidebar.php';
?>   

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
                  <center><b>Total Suggestion: <span><?php echo $msgcounterx; ?></span></b></center>
                </h3>
              </div>
              <div class="panel-body">
                <ul class="todo-list">
                  <?php
                  while ($row = mysqli_fetch_assoc($resultx)) {

                    echo "<li>
							<a href='suggest.php?" . $row['id'] . "' style='color:dimgray'><span class='text'>" . $row['product_name'] . "</span></a>
							";
                  }



                  ?>
                </ul>

              </div>
            </div>
          </div>

        </div>

        <a href="oldsug.php">
          <div>
            <center> <button type="button" class="btn btn-sm" style="background-color:navy;color:#fff"><b>see all Suggestions</b></button></center>
          </div>
        </a>
        <!-- /.row -->
        <!-- Main row -->

        <!-- /.row (main row) -->

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->