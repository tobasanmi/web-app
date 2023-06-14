<?php
session_start();  
if (isset($_POST['submit'])) {
	
	
	
    
        include_once 'dbh.php';
		
		
 // required image---------------------------------->	
		$url= $_SERVER['REQUEST_URI'];
        if (($msg = strpos($url, "?")) !==FALSE ){
        $msgg = substr($url,$msg+1);
        $message = str_replace(array('%20'), ' ', $msgg);
        }else {
        $message = "";
        }
		
		
 // required image---------------------------------->

 
      $category = mysqli_real_escape_string($conn, $_POST['category']);
        $productname = mysqli_real_escape_string($conn, $_POST['productname']);
        $price = mysqli_real_escape_string($conn, $_POST['price']);
        $tag = mysqli_real_escape_string($conn, $_POST['tag']);
        $remark = mysqli_real_escape_string($conn, $_POST['remark']);
        $size = mysqli_real_escape_string($conn, $_POST['size']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $seller_id = mysqli_real_escape_string($conn, $_SESSION['super_id']);
		$time = (Date('y/m/d H:i:s'));
		
	
	
 // required image---------------------------------->
        $required_img = $_FILES['required_img'];
		$required_img_Name = $_FILES['required_img']['name'];
		$required_img_TmpName = $_FILES['required_img']['tmp_name'];
		$required_img_Size = $_FILES['required_img']['size'];
		$required_img_Error = $_FILES['required_img']['error'];
		$required_img_Type = $_FILES['required_img']['type'];
		
		$required_img_Ext = explode('.', $required_img_Name);
        $required_img_Actual_Ext = strtolower(end($required_img_Ext));	
		$allowed_Ext = array('jpg', 'jpeg', 'png', 'webp');
		
		
		
 // checking input data------------------------------->			
	  if (empty($category)) {
        header("Location: ../add_product.php? please select a category");
        exit();
        }
	 
	   elseif( empty($productname)){
	     header("Location: ../add_product.php? please fill for Product Name");
        exit();
	    }
	    elseif( empty($price)){
	     header("Location: ../add_product.php? please fill for price");
        exit();
	    }
	    elseif( empty($description)){
	     header("Location: ../add_product.php? please fill for description");
        exit();
	    }
		//checking if seller is signed in
	    elseif( empty($seller_id)){
	     header("Location: ../signin.php");
        exit();
	    }
		//check if phone is valid			
        else {
		       if($required_img_Size == 0){
			    $sql ="UPDATE product SET  seller_id ='$seller_id',  product_name='$productname', product_category='$category',  remark='$remark', product_desc='$description',  price='$price',  size='$size', type='$type', region='$region', tag='$tag', time='$time'   WHERE product_id =$message";
		         mysqli_query($conn, $sql);
				 
				 header("Location: ../index.php?");
               exit();
		   	   }
			   else{ 
        			   if (in_array($required_img_Actual_Ext, $allowed_Ext)) {
        			        if ($required_img_Error == 0) {
        					if ($required_img_Size < 5000000) {
        					$required_img_NameNew = $seller_id.".".(time()).".".$required_img_Actual_Ext;
        					$required_img_Destination = '../../large_img/'.$required_img_NameNew;
        					move_uploaded_file(	$required_img_TmpName, $required_img_Destination);
        					
        					 $sql ="UPDATE product SET  seller_id ='$seller_id',  product_name='$productname', product_category='$category', product_img_req='$required_img_NameNew', remark='$remark', product_desc='$description',  price='$price',  size='$size', type='$type', region='$region', tag='$tag', time='$time' WHERE product_id =$message";
		                     mysqli_query($conn, $sql); 
        					 
// creating display image start-------------------------------------------------------------------------------->		
        
                            $required_img_thumb = file_get_contents($required_img_Destination);
        				    $OrigPic = imagecreatefromstring($required_img_thumb);
        				    
        				    $width = imagesx($OrigPic);
        				    $height = imagesy($OrigPic);
        				    $thumbwidth = $width/2;
        				    $thumbheight =$height/2;
        				    $thumbnailpath = '../../images/';
        				    $filename = time();
        				    
        				    $thumbnail = imagecreatetruecolor($thumbwidth, $thumbheight);
        				    imagecopyresampled($thumbnail, $OrigPic, 0, 0, 0, 0, $thumbwidth, $thumbheight, $width, $height);
        				    
        				    imagejpeg($thumbnail, $thumbnailpath.$required_img_NameNew);
        				    
        				    imagedestroy($OrigPic);
        				    imagedestroy($thumbnail);				
        					
 // creating display image end-------------------------------------------------------------------------------->	
 
 // creating thumbnail start-------------------------------------------------------------------------------->		
        
                            $required_img_thumb = file_get_contents($required_img_Destination);
        				    $OrigPic = imagecreatefromstring($required_img_thumb);
        				    
        				    $width = imagesx($OrigPic);
        				    $height = imagesy($OrigPic);
        				    $thumbwidth = $width/6;
        				    $thumbheight =$height/6;
        				    $thumbnailpath = '../../thumbnail/';
        				    $filename = time();
        				    
        				    $thumbnail = imagecreatetruecolor($thumbwidth, $thumbheight);
        				    imagecopyresampled($thumbnail, $OrigPic, 0, 0, 0, 0, $thumbwidth, $thumbheight, $width, $height);
        				    
        				    imagejpeg($thumbnail, $thumbnailpath.$required_img_NameNew);
        				    
        				    imagedestroy($OrigPic);
        				    imagedestroy($thumbnail);				
        					
 // creating thumbnail end-------------------------------------------------------------------------------->
 
                            header("Location: ../index.php?");		
        					}
							echo"file too large!!";
        					}
        					
        			   
        			   }
					  else{
					       header("Location: ../add_product.php? The file you are trying to upload is invalid");
					  } 
					
		   	     }
             }
			 
			 
     }
		  
		  
		

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
/*
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $productname = mysqli_real_escape_string($conn, $_POST['productname']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $seller_id = mysqli_real_escape_string($conn, $_SESSION['seller_id']);
	$required_img = $_FILES['required_img'];
	//$img1 = $_FILES['img1'];
	//$img2 = $_FILES['img2'];


    if (empty($category)) {
        header("Location: ../add_product.php? please select a category");
        exit();
     }
	 
	   elseif( empty($productname)){
	     header("Location: ../add_product.php? please fill for price");
        exit();
	   }
	   elseif( empty($price)){
	     header("Location: ../add_product.php? please fill for price");
        exit();
	   }
	   elseif( empty($description)){
	     header("Location: ../add_product.php? please fill for description");
        exit();
	   }
	   elseif( empty($seller_id)){
	     header("Location: ../signin.php");
        exit();
	   }
	   
       else {
           //checking if seller is signed in
           if (empty($seller_id)) {
            header("Location: ../add_product.php? Please signIn to add product");
            exit();
            }
            else {
             //check phone is valid			
			  if(!preg_match("/^[0-9]*$/", $price)){
              header("Location: ../add_product.php?invalid characters in price");
              exit();                
               }
  
					else {
					   // insert the user into the  database
                       $sql ="INSERT INTO product (category, productname, price, description) VALUES ('$category', '$productname',  '$price', '$description')";
                                mysqli_query($conn, $sql); 
                                header("Location: ../index.php");	
                              						   
                   }
             }
          }
        }
else {
    header("Location: ../add_product.php");
    exit();
	*/
	
	