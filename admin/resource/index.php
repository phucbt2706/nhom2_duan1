<?php
    require "../dao/pdo.php";
    require "../dao/hang-hoa.php";

    if (!empty($_SESSION['user'])) {
        require "include/header.php";
        $pages = isset($_GET['pages']) ?  $_GET['pages'] : 'home';
        $pages = isset($_POST['button']) ? $_POST['button'] : $pages;
        switch ($pages) {
            case 'home':{
                include "resource/home/". $pages .".php";
                break;
            }

            case 'list_products':{
                $db = new HangHoa();
                $list_product = $db->products_select_all();
                include "resource/products/list.php";
                break;
            }
            
            case 'add_products':{
                include "resource/products/add.php";
                break;
            }

            case 'insert_product':{
                $product_name = $_POST['product_name'];
                $price = $_POST['price'];
                $discount = $_POST['discount'];
                $images = (isset($_POST['images']))? $_POST['images'] : '';
                $description = $_POST['description'];
                $cate_id = $_POST['cate_id'];

                $db = new HangHoa();
                $db->product_insert( $product_name, $price,$discount,$images,$description,$cate_id);
                include "resource/products/add.php";
                break;
            }


            case 'btn_edit':{
                $id = $_GET['product_id'];
                $db = new HangHoa();
                $item = $db->products_select_by_id($id);
                include "resource/products/edit.php";
                break;
            }

            case 'contact':{
                include "resource/home/". $pages .".php";
                break;
            }

            default:{
                include "resource/home/404.php";
                break;
            }
        }
        require 'include/footer.php';
    }else{
        include  "resource/account/login.php";
    }
    
?>