(function () {
  'use strict';

    //===== Page Loader =====//
    $(window).load(function () {
        // Animate loader off screen
        $(".loader-page").delay(500).fadeOut("slow");
    });
$(window).on('scroll', function () {
  if ($(this).scrollTop() >= 30) {
      $('.header').addClass('active')
  } else {
      $('.header').removeClass('active')
  }
});

  ///// Hero Slides ////




  ///// Sale Slides  /////
  $('.sale-slide').owlCarousel({
      items: 3,
      margin: 15,
      loop: true,
      autoplay: true,
      smartSpeed: 800,
      autoplayTimeout: 5000,
      dots: true,
      nav: false,
      responsive: {
          1400: {
              items: 5,
          },
          992: {
              items: 5,
          },
          768: {
              items: 4,
          },
          480: {
              items: 3,
          },
      },
  });
  ///// Deal Slides /////


  /////// product details slides  /////////

        item_details().then(data => {
        let imagelink = data.name;
        document.getElementById("product_tittle").innerHTML = data.name;
        document.getElementById("Product_price").innerHTML = data.price_html;
        document.getElementById("Product_description").innerHTML = data.description;
        let item_gallary ="";
        data.images.forEach(element => {
          item_gallary += '<div class="single-product-slide"><img src="'+element.src+'" alt=""></div>';
         // console.log(element.src);
        });
        document.getElementById("image_slide_loading").innerHTML = '';
        document.getElementById("item_gallary").innerHTML = item_gallary;
        document.getElementById("product_page_cart_btn").innerHTML = `<span  id='{"title":"`+data.name+`", "qty":1, "price":"`+data.price+`", "id":"`+data.id+`", "image":"`+data.images[0].src+`"}' onclick="add2cart(this.id)"> <a href="cart.html" class="btn btn-cart">ADD TO CART</a> </span>`;
        document.getElementById("product_page_buy_now_btn").innerHTML = `<span  id='{"title":"`+data.name+`", "qty":1, "price":"`+data.price+`", "id":"`+data.id+`", "image":"`+data.images[0].src+`"}' onclick="buy_now(this.id)" class="btn btn-shop">BUY NOW</span>`;



  
   
        $('.product-details-slides').owlCarousel({
          loop: true,
          items:1,
          margin:0,
          stagePadding:0,
          smartSpeed:600,
          onInitialized  : counter,
          onTranslated : counter
        });
            function counter(event) {
                var items     = data.images.length;
                var item      = event.item.index -1;
                if(item > items) {
                    item = item - items
                }
                
                $('#counter').html(item+" / "+items)
            }
  
      });


  async function item_details() {
    let product_id = sessionStorage.getItem("current_product_id");
   // alert(product_id);
    const response = await fetch('https://daydone.com.ng/app/product_details.php?id='+product_id);
    return response.json();
}


  ////// Navbar  /////
  var sideNav = $(".sidebar-nav");
  var Overlay = $(".bg-overlay");
  $("#sidenav-toggle").on("click", function () {
    sideNav.addClass("nav-active");
    Overlay.addClass("active");
});
$("#sidenav-close , #overlay-close").on("click", function () {
  sideNav.removeClass("nav-active");
  Overlay.removeClass("active");

});
///// search popup  /////
$("#search-btn").on("click", function () {
  $('.search-form-item').show();
});
$("#btn-close-search").on("click", function () {
  $('.search-form-item').hide();
});
///// Cart Quantity Button //////
$('.minus-btn').on('click', function (e) {
  e.preventDefault();
  var numProduct = Number($(this).next().val());
  if (numProduct > 1) $(this).next().val(numProduct - 1);
});
$('.plus-btn').on('click', function (e) {
  e.preventDefault();
  var numProduct = Number($(this).prev().val());
  $(this).prev().val(numProduct + 1);
}); 
/////// Data Countdown //////////
 $('[data-countdown]').each(function () {
  var $this = $(this),
      finalDate = $(this).data('countdown');
  $this.countdown(finalDate, function (event) {
      $(this).find(".days").html(event.strftime("%D"));
      $(this).find(".hours").html(event.strftime("%H"));
      $(this).find(".minutes").html(event.strftime("%M"));
      $(this).find(".seconds").html(event.strftime("%S"));
  });
});
////// Contact Form //////// 
  var submitContact = $('#submit-message'),
    message = $('#msg');

  submitContact.on('click', function (e) {
    e.preventDefault();

    var $this = $(this);

    $.ajax({
      type: "POST",
      url: 'contact.php',
      dataType: 'json',
      cache: false,
      data: $('#contact-form').serialize(),
      success: function (data) {

        if (data.info !== 'error') {
          $this.parents('form').find('input[type=text],input[type=email],textarea,select').filter(':visible').val('');
          message.hide().removeClass('success').removeClass('error').addClass('success').html(data.msg).fadeIn('slow').delay(3000).fadeOut('slow');
        } else {
          message.hide().removeClass('success').removeClass('error').addClass('error').html(data.msg).fadeIn('slow').delay(3000).fadeOut('slow');
        }
      }
    });
  });


})();



function search_func() {
  let search_input = document.getElementById("search_input").value;
  sessionStorage.setItem("search_input", search_input);
  //window.location.href = "result.html";
  
  //alert(search_input);
  
}