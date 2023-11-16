<?php
    require "../dao/pdo.php";
    require "../dao/hang-hoa.php";
    require "../dao/khach-hang.php";
    require "../dao/loai.php";
    require "../lib/validation/validate.php ";

    if (!empty($_SESSION['user'])) {
        require "include/header.php";

        $pages = isset($_GET['pages']) ?  $_GET['pages'] : 'home';
        $db    = new HangHoa();
        $cate  = new Loai();

        switch ($pages) {
            case 'home':{
                include "resource/home/". $pages .".php";
                break;
            }

            //-------------------------------------------------- Module Product
            case 'list_products':{
                $list_product = $db->products_select_all();
                include "resource/products/list.php";
                break;
            }
            
            case 'add_products':{
                $list_cate  = $cate->category_select_all();
                include "resource/products/add.php";
                break;
            }

            case 'insert_product':{
                //$ngay_nhap = date_format(date_create(),'Y-m-d');
                $value = check_form_add_product();
                extract($value);
                if (empty($error)) {
                    try {
                        $db ->product_insert($product_name, $price,$discount,$images,$description,$cate_id);
                        echo "<script>alert(\"Add successfully! \");</script>";
                    } catch (PDOException $e) {
                        throw $e;
                        echo "<script>alert(\"Add failed! \");</script>";
                    }
                    echo "<script>window.location.href ='?pages=list_products';</script>";
                }else {
                    $list_cate  = $cate->category_select_all();
                    include "resource/products/add.php";
                }
                break;
            }

            case 'update_product':{  
                $value = check_form_add_product();
                extract($value);

                if (empty($error)) {
                    try {
                        $db ->product_update($product_id,$product_name,$price,$discount,$images,$description,$cate_id);
                        echo "<script>alert(\"Update successfully! \");</script>";
                    } catch (PDOException $e) {
                        throw $e;
                        echo "<script>alert(\"Update failed! \");</script>";
                    }
                    echo "<script>window.location.href ='?pages=list_products';</script>";
                }else {
                    $id = $_POST['product_id'];
                    $item = $db->products_select_by_id($id);
                    $list_cate  = $cate->category_select_all();
                    include "resource/products/edit.php";
                }
                break;
            }

            case 'edit_product':{
                $id = $_GET['product_id'];
                $item = $db->products_select_by_id($id);
                $list_cate  = $cate->category_select_all();
                include "resource/products/edit.php";
                break;
            }

            case "delete_product":{
                $id = $_GET["product_id"];
                $db->product_delete($id);
                try {
                    $db->product_delete($id);
                    echo "<script>alert(\"Delete product successfully! \");</script>";
                } catch (PDOException $e) {
                    throw $e;
                }
                echo "<script>window.location.href ='?pages=list_products';</script>";
                break;
            }
            case 'delete_all_product':{
                $id = $_POST["product_id"];
                try {
                    $db->product_delete($id);
                    echo "<script>alert(\"Delete product successfully! \");</script>";
                } catch (PDOException $e) {
                    throw $e;
                }
                echo "<script>window.location.href ='?pages=list_products';</script>";
                break;
            }
            //-------------------------------------------------- Module Product

            case 'edit-pw': {
                include "resource/account/" . $pages . ".php";
                break;
            }
           
            default: {
                include "resource/home/404.php";
                break;
            }
    }
    require 'include/footer.php';
} else {
    include  "resource/account/login.php";
}
