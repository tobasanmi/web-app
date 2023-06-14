<?php
$page_title = "Discounts";
include "inc/header.php";
?>

<!--banner-->
<div class="banner-top">
    <div class="container">
        <h3>Discount Products</h3>
        <h4><a href="./">Home</a><label>/</label>Discounts</h4>
        <div class="clearfix"> </div>
    </div>
</div>
<div class="product">
    <div class="container">
        <div class="text-center spec">
            <h3>Products</h3>
        </div>
        <div class="container">
            <!-- search form -->
            <div class="mx-auto pro-1">
                <form class="search-for" action="" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control search-discount-bar" name="search_discount_product" placeholder="Search Product...">
                    </div>
                </form>
            </div>
        </div>
        <div class=" con-w3l">
            <?php
            $limit = 12;
            if (isset($_GET["page"])) {
                $page = $_GET["page"];
            } else {
                $page = 1;
            };
            $record_index = ($page - 1) * $limit;
            $query_discount_products = "SELECT * FROM products WHERE discount_price IS NOT NULL ORDER BY product_id DESC LIMIT $record_index, $limit";
            $result_query_discount_products = mysqli_query($cxn, $query_discount_products);
            $count_products = mysqli_num_rows($result_query_discount_products);
            if ($count_products > 0) {
                while ($fetch_discount_products = mysqli_fetch_assoc($result_query_discount_products)) {
            ?>
                    <div class=" col-md-3 pro-1 all-discount-products">
                        <div class="col-m">
                            <a href="product.php?prod=<?= $fetch_discount_products['product_id']; ?>" class="offer-img numOfClickLink" click="<?= $fetch_discount_products['product_id']; ?>" name="click">
                                <img src="dashboard/<?= $fetch_discount_products['product_img']; ?>" class="img-responsive" alt="agric produce online">
                            </a>
                            <div class="mid-1">
                                <div class="women">
                                    <h6><a href="product.php?prod=<?= $fetch_discount_products['product_id']; ?>" class="numOfClickLink" click="<?= $fetch_discount_products['product_id']; ?>" name="click"><?= $fetch_discount_products['product_name'] . " (" . $fetch_discount_products['size'] . ")"; ?></a></h6>
                                </div>
                                <div class="mid-2">
                                    <?php
                                    if (isset($fetch_discount_products['discount_price'])) : ?>
                                        <p><del><em class="item_price">&#8358;<?= $fetch_discount_products['price']; ?></em></del>&nbsp;<ins><em class="item_price">&#8358;<?= $fetch_discount_products['discount_price']; ?></em></ins></p>
                                    <?php else : ?>
                                        <p><em class="item_price">₦<?= $fetch_discount_products['price']; ?></em></p>
                                    <?php endif; ?>
                                    	<div class="block">
												    <?php
												    $prod_rating_val;
												    $query_avg_per_product = mysqli_query($cxn,"SELECT avg_per_prodct FROM products WHERE product_id=".$fetch_discount_products['product_id']."");
												    if (mysqli_num_rows($query_avg_per_product) > 0) {
												    $fetch_avg_per_product = mysqli_fetch_array($query_avg_per_product);
												    }
												    $prod_rating_val = $fetch_avg_per_product['avg_per_prodct'];
												    ?>
												    <input type="hidden" id="<?= $fetch_discount_products['product_id']; ?>"  data-rateit-valuesrc="value" value="<?= $prod_rating_val ? $prod_rating_val:0; ?>">
													<div data-rateit-backingfld="#<?= $fetch_discount_products['product_id']; ?>" data-productid="<?= $fetch_discount_products['product_id']; ?>" class="rateit small ghosting" data-rateit-mode="font"></div>
													<form action="" method="post">
													    <input type="hidden" name="rate_prodxt_id"><input type="hidden" name="rate_prodxt_value">
													</form>
												</div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="add add-2">
                                    <button class="btn my-cart-btn my-cart-b" data-id="<?= $fetch_discount_products['product_id']; ?>" data-name="<?= $fetch_discount_products['product_name']; ?>" data-summary="summary 2" data-price="<?= $fetch_discount_products['price']; ?>" data-quantity="1" data-image="dashboard/<?= $fetch_discount_products['product_img']; ?>">Buy Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
            <div id="search-dis-result"></div>
            <div class="clearfix"></div>
        </div>


        <div class="col-sm-12 text-center">
            <nav aria-label="Page navigation">
                <?php
                $sql = "SELECT COUNT(*) FROM products WHERE discount_price IS NOT NULL";
                $retval1 = mysqli_query($cxn, $sql);
                $row = mysqli_fetch_row($retval1);
                $total_records = $row[0];
                //  echo $total_records;
                $total_pages = ceil($total_records / $limit);
                echo "<ul class='pagination'>";
                ?>
                <li class="<?php if ($page <= 1) {
                                echo 'disabled';
                            } ?> page-item" aria-current="page">
                    <a class="page-link" href="<?php if ($page <= 1) {
                                                    echo '#';
                                                } else {
                                                    echo "?page=" . ($page - 1);
                                                } ?>">Prev <span class="sr-only">(current)</span></a>
                </li>
                <?php // echo the numbers for each page
                for ($i = 1; $i <= $total_pages; $i++) : ?>
                    <li class="page-item <?php if ($page == $i) {
                                                echo "active";
                                            } ?>">
                        <a class="page-link" href="products.php?page=<?= $i; ?>" tabindex="-1" aria-disabled="true"><?= $i; ?></a>
                    </li>
                <?php endfor; ?>
                <li class="page-item <?php if ($page >= $total_pages) {
                                            echo 'disabled';
                                        } ?>">
                    <a class="page-link" href="<?php if ($page >= $total_pages) {
                                                    echo '#';
                                                } else {
                                                    echo "?page=" . ($page + 1);
                                                } ?>">Next</a>
                </li>
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
<script>
    $('.rateit').bind('rated reset', function (e) {
         var ri = $(this);
 
         //if the use pressed reset, it will get value: 0 (to be compatible with the HTML range control), we could check if e.type == 'reset', and then set the value to  null .
         var value = ri.rateit('value');
         var productID = ri.data('productid'); // if the product id was in some hidden field: ri.closest('li').find('input[name="productid"]').val()
 
         //maybe we want to disable voting?
        //  ri.rateit('readonly', true);
//  console.log(value);
//  console.log(productID);
 
 ri.parent('.block').find('input[name="rate_prodxt_id"]').val(productID);
 ri.parent('.block').find('input[name="rate_prodxt_value"]').val(value);
 
 $.ajax({
             url: 'script.php', //your server side script
             data: {rate_prodxt_id:productID,rate_prodxt_value: value }, //our data
             type: 'POST',
             success: function (data) {
                //  alert(data);
 
             },
             error: function (jxhr, msg, err) {
                //  alert(msg);
             }
         });
         
     });
</script>