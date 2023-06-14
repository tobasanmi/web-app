<?php
include '../config/dbh.php';
if (isset($_GET['delid'])) {
    $delid = $_GET['delid'];
    $delete_msg = mysqli_query($cxn, "DELETE FROM msg WHERE msg_id = '$delid'");
    if ($delete_msg) {
        header("Location: msg.php");
    } else {
        echo "<script> alert('Error deleting this category. Please try again later!'); window.location='msg.php';</script>";
    }
}
