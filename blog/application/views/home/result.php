<main class="main-content">
            <div class="blog-area section-space-y-axis-100">
                <div class="container">
                    <div class="row">

                    <h3>SEARCH RESULT</h3>

                        <div class="col-lg-3 order-2 pt-10 pt-lg-0">
                            <div class="sidebar-area">
                                <div class="widgets-searchbox mb-9">
                                    <form id="widgets-searchbox" action="<?php echo base_url("result");?>" method="GET">
                                        <input class="input-field" name="search"  type="text" placeholder="Search">
                                        <button class="widgets-searchbox-btn" type="submit">
                                            <i class="pe-7s-search"></i>
                                        </button>
                                    </form>
                                </div>

                                
                                <!---CATEGORIES START----->
                                <div class="widgets-area mb-9">
                                    <h2 class="widgets-title mb-5">Category</h2>
                                    <div class="widgets-item">
                                        <ul class="widgets-category" id="category_section">
                                           
                                         
                                        </ul>
                                    </div>
                                </div>
                                <!---CATEGORIES END----->


                                
                                <div class="widgets-area mb-9">
                                    <h2 class="widgets-title mb-5">Editor's Choice</h2>
                                    <div class="widgets-item">
                                        <div class="swiper-container widgets-list-slider style-2">
                                            <div class="swiper-wrapper">
                                               
                                              
                                         
                                            


                                          <!---------------->
                                            <div class="swiper-slide" id="editor_choice">
                                                    <div class="product-list-item">
                                                    
                                                        
                                                        
                                                   </div>
                                              </div>
                                            <!--------------->  
                                                 
                                                 



                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-9 order-1">
                            <div class="blog-item-wrap list-item-wrap row">
                               
                            









                            
            <?php 
                $num = 0;
               
                do{
                     $post_card ='

                     <div class="col-12 pt-6">
                     <div class="blog-item row g-0">
                         <div class="col-md-6">
                             <div class="blog-img img-zoom-effect h-100">
                                 <a href="'.base_url("post/".$result[$num]['id']).'?'.$result[$num]['slug'].'">
                                     <img class="img-full h-100" src="https://daydone.com.ng/blog/writer/wp-content/uploads/'.$result[$num]['better_featured_image']['media_details']['file'].'" alt="#">
                                 </a>
                         </div>
                         </div>
                         <div class="col-md-6">
                             <div class="blog-content">
                                 <div class="inner-content">
                                     <div class="blog-meta text-dim-gray pb-3">
                                         <ul>
                                             <li class="date"><i class="fa fa-calendar-o me-2"></i>'.date_format(date_create(substr( $result[$num]['date'] ,0,10)), "F d, Y").'</li>
                                             
                                         </ul>
                                     </div>
                                     <h5 class="title mb-4">
                                         <a href="'.base_url("post/".$result[$num]['id']).'?'.$result[$num]['slug'].'">'.$result[$num]['title']['rendered'].'</a>
                                     </h5>
                                     <p class="short-desc mb-5">'.substr($result[$num]['excerpt']['rendered'],0,150) .'...</p>
                                     <div class="button-wrap">
                                         <a class="btn btn-custom-size lg-size btn-dark rounded-0" href="'.base_url("post/".$result[$num]['id']).'?'.$result[$num]['slug'].'">Read More</a>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                    </div>
                    ';
                     //echo $result[$num]['title']['rendered'];
                     echo $post_card;
                     $num++;
                     }
                     while($num <= (count( $result)-1));
             ?>




                            





                                
                                <div class="col-lg-12">
                                    <div class="pagination-area pt-10">
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination justify-content-center">
                                                <li class="page-item">
                                                    <a class="page-link" href="#" aria-label="Previous">
                                                        <span class="fa fa-chevron-left"></span>
                                                    </a>
                                                </li>
                                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#" aria-label="Next">
                                                        <span class="fa fa-chevron-right"></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
  


        <script>
        function specific_category(){ 
        let categories = "";
        fetch_specific_category().then(data => {
         data.forEach(function (item, index) {
           //let category_link ="<?php echo base_url("categories/");?>"+data[index].id+"?"+data[index].slug;
           categories +='<div class="product-list-item"> <div class="product-img img-zoom-effect"> <a href="single-product.html"> <img class="img-full" src="'+data[index].jetpack_featured_media_url+'" alt="Blog Images"> </a> </div> <div class="product-content"> <h5 class="title mb-3"> <a href="blog-detail-left-sidebar.html">'+ data[index].title.rendered+'</a> </h5> <div class="blog-meta text-manatee pb-1"> <ul> <li class="date">'+ truncateString(data[index].date, 10)+'</li> </ul> </div> </div> </div><br>'; 
        });
          document.getElementById("editor_choice").innerHTML = categories;
          });
          }
    async function fetch_specific_category() {
          const response = await fetch('https://blog.daydone.com.ng/backend/wp-json/wp/v2/posts?categories=3');
          return response.json();
      }






      function truncateString(string, limit) {
  if (string.length > limit) {
    return string.substring(0, limit)
  } else {
    return string
  }
}
  </script>






