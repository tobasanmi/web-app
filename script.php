<?php
error_reporting(0);
ini_set('display_errors', 0);

include "config/dbh.php";

date_default_timezone_set('Africa/Lagos');
$created_at = Date('Y-m-d H:i:s');

#SCRIPT TO PROCESS CHECKOUT#
	if (isset($_POST['checkout'])) {
		$amount = mysqli_real_escape_string($cxn, $_POST['amount']);
		$order = $_POST['order'];
		$phone = mysqli_real_escape_string($cxn, $_POST['phone']);
		$email = mysqli_real_escape_string($cxn, $_POST['email']);
		$paymthd = $_POST['paymthd'];
		$postTime = (Date('y/m/d H:i:s'));
		$order_id = mt_rand(10, 9598)*str_shuffle(time());
		//echo json_encode($order, true);  
		$arr = json_decode($order); 
		$timedd = time(); 
		$paytype = 'p.o.d'; 
		//get each product orders 
		//var_dump($order);
		foreach($arr as $i => $prd){			
			$prdid = $prd->id; 
			$prdname = $prd->name;
			$prd_sumr = $prd->summary;
			$prdprice = $prd->price;
			$prdqnty = $prd->quantity;
			$prdimg = $prd->image;
			$sellerid = $prd->sll;  
			//log trabsactions 
			$logtrans = mysqli_query($cxn, "insert into trans set productid = '$prdid', orderid = '$order_id', productname = '$prdname', sellerid = '$sellerid', amount = '$prdprice', buyeremail = '$email', payment_method = '$paymthd', order_date = '$timedd', status = '', quantity = '$prdqnty'");
		}

		$result_query_sales = mysqli_query($cxn, "INSERT INTO sales (order_id, order_details, amount, phone, email, paymthd, status, timestamp) VALUES ('$order_id', '$order',  '$amount', '$phone', '$email', '$paymthd', 'dropped', '$postTime')");   

		if($paytype == "card") {
			header("location: pay?pp=" . $order_id . "");
		}else if($paytype == "p.o.d") {
			header("location: payondelivery?pd=" . $order_id . "");
		}else {
			//header("location: ./"); 
		}
	}
	#END OF SCRIPT TO PROCESS CHECKOUT#

#SCRIPT TO SEARCH FOR A PRODUCT#
if (isset($_POST['search_product'])) {
    $product_to_search = filter_var(htmlentities($_POST['search_product']), FILTER_SANITIZE_STRING);
    $query_search_product = mysqli_query($cxn, "SELECT * FROM products WHERE product_name LIKE '%" . $product_to_search . "%' ORDER BY product_id DESC");
    $products = mysqli_fetch_all($query_search_product, MYSQLI_ASSOC);
    if (count($products) > 0) {
        $output = "";
        foreach ($products as $product) {
            $output .= "<div class=' col-md-3 pro-1 searched-products'>
                        <div class='col-m'>
                            <a href='product?prod=" . $product['product_id'] . "' data-toggle='modal' data-target='#myModal17' class='offer-img'>
                                <img src='dashboard/" . $product['product_img'] . "' class='img-responsive' alt=''>
                            </a>
                            <div class='mid-1'>
                                <div class='women'>
                                    <h6><a href='product?prod=" . $product['product_id'] . "'>" . $product['product_name'] . " (" . $product['size'] . ")</a></h6>
                                </div>
                                <div class='mid-2'>
                                    <p><em class='item_price'>₦" . $product['price'] . "</em></p>
                                    <div class='block'>
                                        <div class='rateit small ghosting' data-rateit-mode='font'></div>
                                    </div>
                                    <div class='clearfix'></div>
                                </div>
                               <div class='add add-2'>
                                    <a href='product?prod=" . $product['product_id'] . "'><button class='btn my-cart-btn my-cart-b' data-id='" . $product['product_id'] . "' data-name='" . $product['product_name'] . "' data-summary='summary 2' data-price='" . $product['price'] . "' data-quantity='1' data-image='dashboard/" . $product['product_img'] . "'>View Product</button></a>
                                </div>
                            </div>
                        </div>
                    </div>";
        }
        echo $output;
    } else {
        echo "<h3 class='text-center'>Product Not Found</h3>";
    }
}
#END OF SCRIPT TO SEARCH FOR A PRODUCT#

#SCRIPT TO SEARCH FOR A DISCOUNTED PRODUCT#
if (isset($_POST['search_discount_product'])) {
    $discount_product_to_search = filter_var(htmlentities($_POST['search_discount_product']), FILTER_SANITIZE_STRING);
    $query_search_discount_product = mysqli_query($cxn, "SELECT * FROM products WHERE discount_price IS NOT NULL AND product_name LIKE '%" . $discount_product_to_search . "%' ORDER BY time DESC");
    $discount_products = mysqli_fetch_all($query_search_discount_product, MYSQLI_ASSOC);
    if (count($discount_products) > 0) {
        $output = "";
        foreach ($discount_products as $discount_product) {
            $output .= "<div class=' col-md-3 pro-1 searched-discount-products'>
                        <div class='col-m'>
                            <a href='product?prod=" . $discount_product['product_id'] . "' data-toggle='modal' data-target='#myModal17' class='offer-img'>
                                <img src='dashboard/" . $discount_product['product_img'] . "' class='img-responsive' alt=''>
                            </a>
                            <div class='mid-1'>
                                <div class='women'>
                                    <h6><a href='product?prod=" . $discount_product['product_id'] . "'>" . $discount_product['product_name'] . " (" . $discount_product['size'] . ")</a></h6>
                                </div>
                                <div class='mid-2'>
                                    <p><em class='item_price'>₦" . $discount_product['price'] . "</em></p>
                                    <div class='block'>
                                        <div class='rateit small ghosting' data-rateit-mode='font'></div>
                                    </div>
                                    <div class='clearfix'></div>
                                </div>
                                <div class='add add-2'>
                                    <button class='btn my-cart-btn my-cart-b' data-id='" . $discount_product['product_id'] . "' data-name='" . $discount_product['product_name'] . "' data-summary='summary 2' data-price='" . $discount_product['price'] . "' data-quantity='1' data-image='assets/images/" . $discount_product['product_img'] . "'>Buy Now</button>
                                </div>
                            </div>
                        </div>
                    </div>";
        }
        echo $output;
    } else {
        echo "<h3 class='text-center'>Product Not Found</h3>";
    }
}
#END OF SCRIPT TO SEARCH FOR A DISCOUNTED PRODUCT#

#SCRIPT TO SUBSCRIBE A USER#
if (isset($_POST['submit_user_details'])) {
    $name = htmlentities($_POST['name']);
    $email = htmlentities($_POST['email']);
    if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
        echo "<script>alert('Invalid Email')</script>";
    } else {
        $query_subscriber = "INSERT into user(user_name, user_email) VALUES ('$name', '$email')";
        $result_query_subscriber = mysqli_query($cxn, $query_subscriber);
        if ($result_query_subscriber) {
            echo "<script>alert('Success!. Thank You for Subscribing, We\'ll Keep You Updated...')</script>";
        } else {
            echo "<script>alert('Error Occured while Subscribing. Please Try Again Later!')</script>";
        }
    }
}
#END OF SCRIPT TO SUBSCRIBE A USER#

#SCRIPT TO SHOW POPULAR PRODUCTS#
if (isset($_POST['click'])) {
    $product_id = $_POST['click'];

    ////SELECT
    $query_no_of_clicks = mysqli_query($cxn, "SELECT * FROM products WHERE product_id = '$product_id'");
    if (mysqli_num_rows($query_no_of_clicks) > 0) {
        $fetch_no_of_clicks = mysqli_fetch_array($query_no_of_clicks);
        $incre = $fetch_no_of_clicks['no_of_clicks'] + 1;
        $query_increment_no_of_click = mysqli_query($cxn, "UPDATE products SET no_of_clicks = '$incre' WHERE product_id = '$product_id'");
        if ($query_increment_no_of_click) {
            echo "success";
        } else {
            echo "not_yet";
        }
    }
}
#END OF SCRIPT TO SHOW POPULAR PRODUCTS#

#SCRIPT TO RATE A PRODUCT#
if (isset($_POST['rate_prodxt_id']) && isset($_POST['rate_prodxt_value'])) {
    $product_id = $_POST['rate_prodxt_id'];
    $product_rating_value = $_POST['rate_prodxt_value'];

    $query_avg_per_product = mysqli_query($cxn, "SELECT avg_per_prodct FROM products WHERE product_id = '$product_id'");
    if (mysqli_num_rows($query_avg_per_product) > 0) {
        $fetch_avg_per_product = mysqli_fetch_array($query_avg_per_product);
        $total_no_of_rate_per_product = $fetch_avg_per_product['avg_per_prodct'];
    }

    $query_total_no_of_rate_click = mysqli_query($cxn, "SELECT no_of_rating_clicks FROM products WHERE product_id = '$product_id'");
    if (mysqli_num_rows($query_total_no_of_rate_click) > 0) {
        $fetch_total_no_of_rate_click = mysqli_fetch_array($query_total_no_of_rate_click);
        $total_no_of_rate_click = $fetch_total_no_of_rate_click['no_of_rating_clicks'];
    }


    $new_rating = (($total_no_of_rate_per_product * $total_no_of_rate_click) + $product_rating_value) / ($total_no_of_rate_click + 1);


    $query_add_new_rating_to_existing = mysqli_query($cxn, "UPDATE products SET avg_per_prodct = '$new_rating' WHERE product_id = '$product_id'");
    if ($query_add_new_rating_to_existing) {
        echo "success";
    } else {
        echo "not_yet";
    }
}
#END OF SCRIPT TO RATE A PRODUCT#


#SCRIPT TO SHOW RATING CLICK#
if (isset($_POST['ratin_click'])) {
    $product_id = $_POST['ratin_click'];

    ////SELECT
    $query_no_of_clicks = mysqli_query($cxn, "SELECT * FROM products WHERE product_id = '$product_id'");
    if (mysqli_num_rows($query_no_of_clicks) > 0) {
        $fetch_no_of_clicks = mysqli_fetch_array($query_no_of_clicks);
        $incre = $fetch_no_of_clicks['no_of_rating_clicks'] + 1;
        $query_increment_no_of_click = mysqli_query($cxn, "UPDATE products SET no_of_rating_clicks = '$incre' WHERE product_id = '$product_id'");
        if ($query_increment_no_of_click) {
            echo "success";
        } else {
            echo "not_yet";
        }
    }
}
#END OF SCRIPT TO SHOW RATING CLICK#

#SCRIPT TO ADD USER COMMENT#
if (isset($_POST['submit_user_comment'])) {
    $user_comment = filter_var(htmlentities($_POST['user_comment']), FILTER_SANITIZE_STRING);
    $comment_user = filter_var(htmlentities($_POST['comment_user_name']), FILTER_SANITIZE_STRING);
    $comment_product_id = htmlentities($_POST['comment_prod_id']);

    $query_add_product_comment = mysqli_query($cxn, "INSERT INTO comments(comment,comment_user,product_id,created_time) VALUES('$user_comment','$comment_user','$comment_product_id','$created_at')");
    if ($query_add_product_comment) {
        header("Location: product?prod=" . $comment_product_id . "/#commentz");
    }else{
        echo "<script>alert('Error Occured. Try again later...')</script>";
    }
}
#END OF SCRIPT TO ADD USER COMMENT#