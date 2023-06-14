<?php  

include "inc/headers.php";
include 'config/dbh.php'; 
    
    /*                            
  $url= $_SERVER['REQUEST_URI']; 
  if (($msg = strpos($url, "?")) !==FALSE ){
		$msgg = substr($url,$msg+1);
		$message = str_replace(array('%20'), ' ', $msgg);                
   }else {
			header("Location: ./");
   } */
	//$sql = mysqli_query($conn, "UPDATE sales SET status ='placed' WHERE order_id = $message");
	
	
	
	                            
          $url= $_SERVER['REQUEST_URI']; 
          if (($msg = strpos($url, "?")) !==FALSE ){
        		$msgg = substr($url,$msg+1);
        		$message = str_replace(array('%20'), ' ', $msgg);                
           }else {
        			header("Location: ./");
           }
           $sql = mysqli_query($conn, "UPDATE sales SET status ='placed' WHERE order_id = $message");
        	
	
	
	
	
         include 'sendgrid/workers/db.php';
         include 'sendgrid/sendgrid/send_mail.php';

      /**
      * to add SENDGRID_API_KEY go to : sendgrig/config.php
      * to add Mecellenous functions go to : workers/
      *  
      */ 
               $to   = 'bestskyever@gmail.com';                  // the email your sending the email to
               $from = 'hello@corperslodge.com';                  // the email that the recipient sees as 'From' 
               $sender_name = 'DayDone.ng';                       // the sender's name
               $subject = 'New Order On Daydone';                 // subject of the email
               $message  = 'New Order Has been Placed';           // the message to be sent
               $file_path ='';                                    // include the file path if there is a file to be sent, else leave it with 'no flie'
               
               sendgrid_mailer($to, $from, $sender_name ,$subject, $message, $file_path);


?>

<!--login-->
          <div class="login">
         		<div class="main-agileits">
         				<div class="form-w3agile form1">
         	<h3>SUCCESS!!!</h3>
         	<hr class="soft"/>
         
         <div class="span4">
         		<div class="span9">
         			<div class="well">
         			<h5><strong>YOUR ORDER HAS BEEN PLACED</strong></h5><br/>
         			   <span style="font-size:13px">Delivery time:max 2days</span><br><br>
         			   <span style="font-size:13px">Your payment on delivery order as been placed 
         			   <br>Note there will be <a style="color:blue" href=shipping>shipping fee,</a> you will be contacted shortly by our customer representative</span>
         			   <span id="form_amount"></span>
         			   <span id="form_order"></span>
					  
                       </div>
         		</div>
         		
         		
         	
         		</div>
         
         </div>
         </div>
         </div>
        <?php
include "inc/footers.php";
?>