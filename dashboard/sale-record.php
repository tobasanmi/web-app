<?php
include "inc/header.php";
include "inc/sidebar.php";
?>

<div class="content-wrapper">
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

                        <h3 class="box-title">Sales</h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools"> </div>
                        <!-- /. tools -->
                    </div>
                    <div class="box-footer text-black card text-center">
                        <div class="card-body">
							<?php
								if(isset($_GET['paid'])){
									$paidorder = $_GET['paid'];
									$tt = $_GET['tt'];
									$checksale = mysqli_query($cxn, "select * from trans where orderid = '$paidorder' and id = '$tt' and status = 1");
										if(mysqli_num_rows($checksale) > 0){
											$updttran = mysqli_query($conn, "update trans set status = 2 where orderid = '$paidorder' and status = 1");     
											if($updttran){
												echo '<div class="alert alert-success bg-success">Payout Updated</div>';
											}else{
												echo '<div class="alert alert-danger bg-danger">Unable to update payout</div>';
											}
										}else{
											echo '<div class="alert alert-danger text-white">Invalid Payout/Already Paid</div>';
										}
								} 
							?>
                            <div class="table-responsive">
                                <table class="table table-bordered farmers-table" style="width: 980px;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Order ID</th>
                                            <th>Product</th>
											<th>Amount</th>
											<th>Payment Method</th>
											<th>Seller</th>
											<th>Buyer</th>
											<th>Status</th>
											<th>Date</th> 
											<th>Action</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $cnt = 0;
                                            $sql = mysqli_query($cxn, "select * from trans order by id desc");                                            
                                            while ($getproduct = mysqli_fetch_assoc($sql)) {
												$id = $getproduct['id']; 
												$productid = $getproduct['productid']; 
												$orderid = $getproduct['orderid'];
												$productname = $getproduct['productname']; 
												$sellerid = $getproduct['sellerid'];
												$amount = $getproduct['amount'];
												$buyeremail = $getproduct['buyeremail'];
												$payment_method = $getproduct['payment_method'];
												$order_date = $getproduct['order_date'];
												$status = $getproduct['status'];
												
												if($payment_method == 'p.o.d'){
													$method = 'Pay on Delivery';
												}else if($payment_method == 'card'){
													$method = 'Pay Online';
												}else{
													$method = 'Unknown';
												}
												
												
												if($sellerid == 0){
													$seller = 'Admin'; $btn = '';
												}else{
													$getseller = mysqli_query($conn, "select farmer_first_name, farmer_last_name from farmers where farmer_id = '$sellerid'");
													if(mysqli_num_rows($getseller) > 0){
														$rr = mysqli_fetch_assoc($getseller);
														$seller  = $rr['farmer_first_name'].' '.$rr['farmer_last_name'];
														$btn = '<a href="?paid='.$orderid.'&tt='.$id.'" title="Click to confirm you make payout" class="btn btn-info btn-sm">Paid Out</a>';
													}else{$seller = ''; $btn = '';}
												}
												if($status == 1 && $seller != 'Admin'){
													$st = '<span class="badge badge-success badge-xs text-white">Successful</span>';
													$btn = '<a href="?paid='.$orderid.'&tt='.$id.'" title="Click to confirm you make payout" class="btn btn-info btn-sm">Paid Out</a>';
												}else if($status == 2){
													$st = '<span class="badge badge-danger primary-sm text-white">Paid Out</span>';
													$btn = '';
												}else if($status == 0){
													$st = '<span class="badge badge-danger badge-sm text-white">Pending</span>';
													$btn = '';
												}else {
													$st = '-';
													$btn = '';
												}
												
												$cnt++;
                                                echo '
													<tr>
														<td scope="row">'.$cnt.'</td>
														<td>'.$orderid.'</td>
														<td>'.$productname.'</td>
														<td>&#8358;'.number_format($amount, 2).'</td>
														<td>'.$method.'</td>				
														<td>'.$seller.'</td>				
														<td>'.$buyeremail.'</td>				
														<td>'.$st.'</td>				
														<td>'.date('D, d M Y h:i a', $order_date).'</td>	
														<td>'.$btn.'</td>                                                		
													</tr>';                                     
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