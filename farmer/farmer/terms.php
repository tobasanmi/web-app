<?php
	define('SITE_TITLE', 'DayDone');
?>
<!DOCTYPE html>
<html lang="en" class="loading">
  
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">    
	<title>Terms of service - DayDone</title>  
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

	.term-header{
		background: #2B32B2; color: #fff !important; 
		border-bottom: 3px solid #15010d; 
		border-top: 1px solid #15010d;
	}
	p, li{
		margin: 5px 0px;	
		padding: 8px;
		font-size: 17px;
		color: #726a84;
		font-weight: 300;
	}
	.tagline{
		height: 0; border-top: 1px solid #D9DDE5; 
		text-align: center; 
		margin: 30px 0px;
	}
	.tagline span{
	text-transform: uppercase;
	display: inline-block;
	position: relative;
	padding: 0 15px;
	background: #ffffff;
	color: #183059;
	top: -14px;
	font-weight: 500;
	}
	.term-body{
		padding: 5px;
		text-align: justify;
	}
	.term-body h2{
		font-size: 1.75rem;
		margin-bottom: .5rem;
		font-family: inherit;
		font-weight: 500;
		line-height: 1.2;
		color: inherit;
	}
		/* Style the button that is used to open and close the collapsible content */
	.collapsible {
	  background-color: #87ceeb;
	  color: #fff;
	  cursor: pointer;
	  padding: 15px;
	  width: 100%;
	  border: none;
	  text-align: left;
	  outline: none;
	  font-size: 17px;
	}

	/* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
	.collapsible .active, .collapsible:hover {
	  background-color: #87ceeb;
	}

	/* Style the collapsible content. Note: hidden by default */
	.content {
	  padding: 0 10px;
	  display: none; 
	  background-color: white;
	  overflow: hidden;
	  transition: max-height 0.2s ease-out;
	  /* max-height: 0; */
	}
	.collapsible:after {
	  content: '\02795'; /* Unicode character for "plus" sign (+) */
	  font-size: 13px;
	  color: white;
	  float: right;
	  margin-left: 5px;
	}

	.collapsible.active:after {
	  content: "\2796"; /* Unicode character for "minus" sign (-) */
	}
	.h3{color: #fff;font-weight: bold;}
		.bg-white .card-header{background: #87ceeb;}
</style>
  </head>
  <body data-col="1-column" class=" 1-column  blank-page blank-page">
    
<div class="wrapper">
<section id="login">
    <div class="container-fluid">
        <div class="row" style="padding-top: 50px;padding-bottom: 100px;">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="single-special text-center wow fadeInUp" data-wow-delay="0.2s" style="box-shadow: 2px 3px 5px; border-radius: unset;">
                        <div class="px-3 py-4 bg-white">
                            <div class="card-header term-header text-center font-weight-bold h3">
                                <h1 class="h3"><?php echo SITE_TITLE?> Terms of Service</h1>
                            </div>
                            <div class="">                            
                                 <h4 class="font-weight-bold pt-3" style="color: #726a84;">These terms and conditions outline the rules and regulations for the use of <?php echo SITE_TITLE?> Farmers' Marketplace</h4>                                
                                <div class="term-body">
									<p>It has been a great delight to develop, beta test, and live test this marketplace for farmers.</p>
									<p>Having launched this product, I will go through a bit about what the marketplace has to offer and how it works.</p>
									<p>First, It's good to note that this is the centerpiece of our Agric eCommerce platform, which we will scale to every region in line with our vision to digitize the African Agriculture market.</p>
                                    <hr>
                                   <button class="collapsible">About Marketplace <i>- click here👉</i></button>
                                    <div class="content">
										<p>The marketplace is going first to our farmer's waitlist. In order to guarantee sales/distribution for farmers, not all registered accounts will be activated immediately. However, activation of account depends on;</p>
										<ul>
											<li>The location of the farmer,</li>
											<li>Type of produce,</li>
											<li>The completion of our vetting process and</li>
											<li>Already existing numbers of farmers selling the same produce</li>
										</ul>                                        
                                    </div>     
									<hr>
									 <button class="collapsible">Account Activation <i>- click here👉</i></button>
                                    <div class="content">
										<p>To use our platform, activated account must comply with our image requirement (not more than 300px by 300px) and product description details. Every farmer profile product will be approved before it is featured on our platform.</p>
										<p>Note that <span style="font-weight: 700;">communication of product number of stock</span> is essential, to ensure the only available product ready to be shipped is featured. If this is repeatedly flagged, this can lead to your account being deactivated</p>                                      
                                    </div>     
                                   <hr>
									 <button class="collapsible">Pricing - <i>click here👉</i></button>
                                    <div class="content">
										<p>₦500 will be charged from every purchase payout made on the platform and this will also come with a 100% cashback for the first 3 transactions.</p>
										<p><b>Note</b> that <span style="font-weight: 700;">communication of product number of stock</span> is essential. And every activated account is expected to put out their <span style="font-weight: 700;">best of price.</span> Payment will be made after successful delivery before which ownership of product will remain the farmers</p>                                      
                                    </div>  
									
									<div>
										<p>Finally, any farmer interested in running a digital farm that is data-driven, and also wants to document production process can join us on this journey. Simply signup by clicking </p>
										
										<p><a style="display: block; height: 100px; width: 100%; background: #0bda51; color: #ffffff; text-align: center; font-weight: bold; font-size: 200%; line-height: 100px; font-family: Arial; border-radius: 20px; text-decoration: none;" href="register">Sign me up!</a></p>
										
										<p>See you on the inside as we together make Agriculture in Africa more lucrative and profitable</p>
									</div>
                                </div>
                                <p><br><p>This terms was last updated on June 1st, 2022.</p>
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
	  
	 <script type="text/javascript">
        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.display === "block") {
                    content.style.display = "none";
                } else {
                    content.style.display = "block";
                }
            });
        }

    </script>
  </body>

</html>