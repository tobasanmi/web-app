<?php
session_start();  

    include_once '../dbh.php';

    $amount = mysqli_real_escape_string($conn, $_POST['amount']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']); 
    $order = mysqli_real_escape_string($conn, $_POST['order']); 
    $paymthd = mysqli_real_escape_string($conn, $_POST['paymthd']); 
	$PostTime = (Date('y/m/d H:i:s'));
		$order_id =(mt_rand(100, 999)) * (time());
	
        $sql ="INSERT INTO sales (order_id, order_details, amount, phone, email, paymthd, status, timestamp) VALUES ('$order_id', '$order',  '$amount', '$phone', '$email', '$paymthd', 'droped', '$PostTime')";
        mysqli_query($conn, $sql);	       				 
								
		if($paymthd =="card"){
		   header("Location:../pay.php?".$order_id."");	
		}
		elseif($paymthd =="p.o.d"){
		 header("Location:../successpod.php?".$order_id."");	
		}
		else{
		  echo "nothing!!";		
		}
  
        exit();
?>