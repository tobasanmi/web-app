<?php

session_start();

if (isset($_POST['submit'])) {
    
    include_once 'db.php';

    $email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	if (empty($email) || empty($password)) {
		header("location: ../login?Please fill all fields carefully");
		exit();
	}
	else {
		$sql ="SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql); 
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			header("location: ../login?Wrong email or password");
			exit();
		}
		else {
			if ($row = mysqli_fetch_assoc($result)) {
				  $hashedPwdCheck = password_verify($password, $row['password']);
				  
				  
				if ($hashedPwdCheck) {
						$_SESSION['user_id'] = $row['user_id'];
					    header("Location: ../account");
					    exit();
				 }
				 else{
				     
				     header("location: ../login?Wrong email or password");
					exit();
				 }
				}
					
					 
				}
			}
		}


	
else {
	header("location: ../login");
	exit();
}