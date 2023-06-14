<?php
include "../script.php";
include "checkuser.php";

?>


<!DOCTYPE html>
<html lang="en" class="loading">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <title>DayDone Farmers Page</title>
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
  <link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote-bs4.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets/dist/css/summernote-bs4.min.css">
	
	<style>
		.app-sidebar .navigation li.has-sub > a:after{display: none;}
		.card .card-body {padding: 20px;height: auto;}		
		#display_pic img{height: 140px;}
		.alert-danger {border-color: #FF4961 !important;background-color: #FF6D80 !important;color: #fff;}
		.app-sidebar .logo-img img, .off-canvas-sidebar .logo-img img { height: 40px; width: unset;}
		.avatar {display: inline-block;position: relative; width: unset; white-space: nowrap; border-radius: 1000px; vertical-align: bottom;}
	</style>
</head>

<body data-col="2-columns" class=" 2-columns ">  
  <div class="wrapper">
	  <?php
	  	include 'sidebar.php';
	  	include 'inc/navbar.php';
	  ?>    