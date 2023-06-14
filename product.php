<?php
include "inc/header.php";
include "config/functions.php";

if (isset($_GET['prod'])) {
    $product_id = $_GET['prod'];
    $query_product_details = "SELECT * FROM products WHERE product_id='$product_id' and status = 1";
    $result_query_product_details = mysqli_query($cxn, $query_product_details);
	if(mysqli_num_rows($result_query_product_details) == 0){
		header("Location: ./");	
	}else{
		$fetch_product_details = mysqli_fetch_assoc($result_query_product_details);
		$product_id = $fetch_product_details['product_id'];
		$owner = $fetch_product_details['seller_id'];
		$discount = $fetch_product_details['discount_price'];
		$stock = $fetch_product_details['in_stock'];
			$qnty_sold = $fetch_product_details['qnty_sold'];
			$tstock = $stock;

			if($tstock == 0){
				$leftstock = 'Out of stock';
				$disabled = 'disabled';
			}else{
				$disabled = '';
				$leftstock = 'In Stock: '.$tstock;
			}
			if($discount != ''){
				$prdprice = $fetch_product_details['discount_price'];
			}else{
				$prdprice = $fetch_product_details['price'];
			}
	}
} else { 
    header("Location: ./"); 
}
?>

<style>
* { box-sizing: border-box; }

/*
.container {
  background-image: url("https://www.toptal.com/designers/subtlepatterns/patterns/concrete-texture.png");
  display: flex;
  flex-wrap: wrap;
  height: 100vh;
  align-items: center;
  justify-content: center;
  padding: 0 20px;
}
*/

.rating {
  display: flex;
  width: 100%; 
  justify-content: left;
  overflow: hidden;
  flex-direction: row-reverse;  
  position: relative;
}

.rating-0 {
  filter: grayscale(100%);
}

.rating > input {
  display: none;
}

.rating > label {
  cursor: pointer;
  width: 30px;
  height: 30px;
  margin-top: auto;
  background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23e3e3e3' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
  background-repeat: no-repeat;
  background-position: center;
  background-size: 76%;
  transition: .3s;
}

.rating > input:checked ~ label,
.rating > input:checked ~ label ~ label {
  background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23fcd93a' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
}


.rating > input:not(:checked) ~ label:hover,
.rating > input:not(:checked) ~ label:hover ~ label {
  background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23d8b11e' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
}
p.in-pa {
    color: #999;
    font-size: 1em;
    line-height: 2em;
    margin: 0em 0;
    border-bottom: 1px solid #f0f0f0;
    padding: 1em 0;
}

/*.emoji-wrapper {
  width: 100%;
  text-align: center;
  height: 100px;
  overflow: hidden;
  position: absolute;
  top: 0;
  left: 0;
}

.emoji-wrapper:before,
.emoji-wrapper:after{
  content: "";
  height: 15px;
  width: 100%;
  position: absolute;
  left: 0;
  z-index: 1;
}

.emoji-wrapper:before {
  top: 0;
  background: linear-gradient(to bottom, rgba(255,255,255,1) 0%,rgba(255,255,255,1) 35%,rgba(255,255,255,0) 100%);
}

.emoji-wrapper:after{
  bottom: 0;
  background: linear-gradient(to top, rgba(255,255,255,1) 0%,rgba(255,255,255,1) 35%,rgba(255,255,255,0) 100%);
}

.emoji {
  display: flex;
  flex-direction: column;
  align-items: center;
  transition: .3s;
}

.emoji > svg {
  margin: 15px 0; 
  width: 70px;
  height: 70px;
  flex-shrink: 0;
}

#rating-1:checked ~ .emoji-wrapper > .emoji { transform: translateY(-100px); }
#rating-2:checked ~ .emoji-wrapper > .emoji { transform: translateY(-200px); }
#rating-3:checked ~ .emoji-wrapper > .emoji { transform: translateY(-300px); }
#rating-4:checked ~ .emoji-wrapper > .emoji { transform: translateY(-400px); }
#rating-5:checked ~ .emoji-wrapper > .emoji { transform: translateY(-500px); }*/

</style>

<!--banner-->
<div class="banner-top">
    <div class="container">
        <h3>Product</h3>
        <h4><a href="./">Home</a><label>/</label>Product Details</h4>
        <div class="clearfix"> </div>
    </div>
    <div class="cart">

        <span class="fa fa-shopping-cart my-cart-icon"><span class="badge badge-notify my-cart-badge"></span></span>
    </div>
</div>

<div class="single">
    <div class="container">
        <div class="single-top-main">
            <div class="col-md-5 single-top">
                <div class="single-w3agile">

                    <div id="picture-frame">
                        <img src="<?= $fetch_product_details['seller_id'] == 0 ? 'dashboard/' : 'farmer/' ?><?= $fetch_product_details['product_img']; ?>" data-src="<?= $fetch_product_details['seller_id'] == 1 ? 'dashboard/' : 'farmer/' ?><?= $fetch_product_details['product_img']; ?>" alt="farm produce delivery" class="img-responsive w-50 h-50" />
                    </div>
                    <script src="assets/js/jquery.zoomtoo.js"></script>
                    <script>
                        $(function() {
                            $("#picture-frame").zoomToo({
                                magnify: 1
                            });
                        });
                    </script>
                </div>
            </div>

            <div class="col-md-7 single-top-left ">
                <div class="single-right">
                    
					<?php 
						echo '<h3>'.$fetch_product_details['product_name'].'</h3>';
					
						if($discount != ''){
							echo '<p>
								<del><em class="item_price">&#8358;'.number_format($fetch_product_details['price'], 2).'</em></del>&nbsp;
								<ins><em class="item_price">&#8358;'.number_format($fetch_product_details['discount_price'], 2).'</em></ins>
							</p>';
						}else{
							echo '<p><em class="item_price">&#8358;'.number_format($fetch_product_details['price'], 2).'</em></p>'; 
						}
					?>
                    <div class="pr-single">
                        <p class="reduced ">
							
                            <?php
								$main_price = $fetch_product_details['price']; 
                            if (isset($fetch_product_details['discount_price'])){
                                $discount_price = $fetch_product_details['discount_price'];
								if($discount_price == ''){
									$discount = 0;
									echo '&#8358;'.$main_price." at 0% discount";
								}else{
									$discount = $discount_price;
									$percent = ($discount / $fetch_product_details['price']) * 100;
									$percent_dicount = 100 - $percent;
									echo '&#8358;'.$discount_price." at " . round($percent_dicount, 2) . "% discount";
								}
                            }
                            ?></p>
						<p><?php echo $leftstock;?></p>
                    </div>
                    <div class="block block-w3">
                        <?php
                        	$prod_rating_val;
                        	$query_avg_per_product = mysqli_query($cxn, "SELECT avg_per_prodct FROM products WHERE product_id=" . $fetch_product_details['product_id'] . "");
							// if (mysqli_num_rows($query_avg_per_product) > 0) {
							$fetch_avg_per_product = mysqli_fetch_assoc($query_avg_per_product);
							// }
							$prod_rating_val = $fetch_avg_per_product['avg_per_prodct'];                        
                        ?>
                        <input type="hidden" id="<?= $fetch_product_details['product_id']; ?>" data-rateit-valuesrc="value" value="<?= $prod_rating_val ? $prod_rating_val : 0; ?>">

                        <a href="javascript:void(0)" class="numOfRateClick" rateclick="<?= $fetch_product_details['product_id']; ?>" name="ratin_click">
                         <div data-rateit-backingfld="#<?= $fetch_product_details['product_id']; ?>" data-productid="<?= $fetch_product_details['product_id']; ?>" class="rateit small ghosting" data-rateit-mode="font"></div>
                        </a>

                        <form action="" method="post">
                            <input type="hidden" name="rate_prodxt_id"><input type="hidden" name="rate_prodxt_value">
                        </form>						
							<?php 								
								$ip = $user_ip = getUserIP();
								$myrating = mysqli_query($conn, "select *, sum(rating) as rtt, count(id) as cntid from product_ratings where productid = '$product_id' and ip = '$ip'");
									$my = mysqli_fetch_assoc($myrating);									 
									$totl = $my['rtt']; 
									$cnt = $my['cntid'];
									if($totl == ''){
										$ratt = 0;		
									}else{
										$ratt = $totl / $cnt;																					
									}					
									$rating = number_format($ratt, 1);											
							?>
						 	<!--<form action="">																
								<div class="rating">
								  <input type="radio" name="starrating" value="5" id="rating-5" <?php if($rating == 5){echo 'checked'; }else{}?> />
								  <label for="rating-5"></label>
								  <input type="radio" name="starrating" value="4" id="rating-4" <?php if($rating == 4){echo 'checked'; }else{}?>/>
								  <label for="rating-4"></label>
								  <input type="radio" name="starrating" value="3" id="rating-3" <?php if($rating == 3){echo 'checked'; }else{}?>/>
								  <label for="rating-3"></label>
								  <input type="radio" name="starrating" value="2" id="rating-2" <?php if($rating == 2){echo 'checked'; }else{}?>/>
								  <label for="rating-2"></label>
								  <input type="radio" name="starrating" value="1" id="rating-1" <?php if($rating == 1){echo 'checked'; }else{}?>/>
								  <label for="rating-1"></label>   
									<input type="hidden" id="productid" value="<?php echo $product_id; ?>">
									<input type="hidden" id="seller" value="<?php echo $owner;?>">			
								</div>
							</form> 						  								
                    		<div id="showrating" style="font-size: 25px;"></div>							-->
							<!--<span class=""><b><?php echo $rating. ' '.($cnt);?></b></span>-->						
                        	<!--<span class=""><b><?= $prod_rating_val ? round($prod_rating_val, 1) : 0; ?> (<?= $fetch_product_details['no_of_rating_clicks'] ? $fetch_product_details['no_of_rating_clicks'] : 0; ?>)</b></span>-->
                    </div>
                    <div class="add add-3">
                        <?php
                        $seller_id = $fetch_product_details['seller_id'];
                        if ($seller_id != 0) {
                            $query_farmer_name = mysqli_query($cxn, "SELECT farmer_first_name, farmer_last_name FROM farmers WHERE farmer_id=$seller_id");
                            $fetch_farmer_name = mysqli_fetch_assoc($query_farmer_name);
                        }
                        ?>
                        <span class="text-center"><?= isset($fetch_farmer_name) ? "Sold By: <b>" . $fetch_farmer_name['farmer_first_name'] . " " . $fetch_farmer_name['farmer_last_name'] . "</b>" : ""; ?></span>
                        <p class="in-pa">
                            <?= $fetch_product_details['remark']; ?>
                            <a class="btn btn-small pull-right" color="blue" href="#detail">More Details</a>
                        </p>
                        <div class="row social-fo" style="margin-top: 20px; display: flex;">
                            <div class="col-md-3">                                
								<?php										
									echo '<button class="btn my-cart-btn my-cart-b" '.$disabled.' data-id="'.$fetch_product_details['product_id'].'" data-name="'.$fetch_product_details['product_name'].'" data-sll="'.$fetch_product_details['seller_id'].'" data-summary="summary 1" data-price="'.$prdprice.'" data-quantity="1" data-image="'.$path.$fetch_product_details['product_img'].'">Buy Now</button>';
								?>
                            </div>
                            <div class="col-md-9 row col-sm-6">
                                <div class="col-sm-3 mt-2">
                                    <div class="fb-share-button" data-href="http://daydone.com.ng/product?prod=<?= $fetch_product_details['product_id']; ?>" data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fdaydone.com.ng%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore"><i class="fa fa-facebook" aria-hidden="true"></i></a></div>
                                </div>
                                <div class="col-sm-3 mt-2">
                                    <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-text="Hi guys! I got my '<?= $fetch_product_details['product_name']; ?>' delivered to my doorstep immediately from daydone.com.ng, without even going to the market. Try one of their products today at http://daydone.com.ng/products.php" data-show-count="false"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br class="clr" />
                    <a href="#" name="detail"></a>
                    <hr class="soft" />
                </div>
            </div>

            <br>
            <ul id="productDetail" class="nav nav-tabs">
                <li class="active"><a href="#home" data-toggle="tab">Product Details</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="home">
                    <br><br>
                    <h3>Product Information</h3><br>
                    <table class="table table-bordered">
                        <tbody>
                            <tr class="techSpecRow">
                                <th colspan="2">Product Details</th>
                            </tr>
                            <tr class="techSpecRow">
                                <td class="techSpecTD1">Brand/Name: </td>
                                <td class="techSpecTD2"><?= $fetch_product_details['product_name']; ?></td>
                            </tr>
                            <tr class="techSpecRow">
                                <td class="techSpecTD1">Weight/Congos/Pieces:</td>
                                <td class="techSpecTD2"><?= $fetch_product_details['size']; ?></td>
                            </tr>
                            <tr class="techSpecRow">
                                <td class="techSpecTD1">Region/Farm:</td>
                                <td class="techSpecTD2"> <?= $fetch_product_details['region']; ?></td>
                            </tr>
                            <tr class="techSpecRow">
                                <td class="techSpecTD1">Type/Species</td>
                                <td class="techSpecTD2"> <?= $fetch_product_details['product_type']; ?></td>
                            </tr>
                            <tr class="techSpecRow">
                                <td class="techSpecTD1">Display size:</td>
                                <td class="techSpecTD2"><?= $fetch_product_details['size']; ?> </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
        <div class="card shadow col-6 well" style="text-align:left; padding:3%">
            <div class="card-body">
                <h3 class="card-title">Description</h3>
                <p class="card-text"><?= $fetch_product_details['product_desc']; ?></p>
            </div>
        </div>


        <div class="card shadow col-6 well" style="text-align:left; padding:30px">
            <div class="card-body">
                <div class="row" style="margin: 20px auto 30px auto;">
                    <?php
                    $links = explode(" ", $fetch_product_details['product_screenshots']);
                    foreach ($links as $link) {
                        if ($link) {
                    ?>
                            <div class="col-md-3"><img class="img-responsive w-50 h-50" src="<?= $fetch_product_details['seller_id'] == 0 ? 'dashboard/' : 'farmer/' ?><?= @$link; ?>"></div>
                        <?php
                        } else {
                        ?>
                            <h5>No Screenshots for this product..</h5>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>






    </div>
</div>

<div class="content-top offer-w3agile">
    <div class="container ">
        <div class="spec ">
            <h3>Review</h3>
            <div class="ser-t">
                <b></b>
                <span><i></i></span>
                <b class="line"></b>
            </div>
        </div>
        <div class="row" id="commentz">
            <?php
				$query_product_comments = mysqli_query($cxn, "SELECT * FROM comments WHERE product_id = '$product_id' and status = '1'");
				if (mysqli_num_rows($query_product_comments) > 0) {
					while ($fetch_product_comments = mysqli_fetch_assoc($query_product_comments)) {
				?>
				<div class="card shadow col-md-5 well" style="text-align:left; padding:20px; margin-right:30px; height:130px;">
					<div class="card-title" style="margin-bottom: 10px;">
						<h5 class="card-title"><b><?= $fetch_product_comments['comment_user']; ?></b></h5>
					</div>
					<div class="card-body">
						<p class="card-text"><?= $fetch_product_comments['comment']; ?></p>
					</div>
				</div>
				<?php
                }
            }
            ?>
        </div>
        <div class="row">
            <div class="col-md-7">
                <form id="reviewform" action="" method="post" onsubmit="return reviewme()">
                    <input type="hidden" name="comment_prod_id" id="cc"  value="<?php echo $product_id.'^'.$owner;?>">
                   <div class="row">
					 <div class="form-group col-md-6">
                        <input name="comment_user_name" id="user-comment-name" required class="form-control" type="text" placeholder="Your fullname">
                    </div>
					 <div class="form-group col-md-6">
                        <input name="reviewer_email" id="reviewer_email" required class="form-control" type="email" placeholder="Your valid email address">
                    </div>
					</div>
                    <div class="form-group">
                        <textarea class="form-control" name="user_comment" id="review" rows="8" required placeholder="Give your review for this product"></textarea>
                    </div>
					<div id="showstatus"></div>
                    <div class="col">
                        <button type="submit" name="submit_user_comment" class="btn btn-warning float-right">Submit Review</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!---->
<div class="content-top offer-w3agile">
    <div class="container ">
        <div class="spec ">
            <h3>Related Products</h3>
            <div class="ser-t">
                <b></b>
                <span><i></i></span>
                <b class="line"></b>
            </div>
        </div>
        <div class=" con-w3l wthree-of">
            <?php
            $product_catgry = $fetch_product_details['product_category'];
            $query_related_products = "SELECT * FROM products WHERE product_category ='$product_catgry' LIMIT 4";
            $result = mysqli_query($cxn, $query_related_products);
            $productcount = mysqli_num_rows($result);
            while ($fetch_product_detailsX = mysqli_fetch_assoc($result)) {
				$seller_id = $fetch_product_detailsX['seller_id'];
				$prodid = $fetch_product_detailsX['product_id'];
						if($seller_id == 0){$path = 'dashboard/';}else{$path = 'farmer/';}
					
						$stock = $fetch_product_detailsX['in_stock'];
						$qnty_sold = $fetch_product_detailsX['qnty_sold'];
						$tstock = $stock - $qnty_sold;

						if($tstock == 0){
							$leftstock = 'Out of stock';
							$disabled = 'disabled';
						}else{
							$disabled = '';
							$leftstock = 'In Stock: '.$tstock;
						}

						$discount = $fetch_product_detailsX['discount_price'];
						if($discount != ''){
							$prdprice = $fetch_product_detailsX['discount_price'];
						}else{
							$prdprice = $fetch_product_detailsX['price'];
						}
					
            ?>
                <div class="col-md-3 pro-1">
                    <div class="col-m">
                        <a href="product?prod=<?= $fetch_product_detailsX['product_id']; ?>" class="offer-img numOfClickLink" click="<?= $fetch_product_detailsX['product_id']; ?>" name="click">
                            <img src="<?= $fetch_product_detailsX['seller_id'] == 0 ? 'dashboard/' : 'farmer/' ?><?= $fetch_product_detailsX['product_img']; ?>" class="img-responsive" alt="agric produce online">
                        </a>
                        <div class="mid-1">
                            <div class="women">
                               <h6><a href="product?prod=<?= $fetch_product_detailsX['product_id']; ?>" class="numOfClickLink" click="<?= $fetch_product_detailsX['product_id']; ?>" name="click"><?= $fetch_product_detailsX['product_name']; ?>(<?= $fetch_product_detailsX['size']; ?>)</a></h6>
                            </div>
                            <div class="mid-2">
								<?php		
									if($discount != ''){
										echo '<p>
											<del><em class="item_price">&#8358;'.$fetch_product_detailsX['price'].'</em></del>&nbsp;
											<ins><em class="item_price">&#8358;'.$fetch_product_detailsX['discount_price'].'</em></ins>
										</p>';
									}else{
										echo '<p><em class="item_price">₦'.$fetch_product_detailsX['price'].'</em></p>';
									}
									?>		                                                                
                                <div class="block">
                                    <?php
                                    $prod_rating_val;
                                    $query_avg_per_product = mysqli_query($cxn, "SELECT avg_per_prodct FROM products WHERE product_id=" . $fetch_product_detailsX['product_id'] . "");
                                    if (mysqli_num_rows($query_avg_per_product) > 0) {
                                        $fetch_avg_per_product = mysqli_fetch_array($query_avg_per_product);
                                    }
                                    $prod_rating_val = $fetch_avg_per_product['avg_per_prodct'];
                                    ?>
									
                                    <input type="hidden" id="<?= $fetch_product_detailsX['product_id']; ?>" data-rateit-valuesrc="value" value="<?= $prod_rating_val ? $prod_rating_val : 0; ?>">

                                    <a href="javascript:void(0)" class="numOfRateClick" rateclick="<?= $fetch_product_detailsX['product_id']; ?>" name="ratin_click">
                                     <div data-rateit-backingfld="#<?= $fetch_product_detailsX['product_id']; ?>" data-productid="<?= $fetch_product_detailsX['product_id']; ?>" class="rateit small ghosting" data-rateit-mode="font"></div>
                                    </a>

                                    <form action="" method="post">
                                        <input type="hidden" name="rate_prodxt_id"><input type="hidden" name="rate_prodxt_value">
                                    </form>
                                    <span class="pull-right"><b><?= $prod_rating_val ? round($prod_rating_val, 1) : 0; ?> (<?= $fetch_product_detailsX['no_of_rating_clicks'] ? $fetch_product_detailsX['no_of_rating_clicks'] : 0; ?>)</b></span>
                                </div>
								<div class="block">
									<p><?php echo $leftstock;?></p>
								</div>
                                <div class="clearfix"></div>
								<?php
									//call rating function
									echo getrating($prodid); 
								?>
                            </div>
                            <div class="add">
								<?php										
									echo '<button class="btn my-cart-btn my-cart-b" '.$disabled.' data-id="'.$fetch_product_detailsX['product_id'].'" data-name="'.$fetch_product_detailsX['product_name'].'" data-sll="'.$fetch_product_detailsX['seller_id'].'" data-summary="summary 2" data-price="'.$prdprice.'" data-quantity="1" data-image="'.$path.$fetch_product_detailsX['product_img'].'">Add to Cart</button>';
								?>	
                               <!-- <button class="btn my-cart-btn my-cart-b" data-id="<?= $fetch_product_detailsX['product_id']; ?>" data-name="<?= $fetch_product_detailsX['product_name']; ?>" data-summary="summary 2" data-price="<?= $fetch_product_detailsX['price']; ?>" data-quantity="1" data-image="dashboard/<?= $fetch_product_detailsX['product_img']; ?>">Buy Now</button>-->
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
            <!-- <div class="clearfix"></div> -->
    </div>
</div>

<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Agric ecommerce",
        "name": "DAYDONE LLC",
        "image": "https://facebook.com/daydoneng/shop",
        "@id": "https://www.daydone.com.ng",
        "url": "https://www.daydone.com.ng",
        "telephone": "+2348174993336",
        "priceRange": "5,000 - 20,000",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "No 9, Agbowo Str, University of Ibadan",
            "addressLocality": "Ibadan",
            "postalCode": "200284",
            "addressCountry": "NG"
        },
        "geo": {
            "@type": "GeoCoordinates",
            "latitude": 7.442153999999999,
            "longitude": 3.910765399999999
        },
        "openingHoursSpecification": {
            "@type": "OpeningHoursSpecification",
            "dayOfWeek": [
                "Monday",
                "Tuesday",
                "Wednesday",
                "Thursday",
                "Friday",
                "Saturday",
                "Sunday"
            ],
            "opens": "00:00",
            "closes": "23:59"
        },
        "sameAs": [
            "https://www.facebook.com/daydoneng",
            "https://www.instagram.com/daydoneng",
            "https://www.youtube.com/channel/UCfJEvqg-8fPCY-RupTo8NOA/",
            "https://www.linkedin.com/company/daydone",
            "https://www.daydone.com.ng"
        ]
    }
</script>
<?php
                echo "</ul>";
                ?>
            </nav>
        </div>
    </div>
</div>
</div>
<?php
	include "inc/footer.php";
?>
<script>	
	function reviewme(){
            var review = document.getElementById('review').value;
            var cc = document.getElementById('cc').value;
            var user = document.getElementById('user-comment-name').value;
            var reviewer_email = document.getElementById('reviewer_email').value;
            
            if(cc == '' || review == '' || user == '' || reviewer_email == ''){
                document.getElementById('showstatus').innerHTML = '<span class="text-danger">All fields must be specified</span>';
            }else{
                $.ajax({
                   type: 'post',
                    url: 'ajreviewproduct',
                    data: {
                        ccode: cc, review: review, user: user, email: reviewer_email
                    },
                    cache:false,
                    beforeSend:function(){
                        document.getElementById('showstatus').innerHTML = '<span class="text-info"><i class="fa fa-spinner fa-spin"></i> Processing</span>';
                    },
                success: function(response) {
					if(response =='submitted'){
					   document.getElementById("showstatus").innerHTML= '<div class="alert alert-success bg-success text-white"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Success! Product Review Submitted.</div>';					
                        let inputs = document.querySelectorAll("#reviewform textarea, #reviewform input");
                         inputs.forEach((input)=>{ 
                              input.value = "";
                          });                      
                        setTimeout(function(){
                            document.getElementById("showStatus").innerHTML = "";
                        },5000);
					}else{
						document.getElementById("showstatus").innerHTML= '<div class="text-danger text-white">'+response+'</div>';
					}
                //document.getElementById('showStatus').innerHTML = response;                
                    }                                    
                });
            }
            return false;
        }
	$(document).ready(function() {
		document.getElementById('showrating').innerHTML = '<?php echo $rating;?>';
			$('input[type=radio]').click(function() {
				if (this.name == "starrating"){
					showrate(this.value)
					//console.log(this.value);
				}else{
					//console.log('error')
				}                        
			});
		});

	function showrate(str){
		document.getElementById('showrating').innerHTML = str+'.0';
		var code =  document.getElementById('productid').value;
		var seller = document.getElementById('seller').value;        

	if(code == '' || seller == ''){
			//		
		}else{
			$.ajax({
				url: 'ajxrating',
				method: 'post',
				data:{
					rating:str, seller:seller, ccode:code
				},
				success:function(response){   
					//console.log(response)
				}
			});
			return false;
		}
	}
	
    $(".numOfRateClick").click(function(e) {
        e.preventDefault();
        let oneRate = $(this).attr("rateclick");
        $.ajax({
            type: "POST",
            url: "script.php",
            data: {
                ratin_click: oneRate
            },
            cache: false,
            success: function(res) {
                //alert(res);

            }
        });
    });
    $('.rateit').bind('rated reset', function(e) {
        var ri = $(this);

        //if the use pressed reset, it will get value: 0 (to be compatible with the HTML range control), we could check if e.type == 'reset', and then set the value to  null .
        var value = ri.rateit('value');
        var productID = ri.data('productid'); // if the product id was in some hidden field: ri.closest('li').find('input[name="productid"]').val()

        //maybe we want to disable voting?
        //  ri.rateit('readonly', true);
        //  console.log(value);
        //  console.log(productID);

        ri.parent('.block').find('input[name="rate_prodxt_id"]').val(productID);
        ri.parent('.block').find('input[name="rate_prodxt_value"]').val(value);

        $.ajax({
            url: 'script.php', //your server side script
            data: {
                rate_prodxt_id: productID,
                rate_prodxt_value: value
            }, //our data
            type: 'POST',
            success: function(data) {
                //  alert(data);

            },
            error: function(jxhr, msg, err) {
                //  alert(msg);
            }
        });

    });
</script>