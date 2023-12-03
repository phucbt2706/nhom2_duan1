    <?php
    $bl = new BinhLuan();
    $id_product = $_GET['product_id'];
    $comment = $bl->binh_luan_get_detail($id_product);
    $user_id;
    if (!empty($_SESSION['user'])) {
        $info_user = unserialize($_SESSION['user']);
        $user_id = $info_user['user_id'];
    }

    $id_product = $_GET['product_id'];
    $message = [];
    $level = 0;
    $parent = 0;

    if (isset($_POST['reply'])) {
        $level = (int)$_POST['level-rep'];
        $parent = (int)$_POST['parent-rep'];
        if ($level >= 2) {
            $parent_cmt = $bl->binh_luan_select_by_id($parent);
            $parent = $parent_cmt['parent'];
        }
        if ($_POST['reply_content'] != null) {
            (int)$level += 1;
            $content = $_POST['reply_content'];
            $bl->addComment($user_id, $id_product, $content, $level, $parent);
            header("location: ?pages=shop-detail&product_id=<?=" . $id_product . "?>");
        } else {
            $parent = (int)$_POST['parent-rep'];
            $message['rep'] = 'comment empty!';
        }
    }
    if (isset($_POST['comment'])) {
        if ($_POST['content'] != null) {
            $content = $_POST['content'];
            $bl->addComment($user_id, $id_product, $content, $level, $parent);
            header("location: ?pages=shop-detail&product_id=<?=" . $id_product . "?>");
        } else {
            $message['cmt'] = 'comment empty!';
        }
    }
    ?>
    <?php extract($item) ?>
    <!-- Shop Details Section Begin -->
    <section class="shop-details">
        <div class="product__details__pic">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__breadcrumb">
                            <a href="./index.html">Home</a>
                            <a href="./shop.html">Shop</a>
                            <span>Product Details</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">
                                    <div class="product__thumb__pic set-bg" data-setbg="<?= $PUBLIC_URL ?>/img/shop-details/thumb-1.png">
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">
                                    <div class="product__thumb__pic set-bg" data-setbg="<?= $PUBLIC_URL ?>/img/shop-details/thumb-2.png">
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">
                                    <div class="product__thumb__pic set-bg" data-setbg="<?= $PUBLIC_URL ?>/img/shop-details/thumb-3.png">
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-4" role="tab">
                                    <div class="product__thumb__pic set-bg" data-setbg="<?= $PUBLIC_URL ?>/img/shop-details/thumb-4.png">
                                        <i class="fa fa-play"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img src="<?= $PUBLIC_URL ?>/img/product/<?= $images ?>" alt="">
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img src="<?= $PUBLIC_URL ?>/img/shop-details/product-big-3.png" alt="">
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img src="<?= $PUBLIC_URL ?>/img/shop-details/product-big.png" alt="">
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-4" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img src="<?= $PUBLIC_URL ?>/img/shop-details/product-big-4.png" alt="">
                                    <a href="https://www.youtube.com/watch?v=8PJ3_p7VqHw&list=RD8PJ3_p7VqHw&start_radio=1" class="video-popup"><i class="fa fa-play"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product__details__content">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="product__details__text">
                            <h4><?= $product_name ?></h4>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <span> - 5 Reviews</span>
                            </div>
                            <h3><?= currency_format($price) ?> <span>70.00</span></h3>
                            <p>Coat with quilted lining and an adjustable hood. Featuring long sleeves with adjustable
                                cuff tabs, adjustable asymmetric hem with elastic side tabs and a front zip fastening
                                with placket.</p>
                            <div class="product__details__option">
                                <div class="product__details__option__size">
                                    <span>Size:</span>
                                    <label for="xxl">xxl
                                        <input type="radio" id="xxl">
                                    </label>
                                    <label class="active" for="xl">xl
                                        <input type="radio" id="xl">
                                    </label>
                                    <label for="l">l
                                        <input type="radio" id="l">
                                    </label>
                                    <label for="sm">s
                                        <input type="radio" id="sm">
                                    </label>
                                </div>
                                <div class="product__details__option__color">
                                    <span>Color:</span>
                                    <label class="c-1" for="sp-1">
                                        <input type="radio" id="sp-1">
                                    </label>
                                    <label class="c-2" for="sp-2">
                                        <input type="radio" id="sp-2">
                                    </label>
                                    <label class="c-3" for="sp-3">
                                        <input type="radio" id="sp-3">
                                    </label>
                                    <label class="c-4" for="sp-4">
                                        <input type="radio" id="sp-4">
                                    </label>
                                    <label class="c-9" for="sp-9">
                                        <input type="radio" id="sp-9">
                                    </label>
                                </div>
                            </div>
                            <div class="product__details__cart__option">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" value="1">
                                    </div>
                                </div>
                                <a href="?pages=add_cart&product_id=<?= $product_id ?>" class="primary-btn">add to cart</a>
                            </div>
                            <div class="product__details__btns__option">
                                <a href="#"><i class="fa fa-heart"></i> add to wishlist</a>
                                <a href="#"><i class="fa fa-exchange"></i> Add To Compare</a>
                            </div>
                            <div class="product__details__last__option">
                                <h5><span>Guaranteed Safe Checkout</span></h5>
                                <img src="<?= $PUBLIC_URL ?>/img/shop-details/details-payment.png" alt="">
                                <ul>
                                    <li><span>SKU:</span> 3812912</li>
                                    <li><span>Categories:</span> Clothes</li>
                                    <li><span>Tag:</span> Clothes, Skin, Body</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tabs-5" role="tab">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-7" role="tab">Comments</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs-5" role="tabpanel">
                                    <div class="product__details__tab__content">
                                        <p class="note">Nam tempus turpis at metus scelerisque placerat nulla deumantos
                                            solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis
                                            ut risus. Sedcus faucibus an sullamcorper mattis drostique des commodo
                                            pharetras loremos.</p>
                                        <div class="product__details__tab__content__item">
                                            <h5>Products Infomation</h5>
                                            <p>A Pocket PC is a handheld computer, which features many of the same
                                                capabilities as a modern PC. These handy little devices allow
                                                individuals to retrieve and store e-mail messages, create a contact
                                                file, coordinate appointments, surf the internet, exchange text messages
                                                and more. Every product that is labeled as a Pocket PC must be
                                                accompanied with specific software to operate the unit and must feature
                                                a touchscreen and touchpad.</p>
                                            <p>As is the case with any new technology product, the cost of a Pocket PC
                                                was substantial during it’s early release. For approximately $700.00,
                                                consumers could purchase one of top-of-the-line Pocket PCs in 2003.
                                                These days, customers are finding that prices have become much more
                                                reasonable now that the newness is wearing off. For approximately
                                                $350.00, a new Pocket PC can now be purchased.</p>
                                        </div>
                                        <div class="product__details__tab__content__item">
                                            <h5>Material used</h5>
                                            <p>Polyester is deemed lower quality due to its none natural quality’s. Made
                                                from synthetic materials, not natural like wool. Polyester suits become
                                                creased easily and are known for not being breathable. Polyester suits
                                                tend to have a shine to them compared to wool and cotton suits, this can
                                                make the suit look cheap. The texture of velvet is luxurious and
                                                breathable. Velvet is a great choice for dinner party jacket and can be
                                                worn all year round.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="tabs-7" role="tabpanel" id="comment-list">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="comment_list">
                                                <?php if (!empty($comment)) : ?>
                                                    <?php foreach ($comment as $cmt) : ?>
                                                        <?php if ($cmt['parent'] == 0) : ?>
                                                            <div class="review_item comments">
                                                                <div class="media">
                                                                    <div class="d-flex">
                                                                        <img src="img/product/review-1.png" alt="">
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <h4><?= $cmt['name'] ?></h4>
                                                                        <h5>12th Feb, 2018 at 05:56 pm</h5>
                                                                    </div>
                                                                </div>
                                                                <p>
                                                                    <?= $cmt['content'] ?>
                                                                </p>
                                                                <form action="" method="post" enctype="multipart/form-data">
                                                                    <input class="reply_content" type="text" placeholder="reply comment" name="reply_content">
                                                                    <input hidden type="text" value="<?= $cmt['level'] ?>" name="level-rep">
                                                                    <input hidden type="text" value="<?= $cmt['cmt_id'] ?>" name="parent-rep">
                                                                    <?php if ($parent == $cmt['cmt_id']) : ?>
                                                                        <p style="color: red;"><?= $message['rep'] ?? "" ?></p>
                                                                    <?php endif ?>
                                                                    <button name="reply" value="submit" class="btn btn-primary" type="submit">Trả lời</button>
                                                                </form>
                                                            </div>
                                                            <?php
                                                            $listChild = $bl->childExistence($cmt['cmt_id'], $comment);
                                                            if (!empty($listChild)) :
                                                            ?>
                                                                <?php foreach ($listChild as $cmt) : ?>
                                                                    <div class="review_item comments" style="margin-left: 30px; border-left: 1px solid black; padding-left: 10px;">
                                                                        <div class="media">
                                                                            <div class="d-flex">
                                                                                <img src="img/product/review-1.png" alt="">
                                                                            </div>
                                                                            <div class="media-body">
                                                                                <h4><?= $cmt['name'] ?></h4>
                                                                                <?php $getParent = $bl->binh_luan_select_by_id($cmt['parent']) ?>
                                                                                <p>trả lời cho <?= $getParent['user_id'] ?></p>
                                                                                <h5>12th Feb, 2018 at 05:56 pm</h5>
                                                                            </div>
                                                                        </div>
                                                                        <p>
                                                                            <?= $cmt['content'] ?>
                                                                        </p>
                                                                        <form action="" method="post" enctype="multipart/form-data">
                                                                            <input class="reply_content" type="text" placeholder="reply comment" name="reply_content">
                                                                            <input hidden type="text" value="<?= $cmt['level'] ?>" name="level-rep">
                                                                            <input hidden type="text" value="<?= $cmt['cmt_id'] ?>" name="parent-rep">
                                                                            <?php if ($parent == $cmt['cmt_id']) : ?>
                                                                                <p style="color: red;"><?= $message['rep'] ?? "" ?></p>
                                                                            <?php endif ?>
                                                                            <button name="reply" value="submit" class="btn btn-primary" type="submit">Trả lời</button>
                                                                        </form>
                                                                    </div>
                                                                    <?php
                                                                    $listChild = $bl->childExistence($cmt['cmt_id'], $comment);

                                                                    if (!empty($listChild)) :
                                                                    ?>
                                                                        <div style="margin-left: 60px; border-left: 1px solid black; padding-left: 10px;">
                                                                            <?php foreach ($listChild as $cmt) : ?>
                                                                                <div class="review_item comments">
                                                                                    <div class="media">
                                                                                        <div class="d-flex">
                                                                                            <img src="img/product/review-1.png" alt="">
                                                                                        </div>
                                                                                        <div class="media-body">
                                                                                            <h4><?= $cmt['name'] ?></h4>
                                                                                            <?php $getParent = $bl->binh_luan_select_by_id($cmt['parent']); ?>
                                                                                            <p>trả lời cho <?= $getParent['user_id'] ?></p>
                                                                                            <h5>12th Feb, 2018 at 05:56 pm</h5>
                                                                                        </div>
                                                                                    </div>
                                                                                    <p>
                                                                                        <?= $cmt['content'] ?>
                                                                                    </p>
                                                                                    <form action="" method="post" enctype="multipart/form-data">
                                                                                        <input class="reply_content" type="text" placeholder="reply comment" name="reply_content">
                                                                                        <input hidden type="text" value="<?= $cmt['level'] ?>" name="level-rep">
                                                                                        <input hidden type="text" value="<?= $cmt['cmt_id'] ?>" name="parent-rep">
                                                                                        <?php if ($parent == $cmt['cmt_id']) : ?>
                                                                                            <p style="color: red;"><?= $message['rep'] ?? "" ?></p>
                                                                                        <?php endif ?>
                                                                                        <button name="reply" value="submit" class="btn btn-primary" type="submit">Trả lời</button>
                                                                                    </form>
                                                                                </div>
                                                                            <?php endforeach ?>
                                                                        </div>
                                                                    <?php endif ?>
                                                                <?php endforeach ?>
                                                            <?php endif ?>
                                                        <?php endif ?>
                                                    <?php endforeach ?>
                                                <?php else : ?>
                                                    <div class="review_item">
                                                        <p>Chưa Có bình luận nào!</p>
                                                    </div>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <?php if (!empty($_SESSION['user'])) : ?>
                                                <div class="review_box">
                                                    <h4>Gửi bình luận</h4>
                                                    <form class="row contact_form" action="" method="post" enctype="multipart/form-data" id="contactForm" novalidate="novalidate">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <textarea class="form-control" name="content" id="content" rows="1" placeholder="Nội dung bình luận"></textarea>
                                                                <p style="color: red;"><?= $message['cmt'] ?? "" ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 ">
                                                            <button type="submit" name="comment" value="submit" class="btn btn-primary">Gửi bình luận</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            <?php else : ?>
                                                <div class="review_box">
                                                    <p>Vui lòng đăng nhập để bình luận!</p>
                                                </div>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Details Section End -->

    <!-- Related Section Begin -->
    <section class="related spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="related-title">Related Product</h3>
                </div>
            </div>
            <div class="row">
                <?php
                foreach ($spcl as $spcl) {
                    extract($spcl);
                ?>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-sm-6">
                        <div class="product__item">
                            <a href="?pages=shop-detail&product_id=<?= $product_id ?>"> <img class="product__item__pic set-bg" src="<?= $PUBLIC_URL ?>/img/product/<?= $images ?>"></img></a>
                            <div class="product__item__text">
                                <h6><?= $product_name ?></h6>
                                <a href="#" class="add-cart">+ Add To Cart</a>
                                <div class="rating">
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <h5><?= currency_format($price) ?></h5>
                                <div class="product__color__select">
                                    <label for="pc-1">
                                        <input type="radio" id="pc-1">
                                    </label>
                                    <label class="active black" for="pc-2">
                                        <input type="radio" id="pc-2">
                                    </label>
                                    <label class="grey" for="pc-3">
                                        <input type="radio" id="pc-3">
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>
                <?php } ?>

            </div>
        </div>
    </section>
    <!-- Related Section End -->