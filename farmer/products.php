<?php
include "inc/header.php";
?>

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
                                        <h4>Products</h4>
                                    </div>
                                    <div class="col-xl-4 col-md-4">
										<a href="add-product" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Add Product</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
								<?php
									if (isset($_GET['pid'])) {
										$product_id = $_GET['pid'];
										$delete_product = mysqli_query($cxn, "DELETE FROM products WHERE product_id = '$product_id'");
										if ($delete_product) {
											//header("Location: products");
											echo '<div class="alert alert-success bg-success">Product Deleted</div>';
										} else {
											echo "<script> alert('Error occured while deleting this product. Please try again later!!'); </script>";
										}
									}

								?>
                                <div class="table-responsive">
                                    <table class="table table-bordered products-table" style="width: 980px;">
                                        <thead class="thead-inverse">
                                            <tr>
                                                <th>#</th>
                                                <th>Product</th>
                                                <th>Category</th>
                                                <th>Size</th>
                                                <th>Price</th>
                                                <th>Discount</th>
												<th>Number of Click</th>												
												<th>Quantity Sold</th>
												<th>Left in stock</th>
												<th>Rating</th>
												<th>Price History</th>
                                                <th colspan="2">Actions</th>                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $cnt = 0;
                                            $sql = "SELECT * FROM products WHERE seller_id= '$farmer_loggedin_id' ORDER BY product_id DESC LIMIT 10";
                                            $result = mysqli_query($cxn, $sql);
                                            while ($getproduct = mysqli_fetch_assoc($result)) {
												$no_of_clicks = $getproduct['no_of_clicks']; 
												$qnty_sold = $getproduct['qnty_sold'];
												//$rating = $getproduct['no_of_rating_clicks']; 
												$price_history = $getproduct['price_history'];
												$in_stock = $getproduct['in_stock'];
												$proid = $getproduct['product_id'];
												
												$unsold = $in_stock; 
												if($unsold == 0){
													$leftstock = '<span class="text-danger">Out of stock</span>';
												}else{
													$leftstock = $unsold;
												}
												
												$myrate = mysqli_query($conn, "select *, sum(rating) as rtt, count(id) as cntid from product_ratings where productid = '$proid'");
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
                                                echo '
													<tr>
														<td scope="row">'.$cnt.'</td>
														<td>'.$getproduct['product_name'].'</td>
														<td>'.$getproduct['product_category'].'</td>
														<td>'.$getproduct['size'].'</td>
														<td>'.$getproduct['price'].'</td>
														<td>'.$getproduct['discount_price'].'</td>
														<td>'.$no_of_clicks.'</td>														 
														 <td>'.$qnty_sold.'</td>
														 <td>'.$leftstock.'</td>
														 <td>'.$rating.'</td>
														 <td>'.$price_history.'</td>
														<td><a href="edit-product?pid='.$getproduct['product_id'].'" class="btn btn-primary btn-sm">Edit Product</a></td>
														<td><a href="?pid='.$getproduct['product_id'].'" class="btn btn-danger btn-sm">Delete</a>
														</td>
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