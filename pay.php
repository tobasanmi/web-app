<?php
include "inc/header.php";
if (isset($_GET['pp'])) {
    $order_id = $_GET['pp'];
} else {
    header("Location: ./");
}
?>
<!--banner-->
<div class="banner-top">
    <div class="container">
        <h3>Make Payment</h3>
        <h4><a href="./">Home</a><label>/</label>Payment</h4>
        <div class="clearfix"> </div>
    </div>
</div>
<div class="container">
    <div class="paystackEmbed">
        <style>
.paystack_embed {
           height: 450px !important;
}
.paystackEmbed {
            height: 450px !important;
}
.paystack-embed-container {
            height: 450px !important;
}
</style>
 <div class="paystackEmbed">
       

<script src="https://js.paystack.co/v1/inline.js"></script>
<div id="paystackEmbed" class="paystack_embed" style="height:100% !important;"></div>

<script>
  var amt = localStorage.getItem("total"); 
  var amtk = amt * 100;
  var mail = localStorage.getItem("user_mail");
  PaystackPop.setup({
   key: 'pk_live_ff5e98cb88367c69707c8871304048b04fb7fd0d',
   email: mail,
   amount: amtk,
   container: 'paystackEmbed',
   callback: function(response){
        alert('successfully subscribed. transaction ref is ' + response.reference);
        
        window.location.replace("successcard.php?<?php echo $message?>");
    },
	
  });
 
</script>
<li>PLEASE BE PATIENT PAYSTACK IS LOADING, IT IS RECOMMEND FOR MOBILE PHONE USER TO USE CHROME OR FIREFOX BROWSER</li>

			</div>
         <!-- smooth scrolling -->
             <script type="text/javascript">
                 $(document).ready(function() {
                 /*
                     var defaults = {
                     containerID: 'toTop', // fading element id
                     containerHoverID: 'toTopHover', // fading element hover id
                     scrollSpeed: 1200,
                     easingType: 'linear'
                     };
                 */
                 $().UItoTop({ easingType: 'easeOutQuart' }); 
                 });
             </script>
    </div>
</div>
<?php
include "inc/footer.php";
?>