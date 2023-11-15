<?php
   $protocol =  (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://");
   $ROOT_URL = $protocol . $_SERVER['HTTP_HOST'];
    //Admin
    $ASSETS_URL = $ROOT_URL."/admin/public/assets";
    
    //Client
    $PUBLIC_URL  = $ROOT_URL."/public";

    $UPLOAD_URL  = $ROOT_URL."/upload";

    $IMAGE_DIR   = $_SERVER["DOCUMENT_ROOT"] . "$ROOT_URL/content/images/";
   
    function show_array($data)
    {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }

    function currency_format($number){
        return number_format($number).'đ';
    }

    $VIEW_NAME = "index.php";

    /**
     * Lưu file upload vào thư mục
     * $fieldname là tên trường file
     * $target_dir thư mục lưu file
     * return tên file upload
    */

    //Upload file
    function save_file($fieldname, $target_dir)
    {
        $file_uploaded = $_FILES[$fieldname];
        $file_name = basename($file_uploaded["name"]);
        $target_path = $target_dir . $file_name;
        move_uploaded_file($file_uploaded["tmp_name"], $target_path);
        return $file_name;
    }

    function add_cookie($name, $value, $day)
    {
        setcookie($name, $value, time() + (86400 * $day), "/");
    }

    function delete_cookie($name)
    {
        add_cookie($name,"",-1);
    }

    function get_cookie($name)
    {
        return $_COOKIE[$name] ?? '';
    }

    function check_login(){
        global $ADMIN_URL;
        if(isset($_SESSION['user'])){
            if($_SESSION['user']['vai_tro'] == 1){
                return;
            }
            if(strpos($_SERVER["REQUEST_URI"], '/admin/') == FALSE){
                return;
            }
        }
        $_SESSION['request_uri'] = $_SERVER["REQUEST_URI"];
        header("location: $ADMIN_URL/pages/account/");
    }

    //Check username
    function check_username($username)
    {
        $parttern = "/^[A-Za-z0-9_\.]{6,32}$/";
        if (preg_match($parttern, $username)) {
            return true;
        }
    }
    
    //Check fullname
    function check_fullname($fullname)
    {
        $parttern = "/^[a-zA-Z]+[a-zA-Z\s-]*[a-zA-Z]+$/";
        if (preg_match($parttern, $fullname)) {
            return true;
        }
    }

    //Check password
    function check_password($password)
    {
        $parttern = "/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/";
        if (preg_match($parttern, $password)) {
            return true;
        }
    }

    //Check email
    function check_email($email)
    {
        $parttern = "/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/";
        if (preg_match($parttern, $email)) {
            return true;
        }
    }

    //Check number phone
    function check_phone($phone)
    {
        $parttern = "/^(09|08|01[2|6|8|9])+([0-9]{8})$/";
        if (preg_match($parttern, $phone)) {
            return true;
        }
    }

    //Function check form add customer
    function check_form_add_customer (){

        $error  = [];
        $ma_kh  = $_POST['ma_kh'];
        $ten_kh = $_POST['ten_kh'];
        $mat_khau = $_POST['mat_khau'];
        $mat_khau2 = $_POST['mat_khau2'];
        $email = $_POST['email'];
        $vai_tro  = $_POST['vai_tro'];
        
       
        //---------------Check username---------------
        if (!empty($ma_kh)) {
            if (!check_username($ma_kh)) {
                $error['username_format'] = 'Username không đúng định dạng!';
            }
            else{
                $ma_kh = $ma_kh;
            }
        } else {
            $error['username_empty'] = 'Không để trống username!';
        }

        //---------------Check fullanme---------------
        if (!empty($ten_kh)) {
            if (strlen($ten_kh)>40){
                $error['fullname_lenght'] = 'Độ dài không phù hợp';
            }
            else{
                $ten_kh = $ten_kh;
            }
        } else {
            $error['fullname_empty'] = 'Không để trống họ và tên!';
        }

        //---------------Check password---------------
        if (!empty($mat_khau)) {
            if (!check_password($mat_khau)) {
                $error['password_format'] = 'Password không đúng định dạng!';
            }elseif ($mat_khau2 != $mat_khau) {
                $error['password_error'] = 'Password phải giống nhau ';
            }else{
                $mat_khau = $mat_khau;
            }
        } else {
            $error['password_empty'] = 'Không để trống password!';
        }
    
        //---------------Check email---------------
        if (!empty($email)) {
            if (!check_email($email)) {
                $error['email_format'] = 'Email không đúng định dạng!';
            }else{
                $email = $email;
            }
        } else {
            $error['email_empty'] = 'Không để trống email!';
        }

        if (!empty($error)) {
            $value = [
                'error'    => $error
            ];
            return $value;
            
        }else {
            $value =  [
                'ma_kh'    => $ma_kh,
                'ten_kh'   => $ten_kh,
                'mat_khau' => $mat_khau,
                'email'    => $email,
                'vai_tro'    => $vai_tro,
                'error'    => $error
            ];
            return $value;
        }
    }

    // Function check form add category
    function check_form_add_category (){
        $error  = [];
        $ten_loai = $_POST['ten_loai'];

        if (!empty($ten_loai)) {
            if (is_numeric($ten_loai)) {
                $error['name_format'] = 'Tên loại không được là số';
            }
            else{
                $ten_loai = $ten_loai;
            }
        } else {
            $error['name_empty'] = 'Không để trống tên loại!';
        }
         
        if (!empty($error)) {
            $value = [
                'error'    => $error
            ];
            return $value;
        }else {
            $value =  [
                'ten_loai' => $ten_loai,
            ];
            return $value;
        }
    }

    // Function check form add product
    function check_form_add_product (){
        $error  = [];
        $ten_hh = $_POST['ten_hh'];
        $don_gia = $_POST['don_gia'];
        $giam_gia = $_POST['giam_gia'];

        //Check name of product
        if (!empty($ten_hh)) {
            if (is_numeric($ten_hh)) {
                $error['name_format'] = 'Tên sản phẩm phải là chữ!';
            }
            else{
                $ten_hh = $ten_hh;
            }
        } else {
            $error['name_empty'] = 'Không để trống tên sản phẩm!';
        }

        //Check price of product
        if (!empty($don_gia)) {
            if (!is_numeric($don_gia)) {
                $error['price_format'] = 'Giá phải là số!';
            }
            else{
                $don_gia = $don_gia;
            }
        } else {
            $error['price_empty'] = 'Không để trống!';
        }

        //Check giam gia
        if (!empty($giam_gia)) {
            if ($giam_gia < 0 || $giam_gia > 100) {
                $error['sale_format'] = 'Nhập từ 0 đến 100%!';
            }
            else{
                $don_gia = $don_gia;
            }
        }
        if (!empty($error)) {
            $value = [
                'error'    => $error
            ];
            return $value;
            
        }else {
            $value =  [
                
                'ten_hh' => $ten_hh,
                'don_gia' => $don_gia,
                'giam_gia' => $giam_gia
            ];
            return $value;
        }

    }
    

    //-------------------------------------Cart--------------------
    function addCart($id){
        $items = hang_hoa_select_by_id($id);
        extract($items);

        $qty = 1;
        if (isset($_SESSION['cart'])&& array_key_exists($id,$_SESSION['cart']['buy']) ) {
            $qty = $_SESSION['cart']['buy'][$id]['qty'] + 1;
        }

        $_SESSION['cart']['buy'][$id] = [
            'id' => $id,
            'ten_hh' => $ten_hh,
            'don_gia' => $don_gia,
            'hinh' => $hinh,
            'qty' => $qty,
            'sub_total' => $don_gia * $qty
        ];
        updateCart();
    }

    function updateCart(){
        $num_order = 0;
        $total = 0;
        foreach ($_SESSION['cart']['buy'] as $item) {
            $num_order += $item['qty'];
            $total += $item['sub_total'];
        }
    
        $_SESSION['cart']['infor']=[
            'num_order' =>  $num_order,
            'total' =>   $total
        ];
    }

    function get_list_cart(){
        if (isset($_SESSION['cart'])) {
            return $_SESSION['cart']['buy'];
        }
    }

    function get_total_cart(){
        if (isset($_SESSION['cart'])) {
            return $_SESSION['cart']['infor']['total'];
        }
    }

    function deleteCart($id){
        if (isset($_SESSION['cart'])) {
            if (!empty($id)) {
                unset($_SESSION['cart']['buy'][$id]);
            }else{
                unset($_SESSION['cart']);
            }
            updateCart();
        }
    }

    function updateQty($qty){
        if (isset($_POST['btn_update_qty'])) {
            foreach ($qty as $id => $new_qty) {
                $_SESSION['cart']['buy'][$id]['qty'] = $new_qty;
                $_SESSION['cart']['buy'][$id]['sub_total'] = $new_qty *  $_SESSION['cart']['buy'][$id]['don_gia'];
            }  
            updateCart();   
        }   
    }
    
    function get_pagging($num_page,$page){
        $str_html = '<nav aria-label="Page navigation example">
        <ul class="pagination">';
        //Nếu $page >1 thì mới hiển thị button PREVIOUS
        if ($page>1) {
            $page_pre = $page -1;
            $str_html .= '<li class="page-item"><a class="page-link" href="?btn_shop&page='.$page_pre.'"><<</a></li>';
        }

        //Show all tất cả số trang hiện có
        for ($i=1; $i <=$num_page; $i++) { 
            //Nếu đang ở số trang hiện tại thì bg blue
            //Thêm class = active để kích hoạt css trong boostrap
            $active = '';
            if ($i == $page ) {
                $active = 'active';
            }
            $str_html .= '<li class="page-item '.$active.'"><a class="page-link" href="?btn_shop&page='.$i.'">'.$i.'</a></li>';
        }

        //Nếu $page < $num_page thì mới hiển thị button NEXt
        if ($page<$num_page) {
            $page_next = $page + 1;
            $str_html .= '<li class="page-item"><a class="page-link" href="?btn_shop&page='.$page_next.'">>></a></li>';
        }
        $str_html .= '</ul>
        </nav>';
        return $str_html;

    }
?>