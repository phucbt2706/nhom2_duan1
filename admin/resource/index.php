<?php
    require "../dao/pdo.php";
    require "../dao/hang-hoa.php";
    require "../lib/validation/validate.php ";

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
                $db = new HangHoa();
                
                $cate_id = $_POST['cate_id'];
                $up_hinh = save_file("images",$IMAGE_DIR);
                $images = strlen($up_hinh) > 0 ? $up_hinh:'product_default.png';
                // $ngay_nhap = date_format(date_create(),'Y-m-d');
                
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
                    include "resource/products/list.php";
                }else {
                    include "resource/products/add.php";
                }
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