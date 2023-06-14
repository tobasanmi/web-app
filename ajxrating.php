<?php 
    include 'config/dbh.php';

	 if(isset($_POST['ccode'])){
        $ccode = mysqli_real_escape_string($conn, $_POST['ccode']);
        $sellerid = mysqli_real_escape_string($conn, $_POST['seller']);
        $hisrating = mysqli_real_escape_string($conn, $_POST['rating']); 
        $timed = time();
		 
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR']?: $_SERVER['HTTP_CLIENT_IP']?: $_SERVER['REMOTE_ADDR'];
        
        //check if he has rated the course before
        $checkrating = mysqli_query($conn, "select * from product_ratings where productid = '$ccode' and ip = '$ip'");
            if(mysqli_num_rows($checkrating)>0){
                //updte the rating 
                $upd = mysqli_query($conn, "update product_ratings set rating = '$hisrating', dated = '$timed' where productid = '$ccode' and ip = '$ip'");
                    if($upd){
                        echo 'thanks';
                    }else{
						echo 'error'; 
					}
            }else{
                //log new rating for the course
                $lograte = mysqli_query($conn, "insert into product_ratings set rating = '$hisrating', productid = '$ccode', sellerid = '$sellerid', ip = '$ip', dated = '$timed'");
                if($lograte){
                    echo 'thanks';
                }else{
					echo 'error occured';
				}
            }
            
    }
?>