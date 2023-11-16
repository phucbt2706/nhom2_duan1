<?php
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
                'vai_tro'  => $vai_tro,
                'error'    => $error
            ];
            return $value;
        }
    }

    // Function check form add category
    function check_form_add_category (){
        $error  = [];
        $cate_name = $_POST['cate_name'];
        $parent_id = $_POST['parent_id'];

        if (!empty($cate_name)) {
            if (is_numeric($cate_name)) {
                $error['name_format'] = 'Tên loại phải là chữ!';
            }
            else{
                $cate_name = $cate_name;
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
                'cate_name' => $cate_name,
                'parent_id' => $parent_id,
            ];
            return $value;
        }
    }
    function check_form_update_category (){
        $error  = [];
        $cate_id    = $_POST['cate_id'];
        $cate_name = $_POST['cate_name'];
        $parent_id = $_POST['parent_id'];

        if (!empty($cate_name)) {
            if (is_numeric($cate_name)) {
                $error['name_format'] = 'Tên loại phải là chữ!';
            }
            else{
                $cate_name = $cate_name;
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
                'cate_id' => $cate_id,
                'cate_name' => $cate_name,
                'parent_id' => $parent_id,
            ];
            return $value;
        }
    }

    // Function check form add product
    function check_form_add_product (){
        global $IMAGE_DIR;
        $error  = [];
       
        $cate_id      = $_POST['cate_id'];
        $product_name = $_POST['product_name'];
        $price        = $_POST['price'];
        $discount     = $_POST['discount'];
        $description  = $_POST['description'];
        $up_hinh      = save_file("images",$IMAGE_DIR);
        $images       = strlen($up_hinh) > 0 ? $up_hinh:'product_default.png';

        //Check name of product
        if (!empty($product_name)) {
            if (is_numeric($product_name)) {
                $error['name_format'] = 'Tên sản phẩm phải là chữ!';
            }
            else{
                $product_name = $product_name;
            }
        } else {
            $error['name_empty'] = 'Không để trống tên sản phẩm!';
        }

        //Check price of product
        if (!empty($price)) {
            if (!is_numeric($price)) {
                $error['price_format'] = 'Giá phải là số!';
            }
            else{
                if ($price < 0) {
                    $error['price_format'] = 'Gía phải lớn hơn 0.';
                }else {
                    $price = $price;
                }
            }
        } else {
            $error['price_empty'] = 'Không để trống!';
        }

        //Check giam gia
        if (!empty($discount)) {
            if (!is_numeric($discount)) {
                $error['sale_format'] = 'Giảm giá phải là số!';
            }
            else{
                if ($discount < 0 || $discount > 100) {
                    $error['sale_format'] = 'Giảm giá từ 0 - 100%.';
                }else {
                    $discount = $discount;
                }
            }
        }
        else {
            $error['sale_format'] = 'Không để trống!';
        }
        
        if (!empty($error)) {
            $value = [
                'error'    => $error
            ];
            return $value;
            
        }else {
            $value =  [
                'cate_id' => $cate_id,
                'product_name' => $product_name,
                'price' => $price,
                'description' => $description,
                'images' => $images,
                'discount' => $discount
            ];
            return $value;
        }

    }

    function check_form_update_product (){
        global $IMAGE_DIR;
        $error  = [];
        
        $cate_id      = $_POST['cate_id'];
        $product_id   = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $price        = $_POST['price'];
        $discount     = $_POST['discount'];
        $description  = $_POST['description'];
        $up_hinh      = save_file("images",$IMAGE_DIR);
        $images       = strlen($up_hinh) > 0 ? $up_hinh:'product_default.png';

        //Check name of product
        if (!empty($product_name)) {
            if (is_numeric($product_name)) {
                $error['name_format'] = 'Tên sản phẩm phải là chữ!';
            }
            else{
                $product_name = $product_name;
            }
        } else {
            $error['name_empty'] = 'Không để trống tên sản phẩm!';
        }

        //Check price of product
        if (!empty($price)) {
            if (!is_numeric($price)) {
                $error['price_format'] = 'Giá phải là số!';
            }
            else{
                if ($price < 0) {
                    $error['price_format'] = 'Gía phải lớn hơn 0.';
                }else {
                    $price = $price;
                }
            }
        } else {
            $error['price_empty'] = 'Không để trống!';
        }

        //Check giam gia
        if (!empty($discount)) {
            if (!is_numeric($discount)) {
                $error['sale_format'] = 'Giảm giá phải là số!';
            }
            else{
                if ($discount < 0 || $discount > 100) {
                    $error['sale_format'] = 'Giảm giá từ 0 - 100%.';
                }else {
                    $discount = $discount;
                }
            }
        }
        else {
            $error['sale_format'] = 'Không để trống!';
        }
        
        if (!empty($error)) {
            $value = [
                'error'    => $error
            ];
            return $value;
            
        }else {
            $value =  [
                'cate_id' => $cate_id,
                'product_id' => $product_id,
                'product_name' => $product_name,
                'price' => $price,
                'description' => $description,
                'images' => $images,
                'discount' => $discount
            ];
            return $value;
        }

    }

?>