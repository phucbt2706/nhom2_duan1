<?php
$pro = new HangHoa();
if (!empty($_GET['cate_id'])) {
    $condition = " WHERE p.cate_id = " . $_GET['cate_id'] . " OR c.parent_id =" . $_GET['cate_id'];
} else if(!empty($_GET['search'])) {
    $condition = " WHERE product_name LIKE '%". $_GET['search']."%'";
}
elseif(!empty($_GET['price_min']) && !empty($_GET['price_max'])) {
    $condition = " WHERE price >= '". $_GET['price_min']."' AND price < '". $_GET['price_max']."'";
}
elseif(!empty($_GET['price_min']))  {
    $condition = " WHERE price >=
     '". $_GET['price_min']."'";
}
else {
    $condition = '';
}

$rows = $pro->num_row_product($condition);
$total_rows  = $rows[0]['num_row'];
$num_rows_in_page = 12;
$num_page = ceil($total_rows / $num_rows_in_page);
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $num_rows_in_page;

$list_product = $pro->product_select_page($start, $num_rows_in_page, $condition);
?>
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Shop</h4>
                    <div class="breadcrumb__links">
                        <a href="./index.html">Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shop Section Begin -->
<section class="shop spad">
    <div class="container">
        <div class="row">
            <?php include "include/sidebar-shop.php" ?>
            <div class="col-lg-9">
                <div class="shop__product__option">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="shop__product__option__left">
                                <p>Showing 1–<?= $num_rows_in_page ?> of <?= $total_rows ?> results</p>
                            </div>
                        </div>
                        <!-- <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="shop__product__option__right">
                                <p>Sort by Price:</p>
                                <select>
                                    <option value="">Low To High</option>
                                    <option value="">$0 - $55</option>
                                    <option value="">$55 - $100</option>
                                </select>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($list_product as $item) {
                        extract($item); ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item product-item-custom">
                                <a href="?pages=shop-detail&product_id=<?= $product_id ?>"> <img class="product__item__pic set-bg" src="<?= $PUBLIC_URL ?>/img/product/<?= $images ?>"></img></a>
                                <div class="product__item__text">
                                    <h6><?= $product_name ?></h6>
                                    <a href="?pages=add_cart&product_id=<?= $product_id ?>" class="add-cart">+ Add To Cart</a>
                                    <h5><?= currency_format($price) ?></h5>
                                </div>
                            </div>
                        </div>
                    <?php
                    } ?>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-8 d-flex justify-content-center">
                        <?php
                        if (!empty($_POST['cate_id'])) {
                            echo get_pagging($num_page, $page, $_GET['cate_id']) ;
                        }else{
                            echo get_pagging_shop($num_page,$page);
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shop Section End -->