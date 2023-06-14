





























<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
   <!-- Favicon -->
   <link href="<?php echo base_url("assets/images/favicon.png");?>" rel="icon" type="image/png">

    <title>Social Solution</title>

    <link href="http://fonts.googleapis.com/css2?family=Hind:wght@300;400;500;600&amp;display=swap" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&amp;display=swap" rel="stylesheet">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo base_url("assets/css/style-liberty.css");?>">



	<!--------Front--------->
   
		<!-- Bootstrap core CSS -->
	    <link href="<?php echo base_url("all_assets/ftpg/css/bootstrap.min.css");?>" type="text/css" rel="stylesheet" />
        <!-- Slider -->               
        <link href="<?php echo base_url("all_assets/ftpg/css/tiny-slider.css");?>" rel="stylesheet" />
        <!-- Tobii -->
        <link href="<?php echo base_url("all_assets/ftpg/css/tobii.min.css");?>" rel="stylesheet" type="text/css" />
	    <!--Material Icon -->
        <link href="<?php echo base_url("all_assets/ftpg/css/materialdesignicons.min.css");?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url("all_assets/ftpg/../../unicons.iconscout.com/release/v4.0.0/css/line.css");?>" rel="stylesheet">
	    <!-- Custom  Css -->
	    <link href="<?php echo base_url("all_assets/ftpg/css/style.min.css");?>" rel="stylesheet" type="text/css" id="theme-opt" />
        <link href="<?php echo base_url("all_assets/ftpg/css/colors/blue.css");?>" rel="stylesheet" id="color-opt">
	
  </head>
  <body>
<!-- header -->
<header class="w3l-header">
	<div class="container">
	<!--/nav-->
	<nav class="navbar navbar-expand-lg navbar-light fill px-lg-0 py-0 px-sm-3 px-0">
			<!--<a class="navbar-brand" href="index.html">Social Solution</a>
				<span class="fa fa-car"></span>Social Solution</a>-->
				
						<a class="navbar-brand" href="<?php echo base_url();?>">
							<img src="<?php echo base_url("assets/images/logo.png");?>" alt="Social Solution" title="Socialsoln" style="height:35px;"/>
						</a> 

			
			<button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
				data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
				aria-label="Toggle navigation">
				<!-- <span class="navbar-toggler-icon"></span> -->
				<span class="fa icon-expand fa-bars"></span>
				<span class="fa icon-close fa-times"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<nav class="mx-auto">
					<div class="search-bar">
						<form class="search" action="<?php echo base_url("result");?>" method="GET">
							<input type="search" class="search__input" name="search" placeholder="Search for services, articles and more"
								onload="equalWidth()" required>
							<span class="fa fa-search search__icon"></span>
						</form>
					</div>
				</nav>
				<ul class="navbar-nav">
					<li class="nav-item active">
						<a class="nav-link" href="<?php echo base_url();?>">Home</a>
					</li>
					<li class="nav-item @@contact__active">
						<a class="nav-link" href="<?php echo base_url("services");?>">Services</a>
					</li>
					<li class="nav-item @@contact__active">
						<a class="nav-link" href="<?php echo base_url("about");?>">About</a>
					</li>
					<li class="nav-item @@contact__active">
						<a class="nav-link" href="<?php echo base_url("contact");?>">Contact</a>
					</li>
				</ul>
			</div>
			<!-- toggle switch for light and dark theme -->
			<div class="mobile-position">
				<nav class="navigation">
					<div class="theme-switch-wrapper">
						<label class="theme-switch" for="checkbox">
							<input type="checkbox" id="checkbox">
							<div class="mode-container">
								<i class="gg-sun"></i>
								<i class="gg-moon"></i>
							</div>
						</label>
					</div>
				</nav>
			</div>
			<!-- //toggle switch for light and dark theme -->
		</div>
	</nav>
	<!--//nav-->
</header>