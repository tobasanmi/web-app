<?php
  include "../config/dbh.php";

	$validlink = '';
	if(isset($_GET['active'])){
		$dd = htmlentities($_GET['active']);
		$farmer = htmlentities($_GET['fm']); 
		//check if the link is valid
		$checklink = mysqli_query($cxn, "SELECT * FROM farmers_activation where farmerid = '$farmer' && code = '$dd' and status = 1");
		if(mysqli_num_rows($checklink) > 0){
			$dd = mysqli_fetch_assoc($checklink); 
			$code = $dd['code']; 
			
			//activate the farmer
			$upd = mysqli_query($cxn, "update farmers_activation set status = 2 where status = 1 and farmer_id = '$farmer' and code = '$dd'"); 
			$upd2 = mysqli_query($cxn, "update farmers set activation = 1 where farmer_id = '$farmer'");
			
			if($upd2){  
				$validlink = '<h4 class="alert alert-success text-white text-center">Account Successfully Activated. <br> <a href="login">Login Now</a></h4>';
			}else{
				$validlink = '<h4 class="alert alert-danger text-white text-center">Unable to activate account, try again</h4>';
			}
			
		}else{
			$validlink = '<h4 class="alert alert-danger text-white text-center">Invalid activation link detected. Contact support</h4>';
		}
	}
?>

<!DOCTYPE html>
<html lang="en" class="loading">
  
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Farmer's Activation</title>
    <link rel="apple-touch-icon" sizes="60x60" href="app-assets/img/ico/apple-icon-60.html">
    <link rel="apple-touch-icon" sizes="76x76" href="app-assets/img/ico/apple-icon-76.html">
    <link rel="apple-touch-icon" sizes="120x120" href="app-assets/img/ico/apple-icon-120.html">
    <link rel="apple-touch-icon" sizes="152x152" href="app-assets/img/ico/apple-icon-152.html">
    <link rel="shortcut icon" type="image/png" href="app-assets/img/ico/favicon-32.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900%7CMontserrat:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="app-assets/fonts/feather/style.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/fonts/simple-line-icons/style.css">
    <link rel="stylesheet" type="text/css" href="app-assets/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/perfect-scrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/prism.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
	<style type="text/css">
		.alert-danger, .alert-success {color: #fff !important;} 
	</style>
  </head>
  <body data-col="1-column" class=" 1-column  blank-page blank-page">
    
    <div class="wrapper"><!--Login Page Starts-->
<section id="login">
    <div class="container-fluid">
        <div class="row full-height-vh">
            <div class="col-12 d-flex align-items-center justify-content-center gradient-aqua-marine">
                <div class="card box-shadow-2 width-400">
                    <div class="card-header text-center pb-0">
                        <img src="../assets/images/logo/daydone-logo.webp" alt="company-logo" class="mb-3" width="80">
                        <h4 class="text-uppercase text-bold-400 grey darken-1">Account Activation</h4>
                    </div>
                    <div class="card-body">
                        <div class="card-block"> 
							<?php
								echo $validlink;
							?>                            							
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Login Page Ends-->
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- BEGIN VENDOR JS-->
    <script src="app-assets/vendors/js/core/jquery-3.3.1.min.js"></script>
    <script src="app-assets/vendors/js/core/popper.min.js"></script>
    <script src="app-assets/vendors/js/core/bootstrap.min.js"></script>
    <script src="app-assets/vendors/js/perfect-scrollbar.jquery.min.js"></script>
    <script src="app-assets/vendors/js/prism.min.js"></script>
    <script src="app-assets/vendors/js/jquery.matchHeight-min.js"></script>
    <script src="app-assets/vendors/js/screenfull.min.js"></script>
    <script src="app-assets/vendors/js/pace/pace.min.js"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN CONVEX JS-->
    <script src="app-assets/js/app-sidebar.js"></script>
    <script src="app-assets/js/notification-sidebar.js"></script>
    <!-- END CONVEX JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <!-- END PAGE LEVEL JS-->
  </body>

</html>