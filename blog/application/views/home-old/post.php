<?php
/* 
$post_details['id'];
'.$post_details['title']['rendered'].'
*/

echo '
     <section class="text-11 py-5">
        <div class="text11 py-lg-5 py-md-4">
            <div class="container">
                <div class="blog-title px-md-5">
                    <h3 class="title-big">'.$post_details['title']['rendered'].'</h3>
                    <ul class="blog-list">
                        <li>
                            <p> Posted on <strong>'.date_format(date_create(substr( $post_details['date'] ,0,10)), "F d, Y").'</strong></p>
                        </li>
                        <li>
                            <p> By <strong>'.$post_details['_embedded']['author'][0]['name'].'</strong></p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="image mb-sm-5 mb-4">
                <img src="'.$post_details['better_featured_image']['source_url'].'" alt="" class="img-fluid radius-image-full" style="width:100%" />
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-10"  style="width:100%; margin: 0 auto">
                        <div class="text11-content">

                        '.$post_details['content']['rendered'].'
                             
                        
                        <div class="social-share-blog mt-5">

                                <ul class="column3 social m-0 p-0">
                                    <li>
                                        <p class="m-0 mr-sm-4 mr-2">Share this post :</p>
                                    </li>
                                    <li><a href="#facebook" class="facebook"><span class="fa fa-facebook-square"></span></a>
                                    </li>
                                    <li><a href="#twitter" class="twitter"><span class="fa fa-twitter"></span></a></li>
                                    <li><a href="#linkedin" class="linkedin"><span class="fa fa-linkedin"></span></a></li>
                                    <li><a href="#envelope" class="mail"><span class="fa fa-envelope"></span></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="row">
                        <div class="col-lg-12">
                          <div class="comments">
                              <h3 class="aside-title" id ="comment_count"></h3>
                              <div class="comments-grids">
                                  <div class="media-grid">
                                  <div id="comment_section">
                                  </div>



                                  </div>
                               </div>
                           </div>
                         </div>
                       </div>


                       <div class="leave-comment-form" id="comment">
                       <h3 class="aside-title">Leave a reply</h3>
                       <form action="#" method="post">
                           <div class="input-grids">
                               <div class="form-group">
                                   <input type="text" name="Name" class="form-control" placeholder="Your Name"
                                       required="">
                               </div>
                               <div class="form-group">
                                   <input type="email" name="Email" class="form-control" placeholder="Email"
                                       required="">
                               </div>
                               <div class="form-group">
                                   <textarea id="comment_box" name="Comment" class="form-control" placeholder="Your Comment"
                                       required=""></textarea>
                               </div>
                           </div>
                           <div class="submit text-right">
                               <button class="btn btn-style btn-primary">Post Comment</a>
                           </div>
                       </form>
                   </div>



                    </div>
                </div>



            </div>
        </div>
     </section>
';
?>

<!-- //single post -->
<div class="w3l-homeblock2 py-5">
    <div class="container py-lg-5 py-md-4">
        <h3 class="section-title-left mb-4">You may also like </h3>
        <div class="row" id="related_post_section">
           
            

 

            
        </div>
    </div>
</div>
<!-- footer-28 block -->


<script>


  function related_post_function(){ 
        let comments = "";
        let related_post = "";
        fetch_comments().then(data => {
        data.forEach(function (item, index) {
            document.getElementById("comment_count").innerHTML ="Recent comments ("+data.length+")";
            let date = data[index].date;
            let clean_date = new Date(data[index].date);
          comments += '<div class="media"><div class="media-body comments-grid-right"> <h5>'+data[index].author_name +'</h5> <ul class="p-0 comment"> <li class="">'+ clean_date.toDateString().split('T')[0] +'</li> <li> <a href="#comment" class="text-primary"><label for="comment_box">Reply</label></a> </li> </ul> <p>'+data[index].content.rendered+'</p> </div></div>'; 
                    });

       document.getElementById("comment_section").innerHTML = comments;
     });


  


    fetch_category_id().then(data => {
        data.forEach(function (item, index) {
            related_posts  ="";
            fetch_related_posts( data[index].id).then(data => {
                data.forEach(function (item, index) { 
                  //  alert(data[index].id);
                  if (data[index].id === <?php echo $post_details['id'];?>) {
                      
                  }
                  else{
                     let post_link ="<?php base_url("post")?>"+data[index].id+"?"+data[index].slug;
                     let text = data[index].excerpt.rendered;
                     let excerpt = text.slice(0, 140);
                     related_posts += '<div class="col-lg-4 col-md-6 mt-md-0 mt-4" style="padding-bottom:40px"> <div class="card"> <div class="card-header p-0 position-relative"> <a href="'+post_link+'">  <img class="card-img-bottom d-block radius-image-full" src="https://blog.socialsoln.com/wp-content/uploads/'+ data[index].better_featured_image.media_details.file +'"  alt="'+ data[index].title.rendered+'"></a> </div> <div class="card-body blog-details"><a href="'+post_link+'" class="blog-desc">'+ data[index].title.rendered+'</a> <p>'+ excerpt +'...<a href="'+post_link+'"><b>Read More <span style="font-size:13px">>></span></b></a></p> <div class="author align-items-center mt-3 mb-1"> <img src="https://secure.gravatar.com/avatar/abd2713de1709efddefaa916bad92e3a?s=48&d=mm&r=g" alt="" class="img-fluid rounded-circle"> <ul class="blog-meta"> <li>Yinka </li> <li class="meta-item blog-lesson"> <span class="meta-value">'+ data[index].date +' </span> </li> </ul> </div> </div> </div> </div>';
               
                  }
                });
                 document.getElementById("related_post_section").innerHTML = related_posts;
            });
        })
     });

    }






    async function fetch_comments() {
        const response = await fetch('https://www.blog.socialsoln.com/wp-json/wp/v2/comments?post=<?php echo $post_details['id'];?>');
        return response.json();
    }


    async function fetch_category_id() {
         const response = await fetch('https://www.blog.socialsoln.com/wp-json/wp/v2/categories?post=<?php echo $post_details['id'];?>');
         return response.json();
     }


     
    async function fetch_related_posts(id) {
         const response = await fetch('https://www.blog.socialsoln.com/wp-json/wp/v2/posts?categories='+id);
         return response.json();
     }
</script>


