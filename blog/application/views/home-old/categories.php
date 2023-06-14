<!-- //header -->
<div class="w3l-homeblock2 py-5">
    <div class="container pt-md-4 pb-md-5">
        <!-- block -->
         <div class="row">
             
            <?php 
                $num = 0;
               
                do{
                     $post_card ='
                    <div class="col-lg-4 col-md-6 mt-lg-5 mt-4">
                    <div class="card">
                        <div class="card-header p-0 position-relative">
                            <a href="'.base_url("post/".$result[$num]['id']).'?'.$result[$num]['slug'].'">
                                <img class="card-img-bottom d-block radius-image-full" src="'.$result[$num]['better_featured_image']['media_details']['sizes']['medium']['source_url'].'"
                                    alt="Card image cap">
                            </a>
                        </div>
                        <div class="card-body blog-details">
                            <a href="'.base_url("post/".$result[$num]['id']).'?'.$result[$num]['slug'].'" class="blog-desc">'.$result[$num]['title']['rendered'].'
                            </a>
                            <p>'. substr( $result[$num]['excerpt']['rendered'] ,0,140).'...<a href="'.base_url("post/".$result[$num]['id']).'?'.$result[$num]['slug'].'"><b>Read More <span style="font-size:13px">>></span></b></a></p>
                            <div class="author align-items-center mt-3 mb-1">
                                <img src="'.$author['avatar_urls']['96'].'" alt="" class="img-fluid rounded-circle" style="height:40px" />
                                <ul class="blog-meta" style="margin-left:-25px; font-size:13px">
                                    <li>
                                   '.$author['name'].'
                                    </li>
                                    <li class="meta-item blog-lesson">
                                        <span class="meta-value">'.date_format(date_create(substr( $result[$num]['date'] ,0,10)), "F d, Y").'</span>
                                    </li>
                                </ul>
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
         
        </div>
        <!--
        <ul class="site-pagination text-center mt-md-5 mt-4">
            <li><span aria-current="page" class="page-numbers current">1</span></li>
            <li><a class="page-numbers" href="#page2">2</a></li>
            <li><a class="page-numbers" href="#page3">3</a></li>
            <li><span class="page-numbers dots">…</span></li>
            <li><a class="page-numbers" href="#page7">7</a></li>
            <li><a class="next page-numbers" href="#next">Next »</a></li>
        </ul>
        -->
    </div>
</div>
<!-- footer-28 block -->