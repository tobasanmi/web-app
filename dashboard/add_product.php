<?php
	include "inc/header.php";
	include 'inc/sidebar.php';
?>

<div class="content-wrapper">
  <section class="content-header">
    <ol class="breadcrumb">
      <li><i class="fa fa-cart-plus "></i> Add New Product</li>
    </ol>
  </section>
  
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-md-7 col-md-offset-3">
        <div class="login-panel panel panel-default">
          <div class="panel-heading" style="background-color:#B1C4FF">
            <h3 class="panel-title" style="font-size:12px; color:#ffffff;">
              <center><b>Product Form</b><br><br>
                <?php if ($msgResponse !== "") : ?>
                  <div class="text-center p-2 alert <?= $msgResponseClass; ?>"><?= $msgResponse; ?></div>
                <?php endif; ?>
              </center>
            </h3>
          </div> 
          <div class="panel-body">
			  <?php
				// script to add a product 
				if (isset($_POST['submit_product'])) {

					if ($_POST['product_category'] !== "" && $_POST['product_name'] !== "" && $_POST['product_price'] !== "" && $_POST['product_type'] !== "" && $_POST['product_size'] !== "" && $_POST['product_tag'] !== "" && $_POST['product_description'] !== "") {
						
						$seller_id = 0;
						$product_name = htmlentities($_POST['product_name']);
						$product_category = htmlentities($_POST['product_category']);

						// script to upload image
						$tmp_name = $_FILES['product_img']['tmp_name'];
						$filename = $_FILES['product_img']['name'];
						$folder = "assets/images/";
						$file_to_upload = $folder . $filename;

						// script to upload screenshots
						for ($i = 0; $i < count($_FILES['prod_relatedImages']['name']); $i++) {
							if (is_uploaded_file($_FILES['prod_relatedImages']['tmp_name'][$i])) {
								$file_temp = $_FILES['prod_relatedImages']['tmp_name'][$i];
								$file_name = $_FILES['prod_relatedImages']['name'][$i];
								$screenshot_path = 'assets/screenshot/';
								$screenshot_path_in_db = 'assets/screenshot/';
								$uploaded_file_name =  $screenshot_path . $file_name;
								$uploaded_file_name_in_db = $screenshot_path_in_db . $file_name;
								$result =  move_uploaded_file($file_temp, $uploaded_file_name);
								if ($result) {
									$path =  $uploaded_file_name_in_db;
									if (isset($_SESSION["paths"])) {
										$_SESSION["paths"] = $_SESSION["paths"] . " " . $path;
									} else {
										$_SESSION["paths"] = $path;
									}
								} else {
									$path = $screenshot_path_in_db . "/avatar.png";
									var_dump($path);
								}
							} else {
								echo "<script>alert('Add related Images for this product')</script>";
							}
							// var_dump($i);
						}


						$price = htmlentities($_POST['product_price']);
						$region = htmlentities($_POST['product_region']);
						$product_type = htmlentities($_POST['product_type']);
						$remark = htmlentities($_POST['product_remark']);
						$size = htmlentities($_POST['product_size']);
						$product_tag = htmlentities($_POST['product_tag']);
						$description = $_POST['product_description'];

						$product_name = mysqli_real_escape_string($cxn, $product_name);
						$product_category = mysqli_real_escape_string($cxn, $product_category);
						$file_to_upload = mysqli_real_escape_string($cxn, $file_to_upload);
						$price = mysqli_real_escape_string($cxn, $price);
						$region = mysqli_real_escape_string($cxn, $region);
						$product_type = mysqli_real_escape_string($cxn, $product_type);
						$remark = mysqli_real_escape_string($cxn, $remark);
						$size = mysqli_real_escape_string($cxn, $size);
						$product_tag = mysqli_real_escape_string($cxn, $product_tag);
						$uploaded_file_name = mysqli_real_escape_string($cxn, $_SESSION["paths"]);
						$description = mysqli_real_escape_string($cxn, $description);
						$instock = htmlentities(mysqli_real_escape_string($cxn, $_POST['instock']));
						$time = date('Y-m-d h:i:s');

						if (!$filename && !$uploaded_file_name) {							
							echo '<div class="text-center p-2 alert alert-danger">Please upload a picture of the product with related Images</div>';							
						} else {
							$image_size = getimagesize($tmp_name);
							$image_width = $image_size[0];
							$image_height = $image_size[1]; 
							$move_file = move_uploaded_file($tmp_name, $file_to_upload);
							$query_add_product = "INSERT INTO products(seller_id,product_name,product_category,product_img,remark,product_desc,price,size,product_type,region,tag,product_screenshots,time, in_stock, price_history) VALUES ('$seller_id','$product_name','$product_category','$file_to_upload','$remark','$description','$price','$size','$product_type','$region','$product_tag','$uploaded_file_name','$time', '$instock', '$price')";
								$result_add_product = mysqli_query($cxn, $query_add_product);
								if ($result_add_product) {
									//header("Location: ./");
									echo '<div class="text-center p-2 alert alert-success">Product Successfully Added <a href="product">View Product</a></div>';
								} else {
									echo '<div class="text-center p-2 alert alert-danger">Error uploading product, Please try again later</div>';
									//$msgResponseClass = "alert-danger";
								}
						}
					} else {
						$msgResponse = "Make sure you fill the form correctly";
						$msgResponseClass = "alert-danger";
					}
				}
				// end of script to add a product

			  ?>
            <form action="" method="post" enctype="multipart/form-data">
              <fieldset>

                <div class="row">
                  <div class="form-group col-md-6 col-sm-6">
                    <label for="exampleInputFile">Category</label>
                    <select class="form-control" name="product_category" required>
                      <option value="">--Select A Category--</option>
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
                    <input class="form-control" placeholder="product name" name="product_name" type="text" value="<?php echo isset($_POST['product_name']) ? $product_name : ""; ?>">
                  </div>
                </div>


                <div class="form-group">
                  <label>Product Photo</label>
                  <center>
                    <div class="add_product_img_lable" style="width:150px; border:2px solid blue;border-radius: 8px">
                      <label for="displaypic" onchange='handleFileSelect(event)'>
                        <div id="display_pic">
                          <i class="fa fa-camera"></i>
                        </div>
                        <span>Display Photo<br><a style="color:orangered">(Required)</a></span>
                      </label>
                      <input type="file" id='displaypic' name="product_img" accept=".jpg,.png,.jpeg,webp" style="display:none" />
                    </div>
                  </center>
                </div>

                <div class="row">

                  <div class="col-md-6 col-sm-6">
                    <label for="exampleInputEmail1">Price:</label> <span style="color:#999999"><b>&#8358; </b><span id="price_reflector">0</span></span>
                    <div class="form-group">
                      <input id="pricevalue" class="form-control" placeholder="0.00" name="product_price" type="text" onkeyup="pricereflector();" value="<?php echo isset($_POST['product_price']) ? $price : ""; ?>">
                    </div>
                  </div>

                  <div class="col-md-6 col-sm-6">
                    <label>Farm/Region:</label> <span style="color:#999999"></span>
                    <div class="form-group">
                      <input class="form-control" placeholder="farm/region" name="product_region" type="text" value="<?php echo isset($_POST['product_region']) ? $region : ""; ?>">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 col-sm-6">
                    <label>Type/Species:</label> <span style="color:#999999"></span>
                    <div class="form-group">
                      <input class="form-control" placeholder="type/species" required name="product_type" type="text" value="<?php echo isset($_POST['product_type']) ? $product_type : ""; ?>">
                    </div>
                  </div>

                  <div class="col-md-6 col-sm-6">
                    <label>Remark:</label> <span style="color:#999999"></span>
                    <div class="form-group">
                      <input class="form-control" required placeholder="remark" name="product_remark" type="text">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 col-sm-6">
                    <label>Size:</label> <span style="color:#999999"></span>
                    <div class="form-group">
                      <input class="form-control" required placeholder="Size" name="product_size" type="text" value="<?php echo isset($_POST['product_size']) ? $size : ""; ?>">
                    </div>
                  </div>

                  <div class="col-md-6 col-sm-6">
                    <label>Tag:</label> <span style="color:#999999"></span>
                    <select class="form-control" name="product_tag" required>
                      <option value="">Select Tag</option>
                      <option value="plant_product">Plant Products</option>
                      <option value="animal_product">Animal Products</option>
                      <option value="Fruits_and_egetables">Fruits & Vegetables</option>
                      <option value="oil_and_oil_crops">Oil & Oil Crops</option>
                    </select>
                  </div>
                </div>

                <div class="row">
				  <div class="col-md-6 col-sm-6">
					<label>Number in Stock:</label> <span style="color:#999999"></span>
					<div class="form-group">
					  <input class="form-control" required placeholder="How many product in stock" name="instock" type="number">
					</div>
				  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="relatedImages">Add related Images (* Max of 4)</label>
                      <input type="file" required class="form-control" multiple name="prod_relatedImages[]" id="relatedImages" aria-describedby="relatedImages">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label>Description</label>
                  <textarea id="summernote" class="form-control" rows="20" name="product_description" required="" placeholder="Provide a detailed description of product..."><?php echo isset($_POST['product_description']) ? $description : ""; ?></textarea>
                </div>

                <button id="submitbtn" type="submit" name="submit_product" class="btn  btn-primary btn-block">Submit</button>
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