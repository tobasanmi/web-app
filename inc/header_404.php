<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="DayDone your Agric Ecommerce Platform, making a difference in getting Farms to your fingertip and doorstep">
<link rel="shortcut icon" href="assets/images/logo/favicon.ico">
    <link rel="author" href="humans.txt" />
    <title> <?php echo isset($page_title) ? "DayDone | Agric Ecommerce Platform | " . $page_title : "DayDone | No 1 Agric Ecommerce Platform" ?></title>
    <!-- for-mobile-apps -->

    <meta property="og:title" content="DayDone - Agric Ecommerce Platform"/>
    <meta property="og:description" content="Getting Farms to your fingertip and your doorstep"/>
    <meta property="og:url" content="www.daydone.com.ng"/>
    <meta property="og:image" content="https://www.daydone.ng/assets/images/logo/daydone-logo.webp"/>
    


    <meta name="keywords" content="DayDone, DayDone Limited, Online Farm Produce in Nigeria,Nigeria Online Agric Mall, Farm/Agric produces in Nigeria, Direct Farm Produce, Farm eCommerce, eCommerce for Agric produce, Number one agric mall in Nigeria, Number one food produces online shopping mall, ecommerce website, ecommerce website in nigeria, Agric Produce Shop Point, Farm eCommerce, Agricultural Produce in Nigeria, Food Items Online, Agriculture, ecommerce, cheap agric products, Best agric ecommerce platform, Best agric ecommerce platform in Nigeria, Farm Mall" />
    <meta name="author" content="DayDone LLC" />
    <meta name="twitter:card" content="DayDone Ltd" />
    <meta name="twitter:description" content="Getting Farms to your fingertip and your doorstep" />
    <meta name="twitter:titles" content="Agric ecommerce Platform" />
    <meta name="twitter:image" content="https://daydone.com.ng/assets/images/logo/cont.webp"/>
    <meta name="twitter:url" content="https://www.daydone.com.ng" />
    <link rel="apple-touch-icon" href="assets/images/logo/favicon.ico" />
    <!-- //for-mobile-apps -->
    <link href="assets/css/bootstrap.css" rel='stylesheet' type='text/css' />
    <!--<link rel="stylesheet" type="text/css" href="assets/css/introjs.min.css">-->
    <!-- Custom Theme files -->
    <link href="assets/css/style.css" rel='stylesheet' type='text/css' />
    <!-- js -->
    <script src="assets/js/jquery-1.11.1.min.js"></script>
    <!-- //js -->
    <!-- start-smoth-scrolling -->
    <script type="text/javascript" src="assets/js/move-top.js"></script>
    <script type="text/javascript" src="assets/js/easing.js"></script>
    <!-- start-smoth-scrolling -->
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>
    <!--- start-rate---->
    <link rel="stylesheet" href="assets/rateit/rateit.css">

	<style type="text/css">
		.offer-img img {
			margin: 0 auto;    		
    		height: 100px;
    		width: 100px;    
		}
		.mid-2 {
    		padding: 6px 0 !important;
		}
		.mid-1 {
    		padding: 1em 0 0;
		}
		@media (max-width: 414px){
			.col-m {
				padding: 0.5em;
				height: 300.91px !important;
			}		
			.mid-1 {
    			padding: 1em 0 0;
			}
		}
		.soldby{
			font-size: 14px;
		}
		
	</style>

</head>

<body>
    <!-- Messenger Chat plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>


    <div class="header">
        <div class="container">

            <div class="logo"
                <h1><a href="./"><img class="img-fluid" src="assets/images/logo/daydone-logo.webp" alt="DayDone logo"><span>THE BEST AGRIC ECOMMERCE PLATFORM</span></a></h1>
            </div>
            <div class="head-t">
                <ul class="card">
                     <li><a href="farmer/terms"><i class="fa fa-file-text-o" aria-hidden="true"></i>Sell your produces</a></li>
                    <li><a href="source"><i class="fa fa-ship" aria-hidden="true"></i>Source a product</a></li>
                    <?php 
                        if(!isset( $_SESSION['user_id'] )){
                            echo '<li><a href="login"><i class="fa fa-user" aria-hidden="true"></i>Login/Register</a></li>';
                        }else{
                            echo '<li><a href="account"><i class="fa fa-user" aria-hidden="true"></i>account</a></li>';
                        }
                    
                    
                    ?>

                </ul>
            </div>

            <div class="header-ri">
                <ul class="social-top">
                    <li><a href="https://www.facebook.com/daydoneng/" class="icon facebook"><i class="fa fa-facebook" aria-hidden="true"></i><span></span></a></li>
                    <li><a href="https://www.instagram.com/daydoneng/" class="icon instagram"><i class="fa fa-instagram"  style="color:orangered"  aria-hidden="true"></i><span></span></a></li>
                    <li><a href="https://www.linkedin.com/company/daydone/" class="icon linkedin"><i class="fa fa-linkedin" style="color:#2C64AF" aria-hidden="true"></i><span></span></a></li>
                    <li><a href="https://www.youtube.com/channel/UCfJEvqg-8fPCY-RupTo8NOA/" class="icon pinterest"><i class="fa fa-youtube" style="color:red" aria-hidden="true"></i><span></span></a></li>
                </ul>
                


   </div></div>

           

        </div>
    </div>
    <!--End of heADER -->