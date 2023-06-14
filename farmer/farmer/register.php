<?php
include "../script.php";
?>

<!DOCTYPE html>
<html lang="en" class="loading">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Register</title>
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

<body data-col="1-column" class=" 1-column  blank-page blank-page gradient-aqua-marine">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">
        <!--Login Page Starts-->
        <section id="login">
            <div class="container-fluid">
                <div class="row full-height-vh">
                    <div class="col-md-5 offset-md-3 d-fle align-items-center justify-content-center">
                        <div class="card box-shadow-2">
                            <div class="card-header text-center pb-0">
                                <a href="./"><img src="../assets/images/logo/daydone-logo.webp" alt="company-logo" class="mb-3" width="80"></a>
                                <h4 class="text-uppercase text-bold-400 grey darken-1">Farmer's Registration</h4>
                            </div>
                            <div class="card-body">
                                <div class="card-block">
									<?php
										#SCRIPT TO REGISTER A FARMER#
										if (isset($_POST['submitFarmerSignUp'])) {
											if ($_POST['farmer_firstname'] !== "" && $_POST['farmer_lastname'] !== "" && $_POST['farmer_email'] !== "" && $_POST['farmer_password'] !== "") {
												$farmer_signupFirstName = filter_var(htmlentities($_POST['farmer_firstname']), FILTER_SANITIZE_STRING);
												$farmer_signupLastName = filter_var(htmlentities($_POST['farmer_lastname']), FILTER_SANITIZE_STRING);
												$farmer_signupEmail = filter_var(htmlentities($_POST['farmer_email']), FILTER_SANITIZE_EMAIL);
												$farmer_signupPassword = md5(htmlentities($_POST['farmer_password']));

												$adr = mysqli_real_escape_string($cxn, htmlentities($_POST['adr']));
												
												$farmer_signupFirstName = mysqli_real_escape_string($cxn, $farmer_signupFirstName);
												$farmer_signupLastName = mysqli_real_escape_string($cxn, $farmer_signupLastName);
												$farmer_signupEmail = mysqli_real_escape_string($cxn, $farmer_signupEmail);
												$farmer_signupPassword = mysqli_real_escape_string($cxn, $farmer_signupPassword);
												$farmerphone = mysqli_real_escape_string($cxn, htmlentities($_POST['phone']));

												$result_farmerSignup = mysqli_query($cxn, "INSERT INTO farmers (farmer_first_name,farmer_last_name, farmer_email, farmer_password, activation, farmer_address, farmer_phone_number) VALUES ('$farmer_signupFirstName','$farmer_signupLastName','$farmer_signupEmail','$farmer_signupPassword', 0, '$adr', '$farmerphone')"); 

												if ($result_farmerSignup) {
													$query_farmer_login_id = mysqli_query($cxn, "SELECT farmer_id FROM farmers WHERE farmer_email='$farmer_signupEmail' AND farmer_password='$farmer_signupPassword'");
													if (mysqli_num_rows($query_farmer_login_id) > 0) {
														$fetch_farmer_login_id = mysqli_fetch_assoc($query_farmer_login_id);
														$_SESSION['farmer_id'] = $fetch_farmer_login_id['farmer_id'];
														$_SESSION['is_loggedfarm_in'] = true;
														//header("Location: ./");
														echo '<div class="alert alert-success text-white">Account successfully created. We will forward an activation link to you once approved. You can join our open Farmers Network Telegram Group <a href="https://t.me/farmers_network"><span color="blue">HERE</span></a></div>';
													}
												} else {
													echo '<div class="alert alert-danger text-white">Error registering farmer, please try again later OR Use a different Email Address to register!</div>';
												}
											} else {
												echo '<div class="alert alert-danger text-white">Fill in the form properly!</div>';
											}
										}
										#END OF SCRIPT TO REGISTER A FARMER#
									?>
                                    <form action="" method="POST">
                                        <div class="row">
											<div class="form-group col-md-6">
                                            <div class="col-md-12">
                                                <input type="text" class="form-control form-control-lg" name="farmer_firstname" id="firstName" placeholder="First Name" required>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <div class="col-md-12">
                                                <input type="text" class="form-control form-control-lg" name="farmer_lastname" id="lastName" placeholder="Last Name" required>
                                            </div>
                                        </div>
										</div>
										<div class="row">
                                        <div class="form-group col-md-6">
                                            <div class="col-md-12">
                                                <input type="email" class="form-control form-control-lg" name="farmer_email" id="inputEmail" placeholder="Email Address" required>
                                            </div>
                                        </div>
										<div class="form-group col-md-6">
                                            <div class="col-md-12">
                                                <input type="number" class="form-control form-control-lg" name="phone" id="" placeholder="Phone Number" required>
                                            </div>
                                        </div>
										</div>
										
										<div class="form-group">
                                            <div class="col-md-12">
                                                <input type="text" class="form-control form-control-lg" name="adr" id="" placeholder="Farm Address (Street, Town and State)" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <input type="password" class="form-control form-control-lg" name="farmer_password" id="inputPass" placeholder="Password" required>
                                            </div>
                                        </div>
										<div class="custom-control custom-checkbox">
										  <input type="checkbox" value="1" class="custom-control-input" id="termscheck">
											<label class="custom-control-label" for="termscheck">By clicking the sign up button, you agreed to our <a href="terms" target="_blank">Term of Services</a></label>
										</div>

                                        <div class="form-group pt-2">
                                            <div class="text-center col-md-12">
                                                <button type="submit" name="submitFarmerSignUp" id="signup" disabled class="btn btn-danger btn-block px-4 py-2 text-uppercase white font-small-4 box-shadow-2 border-0">Sign Up</button>
                                            </div>
                                        </div>
                                    </form>
									<div class="text-center">
										<p>Already have an account? <a href="login">Login Here</a></p>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    
    <script src="app-assets/vendors/js/core/jquery-3.3.1.min.js"></script>
    <script src="app-assets/vendors/js/core/popper.min.js"></script>
    <script src="app-assets/vendors/js/core/bootstrap.min.js"></script>
    <script src="app-assets/vendors/js/perfect-scrollbar.jquery.min.js"></script>
    <script src="app-assets/vendors/js/prism.min.js"></script>
    <script src="app-assets/vendors/js/jquery.matchHeight-min.js"></script>
    <script src="app-assets/vendors/js/screenfull.min.js"></script>
    <script src="app-assets/vendors/js/pace/pace.min.js"></script>    
    <script src="app-assets/js/app-sidebar.js"></script>
    <script src="app-assets/js/notification-sidebar.js"></script>
    
	<script>
		document.getElementById('termscheck').addEventListener('change', function(){
			let ts = document.getElementById('termscheck').checked;
			if(ts == true){
				//enale signup
				document.getElementById('signup').disabled = false; 
			}else{
				document.getElementById('signup').disabled = true;				
			}
		});
	</script>
</body>

</html>