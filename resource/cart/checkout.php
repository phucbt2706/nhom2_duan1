<?php 
    extract($infor_user);
?>

<!-- Modal -->
<div class="modal fade" id="order-confirm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Check Out</h4>
                    <div class="breadcrumb__links">
                        <a href="./index.html">Home</a>
                        <a href="./shop.html">Shop</a>
                        <span>Check Out</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <form action="" method='POST'>
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <h6 class="coupon__code"><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click
                                here</a> to enter your code</h6>
                        <h6 class="checkout__title">Billing Details</h6>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Fullname<span>*</span></p>
                                    <input hidden class="user_id" name="user_id" value="<?= $user_id ?>" type="text">
                                    <input hidden class="total" name="total" value="<?= $_SESSION['cart']['info']['total'] ?>" type="text">
                                    <input name="price" type="text">
                                    <input readonly type="text" value="<?= $fullname ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Phone<span>*</span></p>
                                    <input readonly type="text" value="<?= $phone ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input readonly type="text" value="<?= $email ?>">
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Address<span>*</span></p>
                            <input readonly type="text" placeholder="Street Address" class="checkout__input__add">
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>City<span>*</span></p>
                                    <input readonly type="text">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>State<span>*</span></p>
                                    <input readonly type="text">
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Order notes<span>*</span></p>
                            <input class="note" name="note" type="text" placeholder="Notes about your order, e.g. special notes for delivery.">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4 class="order__title">Your order</h4>
                            <div class="checkout__order__products">Product <span>Total</span></div>
                            <ul class="checkout__total__products">
                                <?php
                                    $no = 0;
                                    foreach ($list_cart as $item) { 
                                        $no++;
                                        extract($item);
                                        ?>
                                <li><?= $no ?>. <?= $product_name ?> x<?= $qty ?> <span><?= currency_format($sub_total)?></span></li>
                                <?php
                                    }
                                    ?>
                            </ul>
                            <ul class="checkout__total__all">
                                <!-- <li>Subtotal <span>$750.99</span></li> -->
                                <li>Total <span><?= currency_format($_SESSION['cart']['info']['total'])  ?></span></li>
                            </ul>
                            <p>Choose order method</p>
                            <div class="checkout__input__checkbox">
                                <label for="payment">
                                    Check Payment
                                    <input type="checkbox" id="payment">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="paypal">
                                    Paypal
                                    <input type="checkbox" id="paypal">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="home">
                                    At home
                                    <input type="checkbox" id="home">
                                    <span class="checkmark"></span>
                                </label>
                            </div>

                            <button type="submit" name="order" class="site-btn site-btn-order">PLACE ORDER</button>
                        </div>
                    </div>
                </div>
            </form>
            <form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded" action="?pages=access_momo">
                <div style="margin-top: 1em;">
                    <button type="submit" class="btn btn-primary btn-block">Start MoMo payment....</button>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->