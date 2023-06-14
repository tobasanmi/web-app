<?php
	include "inc/header.php";
	include "inc/sidebar.php";
?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>
      	<?php 
			$admin_name = '';
			echo "<small>Hello " . $admin_name . ", welcome.</small>"; 
		?>
    </h1>
    <ol class="breadcrumb">
      <li><i class="fa fa-dashboard"></i> Dashboard</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3><?php echo $productcount; ?></h3>

            <p>Products</p>
          </div>
          <div class="icon">
            <i class="fa fa-shopping-cart"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3>53<sup style="font-size: 20px">%</sup></h3>

            <p>Bounce Rate</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">


            <h3><?php echo  $usercounter; ?></h3>

            <p>Registered Users</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="users.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3><?php echo  $farmerscounter; ?></h3>

            <p>Number of Farmers</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="farmers.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <section class="col-lg-6 cxnectedSortable">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="nav-tabs-custom">
          <!-- Tabs within a box -->
          <ul class="nav nav-tabs pull-right">
            <li class="pull-left header"><i class="fa fa-bar-chart"></i> Trending Products</li>
          </ul>
          <div class="tab-content no-padding">
            <!-- Morris chart - Sales -->
            <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height:auto;">
              <div class="box-footer text-black">

                <?php
                $sql = "SELECT * FROM products ORDER BY qnty_sold DESC LIMIT 3";
                $result = mysqli_query($cxn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
					$seller_id = $row['seller_id'];
				if($seller_id == 0){$path = 'https://www.daydone.com.ng/dashboard/';}else{$path = 'https://www.daydone.com.ng/farmer/';}	

                  echo '
				   <a href="product?id=' . $row['product_id'] . '" ><div>
						  <!-- Tabs within a box -->
						  <ul class="nav nav-tabs pull-right">
						  </ul>
						  <div class="tab-content no-padding">
							<div class="tab-pane active"  style="position: relative">
						  <center><span><img src="' .$path.$row['product_img'] . '" style="width:40%;"/></span></center>
						  </div>
						  </div>
						</div>

						<div>
						<ul class="nav nav-tabs pull-right">
						</ul>
						<div style="padding:20px">
						<div style="width:45%; float:right; color:gray; font-size:14px"><b>Price</b><br><div style="border:1px solid #ede9f2; padding:5px; font-size:13px" >' . $row['price'] . '</div></div>
						<div style="width:45%; color:gray; font-size:14px"><b>Product Name</b><br><div style="border:1px solid #ede9f2; padding:5px; font-size:13px" >' . $row['product_name'] . '</div></div>
					  </div>	

					  </div>
					  </a>
					  <hr>							  
					';
                }

                ?>
                </ul>

              </div>
            </div>
          </div>
        </div>
        
      </section>

      <section class="col-lg-6 cxnectedSortable">

        <!-- Map box -->

        <div class="box box-solid bg-blue-gradient">
          <div class="box-header">
            <i class="fa fa-list"></i>

            <h3 class="box-title">Product List</h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
              <!-- button with a dropdown -->
              <a href="add_product">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm pull-right" style="background-color:orange;color:#fff"><i class="fa fa-plus"></i> Add New
                    Item</button>
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
							<a href='product?id=" . $row['product_id'] . "' style='color:#444444'><span class='text'>" . $row['product_name'] ." </span></a>
							";
                echo "</li>";
              }
              ?>
            </ul>
            <div class="col text-center mt-3 mb-1">
              <a href="all_products" class="btn btn-primary">All Products</a>
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