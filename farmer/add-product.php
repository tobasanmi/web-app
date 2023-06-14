<?php
include "inc/header.php";
?>

<div class="main-panel">
  <div class="main-content">
    <div class="content-wrapper">
      <div class="container-fluid">        
        <div class="row">
          <div class="col-md-8 offset-md-2">

            <div class="card p-3">
              <div class="card-header text-center">
                <h2>Add Product</h2>
              </div>
              <div class="card-body">
				  <?php
				  	  #SCRIPT TO ADD FARMERS PRODUCT#
						if (isset($_POST['submit_farmer_product'])) {
							if ($_POST['farmer_product_category'] !== "" && $_POST['farmer_product_name'] !== "" && $_POST['farmer_product_price'] !== "" && $_POST['farmer_product_type'] !== "" && $_POST['farmer_product_size'] !== "" && $_POST['farmer_product_tag'] !== "" && $_POST['farmer_product_description'] !== "") {


								$seller_id = $_SESSION['farmer_id'];
								$product_name = htmlentities($_POST['farmer_product_name']);
								$product_category = htmlentities($_POST['farmer_product_category']);

								// script to upload image
								$tmp_name = $_FILES['farmer_product_img']['tmp_name'];
								$filename = $_FILES['farmer_product_img']['name'];
								$folder = "app-assets/product-images/";
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
													//var_dump($path);
												}
											} else {
												echo "<script>alert('Add related Images for this product')</script>";
											}
											// var_dump($i);
										}

								$price = htmlentities($_POST['farmer_product_price']);
								$region = htmlentities($_POST['farmer_product_region']);
								$product_type = htmlentities($_POST['farmer_product_type']);
								$remark = htmlentities($_POST['farmer_product_remark']);
								$size = htmlentities($_POST['farmer_product_size']);
								$product_tag = htmlentities($_POST['farmer_product_tag']);
								$description = $_POST['farmer_product_description'];
								$instock = htmlentities(mysqli_real_escape_string($cxn, $_POST['instock']));

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
								$time = date('Y-m-d h:i:s');

								if (!$filename  && !$uploaded_file_name) {
									echo "<script>alert('Please upload a picture of the product')</script>";
								} else {
									$image_size = getimagesize($tmp_name);
									$image_width = $image_size[0];
									$image_height = $image_size[1];
							  $fileName = $_FILES['farmer_product_img']['name'];							  
								$fileSize = $_FILES['farmer_product_img']['size'];
      							$fileError = $_FILES['farmer_product_img']['error'];
      							$fileType = $_FILES['farmer_product_img']['type'];      
      							$fileTmpName = $_FILES['farmer_product_img']['tmp_name'];      
							  //restrict file to upload --Ext means extension
							  $fileExt = explode('.', $fileName);
							  //change the actual file ext to lower case
							  $fileActualExt = strtolower(end($fileExt));
							  //check allowed files
							  $allowedFiles = array('jpg', 'jpeg', 'png');

							  if(in_array($fileActualExt, $allowedFiles)){
								if ($fileError === 0) {
								  if($fileSize <1000000){
									//prevent file overwrite
									  $fileNameNew = str_shuffle(time()).uniqid('', true). "." . $fileActualExt;
									  //after the file name. get to file direcory
									$fileDirectory = $folder.$fileNameNew;               
									//move the file from temp_location to the uploads directory
									 move_uploaded_file($fileTmpName, $fileDirectory); 
																		      								
									/*if ($image_width > 300 || $image_height > 300) {
										echo "<script>alert('Image Width and Height must be less than or equal to 300px')</script>";
									} else {
									}*/
										//$move_file = move_uploaded_file($tmp_name, $file_to_upload);
									  	$arrhtry = [$price]; //price history
										$add_product = mysqli_query($cxn, "INSERT INTO products(seller_id,product_name,product_category,product_img,remark,product_desc,price,size,product_type,region,tag,product_screenshots,time, in_stock, price_history) VALUES ('$seller_id','$product_name','$product_category','$fileDirectory','$remark','$description','$price','$size','$product_type','$region','$product_tag','$uploaded_file_name', '$time', '$instock', '$price')");										
										if ($add_product) {
											//header("Location: products");
											echo '<div class="text-center p-2 alert alert-success">Product Successfully Added <a href="products">View Product</a></div>';
										} else {
											echo '<div class="text-center p-2 alert alert-danger">Error adding product, Please try again later</div>';
										}
									 }else {
										echo '<div class="alert alert-danger text-white font-weight-bold" id="noteout">Sorry,your product image is to large. Maximum requirement is 5mb <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
									  }
									}else{
									  echo '<div class="alert alert-danger text-white font-weight-bold" id="noteout">There was an error uploading your product image. Kindly retry! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
									}
								  }else{
									echo '<div class="alert alert-danger text-white font-weight-bold" id="noteout">Sorry, only JPG, JPEG, PNG files are allowed<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
								  } 
									  
								}
							} else {								
								echo '<div class="text-center p-2 alert alert-danger">Make sure you fill the form correctly</div>';
							}
						}
						#END OF SCRIPT TO ADD FARMER PRODUCT#
				  ?>
                <form action="" method="post" enctype="multipart/form-data">
                  <fieldset>

                    <div class="row">
                      <div class="form-group col-md-6 col-sm-6">
                        <label for="exampleInputFile">Category</label>
                        <select class="form-control" name="farmer_product_category" required>
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
                        <input class="form-control" placeholder="Product name" name="farmer_product_name" type="text" value="<?= isset($_POST['farmer_product_name']) ? $product_name : ""; ?>">
                      </div>
                    </div>


                    <div class="form-group">
                      <label>Product Photo</label>
                      <center>
                        <div class="add_product_img_lable" style="width:300px; border:2px solid blue;border-radius: 8px;height: 200px">
                          <label for="displaypic" onchange='handleFileSelect(event)'>
                            <div id="display_pic">
                              <i class="fa fa-camera"></i>
                            </div>
                            <span>Display Photo<br><a style="color:orangered">(Required)</a></span>
                          </label>
                          <input type="file" id='displaypic' name="farmer_product_img" accept=".jpg,.png,.jpeg,.webp" style="display:none;height: 150px;width:300px;" required />
                        </div>
                        <p style="font-size:11px"><i>Image requirement height 300px and weight 300px</i></p>
                      </center>
                    </div>

                    <div class="row">

                      <div class="col-md-6 col-sm-6">
                        <label for="exampleInputEmail1">Price:</label> <span style="color:#999999"><b>&#8358; </b><span id="price_reflector">0</span></span>
                        <div class="form-group">
                          <input id="pricevalue" class="form-control" required placeholder="0.00" name="farmer_product_price" type="text" onkeyup="pricereflector();" value="<?= isset($_POST['farmer_product_price']) ? $price : ""; ?>">
                        </div>
                      </div>

                      <div class="col-md-6 col-sm-6">
                        <label>Farm/Region:</label> <span style="color:#999999"></span>
                        <div class="form-group">
                          <input class="form-control" placeholder="farm/region" name="farmer_product_region" type="text" value="<?= isset($_POST['farmer_product_region']) ? $region : ""; ?>">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6 col-sm-6">
                        <label>Type/Species:</label> <span style="color:#999999"></span>
                        <div class="form-group">
                          <input class="form-control" placeholder="type/species" required name="farmer_product_type" type="text" value="<?= isset($_POST['farmer_product_type']) ? $product_type : ""; ?>">
                        </div>
                      </div>

                      <div class="col-md-6 col-sm-6">
                        <label>Remark:</label> <span style="color:#999999"></span>
                        <div class="form-group">
                          <input class="form-control" required placeholder="remark" name="farmer_product_remark" type="text">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6 col-sm-6">
                        <label>Size:</label> <span style="color:#999999"></span>
                        <div class="form-group">
                          <input class="form-control" required placeholder="Size" name="farmer_product_size" type="text" value="<?= isset($_POST['farmer_product_size']) ? $size : ""; ?>">
                        </div>
                      </div>

                      <div class="col-md-6 col-sm-6">
                        <label>Tag:</label> <span style="color:#999999"></span>
                        <select class="form-control" name="farmer_product_tag" required>
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
                      <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                          <label for="relatedImages">Add related Images (* Max of 4)</label>
                          <input type="file" required class="form-control" multiple name="prod_relatedImages[]" id="relatedImages" aria-describedby="relatedImages">
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Description</label>
                      <textarea id="summernote" class="form-control" rows="20" name="farmer_product_description" required placeholder="Provide a detailed description of product..."><?= isset($_POST['farmer_product_description']) ? $description : ""; ?></textarea>
                    </div>

                    <button id="submitbtn" type="submit" name="submit_farmer_product" class="btn btn-primary btn-block">Submit</button>
                  </fieldset>
                </form>
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
    $('#summernote').summernote({
      tabsize: 2,
      height: 180
    });
  </script>