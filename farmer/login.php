<?php
  include "../config/dbh.php";
?>

<!DOCTYPE html>
<html lang="en" class="loading">
  
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Login</title>
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
		.alert-danger {border-color: #FF4961 !important;background-color: #FF6D80 !important;color: #fff !important;}
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
                        <h4 class="text-uppercase text-bold-400 grey darken-1">Farmer's Login</h4>
                    </div>
                    <div class="card-body">
                        <div class="card-block">
							<?php
								#SCRIPT TO LOG IN A FARMER#
								if (isset($_POST['submitFarmerLogin'])){									
									
									$farmer_email = filter_var(htmlentities($_POST['inputFarmerEmail']), FILTER_SANITIZE_EMAIL);
									
									if (filter_var($farmer_email, FILTER_VALIDATE_EMAIL) === false) {
										echo '<div class="alert alert-danger text-white">Invalid Email Address</div>';
									} else {
										$farmer_password = htmlentities(md5($_POST['inputFarmerPass']));
										$query_farmer_id = mysqli_query($cxn, "SELECT farmer_id, activation FROM farmers WHERE farmer_email='$farmer_email' AND farmer_password='$farmer_password'");
										if (mysqli_num_rows($query_farmer_id) > 0){											
												$fetch_farmer_id = mysqli_fetch_assoc($query_farmer_id);
												$farmer_id = $fetch_farmer_id['farmer_id'];
												$active = $fetch_farmer_id['activation'];
												if($active){
													$_SESSION['is_loggedfarm_in'] = true;
													$_SESSION['farmer_id'] = $farmer_id;
													header("Location: index");
												}else{
													echo '<div class="alert alert-danger bg-danger text-white">Unable to login. Contact support for activation link.</div>';	
												}
											}else{
												echo '<div class="alert alert-danger bg-danger text-white">Invalid Login Details</div>';
											}										
									}
								}
								#END OF SCRIPT TO LOG IN A FARMER#
							?>
                            <form action="" method="POST">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="email" class="form-control form-control-lg" name="inputFarmerEmail" id="inputEmail" placeholder="Email Address" required email>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="password" class="form-control form-control-lg" name="inputFarmerPass" id="inputPass" placeholder="Password" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0 ml-5">
                                                <input type="checkbox" class="custom-control-input" checked id="rememberme">
                                                <label class="custom-control-label float-left" for="rememberme">Remember Me</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="text-center col-md-12">
                                        <button type="submit" name="submitFarmerLogin" class="btn btn-danger btn-block px-4 py-2 text-uppercase white font-small-4 box-shadow-2 border-0">Login</button>
                                    </div>
                                </div>
                            </form>
							<div class="text-center">
								<p>New here? <a href="register">Create Account</a></p>
							</div>
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