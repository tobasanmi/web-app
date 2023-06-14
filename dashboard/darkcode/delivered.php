<?php
  include_once "../darkcode/dbh.php";
		/*$url= $_SERVER['REQUEST_URI']; 
        	if (($msg = strpos($url, "?")) !==FALSE ){
        			$msgg = substr($url,$msg+1);
        			$message = str_replace(array('%20'), ' ', $msgg); */ 					  	
			if(isset($_GET['yes'])){
				$id = mysqli_real_escape_string($conn, $_GET['yes']);				
				$getorderid = mysqli_query($conn, "select order_id, order_details from sales where id = '$id' and status = 0");
				  if(mysqli_num_rows($getorderid) > 0){
						$dd = mysqli_fetch_assoc($getorderid);
						$orderid = $dd['order_id']; 
						$ordersarray = $dd['order_details'];					  	
					  	//get the products
					  	$gettrans = mysqli_query($conn, "select quantity, orderid, productid, sellerid from trans where orderid = '$orderid'");
					  		if(mysqli_num_rows($gettrans) > 0){
								while($rr = mysqli_fetch_assoc($gettrans)){
									$oid = $rr['orderid'];
									$prdid = $rr['productid'];
									$prdqnty = $rr['quantity'];
									$sellerid = $rr['sellerid'];
																	
									//log stocks 
									$logtrans = mysqli_query($cxn, "update products set qnty_sold = qnty_sold + '$prdqnty', in_stock = in_stock - '$prdqnty' where product_id = '$prdid' and seller_id = '$sellerid'");
								}
								
	       		   				$sql =   mysqli_query($cxn, "UPDATE sales SET status ='delivered' WHERE id = '$id' and order_id = '$orderid'");      	 
								//update the product purchased hstory
								$updttran = mysqli_query($conn, "update trans set status = 1 where orderid = '$orderid' and status = 0");     
							}					  					  												    
						
				}
				
		}else {
			$message = "";
			echo 'Not found'; 
		}
        
  ?>
<script language="JavaScript" type="text/javascript">
setTimeout("location.href = '../order'",0);
</script>