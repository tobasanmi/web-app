<?php

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
$usersql = "SELECT * FROM user";
$userresult = mysqli_query($cxn, $usersql);
$usercounter = mysqli_num_rows($userresult);
// script to count number of users

// script to add a product
if (isset($_POST['submit_product'])) {

    if ($_POST['product_category'] !== "" && $_POST['product_name'] !== "" && $_POST['product_price'] !== "" && $_POST['product_type'] !== "" && $_POST['product_size'] !== "" && $_POST['product_tag'] !== "" && $_POST['product_description'] !== "") {


        $seller_id = $_SESSION['super_admin_id'];
        $product_name = htmlentities($_POST['product_name']);
        $product_category = htmlentities($_POST['product_category']);

        // script to upload image
        $tmp_name = $_FILES['product_img']['tmp_name'];
        $filename = $_FILES['product_img']['name'];
        $folder = "assets/images/";
        $file_to_upload = $folder . $filename;
        $move_file = move_uploaded_file($tmp_name, $file_to_upload);

        $price = htmlentities($_POST['product_price']);
        $region = htmlentities($_POST['product_region']);
        $product_type = htmlentities($_POST['product_type']);
        $remark = htmlentities($_POST['product_remark']);
        $size = htmlentities($_POST['product_size']);
        $product_tag = htmlentities($_POST['product_tag']);
        $description = $_POST['product_description'];

        $product_name = mysqli_real_escape_string($cxn, $product_name);
        $product_category = mysqli_real_escape_string($cxn, $product_category);
        $file_to_upload = mysqli_real_escape_string($cxn, $file_to_upload);
        $price = mysqli_real_escape_string($cxn, $price);
        $region = mysqli_real_escape_string($cxn, $region);
        $product_type = mysqli_real_escape_string($cxn, $product_type);
        $remark = mysqli_real_escape_string($cxn, $remark);
        $size = mysqli_real_escape_string($cxn, $size);
        $product_tag = mysqli_real_escape_string($cxn, $product_tag);
        $description = mysqli_real_escape_string($cxn, $description);
        $time = date('Y-m-d h:i:s');

        if (!$move_file) {
            $msgResponse = "Please upload a picture of the product";
            $msgResponseClass = "alert-danger";
        } else {
            $query_add_product = "INSERT INTO products(seller_id,product_name,product_category,product_img,remark,product_desc,price,size,product_type,region,tag,time) VALUES ('$seller_id','$product_name','$product_category','$file_to_upload','$remark','$description','$price','$size','$product_type','$region','$product_tag', '$time')";
            $result_add_product = mysqli_query($cxn, $query_add_product);
            if ($result_add_product) {
                header("Location: ./");
            } else {
                $msgResponse = "Error uploading product, Please try again later";
                $msgResponseClass = "alert-danger";
            }
        }
    } else {
        $msgResponse = "Make sure you fill the form correctly";
        $msgResponseClass = "alert-danger";
    }
}
// end of script to add a product
