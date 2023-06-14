<?php
$page_title = "Subscribe";
include "inc/header.php";
?>

<!--banner-->
<div class="banner-top">
	<div class="container">
		<h3>Subscribe</h3>
		<h4><a href="./">Home</a><label>/</label>Subscribe</h4>
		<div class="clearfix"> </div>
	</div>
</div>

<div class="login">
	<div class="main-agileits">
		<div class="form-w3agile form1">
			<h3>Subscribe</h3>
			    <p>Subscribe to our platform to get more information price updates and vital tips about our products. Also be the first to know when we add a product discount.</p>
			    <br>
			<form action="" method="post">
				<div class="key">
					<i class="fa fa-user" aria-hidden="true"></i>
					<input type="text" value="Full Name" name="name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'name';}" required="">
					<div class="clearfix"></div>
				</div>
				<div class="key">
					<i class="fa fa-envelope" aria-hidden="true"></i>
					<input type="text" value="Email" name="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'email';}" required="">
					<div class="clearfix"></div>
				</div>
						<div class="key">
							<i class="fa fa-phone" aria-hidden="true"></i>
							<input  type="text"value= "Phone Number" placeholder="Phone" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" type="number" min="7009999999" max="9999999999" name="phone" required>
							<div class="clearfix"></div>
						</div>
				<input type="submit" name="submit_user_details" value="Submit">
			</form>
		</div>

	</div>
</div>

<?php
include "inc/footer.php";
?>