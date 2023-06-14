<?php
include '../config/dbh.php';
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $delete_product = mysqli_query($cxn, "DELETE FROM products WHERE product_id = '$product_id'");
    if ($delete_product) {
        header("Location: ./");
    } else {
        echo "<script> alert('Error occured while deleting this product. Please try again later!!'); </script>";
    }
}
