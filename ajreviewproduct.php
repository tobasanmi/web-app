<?php 
    include 'config/dbh.php';

	 if(isset($_POST['ccode'])){
        $cc =mysqli_real_escape_string($conn, $_POST['ccode']);
        $review = mysqli_real_escape_string($conn, $_POST['review']);        
        $usser = mysqli_real_escape_string($conn, $_POST['user']);        
        $usseremail = mysqli_real_escape_string($conn, $_POST['email']);        
        $timed = time();
        $spl = explode('^', $cc);
        
        $pid = $spl[0]; $sellerid = $spl[1];
                
        //check if he has reviewed the course before
        $checkrating = mysqli_query($conn, "select * from comments where product_id = '$pid' and comment_useremail = '$usseremail'");
            if(mysqli_num_rows($checkrating)>0){
                echo '<span class="text-danger">Thank you! You reviewed this product</span>';
            }else{
                //log new rating for the course
                $lograte = mysqli_query($conn, "insert into comments set comment = '$review', product_id = '$pid', seller_id = '$sellerid', comment_useremail = '$usseremail', comment_user = '$usser', dated = '$timed'");
                if($lograte){
                    echo 'submitted';
                }else{
					echo 'unable to review, try again';
				}
            }                               
    }

?>