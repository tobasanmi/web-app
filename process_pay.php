<?php 
    include 'config/dbh.php';

    if(isset($_POST['order_id']) && $_POST['cust_email'] != ''){
        
        $amount = mysqli_real_escape_string($conn, $_POST['amount']);
        $email = mysqli_real_escape_string($conn, $_POST['cust_email']);
        $phoneno = mysqli_real_escape_string($conn, $_POST['phoneno']); 
        $order = $_POST['order']; 
        $order_id = mysqli_real_escape_string($conn, $_POST['order_id']); 
        $paymthd = 'card';         
        $PostTime = (Date('y/m/d H:i:s'));            
		
		$arr = json_decode($order); 
		$timedd = time(); 
		//get each product orders 
		foreach($arr as $i => $prd){
			//echo $i_value
			//echo $prd->id; 
			$prdid = $prd->id; 
			$prdname = $prd->name;
			$prd_sumr = $prd->summary;
			$prdprice = $prd->price;
			$prdqnty = $prd->quantity;
			$prdimg = $prd->image;
			$seller_id = $prd->sll;

			//log trabsactions 
			$logtrans = mysqli_query($cxn, "insert into trans set productid = '$prdid', orderid = '$order_id', productname = '$prdname', sellerid = '$seller_id', amount = '$prdprice', buyeremail = '$email', payment_method = '$paymthd', order_date = '$timedd', status = '0', quantity = '$prdqnty'");
		}

            $logpayment = mysqli_query($conn, "INSERT INTO sales (order_id, order_details, amount, phone, email, paymthd, status, timestamp) VALUES ('$order_id', '$order', '$amount', '$phoneno', '$email', '$paymthd', 'droped', '$PostTime')");
            
            if($logpayment){
                echo 'success';
            }else{
                echo '<div class="alert alert-danger text-white">Error occured: please check your network and try again</div>';
            }               
    }  

//update afters payment

 if(isset($_POST['refid'])){
        //update the payment
        $transref = mysqli_real_escape_string($conn, $_POST['refid']);
        $transmail = mysqli_real_escape_string($conn, $_POST['mail']); 
	 	
	 	//get the products
	 	$getprd = mysqli_query($conn, "select order_details from sales where order_id = '$transref' and email = '$transmail'");
	 		if(mysqli_num_rows($getprd) > 0){
				$gg = mysqli_fetch_assoc($getprd);
				$ordersarray = $gg['order_details'];
				$order_id = $gg['order_id'];
				
				$array = json_decode($ordersarray); 				
				foreach($array as $i => $prd){
					$prdid = $prd->id; 										
					$prdprice = $prd->price;
					$prdqnty = $prd->quantity;
					$sellerid = $prd->sll;

					//log stocks 
					$logtrans = mysqli_query($cxn, "update products set qnty_sold = qnty_sold + '$prdqnty' where product_id = '$prdid' and seller_id = '$sellerid'");
				}
			}
	 	
        
        $updt = mysqli_query($conn, "update sales set status = 'placed' where order_id = '$transref' and email = '$transmail'");             
        $updt2 = mysqli_query($conn, "update trans set status = 1 where orderid = '$transref' and buyeremail = '$transmail'");                
        if($updt){                                                            
            echo 'placed';
        }else{
            echo '<div class="alert alert-danger text-white">Error occured: please contact (08174993336)</div>';
        }
 }

?>