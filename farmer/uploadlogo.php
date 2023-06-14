<?php
	include "../script.php";
	include "checkuser.php";

	if(isset($_FILES['image'])){                       
        echo $image = $_FILES['image'];      
      $fileSize = $_FILES['image']['size'];
      $fileError = $_FILES['image']['error'];
      $fileType = $_FILES['image']['type'];                                  
        $fileName = $_FILES['image']['name'];
        $fileTmp = $_FILES['image']['tmp_name'];              

      //restrict file to upload --Ext means extension
      $fileExt = explode('.', $fileName);
      //change the actual file ext to lower case
      $fileActualExt = strtolower(end($fileExt)); 
      //check allowed files
      $allowedFiles = array('jpg', 'jpeg', 'png');

      if(in_array($fileActualExt, $allowedFiles)){
        if ($fileError === 0) {
          if($fileSize <10000000){
            //prevent file overwrite
            $fileNameNew = uniqid('', true). "." . $fileActualExt;
              //after the file name. get to file direcory
            $fileDirectory = 'farmlogos/' .$fileNameNew;               
            //move the file from temp_location to the uploads directory
             move_uploaded_file($fileTmpName, $fileDirectory);
			                            
             $saveimage = mysqli_query($cxn, "update farmers set logo = '$fileDirectory' where farmer_id='$farmer_loggedin_id'");     
             if($saveimage){
               echo '<div class= "alert alert-success text-white font-weight-bold" id="noteout">Logo Successfully Updated.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';               
              }else{                                  
                echo '<div class="alert alert-danger text-white font-weight-bold">Logo could not be submitted, Check your network and try again. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
              }                                        

          }else {
            echo '<div class="alert alert-danger text-white font-weight-bold" id="noteout">Sorry,your logo is to large. Maximum requirement is 5mb <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
          }
        }else{
          echo '<div class="alert alert-danger text-white font-weight-bold" id="noteout">There was an error uploading your logo. Kindly retry! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        }
      }else{
        echo '<div class="alert alert-danger text-white font-weight-bold" id="noteout">Sorry, only JPG, JPEG, PNG files are allowed<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
      } 
     }
?>