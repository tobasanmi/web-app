  <?php
    include "../config/dbh.php";


    $url = $_SERVER['REQUEST_URI'];

    if (($msg = strpos($url, "?")) !== FALSE) {
        $msgg = substr($url, $msg + 1);
        $message = str_replace(array('%20'), ' ', $msgg);
    } else {
        $message = "";
    }

    $sqldel = "DELETE FROM product WHERE product_id =$message";
    $resultdel = mysqli_query($cxn, $sqldel);

    header("Location: ../index.php?");
    ?>