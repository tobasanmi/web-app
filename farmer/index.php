<?php
include "inc/header.php";
?>

<div class="main-panel">
  <div class="main-content">
    <div class="content-wrapper">
      <div class="container-fluid">
        <!--Statistics cards Starts-->
        <div class="row">
          <div class="col-xl-3 col-lg-3 col-md-3">
            <div class="card bg-white">
              <div class="card-body">
                <div class="card-block pt-2 pb-0">
                  <div class="media">
                    <div class="media-body white text-left">
                      <?php
                        $myproduct = mysqli_num_rows(mysqli_query($cxn, "SELECT * FROM products WHERE seller_id='$farmer_loggedin_id'"));
                      	echo '<h4 class="font-medium-5 card-title mb-0">'.$myproduct.'</h4>';
                      ?>
                      <span class="grey darken-1">Total Product(s)</span>
                    </div>
                    <div class="media-right text-right">
                      <i class="icon-cup font-large-1 primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-3">
            <div class="card bg-white"> 
              <div class="card-body">
                <div class="card-block pt-2 pb-0">
                  <div class="media">
                    <div class="media-body white text-left">
						<?php
							$sql = mysqli_query($cxn, "select sum(amount) as am from trans where sellerid= '$farmer_loggedin_id' and status  > 0");
							$dd = mysqli_fetch_assoc($sql); $mysale = $dd['am'];
                      		echo '<h4 class="font-medium-5 card-title mb-0">&#8358;'.$mysale.'</h4>';
						?>
                      <span class="grey darken-1">Total Sales</span>
                    </div>
                    <div class="media-right text-right">
                      <i class="icon-wallet font-large-1 primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
		  <div class="col-xl-3 col-lg-3 col-md-3">
            <div class="card bg-white"> 
              <div class="card-body">
                <div class="card-block pt-2 pb-0">
                  <div class="media">
                    <div class="media-body white text-left">
						<?php
							$sql = mysqli_query($cxn, "select sum(amount) as pam from trans where sellerid= '$farmer_loggedin_id' and status = 2");
							$dd = mysqli_fetch_assoc($sql); $payout = $dd['pam'];
                      		echo '<h4 class="font-medium-5 card-title mb-0">&#8358;'.$payout.'</h4>';
						?>
                      <span class="grey darken-1">Total Payout</span>
                    </div>
                    <div class="media-right text-right">
                      <i class="icon-wallet font-large-1 success"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
			
			<div class="col-xl-3 col-lg-3 col-md-3">
            <div class="card bg-white"> 
              <div class="card-body">
                <div class="card-block pt-2 pb-0">
                  <div class="media">
                    <div class="media-body white text-left">
						<?php
							$sql = mysqli_query($cxn, "select sum(amount) as ppam from trans where sellerid= '$farmer_loggedin_id' and status = 1");
							$dd = mysqli_fetch_assoc($sql); $pendingpayout= $dd['ppam'];
                      		echo '<h4 class="font-medium-5 card-title mb-0">&#8358;'.$pendingpayout.'</h4>';
						?>
                      <span class="grey darken-1">Pending Payout</span>
                    </div>
                    <div class="media-right text-right">
                      <i class="icon-wallet font-large-1 danger"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--Statistics cards Ends-->
        <div class="row">
          <div class="col-xl-12 col-md-12 col-sm-12">
            <div class="card p-3">
              <div class="card-header">
                <h4>Recent Products</h4>
              </div>
              <div class="card-body">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Products</th>
                      <th>Product Category</th>
                      <th>Price</th>
                      <th>Number of Click</th>
                      <th>Quantity Sold</th>
                      <th>Rating</th>
                      <th>Price History</th>                      
                      <th>Action</th>                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    	$cnt = 0;
                    	$sql = mysqli_query($cxn, "SELECT * FROM products WHERE seller_id=$farmer_loggedin_id ORDER BY time DESC LIMIT 10");
					  if(mysqli_num_rows($sql) > 0){
                    	while ($fetch = mysqli_fetch_assoc($sql)){
							$prdid = $fetch['product_id']; $prdname = $fetch['product_name'];
							$product_category = $fetch['product_category']; $price = $fetch['price'];
							$no_of_clicks = $fetch['no_of_clicks']; $qnty_sold = $fetch['qnty_sold'];
							$rating = $fetch['no_of_rating_clicks']; $price_history = $fetch['price_history'];
							$cnt++;
							  echo '
							  <tr>
								<td scope="row">'.$cnt.'</td>
								 <td>'.$prdname.'</td>
								 <td>'.$product_category.'</td>
								 <td>&#8358; '.$price.'</td>
								 <td>'.$no_of_clicks.'</td>
								 <td>'.$qnty_sold.'</td>
								 <td>'.$rating.'</td>
								 <td>'.$price_history.'</td>
								<td><a href="edit-product?pid='.$prdid.'" class="btn btn-sm btn-info">Edit</a></td>
							  </tr>
							  ';
						}
						  
					  }
                    ?>                   
                </table>
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