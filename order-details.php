<?php
$page_title = "Account";
include "inc/header.php";


if(!isset( $_SESSION['user_id'] )){
   header('location: login');}
   
 $url= $_SERVER['REQUEST_URI']; if (($msg = strpos($url, "?")) !==FALSE ){$msgg = substr($url,$msg+1);$message = str_replace(array('%20'), ' ', $msgg); }else {$message = "";}
  
$user_id =  $_SESSION['user_id'];

    if($message){
            //FETCHING DATA FOR TRANSACTION DETAILS
             $sql = "SELECT * FROM trans WHERE orderid = '$message'";
             $result = mysqli_query($conn, $sql);
             $row_count =  mysqli_num_rows($result);
        
    }
?>



<div class="banner-top">
	<div class="container">
		<h3>Account</h3>
		<h4><a href="./">Home</a><label>/</label><a href="account">Account</a><label>/</label>Order Details</h4>
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
                  <h4><b>Order Details:</b><?php echo  $message; ?></h4>
              </div>
              <div class="panel-body bio-graph-info" style="text-align:left">
                     
                      
          <div class="bs-docs-example">
            <table class="table table-bordered" style="font-size:15px">
              <thead>
                <tr>
                  <th>S/N</th>
                  <th>Item</th>
                  <th>Amount</th>
                  <th>Quantity</th>
                </tr>
              </thead>
              <tbody>
                  
                  <?php 
                  
                  if($row_count > 0 ){
                       $sn = 1;
                       $total = 0;
                       
                     while($row = mysqli_fetch_assoc($result)){
                        $total += $row['amount'];
                        echo '
                           <tr>
                               <td>'.$sn.'</td>
                               <td>'.$row['productname'].'</td>
                               <td>'.number_format($row['amount'],2) .'</td>
                               <td>'.$row['quantity'].'</td>
                            </tr>
                        ';
                         $sn++;
                      }
                       
                        echo '
                           <tr style="text-align:right; font-size:20px">
                              <td colspan="4"><b>Total: '. number_format($total,2).'</b></td>
                          </tr>
                        ';
                      
                  }
                  else{
                           header('location: account');  
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