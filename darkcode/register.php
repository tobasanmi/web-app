<?php
session_start();  
   include_once 'db.php';
if (isset($_POST['submit'])) {

    include_once 'db.php';
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

        
        
    if (empty($firstname) || empty($lastname) || empty($email) || empty($phone) || empty($address) || empty($password)) {
        header("Location: ../register? please no empty fields allowed");
        exit();
    }
    
      else{
                    //check if user exist
                     $sql = "SELECT * FROM users WHERE email='$email'"; 
                     $result = mysqli_query($conn, $sql); 
                     $resultcheck =mysqli_num_rows($result);
                     if ($resultcheck > 0) {
                      header("Location: ../register?Email has already been used");
                      exit();
			        }
  
					else {
                  		   //hashing password
					   $hashedpwd = password_hash($password, PASSWORD_DEFAULT);
					   // insert the user into the  database
					    $sql ="INSERT INTO users (firstname, lastname, email, phone, address, password) VALUES ('$firstname', '$lastname', '$email', '$phone', '$address', '$hashedpwd')";
                     //  $sql ="INSERT INTO users (firstname, lastname, email, phone, address, password) VALUES (('$firstname', '$lastname', '$email', '$phone', '$address', '$hashedpwd')";
                                mysqli_query($conn, $sql);


                                $sql_login ="SELECT * FROM users WHERE email ='$email'";
                                $result_login = mysqli_query($conn, $sql_login); 
                                $row = mysqli_fetch_assoc($result_login);
                                $check = mysqli_num_rows($result_login);
                                
                                if ($check < 1) {
                                 header("location: ../register?auto login failed");
                                 exit();
                                 }
                                 else {
                                     $_SESSION['user_id'] = $row['user_id'];
									 $_SESSION['lastname'] = $row['lastname'];
                                     header("Location: ../account");
                                     exit();
                                     
                                 }      
                   }
                }
             }
else {
    header("Location: ../register");
    exit();
}