<?php 


        include_once('../config/dbh.php');
        
	if($_POST['email']!=="" && $_POST['phone']!=="" && $_POST['p_name']!==""){
	    	$email = mysqli_real_escape_string($conn, $_POST['email']);
		$phone = mysqli_real_escape_string($conn, $_POST['phone']);
		$p_name = mysqli_real_escape_string($conn, $_POST['p_name']);
		$region = mysqli_real_escape_string($conn, $_POST['region']);
	 	$state = "new";
	 	$time = (Date('y/m/d H:i:s'));
	   	
    
        
		
		$sql ="INSERT INTO wishlist (phone, product_name, region, email, state, timestamp) VALUES ('$phone', '$p_name', '$region', '$email', '$state', '$time');";
		mysqli_query($conn, $sql);


          echo "<script>alert('Success, your suggestion has been sent and recorded pls do not RESEND...'); window.location='/'</script>";
	}

?>