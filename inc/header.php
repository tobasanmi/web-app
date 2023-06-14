<?php
// session_start();
include "script.php";
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
    
    <!-- Facebook Pixel Code -->
<!-- <script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1255120414823664');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1255120414823664&ev=PageView&noscript=1"
/></noscript> -->
<!-- End Facebook Pixel Code -->

    <meta name="keywords" content="DayDone, DayDone Limited, Online Farm Produce in Nigeria,Nigeria Online Agric Mall, Farm/Agric produces in Nigeria, Direct Farm Produce, Farm eCommerce, eCommerce for Agric produce, Number one agric mall in Nigeria, Number one food produces online shopping mall, ecommerce website, ecommerce website in nigeria, Agric Produce Shop Point, Farm eCommerce, Agricultural Produce in Nigeria, Food Items Online, Agriculture, ecommerce, cheap agric products, Best agric ecommerce platform, Best agric ecommerce platform in Nigeria, Farm Mall" />
    <meta name="author" content="DayDone LLC" />
    <meta name="twitter:card" content="DayDone Ltd" />
    <meta name="twitter:description" content="Getting Farms to your fingertip and your doorstep" />
    <meta name="twitter:titles" content="Agric ecommerce Platform" />
    <meta name="twitter:image" content="https://daydone.com.ng/assets/images/logo/cont.webp"/>
    <meta name="twitter:url" content="https://www.daydone.com.ng" />
    <link rel="apple-touch-icon" href="assets/images/logo/favicon.ico" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
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
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>
    <!-- start-smoth-scrolling -->
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>
    <!--- start-rate---->
    <link rel="stylesheet" href="assets/rateit/rateit.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-157523165-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-157523165-1');
    </script>
    <script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/8a71f2626a6c8da7e505b28df/871babce7d48a4f342334387f.js");</script>

<!-- Start of HubSpot Embed Code -->
  <script type="text/javascript" id="hs-script-loader" async defer src="//js-eu1.hs-scripts.com/25172692.js"></script>
	<!-- End of HubSpot Embed Code -->
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
	
<!-- Hotjar Tracking Code for https://www.daydone.com.ng -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:2856981,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>
	
</head>

<body>
    <!-- Messenger Chat plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "106893978464923");
      chatbox.setAttribute("attribution", "biz_inbox");

      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v12.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_GB/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
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
                
                
                <!-- The form -->
                <div class="form-group">
                        <form class="" action="search" method="get">
                        <input type="text"  class="x1_search-input" name="search_product" placeholder="Search your agric produces.." style="color: green">
                        <button type="submit" class="x1_search-button"><i class="fa fa-search"></i></button>
                    </form>
                 </div>
                
    <!--- <div class="form-group">
                        <form class="searchform" action="search" method="get">
                        <input type="text" name="search_product" placeholder="Search your agric produces.." style="color: green">
                        <button type="submit" style="margin:0px"><i class="fa fa-search"></i></button>
                    </form>
                 </div>
                  
                  <div class="x1_search-box">
                     <input type="text" class="x1_search-input" placeholder="Search..">
      <button class="x1_search-button">
        <i class="fas fa-search"></i>
      </button>
   </div></div>--->

            <div class="nav-top">
                <nav class="navbar navbar-default">
                    <div class="navbar-header nav_2">
                        <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                        <ul class="nav navbar-nav ">
                            <li class=" active"><a href="./" class="hyper "><span>Home</span></a></li>

                            <li class="dropdown ">
                                <a href="javascript:void(0)" class="dropdown-toggle  hyper" data-toggle="dropdown"><span>Plant Produce<b class="caret"></b></span></a>
                                   <ul class="dropdown-menu multi">
                                    
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <ul class="multi-column-dropdown">
                                                <li><a href="category?prodcat=Grains/Cereals"><i class="fa fa-angle-right" aria-hidden="true"></i>Grains & Cereals</a></li>
                                                <li><a href="category?prodcat=Roots/Tubers"><i class="fa fa-angle-right" aria-hidden="true"></i>Tubers & Roots</a></li>
                                                <li><a href="category?prodcat=Oil/Oil-Crops"><i class="fa fa-angle-right" aria-hidden="true"></i>Oil & Oil Crops</a></li>
                                                <li><a href="category?prodcat=Pulses"> <i class="fa fa-angle-right" aria-hidden="true"></i>Pulses</a></li>
                                            </ul>
                                        </div>

                                        <div class="col-sm-5 w3l">
                                            <a href="products"><img src="assets/images/me.webp" class="img-responsive" alt="foodstuff online"></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </ul>
                            </li>
                            <li class="dropdown">

                                <a href="javascript:void(0)" class="dropdown-toggle hyper" data-toggle="dropdown"><span>Animal Produce<b class="caret"></b></span></a>
                                <ul class="dropdown-menu multi multi1">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <ul class="multi-column-dropdown">
                                                <li><a href="category?prodcat=Eggs"><i class="fa fa-angle-right" aria-hidden="true"></i> Eggs </a></li>
                                                <li><a href="category?prodcat=Meats"><i class="fa fa-angle-right" aria-hidden="true"></i>Meats</a></li>
                                                <li><a href="category?prodcat=Fishes"><i class="fa fa-angle-right" aria-hidden="true"></i>Fishes</a></li>
                                            </ul>

                                        </div>
                                        <div class="col-sm-5 w3l">
                                            <a href="products"><img src="assets/images/me1.webp" class="img-responsive" alt="Fresh meat and livestock online"></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="javascript:void(0)" class="dropdown-toggle hyper" data-toggle="dropdown"><span>Fruits & Vegetables<b class="caret"></b></span></a>
                                <ul class="dropdown-menu multi multi2">
                                    <div class="row col-md-10">
                                        <div class="col-sm-7">
                                            <ul class="multi-column-dropdown">
                                                <li><a href="category?prodcat=Fruits"><i class="fa fa-angle-right" aria-hidden="true"></i>Fruits</a></li>
                                                <li><a href="category?prodcat=Vegetables"><i class="fa fa-angle-right" aria-hidden="true"></i>Vegetables</a></li>
                                            </ul>

                                        </div>
                                        <div class="col-sm-5 w3l">
                                            <a href="products"><img src="assets/images/me2.webp" class="img-responsive" alt="Fresh vegetables and fruit online"></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </ul>
                            </li>

                            <li><a href="faqs" class="hyper"> <span>FAQs</span></a></li>
                            <li><a href="contact" class="hyper"><span>Contact Us</span></a></li>
                        </ul>
                    </div>
                </nav>

            </div>

        </div>
    </div>
    <!--End of heADER -->