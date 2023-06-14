<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Daydone</title> 
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url()?>assets/images/favicon.ico" />

    <!-- CSS
    ============================================ -->

    <!-- Minify Version -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/plugins/plugins.min.css">

    <!-- Style CSS -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/style.min.css">

</head>

<body>

    <div class="main-wrapper">

        <!-- Begin Main Header Area -->
        <header class="main-header_area position-relative">
            <div class="header-top border-bottom d-none d-md-block">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <div class="header-top-left">
                                <ul class="dropdown-wrap text-matterhorn">
                                    
                                    </li>
                                    <li class="dropdown">
                                        <button class="btn btn-link  ht-btn" type="button" id="currencyButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        
                                        </button>
                                        
                                    </li>
                                    <li>
                                        Call Us
                                        <a href="tel:08174993336">08174993336</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="header-top-right text-matterhorn">
                                <p class="shipping mb-0"><a href="mailto:info@daydone.com.ng">info@daydone.com.ng</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-middle py-5">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <div class="header-middle-wrap">
                                <a href="<?php echo base_url();?>" class="header-logo">
                                    <img src="<?php echo base_url()?>assets/images/logo.webp" alt="daydone logo">
                                </a>
                                <div class="header-search-area d-none d-lg-block">
                                    <form  action="<?php echo base_url("result");?>" method="GET" class="header-searchbox">
                                        <input class="input-field" type="text" name="search"  placeholder="Search articles...">
                                        <button class="btn btn-outline-whisper btn-primary-hover" type="submit"><i class="pe-7s-search"></i></button>
                                    </form>
                                </div>
                                <div class="header-right">
                                    <ul>
                                        
                                        <li class="d-block d-lg-none">
                                            <a href="#searchBar" class="search-btn toolbar-btn">
                                                <i class="pe-7s-search"></i>
                                            </a>
                                        </li>
                                       
                                        <li class="mobile-menu_wrap d-block d-lg-none">
                                            <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn pl-0">
                                                <i class="pe-7s-menu"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-header header-sticky" data-bg-color="#bac34e">
                <div class="container">
                    <div class="main-header_nav position-relative">
                        <div class="row align-items-center">
                            <div class="col-lg-12 d-none d-lg-block">
                                <div class="main-menu">
                                    <nav class="main-nav">
                                        <ul>
                                            <li class="drop-holder">
                                                <a href="<?php echo base_url();?>">Home
                                                </a>
                                               
                                            </li>
                                            <li class="megamenu-holder">
                                                <a href="https://daydone.com.ng/">Shop
                                                </a>
                                            </li>
                                            
                                            <li>
                                                <a href="https://daydone.com.ng/products">Our Products</a>
                                            </li>
                                            <li>
                                                <a href="https://daydone.com.ng/faqs">FAQs</a>
                                            </li>
                                            <li>
                                                <a href="https://daydone.com.ng/contact">Contact</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-menu_wrapper" id="mobileMenu">
                <div class="harmic-offcanvas-body">
                    <div class="inner-body">
                        <div class="harmic-offcanvas-top">
                            <a href="#" class="button-close"><i class="pe-7s-close"></i></a>
                        </div>
                        <div class="offcanvas-user-info text-center px-6 pb-5">
                            
                            <ul class="dropdown-wrap justify-content-center text-silver">
                               
                               
                               
                               
                            </ul>
                        </div>
                        <div class="offcanvas-menu_area">
                            <nav class="offcanvas-navigation">
                                <ul class="mobile-menu">
                                    <li class="menu-item-has-children">
                                        <a href="<?php echo base_url()?>"><span class="mm-text">Home</span> </a>
                                    </li>
                                    <li>
                                        <a href="https://daydone.com.ng/">
                                            <span class="mm-text">Shop</span>
                                        </a>
                                    </li>
                                   
                                    <li>
                                        <a href="https://daydone.com.ng/products">
                                            <span class="mm-text">Products</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="https://daydone.com.ng/faqs">
                                            <span class="mm-text">FAQs</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="https://daydone.com.ng/contact">
                                            <span class="mm-text">Contact</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offcanvas-search_wrapper" id="searchBar">
                <div class="harmic-offcanvas-body">
                    <div class="container h-100">
                        <div class="offcanvas-search">
                            <div class="harmic-offcanvas-top">
                                <a href="#" class="button-close"><i class="pe-7s-close"></i></a>
                            </div>
                            <span class="searchbox-info">Start typing and press Enter to search</span>
                            <form action="<?php echo base_url("result");?>" method="GET" class="hm-searchbox">
                                <input type="text" name="search" placeholder="Search">
                                <button class="search-btn" type="submit"><i class="pe-7s-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offcanvas-minicart_wrapper" id="miniCart">
                <div class="harmic-offcanvas-body">
                    <div class="minicart-content">
                        <div class="minicart-heading">
                            <h4 class="mb-0">Shopping Cart</h4>
                            <a href="#" class="button-close"><i class="pe-7s-close"></i></a>
                        </div>
                        <ul class="minicart-list">
                            <li class="minicart-product">
                                <a class="product-item_remove" href="#"><i
                                    class="pe-7s-close"></i></a>
                                <a href="shop.html" class="product-item_img">
                                    <img class="img-full" src="assets/images/product/small-size/1-1-112x124.jpg" alt="Product Image">
                                </a>
                                <div class="product-item_content">
                                    <a class="product-item_title" href="shop.html">Black Pepper Grains</a>
                                    <span class="product-item_quantity">1 x $80.00</span>
                                </div>
                            </li>
                            <li class="minicart-product">
                                <a class="product-item_remove" href="#"><i
                                    class="pe-7s-close"></i></a>
                                <a href="shop.html" class="product-item_img">
                                    <img class="img-full" src="assets/images/product/small-size/1-2-112x124.jpg" alt="Product Image">
                                </a>
                                <div class="product-item_content">
                                    <a class="product-item_title" href="shop.html">Peanut Big Bean</a>
                                    <span class="product-item_quantity">1 x $80.00</span>
                                </div>
                            </li>
                            <li class="minicart-product">
                                <a class="product-item_remove" href="#">
                                    <i class="pe-7s-close"></i>
                                </a>
                                <a href="shop.html" class="product-item_img">
                                    <img class="img-full" src="assets/images/product/small-size/1-3-112x124.jpg" alt="Product Image">
                                </a>
                                <div class="product-item_content">
                                    <a class="product-item_title" href="shop.html">Dried Lemon Green</a>
                                    <span class="product-item_quantity">1 x $80.00</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="minicart-item_total">
                        <span>Subtotal</span>
                        <span class="ammount">$240.00</span>
                    </div>
                    <div class="group-btn_wrap d-grid gap-2">
                        <a href="cart.html" class="btn btn-secondary btn-primary-hover">View Cart</a>
                        <a href="checkout.html" class="btn btn-secondary btn-primary-hover">Checkout</a>
                    </div>
                </div>
            </div>
            <div class="global-overlay"></div>
        </header>
        <!-- Main Header Area End Here -->
