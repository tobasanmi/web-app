<?php
 session_start();

 $url= $_SERVER['REQUEST_URI'];
 
  if (($msg = strpos($url, "?")) !==FALSE ){
     $msgg = substr($url,$msg+1);
      $message = str_replace(array('%20'), ' ', $msgg);
                
  }else {
     $message = "";
  }

$page_title = "Register";
include "inc/header.php";
?>


<!--banner-->
<div class="banner-top">
	<div class="container">
		<h3>Register</h3>
		<h4><a href="./">Home</a><label>/</label>Register</h4>
		<div class="clearfix"> </div>
	</div>
</div>

<div class="login">
    <div><p style="text-align:center; color:orangered; font-size:18px; padding-bottom:20px"><?php echo  $message; ?></p></p></div>
	<div class="main-agileits">
		<div class="form-w3agile form1">
			<h3>Register</h3>
			    <p style="text-align:center">If you already have an account kindly click here <a href="login" style="font-weight:bold; color:orangered">Login</a></p>
			    <br>
			<form action="darkcode/register" method="post">
				
				<div class="input-group input-group-lg">
                  <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
                  <input type="text"  name="firstname" class="form-control" placeholder="Firstname" aria-describedby="sizing-addon1">
                </div>
                
                <div class="input-group input-group-lg">
                  <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
                  <input type="text"  name="lastname"  class="form-control" placeholder="Lastname" aria-describedby="sizing-addon1">
                </div>
                
                
                <div class="input-group input-group-lg">
                  <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                  <input type="email"  name="email" class="form-control" placeholder="Email" aria-describedby="sizing-addon1">
                </div>
                
                
                <div class="input-group input-group-lg">
                  <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-phone" aria-hidden="true"></i></span>
                  <input type="tel:"  name="phone" class="form-control" placeholder="Phone" aria-describedby="sizing-addon1">
                </div>
                
                
                <div class="input-group input-group-lg">
                  <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                  <input type="text"  name="address" class="form-control" placeholder="Address" aria-describedby="sizing-addon1">
                </div>
                
                
                <div class="input-group input-group-lg">
                  <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-lock" aria-hidden="true"></i></span>
                  <input type="password"  name="password" class="form-control" placeholder="Password" aria-describedby="sizing-addon1">
                </div>
                
        
				<input type="submit" name="submit" value="Signup" style="border-radius:5px;">
			</form>
		</div>

	</div>
</div>
</div>

<?php
include "inc/footer.php";
?>