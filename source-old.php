<?php
$page_title = "Agric Wishlist";
include "inc/header.php";
?>

   <!--banner-->
<div class="banner-top">
	<div class="container">
		<h3 >Sourcing for product</h3>
		<h4><a href="./">Home</a><label>/</label>Source a product</h4>
		<div class="clearfix"> </div>
	</div>
</div>

   <!--login-->

   <div class="check-out">
		<div class="container">
		     <div class="spec ">
				<h3>Sourcing for product</h3>
					<div class="ser-t">
						<b></b>
						<span><i></i></span>
						<b class="line"></b>
					</div>
					<br>
					<br>
					 <h4>Offsite Agro Products Sourcing</h4><p>This is for enterprise that need a particular Agriculture products or primary derivatives in large tonnage and willing to pay for its research and sourcing, note: this information will be use to get it sourced and not exclusive to you</p>
					 <br>
					 <br>
			<div class="form-w3agile">
			    <div class="row">
			        <div class="col-lg-4"></div>
			        <div class="col-lg-5">
			       <div class="card">
			           <div class="card-body">
			               <div id="result"></div>
			               <form style="margin:0 auto;" id="suggest_form">
			                   <div class="form-group">
			                       <input type="number" name="phone" id="phone" class="form-control" placeholder="Phone Number">
			                       <div class="text-danger pull-left" id="error_phone"></div>
			                       <div class="text-danger pull-left" id="error_phone_val"></div>
			                   </div>
			                   
			                   <div class="form-group">
			                       <input type="email" name="email" id="email" class="form-control" oninvalid="InvalidMsg(this);" 
                   oninput="InvalidMsg(this);" placeholder="Email Address" required>
			                       <div class="text-danger pull-left" id="error_email"></div>
			                   </div>
			                   
			                   <div class="form-group">
			                       <input type="text" name="p_name" id="p_name" class="form-control" placeholder="Product Name" required>
			                       <div class="text-danger pull-left" id="error_pname"></div>
			                   </div>
			                   
			                   <div class="form-group">
			                       <input type="text" name="region" id="region" class="form-control" placeholder="Product Quantity">
			                       <div class="text-danger pull-left" id="error_region"></div>
			                   </div>
			                   <button class="pull-center btn btn-lg btn-success" type="button" name="submit_btn" id="submit_btn">Pay to Source</button>
			               </form>
			               
			           </div>
			       </div>
			   </div>
			   <div class="col-lg-4"></div>
			    </div>
			   
			    
			</div>
			
			 <script>
        function InvalidMsg(textbox) {
  
            if (textbox.value === '') {
                textbox.setCustomValidity
                      ('Entering an email-id is necessary!');
            } else if (textbox.validity.typeMismatch) {
                textbox.setCustomValidity
                      ('Please enter an email address which is valid!');
            } else {
                textbox.setCustomValidity('');
            }
  
            return true;
        }
    </script>
    
<script>

$('#submit_btn').click(function() {
                      
$('#submit_btn').attr('disabled', true);
            
var count_error = 0;

var data = $('#suggest_form').serialize() + '&submit_btn=submit_btn';
            
if($('#phone').val() == ''){
              
$('#error_phone').text('Field is required!');
              
count_error++;
              
}
else
{
$('#error_phone').text('');
}
            
if($('#email').val() == ''){
              
$('#error_email').text('Field is required!');
              
count_error++;
              
}
else
{
$('#error_email').text('');
}
            
if($('#p_name').val() == ''){
              
$('#error_pname').text('Field is required!');
              
count_error++;
              
}
else
{
$('#error_pname').text('');
}


if($('#region').val() == ''){
              
$('#error_region').text('Field is required!');
              
count_error++;
              
}
else
{
$('#error_region').text('');
}

if(count_error ==0){

$.ajax({

url: 'darkcode/wish.inc.php',

type: 'post',

data: data,
              
success: function(response) {
                
$("#result").html(response);
          
$('#submit_btn').attr('disabled', false);
                
$('#suggest_form')[0].reset();
                
setTimeout(function() {
  
$('#result').html('');         
                
}, 4000);

}

});

}

else

{

$('#submit_btn').attr('disabled', false);

return false;

}

});

</script>
<?php
                echo "</ul>";
                ?>
            </nav>
        </div>
    </div>
</div>
<?php
include "inc/footer.php";
?>