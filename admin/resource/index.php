<?php
require "../dao/pdo.php";
require "../dao/hang-hoa.php";
require "../dao/khach-hang.php";
require "../dao/role.php";
require "../dao/loai.php";
require "../dao/order.php";
require "../lib/validation/validate.php ";
require "../lib/pagging/pagging.php ";
require "../dao/binh-luan.php";

if (!empty($_SESSION['user'])) {
    $data = unserialize($_SESSION['user']);
    if($data['role_id'] == 1){
        require "include/header.php";

        $pages = isset($_GET['pages']) ?  $_GET['pages'] : 'home';
        $db    = new HangHoa();
        $cate  = new Loai();
        $tk    = new KhachHang();
        $bl    = new BinhLuan();
        $role    = new Role();

        switch ($pages) {
            //-------------------------------------------------------Module Home---------------------------- 
            case 'home': {
                include "resource/home/" . $pages . ".php";
                break;
            }

            //-------------------------------------------------------Module Categories---------------------------- 
            case "list_cate": {
                $rows = $cate->num_row_cate();
                $total_rows  = $rows[0]['num_row'];
                $num_rows_in_page = 10;

                $num_page = ceil($total_rows / $num_rows_in_page);

                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; 

                $start = ($page - 1) * $num_rows_in_page;

                $list_cate = $cate->cate_select_page($start, $num_rows_in_page);
                include "resource/categories/list.php";
                break;
            }

            case "form_add_cate": {
                $list_cate  = $cate->category_select_all();
                include "resource/categories/form-add.php";
                break;
            }

            case "insert_cate": {
                $value = check_form_add_category();
                extract($value);

                if (empty($error)) {
                    try {
                        $cate->cate_insert($cate_name, $parent_id);
                        echo "<script>alert(\"Add successfully! \");</script>";
                    } catch (PDOException $e) {
                        throw $e;
                        echo "<script>alert(\"Add failed! \");</script>";
                    }
                    echo "<script>window.location.href ='?pages=list_cate';</script>";
                } else {
                    $list_cate  = $cate->category_select_all();
                    include "resource/categories/form-add.php";
                }
                break;
            }

            case "edit_cate": {
                $id = $_GET['cate_id'];
                $item = $cate->cate_select_by_id($id);
                $list_cate  = $cate->category_select_all();
                include "resource/categories/edit.php";
                break;
            }

            case "update_cate": {
                $value = check_form_update_category();
                extract($value);

                if (empty($error)) {
                    try {
                        $cate->cate_update($cate_id, $cate_name, $parent_id);
                        echo "<script>alert(\"Update successfully! \");</script>";
                    } catch (PDOException $e) {
                        throw $e;
                        echo "<script>alert(\"Update failed! \");</script>";
                    }
                    echo "<script>window.location.href ='?pages=list_cate';</script>";
                } else {
                    $id = $_POST['cate_id'];
                    $item = $cate->cate_select_by_id($id);
                    include "resource/categories/edit.php";
                }
                break;
            }

            case "delete_cate": {
                $id = $_GET['cate_id'];
                try {
                    $cate->cate_delete($id);
                    echo "<script>alert(\"Delete successfully! \");</script>";
                } catch (PDOException $e) {
                    throw $e;
                    echo "<script>alert(\"Delete failed! \");</script>";
                }
                echo "<script>window.location.href ='?pages=list_cate';</script>";
                break;
            }

            case "delete_all_cate": {
                $id = $_POST['cate_id'];
                try {
                    $cate->cate_delete($id);
                    echo "<script>alert(\"Delete successfully! \");</script>";
                } catch (PDOException $e) {
                    throw $e;
                    echo "<script>alert(\"Delete failed! \");</script>";
                }
                echo "<script>window.location.href ='?pages=list_cate';</script>";
                break;
            }


            //------------------------------------------------------Module Product------------------------------ 
            case 'list_products': {
                $rows = $db->num_row_product();
                $total_rows  = $rows[0]['num_row'];
                $num_rows_in_page = 10;
                $num_page = ceil($total_rows / $num_rows_in_page);

                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

                $start = ($page - 1) * $num_rows_in_page;

                $list_product = $db->product_select_page($start, $num_rows_in_page);
                include "resource/products/list.php";
                break;
            }

            case 'add_products': {
                $list_cate  = $cate->category_select_all();
                include "resource/products/add.php";
                break;
            }

            case 'insert_product': {
                $value = check_form_add_product();
                extract($value);
                if (empty($error)) {
                    try {
                        $db->product_insert($product_name, $price, $discount, $images, $description, $cate_id);
                        echo "<script>alert(\"Add successfully! \");</script>";
                    } catch (PDOException $e) {
                        throw $e;
                        echo "<script>alert(\"Add failed! \");</script>";
                    }
                    echo "<script>window.location.href ='?pages=list_products';</script>";
                } else {
                    $list_cate  = $cate->category_select_all();
                    include "resource/products/add.php";
                }
                break;
            }

            case 'update_product': {
                $value = check_form_update_product();
                extract($value);

                if (empty($error)) {
                    try {
                        $db->product_update($product_id, $product_name, $price, $discount, $images, $description, $cate_id);
                        echo "<script>alert(\"Update successfully! \");</script>";
                    } catch (PDOException $e) {
                        throw $e;
                        echo "<script>alert(\"Update failed! \");</script>";
                    }
                    echo "<script>window.location.href ='?pages=list_products';</script>";
                } else {
                    $id = $_POST['product_id'];
                    $item = $db->products_select_by_id($id);
                    $list_cate  = $cate->category_select_all();
                    include "resource/products/edit.php";
                }
                break;
            }

            case 'edit_product': {
                $id = $_GET['product_id'];
                $item = $db->products_select_by_id($id);
                $list_cate  = $cate->category_select_all();
                include "resource/products/edit.php";
                break;
            }

            case "delete_product": {
                $id = $_GET["product_id"];
                try {
                    $db->product_delete($id);
                    echo "<script>alert(\"Delete product successfully! \");</script>";
                } catch (PDOException $e) {
                    throw $e;
                }
                echo "<script>window.location.href ='?pages=list_products';</script>";
                break;
            }

            case 'delete_all_product': {
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

            //-----------------------------------------------------Module Account---------------------------------------------------
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

            //-----------------------------------------------------Module Roles------------------------------------------------------
            case "list_role": {
                $list_role = $role->role_select_all();
                include "resource/roles/list.php";
                break;
            }

            case 'add_role': {
                include "resource/roles/form-add.php";
                break;
            }

            case 'insert_role': {
                $value = check_form_add_role();
                extract($value);
                if (empty($error)) {
                    try {
                        $role->role_insert($role_name);
                        echo "<script>alert(\"Add successfully! \");</script>";
                    } catch (PDOException $e) {
                        throw $e;
                        echo "<script>alert(\"Add failed! \");</script>";
                    }
                    echo "<script>window.location.href ='?pages=list_role';</script>";
                } else {
                    $list_role  = $role->role_select_all();
                    include "resource/roles/form-add.php";
                }
                break;
            }

            case 'update_role': {
                $value = check_form_update_role();
                extract($value);

                if (empty($error)) {
                    try {
                        $role->update_role($role_id, $role_name);
                        echo "<script>alert(\"Update successfully! \");</script>";
                    } catch (PDOException $e) {
                        throw $e;
                        echo "<script>alert(\"Update failed! \");</script>";
                    }
                    echo "<script>window.location.href ='?pages=list_role';</script>";
                } else {
                    $id = $_POST['role_id'];
                    $item = $role->role_select_by_id($id);
                    include "resource/roles/edit.php";
                }
                break;
            }

            case 'edit_role': {
                $id = $_GET['role_id'];
                $item = $role->role_select_by_id($id);
                include "resource/roles/edit.php";
                break;
            }

            case "delete_role": {
                $id = $_GET["role_id"];
                try {
                    $role->role_delete($id);
                    echo "<script>alert(\"Delete role successfully! \");</script>";
                } catch (PDOException $e) {
                    throw $e;
                }
                echo "<script>window.location.href ='?pages=list_role';</script>";
                break;
            }

            case 'delete_all_role': {
                $id = $_POST["role_id"];
                try {
                    $role->role_delete($id);
                    echo "<script>alert(\"Delete role successfully! \");</script>";
                } catch (PDOException $e) {
                    throw $e;
                }
                echo "<script>window.location.href ='?pages=list_role';</script>";
                break;
            }

            //-----------------------------------------------------Module User------------------------------------------------------
            case 'list_account': {
                $rows = $tk->num_row_user();
                $total_rows  = $rows[0]['num_row'];
                $num_rows_in_page = 10;

                $num_page = ceil($total_rows / $num_rows_in_page);

                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; 

                $start = ($page - 1) * $num_rows_in_page;

                $list_user = $tk->user_select_page($start, $num_rows_in_page);
                include "resource/user/list.php";
                break;
            }

            case 'add_user': {
                $list_user  = $tk->user_select_all();
                include "resource/user/add.php";
                break;
            }

            case 'insert_user': {
                $value = check_form_add_customer();
                extract($value);
                if (empty($error)) {
                    try {
                        $tk->user_insert($username, $password, $fullname, $email, $phone, $avatar, $role_id);
                        echo "<script>alert(\"Add successfully! \");</script>";
                    } catch (PDOException $e) {
                        throw $e;
                        echo "<script>alert(\"Add failed! \");</script>";
                    }
                    echo "<script>window.location.href ='?pages=list_account';</script>";
                } else {
                    $list_user  = $tk->user_select_all();
                    include "resource/user/add.php";
                }
                break;
            }

            case 'update_user': {
                $value = check_form_update_customer();
                extract($value);
                if (empty($error)) {
                    try {
                        $tk->user_update($user_id, $username, $password, $fullname, $email, $phone, $avatar, $role_id);
                        echo "<script>alert(\"Update successfully! \");</script>";
                    } catch (PDOException $e) {
                        throw $e;
                        echo "<script>alert(\"Update failed! \");</script>";
                    }
                    echo "<script>window.location.href = '?pages=list_account';</script>";
                } else {
                    $id = $_POST['user_id'];
                    $item = $tk->user_select_by_id($id);
                    $list_user  = $tk->user_select_all();
                    include "resource/user/edit.php";
                }
                break;
            }

            case 'edit_user': {
                $id = $_GET['user_id'];
                $item = $tk->user_select_by_id($id);
                $list_user  = $tk->user_select_all();
                include "resource/user/edit.php";
                break;
            }
            case "delete_user": {
                $id = $_GET["user_id"];
                try {
                    $tk->user_delete($id);
                    echo "<script>alert(\"Delete user successfully! \");</script>";
                } catch (PDOException $e) {
                    throw $e;
                }
                echo "<script>window.location.href ='?pages=list_account';</script>";
                break;
            }

            case 'delete_all_user': {
                $id = $_POST["user_id"];
                try {
                    $tk->user_delete($id);
                    echo "<script>alert(\"Delete user successfully! \");</script>";
                } catch (PDOException $e) {
                    throw $e;
                }
                echo "<script>window.location.href ='?pages=list_account';</script>";
                break;
            }
            
            //-----------------------------------------------------Module Orders----------------------------------------------------
            case 'orders':{
                include "resource/orders/list.php";
                break;
            }

            case 'order_detail':{
                include "resource/orders/list_detail.php";
                break;
            }

            case 'order_delete':{
                include "resource/orders/delete.php";
                break;
            }
            
            case 'order_delete_all':{
                include "resource/orders/delete_all.php";
                break;
            }

            case 'delete_order_detail':{
                include "resource/orders/delete_order_detail.php";
                break;
            }

            //-----------------------------------------------------Module Comments--------------------------------------------------
            case 'list-comment': {
                $comments = $bl->binh_luan_select_all();
                include "resource/comments/list.php";
                break;
            }

            case 'detail': {
                $detail_comment = $bl->binh_luan_get_detail($_GET['product_id']);
                include "resource/comments/detail.php";
                break;
            }

            case 'delete_comment': {
                $bl->binh_luan_delete_one($_GET['comment_id']);
                $comments = $bl->binh_luan_select_all();
                include "resource/comments/list.php";
                break;
            }
            
            //-----------------------------------------------------Module Statistic-------------------------------------------------

            //-----------------------------------------------------Module Statistic-------------------------------------------------
            default: {
                include "resource/home/404.php";
                break;
            }
        }
        require 'include/footer.php';
    } else {
        include  "resource/account/login.php";
    }
    
} else {
    include  "resource/account/login.php";
}
