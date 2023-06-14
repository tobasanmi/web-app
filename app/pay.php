<?php

        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: access");
        header("Access-Control-Allow-Methods: POST");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");  header("Access-Control-Allow-Origin: *");
           
           
           
           
                     $json = file_get_contents('php://input');
                     $json_decode = json_decode($json, false); 
                     
                     $url = "https://api.paystack.co/transaction/initialize";
                     $fields = [
                        'email' => $json_decode->email,
                        'amount' =>  $json_decode->total_price
                     ];
                     
                     
                     $fields_string = http_build_query($fields);
                      //open connection
                      $ch = curl_init();
                      
                      //set the url, number of POST vars, POST data
                      curl_setopt($ch,CURLOPT_URL, $url);
                      curl_setopt($ch,CURLOPT_POST, true);
                      curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
                      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                        "Authorization: Bearer sk_test_1f3c8526e4c19dec0ca043e28ae8839fa00002ab",
                        "Cache-Control: no-cache",
                      ));
                      
                      //So that curl_exec returns the contents of the cURL; rather than echoing it
                      curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
                      
                      //execute post
                      $result = curl_exec($ch);
                      echo $result;
            ?>