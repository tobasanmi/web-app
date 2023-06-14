<?php
include "inc/header.php";
if (isset($_GET['id'])) {
	$product_id = $_GET['id'];
  	$query_product_details = mysqli_query($cxn, "SELECT * FROM products WHERE product_id='$product_id'");
  	$row = mysqli_fetch_assoc($query_product_details);
}
?>

<aside class="main-sidebar">
  <section class="sidebar">    
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
          </button>
        </span>
      </div>
    </form>    
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header"></li>
      <li><a href="add_product"><i class="fa fa-cart-plus text-green"></i> <span>Add New Product</span></a></li>
      <a href="pages/calendar.html">
      </a>
      </li>
      <li><a href="signout"><i class="fa fa-sign-out text-yellow"></i> <span>Sign Out</span></a></li>
      <!---
		<li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
		-->
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <ol class="breadcrumb">
      <li><i class="fa fa-cart-plus "></i><a href="all_products"> All Product</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-7 col-md-offset-3">
        <div class="login-panel panel panel-default">
          <div class="panel-heading" style="background-color:#B1C4FF">
            <h3 class="panel-title" style="font-size:12px; color:#ffffff;">
              <center><b>Edit <?php echo $row['product_name'];?></b></center>
            </h3>
          </div>
          <div class="panel-body">
			  <?php
			  		// script to update a product
					if (isset($_POST['update_product'])) {
						if ($_POST['product_category'] !== "" && $_POST['product_name'] !== "" && $_POST['product_price'] !== "" && $_POST['product_type'] !== "" && $_POST['product_size'] !== "" && $_POST['product_tag'] !== "" && $_POST['product_description'] !== "") {

						//   $seller_id = 0;
						  $product_name = htmlentities($_POST['product_name']);
						  $product_category = htmlentities($_POST['product_category']);

						  // script to upload image
						  $tmp_name = $_FILES['product_img']['tmp_name'];
						  $filename = $_FILES['product_img']['name'];
						  if ($row['seller_id'] != 0) {
							$folder = "../farmer/app-assets/product-images/";
						  } else {
							$folder = "assets/images/";
						  }
						  $file_to_upload = $folder . $filename;

						  $price = htmlentities($_POST['product_price']);
						  $region = htmlentities($_POST['product_region']);
						  $product_type = htmlentities($_POST['product_type']);
						  $remark = htmlentities($_POST['product_remark']);
						  $size = htmlentities($_POST['product_size']);
						  $product_tag = htmlentities($_POST['product_tag']);


						  if (isset($_POST['product_discount_price']) && !empty($_POST['product_discount_price'])) {
							$discount_price = "'" . mysqli_real_escape_string($cxn, $_POST['product_discount_price']) . "'";
						  } else {
							$discount_price = "NULL";
						  }


						  $description = $_POST['product_description'];

						  $product_category = mysqli_real_escape_string($cxn, $product_category);
						  $product_name = mysqli_real_escape_string($cxn, $product_name);
						  $file_to_upload = mysqli_real_escape_string($cxn, $file_to_upload);
						  $price = mysqli_real_escape_string($cxn, $price);
						  $region = mysqli_real_escape_string($cxn, $region);
						  $product_type = mysqli_real_escape_string($cxn, $product_type);
						  $remark = mysqli_real_escape_string($cxn, $remark);
						  $size = mysqli_real_escape_string($cxn, $size);
						  $product_tag = mysqli_real_escape_string($cxn, $product_tag);
						  $discount_price =  $discount_price;
						  $description = mysqli_real_escape_string($cxn, $description);
						  $instock = htmlentities(mysqli_real_escape_string($cxn, $_POST['instock'])); 
						  $time = date('Y-m-d h:i:s');
							
							if (!$filename) {								  
								 $prodimg = $row['product_img'];									
							} else {								  
							   $image_size = getimagesize($tmp_name); $image_width = $image_size[0];
								$image_height = $image_size[1];
								
								if ($image_width > 300 || $image_height > 300) {
								  	echo "<script>alert('Image Width and Height must be less than or equal to 300px')</script>";
								} else {
									$prodimg = $file_to_upload;
								  	$move_file = move_uploaded_file($tmp_name, $prodimg);
								}								  
							  }
							  /*$query_update_product = "UPDATE products SET product_name='$product_name',product_category='$product_category',product_img='$file_to_upload',remark='$remark',product_desc='$description',price='$price',size='$size',product_type='$product_type',region='$region',tag='$product_tag',discount_price=$discount_price,time='$time' WHERE product_id='$product_id'";
							  $result_update_product = mysqli_query($cxn, $query_update_product);
							  if ($result_update_product) {
								header("Location: product.php?id=" . $product_id . "");
							  } else {
								$msgResponse = "Error updating product, Please try again later";
								$msgResponseClass = "alert-danger";
							  }*/
							
								//add price history
								if($price == $row['price']){
									if($row['price_history'] == ''){
										$ddd = $row['price'];
									}else{
										$ddd = $row['price_history']; //retain the hisory										
									}
								}else{
									if($row['price_history'] == ''){
										$ddd = $row['price'].', '.$price;
									}else{
									//push new price to the array pricing	
					  				$ff = $row['price_history'];
									$ddd = $ff.', '.$price;	
									}
								}			
								$pricehistory = $ddd;
								
							  $query_update_product = "UPDATE products SET product_name='$product_name', product_category='$product_category', product_img='$prodimg', remark='$remark', product_desc='$description', price='$price',size='$size', product_type='$product_type', region='$region', tag='$product_tag', discount_price=$discount_price, time='$time', price_history = '$pricehistory', in_stock = '$instock' WHERE product_id='$product_id'";
							
							  $result_update_product = mysqli_query($cxn, $query_update_product);
							  if ($result_update_product) {
								 echo '<div class="text-center p-2 alert alert-success">Product successfully updated!</div>';
							  } else {
								 echo '<div class="text-center p-2 alert alert-danger">Error updating product, Please try again later</div>';								
							  }
							
						} else {
						  	echo '<div class="text-center p-2 alert alert-danger">Make sure you fill the form correctly</div>';						  
						}
					  }
			  ?>
            <form action="" method="post" enctype="multipart/form-data">
              <fieldset>

                <div class="row">
                  <div class="form-group col-md-6 col-sm-6">
                    <label for="exampleInputFile">Category</label>
                    <select class="form-control" name="product_category" required>                       
						<?php
							if($row['product_category'] != ''){									
                          		echo '<option value="'.$row['product_category'].'">'.$row['product_category'].' Selected</option>';
							 }else{
                          		echo '<option value="">--Select A Category--</option>';									
							}
							?>
                      <option value="Grains/Cereals">Grains And Cereals</option>
                      <option value="Roots/Tubers">Roots And Tubers</option>
                      <option value="Pulses">Pulses</option>
                      <option value="Vegetables">Vegetables</option>
                      <option value="Oil/Oil-Crops">Oil And Oil Crops</option>
                      <option value="Fruits">Fruits</option>
                      <option value="Eggs">Eggs</option>
                      <option value="Meats">Meats</option>
                      <option value="Fishes">Fishes</option>
                    </select>
                  </div>

                  <div class="form-group col-md-6 col-sm-6" required>
                    <label for="exampleInputEmail1">Product Name</label>
                    <?php if (isset($row['product_name'])) : ?>
                      <input class="form-control" placeholder="product name" name="product_name" type="text" value="<?= $row['product_name']; ?>">
                    <?php else : ?>
                      <input class="form-control" placeholder="product name" name="product_name" type="text" value="<?php echo isset($_POST['product_name']) ? $product_name : ""; ?>">
                    <?php endif; ?>
                  </div>
                </div>


                <div class="form-group">
                  <label>Product Photo</label>
                  <center>
                    <div class="add_product_img_lable" style="width:150px; border:2px solid blue;border-radius: 8px">
                      <label for="displaypic" onchange='handleFileSelect(event)'>
                        <div id="display_pic">
                          <i class="fa fa-camera"></i>
							<img src="<?php echo $row['product_img'];?>" />
                        </div>
                        <span>Display Photo<br><a style="color:orangered">(Required)</a></span>
                      </label>
                      <input type="file" id='displaypic' name="product_img" accept=".jpg,.png,.jpeg,.webp" style="display:none" />
                    </div>
                  </center>
                </div>

                <div class="row">

                  <div class="col-md-6 col-sm-6">
                    <label for="exampleInputEmail1">Price:</label> <span style="color:#999999"><b>&#8358; </b><span id="price_reflector">0</span></span>
                    <div class="form-group">
                      <?php if (isset($row['price'])) : ?>
                        <input id="pricevalue" class="form-control" placeholder="0.00" name="product_price" type="text" onkeyup="pricereflector();" value="<?= $row['price']; ?>">
                      <?php else : ?>
                        <input id="pricevalue" class="form-control" placeholder="0.00" name="product_price" type="text" onkeyup="pricereflector();" value="<?php echo isset($_POST['product_price']) ? $price : ""; ?>">
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="col-md-6 col-sm-6">
                    <label>Farm/Region:</label> <span style="color:#999999"></span>
                    <div class="form-group">
                      <?php if (isset($row['region'])) : ?>
                        <input class="form-control" placeholder="farm/region" name="product_region" type="text" value="<?= $row['region']; ?>">
                      <?php else : ?>
                        <input class="form-control" placeholder="farm/region" name="product_region" type="text" value="<?php echo isset($_POST['product_region']) ? $region : ""; ?>">
                      <?php endif; ?>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 col-sm-6">
                    <label>Type/Species:</label> <span style="color:#999999"></span>
                    <div class="form-group">
                      <?php if (isset($row['product_type'])) : ?>
                        <input class="form-control" placeholder="type/species" required name="product_type" type="text" value="<?= $row['product_type']; ?>">
                      <?php else : ?>
                        <input class="form-control" placeholder="type/species" required name="product_type" type="text" value="<?php echo isset($_POST['product_type']) ? $product_type : ""; ?>">
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="col-md-6 col-sm-6">
                    <label>Remark:</label> <span style="color:#999999"></span>
                    <div class="form-group">
                      <?php if (isset($row['remark'])) : ?>
                        <input class="form-control" placeholder="remark" name="product_remark" type="text" value="<?= $row['remark']; ?>">
                      <?php else : ?>
                        <input class="form-control" required placeholder="remark" name="product_remark" type="text">
                      <?php endif; ?>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 col-sm-6">
                    <label>Size:</label> <span style="color:#999999"></span>
                    <div class="form-group">
                      <?php if (isset($row['size'])) : ?>
                        <input class="form-control" required placeholder="Size" name="product_size" type="text" value="<?= $row['size']; ?>">
                      <?php else : ?>
                        <input class="form-control" required placeholder="Size" name="product_size" type="text" value="<?php echo isset($_POST['product_size']) ? $size : ""; ?>">
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="col-md-6 col-sm-6">
                    <label>Tag:</label> <span style="color:#999999"></span>
                    <select class="form-control" name="product_tag" required>                      
						<?php
							if($row['tag'] != ''){
                          		echo '<option value="'.$row['tag'].'">'.$row['tag'].' Selected</option>';
							}else{
                          		echo '<option value="">Select Tag</option>';									
							}
						?>
                      <option value="plant_product">Plant Products</option>
                      <option value="animal_product">Animal Products</option>
                      <option value="Fruits_and_egetables">Fruits & Vegetables</option>
                      <option value="oil_and_oil_crops">Oil & Oil Crops</option>    
                    </select>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="relatedImages">Add related Images (* Max of 4)</label>
                      <input type="file" class="form-control" multiple name="prod_relatedImages[]" id="relatedImages" aria-describedby="relatedImages">
                    </div>
                  </div>
                </div>

                <div class="row">
				    <div class="col-md-6 col-sm-6">
                        <label>Number in Stock:</label> <span style="color:#999999"></span>
                        <div class="form-group">
                          <input class="form-control" required placeholder="How many product in stock" value="<?php echo $row['in_stock'];?>" name="instock" type="number">
                        </div>
                      </div>
                  <div class="col-md-6 col-sm-6">
                    <label for="exampleInputEmail1">Discount Price:</label>
                    <div class="form-group">
                      <?php if (isset($row['discount_price'])) : ?>
                        <input id="discountpricevalue" class="form-control" placeholder="0.00" name="product_discount_price" type="text" value="<?= $row['discount_price']; ?>">
                      <?php else : ?>
                        <input id="discountpricevalue" class="form-control" placeholder="0.00" name="product_discount_price" type="text" value="<?= isset($_POST['product_discount_price']) ? $_POST['product_discount_price'] : ""; ?>">
                      <?php endif; ?>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label>Description</label>
                  <?php if (isset($row['product_desc'])) : ?>
                    <textarea id="summernote" class="form-control" rows="10" name="product_description" required="" placeholder="Provide a detailed description of product..."><?= $row['product_desc']; ?></textarea>
                  <?php else : ?>
                    <textarea id="summernote" class="form-control" rows="10" name="product_description" required="" placeholder="Provide a detailed description of product..."><?php echo isset($_POST['product_description']) ? $description : ""; ?>
                    </textarea>
                  <?php endif; ?>
                </div>

                <button id="submitbtn" type="submit" name="update_product" class="btn  btn-primary btn-block">Update Product</button>
              </fieldset>
            </form>
          </div>
        </div>
      </div>

    </div>
    <!-- /.row -->
    <!-- Main row -->

    <!-- /.row (main row) -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include "inc/footer.php";
?>
<script>
  $('#summernote').summernote({
    tabsize: 2,
    height: 180
  });
</script>