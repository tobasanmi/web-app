<?php
if (!isset($_SESSION['farmer_id']) && !isset($_SESSION['is_loggedfarm_in'])) {
  header("Location: login");
} else {
  $farmer_loggedin_id = $_SESSION['farmer_id'];
  // echo "<script>alert(".$farmer_loggedin_id.")</script>";
  $query_farmer_details = mysqli_query($cxn, "SELECT * FROM farmers WHERE farmer_id=$farmer_loggedin_id");
	if(mysqli_num_rows($query_farmer_details) > 0){
  	  $dt = mysqli_fetch_assoc($query_farmer_details);	
	  $farmer_loggedin_id = $dt['farmer_id'];
	  $farmer_address = $dt['farmer_address'];
	  $farmer_phone_number = $dt['farmer_phone_number'];	  
	  $farmer_email = $dt['farmer_email'];
	  $last_name = $dt['farmer_last_name'];
	  $first_name = $dt['farmer_first_name'];
	  $logo = $dt['logo'];
	  $activation = $dt['activation'];
		
	  if($logo == ''){
		  $farmerlogo = 'https://res.cloudinary.com/o-bounce-technologies/image/upload/v1569571051/myVTU/profile-images/avatar.png';
	  }else{
		  $farmerlogo = $logo;
	  }
		
	 if($activation == 0){
		header("Location: login"); 
	 }
		
	}else{
		header("Location: login");
	}
}
?>