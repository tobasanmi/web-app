<?php
session_start();  
  
    include_once '../dbh.php';

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);


    if (empty($username) || empty($email) || empty($password)) {
        header("Location: ../register.php? please no empty fields allowed");
        exit();
    }
       else {
           //checking if characters are valid
           if (!preg_match("/^[a-z A-Z]*$/", $username )) {
            header("Location: ../register.php?invalid Characters Username");
            exit();
            }
		        else{
                    //check if sellers exist
                     $sql = "SELECT * FROM user WHERE user_email='$email'"; 
                     $result = mysqli_query($conn, $sql);
                     $resultcheck =mysqli_num_rows($result);
                     if ($resultcheck > 0) {
                      header("Location: ../register.php?email has already been used");
                      exit();
			        }
  
					else {
                  		   //hashing password
					   $hashedpwd = password_hash($password, PASSWORD_DEFAULT);
					   // insert the user into the  database
                       $sql ="INSERT INTO user (user_name, user_email, user_phone, user_pwd, address) VALUES ('$username',  '$email', '$phone', '$hashedpwd', '$address')";
                                mysqli_query($conn, $sql);
                               
                                 header("location: ../sign_success.php?Success");
                                 exit();
                                                                   
                                 }      
                   }
                }
             
