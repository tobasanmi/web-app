<?php
session_start();

if(!isset( $_SESSION['user_id'] )){
    $email ="";
    $phone ="";
}
else{
       include_once 'darkcode/db.php';
     $user_id = $_SESSION['user_id'];
     $sql_user = "SELECT * FROM users WHERE user_id = '$user_id'";
     $result_user = mysqli_query($conn,$sql_user);
     $row = mysqli_fetch_assoc($result_user);
     
     $email = $row['email'];
     $phone = $row['phone'];
}

include "script.php";
    //paystack keys
    $paystackpubkey = 'pk_live_ff5e98cb88367c69707c8871304048b04fb7fd0d';
    $paystackprikey = 'sk_live_ace608ddb777ae7a56f563662a496ba474bd1ba5'; 
    //$paystackpubkey = 'pk_test_075f3518e92b62bb165a2480cb3a2149066d1513';
    //$paystackprikey = 'sk_test_1f3c8526e4c19dec0ca043e28ae8839fa00002ab';

?>
<!DOCTYPE html>
<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta name="description" content="DayDone your Agric Ecommerce Platform, making a difference in getting Farms to your fingertip and doorstep">
    <link rel="shortcut icon" href="assets/images/logo/favicon.ico">
    <link rel="author" href="humans.txt" />
    <title> <?php echo isset($page_title) ? "DayDone | Agric Ecommerce for Farm Produce |Checkout " . $page_title : "DayDone | No 1 Agric Ecommerce Platform| Checkout Page" ?></title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:title" content="DayDone - Agric Ecommerce Platform" />
    <meta property="og:description" content="Getting Farms to your fingertip and your doorstep" />
    <meta property="og:url" content="www.daydone.com.ng"/>
    <meta property="og:image" content="https://daydone.com.ng/assets/images/logo/cont.png" />

    <meta name="keywords" content="DayDone, DayDone Limited, Online Farm Produce in Nigeria,Nigeria Online Agric Mall, Farm/Agric produces in Nigeria, Direct Farm Produce, Farm eCommerce, eCommerce for Agric produce, Number one agric mall in Nigeria, Number one food produces online shopping mall, ecommerce website, ecommerce website in nigeria, Agric Produce Shop Point, Farm eCommerce, Agricultural Produce in Nigeria, Food Items Online, Agriculture, ecommerce, cheap agric products, Best agric ecommerce platform, Best agric ecommerce platform in Nigeria, Farm Mall" />
    <meta name="author" content="DayDone LLC" />
    <meta name="twitter:card" content="DayDone Ltd" />
    <meta name="twitter:titles" content="Agric ecommerce Platform" />
    <meta name="twitter:description" content="Getting Farms to your fingertip and your doorstep" />
    <meta name="twitter:image" content="https://daydone.com.ng/assets/images/logo/cont.png" />
    <meta name="twitter:url" content="https://www.daydone.com.ng" />
    <link rel="apple-touch-icon" href="assets/images/logo/favicon.ico" />
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }

    </script>

    <!-- //for-mobile-apps -->
    <link href="assets/css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" type="text/css" href="assets/css/introjs.min.css">
    <!-- Custom Theme files -->
    <link href="assets/css/style.css" rel='stylesheet' type='text/css' />
    <!-- js -->
    <script src="assets/js/jquery-1.11.1.min.js"></script>
    <!-- //js -->
    <!-- start-smoth-scrolling -->
    <script type="text/javascript" src="assets/js/move-top.js"></script>
    <script type="text/javascript" src="assets/js/easing.js"></script>
    <script type="text/javascript">
        localStorage.setItem('total', discountPrice)
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });

    </script>

    <!-- start-smoth-scrolling -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>
    <!--- start-rate---->
    <script src="js/jstarbox.js"></script>
    <link rel="stylesheet" href="css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />
    <script type="text/javascript">
        jQuery(function() {
            jQuery('.starbox').each(function() {
                var starbox = jQuery(this);
                starbox.starbox({
                    average: starbox.attr('data-start-value'),
                    changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
                    ghosting: starbox.hasClass('ghosting'),
                    autoUpdateAverage: starbox.hasClass('autoupdate'),
                    buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
                    stars: starbox.attr('data-star-count') || 5
                }).bind('starbox-value-changed', function(event, value) {
                    if (starbox.hasClass('random')) {
                        var val = Math.random();
                        starbox.next().text(' ' + val);
                        return val;
                    }
                })
            });
        });

    </script>
    <!---//End-rate---->

    <style>
        @media (max-width: 1440px){
        .main-agileits {
            width: 50%;
            margin-top: 22px;
            margin-bottom: 25px;
            }
        }
        @media (max-width: 575px){
            .main-agileits {
            width: 90%;
            margin-top: 22px;
            margin-bottom: 25px;
            }
        }
    </style>
    
    
    <script src="https://my.hellobar.com/ecc1f8c86073c692a87f7afd7e5b9c94d088082c.js" type="text/javascript" charset="utf-8" async="async"> </script>

    <!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1255120414823664');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1255120414823664&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->

<!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-157523165-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-157523165-1');
    </script>
    <script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/8a71f2626a6c8da7e505b28df/871babce7d48a4f342334387f.js");</script>

<!-- Hotjar Tracking Code for https://www.daydone.com.ng/checkout -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:2752993,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>
</head>

<body>
    <div class="header">
        <div class="container">

            <div class="logo">
                <h1><a href="index"><img src="assets/images/logo/daydone-logo.png" alt="Daydone logo"><span>THE BEST AGRIC ECOMMERCE PLATFORM</span></a></h1>
            </div>
            <div class="head-t">
                <ul class="card">
                    
                </ul>
            </div>

            <div class="header-ri">
                <ul class="social-top">
                      </ul>
                <!-- Load icon library -->
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


            </div>
        </div>
        <!---->

        <!--banner-->
        <div class="banner-top">
            <div class="container">
                <h3>Checkout</h3>
                <h4><a href="/">Home</a><label>/</label><a href="products">Products</a><label>/</label>Checkout</h4>
                <div class="clearfix"> </div>
            </div>
        </div>
        <!--login-->

        <div class="container main-agileits">
            <div class="card text-center form-w3agile form1">
                <div class="card-header">
                    <h3>Checkout</h3>					
                </div>
                <div class="card-body">					
                    <div class="span9">
                        <div class="well">
                            <h5><strong>TOTAL AMOUNT TO BE PAID</strong></h5><br />
                            <span>₦ <span id="totalamount" style="color:black; font-size: 25px;"></span></span>
                        </div>
                    </div>

                    <div><h5><strong>CHOOSE PAYMENT METHOD</strong></h5><br></div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="well">
                                <input type="hidden" name="paymthd" value="p.o.d">
                                <h5>Pay On Delivery</h5> <br><br>
                                <p>Kindly choose this to make payment when your goods have been delivered to you.</p>
                                <br>
                                <button class="btn btn-success" id="deliverymethod"><i class="fa fa-handshake-o"></i> Choose</button>
                            </div>
                        </div>
                        
                    <!--payment with card-->
                    <div id="openCardPay" style="display:none;">
                        <h4>Pay With Card</h4>
                        <form action="" method="POST" onsubmit="return payStack()">
                        <div class="span4">
                            <!-- <span id="form_amount" name="amount"></span> -->
                            <!-- <span id="form_order" name="order"></span> -->
                            <div class="span4">
                                <div class="span9">
                                    <div class="well">
                                        <th><strong>CUSTOMER INFO</strong></th>
                                        <br><br>
                                        <div class="form-group">
                                            <label class="control-label" for="phone" style="color:gray; padding-right:3px">Phone</label>
                                            <input id="cardcus-phone" value="<?php echo  $phone; ?>" class="form-control" placeholder="Phone No" type="number" min="7009999999" max="9999999999" name="phone" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="email" style="color:gray; padding-right:3px">Email</label>
                                            <input id="cardcus-email" value="<?php echo  $email; ?>" class="form-control" placeholder="Email" type="email" name="email" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Pay Now</button>
                            </div>
                            <div id="showerror"></div>
                            <div id="showStatus"></div>
                        </div><br><br>
                    </form>
                    </div>

                <!--pay on delivery-->
                    <div id="openDeliveryPay" style="display:none;">
                        <form method="post" action="script">
                        <h4>Pay On Delivery</h4>
                            <div class="span4">
                            <span id="form_amount" name="amount"></span>
                            <span id="form_order" name="order"></span>
                            <div class="span4">
                                <div class="span9">
                                    <div class="well">
                                        <th><strong>CUSTOMER INFO</strong></th>
                                        <br><br>
                                        <div class="form-group">
                                            <label class="control-label" for="phone" style="color:gray; padding-right:3px">Phone</label>
                                            <input id="cus-phone" value="<?php echo  $phone; ?>" class="form-control" placeholder="Phone No" type="number" min="7009999999" max="9999999999" name="phone" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="email" style="color:gray; padding-right:3px">Email</label>
                                            <input id="cus-email" value="<?php echo  $email; ?>" class="form-control" placeholder="Email" type="email" name="email" required>
                                        </div>
                                        <input type="hidden" name="paymthd" value="p.o.d">
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="form-group">
                             <button type="submit" class="btn btn-success btn-block" onclick="logmail()" name="checkout">Check Out</button>
                            </div>
                        </form>
                    </div>
                        <div class="col-md-6">
                            <div class="well">
                                <!-- <input type="radio" name="paymthd" value="p.o.d"> -->
                                <h5>Pay With Card - (<span class="text-danger">Recommended</span>)</h5> <br><br>
                                <p>Kindly choose this to make payment now with your card. Payment is fast, convenient secure with your Mastercard, Visa and Verve Cards</p><br>
                                <button class="btn btn-primary" id="cardmethod"><i class="fa fa-credit-card"></i> Choose</button>
                            </div>
                        </div>
                    </div>

                           <!-- <div class="">
                                <br>
                                <h5><strong>PAYMENT METHODS</strong></h5><br>
                            </div>
                            <div class="well">
                                <input type="hidden" name="paymthd" value="p.o.d">
                                <b>Pay On Delivery</b><br><br>
                                <p>Kindly click on the "Check Out" button to make payment when your goods have been delivered to you.</p>
                            </div>-->
                           <!-- <div class="row">
                                <div class="col-md-6">
                                 <button type="button" class="btn btn-success btn-block" onclick="logmail()" name="checkout">Check Out</button>
                                </div>
                                <div class="col-md-6">
                                <button type="submit" class="btn btn-primary btn-block">Pay Now</button>
                                </div>
                            </div>-->


                   <!-- <form action="" method="POST">
                        <div class="span9">
                            <input type="hidden" class="cardEmail" id="cardEmail" name="cuscard_email" value="">
                            <input type="hidden" class="cardAmount" id="cardAmount" name="cuscard_amount" value="">
                            <div id="showerror"></div>
                            <div id="showStatus"></div>
                            <div class="well">
                                 <input type="radio" name="paymthd" value="p.o.d">
                                <b>Pay With Card</b><br><br>
                                <p>Kindly click the "Paystack Payment" button below to pay with your card. Payment is secured with your Mastercard, Visa and Verve Cards</p>
                            </div>
                        </div>
                        <?php
                       /* $cuscard_email = $_POST['cuscard_email'];
                    $cuscard_amount = $_POST['cuscard_amount'];
                    $ref = rand(0, 675);
                    echo "<script src='https://js.paystack.co/v1/inline.js' data-key='pk_live_ff5e98cb88367c69707c8871304048b04fb7fd0d' data-email='.$cuscard_email.' data-amount='.$cuscard_amount.' data-ref='".$ref."'>
                </script>";*/

                ?>
                    </form>-->
                </div>
            </div>
        </div>
    </div>
     </body>

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
                        <p><i class="fa fa-map-marker" aria-hidden="true"></i>2 Atiba Layout, UI, Ibadan, Nigeria</p>
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
    <i class="fa fa-shopping-cart fa-2x my-cart-icon" style="color: #fff; position:relative"></i>
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
			//console.log(order_x);
            document.getElementById("totalamount").innerHTML = data;
            document.getElementById("form_amount").innerHTML = '<br><input type="text" name="amount" value="' + data + '" style="display:none">';
            document.getElementById("form_order").innerHTML = "<br><input type='text' name='order' value='" + order_x + "' style='display:none'>";

            function pod() {
                document.getElementById("payOD").innerHTML = ' <p style="text-align: justify;">Pay at the collection of your produce <br/>             Note;<br>             1. Produces can be inspected but must not be altered.<br>             2. Only DayDone packaging material can be unsealed.<br>             3. Once altered or cut, the item can only be returned if it is damaged, defective or has missing parts.<br>             4. Please have the exact amount for your order, as our Delivery Agents do not handle petty cash.<br>';
            }

            function podclear() {
                document.getElementById("payOD").innerHTML = '';
            }


            //script for paystack payment
            // let customerEmail = $('#cus-email').val();
            //         let orderAmount = localStorage.getItem("total");
            //         let randomRefKey = Math.floor(Math.random(40) * 100000000000007709000);

            $('#cus-email').keyup(function(e) {
                e.preventDefault();
                let customerEmail = $(this).val();
                let customerCardMail = $('.cardEmail').val(customerEmail);

                let orderAmount = localStorage.getItem("total");
                let customerCardAmount = $('.cardAmount').val(orderAmount);

            })


        });

        function logmail() {
            var user_mail = document.getElementById("mail").value;
            // alert(user_mail);
            localStorage.setItem("user_mail", user_mail);
        }

    </script>



    <!--================================================JIDE SCRiPT==========================================-->
    <script>

        //toggle paymenr method
        document.getElementById('cardmethod').addEventListener('click', function(){
            //open card form
            var cardit = document.getElementById('openCardPay').style.display = 'block';
            var cardit = document.getElementById('openDeliveryPay').style.display = 'none';
        })

        document.getElementById('deliverymethod').addEventListener('click', function(){
            //open delivery form
            var cardit = document.getElementById('openDeliveryPay').style.display = 'block';
            var cardit = document.getElementById('openCardPay').style.display = 'none';
        })


        /*paystack charge*/
        function addpaystackfee(amt) {
            var newamt = '';
            if (amt < 2500) {
                //$fee = 1.5 * $amt / 100;
                //$newamt = $amt + $fee;
                newamt = (amt) / (1 - 0.015);
            } else {
                //$fee = 1.5 * $amt / 100;
                //$newamt = $amt + $fee + 100;
                var amtx = parseInt(amt) + parseInt(100);
                var amty = 1 - 0.015;
                newamt = amtx / amty;
            }
            return newamt;
        }


        function payStack() {
            var order_x = localStorage.getItem("products");
            var data = localStorage.getItem("total");
            //submit to DB
            var cust_email = document.getElementById('cardcus-email').value;
            var phoneno = document.getElementById('cardcus-phone').value;
            var amount = data;
            var order = order_x;
            var payvalue = addpaystackfee(amount);
            var pay = payvalue;
            var topay = pay.toFixed(2);

            var order_id = '<?php echo $order_id = (mt_rand(100, 999)) * (time());?>';
            if (cust_email == '' || phoneno == '') {
                document.getElementById('showerror').innerHTML = '<div class="alert alert-danger bg-danger text-white text-center"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>Error: All fields must be specified. Check your info and the cart details.</div>';
            } else {
                $.ajax({
                    url: 'process_pay',
                    method: 'POST',
                    data: {
                        cust_email: cust_email,
                        phoneno: phoneno,
                        amount: amount,
                        order_id: order_id,
                        order: order
                    },
                    cache: false,
                    beforeSend: function() {
                        document.getElementById("showStatus").innerHTML = '<p class="text-success font-weight-bold"><i class="fa fa-spinner fa-spin"></i>processing...</p>';
                    },
                    success: function(response) {
                        if (response == 'success') {

                            //process paystack
                            var res = cust_email.split("@");
                            var lname = res[0];
                            //var fname = res[1];
                            var phone = phoneno;
                            var tamount = topay * 100;
                            var pubkey = '<?php echo $paystackpubkey ?>';
                            //return false;
                            var handler = PaystackPop.setup({
                                key: pubkey,
                                email: cust_email,
                                amount: tamount,
                                currency: "NGN",
                                //ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                                ref: order_id,
                                firstname: lname,
                                // label: "Optional string that replaces customer email"
                                metadata: {
                                    custom_fields: [{
                                        display_name: "Mobile Number",
                                        variable_name: "mobile_number",
                                        value: "+234" + phoneno
                                    }]
                                },
                                callback: function(response) {
                                    //alert('success. transaction ref is ' + response.reference +'emil'+cust_email+'ref'+order_id);
                                    //update status and redirect to success page
                                    successCallback(order_id, cust_email);
                                    //window.location = '/success?ref=' + refid;
                                },
                                onClose: function() {
                                    alert('window closed');
                                }
                            });
                            handler.openIframe();

                        } else {
                            console.log(response);
                        }
                    }
                });
            }
            return false;
        }

        function successCallback(ref, mail) {
            $.ajax({
                url: 'process_pay',
                method: 'POST',
                data: {
                    refid: ref,
                    mail: mail
                },
                success: function(response) {
                    console.log(response);
                    if (response == 'placed') {
                        //clear cart
                        clearCart()
                        window.location.href = 'successcard?reff=' + ref;
                    } else {
                        alert('contact the support');
                    }
                }
            });
        }

        //clear cart
        function clearCart() {
          localStorage.removeItem("products");
          localStorage.removeItem("total");
        }

    </script>
</html>