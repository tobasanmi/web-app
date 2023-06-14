<?php
include '../config/dbh.php';
if (isset($_GET['pid'])) {
    $product_id = $_GET['pid'];
    $delete_product = mysqli_query($cxn, "DELETE FROM products WHERE product_id = '$product_id'");
    if ($delete_product) {
        header("Location: products.php");
    } else {
        echo "<script> alert('Error occured while deleting this product. Please try again later!!'); </script>";
    }
}
