<?php
$page_title = "Search";
include "inc/header.php";
include "config/functions.php"; 

?>

<!--banner-->
<div class="banner-top">
    <div class="container">
        <h3>Search Result</h3>
        <h4><a href="./">Home</a><label>/</label>Search</h4>
        <div class="clearfix"> </div>
    </div>
</div>


<div class="product">
    <div class="container">
        <div class="text-center spec">
            <h3>Search Results</h3>
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
            if (isset($_GET['search_product'])) {
                $search_product = $_GET['search_product'];				
                $query_search_product = "SELECT * FROM products WHERE product_name LIKE '%" .$search_product. "%' ORDER BY product_id DESC";
                $result_query_search_product = mysqli_query($cxn, $query_search_product);
                $count_search_product = mysqli_num_rows($result_query_search_product);
                if ($count_search_product > 0) {
                    while ($fetch_search_product = mysqli_fetch_assoc($result_query_search_product)) {
						$seller_id = $fetch_search_product['seller_id'];
								$product_id = $fetch_search_product['product_id'];
								if($seller_id == 0){$path = 'dashboard/';}else{$path = 'farmer/';}								
								$stock = $fetch_search_product['in_stock'];
								$qnty_sold = $fetch_search_product['qnty_sold'];
								$tstock = $stock;
								
								if($tstock == 0){
									$leftstock = 'Out of stock';
									$disabled = 'disabled';
								}else{
									$disabled = '';
									$leftstock = 'In Stock: '.$tstock;
								}
								
								$discount = $fetch_search_product['discount_price'];
								if($discount != ''){
									$prdprice = $fetch_search_product['discount_price'];
								}else{
									$prdprice = $fetch_search_product['price'];
								}
            ?>
                        <div class="col-md-3 pro-1">
                        <div class="col-m">
                            <a href="product?prod=<?=$fetch_search_product['product_id']; ?>" class="offer-img numOfClickLink" click="<?= $fetch_search_product['product_id']; ?>" name="click">
                                <img src="<?= $fetch_search_product['seller_id'] == 0 ? 'dashboard/' : 'farmer/' ?><?= $fetch_search_product['product_img']; ?>" class="img-responsive" alt="agric produce online">
                            </a>
                            <div class="mid-1">
                                <div class="women">
                                    <h6><a href="product?prod=<?= $fetch_search_product['product_id']; ?>" class="numOfClickLink" click="<?= $fetch_search_product['product_id']; ?>" name="click"><?= $fetch_search_product['product_name'] . " (" . $fetch_search_product['size'] . ")"; ?></a></h6>
                                </div>
                                    
                                    <div class="mid-2"> 
                                       <?php		
											if($discount != ''){
												echo '<p>
													<del><em class="item_price">&#8358;'.$fetch_search_product['price'].'</em></del>&nbsp;
													<ins><em class="item_price">&#8358;'.$fetch_search_product['discount_price'].'</em></ins>
												</p>';
											}else{
												echo '<p><em class="item_price">₦'.$fetch_search_product['price'].'</em></p>';
											}
										?>
                                        </div>
                                    <div class="add add-2">
                                        <!--<button class="btn my-cart-btn my-cart-b" data-id="<?= $fetchsearch__producs['product_id']; ?>" data-name="<?= $fetch_search_product['product_name']; ?>" data-summary="summary 2" data-price="<?= $fetch_search_product['price']; ?>" data-quantity="1" data-image="dashboard/<?= $fetchsearch__producs['product_img']; ?>">Buy Now</button>-->
										<?php										
											echo '<button class="btn my-cart-btn my-cart-b" '.$disabled.' data-id="'.$fetch_search_product['product_id'].'" data-name="'.$fetch_search_product['product_name'].'" data-sll="'.$fetch_search_product['seller_id'].'" data-summary="summary 2" data-price="'.$prdprice.'" data-quantity="1" data-image="'.$path.$fetch_search_product['product_img'].'">Buy Now</button>';
										?>
                                    </div>
                                </div>
                            </div>
                        </div>
            <?php
                    }
                }
            }
            ?>
            <div class="clearfix"></div>
            </div>
      
        <div class="col-sm-12 text-center">
            <nav aria-label="Page navigation">
                <?php
                $sql = "SELECT COUNT(*) FROM products WHERE product_name LIKE '%" . $_GET['search_product'] . "%'";
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
                        <a class="page-link" href="search?page=<?= $i; ?>" tabindex="-1" aria-disabled="true"><?= $i; ?></a>
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
        </div>
<script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "WebSite",
  "name": "DayDone ltd: Agric ecommerce",
  "url": "https://www.daydone.com.ng",
  "potentialAction": {
    "@type": "SearchAction",
    "target": "https://www.daydone.com.ng/search?search_product={search_term_string}",
    "query-input": "required name=search_term_string"
  }
}
</script>
<?php
include "inc/footer.php";
?>
</div>