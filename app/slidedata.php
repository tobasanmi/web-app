<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Max-Age: 2');    // cache for 1 day
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

                $img1 = "'https://www.daydone.com.ng/app/img/ban.jpg'";
                $img2 = "'https://www.daydone.com.ng/app/img/img1.jpg'";
                $img3 = "'https://www.daydone.com.ng/app/img/ban3.png'";
                $data = '<div class="single-hero-slide" style="background-image: url('.$img1.')"> <div class="slide-content h-100 d-flex align-items-center"> <div class="container text-left"> <h4 class="text-white mb-0 fs-20"></h4> <p class="text-white mb-3"></p> <a class="btn btn-outline-light btn-sm rounded-pill" href="single-product.html">Order Now</a> </div> </div> </div><div class="single-hero-slide" style="background-image: url('. $img2.')"> <div class="slide-content h-100 d-flex align-items-center"> <div class="container text-left"> <h4 class="text-white mb-0 fs-20"></h4> <p class="text-white mb-3"></p></div> </div> </div><div class="single-hero-slide" style="background-image: url('. $img3.')"> <div class="slide-content h-100 d-flex align-items-center"> <div class="container text-left"> <h4 class="text-black mb-0 fs-20">Fresh Products</h4> <p class="text-black mb-3">As low as ₦100</p> <a class="btn btn-outline-dark btn-sm rounded-pill" href="info.html?<b>hello world from the web</b>">Learn More</a> </div> </div> </div>';
                 echo json_encode($data);
              