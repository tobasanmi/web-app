<?php 
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: access");
        header("Access-Control-Allow-Methods: POST");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");  header("Access-Control-Allow-Origin: *");
           
           
                        $json = file_get_contents('php://input');
                        $json_decode = json_decode($json, true); 
                        $url_path = "https://ui.daydone.com.ng/wp-json/wc/v3/orders?consumer_key=ck_8cbce8f119ac3517bf804dc0f364aaba5c0b1fcd&consumer_secret=cs_2f7df3b2308a7a39c7c1b768915f22784ab49ecf";
                          
                            // Data is an array of key value pairs
                            // to be reflected on the site
                                            
                       
                                                       $items_list = array();
                                                       $a = 1;        
                                                            do {
                                                                $b=array("product_id"=>$json_decode[$a]['product_id'],"quantity"=>$json_decode[$a]['product_qty']);
                                                                array_push($items_list, $b);
                                                                $a++;
                                                            } while ($a <= (count((array)$json_decode))-1);
                                                        
                                                        
                      // echo json_encode($items_list);
                      
                      
                                            $data = [
                                                    'payment_method' => 'bacs',
                                                    'payment_method_title' => 'Direct Bank Transfer',
                                                    'set_paid' => false,
                                                    'billing' => [
                                                        'first_name' => $json_decode[0]['firstname'],
                                                        'last_name' => $json_decode[0]['lastname'],
                                                        'address_1' => $json_decode[0]['address'],
                                                        'address_2' => '',
                                                        'city' => 'Ibadan',
                                                        'state' => 'Oyo',
                                                        'postcode' => '200131',
                                                        'country' => 'NG',
                                                        'email' => 'john.doe@example.com',
                                                        'phone' => $json_decode[0]['phone'],
                                                    ],
                                                    'shipping' => [
                                                      'first_name' => $json_decode[0]['firstname'],
                                                        'last_name' => $json_decode[0]['lastname'],
                                                        'address_1' => $json_decode[0]['address'],
                                                        'address_2' => '',
                                                        'city' => 'Ibadan',
                                                        'state' => 'Oyo',
                                                        'postcode' => '200131',
                                                        'country' => 'NG',
                                                    ],
                                                    'line_items' => $items_list,
                                                    
                                                    'shipping_lines' => [
                                                        [
                                                            'method_id' => 'flat_rate',
                                                            'method_title' => 'Flat Rate',
                                                            'total' => ''
                                                        ]
                                                    ]
                                                ];


                        $options = array(
                            'http' => array(
                            'method' => 'POST',
                            'header'  => 'Content-Type: application/x-www-form-urlencoded',
                            'content' => http_build_query($data))
                        );
                          
                        // Create a context stream with
                        // the specified options
                        $stream = stream_context_create($options);
                          
                        // The data is stored in the 
                        // result variable
                        $result = file_get_contents(
                                $url_path, false, $stream);
                          
                        echo $result;
