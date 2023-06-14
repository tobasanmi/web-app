<?php
	$salescount = mysqli_num_rows(mysqli_query($cxn, "select * from trans where sellerid= '$farmer_loggedin_id' and status = 0 order by id desc"));                          
?>
<div data-active-color="white" data-background-color="aqua-marine" data-image="app-assets/img/sidebar-bg/02.jpg" class="app-sidebar">
  <div class="sidebar-header">
	<div class="logo clearfix"><a href="./" class="logo-text float-left">
		<div class="logo-img"><img src="../assets/images/logo/daydone-logo.webp" alt="Convex Logo" /></div>
	  </a>
		<a id="sidebarToggle" href="javascript:;" class="nav-toggle d-none d-sm-none d-md-none d-lg-block"><i data-toggle="expanded" class="ft-disc toggle-icon"></i></a><a id="sidebarClose" href="javascript:;" class="nav-close d-block d-md-block d-lg-none d-xl-none"><i class="ft-circle"></i></a></div>
  </div>
  <div class="sidebar-content">
	<div class="nav-container">
	  <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
		<li class="has-sub nav-item"><a href="./"><i class="icon-home"></i><span data-i18n="" class="menu-title">Dashboard</span></a>
		</li>
		<li class="has-sub nav-item"><a href="profile"><i class="icon-user"></i><span data-i18n="" class="menu-title">Profile</span></a>
		</li>
		<li class="has-sub"><a href="products"><i class="icon-basket"></i><span data-i18n="" class="menu-title">Products</span></a>
		<li class="has-sub"><a href="sales"><i class="icon-basket"></i><span data-i18n="" class="menu-title">Sales <span class="pull-right-container"><small class="label badge badge-primary bg-success"><?php echo $salescount;?></small></span></span></a>
		<li class="has-sub"><a href="logout"><i class="icon-logout"></i><span data-i18n="" class="menu-title">Logout</span></a>
		</li>
	  </ul>
	</div>
  </div>
  <div class="sidebar-background"></div>
</div>