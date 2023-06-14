<?php

         include 'workers/db.php';
         include 'sendgrid/send_mail.php';

      /**
      * to add SENDGRID_API_KEY go to : sendgrig/config.php
      * to add Mecellenous functions go to : workers/
      *  
      */ 
               $to   = 'besttomiever@gmail.com';                  // the email your sending the email to
               $from = 'hello@corperslodge.com';                  // the email that the recipient sees as 'From' 
               $sender_name = 'Hello jack';                       // the sender's name
               $subject = 'Hello';                                // subject of the email
               $message  = 'Testing this';                        // the message to be sent
               $file_path ='no file';                             // include the file path if there is a file to be sent, else leave it with 'no flie'
               
               sendgrid_mailer($to, $from, $sender_name ,$subject, $message, $file_path);

         exit();
 




    
            
            