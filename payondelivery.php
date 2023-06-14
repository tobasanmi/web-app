<?php
include "inc/header.php";
if (isset($_GET['pd'])) {
    $order_id = $_GET['pd'];
    $sql = mysqli_query($cxn, "update sales set status ='placed' WHERE order_id = '$order_id'");    
    //empty cart
    echo '<script>
             localStorage.removeItem("products");
             localStorage.removeItem("total");
           </script>';
} else {
    //header("Location: ./"); 
}


             include 'sendgrid/workers/db.php';
             include 'sendgrid/sendgrid/send_mail.php';

              /**
              * to add SENDGRID_API_KEY go to : sendgrig/config.php
              * to add Mecellenous functions go to : workers/
              *  
              */ 
              
               $to   = 'adedayo@daydone.com.ng';                  // the email your sending the email to
               $from = 'hello@corperslodge.com';                  // the email that the recipient sees as 'From' 
               $sender_name = 'DayDone.ng';                       // the sender's name
               $subject = 'New Order On Daydone';                 // subject of the email
               $message  = 'New Order Has been Placed';           // the message to be sent
               $file_path ='';                                    // include the file path if there is a file to be sent, else leave it with 'no flie'
               
               sendgrid_mailer($to, $from, $sender_name ,$subject, $message, $file_path);

?>


<!--banner-->
<div class="banner-top">
    <div class="container">
        <h3>Pay on Delivery</h3>
        <h4><a href="./">Home</a><label>/</label>Pay on Delivery</h4>
        <div class="clearfix"> </div>
    </div>
</div>

<div class="login">
    <div class="main-agileits">
        <div class="form-w3agile form1">
			<img src="assets/images/succescheck.png" alt="" style="height: 80px;"> 
            <h3 class="" style="margin-bottom: 0px;">SUCCESS!!!</h3>
            <hr class="soft" />

            <div class="span4">
                <div class="span9">
                    <div class="well">
                        <h5><strong>YOUR ORDER HAS BEEN PLACED</strong></h5><br />
                        <span style="font-size:13px">Delivery Time: Max 2days</span><br><br>
                        <span style="font-size:13px"><p>One of our sales representative will contact you shortly.</p> <br>Note; <p>- there will be shipping fee,</p> <p>- and your invoice price can change after <b>6hrs without payment.</b></p> Thanks</span>
                        <span id="form_amount"></span>
                        <span id="form_order"></span>

                    </div>
					<p class="text-center"><a href="index" style="text-decoration:none;"><i class="fa fa-arrow-left"></i> Go Back Home</a></p>
                </div>



            </div>

        </div>
    </div>
</div>

<?php
include "inc/footer.php";
?>