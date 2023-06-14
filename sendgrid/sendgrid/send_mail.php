<?php

declare(strict_types=1);
require_once 'config.php';
require 'vendor/autoload.php';

use \SendGrid\Mail\Mail;

     function sendgrid_mailer($to, $from, $sender_name, $subject, $message, $file_path){
         
                $email = new Mail();
                $email->setFrom($from, $sender_name);
                $email->setSubject($subject);
                $email->addTo( $to );
                $email->addContent('text/html', $message);
                $sendgrid = new \SendGrid(SENDGRID_API_KEY);
                
                
                try {
                    $response = $sendgrid->send($email);
                     //header("Location: ../success");
                     echo 'success';
                 } catch (Exception $e) {
                     //header("Location: ../lost");
                     echo 'failed';
                }   
         
     }

