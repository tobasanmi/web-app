<?php
$page_title = "Farm Produces";
include "inc/header.php";
include "config/functions.php";
?>

<!--banner-->
<div class="banner-top">
    <div class="container">
        <h3>All Products</h3>
        <h4><a href="./">Home</a><label>/</label>Products</h4>
        <div class="clearfix"> </div>
    </div>
    <div class="cart"><span class="fa fa-shopping-cart my-cart-icon"><span class="badge badge-notify my-cart-badge"></span></span></div>
</div>
<div class="product">
    <div class="container">
        <div class="text-center spec">
            <h2>Products</h2>
        </div>
        <div class="container">
            <!-- search form -->
            <div class="mx-auto pro-1">
                <form class="search-for" action="" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control search-prod-bar" name="search_product" placeholder="Search Product...">
                    </div>
                </form>
            </div>
        </div>
        <div class=" con-w3l">
            <?php
				$limit = 12;
				if (isset($_GET["page"])) {
					$page = $_GET["page"];
				} else {
					$page = 1;
				};
				$record_index = ($page - 1) * $limit;
				$query_products = "SELECT * FROM products ORDER BY product_id DESC LIMIT $record_index, $limit";
				$result_query_products = mysqli_query($cxn, $query_products);
				$count_products = mysqli_num_rows($result_query_products);
				if ($count_products > 0) {
					while ($fetch_products = mysqli_fetch_assoc($result_query_products)) {
								$discount = $fetch_products['discount_price'];
								$product_id = $fetch_products['product_id'];
								$seller_id = $fetch_products['seller_id'];
								if($seller_id == 0){$path = 'dashboard/';}else{$path = 'farmer/';}
								
								$stock = $fetch_products['in_stock'];
								$qnty_sold = $fetch_products['qnty_sold'];
								$tstock = $stock;
								
								if($tstock == 0){
									$leftstock = 'Out of stock';
									$disabled = 'disabled';
								}else{
									$disabled = '';
									$leftstock = 'In Stock: '.$tstock;
								}
								
								$discount = $fetch_products['discount_price'];
								if($discount != ''){
									$prdprice = $fetch_products['discount_price'];
								}else{
									$prdprice = $fetch_products['price'];
								}								
							
            ?>
                    <div class=" col-md-3 pro-1 all-products">
                        <div class="col-m">
                            <a href="product?prod=<?= $fetch_products['product_id']; ?>" class="offer-img numOfClickLink" click="<?= $fetch_products['product_id']; ?>" name="click">
                                <img src="<?= $fetch_products['seller_id'] == 0 ? 'dashboard/' : 'farmer/'?><?= $fetch_products['product_img']; ?>" class="img-responsive w-50 h-50" alt="agric produce online">
                            </a>
                            <div class="mid-1">
                                <div class="women">
                                    <h6><a href="product?prod=<?= $fetch_products['product_id']; ?>" class="numOfClickLink" click="<?= $fetch_products['product_id']; ?>" name="click"><?= $fetch_products['product_name'] . ""; ?></a></h6>
                                </div> 
                                <div class="mid-2">
                                   <?php		
										if($discount != ''){
											echo '<p>
												<del><em class="item_price">&#8358;'.$fetch_products['price'].'</em></del>&nbsp;
												<ins><em class="item_price">&#8358;'.$fetch_products['discount_price'].'</em></ins>
											</p>';
										}else{
											echo '<p><em class="item_price">₦'.$fetch_products['price'].'</em></p>';
										}
									?>
                                    <div class="block">
										<?php
										$prod_rating_val;
										$query_avg_per_product = mysqli_query($cxn,"SELECT avg_per_prodct FROM products WHERE product_id=".$fetch_products['product_id']."");
										if (mysqli_num_rows($query_avg_per_product) > 0) {
										$fetch_avg_per_product = mysqli_fetch_array($query_avg_per_product);
										}
										$prod_rating_val = $fetch_avg_per_product['avg_per_prodct'];
										?>
										<input type="hidden" id="<?= $fetch_products['product_id']; ?>"  data-rateit-valuesrc="value" value="<?= $prod_rating_val ? $prod_rating_val:0; ?>">

										<a href="javascript:void(0)" class="numOfRateClick" rateclick="<?= $fetch_products['product_id']; ?>" name="ratin_click">

										<div data-rateit-backingfld="#<?= $fetch_products['product_id']; ?>" data-productid="<?= $fetch_products['product_id']; ?>" class="rateit small ghosting" data-rateit-mode="font"></div>

										</a>

										<form action="" method="post">
											<input type="hidden" name="rate_prodxt_id"><input type="hidden" name="rate_prodxt_value">
										</form>
										
									</div>
								   <div class="block">
										<p><?php echo $leftstock;?></p>
									</div>
                                    <div class="clearfix"></div>
									<?php
										//call rating function
										//echo '<div>'.getrating($product_id).'</div>';
										echo '<div class="soldby">Sold by: <a href="mall?farm='.$seller_id.'">'.getseller($seller_id).'</a></div>'; 
									?>
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
        </div>


        <div class="col-sm-12 text-center">
            <nav aria-label="Page navigation">
                <?php
                $sql = "SELECT COUNT(*) FROM products";
                $retval1 = mysqli_query($cxn, $sql);
                $row = mysqli_fetch_row($retval1);
                $total_records = $row[0];
                //  echo $total_records;
                $total_pages = ceil($total_records / $limit);
                echo "<ul class='pagination'>";
                ?>
                <li class="<?php if ($page <= 1) {
                                echo 'disabled';
                            } ?> page-item" aria-current="page">
                    <a class="page-link" href="<?php if ($page <= 1) {
                                                    echo '#';
                                                } else {
                                                    echo "?page=" . ($page - 1);
                                                } ?>">Prev <span class="sr-only">(current)</span></a>
                </li>
                <?php // echo the numbers for each page
                for ($i = 1; $i <= $total_pages; $i++) : ?>
                    <li class="page-item <?php if ($page == $i) {
                                                echo "active";
                                            } ?>">
                        <a class="page-link" href="products?page=<?= $i; ?>" tabindex="-1" aria-disabled="true"><?= $i; ?></a>
                    </li>
                <?php endfor; ?>
                <li class="page-item <?php if ($page >= $total_pages) {
                                            echo 'disabled';
                                        } ?>">
                    <a class="page-link" href="<?php if ($page >= $total_pages) {
                                                    echo '#';
                                                } else {
                                                    echo "?page=" . ($page + 1);
                                                } ?>">Next</a>
                </li>
                <script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "Product",
  "name": "Palm Oil",
  "image": "https://daydone.com.ng/dashboard/assets/images/25_litre_jerry_can-small_cap.png",
  "description": "A Keg of fresh Palm Oil from Akwa Ibom.
Editorial Reviews Farmers/Suppliers
Full, Fresh and neat Palm Oil 25 Litres

Health Benefit /Nutritional Value
•	It is unadulterated and free from harmful additives rampant.
•       This Palm Oil is free from coloring's and  enhancers that have adverse effect on your health
•       It is has no bad taste or smell when cooked.",
  "brand": "Ondo Fresh Oil",
  "sku": "PP-OO-25-PO",
  "mpn": "PP-OO-25-PO",
  "gtin": "PP-OO-25-PO",
  "isbn": "PP-OO-25-PO",
  "offers": {
    "@type": "Offer",
    "url": "https://daydone.com.ng/product?prod=94",
    "priceCurrency": "NGN",
    "price": "10000",
    "priceValidUntil": "2021-08-20",
    "availability": "https://schema.org/InStock",
    "itemCondition": "https://schema.org/NewCondition"
  },
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "5",
    "ratingCount": "2",
    "reviewCount": "2"
  },
  "review": [{
    "@type": "Review",
    "name": "Food Seller",
    "reviewBody": "This palm oil is worth trying out, it is free from foam with no smell and better than the once. I buy in open market",
    "reviewRating": {
      "@type": "Rating",
      "ratingValue": "5"
    },
    "datePublished": "2020-07-12",
    "author": {"@type": "Person", "name": "Food Seller"},
    "publisher": {"@type": "Organization", "name": "DayDone Ltd"}
  },{
    "@type": "Review",
    "name": "DayDone Product Test",
    "reviewBody": "This product pass our quality control and with and effective analysis. Gives the farm a pass, tested and trusted.",
    "reviewRating": {
      "@type": "Rating",
      "ratingValue": "5"
    },
    "datePublished": "2020-06-10",
    "author": {"@type": "Person", "name": "Testing Unit"},
    "publisher": {"@type": "Organization", "name": "DayDone Ltd"}
  }]
}
</script>
<script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "Product",
  "name": "Yam",
  "image": "https://daydone.com.ng/dashboard/assets/images/Yam%20medium%202.jpg",
  "description": "60 pieces of Medium size Yam
Editorial Reviews Farmers/Suppliers
Our Yam is clean and fresh yams from the farm
Health Benefit/Nutritional value
The yam is rich in vitamins, minerals, and fiber.
Packed with nutrition;
• Calories: 158.
• Carbs: 37 grams.
• Protein: 2 grams.
• Fat: 0 grams.
• Fiber: 5 grams.
• Vitamin C: 18% of the Daily Value (DV)
• Vitamin B5: 9% of the DV
• Manganese: 22% of the DV.
• Manganese: 22% of the DV.",
  "brand": "60 pieces of medium, Fresh Abuja Yam",
  "sku": "PP-RT-60-YM",
  "mpn": "PP-RT-60-YM",
  "gtin": "PP-RT-60-YM",
  "isbn": "PP-RT-60-YM",
  "offers": {
    "@type": "Offer",
    "url": "https://daydone.com.ng/product?prod=74",
    "priceCurrency": "NGN",
    "price": "25000",
    "priceValidUntil": "2021-08-20",
    "availability": "https://schema.org/InStock",
    "itemCondition": "https://schema.org/NewCondition"
  },
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "5",
    "ratingCount": "2",
    "reviewCount": "2"
  },
  "review": [{
    "@type": "Review",
    "name": "Food Seller",
    "reviewBody": "This Yam are fresh good when cooked and even when pounded, It is not rotten and you can use it for any of your use.",
    "reviewRating": {
      "@type": "Rating",
      "ratingValue": "5"
    },
    "datePublished": "2020-07-12",
    "author": {"@type": "Person", "name": "Food Seller"},
    "publisher": {"@type": "Organization", "name": "DayDone Ltd"}
  },{
    "@type": "Review",
    "name": "DayDone Product Test",
    "reviewBody": "This product pass our quality control and with an effective analysis. We gives the farm a pass, the yam tested and trusted.",
    "reviewRating": {
      "@type": "Rating",
      "ratingValue": "5"
    },
    "datePublished": "2020-06-10",
    "author": {"@type": "Person", "name": "Testing Unit"},
    "publisher": {"@type": "Organization", "name": "DayDone Ltd"}
  }]
}
</script>
<script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "Product",
  "name": "Live Chicken",
  "image": "https://daydone.com.ng/dashboard/assets/images/images(27).jpg",
  "description": "Our birds are healthy, well feed and raise in a good environment.

- they weigh 2kg in weight, and available for nationwide distribution and very limited stock available.",
  "brand": "3 Pieces of Chicken",
  "sku": "AP-MT-03-CH",
  "mpn": "AP-MT-03-CH",
  "gtin": "AP-MT-03-CH",
  "isbn": "AP-MT-03-CH",
  "offers": {
    "@type": "Offer",
    "url": "https://daydone.com.ng/product?prod=91",
    "priceCurrency": "NGN",
    "price": "5000",
    "priceValidUntil": "2021-02-02",
    "availability": "https://schema.org/InStock",
    "itemCondition": "https://schema.org/NewCondition"
  },
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "5",
    "ratingCount": "2",
    "reviewCount": "2"
  },
  "review": [{
    "@type": "Review",
    "name": "Food Seller",
    "reviewBody": "This is the cheapest chicken have have ever comeby, the live broilers has low fat content and are tasty and nutritous",
    "reviewRating": {
      "@type": "Rating",
      "ratingValue": "5"
    },
    "datePublished": "2020-07-12",
    "author": {"@type": "Person", "name": "Food Seller"},
    "publisher": {"@type": "Organization", "name": "DayDone Ltd"}
  },{
    "@type": "Review",
    "name": "DayDone Product Test",
    "reviewBody": "This product pass our quality control and with an effective analysis we give a pass on the live broilers, the quality has been tested and proved.",
    "reviewRating": {
      "@type": "Rating",
      "ratingValue": "5"
    },
    "datePublished": "2020-06-10",
    "author": {"@type": "Person", "name": "Testing Unit"},
    "publisher": {"@type": "Organization", "name": "DayDone Ltd"}
  }]
}
</script>
<script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "Product",
  "name": "Beans Oloyin",
  "image": "https://daydone.com.ng/dashboard/assets/images/Bean%20Oloyin.jpg",
  "description": "Beans Oloyin is a super healthy beans, with 40 plus congos
Editorial Reviews Farmers/Suppliers
Fresh, clean and well packaged beans
Health Benefit/Nutritional Value
- It contains high anti oxidants, fiber, protein, vitamins B, iron magnesium, potassium, copper and zinc.
- Eating beans regularly may decrease the risk of diabetes, colorectal diseases and helps with heath management.
- It is a good source of fibre and roughages",
  "brand": "A bag of Beans",
  "sku": "PP-PU-41-BN",
   "mpn": "PP-PU-41-BN",
  "gtin": "PP-PU-41-BN",
  "isbn": "PP-PU-41-BN",
  "offers": {
    "@type": "Offer",
    "url": "https://daydone.com.ng/product?prod=84",
    "priceCurrency": "NGN",
    "price": "17000",
    "priceValidUntil": "2021-02-02",
    "availability": "https://schema.org/InStock",
    "itemCondition": "https://schema.org/NewCondition"
   },
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "5",
    "ratingCount": "2",
    "reviewCount": "2"
  },
  "review": [{
    "@type": "Review",
    "name": "Food Seller",
    "reviewBody": "This beans is fine and not mixed plus it is easy to cook. It contain little shaft and very few stone but generally it is neat",
    "reviewRating": {
      "@type": "Rating",
      "ratingValue": "5"
    },
    "datePublished": "2020-07-12",
    "author": {"@type": "Person", "name": "Food Seller"},
    "publisher": {"@type": "Organization", "name": "DayDone Ltd"}
  },{
    "@type": "Review",
    "name": "DayDone Product Test",
    "reviewBody": "This beans pass our quality control and with an effective analysis and test we give it a pass",
    "reviewRating": {
      "@type": "Rating",
      "ratingValue": "5"
    },
    "datePublished": "2020-06-10",
    "author": {"@type": "Person", "name": "Testing Unit"},
    "publisher": {"@type": "Organization", "name": "DayDone Ltd"}
  }]
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