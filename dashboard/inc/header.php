<?php
include "script.php";

if (!isset($_SESSION['is_logged_in']) && !isset($_SESSION['super_admin_id'])) {
    header("Location: signin.php");
} else {
    $admin_id = $_SESSION['super_admin_id'];
    $query_admin_name = mysqli_query($cxn, "SELECT super_user_name FROM super_admin WHERE super_id='$admin_id'");
    $count_admin_name = mysqli_num_rows($query_admin_name);
    if ($count_admin_name > 0) {
        $fetch_admin_name = mysqli_fetch_assoc($query_admin_name);
        $admin_name = $fetch_admin_name['super_user_name'];
    }
}
?>

<!DOCTYPE html>
<html>

<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DayDone Dashboard</title>
    <link rel="shortcut icon" type="image/png" href="assets/ico/favicon-32.png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!--datatable-->
    <link rel="stylesheet" href="assets/dist/css/dataTables.bootstrap4.min.css">
    <!-- summernote cdn -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote-bs4.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/dist/css/summernote-bs4.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="assets/bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="assets/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
        img {
            max-width: 100%;
            display: block;
            height: auto;
            margin: auto;
        }
    </style>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="index.php" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>DD</b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>DayDone</b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li>
                            <a href="msg.php">
                                <i class="fa fa-envelope-o"></i>
                                <span class="label label-success"><?php echo $msgcount; ?></span>
                            </a>
                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>