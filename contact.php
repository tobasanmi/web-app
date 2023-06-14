<?php
								if (isset($_POST['submit_message'])) {
	                                $name = $_POST['name'];
	                                $email = $_POST['email'];
	                            	$recipient = "info@daydone.com.ng";
		                            $subject = "Contact Us";
		                            $message = $_POST['message'];
	                            	$headers = "MIME-Version: 1.0" . "\r\n";
	                               	$headers .= "Content-Type:text/html;charset=UTF-8" . "\r\n";
		// Additional headers
		$headers .= "From: " . $name . "<" . $email . ">" . "\r\n";
		if (mail($recipient, $subject, $message, $headers)) {
			// response message 
			echo "<script>alert('Thank You for reaching out. Your message has been received and We will get back to you shortly!'); window.location='/contact.php'</script>";
		}
    }
$page_title = "Contact Us";
include "inc/headerco.php";
?>

<!--banner-->
<div class="banner-top">
	<div class="container">
		<h3>Contact</h3>
		<h4><a href="./">Home</a><label>/</label>Contact</h4>
		<div class="clearfix"> </div>
	</div>
</div>

<!-- contact -->
<div class="contact">
	<div class="container">
		<div class="spec ">
			<h3>Contact</h3>
			<div class="ser-t">
				<b></b>
				<span><i></i></span>
				<b class="line"></b>
			</div>
		</div>
		<div class=" contact-w3">
			<div class="col-md-5 contact-right">
				<img src="assets/images/logo/cont.png" class="img-responsive" alt="DayDone Logo">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.1187241903986!2d3.90156571431976!3d7.452115513739589!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1039edfef754dfc1%3A0x382250feb37ab660!2sDayDone!5e0!3m2!1sen!2sng!4v1647261413847!5m2!1sen!2sng" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
			</div>
			<div class="col-md-7 contact-left">
				<h4>Contact Information</h4>
				<p> DayDone Limited is the Number 1 (one) ecommerce platform for agicultural and farm produce. We help empower farmers and supply using technology in distribution of their produce, we are committed to making a difference with customer satisfaction, quality produce and early delivery</p>
				<ul class="contact-list">
					<li> <i class="fa fa-map-marker" aria-hidden="true"></i> 9 Agbowo str, UI, Ibadan.</li>
					<li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:info@daydone.com.ng">info@daydone.com.ng</a></li>
					<li> <i class="fa fa-phone" aria-hidden="true"></i>+234 817 499 3335</li>
				</ul>
				<div id="container">
					<!--Horizontal Tab-->
					<div id="parentHorizontalTab">
						<ul class="resp-tabs-list hor_1">
							<li><i class="fa fa-envelope" aria-hidden="true"></i></li>
							<li> <i class="fa fa-map-marker" aria-hidden="true"></i> </span></li>
							<li> <i class="fa fa-phone" aria-hidden="true"></i></li>
						</ul>
						<div class="resp-tabs-container hor_1">
							<div>
							<form action="" method="POST">
									<input type="text" value="Name" name="name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
									<input type="email" value="Email" name="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
									<textarea name="message" value="Message..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required></textarea>
									<div class="col text-center">
										<input type="submit" value="Submit" name="submit_message">
									</div>
								</form>
							</div>
							<div>
								<div class="map-grid text-center">
									<div class="col">
										<h5>Our Office</h5>
										<ul>
											<li><i class="fa fa-arrow-right" aria-hidden="true"></i>9 Agbowo, UI, Ibadan, Nigeria</li>
										</ul>
									</div><br>
									<div class="col mt-3">
										<h5>Website</h5>
										<ul>
											<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="https://www.daydone.com.ng">daydone.com.ng</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div>
								<div class="map-grid text-center">
									<div class="col">
										<h5>Contact Us Through</h5>
										<ul>
											<li><a href="tel:+2348174993335">+234-817-499-3335</a></li>
											<li><a href="tel:08174993336">0817-499-3336</a></li>
										</ul>
									</div><br>
									<div class="col mt-3">
										<h5>Email Us</h5>
										<ul>
											<li><a href="mailto:info@daydone.com.ng">info@daydone.com.ng</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!--Plug-in Initialisation-->
				<script type="text/javascript">
					$(document).ready(function() {
						//Horizontal Tab
						$('#parentHorizontalTab').easyResponsiveTabs({
							type: 'default', //Types: default, vertical, accordion
							width: 'auto', //auto or any width like 600px
							fit: true, // 100% fit in a container
							tabidentify: 'hor_1', // The tab groups identifier
							activate: function(event) { // Callback function if tab is switched
								var $tab = $(this);
								var $info = $('#nested-tabInfo');
								var $name = $('span', $info);
								$name.text($tab.text());
								$info.show();
							}
						});

						// Child Tab
						$('#ChildVerticalTab_1').easyResponsiveTabs({
							type: 'vertical',
							width: 'auto',
							fit: true,
							tabidentify: 'ver_1', // The tab groups identifier
							activetab_bg: '#fff', // background color for active tabs in this group
							inactive_bg: '#F5F5F5', // background color for inactive tabs in this group
							active_border_color: '#c1c1c1', // border color for active tabs heads in this group
							active_content_border_color: '#5AB1D0' // border color for active tabs contect in this group so that it matches the tab head border
						});

						//Vertical Tab
						$('#parentVerticalTab').easyResponsiveTabs({
							type: 'vertical', //Types: default, vertical, accordion
							width: 'auto', //auto or any width like 600px
							fit: true, // 100% fit in a container
							closed: 'accordion', // Start closed if in accordion view
							tabidentify: 'hor_1', // The tab groups identifier
							activate: function(event) { // Callback function if tab is switched
								var $tab = $(this);
								var $info = $('#nested-tabInfo2');
								var $name = $('span', $info);
								$name.text($tab.text());
								$info.show();
							}
						});
					});
				</script>

			</div>

			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- //contact -->

<?php
include "inc/footer.php";
?>
<!-- tabs -->
<script type="text/javascript">
	$(document).ready(function() {
		$('#horizontalTab').easyResponsiveTabs({
			type: 'default', //Types: default, vertical, accordion
			width: 'auto', //auto or any width like 600px
			fit: true // 100% fit in a container
		});
	});
</script>
<!-- //tabs -->