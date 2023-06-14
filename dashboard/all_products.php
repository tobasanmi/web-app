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
            <li><i class="fa fa-dashboard"></i>All Product page</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row mx-auto">            
            <section class="col-md-12 connectedSortable">  
				<?php
					if(isset($_GET['approve'])){                    
                    $aprvid = mysqli_real_escape_string($conn, $_GET['approve']);                                        
                    
                    $approd = mysqli_query($conn, "update products set status = 1 where product_id = '$aprvid'");                               
                    if($approd){
                        echo '<div class="alert alert-success bg-success text-white">Product has been Approved</div>';
                    }else{
                        echo '<div class="alert alert-danger bg-danger text-white">Error occured: Check network and try again.</div>';
                    }
                }
								
					if(isset($_GET['disable'])){                    
                    $disbid = mysqli_real_escape_string($conn, $_GET['disable']);                                        
                    
                    $disaledit = mysqli_query($conn, "update products set status = 0 where product_id = '$disbid'");                               
                    if($disaledit){
                        echo '<div class="alert alert-success bg-success text-white">Product has been Disabled</div>';
                    }else{
                        echo '<div class="alert alert-danger bg-danger text-white">Error occured: Check network and try again.</div>';
                    }
                }
				?>
                <div class="table-responsive">
                    <table class="table table-bordered products-table col-md-10 text-center">
                        <thead class="">
                            <tr>
                                <th>#</th>
                                 <th>Product Name</th>
								<th>Category</th>
								<th>Size</th>
								<th>Price</th>
								<th>Discount</th>
								<th>product Owner</th>
								<th>Number of Click</th>																
								<th>Quantity Sold</th>
								<th>Left in stock</th>
								<th>Rating</th>
								<th>Price History</th>
								<th>Action</th>
								<th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            	$cnt = 0;
                            	$query_products = mysqli_query($cxn, "select * from products order by product_id desc");  
                            	if (mysqli_num_rows($query_products) > 0) {
                                while($getproduct = mysqli_fetch_assoc($query_products)) {
									$no_of_clicks = $getproduct['no_of_clicks']; 
									$qnty_sold = $getproduct['qnty_sold'];
									$rating = $getproduct['no_of_rating_clicks']; 
									$price_history = $getproduct['price_history'];
									$sellerid = $getproduct['seller_id'];
									$product_id  = $getproduct['product_id'];
									$in_stock = $getproduct['in_stock'];
									$status = $getproduct['status'];
												
									$unsold = $in_stock;
									if($unsold == 0){
										$leftstock = '<span class="text-danger">Out of stock</span>';
									}else{
										$leftstock = $unsold;
									}
									
									if($status == 0){
										$st = 'Disabled';
										$btn = '<a class="btn btn-info" href="?approve='.$product_id.'">Approve</a>';
									}else{
										$st = 'Approved';
										$btn = '<a class="btn btn-danger" href="?disable='.$product_id.'">Deactivate</a>';
									}
									
									$myrate = mysqli_query($conn, "select *, sum(rating) as rtt, count(id) as cntid from product_ratings where productid = '$product_id'");
									if(mysqli_num_rows($myrate) == 0){
										$rating = '0.0';
									}else{
										$my = mysqli_fetch_assoc($myrate);
										$totl = $my['rtt']; 
										$cnt = $my['cntid'];												
										if($totl == ''){
											$rating = '0.0';
										}else{
											$rating = number_format(($totl / $cnt), 1); 	
										}
									}
									
									$cnt++;
									
									if($sellerid == 0){
										$seller = 'Admin';
									}else{
										$getseller = mysqli_query($conn, "select farmer_first_name, farmer_last_name from farmers where farmer_id = '$sellerid'");
										if(mysqli_num_rows($getseller) > 0){
											$rr = mysqli_fetch_assoc($getseller);
											$seller  = $rr['farmer_first_name'].' '.$rr['farmer_last_name'];
										}else{$seller = '';}
									}
                                    echo '
									<tr>
                                        <td>'.$cnt.'</td>										
										<td>'.$getproduct['product_name'].'</td> 
										<td>'.$getproduct['product_category'].'</td>
										<td>'.$getproduct['size'].'</td>
										<td>'.$getproduct['price'].'</td>
										<td>'.$getproduct['discount_price'].'</td>
										<td>'.$seller.'</td>
										<td>'.$no_of_clicks.'</td>										 
										 <td>'.$qnty_sold.'</td>
										 <td>'.$leftstock.'</td>
										 <td>'.$rating.'</td>
										 <td>'.$price_history.'</td>                                        
										<td><a class="btn btn-primary" href="product?id='.$product_id.'">View</a></td>
										<td>'.$btn.'</td>
                                    </tr>';
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </section>
</div>
    <?php
    include "inc/footer.php";
    ?>
    
    <script>
  $(document).ready(function() {
    $('.products-table').DataTable();
  });
</script>