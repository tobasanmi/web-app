<?php
	$page_title = "shop";
	include "inc/header.php";

	if (isset($_GET['farm'])){
		$farmid = mysqli_real_escape_string($conn, $_GET['farm']);
		//check if farm exist
		$check = mysqli_query($conn, "select farmer_id, farmer_first_name, farmer_last_name from farmers where farmer_id = '$farmid' and activation = 1");
			if(mysqli_num_rows($check) > 0){
				$ff = mysqli_fetch_assoc($check);
				$farmerid = $ff['farmer_id'];
				$last_name = $ff['farmer_last_name'];
				$first_name = $ff['farmer_first_name'];
				$name = $last_name.' '.$first_name;
			}else{
				header("location: index");
			}
	}else{
		header("location: index");
	}
?>

<!--banner-->
<div class="banner-top">
    <div class="container">
        <h2><?php echo ucwords($name);?></h2>
        <!--<h4><a href="./">Home</a><label>/</label><?php echo isset($product_category) ? $product_category : "Product Category"; ?></h4>-->
        <div class="clearfix"> </div>
    </div>
</div>
<div class="product">
    <div class="container">
        <div class="text-center spec">
            <h3><?php echo ucwords($name);?> Farm</h3>
        </div>
        <div class=" con-w3l">
            <?php
            $getproduct = mysqli_query($cxn, "SELECT * FROM products WHERE seller_id='$farmerid' ORDER BY product_id DESC");
            $count_product_category = mysqli_num_rows($getproduct);
            if (mysqli_num_rows($getproduct) > 0){
                while ($rr = mysqli_fetch_assoc($getproduct)) {
					$discount = $rr['discount_price'];

					$seller_id = $rr['seller_id'];
					if($seller_id == 0){$path = 'dashboard/';}else{$path = 'farmer/';}

						if($discount != ''){
							$prdprice = $rr['discount_price'];
						}else{
							$prdprice = $rr['price'];
						}
            ?>
                    <div class="col-md-3 pro-1">
                        <div class="col-m">
                            <a href="product?prod=<?=$rr['product_id']; ?>" class="offer-img numOfClickLink" click="<?= $rr['product_id']; ?>" name="click">
                                <img src="<?= $rr['seller_id'] == 0 ? 'dashboard/' : 'farmer/' ?><?= $rr['product_img']; ?>" class="img-responsive" alt="agric produce online">
                            </a>
                            <div class="mid-1">
                                <div class="women">
                                    <h6><a href="product?prod=<?= $rr['product_id']; ?>" class="numOfClickLink" click="<?= $rr['product_id']; ?>" name="click"><?= $rr['product_name'] . " (" . $rr['size'] . ")"; ?></a></h6>
                                </div>
                                <div class="mid-2">
                                    <?php
									if($discount != ''){
										echo '<p>
											<del><em class="item_price">&#8358;'.number_format($rr['price'], 2).'</em></del>&nbsp;
											<ins><em class="item_price">&#8358;'.number_format($rr['discount_price'], 2).'</em></ins>
										</p>';
									}else{
										echo '<p><em class="item_price">&#8358;'.number_format($rr['price'], 2).'</em></p>'; 
									}
									?>
                                    
                                    <div class="clearfix"></div>
                                </div>
                                <div class="add add-2">
                                    <button class="btn my-cart-btn my-cart-b" data-id="<?= $rr['product_id']; ?>" data-name="<?= $rr['product_name']; ?>" data-sll="<?= $rr['seller_id']; ?>" data-summary="summary 2" data-price="<?php echo $prdprice;?>" data-quantity="1" data-image="<?php echo $path; ?><?= $rr['product_img']; ?>">Buy Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
           <?php
				}
			}
			?>
			<!--<div class="clearfix"></div>
			<br><br>
			<div class="row text-center">
				<a href="products" class="btn btn-warning p-3">All Products</a>
			</div>-->
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