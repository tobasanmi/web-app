<?php
session_start();  
//if (isset($_POST['submit'])) {
    
    include_once 'dbh.php';

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);


    if (empty($name) || empty($email) || empty($phone) || empty($phone)) {
        header("Location: ../../contact.php? please no empty fields allowed");
        exit();
    }
       else {
           //checking if characters are valid
           if (!preg_match("/^[a-z A-Z]*$/", $name )) {
            header("Location: ../../contact.php?invalid Characters Name");
            exit();
            }
			
			else {
           //checking if characters are valid
           if (!preg_match("/^[0-9]*$/", $phone )) {
            header("Location: ../../contact.php?invalid Characters Phone number");
            exit();
            }
  
					else {
                  		// insert the user into the  database
                        $sql ="INSERT INTO msg (name, phone, email, message) VALUES ('$name',  '$phone', '$email', '$message')";
                        mysqli_query($conn, $sql);
                          header("Location: ../../contact.php?thank you, your message has been sent");					   
                   }
                }
	   }
        
