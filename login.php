
<?php
 session_start();

 $url= $_SERVER['REQUEST_URI'];
 
  if (($msg = strpos($url, "?")) !==FALSE ){
     $msgg = substr($url,$msg+1);
      $message = str_replace(array('%20'), ' ', $msgg);
                
  }else {
     $message = "";
  }

$page_title = "Login";
include "inc/header.php";
?>



<!--banner-->
<div class="banner-top">
	<div class="container">
		<h3>Login</h3>
		<h4><a href="./">Home</a><label>/</label>Login</h4>
		<div class="clearfix"> </div>
	</div>
</div>

<div class="login">
        <div><p style="text-align:center; color:orangered; font-size:18px; padding-bottom:20px"><?php echo  $message; ?></p></p></div>
	<div class="main-agileits">
		<div class="form-w3agile form1">
			<h3>Login</h3>
			    <p style="text-align:center">Kindly Login with your email and password or register here <a href="register" style="font-weight:bold; color:orangered">Register</a></p>
			    <br>
			<form action="darkcode/login" method="post">
				
				<div class="input-group input-group-lg">
                  <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                  <input type="email"  name="email" class="form-control" placeholder="Email" aria-describedby="sizing-addon1" required>
                </div>
				
				 <div class="input-group input-group-lg">
                  <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-lock" aria-hidden="true"></i></span>
                  <input type="password"  name="password" class="form-control" placeholder="Password" aria-describedby="sizing-addon1" required>
                </div>
                
				<input type="submit" name="submit" value="Login">
			</form>
		</div>

	</div>
</div>



<?php
include "inc/footer.php";
?>