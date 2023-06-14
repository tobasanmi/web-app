<br>
<br>
   <!-- BLOG AREA START -->
    <div class="ltn__blog-area ltn__blog-item-3-normal mb-120">
        <div class="container">
            <div class="row">

              

            <?php 
                $num = 0;
               
                do{
                     $post_card ='
                     <div class="col-lg-4 col-sm-6 col-12">
                     <div class="ltn__blog-item ltn__blog-item-3">
                         <div class="ltn__blog-img">
                             <a href="'.base_url("post/".$posts[$num]['id']).'?'.$posts[$num]['slug'].'">
                             <img src="https://blog.daydone.com.ng/backend/wp-content/uploads/'.$posts[$num]['better_featured_image']['media_details']['file'].'" alt="#"></a>
                         </div>
                         <div class="ltn__blog-brief">
                             <div class="ltn__blog-meta">
                                 <ul>
                                       <li class="ltn__blog-author">
                                         <a href="#"><i class="far fa-user"></i>by: '.$author['name'].'</a>
                                     </li>
                                     
                                 </ul>
                             </div>
                             <h3 class="ltn__blog-title" style="font-size:20px"><a href="'.base_url("post/".$posts[$num]['id']).'?'.$posts[$num]['slug'].'" class="blog-desc">'.$posts[$num]['title']['rendered'].'</a></h3>
                             <div class="ltn__blog-meta-btn">
                                 <div class="ltn__blog-meta">
                                     <ul>
                                         <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>'.date_format(date_create(substr( $posts[$num]['date'] ,0,10)), "F d, Y").'</li>
                                     </ul>
                                 </div>
                                 <div class="ltn__blog-btn">
                                     <a href="'.base_url("post/".$posts[$num]['id']).'?'.$posts[$num]['slug'].'">Read more</a>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                    ';
                     //echo $posts[$num]['title']['rendered'];
                     echo $post_card;
                     $num++;
                     }
                     while($num <= (count( $posts)-1));
             ?>
               
            </div>

            <!-- 
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__pagination-area text-center">
                        <div class="ltn__pagination">
                            <ul>
                                <li><a href="#"><i class="fas fa-angle-double-left"></i></a></li>
                                <li><a href="#">1</a></li>
                                <li class="active"><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">...</a></li>
                                <li><a href="#">10</a></li>
                                <li><a href="#"><i class="fas fa-angle-double-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
             -->
        </div>
    </div>
    <!-- BLOG AREA END -->
