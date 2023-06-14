                                        <!-- /homeblock1-->
                                        <section class="w3l-homeblock1 py-sm-5 py-4">
                        <div class="container py-md-4">
                            <div class="grids-area-hny main-cont-wthree-fea row">
                               
                <?php 
                $num = 0;
               
                do{
                    $post_card ='
                               <div class="col-lg-3 col-6 grids-feature" style="padding:20px; width:50%; margin:0 auto;">
                                    <a href="'. trim($product[$num]['content']['rendered'],"<p></p>\n") .'">
                                        <div class="">
                                        <img class="card-img-bottom d-block radius-image-full" src="https://blog.socialsoln.com/wp-content/uploads/'.$product[$num]['better_featured_image']['media_details']['file'].'"
                                        alt="'.$product[$num]['title']['rendered'].'" />   
                                         </div>
                                    </a>
                                
                                    <div  style="padding-top:10px; width:100%; margin:0 auto; text-align:center">
                                    <p class="blog-desc">'.$product[$num]['title']['rendered'].'</p>
                                    <a href="'. trim($product[$num]['content']['rendered'],"<p></p>\n") .'" class="more btn btn-small btn-primary mb-sm-0 mb-4" style="margin-top:10px">Learn More</a>
                                    </div>
                                </div>
                     
                    ';
                    // $post_card = $product[$num]['id'];
                    //echo $result[$num]['title']['rendered'];
                    echo $post_card;
                    $num++;
                    }
                    while($num <= (count( $product)-1));
                     ?>
        </div>
                        </div>
                    </section>
                    <!-- //homeblock1-->

<!-- footer-28 block -->