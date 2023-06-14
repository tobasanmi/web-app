<?php
include "inc/header.php";
?>

<style>
	.badge {padding: 6px 10px; font-size: 65%;}
</style>
<div class="main-panel">
    <div class="main-content">
        <div class="content-wrapper">
            <div class="container-fluid">
                <!--Statistics cards Starts-->
                <div class="row">
                    <div class="col-xl-12 col-lg-10 col-md-8 col-12">

                        <div class="card">
                            <div class="card-header p-2">
                                <div class="row">
                                    <div class="col-xl-8 col-md-8">
                                        <h4>Sales History</h4>
                                    </div>                                    
                                </div>
                            </div>
                            <div class="card-body">								
                                <div class="table-responsive">
                                    <table class="table table-bordered products-table" style="width: 980px;">
                                        <thead class="thead-inverse">
                                            <tr>
                                                <th>#</th>
                                                <th>Product</th>
                                                <th>Amount</th>
                                                <th>Payment Method</th>
                                                <th>Status</th>
                                                <th>Date</th>                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $cnt = 0;
                                            $sql = mysqli_query($cxn, "select * from trans where sellerid= '$farmer_loggedin_id' order by id desc");                                            
                                            while ($getproduct = mysqli_fetch_assoc($sql)) {
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
												
												if($status == '1'){
													$st = '<span class="badge badge-primary badge-xs text-white">Delivered</span>';
												}else if($status == 2){
													$st = '<span class="badge badge-success badge-sm text-white">Paid Out</span>';
												}else if($status == 0){
													$st = '<span class="badge badge-danger badge-sm text-white">Pending</span>';
												}else {
													$st = '<span class="badge badge-dark text-white">Uknown</span>';
												}
												
												$cnt++;
                                                echo '
													<tr>
														<td scope="row">'.$cnt.'</td>
														<td>'.$productname.'</td>
														<td>&#8358;'.number_format($amount, 2).'</td>
														<td>'.$method.'</td>				
														<td>'.$st.'</td>				
														<td>'.date('D, d M Y h:i a', $order_date).'</td>				
													</tr>';                                     
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Statistics cards Ends-->
            </div>
        </div>
    </div>


    <?php
    include "inc/footer.php";
    ?>

    <script>
        $(document).ready(function() {
            $('.products-table').DataTable();
        });
    </script>