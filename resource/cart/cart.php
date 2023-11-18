    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shopping Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <a href="./shop.html">Shop</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <form action="?pages=update_cart" method="post" enctype="multipart/form-data">
                        <div class="shopping__cart__table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($_SESSION['cart'])) : ?>
                                        <?php foreach ($cart->get_list_cart() as $prod) : ?>
                                            <tr>
                                                <td class="product__cart__item">
                                                    <div class="product__cart__item__pic">
                                                        <img src="<?= $PUBLIC_URL ?>/img/product/<?= $prod['images'] ?>" alt="">
                                                    </div>
                                                    <div class="product__cart__item__text">
                                                        <h6><?= $prod['product_name']?></h6>
                                                        <h5><?= currency_format($prod['price'])?></h5>
                                                    </div>
                                                </td>
                                                <td class="quantity__item">
                                                    <div class="quantity">
                                                        <div class="pro-qty-2">
                                                            <input type="text" name="qty[<?= $prod['product_id']?>]" value="<?= $prod['qty']?>">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cart__price"><?= currency_format($prod['sub_total'])?></td>
                                                <td class="cart__close"><a href="?pages=delete_prod&product_id=<?= $prod['product_id'] ?>"><i class="fa fa-close"></i> </a></td>
                                            </tr>
                                        <?php endforeach ?>
                                    <?php else : ?>
                                        <tr>
                                            Chưa có sản phẩm nào trong giỏ hàng!
                                        </tr>
                                    <?php endif ?>

                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="continue__btn">
                                    <a href="?pages=shop">Continue Shopping</a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="continue__btn btn btn-dark">
                                    <button class="btn text-light" type="submit" name="update"><i class="fa fa-spinner"></i> Update cart</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="cart__discount">
                        <h6>Discount codes</h6>
                        <form action="#">
                            <input type="text" placeholder="Coupon code">
                            <button type="submit">Apply</button>
                        </form>
                    </div>
                    <div class="cart__total">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Total <span><?= currency_format($_SESSION['cart']['info']['total']) ?? "" ?></span></li>
                        </ul>
                        <a href="?pages=checkout" class="primary-btn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->