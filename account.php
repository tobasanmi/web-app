<?php
$page_title = "Account";
include "inc/header.php";


if(!isset( $_SESSION['user_id'] )){
   header('location: login');
}

$user_id =  $_SESSION['user_id'];


     $sql_user = "SELECT * FROM users WHERE user_id = '$user_id'";
     $result_user = mysqli_query($conn,$sql_user);
     $row = mysqli_fetch_assoc($result_user);
     
     $email = $row['email'];
     
     
     //FETCHING DATA FOR TOTAL ORDERS
     $sql_tos = "SELECT * FROM sales WHERE email = '$email'";
     $result_tos = mysqli_query($conn,$sql_tos);
     $row_count_tos =  mysqli_num_rows($result_tos);
     
     
     //FETCHING DATA FOR PLACED ORDERS
     $sql_placed_orders = "SELECT * FROM sales WHERE email = '$email' AND status= 'placed'";
     $result_placed_orders = mysqli_query($conn,$sql_placed_orders);
     $row_count_placed_orders =  mysqli_num_rows($result_placed_orders);


     //FETCHING DATA FOR delivered ORDERS
     $sql_delivered_orders = "SELECT * FROM sales WHERE email = '$email' AND status= 'delivered'";
     $result_delivered_orders = mysqli_query($conn,$sql_delivered_orders);
     $row_count_delivered_orders =  mysqli_num_rows($result_delivered_orders);
     
    
     //FETCHING DATA FOR CANCELED ORDERS
     $sql_canceled_orders = "SELECT * FROM sales WHERE email = '$email' AND (status= 'dropped' OR status= 'droped')";
     $result_canceled_orders = mysqli_query($conn, $sql_canceled_orders);
     $row_count_canceled_orders =  mysqli_num_rows($result_canceled_orders);
?>



<div class="banner-top">
	<div class="container">
		<h3>Account</h3>
		<h4><a href="./">Home</a><label>/</label>Account</h4>
		<div class="clearfix"> </div>
	</div>
</div>



<?php 

if(!isset( $_SESSION['notify'] )){}else{if(time() - $_SESSION['notify_time_keeper'] > 10){}else{ echo $_SESSION['notify'];}}
?>





<div class="profile_background">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container bootstrap snippets bootdey">
    <div class="row">
      <div class="profile-nav col-md-3" style="text-align:left">
          <div class="panel">
              <div class="user-heading round" style="">
                  <h4> Order</h4>
              </div>
                    <div class="list-group list-group-alternate" style="padding:0px 10px 0px 10px"> 
						<a href="order_history?proccessing" class="list-group-item"><span class="badge"><?php echo $row_count_placed_orders;?></span> <i class="ti ti-headphone-alt"></i> Proccessing </a> 
						<a href="order_history?delivered" class="list-group-item"><span class="badge badge-success"><?php echo  $row_count_delivered_orders;?></span> <i class="ti ti-bookmark"></i> Delivered </a> 
						<a href="order_history?cancel" class="list-group-item"><span class="badge badge-danger"><?php echo $row_count_canceled_orders;?></span> <i class="ti ti-bell"></i> Canceled </a> 
						<a href="order_history?all" class="list-group-item"><span class="badge badge-primary"><?php echo $row_count_tos; ?></span> <i class="ti ti-comments"></i> Total Orders </a> 
					</div>
          </div>
      </div>
      <div class="profile-info col-md-9">
          <div class="panel">
              <div class="bio-graph-heading">
                  <h3>Account Overview</h3>
              </div>
              <div class="panel-body bio-graph-info" style="text-align:left">
                     <div class="bs-docs-example col-md-6">
                        <table class="table">
                          <thead>
                            <tr>
                              <th style="font-size:13px; color:#85929E"><i class="fa fa-user"></i> ACCOUNT DETAILS  <a href="#"><i class="fa fa-pencil" style="float:right; font-size:18px; color:#FF9C33"  data-toggle="modal" data-target="#edit_acc_details" ></i></a></th>
                            </tr>
                          </thead>
                          <tbody style="float:left; font-size:15px; color:#85929E">
                            <tr>
                              <td><h4><?php echo $row['firstname'].' '. $row ['lastname'];?></h4></td>
                            </tr>
                            <tr>
                              <td><h5><?php echo $row ['email'];?></h5></td>
                            </tr>
                            <tr>
                                <td><h5><?php echo $row ['phone'];?></h5></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      
                      <div class="bs-docs-example col-md-6">
                        <table class="table">
                          <thead>
                            <tr>
                              <th style="font-size:13px; color:#85929E"><i class="fa fa-map-marker"></i> ADDRESS  <a href="#"><i class="fa fa-pencil" style="float:right; font-size:18px; color:#FF9C33"  data-toggle="modal" data-target="#edit_adrss_details" ></i></a></th>
                            </tr>
                          </thead>
                          <tbody style="float:left; font-size:15px; color:#85929E">
                             <tr>
                              <td><h6><?php echo $row ['shop_number'];?></h6></td>
                            </tr>
                            <tr>
                              <td><h6><?php echo $row ['address'];?></h6></td>
                            </tr>
                            <tr>
                              <td><h6><?php echo $row ['city'];?></h6></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
              </div>
          </div>
          
          
          
        <div>
              <div class="row">
                  <div class="col-md-12">
                      <div class="panel">
                          <div class="panel-body">
                              <div class="bio-desk"><br><br>
                                  <a href="#"  data-toggle="modal" data-target="#edit_password"><h4 style="color:orange; float:left"><b>Change Password</b>  <i class="fa fa-edit" style="font-size:18px; color:gray"></i></h4></a>
                                  <div style="float:right; margin-bottom:35px">
                                     <a href="#" data-toggle="modal" data-target="#logout"><span  class="label label-danger" style="padding: 10px 20px 10px 20px; font-size:15px; margin-bottom:10px">log Out</span></a>
                                  </div>
                                  
                                  
                              </div>
                              
                          </div>
                      </div>
                  </div>
                
              </div>
          </div>
           <br>
  <br> <br>
  <br> <br>
  <br>
          
          
          
          
          
          
          
          
          
          
              
     <div class="modal fade" id="edit_acc_details" role="dialog" >
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="modal-dialog" style="max-width:500px">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title"><b>ACCOUNT DETAILS</b></h4>
            </div>
            <form action="darkcode/update?account_update"  role="form" method="POST">
            <div class="modal-body">
                
            <div class="input-group input-group-lg">
              <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-user"></i></i></span>
              <input type="text"  name="firstname" class="form-control" value="<?php echo $row['firstname'];?>" placeholder="First Name" aria-describedby="sizing-addon1">
            </div>

            <div class="input-group input-group-lg">
              <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-user"></i></i></span>
              <input type="text" name="lastname" class="form-control" value="<?php echo $row['lastname'];?>" placeholder="Last Name" aria-describedby="sizing-addon1">
            </div>
            
            
            <div class="input-group input-group-lg">
              <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-envelope"></i></i></span>
              <input type="email " name="email" class="form-control" value="<?php echo $row['email'];?>" placeholder="Email" aria-describedby="sizing-addon1">
            </div>
            
            
           <div class="input-group input-group-lg">
              <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-phone"></i></i></span>
              <input type="tel" name="phone" class="form-control" value="<?php echo $row['phone'];?>" placeholder="Phone" aria-describedby="sizing-addon1">
            </div>

            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" style="float:left">Cancel</button>
             <button id="submitbtn" type="submit" name="submit" class="btn  btn-warning">Update</button>
            </div>
            </form>
          </div>
          
        </div>
      </div>
      
      
      
      
      
      
      
      
      
      
      
                    
     <div class="modal fade" id="edit_adrss_details" role="dialog" >
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="modal-dialog" style="max-width:500px">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title"><b>ADDRESS DETAILS</b></h4>
            </div>
            <form action="darkcode/update?address_update"  role="form" method="POST">
            <div class="modal-body">
                
            <div class="input-group input-group-lg">
              <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-home"></i></i></span>
              <input type="text" name="shop_number" class="form-control" value="<?php echo $row['shop_number'];?>" placeholder="Shop/Building Number" aria-describedby="sizing-addon1">
            </div>

            <div class="input-group input-group-lg">
              <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-map-marker"></i></i></span>
              <input type="text" name="address" class="form-control" value="<?php echo $row['address'];?>" placeholder="Address" aria-describedby="sizing-addon1">
            </div>
            
            <div class="input-group input-group-lg">
              <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-globe"></i></i></span>
              <input type="text" name="city" class="form-control" value="<?php echo $row['city'];?>" placeholder="City" aria-describedby="sizing-addon1">
            </div>            

            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" style="float:left">Cancel</button>
             <button id="submitbtn" type="submit" name="submit" class="btn  btn-warning">Update</button>
            </div>
            </form>
          </div>
          
        </div>
      </div>
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
        <div class="modal fade" id="edit_password" role="dialog" >
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="modal-dialog" style="max-width:500px">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title"><b>Change Password</b></h4>
            </div>
            <form action="darkcode/update?password_update"  role="form" method="POST">
            <div class="modal-body">
            
                
            <div class="input-group input-group-lg">
              <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-lock"></i></i></span>
              <input type="password" name="old_password" class="form-control" placeholder="Previous Password" aria-describedby="sizing-addon1">
            </div>

            <div class="input-group input-group-lg">
              <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-lock"></i></i></span>
              <input type="password" name="new_password" class="form-control" placeholder="New Password" aria-describedby="sizing-addon1">
            </div>
            
            
            <div class="input-group input-group-lg">
              <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-lock"></i></i></span>
              <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" aria-describedby="sizing-addon1">
            </div>

            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" style="float:left">Cancel</button>
             <button id="submitbtn" type="submit" name="submit" class="btn  btn-warning">Update</button>
            </div>
            </form>
          </div>
          
        </div>
      </div>
      
      
      
      
      
      
      
      
      
      

          
          
          
          
      




  <div class="modal fade" id="logout" role="dialog">
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="modal-dialog" style="max-width:500px">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><b>Confirm Logout</b></h4>
        </div>
        <div class="modal-body">  <h4 class="modal-title">   Do You Want To Logout?</h4></div><br><br>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" style="float:left">Cancel</button>
         <a href="logout"><button class="btn  btn-danger">Log Out</button></a>
        </div>
        
      </div>
      
    </div>
  </div>
  
  
      
          
      </div>
    </div>
    </div>
</div>
</div>
<?php
include "inc/footer.php";
?>