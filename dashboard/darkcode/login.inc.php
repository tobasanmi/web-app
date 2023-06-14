<?php

session_start();

if (isset($_POST['submit'])) {
    
    include_once 'dbh.php';

    $email = mysqli_real_escape_string($conn, $_POST['email']);
	$pwd = mysqli_real_escape_string($conn, $_POST['password']);

	if (empty($email) || empty($pwd)) {
		header("location: ../login.php?Please fill all feilds carefully");
		exit();
	}
	else {
		$sql ="SELECT * FROM super_admin WHERE email='$email'";
		$result = mysqli_query($conn, $sql); 
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			header("location: ../signin.php?Wrong Credentials");
			exit();
		}
		else {
			if ($row = mysqli_fetch_assoc($result)) {
				$hashedPwdCheck = password_verify($pwd, $row['super_pwd']);
				 if ($hashedPwdCheck == false) {
					header("location: ../signin.php?Wrong Credentials");
					exit();
				 }
				 elseif ($hashedPwdCheck == true) {
					 //loging user
					 $_SESSION['super_id'] = $row['super_id'];
					 $_SESSION['username'] = $row['super_user_name'];
						header("location: ../index.php");
						exit();
					}
					//else {
					//	header("location: ../index.php");
					//	exit();
					}
					
					 
				}
			}
		}


	
else {
	header("location: ../signin.php");
	exit();
}