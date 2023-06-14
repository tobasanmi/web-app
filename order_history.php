<?php
$page_title = "Account";
include "inc/header.php";


if(!isset( $_SESSION['user_id'] )){
   header('location: login');}
   
 $url= $_SERVER['REQUEST_URI']; if (($msg = strpos($url, "?")) !==FALSE ){$msgg = substr($url,$msg+1);$message = str_replace(array('%20'), ' ', $msgg); }else {$message = "";}
  
  
  

$user_id =  $_SESSION['user_id'];


     $sql_user = "SELECT * FROM users WHERE user_id = '$user_id'";
     $result_user = mysqli_query($conn,$sql_user);
     $row = mysqli_fetch_assoc($result_user);
     
     $email = $row['email'];
    

    if($message == 'proccessing'){
            //FETCHING REQUIRED DATA
             $sql = "SELECT * FROM sales WHERE email = '$email' AND status= 'placed'";
             $result = mysqli_query($conn, $sql);
             $row_count =  mysqli_num_rows($result);
             $order_title = 'Orders in Proccessing';
    }
    elseif($message == 'delivered'){
             //FETCHING REQUIRED DATA
             $sql = "SELECT * FROM sales WHERE email = '$email' AND status= 'delivered'";
             $result = mysqli_query($conn, $sql);
             $row_count =  mysqli_num_rows($result);
             $order_title = 'Delivered Orders';
    }
    elseif($message == 'cancel'){
             //FETCHING REQUIRED DATA
             $sql = "SELECT * FROM sales WHERE email = '$email' AND (status= 'dropped' OR status= 'droped')";
             $result = mysqli_query($conn, $sql);
             $row_count =  mysqli_num_rows($result);
              $order_title = 'Canceled Orders';
    }
    elseif($message == 'all'){
             //FETCHING REQUIRED DATA
             $sql = "SELECT * FROM sales WHERE email = '$email'";
             $result = mysqli_query($conn, $sql);
             $row_count =  mysqli_num_rows($result);  
              $order_title = 'All Orders';
    }
    else{
        header('location: account');
    }
    
    
?>



<div class="banner-top">
	<div class="container">
		<h3>Account</h3>
		<h4><a href="./">Home</a><label>/</label><a href="account">Account</a><label>/</label>order history</h4>
		<div class="clearfix"> </div>
	</div>
</div>



<div class="profile_background">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container bootstrap snippets bootdey"  style="width:95%; max-width:800px">
    <div class="row"><br><br>
      <div class="profile-info col-md-8"  style="margin: 0 auto; width:100%">
          <div class="panel">
              <div class="bio-graph-heading">
                  <h3><?php echo  $order_title; ?></h3>
              </div>
              <div class="panel-body bio-graph-info" style="text-align:left">
                     
                      
          <div class="bs-docs-example">
            <table class="table table-bordered" style="font-size:15px">
              <thead>
                <tr>
                  <th>S/N</th>
                  <th>Order ID</th>
                  <th>Amount</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
                  
                  <?php 
                  
                  if($row_count > 0 ){
                      
                       $sn = 1;
                     while($row = mysqli_fetch_assoc($result)){
                         $date = substr( $row['timestamp'] ,0,-8);
                       echo '
                           <tr>
                              <td>'.$sn.'</td>
                              <td><a href="order-details?'.$row['order_id'].'">#<b style="color:blue">'.$row['order_id'].'</b></a></td>
                              <td>'.number_format($row['amount'],2).'</td>
                              <td>'.$date.'</td>
                            </tr>
                        ';
                         $sn++;
                      }
                  }
                  else{
                      
                      if($order_title == 'All Orders'){
                               echo '
                           <tr style="text-align:center; font-size:20px">
                              <td colspan="4"><b>You Have No Orders</b></td>
                          </tr>
                        '; 
                      }else{
                         echo '
                           <tr style="text-align:center; font-size:20px">
                              <td colspan="4"><b>You Have No '.$order_title.'</b></td>
                          </tr>
                        '; 
                      };
                
                  };
                   
                      
                  ?>
              </tbody>
            </table>
          </div>
                    
                    
              </div>
          </div>
          
           <br>
  <br> <br>
  <br> <br>
  <br>
          
          
          
          
          
          
          
          
          
          
             
      
          
      </div>
    </div>
    </div>
</div>
</div>
<?php
include "inc/footer.php";
?>