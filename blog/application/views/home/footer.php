



        <!-- Begin Footer Area -->
        <div class="footer-area">
            <div class="footer-top section-space-y-axis-100 text-black" data-bg-color="#e5ddcc">
                <div class="container">
                    <div class="row" style="margin-bottom:-50px">

                        <div class="col-lg-4 col-md-6 col-sm-5">
                            <div class="widget-item">
                                <div class="footer-logo pb-4">
                                    <a href="<?php echo base_url();?>" class="header-logo">
                                        <img src="<?php echo base_url()?>assets/images/logo.webp" alt="daydone logo">
                                    </a>
                                </div>
                                <p class="short-desc mb-2">We are committed to making a difference with customer satifaction, quality products and fast delivery.</p>
                                <div class="widget-contact-info pb-6">
                                    <ul>
                                        <li>
                                            <i class="pe-7s-map-marker"></i>
                                            2, Atiba Layout, UI, Ibadan, Nigeria.
                                        </li>
                                        <li>
                                            <i class="pe-7s-mail"></i>
                                            <a href="mailto://info@daydone.com.ng">info@daydone.com.ng</a>
                                        </li>
                                    </ul>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6  col-sm-5">
                            <div class="widget-item">
                                <h3 class="widget-title mb-5">Menu</h3>
                                <ul class="widget-list-item">
                                    <li>
                                        <a href="https://daydone.com.ng">Shop</a>
                                    </li>
                                    <li>
                                        <a href="https://daydone.com.ng/products">Our Products</a>
                                    </li>
                                    <li>
                                        <a href="https://daydone.com.ng/contact">Contact Us</a>
                                    </li>
                                 
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-5">
                            <div class="widget-item">
                                <h3 class="widget-title mb-5">Customer Services</h3>
                                <ul class="widget-list-item">
                                    <li>
                                        <a href="https://daydone.com.ng/faqs">FAQs</a>
                                    </li>
                                    <li>
                                        <a href="https://daydone.com.ng/shipping">Shipping</a>
                                    </li>
                                    <li>
                                        <a href="https://daydone.com.ng/terms#return_refund">Return & Refund Policy</a>
                                    </li>
                                    <li>
                                 
                                </ul>
                            </div>
                        </div>
                        
                        <div class="col-lg-3 col-md-6  col-sm-5">
                            <div class="widget-item">
                                <h3 class="widget-title mb-5">Useful Links</h3>
                                <ul class="widget-list-item">
                                    <li>
                                        <a href="https://daydone.com.ng/suggest">Suggest Product</a>
                                    </li>
                                   
                                    <li>
                                        <a href="https://daydone.com.ng/terms">Terms & Conditions</a>
                                    </li>
                                 
                                </ul>
                            </div>
                        </div>





                    </div>
                </div>
            </div>
            <div class="footer-bottom py-3" data-bg-color="#bac34e">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="copyright">
                                <span class="copyright-text text-white">© <?php echo date("Y");?> DayDone LLC. | alright reserved.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Area End Here -->

        <!-- Begin Scroll To Top -->
        <a class="scroll-to-top" href="#">
            <i class="fa fa-chevron-up"></i>
        </a>
        <!-- Scroll To Top End Here -->

    </div>

    <!-- Global Vendor, plugins JS -->
    <!-- JS Files
    ============================================ -->
    <!-- Global Vendor, plugins JS -->
    <!-- Minify Version -->
    <script src="<?php echo base_url()?>assets/js/vendor.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/plugins.min.js"></script>
    <!--Main JS (Common Activation Codes)-->
    <script src="<?php echo base_url()?>assets/js/main.min.js"></script>

 


    <script>
        window.onload = function(e){ 
        let categories = "";
        fetch_categories().then(data => {
         data.forEach(function (item, index) {
           let category_link ="<?php echo base_url("categories/");?>"+data[index].id+"?"+data[index].slug;
           categories += '<li><a href="'+category_link+'">'+data[index].name+'<span>'+data[index].count+'</span></a></li>'; 
           });
          document.getElementById("category_section").innerHTML = categories;
          });

         // related_post_function();
          specific_category();
          }
    async function fetch_categories() {
          const response = await fetch('https://blog.daydone.com.ng/backend/wp-json/wp/v2/categories');
          return response.json();
      }
  </script>


</body>
</html>