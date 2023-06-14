<?php
	include "inc/header.php";
	include "inc/sidebar.php";
	include "../config/functions.php";
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
                <div class="box box-solid bg-blue-gradient">
                    <div class="box-header">
                        <i class="fa fa-list"></i>

                        <h3 class="box-title">Product Review</h3>                        
                        <div class="pull-right box-tools">
                        </div>                        
                    </div>
                    <div class="box-footer text-black card text-center">
                        <div class="card-body">
							<?php
									if(isset($_GET['approve'])){                    
									$aprvid = mysqli_real_escape_string($conn, $_GET['approve']);                                        

									$approd = mysqli_query($conn, "update comments set status = 1 where id = '$aprvid'");                               
									if($approd){
										echo '<div class="alert alert-success bg-success text-white">Review has been Approved</div>';
									}else{
										echo '<div class="alert alert-danger bg-danger text-white">Error occured: Check network and try again.</div>';
									}
								}

									if(isset($_GET['disable'])){                    
									$disbid = mysqli_real_escape_string($conn, $_GET['disable']);                                        

									$disaledit = mysqli_query($conn, "update comments set status = 0 where id = '$disbid'");                               
									if($disaledit){
										echo '<div class="alert alert-success bg-success text-white">Review has been Disabled</div>';
									}else{
										echo '<div class="alert alert-danger bg-danger text-white">Error occured: Check network and try again.</div>';
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
                                            <th>Product</th>
                                            <th>Seller</th>
                                            <th>Review</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $cnt =0;																					
                                        $getcomment = mysqli_query($cxn, "SELECT * FROM comments ORDER BY id DESC");
                                        while ($row= mysqli_fetch_assoc($getcomment)) {
											$id = $row['id'];
											$product_id = $row['product_id'];
											$seller_id = $row['seller_id'];
											$comment = $row['comment'];
											$status = $row['status'];
											$pname = getproductname($product_id);
											if($seller_id == 0){
												$seller = 'Admin';
											}else{
												$seller = getseller($seller_id);													
											}
												
												if($status == 0){
													$st = 'Disabled';
													$btn = '<a class="btn btn-info" href="?approve='.$id.'">Approve</a>';
												}else{
													$st = 'Approved';
													$btn = '<a class="btn btn-danger" href="?disable='.$id.'">Deactivate</a>';
												}
									
											$cnt++;
                                        
                                            echo '
											<tr>
                                                <td scope="row">'.$cnt.'</td>
                                                <td>'.$row['comment_user'].'</td>
                                                <td>'.$row['comment_useremail'].'</td>
                                                <td>'.$pname.'</td>
                                                <td>'.$seller.'</td>
                                                <td>'.$comment.'</td>
                                                <td>'.$st.'</td>
                                                <td>'.$btn.'</td>
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