<?php
ob_start();

require "./global.php";
require "./dao/pdo.php";
require "./dao/khach-hang.php";
require "./dao/hang-hoa.php";
require "./dao/loai.php";
require "./lib/pagging/pagging.php ";
require "./dao/cart.php";
require "./dao/binh-luan.php";
require "./dao/order.php";

$pages = isset($_GET['pages']) ?  $_GET['pages'] : 'home';
$pro = new HangHoa();
$cart = new Cart();
$bl = new BinhLuan();
$order = new Order();
//Include header
require "include/header.php";
switch ($pages) {
    //-----------------------------------------------------Module Home---------------------------------------------------
    case 'home': {
        include "resource/home/" . $pages . ".php";
        break;
    }

    case 'contact': {
        include "resource/home/" . $pages . ".php";
        break;
    }

    case 'blog': {
        include "resource/home/" . $pages . ".php";
        break;
    }

    case 'blog-detail': {
        include "resource/home/" . $pages . ".php";
        break;
    }

    case 'about': {
        include "resource/home/" . $pages . ".php";
        break;
    }

    //-----------------------------------------------------Module Shop---------------------------------------------------
    case 'shop': {
        $rows = $pro->num_row_product();
        $total_rows  = $rows[0]['num_row'];
        //Số lượng dữ liệu (bản ghi) trên 1 trang
        $num_rows_in_page = 12;

        //Tổng số trang cho $total_rows bảng ghi với mỗi trang là $num_row_in_page bảng ghi
        $num_page = ceil($total_rows / $num_rows_in_page);

        //Chỉ số trang hiện tại trên URL
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; //Chỉ số để thay đổi dữ liệu khi chuyển trang

        //Chỉ số bắt đầu
        $start = ($page - 1) * $num_rows_in_page;
        $list_product = $pro->product_select_page($start, $num_rows_in_page);
        include "resource/shop/shop.php";
        break;
    }

    case 'shop-detail': {
        $id = $_GET['product_id'];
        $item = $pro->products_select_by_id($id);
        $comment = $bl->binh_luan_get_detail($id);
        if (isset($_POST['comment'])) {
            $infor_user = unserialize($_SESSION['user']);
            $bl->addComment($infor_user['user_id'], $_GET['product_id'], $_POST['content']);
            header("Location:http:/?pages=shop-detail&product_id=" . $_GET['product_id']);
        }
        include "resource/shop/shop-detail.php";
        break;
    }

    //-----------------------------------------------------Module Cart---------------------------------------------------
    case 'cart': {
        include "resource/cart/" . $pages . ".php";
        break;
    }

    case 'add_cart': {
        $id = $_GET['product_id'];
        $cart->addCart($id);
        header("Location:http:/?pages=cart");;
        break;
    }

    case 'delete_prod': {
        $id = $_GET['product_id'];
        $cart->deleteCart($id);
        header("Location:http:/?pages=cart");
        break;
    }

    case 'update_cart': {
        if (isset($_POST['update'])) {
            if (isset($_POST['qty'])) {
                $cart->updateQty($_POST['qty']);
            }
        }
        header("Location:http:/?pages=cart");
        break;
    }

    case 'checkout': {
        if (!empty($_SESSION['user'])) {
            $infor_user = unserialize($_SESSION['user']);
            $list_cart = $cart->get_list_cart();
            include "resource/cart/" . $pages . ".php";
        }else{
            $_SESSION['check'] = true;
            header("location: ?pages=login");
        }
        break;
    }
    case 'order':{
        if ($order->add_order()) {
            echo "<script>alert(\"Đặt hàng thành công\")</script>";
        }
        echo "<script>window.location.href = '?pages=shop';</script>";
        // header("location: ?pages=shop");
        break;
    }
    
    //-----------------------------------------------------Module Account---------------------------------------------------
    case 'login': {
        include "resource/account/" . $pages . ".php";
        break;
    }

    case 'register': {
        include "resource/account/" . $pages . ".php";
        break;
    }

    case 'account': {
        include "resource/account/" . $pages . ".php";
        break;
    }

    case 'edit': {
        include "resource/account/" . $pages . ".php";
        break;
    }

    case 'edit-pw': {
        include "resource/account/" . $pages . ".php";
        break;
    }

    //-----------------------------------------------------Module Admin---------------------------------------------------
    case 'admin': {
        echo "<script>window.location.href = 'admin/index.php';</script>";
        break;
    }

    default: {
        include "resource/home/404.php";
        break;
    }
}
//Include footer
require 'include/footer.php';