<?php
include "include/header.php";
include "../dao/khach-hang.php";
include "../dao/hang-hoa.php";
include "../dao/pdo.php";




// nếu như cái act có tồn và được lấy về (dùng $_GET) còn nếu không thì cho nó về trang home.php

if (isset($_GET['act'])) {

    $act = $_GET['act'];

    switch ($act) {
        case 'adddm':
            if (isset($_POST['adddm']) && ($_POST['adddm'])) {
                $name_dm = $_POST['product_name'];
                $price = $_POST['price'];
                $discount = $_POST['discount'];
                $images = $_POST['images'];
                $description = $_POST['description'];
                $cate_id = $_POST['cate_id'];
                hang_hoa_insert($product_name, $price, $discount, $images, $description, $cate_id);
            }
            include "resource/categorys/add-cate.php";
            break;
        case 'listdm':

            include "../danhmuc/list.php";
            break;
        case 'suadm':


            include "../danhmuc/edit.php";
            break;
        case 'updatedm':

            include "../danhmuc/list.php";
            break;
        case 'xoadm':

            include "../danhmuc/list.php";
            break;

        case 'addpro':
            if (isset($_POST['addpro']) && ($_POST['addpro'])) {
                $product_name = $_POST['product_name'];
                $price = $_POST['price'];
                $discount = $_POST['discount'];
                $images = $_POST['images'];
                $description = $_POST['description'];
                $cate_id = $_POST['cate_id'];
                hang_hoa_insert($product_name, $price, $discount, $images, $description, $cate_id);
            }
            include "resource/products/add.php";
            break;

        case 'listpro':
            $listproduct = product_select_all();
            include "resource/products/list.php";
            break;
        case 'xoapro':
            if (isset($_GET['product_id']) && $_GET['product_id'] > 0) {
                product_delete();
            }
            $sql = "select * from product order by product_id asc";
            $listproduct = pdo_query($sql);
            include "resource/products/list.php";
            break;
        case 'suapro':
            if (isset($_GET['product_id']) && $_GET['product_id'] > 0) {
                $sql = "select * from product where product_id=" . $_GET['product_id'];
                $pro = pdo_query_one($sql);
            }
            $listproduct = product_select_all();
            include "resource/products/edit.php";
            break;
        case 'updatepro':
            if (isset($_POST['updatepro']) && ($_POST['updatepro'])) {
                product_update();

            }
            $sql = "select * from product order by product_id asc";
            $listproduct = product_select_all();
            include "resource/products/list.php";
            break;

        case 'adduser':
            if (isset($_POST['adduser']) && ($_POST['adduser'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $fullname = $_POST['fullname'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $avatar = $_POST['avatar'];
                $role_id = $_POST['role_id'];
                khach_hang_insert($username, $password, $fullname, $email, $phone, $avatar, $role_id);
            }
            include "resource/user/add.php";
            break;
        case 'listuser':
            $listuser = khach_hang_select_all();
            include "resource/user/list.php";
            break;
        case 'xoatk':
            if (isset($_GET['user_id']) && $_GET['user_id'] > 0) {
                delete_taikhoan();
            }
            $sql = "select * from user order by user_id asc";
            $listuser = pdo_query($sql);
            include "resource/user/list.php";
            break;
        case 'suatk':
            if (isset($_GET['user_id']) && $_GET['user_id'] > 0) {
                $sql = "select * from user where user_id=" . $_GET['user_id'];
                $tk = pdo_query_one($sql);
            }
            $listuser = loadall_taikhoan();
            include "resource/user/edit.php";
            break;
        case 'updateuser':
            if (isset($_POST['updateuser']) && ($_POST['updateuser'])) {
                khach_hang_update();
            }
            $sql = "select * from user order by user_id asc";
            $listusser = khach_hang_select_all();
            include "resource/user/list.php";
            break;
    }


} else {
    include 'resource/home/home.php';
}


include 'include/footer.php';

?>