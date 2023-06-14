<?php
session_start();  

    include_once '../dbh.php';

    $name = mysqli_real_escape_string($conn, $_POST['Name']);
    $email = mysqli_real_escape_string($conn, $_POST['Email']);
    $phone = mysqli_real_escape_string($conn, $_POST['Phone']);
    $message = mysqli_real_escape_string($conn, $_POST['Message']);
	$time = (Date('y/m/d H:i:s'));



  echo $name;
  
   if (empty($name) || empty($email) || empty($message)) {
        header("Location: ../contact.php? please no empty fields allowed");
        exit();
    }
       else {
           //checking if characters are valid
           if (!preg_match("/^[a-z A-Z]*$/", $name )) {
            header("Location: ../signup.php?invalid Characters Username");
            exit();
            }
  
					else {
					   // insert the user into the  database
                                 $sql ="INSERT INTO msg (name, phone, email, message, state, time) VALUES ('$name',  '$phone', '$email', '$message', 'new', '$time')";
                                 mysqli_query($conn, $sql);
                                 header("location: ../sent.php?Message sent!");
                                    
                   }
                }
             
         