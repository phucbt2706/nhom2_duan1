<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Male-Fashion</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="<?= $PUBLIC_URL ?>/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?= $PUBLIC_URL ?>/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?= $PUBLIC_URL ?>/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?= $PUBLIC_URL ?>/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="<?= $PUBLIC_URL ?>/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="<?= $PUBLIC_URL ?>/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?= $PUBLIC_URL ?>/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?= $PUBLIC_URL ?>/css/style.css" type="text/css">
    <link rel="stylesheet" href="<?= $PUBLIC_URL ?>/css/main.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__option">
            <div class="offcanvas__links">
                <a href="#">Sign in</a>
                <a href="">AMIN</a>
            </div>
            <div class="offcanvas__top__hover">
                <span>Usd <i class="arrow_carrot-down"></i></span>
                <ul>
                    <li>USD</li>
                    <li>EUR</li>
                    <li>USD</li>
                </ul>
            </div>
        </div>
        <div class="offcanvas__nav__option">
            <a href="#" class="search-switch"><img src="<?= $PUBLIC_URL ?>/img/icon/search.png" alt=""></a>
            <a href="#"><img src="<?= $PUBLIC_URL ?>/img/icon/heart.png" alt=""></a>
            <a href="#"><img src="<?= $PUBLIC_URL ?>/img/icon/cart.png" alt=""><span><?= sizeof($_SESSION['cart']['buy']) ?></span></a>
            <div class="price">$0.00</div>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__text">
            <p>Free shipping, 30-day return or refund guarantee.</p>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7">
                        <div class="header__top__left">
                            <p>Free shipping, 30-day return or refund guarantee.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5">
                        <div class="header__top__right">
                            <div class="header__top__links ">
                                <?php
                                if (!empty($_SESSION['user'])) {
                                    $retrieved_data = unserialize($_SESSION['user']);

                                    if ($retrieved_data['role_id'] == 1) {
                                        echo '
                                    <a href="?pages=account" class="m-0" >                                    
                                    <span style="margin: 0; padding:0 color: ffffff"> <img style="margin-right: 5px;" width="20px" height="20px" src="./admin/img/' . $retrieved_data['avatar'] . '" alt="">' . $retrieved_data['fullname'] . '</span>
                                    </a>
                                    <div class="header__top__hover ml-4">
                                        <a href="/admin">ADMIN</a>
                                    </div>';
                                    } else {
                                        echo '
                                    <a href="?pages=account" class="m-0" >                                    
                                    <span style="margin: 0; padding:0 color: rgb(255,255,255)"> <img style="margin-right: 5px;" width="20px" height="20px" src="./admin/img/' . $retrieved_data['avatar'] . '" alt="">' . $retrieved_data['fullname'] . '</span>
                                    </a>';
                                    }
                                } else {
                                    echo '
                                        <a href="?pages=login">Đăng Nhập</a>
                                        <a style="margin: -15px" href="?pages=register">Đăng Ký</a>';
                                }

                                ?>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                        <a href="?pages=home"><img src="<?= $PUBLIC_URL ?>/img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li><a href="?pages=home">Home</a></li>
                            <li><a href="?pages=shop">Shop</a></li>
                            <li><a href="?pages=about">About us</a></li>
                            <li><a href="?pages=blog">Blog</a></li>
                            <li><a href="?pages=contact">Contacts</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="header__nav__option">
                        <a href="#" class="search-switch"><img src="<?= $PUBLIC_URL ?>/img/icon/search.png" alt=""></a>
                        <a href="#"><img src="<?= $PUBLIC_URL ?>/img/icon/heart.png" alt=""></a>

                        <?php if (isset($_SESSION['cart'])) : ?>
                            <a href="?pages=cart"><img src="<?= $PUBLIC_URL ?>/img/icon/cart.png" alt=""> <span><?= sizeof($_SESSION['cart']['buy']) ?></span></a>
                            <div class="price"><?= currency_format($_SESSION['cart']['info']['total']) ?></div>
                        <?php else : ?>
                            <a href="?pages=cart"><img src="<?= $PUBLIC_URL ?>/img/icon/cart.png" alt=""> <span>0</span></a>
                            <div class="price">0,0đ</div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>
    <!-- Header Section End -->