<?php
ob_start();
session_start();

define("DBHOST", "localhost");
define("DBUSER", "daydonec_max");
define("DBPASS", "qYDaBWX*vzhk");
define("DBNAME", "daydonec_main");

$conn = $cxn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

        		/// IP address code starts /////
/*function getRealUserIp(){
    switch(true){
      case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
      case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
      case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
      default : return $_SERVER['REMOTE_ADDR'];
    }
 }*/
/// IP address code Ends /////