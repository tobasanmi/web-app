<?php
include "inc/headerl.php";

if (isset($_GET['prod'])) {
    $product_id = $_GET['prod'];
    $query_product_details = "SELECT * FROM products WHERE product_id='$product_id'";
    $result_query_product_details = mysqli_query($cxn, $query_product_details);
    $fetch_product_details = mysqli_fetch_assoc($result_query_product_details);
} else {
    header("Location: ./");
}
?>
<!-- Carousel
    ================================================== -->
<div class="item">
            <img src="assets/images/slide/garri.png" alt="Garri Supply" usemap="#orderOne">
        </div>

</div><!-- /.carousel -->
<!--banner-->
<div class="banner-top">
    <div class="container">
        <h3>Top Notch Garri</h3>
        <h4><a href="garri?prod=111">Home</a><label>/</label>Garri Supply</h4>
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
                            <a class="btn btn-small pull-right" href="#detail">More Details</a>
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
				<div class="card shadow col-md-5 well" style="text-align:left; padding:20px; margin-right:30px;">
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
<!--footer-->
<div class="footer">
        <div class="container">
            <div class="col-md-4 footer-grid">
                <h3>About Us</h3>
                <p>We are committed to making a difference with customer satifaction, quality products and early delivery.</p>
            </div>
            <div class="col-md-4 footer-grid ">
                <h3>Menu</h3>
                <ul>
                    <li><a href="./">Home</a></li>
                    <li><a href="products">All Products</a></li>
                </ul>
            </div>
            <div class="col-md-4 footer-grid ">
                <h3>Customer Services</h3>
                <ul>
                    <li><a href="terms#return_refund">Return & Refund Policy</a></li>
                    <li><a href="shipping">Shipping Policy</a></li>
                </ul>
            </div>
                <div class=" address">
                    <div class="col-md-4 fo-grid1">
                        <p><i class="fa fa-home" aria-hidden="true"></i>9 Agbowo Street, UI, Ibadan, Nigeria.</p>
                    </div>

                    <div class="col-md-4 fo-grid1">
                        <p><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:+2348174993335">+234 817 499 3335</a> , <a href="tel:08174993336">+234 817 499 3336</a></p>
                    </div>
                    <div class="col-md-4 fo-grid1">
                        <p><a href="mailto:info@daydone.com.ng"><i class="fa fa-envelope-o" aria-hidden="true"></i>info@daydone.com.ng</a></p>
                    </div>

                </div>
            <div class="copy-right">
                <p> &copy; <script>
                        document.write(new Date().getFullYear());

                    </script> DayDone LLC. All Rights Reserved</p>
            </div>
            </div>
        </div>
    <!-- //footer-->

<!-- floating cart button -->
<div class="cart" style="position: fixed; right: 5px; bottom: 65px; z-index: 995; background-color: #039445; width:65px; height:65px; border-radius: 50%; padding:5px">
        <i class="fa fa-shopping-cart fa-2x my-cart-icon" style="margin: 10px auto auto 9px; position:relative"><span class="badge badge-notify my-cart-badge font-bold"></span></i>
</div>
<!-- floating cart button -->

<!-- smooth scrolling -->
<script type="text/javascript">
        $(document).ready(function() {
                /*
                	var defaults = {
                	containerID: 'toTop', // fading element id
                	containerHoverID: 'toTopHover', // fading element hover id
                	scrollSpeed: 1200,
                	easingType: 'linear'
                	};
                */
                $().UItoTop({
                        easingType: 'easeOutQuart'
                });
        });
</script>
<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //smooth scrolling -->
<!-- for bootstrap working -->
<script src="assets/js/bootstrap.js"></script>
<script type="text/javascript" src="assets/js/intro.min.js"></script>
<!-- //for bootstrap working -->
<script type='text/javascript' src="assets/js/jquery.mycart.js"></script>
<script src="assets/js/easyResponsiveTabs.js" type="text/javascript"></script>
<script src="assets/rateit/jquery.rateit.min.js"></script>
<script src="assets/js/main.js"></script>
<script type="text/javascript">
        $(function() {

                var goToCartIcon = function($addTocartBtn) {
                        var $cartIcon = $(".my-cart-icon");
                        var $image = $('<img width="30px" height="30px" src="' + $addTocartBtn.data("image") + '"/>').css({
                                "position": "fixed",
                                "z-index": "999"
                        });
                        $addTocartBtn.prepend($image);
                        var position = $cartIcon.position();
                        $image.animate({
                                top: position.top,
                                left: position.left
                        }, 500, "linear", function() {
                                $image.remove();
                        });
                }

                $('.my-cart-btn').myCart({
                        classCartIcon: 'my-cart-icon',
                        classCartBadge: 'my-cart-badge',
                        affixCartIcon: true,
                        checkoutCart: function(products) {
                                $.each(products, function() {
                                        console.log(this);
                                });
                        },
                        clickOnAddToCart: function($addTocart) {
                                goToCartIcon($addTocart);
                        },
                        getDiscountPrice: function(products) {
                                var total = 0;
                                $.each(products, function() {
                                        total += this.quantity * this.price;
                                });
                                return total * 1;
                        }
                });

$('.my-cart-b').click(function() {
                        $(this).text("Added to Cart").prop("disabled", true);
                })

                var data = localStorage.getItem("total");
                if (data == 0) {
                        $('.checkoutBtn').prop('disabled', true);
                }
                var order_x = localStorage.getItem("products");
                document.getElementById("totalamount").innerHTML = data;
                document.getElementById("form_amount").innerHTML = '<br><input type="text" name="amount" value="' + data + '" style="display:none">';
                document.getElementById("form_order").innerHTML = "<br><input type='text' name='order' value='" + order_x + "' style='display:none'>";

                function pod() {
                        document.getElementById("payOD").innerHTML = ' <p style="text-align: justify;">Pay at the collection of your produce <br/>             Note;<br>             1. Produces can be inspected but must not be altered.<br>             2. Only DayDone packaging material can be unsealed.<br>             3. Once altered or cut, the item can only be returned if it is damaged, defective or has missing parts.<br>             4. Please have the exact amount for your order, as our Delivery Agents do not handle petty cash.<br>';
                }

                function podclear() {
                        document.getElementById("payOD").innerHTML = '';
                }


        });

        function logmail() {
                var user_mail = document.getElementById("mail").value;
                // alert(user_mail);
                localStorage.setItem("user_mail", user_mail);
        }
</script>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Corporation",
    "name": "DayDone",
    "alternateName": "Agric ecommerce",
    "url": "https://www.daydone.com.ng",
    "logo": "https://daydone.com.ng/assets/images/logo/daydone-logo.png",
    "sameAs": [
        "https://www.facebook.com/daydoneng",
        "https://www.instagram.com/daydoneng",
        "https://www.youtube.com/channel/UCfJEvqg-8fPCY-RupTo8NOA/",
        "https://www.linkedin.com/company/daydone",
        "https://www.daydone.com.ng"
    ]
}
</script>
</body>

</html>