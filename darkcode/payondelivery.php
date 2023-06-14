<?php
include "inc/header.php";
if (isset($_GET['pd'])) {
    $order_id = $_GET['pd'];
    $sql = "UPDATE sales SET status ='placed' WHERE order_id = '$order_id'";
    mysqli_query($cxn, $sql);
} else {
    header("Location: ./");
}

?>
<!--banner-->
<div class="banner-top">
    <div class="container">
        <h3>Pay on Delivery</h3>
        <h4><a href="./">Home</a><label>/</label>Pay on Delivery</h4>
        <div class="clearfix"> </div>
    </div>
</div>

<div class="login">
    <div class="main-agileits">
        <div class="form-w3agile form1">
            <h3>SUCCESS!!!</h3>
            <hr class="soft" />

            <div class="span4">
                <div class="span9">
                    <div class="well">
                        <h5><strong>YOUR ORDER HAS BEEN PLACED</strong></h5><br />
                        <span style="font-size:13px">Delivery time:max 2days</span><br><br>
                        <span style="font-size:13px">Note there will be shipping fee, you will be contacted shortly by a customer representative</span>
                        <span id="form_amount"></span>
                        <span id="form_order"></span>

                    </div>
                </div>



            </div>

        </div>
    </div>
</div>

<?php
include "inc/footer.php";
?>