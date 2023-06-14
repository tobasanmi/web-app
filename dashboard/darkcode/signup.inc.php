<?php
session_start();  
if (isset($_POST['submit'])) {
    
    include_once 'dbh.php';

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);


    if (empty($username) || empty($email) || empty($password)) {
        header("Location: ../signup.php? please no empty fields allowed");
        exit();
    }
       else {
           //checking if characters are valid
           if (!preg_match("/^[a-z A-Z]*$/", $username )) {
            header("Location: ../signup.php?invalid Characters Username");
            exit();
            }
		        else{
                    //check if sellers exist
                     $sql = "SELECT * FROM super_admin WHERE email='$email'"; 
                     $result = mysqli_query($conn, $sql);
                     $resultcheck =mysqli_num_rows($result);
                     if ($resultcheck > 0) {
                      header("Location: ../signup.php?email has already been used");
                      exit();
			        }
  
					else {
                  		   //hashing password
					   $hashedpwd = password_hash($password, PASSWORD_DEFAULT);
					   // insert the user into the  database
                       $sql ="INSERT INTO super_admin (super_user_name, email, super_pwd) VALUES ('$username',  '$email', '$hashedpwd')";
                                mysqli_query($conn, $sql);


                                $sql ="SELECT * FROM super_admin WHERE email ='$email'";
                                $result = mysqli_query($conn, $sql); 
                                $row = mysqli_fetch_assoc($result);
                                $check = mysqli_num_rows($result);
                                
                                if ($check < 1) {
                                 header("location: ../login.php?auto log failed");
                                 exit();
                                 }
                                 else {
                                     $_SESSION['super_id'] = $row['super_id'];
									 $_SESSION['username'] = $row['super_user_name,'];
                                     header("Location: ../index.php");
                                     exit();
                                     
                                 }      
                   }
                }
             
          }
        }
else {
    header("Location: ../signup.php");
    exit();
}