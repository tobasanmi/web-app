<?php
$page_title = "Home";
include "inc/header.php";
include "config/functions.php";
?>
<!-- Carousel
    ================================================== -->
<div id="myCarousel" class="carousel slide py-5 mb-5 mx-auto" data-ride="carousel">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li>
		<li data-target="#myCarousel" data-slide-to="2"></li>
		<li data-target="#myCarousel" data-slide-to="3"></li>
	</ol>
	<div class="carousel-inner" role="listbox">
		<div class="item active">
			<img class="first-slide" src="assets/images/slide/Agro-sales-1.png" alt="Agric Delivery" usemap="#orderOne">
			<map name="orderOne">
			    <area shape="rect" coords="211, 79, 346, 102" href="products" alt="Same-day foodstuff delivery">
				<area shape="rect" coords="780, 293, 1281, 377" href="products" alt="Price of beans">
			</map>	
		</div>
		<div class="item">
			<img class="second-slide" src="assets/images/slide/Agro-sales-2.png" alt="How to order DayDone" usemap="#orderTwo">
			<map name="orderTwo">
				<area shape="rect" coords="210, 74, 333, 92" href="login" alt="online agric purchase">
				<area shape="rect" coords="790, 279, 1249, 346" href="login" alt="agric sales online">
			</map>
		</div>
		<div class="item">
			<img class="third-slide" src="assets/images/slide/farmer.png" alt="Farm Near Me" usemap="#orderThree">
			<map name="orderThree">
				<area shape="rect" coords="200, 75, 340, 92" href="https://www.calendly.com/daydone" alt="farmer market">
				<area shape="rect" coords="796, 292, 1326, 368" href="https://www.calendly.com/daydone" alt="farm sells">
			</map>
		</div>
		<div class="item">
			<img class="fourth-slide" src="assets/images/slide/2.jpg" alt="Food Items Delivery" usemap="#orderFour">
			<map name="orderFour">
				<area shape="rect" coords="199, 73, 323, 95" href="login" alt="foodstuff delivery">
				<area shape="rect" coords="743, 275, 1213, 355" href="login" alt="farm produce delivery">
			</map> 
		</div>
	</div>

</div><!-- /.carousel -->

<script>
// 	window.jQuery || document.write('<script src="assets/js/jquery-1.11.1.min.js"><\/script>')
</script>
<!--<script src="assets/js/jquery.vide.min.js"></script>-->
<!--<script src="assets/rateit/jquery.min.js"></script>-->
<!--<link href="rateit.css" rel="stylesheet" type="text/css">-->
<!--<script src="jquery.rateit.js"></script>-->

<!--content-->
<div class="content-top">
	<div class="container ">
		<div class="spec ">
			<h2>Agric/Farm Mall</h2><br>
			<div class="ser-t">
				<b></b>
				<span><i></i></span>
				<b class="line"></b>
			</div>
		</div>
		<div class="tab-head ">
			<nav class="nav-sidebar">
				<ul class="nav tabs">
					<li class="active"><a href="#tab1" data-toggle="tab">Plant Produce</a></li>
					<li class=""><a href="#tab2" data-toggle="tab">Animal Produce</a></li>
					<li class=""><a href="#tab3" data-toggle="tab">Fruits & Vegetables</a></li>
					<li class=""><a href="#tab4" data-toggle="tab">Oil & Oil Crops</a></li>
				</ul>
			</nav>
			<div class=" tab-content tab-content-t ">
				<div class="tab-pane active text-style" id="tab1">
					<div class="con-w3l" data-position="auto">
					    
					    
						<?php
						$query_plant_products = "select * from products WHERE tag = 'plant_product' and status = 1 and in_stock != 0  ORDER BY time DESC LIMIT 4";
						$result_query_plant_products = mysqli_query($cxn, $query_plant_products);
						$count_plant_products = mysqli_num_rows($result_query_plant_products); 
						
						
						
						if ($count_plant_products > 0) {
							while ($fetch_product = mysqli_fetch_assoc($result_query_plant_products)) {
								
								$seller_id = $fetch_product['seller_id'];
								$product_id = $fetch_product['product_id'];
								if($seller_id == 0){$path = 'dashboard/';}else{$path = 'farmer/';}								
								$stock = $fetch_product['in_stock'];
								$qnty_sold = $fetch_product['qnty_sold'];
								$tstock = $stock;
								
								if($tstock == 0){
									$leftstock = 'Out of stock';
									$disabled = 'disabled';
								}else{
									$disabled = '';
									$leftstock = 'In Stock: '.$tstock;
								}
								
								$discount = $fetch_product['discount_price'];
								if($discount != ''){
									$prdprice = $fetch_product['discount_price'];
								}else{
									$prdprice = $fetch_product['price'];
								}
								if($discount != ''){
									$displayed_price = '<p><del><em class="item_price">&#8358;'.$fetch_product['price'].'</em></del>&nbsp;<ins><em class="item_price">&#8358;'.$fetch_product['discount_price'].'</em></ins></p>';
								}else{
									$displayed_price = '<p class="item_price" style="font-size:18px; font-weight:bold; color:#283747; text-align:center">₦'.number_format($fetch_product['price'],2).'</p>';
								}


						              echo  '
												<div class="col-md-3 m-wthree pro-1">
													<div class="col-m">
														<a href="product?prod='.$fetch_product['product_id'].'" class="offer-img numOfClickLink" click="84" name="click">
															<img src="'.$path.$fetch_product['product_img'].'" class="img-responsive" alt="'.$fetch_product['product_name'].'"
															style="width:100%; height:100%; max-height:">
															<div class="offer">
															<p><span>Popular</span></p>
															</div>
														</a>
														<div class="mid-1">
															<div class="women">
															<h6><a href="product?prod='.$fetch_product['product_id'].'" class="numOfClickLink" click="'.$fetch_product['product_id'].'" name="click">'.$fetch_product['product_name'].'</a></h6>
															</div>
															<div>
															'.$displayed_price.'
															</div>
															<div class="clearfix"></div>
															
															<div class="add">
															<button class="btn my-cart-btn my-cart-b" data-id="'.$fetch_product['product_id'].'" data-name="'.$fetch_product['product_name'].'" data-sll="'.$fetch_product['seller_id'].'" data-summary="summary 2" data-price="'.$prdprice.'" data-quantity="1" data-image="'.$path.$fetch_product['product_img'].'">Add to Cart</button>
															</div>
														</div>
														</div>
													</div>
													';
						
								
								
								
								
								
								

							}
						}
						
						
						
						?>
						<div class="clearfix"></div>
					</div>
				</div>
				
				
				
				
				<div class="tab-pane  text-style" id="tab2">
					<div class=" con-w3l">
	
							<?php
						$query_plant_products = "select * from products WHERE tag = 'animal_product' and status = 1  and in_stock != 0  ORDER BY product_id DESC LIMIT 4";
						$result_query_plant_products = mysqli_query($cxn, $query_plant_products);
						$count_plant_products = mysqli_num_rows($result_query_plant_products); 
						
						
						
						if ($count_plant_products > 0) {
							while ($fetch_product = mysqli_fetch_assoc($result_query_plant_products)) {
								
								$seller_id = $fetch_product['seller_id'];
								$product_id = $fetch_product['product_id'];
								if($seller_id == 0){$path = 'dashboard/';}else{$path = 'farmer/';}								
								$stock = $fetch_product['in_stock'];
								$qnty_sold = $fetch_product['qnty_sold'];
								$tstock = $stock;
								
								if($tstock == 0){
									$leftstock = 'Out of stock';
									$disabled = 'disabled';
								}else{
									$disabled = '';
									$leftstock = 'In Stock: '.$tstock;
								}
								
								$discount = $fetch_product['discount_price'];
								if($discount != ''){
									$prdprice = $fetch_product['discount_price'];
								}else{
									$prdprice = $fetch_product['price'];
								}
								if($discount != ''){
									$displayed_price = '<p><del><em class="item_price">&#8358;'.$fetch_product['price'].'</em></del>&nbsp;<ins><em class="item_price">&#8358;'.$fetch_product['discount_price'].'</em></ins></p>';
								}else{
									$displayed_price = '<p class="item_price" style="font-size:18px; font-weight:bold; color:#283747; text-align:center">₦'.number_format($fetch_product['price'],2).'</p>';
								}




						      echo  '
												<div class="col-md-3 m-wthree pro-1">
													<div class="col-m">
														<a href="product?prod='.$fetch_product['product_id'].'" class="offer-img numOfClickLink" click="84" name="click">
															<img src="'.$path.$fetch_product['product_img'].'" class="img-responsive" alt="'.$fetch_product['product_name'].'"
															style="width:100%; height:100%; max-height:">
															<div class="offer">
															<p><span>Popular</span></p>
															</div>
														</a>
														<div class="mid-1">
															<div class="women">
															<h6><a href="product?prod='.$fetch_product['product_id'].'" class="numOfClickLink" click="'.$fetch_product['product_id'].'" name="click">'.$fetch_product['product_name'].'</a></h6>
															</div>
															<div>
															'.$displayed_price.'
															</div>
															<div class="clearfix"></div>
															
															<div class="add">
															<button class="btn my-cart-btn my-cart-b" data-id="'.$fetch_product['product_id'].'" data-name="'.$fetch_product['product_name'].'" data-sll="'.$fetch_product['seller_id'].'" data-summary="summary 2" data-price="'.$prdprice.'" data-quantity="1" data-image="'.$path.$fetch_product['product_img'].'">Add to Cart</button>
															</div>
														</div>
														</div>
													</div>
													';
						
							}
						}
						
						
						
						?>
	
	
						<div class="clearfix"></div>
					</div>
				</div>
				
				
				
				
				
				
				
				
				
				<div class="tab-pane  text-style" id="tab3">
					<div class=" con-w3l">


						<?php
						$query_plant_products = "select * from products WHERE tag = 'Fruits_and_egetables' and status = 1  and in_stock != 0 ORDER BY product_id DESC LIMIT 4";
						$result_query_plant_products = mysqli_query($cxn, $query_plant_products);
						$count_plant_products = mysqli_num_rows($result_query_plant_products); 
						
						
						
						if ($count_plant_products > 0) {
							while ($fetch_product = mysqli_fetch_assoc($result_query_plant_products)) {
								
								$seller_id = $fetch_product['seller_id'];
								$product_id = $fetch_product['product_id'];
								if($seller_id == 0){$path = 'dashboard/';}else{$path = 'farmer/';}								
								$stock = $fetch_product['in_stock'];
								$qnty_sold = $fetch_product['qnty_sold'];
								$tstock = $stock;
								
								if($tstock == 0){
									$leftstock = 'Out of stock';
									$disabled = 'disabled';
								}else{
									$disabled = '';
									$leftstock = 'In Stock: '.$tstock;
								}
								
								$discount = $fetch_product['discount_price'];
								if($discount != ''){
									$prdprice = $fetch_product['discount_price'];
								}else{
									$prdprice = $fetch_product['price'];
								}
								if($discount != ''){
									$displayed_price = '<p><del><em class="item_price">&#8358;'.$fetch_product['price'].'</em></del>&nbsp;<ins><em class="item_price">&#8358;'.$fetch_product['discount_price'].'</em></ins></p>';
								}else{
									$displayed_price = '<p class="item_price" style="font-size:18px; font-weight:bold; color:#283747; text-align:center">₦'.number_format($fetch_product['price'],2).'</p>';
								}




						      echo  '
												<div class="col-md-3 m-wthree pro-1">
													<div class="col-m">
														<a href="product?prod='.$fetch_product['product_id'].'" class="offer-img numOfClickLink" click="84" name="click">
															<img src="'.$path.$fetch_product['product_img'].'" class="img-responsive" alt="'.$fetch_product['product_name'].'"
															style="width:100%; height:100%; max-height:">
															<div class="offer">
															<p><span>Popular</span></p>
															</div>
														</a>
														<div class="mid-1">
															<div class="women">
															<h6><a href="product?prod='.$fetch_product['product_id'].'" class="numOfClickLink" click="'.$fetch_product['product_id'].'" name="click">'.$fetch_product['product_name'].'</a></h6>
															</div>
															<div>
															'.$displayed_price.'
															</div>
															<div class="clearfix"></div>
															
															<div class="add">
															<button class="btn my-cart-btn my-cart-b" data-id="'.$fetch_product['product_id'].'" data-name="'.$fetch_product['product_name'].'" data-sll="'.$fetch_product['seller_id'].'" data-summary="summary 2" data-price="'.$prdprice.'" data-quantity="1" data-image="'.$path.$fetch_product['product_img'].'">Add to Cart</button>
															</div>
														</div>
														</div>
													</div>
													';
						
							}
						}
						
						
						
						?>
						<div class="clearfix"></div>
					</div>
				</div>
				
				
				
				
				
				
				
				
				
				<div class="tab-pane text-style" id="tab4">
					<div class=" con-w3l">
			
			
			
			
									<?php
						$query_plant_products  = "select * from products WHERE tag = 'oil_and_oil_crops' and status = 1  and in_stock != 0 ORDER BY product_id DESC LIMIT 4";
						$result_query_plant_products = mysqli_query($cxn, $query_plant_products);
						$count_plant_products = mysqli_num_rows($result_query_plant_products); 
						
						
						
						if ($count_plant_products > 0) {
							while ($fetch_product = mysqli_fetch_assoc($result_query_plant_products)) {
								
								$seller_id = $fetch_product['seller_id'];
								$product_id = $fetch_product['product_id'];
								if($seller_id == 0){$path = 'dashboard/';}else{$path = 'farmer/';}								
								$stock = $fetch_product['in_stock'];
								$qnty_sold = $fetch_product['qnty_sold'];
								$tstock = $stock;
								
								if($tstock == 0){
									$leftstock = 'Out of stock';
									$disabled = 'disabled';
								}else{
									$disabled = '';
									$leftstock = 'In Stock: '.$tstock;
								}
								
								$discount = $fetch_product['discount_price'];
								if($discount != ''){
									$prdprice = $fetch_product['discount_price'];
								}else{
									$prdprice = $fetch_product['price'];
								}
								if($discount != ''){
									$displayed_price = '<p><del><em class="item_price">&#8358;'.$fetch_product['price'].'</em></del>&nbsp;<ins><em class="item_price">&#8358;'.$fetch_product['discount_price'].'</em></ins></p>';
								}else{
									$displayed_price = '<p class="item_price" style="font-size:18px; font-weight:bold; color:#283747; text-align:center">₦'.number_format($fetch_product['price'],2).'</p>';
								}




						      echo  '
												<div class="col-md-3 m-wthree pro-1">
													<div class="col-m">
														<a href="product?prod='.$fetch_product['product_id'].'" class="offer-img numOfClickLink" click="84" name="click">
															<img src="'.$path.$fetch_product['product_img'].'" class="img-responsive" alt="'.$fetch_product['product_name'].'"
															style="width:100%; height:100%; max-height:">
															<div class="offer">
															<p><span>Popular</span></p>
															</div>
														</a>
														<div class="mid-1">
															<div class="women">
															<h6><a href="product?prod='.$fetch_product['product_id'].'" class="numOfClickLink" click="'.$fetch_product['product_id'].'" name="click">'.$fetch_product['product_name'].'</a></h6>
															</div>
															<div>
															'.$displayed_price.'
															</div>
															<div class="clearfix"></div>
															
															<div class="add">
															<button class="btn my-cart-btn my-cart-b" data-id="'.$fetch_product['product_id'].'" data-name="'.$fetch_product['product_name'].'" data-sll="'.$fetch_product['seller_id'].'" data-summary="summary 2" data-price="'.$prdprice.'" data-quantity="1" data-image="'.$path.$fetch_product['product_img'].'">Add to Cart</button>
															</div>
														</div>
														</div>
													</div>
													';
						
							}
						}
						
						
						
						?>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
</div>

<!--content-->
<div class="content-mid">
	<div class="container">

		<div class="col-md-4 m-w3ls">
			<div class="col-md2 ">
				<a href="category?prodcat=Grains/Cereals">
					<img src="assets/images/logo/co2.webp" class="img-responsive img1" alt="crop produce delivery">
					<div class="big-sale2">
						<h3>Plant <span>Produce</span></h3>
						<p>Get your plant produce delivered to your doorstep </p>
					</div>
				</a>
			</div>
			<div class="col-md3 ">
				<a href="category?prodcat=Meats">
					<img src="assets/images/logo/ani.png" class="img-responsive img1" alt="animal produce delivery">
					<div class="big-sale3">
						<h3>Animal <span>Produce</span></h3>
						<p>Get your animal produce delivered to your doorstep</p>
					</div>
				</a>
			</div>
		</div>
		<div class="col-md-4 m-w3ls1">
			<div class="col-md ">
				<a href="contact">
					<img src="assets/images/logo/co.webp" class="img-responsive img" alt="food items to door">
					<div class="big-sale">
						<div class="big-sale1">
							<h3>Big <span>Sale</span></h3>
							<p>Reach out to us for any of your corporate purchase</p>
						</div>
					</div>
				</a>
			</div>
		</div>
		<div class="col-md-4 m-w3ls">
			<div class="col-md2 ">
				<a href="category?prodcat=Oil/Oil-Crops">
					<img src="assets/images/logo/co2.webp" class="img-responsive img1" alt="oil products delivery">
					<div class="big-sale2">
						<h3>Cooking <span>Oil</span></h3>
						<p>Get your oil produce delivered to your doorstep</p>
					</div>
				</a>
			</div>
			<div class="col-md3 ">
				<a href="category?prodcat=Vegetables">
					<img src="assets/images/logo/co3.webp" class="img-responsive img1" alt="fresh vegetable delivery">
					<div class="big-sale3">
						<h3>Vegeta<span>bles</span></h3>
						<p>Get your fruits and vegetables delivered to your doorstep</p>
					</div>
				</a>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!--content-->

<!--content-->
<div class="product">
	<div class="container">
		<div class="spec">
			<h3>Recently Added</h3>
			<div class="ser-t">
				<b></b>
				<span><i></i></span>
				<b class="line"></b>
			</div>
		</div>
		<div class=" con-w3l">
	              <?php
						$query_plant_products = "select * from products where status = 1  and in_stock != 0 ORDER BY product_id DESC LIMIT 12";
						$result_query_plant_products = mysqli_query($cxn, $query_plant_products);
						$count_plant_products = mysqli_num_rows($result_query_plant_products); 
						
						
						
						if ($count_plant_products > 0) {
							while ($fetch_product = mysqli_fetch_assoc($result_query_plant_products)) {
								
								$seller_id = $fetch_product['seller_id'];
								$product_id = $fetch_product['product_id'];
								if($seller_id == 0){$path = 'dashboard/';}else{$path = 'farmer/';}								
								$stock = $fetch_product['in_stock'];
								$qnty_sold = $fetch_product['qnty_sold'];
								$tstock = $stock;
								
								if($tstock == 0){
									$leftstock = 'Out of stock';
									$disabled = 'disabled';
								}else{
									$disabled = '';
									$leftstock = 'In Stock: '.$tstock;
								}
								
								$discount = $fetch_product['discount_price'];
								if($discount != ''){
									$prdprice = $fetch_product['discount_price'];
								}else{
									$prdprice = $fetch_product['price'];
								}
								if($discount != ''){
									$displayed_price = '<p><del><em class="item_price">&#8358;'.$fetch_product['price'].'</em></del>&nbsp;<ins><em class="item_price">&#8358;'.$fetch_product['discount_price'].'</em></ins></p>';
								}else{
									$displayed_price = '<p class="item_price" style="font-size:18px; font-weight:bold; color:#283747; text-align:center">₦'.number_format($fetch_product['price'],2).'</p>';
								}




						      echo  '
												<div class="col-md-3 m-wthree pro-1">
													<div class="col-m">
														<a href="product?prod='.$fetch_product['product_id'].'" class="offer-img numOfClickLink" click="'.$fetch_product['product_id'].'" name="click">
															<img src="'.$path.$fetch_product['product_img'].'" class="img-responsive" alt="'.$fetch_product['product_name'].'"
															style="width:90%; height:90%; max-height:">
														</a>
														<div>
															<div class="women" style="text-align:center; padding:10px 0px 10px 0px"><br>
															<h6><a href="product?prod='.$fetch_product['product_id'].'" class="numOfClickLink" click="'.$fetch_product['product_id'].'" name="click">'.$fetch_product['product_name'].'</a></h6>
														   </div>
														<div>
															'.$displayed_price.'
														</div>
														<div class="clearfix"></div>
															
															<div class="add"  style="padding:10px 0px 0px 0px">
															<button class="btn my-cart-btn my-cart-b" data-id="'.$fetch_product['product_id'].'" data-name="'.$fetch_product['product_name'].'" data-sll="'.$fetch_product['seller_id'].'" data-summary="summary 2" data-price="'.$prdprice.'" data-quantity="1" data-image="'.$path.$fetch_product['product_img'].'">Add to Cart</button>
															</div>
														</div>
														</div>
													</div>
													';
						
							}
						}
						
						
						
						?>
			<div class="clearfix"></div>
			<br><br>
			<div class="row text-center">
				<a href="products" class="btn btn-warning p-3" style="border-radius:30px; padding:10px 25px 10px 25px; border: 1px solid #58D68D">All Products</a>
			</div>
			<br><br>
		</div>
	</div>
</div>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Corporation",
  "name": "DayDone",
  "alternateName": "Agric ecommerce",
  "url": "https://www.daydone.com.ng",
  "logo": "https://daydone.com.ng/assets/images/logo/daydone-logo.png",
  "contactPoint": {
    "@type": "ContactPoint",
    "telephone": "+2348174993336",
    "contactType": "customer service",
    "contactOption": "TollFree",
    "areaServed": "NG",
    "availableLanguage": "en"
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
<script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "WebSite",
  "name": "DAYDONE LIMITED",
  "url": "https://www.daydone.com.ng",
  "potentialAction": {
    "@type": "SearchAction",
    "target": "https://daydone.com.ng/search?search_product{search_term_string}",
    "query-input": "required name=search_term_string"
  }
}
</script>
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
                 //alert(data);
 
             },
             error: function (jxhr, msg, err) {
                //  alert(msg);
             }
         });
         
     });
</script>
