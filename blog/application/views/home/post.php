        <!-- Begin Main Content Area -->
        <main class="main-content">
           
            <div class="blog-area section-space-y-axis-100">
                <div class="container">
                    <div class="row">



                        <div class="col-lg-3 order-2 pt-10 pt-lg-0">
                            <div class="sidebar-area">
                                <div class="widgets-searchbox mb-9">
                                    <form id="widgets-searchbox" action="#">
                                        <input class="input-field" type="text" placeholder="Search">
                                        <button class="widgets-searchbox-btn" type="submit">
                                            <i class="pe-7s-search"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="widgets-area mb-9">
                                    <h2 class="widgets-title mb-5">Related Posts</h2>
                                    <div class="widgets-item">
                                        <div class="swiper-container widgets-list-slider style-2">
                                            <div class="swiper-wrapper">
                                           
                                            <?php
                                               if(count($post_details['jetpack-related-posts']) > 0){
                                                                                             $num = 0;
                                             do {
                                                     $relatedposts = '
                                                               <div class="swiper-slide">
                                                                    <div class="product-list-item">
                                                                        <div class="product-img img-zoom-effect">
                                                                            <a href="'.base_url("post/".$post_details['jetpack-related-posts'][$num]['id']).'?'.$post_details['jetpack-related-posts'][$num]['title'].'">
                                                                                <img class="img-full" src="'.$post_details['jetpack-related-posts'][$num]['img']['src'].'">
                                                                            </a>
                                                                        </div>
                                                                        <div class="product-content">
                                                                            <h5 class="title mb-3">
                                                                                <a href="'.base_url("post/".$post_details['jetpack-related-posts'][$num]['id']).'?'.$post_details['jetpack-related-posts'][$num]['title'].'">'.$post_details['jetpack-related-posts'][$num]['title'].'</a>
                                                                            </h5>
                                                                            <div class="blog-meta text-manatee pb-1">
                                                                                <ul>
                                                                                    <li class="date">May 21, 2021</li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                             ';
                                               echo $relatedposts;
                                               $num++;
                                             }  
                                             while($num <= (count( $post_details['jetpack-related-posts'])-1));   
                                               }
                                               else{
                                                    echo 'No Related Posts for this article';
                                               }

                                            ?>


                                        </div>
                                    </div>
                                 </div>
                              </div>
                            </div>
                        </div>
                              



                        
                        
                        
                        
                        
                        
                        
                              <div class="col-lg-9 order-1">
                            <div class="blog-detail-item">
                                <div class="blog-img">
                                    <img class="img-full" src="<?php echo $post_details['jetpack_featured_media_url'];?>" alt="Blog Image">
                                </div>
                                <div class="blog-content text-start pb-0">
                                    <div class="blog-meta text-dim-gray pb-3">
                                        <ul>
                                            <li class="date"><i class="fa fa-calendar-o me-2"></i><?php echo date_format(date_create(substr( $post_details['date'] ,0,10)), "F d, Y");?></li>
                                            
                                        </ul>
                                    </div>
                                    <h5 class="title mb-4">
                                        <?php echo $post_details['title']['rendered'];?>
                                    </h5>
                                



                                    <?php echo $post_details['content']['rendered'];?>


                                    
                                    
                                    <div class="tag-wtih-social">
                                    
                                        <div class="social-link">
                                           
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- Main Content Area End Here -->
