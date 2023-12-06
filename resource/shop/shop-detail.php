    <?php
    $bl = new BinhLuan();
    $us = new KhachHang();

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
    $parent_real = 0;
    if (isset($_POST['reply'])) {
        $level = (int)$_POST['level-rep'];
        $parent = (int)$_POST['parent-rep'];
        $parent_real = (int)$_POST['parent-rep'];
        if ($level >= 2) {
            $parent_cmt = $bl->binh_luan_select_by_id($parent);
            $parent = $parent_cmt['parent'];
        }
        if ($_POST['reply_content'] != null) {
            (int)$level += 1;
            $content = $_POST['reply_content'];
            $bl->addComment($user_id, $id_product, $content, $level, $parent, $parent_real);
            header("location: ?pages=shop-detail&product_id=" . $id_product);
        } else {
            $parent = (int)$_POST['parent-rep'];
            $message['rep'] = 'comment empty!';
        }
    }
    if (isset($_POST['comment'])) {
        if ($_POST['content'] != null) {
            $content = $_POST['content'];
            $bl->addComment($user_id, $id_product, $content, $level, $parent, $parent_real);
            header("location: ?pages=shop-detail&product_id=" . $id_product);
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
                <div class="row d-flex">
                    <div class="col-3">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img src="<?= $PUBLIC_URL ?>/img/product/<?= $images ?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-9 product__details__content">
                        <div class="container">
                            <div class="row d-flex justify-content-center">
                                <div class="col-lg-8">
                                    <div class="product__details__text">
                                        <h4><?= $product_name ?></h4>

                                        <h3><?= currency_format($price) ?> <span>70.00</span></h3>
                                        <p>Coat with quilted lining and an adjustable hood. Featuring long sleeves with adjustable
                                            cuff tabs, adjustable asymmetric hem with elastic side tabs and a front zip fastening
                                            with placket.</p>

                                        <div class="product__details__cart__option">
                                            <a href="?pages=add_cart&product_id=<?= $product_id ?>" class="primary-btn">add to cart</a>
                                        </div>

                                        <div class="product__details__last__option">
                                            <h5><span>Guaranteed Safe Checkout</span></h5>
                                            <img src="<?= $PUBLIC_URL ?>/img/shop-details/details-payment.png" alt="">

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-11 ml-5">
                <div class="product__details__tab">
                    <h3>Comments</h3>
                    <div class="tab-pane" id="tabs-7" role="tabpanel" id="comment-list">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="comment_list">
                                    <?php if (!empty($comment)) : ?>
                                        <?php foreach ($comment as $cmt) : ?>
                                            <?php if ($cmt['parent'] == 0) : ?>
                                                <div class="review_item comments" style="margin-top: 10px;">
                                                    <div class="container-cmt-custom">
                                                        <div class="media">
                                                            <div class="media-body">
                                                                <h4><?= $cmt['name'] ?></h4>
                                                            </div>
                                                        </div>
                                                        <p>
                                                            <?= $cmt['content'] ?>
                                                        </p>
                                                        <p class="btn-reply-custom">reply</p>
                                                    </div>
                                                    <?php if (!empty($_SESSION['user'])) : ?>
                                                        <form action="" class="reply-custom" method="post" enctype="multipart/form-data">
                                                            <input class="reply_content" type="text" placeholder="reply comment" name="reply_content">
                                                            <input hidden type="text" value="<?= $cmt['level'] ?>" name="level-rep">
                                                            <input hidden type="text" value="<?= $cmt['cmt_id'] ?>" name="parent-rep">
                                                            <?php if ($parent == $cmt['cmt_id']) : ?>
                                                                <p style="color: red;"><?= $message['rep'] ?? "" ?></p>
                                                            <?php endif ?>
                                                            <button name="reply" value="submit" class="btn-reply btn btn-primary" type="submit">Trả lời</button>
                                                        </form>
                                                    <?php endif ?>
                                                </div>
                                                <?php
                                                $listChild = $bl->childExistence($cmt['cmt_id'], $comment);
                                                if (!empty($listChild)) :
                                                ?>
                                                    <?php foreach ($listChild as $cmt) : ?>
                                                        <div class="review_item comments" style="margin-left: 50px; margin-top: 10px;">
                                                            <div class="container-cmt-custom">
                                                                <div class="media">
                                                                    <div class="media-body">
                                                                        <h4><?= $cmt['name'] ?></h4>
                                                                        <?php
                                                                        $id_parent = (int)$cmt['parent_real'];
                                                                        $getParent = $bl->binh_luan_select_by_id($id_parent);
                                                                        $getName = $us->getNameByID($getParent['user_id']);
                                                                        ?>
                                                                        <p>reply to <span><?= $getName['username'] ?? "" ?></span> </p>
                                                                    </div>
                                                                </div>
                                                                <p>
                                                                    <?= $cmt['content'] ?>
                                                                </p>
                                                                <p class="btn-reply-custom">reply</p>
                                                            </div>
                                                            <?php if (!empty($_SESSION['user'])) : ?>
                                                                <form action="" class="reply-custom" method="post" enctype="multipart/form-data">
                                                                    <input class="reply_content" type="text" placeholder="reply comment" name="reply_content">
                                                                    <input hidden type="text" value="<?= $cmt['level'] ?>" name="level-rep">
                                                                    <input hidden type="text" value="<?= $cmt['cmt_id'] ?>" name="parent-rep">
                                                                    <?php if ($parent == $cmt['cmt_id']) : ?>
                                                                        <p style="color: red;"><?= $message['rep'] ?? "" ?></p>
                                                                    <?php endif ?>
                                                                    <button name="reply" value="submit" class="btn-reply btn btn-primary" type="submit">Trả lời</button>
                                                                </form>
                                                            <?php endif ?>
                                                        </div>
                                                        <?php
                                                        $listChild = $bl->childExistence($cmt['cmt_id'], $comment);

                                                        if (!empty($listChild)) :
                                                        ?>
                                                            <div style="margin-left: 100px; margin-top: 10px;">
                                                                <?php foreach ($listChild as $cmt) : ?>
                                                                    <div class="review_item comments">
                                                                        <div class="container-cmt-custom">
                                                                            <div class="media">
                                                                                <div class="media-body">
                                                                                    <h4><?= $cmt['name'] ?></h4>
                                                                                    <?php
                                                                                    $id_parent = (int)$cmt['parent_real'];
                                                                                    $getParent = $bl->binh_luan_select_by_id($id_parent);
                                                                                    $getName = $us->getNameByID($getParent['user_id']);
                                                                                    ?>
                                                                                    <p>reply to <span><?= $getName['username'] ?? "" ?></span> </p>
                                                                                </div>
                                                                            </div>
                                                                            <p>
                                                                                <?= $cmt['content'] ?>
                                                                            </p>
                                                                            <p class="btn-reply-custom">reply</p>
                                                                        </div>
                                                                        <?php if (!empty($_SESSION['user'])) : ?>
                                                                            <form action="" class="reply-custom" method="post" enctype="multipart/form-data">
                                                                                <input class="reply_content" type="text" placeholder="reply comment" name="reply_content">
                                                                                <input hidden type="text" value="<?= $cmt['level'] ?>" name="level-rep">
                                                                                <input hidden type="text" value="<?= $cmt['cmt_id'] ?>" name="parent-rep">
                                                                                <?php if ($parent == $cmt['cmt_id']) : ?>
                                                                                    <p style="color: red;"><?= $message['rep'] ?? "" ?></p>
                                                                                <?php endif ?>
                                                                                <button name="reply" value="submit" class="btn-reply btn btn-primary" type="submit">Trả lời</button>
                                                                            </form>
                                                                        <?php endif ?>
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
                                        <h4>Submit a comment</h4>
                                        <form class="row contact_form" action="" method="post" enctype="multipart/form-data" id="contactForm" novalidate="novalidate">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <textarea class="form-control" name="content" id="content" rows="1" placeholder="content"></textarea>
                                                    <p style="color: red;"><?= $message['cmt'] ?? "" ?></p>
                                                </div>
                                            </div>
                                            <div class="col-md-12 ">
                                                <button type="submit" name="comment" value="submit" class="btn btn-primary">Post</button>
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
                        <div class="product__item product-item-custom">
                            <a href="?pages=shop-detail&product_id=<?= $product_id ?>"> <img class="product__item__pic set-bg" src="<?= $PUBLIC_URL ?>/img/product/<?= $images ?>"></img></a>
                            <div class="product__item__text">
                                <h6><?= $product_name ?></h6>
                                <a href="#" class="add-cart">+ Add To Cart</a>
                                <h5><?= currency_format($price) ?></h5>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </section>
    <!-- Related Section End -->