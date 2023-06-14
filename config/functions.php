<?php
	include '../config/dbh.php';

  function getrating($product_id){
	  global $conn;
	  $myrate = mysqli_query($conn, "select *, sum(rating) as rtt, count(id) as cntid from product_ratings where productid = '$product_id'");
		if(mysqli_num_rows($myrate) == 0){
			$myrating = '<i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
		}else{
			$my = mysqli_fetch_assoc($myrate);
			$totl = $my['rtt']; 
			$cnt = $my['cntid'];												
			if($totl == ''){
				$myrating = '<i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
			}else{
				$rating = $totl / $cnt; 													
				if($rating == 0){$myrating = '<i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';} 
				else if($rating == 1){$myrating = '<i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';}
				else if($rating > 1 and $rating < 2){$myrating = '<i class="fa fa-star"></i><i class="fa fa-star-half"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';}

				else if($rating == 2){$myrating = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';}
				else if($rating > 2 and $rating < 3){$myrating = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';}

				else if($rating == 3){$myrating = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';}
				else if($rating > 3 and $rating < 4){$myrating = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-half"></i><i class="fa fa-star-o"></i>';}

				else if($rating == 4){$myrating = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>';}
				else if($rating > 4 and $rating < 5){$myrating = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-half"></i>';}

				else if($rating == 5){$myrating = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';}
				else{$myrating = '<i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';}				
			}
		}
	  	return $myrating;
	}

function getUserIP(){
    // Get real visitor IP behind CloudFlare network
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
         $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
	
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP)){
        $ip = $client;
    }elseif(filter_var($forward, FILTER_VALIDATE_IP)){
        $ip = $forward;
    }else{
        $ip = $remote;
    }

    return $ip;
}

function getproductname($product_id){
	global $conn;
	$getproductname = mysqli_query($conn, "select product_name from products where product_id = '$product_id'");
		$dd = mysqli_fetch_assoc($getproductname);
		$pname = $dd['product_name'];
	
	return $pname;
}

function getseller($id){
	if($id == 0){
		return 'Daydone';
	}else{
		global $conn;
		$getproductname = mysqli_query($conn, "select farmer_first_name, farmer_last_name from farmers where farmer_id = '$id'");
			$dd = mysqli_fetch_assoc($getproductname);
			$fname = $dd['farmer_first_name'];
			$lname = $dd['farmer_last_name'];

		return $fname.' '.$lname; 		
	}
}
?>