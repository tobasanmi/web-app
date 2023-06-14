<?php
include "inc/header.php";
?>

<style>
	.card .card-body {
    padding: 20px;
    height: auto;
	}
	#profileDisplay{ 
        width: 120px; 
        height: 120px; border-radius: 50%; 
        top: -15px; cursor: pointer;
    }
    #centered {
      position: absolute;
      display: none;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }
    .form-control:disabled, .form-control[readonly] {
    background: #fff!important;
    border-color: cornflowerblue!important;
    }
    .card .profile-picture {
    text-align: center;    
    margin: 0 auto;
    left: 0;
    right: 0;     
    width: 100%;
    box-sizing: border-box;
        }
    #updateImage{display: none;}
	
</style>

<div class="main-panel">
  <div class="main-content">
    <div class="content-wrapper">
      <div class="container-fluid">
        <!--Statistics cards Starts-->
        <div class="row">
          <div class="col-md-6 offset-md-3">
            <div class="card">
              <div class="card-header p-2">
                <h2>Profile</h2>
              </div>
              <div class="card-body">
				  <?php
				  		if (isset($_POST['update_farmer_profile'])) {
						  $farmer_first_name = filter_var(htmlentities($_POST['farmer_firstname']), FILTER_SANITIZE_STRING);
						  $farmer_last_name = filter_var(htmlentities($_POST['farmer_lastname']), FILTER_SANITIZE_STRING);
						  $farmer_phone_number = filter_var(htmlentities($_POST['farmer_phone_number']), FILTER_SANITIZE_STRING);
						  $farmer_address = filter_var(htmlentities($_POST['farmer_address']), FILTER_SANITIZE_STRING);

						  $farmer_first_name = mysqli_real_escape_string($cxn, $farmer_first_name);
						  $farmer_last_name = mysqli_real_escape_string($cxn, $farmer_last_name);
						  $farmer_phone_number = mysqli_real_escape_string($cxn, $farmer_phone_number);
						  $farmer_address = mysqli_real_escape_string($cxn, $farmer_address);


						  $query_farmer_update = mysqli_query($cxn, "UPDATE farmers SET farmer_first_name='$farmer_first_name',farmer_last_name='$farmer_last_name',farmer_phone_number='$farmer_phone_number',farmer_address='$farmer_address' WHERE farmer_id='$farmer_loggedin_id'");
						  
						  if (!$query_farmer_update) {
							echo '<div class="alert alert-danger bg-danger text-white">Error updating your profile. Try again later..</div>';
						  } else {
							echo '<div class="alert alert-success bg-success text-white">Profile successfully updated. <a href="profile">Refresh</a></div>'; 
						  }
						}
				  ?>
				 <div class="profile-picture text-center">
					<div class="avatar avatar-xl" style="text-align:center">
						<?php 	
							echo '
							<form method="post" enctype="multipart/form-data">              
							<img src="'.$farmerlogo.'" alt="Profile Image" onclick="triggerUpload()" id="profileDisplay" class="rounded-circle" style="max-width:100px; max-height:100px;"><br>
							<a href="#" onclick="triggerUpload()" title="edit picture" class="btn btn-sm mt-1 font-weight-bold">Edit</a>
							  <br><a type="submit" id="updateImage" name="saveImage"><button class="btn btn-outline-primary btn-sm">Save</button></a>
							  <div id="centered" class="font-weight-bold text-white" style="display:block;"><i class="fa fa-camera fa-2x mb-3"></i></div>
							  <input type="file" class="custom-file-input" id="image" onchange="displayImage(this)" name="image" style="display: none;">
							  </form>
							';?>


						<!--<form action="" method="post" enctype="multipart/form-data"> 
							<input type="file" id="myFile" name="file" />
							<input type="submit" />
						</form>-->
					</div>                                                  
				</div>      
				  <div id="imageStatus"></div>
                <form action="" method="post"> 
                  <div class="row">                    
                      <div class="form-group col-6">
                        <input type="text" name="farmer_firstname" id="" class="form-control" placeholder="First Name" aria-describedby="helpId" value="<?php echo $first_name;?>" required>
                      </div>
						<div class="form-group col-6">
							<input type="text" name="farmer_lastname" id="" class="form-control" placeholder="Last Name" aria-describedby="helpId" value="<?php echo $last_name;?>" required>
						  </div>
					</div> 
				<div class="row">                    
                      <div class="form-group col-6">
                        <input type="email" name="farmer_email" id="" class="form-control" placeholder="Email Address" aria-describedby="helpId" readonly value="<?php echo $farmer_email; ?>" required>
                      </div>       
                      <div class="form-group col-6">
                        <input type="number" name="farmer_phone_number" id="" class="form-control" placeholder="Phone Number" min="7009999999" max="9999999999" aria-describedby="helpId" value="<?php echo $farmer_phone_number;?>" required>
                      </div>
                  </div>     				                      				
                    <div class="form-group">
                      <textarea name="farmer_address" id="" class="form-control" placeholder="Farm Address" cols="150" rows="4" required><?php echo $farmer_address;?></textarea>
                    </div>                  
                  <div class="col text-center">
                    <button type="submit" class="btn btn-primary" name="update_farmer_profile">Update</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!--Statistics cards Ends-->
      </div>
    </div>
  </div>


  <?php
  include "inc/footer.php";
  ?>
	
<script type="application/javascript">
	  /*uload image*/
	function triggerUpload() {		
		document.querySelector('#image').click();
	}

	function displayImage(e) {
		if (e.files[0]) {
			var reader = new FileReader();

			reader.onload = function(e) {
				document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
				document.getElementById("updateImage").style.display = "inline-block";
			}
			reader.readAsDataURL(e.files[0]);
		}
	}
	/*image overlay*/
	document.querySelector("#profileDisplay").addEventListener("mouseover", function() {
		document.getElementById("centered").style.display = "block";
	});
	document.querySelector("#profileDisplay").addEventListener("mouseout", function() {
		document.getElementById("centered").style.display = "none";
	});


	$(function() {
		$('#updateImage').on('click', function() {
			//alert('yeye');
			var file_data = $('#image').prop('files')[0];
			//alert(file_data);
			if (file_data != undefined) {
				var form_data = new FormData();
				form_data.append('image', file_data);
				$.ajax({
					type: 'POST',
					url: 'uploadlogo',
					dataType: 'text', // what to expect back from the PHP script, if anything
					contentType: false,
					processData: false,
					data: form_data,
					beforeSend: function() {
						$('#imageStatus').html('<p class="text-info font-weight-bold text-center"><i class="fa fa-spinner fa-spin"></i> uploading....</p>');
					},
					success: function(response) {
						document.getElementById("imageStatus").innerHTML = response;						
						document.getElementById("updateImage").style.display = 'none';
					}
				});
			} else {
				document.getElementById("imageStatus").innerHTML = '<div class="text-danger" id="noteout">No image selected for upload</div>';
			}
			return false;
		});
	});	
</script>