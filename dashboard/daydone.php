<?php
 session_start();


 $url= $_SERVER['REQUEST_URI'];
 
  if (($msg = strpos($url, "?")) !==FALSE ){
     $msgg = substr($url,$msg+1);
      $message = str_replace(array('%20'), ' ', $msgg);
                
  }else {
     $message = "";
  }



?>

<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>DayDone</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini" style="width:100%">
      <header class="main-header" style="background-color:#3C8DBC; height:50px; width:100%; position: fixed; top:0px; color:#fff">
	  <center><h4>DayDone</h4></center>
	  </header>
        <div class="container" style="width:100%; margin-top:100px">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><center><b style="color:#808080">Sign In </b><br><br><span style="color:orangered; font-size:15px"><?php echo $message; ?></span></center></h3>
                        </div>
                       <div class="panel-body">
                            <form role="form" action="darkcode/signup.inc.php" method="POST">
                            <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                             </div>
                            <div class="form-group">
                                <input onkeyup="phonecount()" class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                            </div>
							<center><span id="msgcount" style="color:orangered; font-size:11px"></span></center>
                            <div class="form-group">
                                <input onkeyup="passcount()" id="password" class="form-control" placeholder="Password" name="password" type="password" value="">
                            </div>
							<center><span id="msg" style="color:orangered; font-size:11px"></span></center>
							<div class="form-group">
                                <input onkeyup="passverify()" id="confirmpassword" class="form-control" placeholder="Confirm Password" name="password" type="password" value="">
                            </div>
                            <!--<div class="form-group">
                                <input class="form-control" placeholder="Re-enter Password" name="password" type="password" value="">
                            </div>
                            
                             Change this to a button or input when using this as a form -->
                            <button id="submitbtn" type="submit" name="submit" class="btn  btn-primary btn-block">Sign Up</button>
                            <!--<br/><p style="font-size:10px"><b>Please note that by clicking 'sign-up', you have accepted DayDone terms and conditions</p>-->
                                
                         </fieldset>
                            </form>
                        </div>
                     </div>
                    <center><span style="color:dimgray; font-size:10px">if you already have an account <b><a href="signin.php" style="font-size:11px"> CLICK HERE</a></b> <br>to SignIn</span></center>
                </div>
            </div>
        </div>
		<br>
		<br>
		<div class="clearfix"></div>
		<footer class="main-header" style="background-color:#D3D3D3; height:30px; width:100%; position: fixed; bottom:0px; color:#737373; font-size:10px; padding-top:10px">
	  <center><span>Copyright &copy; 2020 DayDone All rights reserved</span></center>
	  </footer>

       <!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
