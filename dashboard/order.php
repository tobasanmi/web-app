<?php
include "inc/header.php";

 if(!isset($_SESSION['super_admin_id']))
        {
            header("Location: signin.php");
        }
    
       $sql = "SELECT * FROM msg WHERE state ='new' ";
       $result = mysqli_query($cxn,$sql);
      $msgcounter = mysqli_num_rows($result);
      
       if ($msgcounter == 0) {
       $msgcount= "";
     }
     else {
       $msgcount= $msgcounter;
     }
     
       
  $sqlx = "SELECT * FROM sales ORDER BY timestamp DESC";
	  $resultx = mysqli_query($cxn,$sqlx);  
	  $msgcounterx = mysqli_num_rows($resultx); 

	include 'inc/sidebar.php';
?>  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><i class="fa fa-cart-plus "></i> Add New Product</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
       <div class="col-md-6 col-md-offset-3">
		<div class="login-panel panel panel-default">
			<div class="panel-heading" style="background-color:#B1C4FF">
				<h3 class="panel-title" style="font-size:12px; color:#ffffff;"><center><b>Total Order: <span><?php echo $msgcounterx; ?></span></b></center></h3>
			</div>
			<div class="panel-body">
            <div class="table-responsive row">
                <table class="table table-bordered">
                    <tr>
                        <th>Sales</th>
                        <th>Status</th>
                    </tr>
                    <?php  
             while($row = mysqli_fetch_assoc($resultx)){

              echo"<tr>
              <td><a href='orderdetails.php?".$row['id']."' style='color:dimgray'><span class='text'>₦ ".$row['amount']."</span><span class='text' style=' font-size:11px'>(".$row['paymthd'].")</span><span class='text' style='float:right; padding-right:10px; font-size:11px'>".$row['timestamp']."</span></a></td>
              <td>". $row['status'] ." </td>
              </tr>
              "; 
            
             
             }
             
              
               
                ?>
                </table>
            </div>
            
                       </div>
                     </div>
                    </div> 
            
      </div>
      <!-- /.row -->
      <!-- Main row -->

      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
  include "inc/footer.php";
  ?>