
<?php
session_start();
 include_once 'db.php';
 $user_id =  $_SESSION['user_id'];
		
		
		
		
 $url= $_SERVER['REQUEST_URI'];
 if (($msg = strpos($url, "?")) !==FALSE ){$msgg = substr($url,$msg+1);$message = str_replace(array('%20'), ' ', $msgg); }else {$message = "";}
          
        
        if($message == 'password_update'){
            //ACCESSING DATA FROM FORM
            $old_password = mysqli_real_escape_string($conn, $_POST['old_password']);
            $new_password = mysqli_real_escape_string($conn, $_POST['new_password']);
            $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
            
            //CHECKING IF NEW PASSWPRD MATCH
            if( $new_password != $confirm_password){  
                 $_SESSION['notify_time_keeper'] = time();
                 $_SESSION['notify'] = '<div class="col-sm-12 col-md-12 col-lg-12 mb-60"><h4 class="text-blue title-border mb-30 bars"></h4><div class="alert alert-danger alert-dismissable" style="font-size:17px"><button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>Your new password don\'t match. </div></div>';
                 header("location:../account");
             exit;};
                    
                    //FETCH USER DATA
            		$sql ="SELECT * FROM users WHERE  user_id=' $user_id'";
	             	$result = mysqli_query($conn, $sql);
	             	
	             	if ($row = mysqli_fetch_assoc($result)) {
    				 	  	//OLD PASSWORD DE-HASHING AND VERIFYING
	             	         $hashedPwdCheck = password_verify($old_password, $row['password']);
    				
                			 //UPDATING PASSWORD
            				if ($hashedPwdCheck) {
            				       $hashedpwd = password_hash($new_password, PASSWORD_DEFAULT);
            					   $sql ="UPDATE users SET password = '$hashedpwd'  WHERE user_id='$user_id'";
                    			   mysqli_query($conn, $sql);
                    			   $_SESSION['notify_time_keeper'] = time();
                    			   $_SESSION['notify'] = '<div class="col-sm-12 col-md-12 col-lg-12 mb-60"><h4 class="text-blue title-border mb-30 bars"></h4><div class="alert alert-success alert-dismissable" style="font-size:17px"><button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button> Success! Your password has been updated. </div></div>';
                                   header("Location: ../account");
            					   exit();
            				 }
            				 else{
            				     $_SESSION['notify_time_keeper'] = time();
            				     $_SESSION['notify'] = '<div class="col-sm-12 col-md-12 col-lg-12 mb-60"><h4 class="text-blue title-border mb-30 bars"></h4><div class="alert alert-danger alert-dismissable" style="font-size:17px"><button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button>Your previous password is incorrect. </div></div>';
            				     header("location: ../account");
            					exit();
            				 }
    				       }
	             	
	             	
	 
                        				  
        			   
            
        }
        elseif($message == 'account_update'){
               //ACCESSING DATA FROM FORM
               $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
               $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
               $email = mysqli_real_escape_string($conn, $_POST['email']);
               $phone = mysqli_real_escape_string($conn, $_POST['phone']);
              
              //UPDATING ACCOUNT DETAILS
      		   $sql ="UPDATE users SET firstname = '$firstname', lastname = '$lastname', phone='$phone', email='$email'  WHERE user_id='$user_id'";
			   mysqli_query($conn, $sql);
			   $_SESSION['notify_time_keeper'] = time();
			   $_SESSION['notify'] = '<div class="col-sm-12 col-md-12 col-lg-12 mb-60"><h4 class="text-blue title-border mb-30 bars"></h4><div class="alert alert-success alert-dismissable" style="font-size:17px"><button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button> Success! Your account details has been updated. </div></div>';
               header("Location: ../account");
            
        }
        elseif($message == 'address_update'){
              //ACCESSING DATA FROM FORM
              $address = mysqli_real_escape_string($conn, $_POST['address']);
              $shop_number = mysqli_real_escape_string($conn, $_POST['shop_number']);
              $city = mysqli_real_escape_string($conn, $_POST['city']);
              
              //UPDATING ADDRESS
      		   $sql ="UPDATE users SET address = '$address', shop_number = '$shop_number', city = '$city'  WHERE user_id='$user_id'";
			   mysqli_query($conn, $sql);
			   $_SESSION['notify_time_keeper'] = time();
			   $_SESSION['notify'] = '<div class="col-sm-12 col-md-12 col-lg-12 mb-60"><h4 class="text-blue title-border mb-30 bars"></h4><div class="alert alert-success alert-dismissable" style="font-size:17px"><button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button> Success! Your address has been updated. </div></div>';
               header("Location: ../account");
            
        }
        else{
            header('location:account');
        }