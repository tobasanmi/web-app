<?php
include "inc/headerl.php";

if (isset($_GET['prod'])) {
    $product_id = $_GET['prod'];
    $query_product_details = "SELECT * FROM products WHERE product_id='$product_id'";
    $result_query_product_details = mysqli_query($cxn, $query_product_details);
    $fetch_product_details = mysqli_fetch_assoc($result_query_product_details);
} else {
    header("Location: ./");
}
?>
<!-- Carousel
    ================================================== -->
<div class="item">
            <img src="assets/images/slide/garri.png" alt="Cheap christmas broiler" usemap="#orderOne">
        </div>

</div><!-- /.carousel -->
<!--banner-->
<div class="banner-top">
    <div class="container">
        <h3>Top Notch Garri</h3>
        <h4><a href="garri?prod=111">Home</a><label>/</label>Garri Supply</h4>
        <div class="clearfix"> </div>
    </div>
    <div class="cart">

                        <span class="fa fa-shopping-cart my-cart-icon"><span class="badge badge-notify my-cart-badge"></span></span>
                    </div>
</div>

<div class="single">
    <div class="container">
        <div class="single-top-main">
            <div class="col-md-5 single-top">
                <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSckEmpcvHIDHSy6RyQ23B_lDontFIA4UL9Ywzq_BgvJCPb2PA/viewform?embedded=true" width="640" height="1294" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
                            </div>
                            </div>
                            </div>
<!---->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Agric ecommerce",
  "name": "DAYDONE LLC",
  "image": "https://facebook.com/daydoneng/shop",
  "@id": "https://www.daydone.com.ng",
  "url": "https://www.daydone.com.ng",
  "telephone": "+2348174993336",
  "priceRange": "5,000 - 20,000",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "No 9, Agbowo Str, University of Ibadan",
    "addressLocality": "Ibadan",
    "postalCode": "200284",
    "addressCountry": "NG"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": 7.442153999999999,
    "longitude": 3.910765399999999
  },
  "openingHoursSpecification": {
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": [
      "Monday",
      "Tuesday",
      "Wednesday",
      "Thursday",
      "Friday",
      "Saturday",
      "Sunday"
    ],
    "opens": "00:00",
    "closes": "23:59"
  },
  "sameAs": [
    "https://www.facebook.com/daydoneng",
    "https://www.instagram.com/daydoneng",
    "https://www.youtube.com/channel/UCfJEvqg-8fPCY-RupTo8NOA/",
    "https://www.linkedin.com/company/daydone",
    "https://www.daydone.com.ng"
  ]
}
</script>
<!--footer-->
<div class="footer">
        <div class="container">
            <div class="col-md-4 footer-grid">
                <h3>About Us</h3>
                <p>We are committed to making a difference with customer satifaction, quality products and early delivery.</p>
            </div>
            <div class="col-md-4 footer-grid ">
                <h3>Menu</h3>
                <ul>
                    <li><a href="./">Home</a></li>
                    <li><a href="products">All Products</a></li>
                </ul>
            </div>
            <div class="col-md-4 footer-grid ">
                <h3>Customer Services</h3>
                <ul>
                    <li><a href="terms#return_refund">Return & Refund Policy</a></li>
                    <li><a href="shipping">Shipping Policy</a></li>
                </ul>
            </div>
                <div class=" address">
                    <div class="col-md-4 fo-grid1">
                        <p><i class="fa fa-home" aria-hidden="true"></i>9, Ojokondo, Agbowo UI, Ibadan, Nigeria.</p>
                    </div>

                    <div class="col-md-4 fo-grid1">
                        <p><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:+2348174993335">+234 817 499 3335</a> , <a href="tel:08174993336">+234 817 499 3336</a></p>
                    </div>
                    <div class="col-md-4 fo-grid1">
                        <p><a href="mailto:info@daydone.com.ng"><i class="fa fa-envelope-o" aria-hidden="true"></i>info@daydone.com.ng</a></p>
                    </div>

                </div>
            <div class="copy-right">
                <p> &copy; <script>
                        document.write(new Date().getFullYear());

                    </script> DayDone LLC. All Rights Reserved</p>
            </div>
            </div>
        </div>
    <!-- //footer-->

<!-- floating cart button -->
<div class="cart" style="position: fixed; right: 5px; bottom: 65px; z-index: 995; background-color: #039445; width:65px; height:65px; border-radius: 50%; padding:5px">
        <i class="fa fa-shopping-cart fa-2x my-cart-icon" style="margin: 10px auto auto 9px; position:relative"><span class="badge badge-notify my-cart-badge font-bold"></span></i>
</div>
<!-- floating cart button -->

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
                $().UItoTop({
                        easingType: 'easeOutQuart'
                });
        });
</script>
<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //smooth scrolling -->
<!-- for bootstrap working -->
<script src="assets/js/bootstrap.js"></script>
<script type="text/javascript" src="assets/js/intro.min.js"></script>
<!-- //for bootstrap working -->
<script type='text/javascript' src="assets/js/jquery.mycart.js"></script>
<script src="assets/js/easyResponsiveTabs.js" type="text/javascript"></script>
<script src="assets/rateit/jquery.rateit.min.js"></script>
<script src="assets/js/main.js"></script>
<script type="text/javascript">
        $(function() {

                var goToCartIcon = function($addTocartBtn) {
                        var $cartIcon = $(".my-cart-icon");
                        var $image = $('<img width="30px" height="30px" src="' + $addTocartBtn.data("image") + '"/>').css({
                                "position": "fixed",
                                "z-index": "999"
                        });
                        $addTocartBtn.prepend($image);
                        var position = $cartIcon.position();
                        $image.animate({
                                top: position.top,
                                left: position.left
                        }, 500, "linear", function() {
                                $image.remove();
                        });
                }

                $('.my-cart-btn').myCart({
                        classCartIcon: 'my-cart-icon',
                        classCartBadge: 'my-cart-badge',
                        affixCartIcon: true,
                        checkoutCart: function(products) {
                                $.each(products, function() {
                                        console.log(this);
                                });
                        },
                        clickOnAddToCart: function($addTocart) {
                                goToCartIcon($addTocart);
                        },
                        getDiscountPrice: function(products) {
                                var total = 0;
                                $.each(products, function() {
                                        total += this.quantity * this.price;
                                });
                                return total * 1;
                        }
                });

$('.my-cart-b').click(function() {
                        $(this).text("Added to Cart").prop("disabled", true);
                })

                var data = localStorage.getItem("total");
                if (data == 0) {
                        $('.checkoutBtn').prop('disabled', true);
                }
                var order_x = localStorage.getItem("products");
                document.getElementById("totalamount").innerHTML = data;
                document.getElementById("form_amount").innerHTML = '<br><input type="text" name="amount" value="' + data + '" style="display:none">';
                document.getElementById("form_order").innerHTML = "<br><input type='text' name='order' value='" + order_x + "' style='display:none'>";

                function pod() {
                        document.getElementById("payOD").innerHTML = ' <p style="text-align: justify;">Pay at the collection of your produce <br/>             Note;<br>             1. Produces can be inspected but must not be altered.<br>             2. Only DayDone packaging material can be unsealed.<br>             3. Once altered or cut, the item can only be returned if it is damaged, defective or has missing parts.<br>             4. Please have the exact amount for your order, as our Delivery Agents do not handle petty cash.<br>';
                }

                function podclear() {
                        document.getElementById("payOD").innerHTML = '';
                }


        });

        function logmail() {
                var user_mail = document.getElementById("mail").value;
                // alert(user_mail);
                localStorage.setItem("user_mail", user_mail);
        }
</script>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Corporation",
    "name": "DayDone",
    "alternateName": "Agric ecommerce",
    "url": "https://www.daydone.com.ng",
    "logo": "https://daydone.com.ng/assets/images/logo/daydone-logo.png",
    "sameAs": [
        "https://www.facebook.com/daydoneng",
        "https://www.instagram.com/daydoneng",
        "https://www.youtube.com/channel/UCfJEvqg-8fPCY-RupTo8NOA/",
        "https://www.linkedin.com/company/daydone",
        "https://www.daydone.com.ng"
    ]
}
</script>
</body>

</html>