<?php 

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

                  $id= $_GET['id'];

                  $url = "https://ui.daydone.com.ng/wp-json/wc/v3/orders/".$id."?consumer_key=ck_8cbce8f119ac3517bf804dc0f364aaba5c0b1fcd&consumer_secret=cs_2f7df3b2308a7a39c7c1b768915f22784ab49ecf";
                  $data =file_get_contents($url);
                  
                  echo $data;
?>
