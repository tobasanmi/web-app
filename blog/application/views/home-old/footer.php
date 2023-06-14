<!-- footer-28 block -->
<section class="app-footer">
    <footer class="footer-28 py-5">
      <div class="footer-bg-layer">
        <div class="container py-lg-3">
          <div class="row footer-top-28">
            <div class="col-lg-4 footer-list-28 copy-right mb-lg-0 mb-sm-5 mt-sm-0 mt-4">
              <a class="navbar-brand mb-3" href="<?php echo base_url();?>"> SocialSoln</a>
                
                <!-- <span class="fa fa-newspaper-o"></span> Social Solution</a> -->
              <p class="copy-footer-28"> © <?php echo date('Y'); ?>. All Rights Reserved. </p>
              <h5 class="mt-2">Crafted With Magic By <a href="">SkyCodes</a></h5>
            </div>
            <div class="col-lg-8 row">
              <div class="col-sm-4 col-6 footer-list-28">
                <h6 class="footer-title-28">Smart links</h6>
                <ul>
                  <li><a href="<?php echo base_url("about");?>">The Authors</a></li>
                  <li><a href="<?php echo base_url("contact");?>">Get in touch</a></li>
                  <li><a href="<?php echo base_url("privacy");?>">Privacy Policy</a></li>
                 </ul>
              </div>
              <div class="col-sm-4 col-6 footer-list-28">
                <h6 class="footer-title-28">Categories</h6>
                <ul id="category_section">

                </ul>
              </div>
              <div class="col-sm-4 col-6 footer-list-28 mt-sm-0 mt-4">
                <h6 class="footer-title-28">Social Media</h6>
                <ul class="social-icons">
                  <li class="facebook"><a href="https://web.facebook.com/socialsln"><span class="fa fa-facebook"></span> Facebook</a></li>
                  <li class="dribbble"><a href="https://instagram.com/Socialsoln"><span class="fa fa-instagram"></span> Instagram</a></li>
               </ul>
  
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </footer>
  <!--  Fetch Categories -->
  <script>
        window.onload = function(e){ 
        let categories = "";
        fetch_categories().then(data => {
         data.forEach(function (item, index) {
           let category_link ="<?php echo base_url("categories/");?>"+data[index].id+"?"+data[index].slug;
           categories += '<li><a href="'+category_link+'">'+data[index].name+'</a></li>'; 
           });
          document.getElementById("category_section").innerHTML = categories;
          });

          related_post_function();
          }
    async function fetch_categories() {
          const response = await fetch('https://www.blog.socialsoln.com/wp-json/wp/v2/categories');
          return response.json();
      }
  </script>


    <!-- move top -->
    <button onclick="topFunction()" id="movetop" title="Go to top">
      <span class="fa fa-angle-up"></span>
    </button>
    <script>
      // When the user scrolls down 20px from the top of the document, show the button
      window.onscroll = function () {
        scrollFunction()
      };
  
      function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
          document.getElementById("movetop").style.display = "block";
        } else {
          document.getElementById("movetop").style.display = "none";
        }
      }
  
      // When the user clicks on the button, scroll to the top of the document
      function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
      }
    </script>
    <!-- /move top -->
  </section>
  <!-- //footer-28 block -->
  
  <!-- disable body scroll which navbar is in active -->
  <script>
    $(function () {
      $('.navbar-toggler').click(function () {
        $('body').toggleClass('noscroll');
      })
    });
  </script>
  <!-- disable body scroll which navbar is in active -->
  
  <!-- Template JavaScript -->
  <script src="<?php echo base_url("assets/js/jquery-3.3.1.min.js");?>"></script>
  
  <!-- theme changer js -->
  <script src="<?php echo base_url("assets/js/theme-change.js");?>"></script>
  <!-- //theme changer js -->
  
  <!-- courses owlcarousel -->
  <script src="<?php echo base_url("assets/js/owl.carousel.js");?>"></script>
  
  <!-- script for testimonials -->
  <script>
    $(document).ready(function () {
      $('.owl-testimonial').owlCarousel({
        loop: true,
        margin: 0,
        nav: true,
        responsiveClass: true,
        autoplay: false,
        autoplayTimeout: 5000,
        autoplaySpeed: 1000,
        autoplayHoverPause: false,
        responsive: {
          0: {
            items: 1,
            nav: false
          },
          480: {
            items: 1,
            nav: false
          },
          667: {
            items: 1,
            nav: true
          },
          1000: {
            items: 1,
            nav: true
          }
        }
      })
    })
  </script>
  <!-- //script for testimonials -->
  <!-- bootstrap -->
  <script src="<?php echo base_url("assets/js/bootstrap.min.js");?>" ></script>
  </body>
 </html>