<?php
	include "inc/header.php";
	include "inc/sidebar.php";
?>

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

                        <h3 class="box-title">Farmers</h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <!-- button with a dropdown -->
                            <!-- <a href="add_product">
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
							<?php
								if(isset($_GET['activate'])){
									$farmerid = $_GET['activate'];
									$checkactive = mysqli_query($cxn, "SELECT * FROM farmers_activation where farmerid = '$farmerid' and status = 1");
										if(mysqli_num_rows($checkactive) > 0){
											$dd = mysqli_fetch_assoc($checkactive);
											$code = $dd['code'];
											$link = 'https://www.daydone.com.ng/farmer/activation?active='.$code.'&fm='.$farmerid;
											echo '<div class="alert alert-info bg-info text-white">Activation link already generated <br> '.$link.'</div>'; 
										}else{
											//generate new link
											$timed = time(); $newcode = mt_rand(0, 450).$farmerid.str_shuffle($timed);
											$addlink = mysqli_query($cxn, "insert into farmers_activation set farmerid = '$farmerid', code = '$newcode', status = 1, timed = '$timed'");
											if($addlink){
												$link = 'https://www.daydone.com.ng/farmer/activation?active='.$newcode.'&fm='.$farmerid;
												echo '<div class="alert alert-success text-white">Activation link generate <br> '.$link.'</div>';
											}else{
												echo '<div class="alert alert-danger text-white">Link could not be generated, try again</div>';
											}
										}
								} 
							
							
								if(isset($_GET['deactivate'])){
									$dfarmerid = $_GET['deactivate'];
									$deactivate = mysqli_query($cxn, "update farmers set activation = 0 where farmer_id = '$dfarmerid' and activation = 1");
									if($deactivate){
										//deactivate all his products to
										$disaledit = mysqli_query($conn, "update products set status = 0 where seller_id = '$dfarmerid'");
										echo '<div class="alert alert-success text-white">Farmer account deactivated</div>';
									}else{
										echo '<div class="alert alert-danger text-white">Could not be deactivate account, try again</div>';
									}
								} 
							?>
                            <div class="table-responsive">
                                <table class="table table-bordered farmers-table" style="width: 980px;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email Address</th>
                                            <th>Phone Number</th>
                                            <th>Address</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $cnt =1;
                                        $query_farmer_list = mysqli_query($cxn, "SELECT * FROM farmers ORDER BY farmer_id DESC");
                                        while ($fetch_farmer_details = mysqli_fetch_assoc($query_farmer_list)) {
											$sts = $fetch_farmer_details['activation'];
											if($sts == 0){
												$status = 'Inactive';
											}else{
												$status = 'Active'; 
											}
                                            echo '
												<tr>
                                                <td scope="row"><?= $cnt++; ?></td>
                                                <td>'.$fetch_farmer_details['farmer_first_name'] . " " . $fetch_farmer_details['farmer_last_name'].'</td>
                                                <td>'.$fetch_farmer_details['farmer_email'].'</td>
                                                <td>'.$fetch_farmer_details['farmer_phone_number'].'</td>
                                                <td>'.$fetch_farmer_details['farmer_address'].'</td>
                                                <td>'.$status.'</td>
                                                <td><a href="farmer-products?fsid='.$fetch_farmer_details['farmer_id'].'" class="btn btn-info btn-sm">View Products</a></td>
                                                <td><a href="?activate='.$fetch_farmer_details['farmer_id'].'" class="btn btn-success btn-sm">Activate</a></td>
                                                <td><a href="?deactivate='.$fetch_farmer_details['farmer_id'].'" class="btn btn-danger btn-sm">Deactivate</a></td>
                                            </tr> 
											';
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
            $('.farmers-table').DataTable();
        });
    </script>