<!-- Hero Section Begin -->
<section class="hero">
    <div class="hero__slider owl-carousel">
        <div class="hero__items set-bg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-7 col-md-8" style="margin-left: 10%;">
                        <div class=" hero__text">
                            <h6>Iphone 15pro max</h6>
                            <h2>Trendy, powerful phone models in 2023</h2>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Sequi magni tempora impedit voluptatum eum alias, dolorem earum at et ipsam!
                            </p>
                            <a href="#" class="primary-btn">Shop now <span class="arrow_right"></span></a>
                        </div>
                    </div>
                    <div class="img-of-banner col-3">
                        <img src="../../public/img/product/iphone-15promax.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="hero__items set-bg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-7 col-md-8" style="margin-left: 10%;">
                        <div class="hero__text">
                            <h6>Iphone 15pro max</h6>
                            <h2>Trendy, powerful phone models in 2023</h2>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Sequi magni tempora impedit voluptatum eum alias, dolorem earum at et ipsam!
                            </p>
                            <a href="#" class="primary-btn">Shop now<span class="arrow_right"></span></a>

                        </div>
                    </div>
                    <div class="img-of-banner col-3">
                        <img src="../../public/img/product/iphone-15promax.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Banner Section Begin -->
<section class="banner-custom">
    <h2 class="title-custom">VIVO PHONE</h2>
    <div class="container-custom">
        <div class="banner-item-custom">
            <div class="img">
                <img src="../../public/img/product/vivo.png" alt="">
            </div>
            <div class="content">
                <h3>VIVO PLUS 2023</h3>
                <P>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sit, nihil.</P>
            </div>
        </div>
        <div class="banner-item-custom">
            <div class="img">
                <img src="../../public/img/product/vivo.png" alt="">
            </div>
            <div class="content">
                <h3>VIVO PLUS 2023</h3>
                <P>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sit, nihil.</P>
            </div>
        </div>
        <div class="banner-item-custom">
            <div class="img">
                <img src="../../public/img/product/vivo.png" alt="">
            </div>
            <div class="content">
                <h3>VIVO PLUS 2023</h3>
                <P>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sit, nihil.</P>
            </div>
        </div>
    </div>
</section>
<!-- Banner Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="title-custom mt-3 mb-5">BEST SELLERS</h2>
            </div>
        </div>
        <div class="row product__filter">
            <?php foreach ($pro->products_select_home() as $item) {
                extract($item); ?>
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                    <div class="product__item product-item-custom">
                        <a href="?pages=shop-detail&product_id=<?= $product_id ?>"> <img class="product__item__pic set-bg" src="<?= $PUBLIC_URL ?>/img/product/<?= $images ?>"></img></a>
                        <div class="product__item__text text-center">
                            <h6><?= $product_name ?></h6>
                            <a href="?pages=add_cart&product_id=<?= $product_id ?>" class="add-cart">+ Add To Cart</a>
                            <h5><?= currency_format($price) ?></h5>
                        </div>
                    </div>
                </div>
            <?php
            } ?>
        </div>
    </div>
</section>
<!-- Product Section End -->

<!-- Categories Section Begin -->
<section class="categories spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="categories__text">
                    <h2>Clothings Hot <br /> <span>Shoe Collection</span> <br /> Accessories</h2>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="categories__hot__deal">
                    <img src="<?= $PUBLIC_URL ?>/img/product/iphone-15promax.png" alt="">
                    <div class="hot__deal__sticker">
                        <span>Sale Of</span>
                        <h5>$29.99</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 offset-lg-1">
                <div class="categories__deal__countdown">
                    <span>Deal Of The Week</span>
                    <h2>Multi-pocket Chest Bag Black</h2>
                    <div class="categories__deal__countdown__timer" id="countdown">
                        <div class="cd-item">
                            <span>3</span>
                            <p>Days</p>
                        </div>
                        <div class="cd-item">
                            <span>1</span>
                            <p>Hours</p>
                        </div>
                        <div class="cd-item">
                            <span>50</span>
                            <p>Minutes</p>
                        </div>
                        <div class="cd-item">
                            <span>18</span>
                            <p>Seconds</p>
                        </div>
                    </div>
                    <a href="#" class="primary-btn">Shop now</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Latest Blog Section Begin -->
<section class="latest spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Latest News</span>
                    <h2>Smart phone New Trends</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic set-bg" data-setbg="../../public/img/product/vivo.png"></div>
                    <div class="blog__item__text">
                        <span><img src="<?= $PUBLIC_URL ?>/img/icon/calendar.png" alt=""> 16 February 2020</span>
                        <h5>What Curling Irons Are The Best Ones</h5>
                        <a href="#">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic set-bg" data-setbg="<?= $PUBLIC_URL ?>/img/product/iphone-15promax.png"></div>
                    <div class="blog__item__text">
                        <span><img src="<?= $PUBLIC_URL ?>/img/icon/calendar.png" alt=""> 21 February 2020</span>
                        <h5>Eternity Bands Do Last Forever</h5>
                        <a href="#">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic set-bg" data-setbg="../../public/img/product/vivo.png"></div>
                    <div class="blog__item__text">
                        <span><img src="<?= $PUBLIC_URL ?>/img/icon/calendar.png" alt=""> 28 February 2020</span>
                        <h5>The Health Benefits Of Sunglasses</h5>
                        <a href="#">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Latest Blog Section End -->