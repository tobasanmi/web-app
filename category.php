<?php
$page_title = "Product's Category";
include "inc/header.php";
if (isset($_GET['prodcat'])) {
    $product_category = $_GET['prodcat'];
}
?>

<!--banner-->
<div class="banner-top">
    <div class="container">
        <h3><?php echo isset($product_category) ? ucfirst($product_category) : "Product Category"; ?></h3></h3>
        <h4><a href="./">Home</a><label>/</label><?php echo isset($product_category) ? $product_category : "Product Category"; ?></h4>
        <div class="clearfix"> </div>
    </div>
</div>
<div class="product">
    <div class="container">
        <div class="text-center spec">
            <h3><?php echo isset($product_category) ? ucfirst($product_category) . " Products" : "Product Category"; ?></h3>
        </div>
        <div class=" con-w3l">
            <?php
            $query_product_category = "SELECT * FROM products WHERE product_category='$product_category' ORDER BY product_id DESC";
            $result_query_product_category = mysqli_query($cxn, $query_product_category);
            $count_product_category = mysqli_num_rows($result_query_product_category);
            if ($count_product_category > 0) {
                while ($fetch_product_category = mysqli_fetch_assoc($result_query_product_category)) {
							$discount = $fetch_product_category['discount_price'];
							
							$seller_id = $fetch_product_category['seller_id'];
							if($seller_id == 0){$path = 'dashboard/';}else{$path = 'farmer/';}
					
								if(isset($discount)){
									$prdprice = $fetch_product_category['discount_price'];
								}else{
									$prdprice = $fetch_product_category['price'];
								}
            ?>
                    <div class="col-md-3 pro-1">
                        <div class="col-m">
                            <a href="product?prod=<?=$fetch_product_category['product_id']; ?>" class="offer-img numOfClickLink" click="<?= $fetch_product_category['product_id']; ?>" name="click">
                                <img src="<?= $fetch_product_category['seller_id'] == 0 ? 'dashboard/' : 'farmer/' ?><?= $fetch_product_category['product_img']; ?>" class="img-responsive" alt="agric produce online">
                            </a>
                            <div class="mid-1">
                                <div class="women">
                                    <h6><a href="product?prod=<?= $fetch_product_category['product_id']; ?>" class="numOfClickLink" click="<?= $fetch_product_category['product_id']; ?>" name="click"><?= $fetch_product_category['product_name'] . " (" . $fetch_product_category['size'] . ")"; ?></a></h6>
                                </div>
                                    
                                    <div class="mid-2"> 
                                       <?php		
											if($discount != ''){
												echo '<p>
													<del><em class="item_price">&#8358;'.$fetch_product_category['price'].'</em></del>&nbsp;
													<ins><em class="item_price">&#8358;'.$fetch_product_category['discount_price'].'</em></ins>
												</p>';
											}else{
												echo '<p><em class="item_price">₦'.$fetch_product_category['price'].'</em></p>';
											}
										?>
                                        </div>
                                    <div class="block">
                                        <div class="block">
										<p><?php echo $leftstock;?></p>
									</div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="add add-2">
									<?php										
										echo '<button class="btn my-cart-btn my-cart-b" '.$disabled.' data-id="'.$fetch_products['product_id'].'" data-name="'.$fetch_products['product_name'].'" data-sll="'.$fetch_products['seller_id'].'" data-summary="summary 2" data-price="'.$prdprice.'" data-quantity="1" data-image="'.$path.$fetch_products['product_img'].'">Buy Now</button>';
									?>		                                   
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
            <div id="search-result"></div>
            <div class="clearfix"></div>
        </div><br>
			<div class="row text-center">
				<a href="products" class="btn btn-warning p-3">All Products</a>
			</div>
		</div>
	</div>
</div>
<script type="application/ld+json">
{
  "@context": "https://schema.org/", 
  "@type": "HowTo", 
  "name": "Order for Agric produces",
  "description": "Agricultural produce which is also called food item, foodstuff is used for making meals, and are source from the farm

DayDone is a platform where you can order for this product fresh and directly from the farm and still have them delivered to you.

Thereby making the Agric market better, easier, cheaper and more organized. this is a farm to door experience",
  "image": "https://www.daydone.com.ng/assets/images/logo/daydone-logo.png",
  "totalTime": "PT5M",
  "estimatedCost": {
    "@type": "MonetaryAmount",
    "currency": "NGN",
    "value": "2"
  },
  "supply": {
    "@type": "HowToSupply",
    "name": "Farmer"
  },
  "tool": {
    "@type": "HowToTool",
    "name": "DayDone"
  },
  "step": [{
    "@type": "HowToStep",
    "text": "Type the url daydone.com.ng/products",
    "image": "https://www.daydone.com.ng/assets/images/logo/daydone-logo.png",
    "name": "Product page",
    "url": "https://www.daydone.com.ng/products"
  },{
    "@type": "HowToStep",
    "text": "Click the product you need, and add to cart",
    "image": "https://www.daydone.com.ng/assets/images/logo/daydone-logo.png",
    "name": "Product Cart addition",
    "url": "https://www.daydone.com.ng/products"
  },{
    "@type": "HowToStep",
    "text": "It you could not find the product you need, go and suggest the product and region or email us at info@daydone.com.ng",
    "image": "https://www.daydone.com.ng/assets/images/logo/daydone-logo.png",
    "name": "Product Suggestion",
    "url": "https://www.daydone.com.ng/wishlist"
  },{
    "@type": "HowToStep",
    "text": "Check out",
    "image": "https://www.daydone.com.ng/assets/images/logo/daydone-logo.png",
    "name": "Check out",
    "url": "https://www.daydone.com.ng/checkout"
  }]    
}
</script>
<?php
include "inc/footer.php";
?>
<script>
  $(".numOfRateClick").click(function(e){
        e.preventDefault();
        let oneRate = $(this).attr("rateclick");
        $.ajax({type:"POST",url:"script.php",data:{ratin_click:oneRate},cache:false,success:function(res){
            //alert(res);
            
        }});
    });
    $('.rateit').bind('rated reset', function (e) {
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
             data: {rate_prodxt_id:productID,rate_prodxt_value: value }, //our data
             type: 'POST',
             success: function (data) {
                //  alert(data);
 
             },
             error: function (jxhr, msg, err) {
                //  alert(msg);
             }
         });
         
     });
</script>