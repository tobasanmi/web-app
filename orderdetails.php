<?php
        include "script.php";

        if(!isset($_SESSION['super_admin_id']))
        {
            header("Location: signin.php");
        }
		
		 include_once 'time.php';
		   $sql = "SELECT * FROM msg WHERE state ='new' ";
		   $result = mysqli_query($cxn,$sql);
		  $msgcounter = mysqli_num_rows($result);
		  
  		 if ($msgcounter == 0) {
			 $msgcount= "";
		 }
		 else {
			 $msgcount= $msgcounter;
		 }
		 
		 
		 
		  $url= $_SERVER['REQUEST_URI'];
 
          if (($msg = strpos($url, "?")) !==FALSE ){
          $msgg = substr($url,$msg+1);
          $message = str_replace(array('%20'), ' ', $msgg);
                
           }else {
          $message = "";
            }
			
			
			
			$sql = "SELECT * FROM sales WHERE id =$message";
		   $result = mysqli_query($cxn,$sql);
		   $row = mysqli_fetch_assoc($result);
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
  <!-- css_4xky -->
   <link rel="stylesheet" href="css/css_4xky.css">
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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>
  table#t01 tr:nth-child(even) {
  background-color: whitesmoke;
  color:dimgray;
}
table#t01 tr:nth-child(odd) {
  background-color: #fff;
  color:dimgray;
}

table#t01 td {
	font-size:11px;
   padding:5px;
}

  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="order" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Shop</b></span>
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
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
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
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
     <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"></li>
		<li><a href="add_product"><i class="fa fa-cart-plus text-green"></i> <span>Add New Product</span></a></li>
         <a href="pages/calendar.html">
          </a>
        </li>
       <li><a href="#"><i class="fa fa-sign-out text-yellow"></i> <span>Sign Out</span></a></li>
		<!---
		<li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
		-->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><i class="fa fa-cart-plus "></i> Order Details</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
       <div class="col-md-6 col-md-offset-3">
                <div class="login-panel panel panel-default">
                        <div class="panel-heading" style="background-color:#B1C4FF">
                            <h3 class="panel-title" style="font-size:12px; color:#ffffff;"><center><b>Order Details</b></center></h3>
                        </div>
                        <div class="panel-body">
                  <ul class="todo-list">
		          <?php    
				       echo"<li>
							<a  style='color:dimgray'><span class='text'><span style='padding-right:30px; color:gray; font-weight:normal'>Order ID:</span>".$row['order_id']."</span></a>
							</li>
							<li>
							<a  style='color:dimgray'><span class='text'><span style='padding-right:33px; color:gray; font-weight:normal'>Amount:</span> ".$row['amount']."</span></a>
							</li>
							<li>
							<a  style='color:dimgray'><span class='text'><span style='padding-right:7px; color:gray; font-weight:normal'>Pay Method:</span>   ".$row['paymthd']."</span></a>
							</li>
							<li>
							<a  style='color:dimgray'><span class='text'><span style='padding-right:50px; color:gray; font-weight:normal'>Email:</span>".$row['email']."</span></a>
							</li>
							<li>
							<a  style='color:dimgray;'><span class='text'><span style='padding-right:20px; color:gray; font-weight:normal'>Phone No:</span>".$row['phone']."</span></a>
							</li>
							<li>
							<a  style='color:dimgray;'><span class='text'><span style='padding-right:50px; color:gray; font-weight:normal'>Time:</span> ".time_ago($row['timestamp'])."</span></a>
							</li>
							";	
		            ?>
			      </ul>
				                <br>
								
								<?php
								
								echo'
										<table style="width:100%" id="t01">
                                        <tr>
                                        <th></th>
                                        <th>Product</th>
                                        <th style="padding-right:10px">Quantity</th>
                                        <th>Amount</th>
                                        </tr>
										
										';
								    $array =  $row['order_details'];
									
									$arrayx = json_decode($array);
									
									$sum = 0;
									
                                     foreach ($arrayx as $value) {
										
									    $sum += $value->price * $value->quantity;
										echo  "<tr>
										
										<td><a href='product?".$value->id."'><img src='../".$value->image."' style='float:left; height:25px'/></a></td>
										<td><a href='product?".$value->id."' style='color:dimgray'>". $value->name ."</a></td>
										<td>". $value->quantity ."</td>
										<td>". $value->price ."</td>
										
										</tr>";
										 
										
									}
									
									echo '
									
									<tr >
                                        <th></th>
                                        <th style="padding: 10px 0px 10px 0px">GRAND TOTAL</th>
                                        <th></th>
                                        <th style="padding: 10px 0px 10px 0px">'.$sum.'</th>
                                        </tr>
									
									</table>';
										 
                                ?>
								
                             </div>
							 
                     </div>
					         
					             <div> 
		 <a href="darkcode/dropped?<?php echo $row['id']; ?>"> <button type="button" class="btn btn-sm pull-left" style="background-color:lightgray;color:#fff; padding:5px"> Product dropped</button></a>
		 
		 <a href="darkcode/delivered?<?php echo $row['id']; ?>"> <button type="button" class="btn btn-sm pull-right" style="background-color:green;color:#fff; padding:5px"> Product has been delivered</button></a>
         </div>
        
      </div>
      <!-- /.row -->
      <!-- Main row -->

      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
 </footer>

  <!-- Control Sidebar -->
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>

<script>
       function pricereflector(){
	     value = document.getElementById("pricevalue").value;
		 document.getElementById("price_reflector").innerHTML= value;
	   }



                      if (window.FileReader) {
                      function handleFileSelect(evt) { 
                      var files = evt.target.files;
                      var f = files[0];
                      var reader = new FileReader();
                          reader.onload = (function(theFile) { 
                      return function(e) { 
				
                         document.getElementById('display_pic').innerHTML = ['<img src="', e.target.result,'" title="', theFile.name, '" />'].join('');
                         document.getElementById('display_pic').style.borderColor="transparent"; 
                         document.getElementById('display_pic').style.width="auto"; 
				      }; })(f);
                         reader.readAsDataURL(f);
                      }	
                      }
                     else{	
                         alert('This browser does not support FileReader');
                      }
                      document.getElementById('displaypic').addEventListener('change', handleFileSelect, false);
					  
					  
					  
					  
					  

					  
					  
					  
					  
				  
 </script>


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
