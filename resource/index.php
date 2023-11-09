<?php
    require './global.php';
    require "./dao/pdo.php";
    require "./dao/khach-hang.php";
    require "./dao/hang-hoa.php";
    require "./dao/loai.php";
    
    require "include/header.php";
    $pages = isset($_GET['pages']) ?  $_GET['pages'] : 'home';
    
    switch ($pages) {
        case 'home':{
            include "resource/home/". $pages .".php";
            break;
        }

        case 'contact':{
            include "resource/home/". $pages .".php";
            break;
        }

        case 'blog':{
            include "resource/home/". $pages .".php";
            break;
        }

        case 'blog-detail':{
            include "resource/home/". $pages .".php";
            break;
        }

        case 'about':{
            include "resource/home/". $pages .".php";
            break;
        }

        case 'shop':{
            include "resource/shop/". $pages .".php";
            break;
        }

        case 'shop-detail':{
            include "resource/shop/". $pages .".php";
            break;
        }

        case 'cart':{
            include "resource/cart/". $pages .".php";
            break;
        }
        
        case 'checkout':{
            include "resource/cart/". $pages .".php";
            break;
        }

        default:{
            include "resource/home/404.php";
            break;
        }
    }

    require 'include/footer.php';
?>