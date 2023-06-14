<?php
// error_reporting(0);
// ini_set('display_errors', 0);

include "../config/dbh.php";

// script to signin admin

$msgResponse = "";
$msgResponseClass = "";

if (isset($_POST['admin_email']) && isset($_POST['admin_password'])) {
    $admin_email = filter_var(htmlentities($_POST['admin_email']), FILTER_SANITIZE_EMAIL);
    if (filter_var($admin_email, FILTER_VALIDATE_EMAIL) === false) {
        $msgResponse = "Invalid Email";
        $msgResponseClass = "alert-danger";
    } else {
        $admin_password = filter_var(htmlentities($_POST['admin_password']), FILTER_SANITIZE_STRING);
        $query_admin_password = mysqli_query($cxn, "SELECT super_pwd FROM super_admin WHERE email='$admin_email'");
        $count_admin_password = mysqli_num_rows($query_admin_password);
        if ($count_admin_password > 0) {
            $fetch_admin_password = mysqli_fetch_assoc($query_admin_password);
            $admin_db_pass = $fetch_admin_password['super_pwd'];
            if (password_verify($admin_password, $admin_db_pass)) {
                $query_admin_id = mysqli_query($cxn, "SELECT super_id FROM super_admin WHERE email='$admin_email' AND super_pwd='$admin_db_pass'");
                $count_admin_id = mysqli_num_rows($query_admin_id);
                if ($count_admin_id > 0) {
                    $fetch_admin_id = mysqli_fetch_assoc($query_admin_id);
                    $admin_id = $fetch_admin_id['super_id'];
                    $_SESSION['is_logged_in'] = true;
                    $_SESSION['super_admin_id'] = $admin_id;
                    header("Location: ./");
                }
            } else {
                # code...
            }
        }
    }
}
// end of script to sign in admin

// script to count number of products
$sql = "SELECT * FROM products";
$result = mysqli_query($cxn, $sql);
$productcount = mysqli_num_rows($result);
// end of script to count number of products

// script to count number of new msg
$sql = "SELECT * FROM msg WHERE state ='new' ";
$result = mysqli_query($cxn, $sql);
$msgcounter = mysqli_num_rows($result);

if ($msgcounter == 0) {
    $msgcount = "";
} else {
    $msgcount = $msgcounter;
}
// end of script to count number of new msg

// script to count number of users
$usersql = "SELECT * FROM users";
$userresult = mysqli_query($cxn, $usersql);
$usercounter = mysqli_num_rows($userresult);
// script to count number of users 

// script to count number of farmers
$farmerssql = "SELECT * FROM farmers";
$farmersresult = mysqli_query($cxn, $farmerssql);
$farmerscounter = mysqli_num_rows($farmersresult);
// script to count number of farmers 