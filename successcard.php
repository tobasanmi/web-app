<?php
include "inc/headers.php";
//include 'config/dbh.php';
/*if (isset($_GET['oid'])) {
    $order_id = $_GET['oid'];
    $update_sales_order = "UPDATE sales SET status ='placed' WHERE order_id = '$order_id'";
    mysqli_query($cxn, $sql);
} else {
    header("Location: ./");
}*/


if(isset($_GET['reff'])){
    $refid = $_GET['reff'];
    //get the payment details
        
     $getit = mysqli_query($conn, "select * from sales where order_id = '$refid' and status = 'placed'");
        if(mysqli_num_rows($getit)>0){
        $rr = mysqli_fetch_assoc($getit);
            $id = $rr['id'];
            $pemail = $rr['email']; $status = $rr['status'];        
            $phone = $rr['phone'];  $amount= $rr['amount'];
            $trans_ref = $rr['order_id'];  $timed = $rr['timestamp'];                                    
        }else{
            header("location: /");        
        }
   }else{
    	header("location: /");
	}

?>

<!--login-->
<div class="login">
    <div class="main-agileits">
        <div class="form-w3agile form1">
			<img src="assets/images/succescheck.png" alt="" style="height: 80px;"> 
            <h3 class="" style="margin-bottom: 0px;">SUCCESS!!!</h3>
            <hr class="soft" />
            <div class="span4">
			<div class="well">
				<h5 class="text-success"><strong>YOUR PAYMENT WAS SUCCESSFUL</strong></h5><br />
				<span style="font-size:13px">Delivery time: Max 2days</span><br><br>
				<span style="font-size:13px">Your payment has been received
					<br><b>Note:</b>  There will be <a style="color:blue" href=shipping>shipping fee</a>, you will be contacted shortly by our customer representative.</span>
					<span id="form_amount"></span>
					<span id="form_order"></span> 
			</div>
				<p class="text-center"><a href="index" style="text-decoration:none;"><i class="fa fa-arrow-left"></i> Go Back Home</a></p>
            </div>

        </div>
    </div>
</div>
<?php
include "inc/footers.php";
?>