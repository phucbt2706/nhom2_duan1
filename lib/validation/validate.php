<?php
function check_login()
{
    global $ADMIN_URL;
    if (isset($_SESSION['user'])) {
        if ($_SESSION['user']['vai_tro'] == 1) {
            return;
        }
        if (strpos($_SERVER["REQUEST_URI"], '/admin/') == FALSE) {
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
function check_form_add_customer()
{
    global $IMAGE_DIR;
    $error = [];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $role_id = $_POST['role_id'];
    $up_hinh = save_file("avatar", $IMAGE_DIR);
    $avatar = strlen($up_hinh) > 0 ? $up_hinh : 'product_default.png';

    //---------------Check username---------------
    if (!empty($username)) {
        if (!check_username($username)) {
            $error['error_username'] = 'The username has an incorect format!';
        }
    } else {
        $error['error_username'] = 'The username can’t be empty!';
    }

    //---------------Check fullanme---------------
    if (!empty($fullname)) {
        if (strlen($fullname) > 40) {
            $error['error_name'] = 'The fullname too long!';
        }
    } else {
        $error['error_name'] = 'The fullname can’t be empty!';
    }

    //---------------Check password---------------
    if (!empty($password)) {
        if (!check_password($password)) {
            $error['error_pass'] = 'The password has an incorect format!';
        }
    } else {
        $error['error_pass'] = 'The password can’t be empty!';
    }

    //---------------Confirm password---------------
    
    if (!empty($confirm_password)) {
        if ($confirm_password != $password) {
            $error['error_conf_pass'] = 'Phải trùng password!';
        }
    } else {
        $error['error_conf_pass'] = 'The confirm password don’t match!';
    }
    //---------------Check sđt---------------

    if (!empty($phone)) {
        if (!is_numeric($phone)) {
            $error['error_phone'] = 'The phone number must be a number!';
        } else {
            if ($phone < 0) {
                $error['error_phone'] = 'The phone number must be more than 0!';
            }
        }
    } else {
        $error['error_phone'] = 'The phone number can’t be empty!';
    }

    //---------------Check address---------------
    if (!empty($address)) {
        if($address < 0){
            $error['error_address'] = 'The address must be not be more 0!';
        }else{
            if(strlen($address)>50){
                $error['error_address'] = 'The address too long!';
            }
        }
    }else{
        $error['error_address'] = 'The address can’t be empty!';
    }



    //---------------Check email---------------
    if (!empty($email)) {
        if (!check_email($email)) {
            $error['error_email'] = 'The email address has an incorect format!';
        }
    } else {
        $error['error_email'] = 'The email address can’t be empty!';
    }

    if (!empty($error)) {
        $value = [
            'error' => $error
        ];
        return $value;

    } else {
        $value = [
            'username' => $username,
            'fullname' => $fullname,
            'password' => $password,
            'phone' => $phone,
            'email' => $email,
            'address' => $address,
            'avatar' => $avatar,
            'role_id' => $role_id
        ];
        return $value;
    }
}

    //---------------Check form update user---------------

function check_form_update_customer()
{
    global $IMAGE_DIR;
    $error = [];
    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $role_id = $_POST['role_id'];
    $up_hinh = save_file("avatar", $IMAGE_DIR);
    $avatar = strlen($up_hinh) > 0 ? $up_hinh : 'product_default.png';

    //---------------Check username---------------
    if (!empty($username)) {
        if (!check_username($username)) {
            $error['error_username'] = 'The username has an incorect format!';
        }
    } else {
        $error['error_username'] = 'The username can’t be empty!';
    }

    //---------------Check fullanme---------------
    if (!empty($fullname)) {
        if (strlen($fullname) > 40) {
            $error['error_name'] = 'The fullname too long!';
        }
    } else {
        $error['error_name'] = 'The fullname can’t be empty!';
    }

    //---------------Check password---------------
    if (!empty($password)) {
        if (!check_password($password)) {
            $error['error_pass'] = 'The password has an incorect format!';
        }
    } else {
        $error['error_pass'] = 'The password can’t be empty!';
    }

    //---------------Confirm password---------------
    
    if (!empty($confirm_password)) {
        if ($confirm_password != $password) {
            $error['error_conf_pass'] = 'Phải trùng password!';
        }
    } else {
        $error['error_conf_pass'] = 'The confirm password don’t match!';
    }
    //---------------Check sđt---------------

    if (!empty($phone)) {
        if (!is_numeric($phone)) {
            $error['error_phone'] = 'The phone number must be a number!';
        } else {
            if ($phone < 0) {
                $error['error_phone'] = 'The phone number must be more than 0!';
            }
        }
    } else {
        $error['error_phone'] = 'The phone number can’t be empty!';
    }

    //---------------Check address---------------
    if (!empty($address)) {
        if($address < 0){
            $error['error_address'] = 'The address must be not be more 0!';
        }else{
            if(strlen($address)>50){
                $error['error_address'] = 'The address too long!';
            }
        }
    }else{
        $error['error_address'] = 'The address can’t be empty!';
    }

    //---------------Check email---------------
    if (!empty($email)) {
        if (!check_email($email)) {
            $error['error_email'] = 'The email address has an incorect format!';
        }
    } else {
        $error['error_email'] = 'The email address can’t be empty!';
    }

    if (!empty($error)) {
        $value = [
            'error' => $error
        ];
        return $value;

    } else {
        $value = [
            'user_id' => $user_id,
            'username' => $username,
            'fullname' => $fullname,
            'password' => $password,
            'phone' => $phone,
            'email' => $email,
            'address' => $address,
            'avatar' => $avatar,
            'role_id' => $role_id
        ];
        return $value;
    }
}
// Function check form add category
function check_form_add_category()
{
    $error = [];
    $cate_name = $_POST['cate_name'];
    $parent_id = $_POST['parent_id'];

    if (!empty($cate_name)) {
        if (is_numeric($cate_name)) {
            $error['error_name_cate'] = 'The category name must be a letter!';
        }
    } else {
        $error['error_name_cate'] = 'The category name can’t be empty!';
    }

    if (!empty($error)) {
        $value = [
            'error' => $error
        ];
        return $value;
    } else {
        $value = [
            'cate_name' => $cate_name,
            'parent_id' => $parent_id,
        ];
        return $value;
    }
}
function check_form_update_category()
{
    $error = [];
    $cate_id = $_POST['cate_id'];
    $cate_name = $_POST['cate_name'];
    $parent_id = $_POST['parent_id'];

    if (!empty($cate_name)) {
        if (is_numeric($cate_name)) {
            $error['error_name_cate'] = 'The category name must be a letter!';
        } else {
            $cate_name = $cate_name;
        }
    } else {
        $error['error_name_cate'] = 'The category name can’t be empty!';
    }

    if (!empty($error)) {
        $value = [
            'error' => $error
        ];
        return $value;
    } else {
        $value = [
            'cate_id' => $cate_id,
            'cate_name' => $cate_name,
            'parent_id' => $parent_id,
        ];
        return $value;
    }
}

// Function check form add product
function check_form_add_product()
{
    global $IMAGE_DIR;
    $error = [];

    $cate_id = $_POST['cate_id'];
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    $up_hinh = save_file("images", $IMAGE_DIR);
    $images = strlen($up_hinh) > 0 ? $up_hinh : 'product_default.png';

    //Check name of product
    if (!empty($product_name)) {
        if (is_numeric($product_name)) {
            $error['name_error'] = 'The product name must be a letter!';
        }
    } else {
        $error['name_error'] = 'The product name can’t be empty!';
    }

    //Check price of product
    if (!empty($price)) {
        if (!is_numeric($price)) {
            $error['price_error'] = 'The price must be a number!';
        } else {
            if ($price < 0) {
                $error['price_error'] = 'The price must be more than 0!';
            }
        }
    } else {
        $error['price_error'] = 'The price can’t be empty!';
    }
    
    if (!empty($quantity)) {
        if (!is_numeric($quantity)) {
            $error['quantity_error'] = 'The quantity must be a number!';
        } else {
            if ($price < 0) {
                $error['quantity_error'] = 'The quantity must be more than 0!';
            }
        }
    } else {
        $error['quantity_error'] = 'The quatity can’t be empty!';
    }

    //Check giam gia
    if (!empty($discount)) {
        if (!is_numeric($discount)) {
            $error['discount_error'] = 'The discount must be a number!';
        } else {
            if ($discount < 0 || $discount > 100) {
                $error['discount_error'] = 'The discount must be between 0% and 100%!';
            }
        }
    } else {
        $error['discount_error'] = 'The discount can’t be empty!';
    }

    if (!empty($error)) {
        $value = [
            'error' => $error
        ];
        return $value;

    } else {
        $value = [
            'cate_id' => $cate_id,
            'product_name' => $product_name,
            'price' => $price,
            'quantity' => $quantity,
            'description' => $description,
            'images' => $images,
            'discount' => $discount
        ];
        return $value;
    }

}

function check_form_update_product()
{
    global $IMAGE_DIR;
    $error = [];

    $cate_id = $_POST['cate_id'];
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    $up_hinh = save_file("images", $IMAGE_DIR);
    $images = strlen($up_hinh) > 0 ? $up_hinh : 'product_default.png';

    //Check name of product
    if (!empty($product_name)) {
        if (is_numeric($product_name)) {
            $error['name_error'] = 'The product name must be letters!';
        }
    } else {
        $error['name_error'] = 'The product name can’t be empty!';
    }

    //Check price of product
    if (!empty($price)) {
        if (!is_numeric($price)) {
            $error['price_error'] = 'The price must be a number!';
        } else {
            if ($price < 0) {
                $error['price_error'] = 'The price must be more than 0!';
            }
        }
    } else {
        $error['price_error'] = 'The price can’t be empty!';
    }

    if (!empty($quantity)) {
        if (!is_numeric($quantity)) {
            $error['quantity_error'] = 'The quantity must be a number!';
        } else {
            if ($price < 0) {
                $error['quantity_error'] = 'The quantity must be more than 0!';
            }
        }
    } else {
        $error['quantity_error'] = 'The quatity can’t be empty!';
    }

    //Check giam gia
    if (!empty($discount)) {
        if (!is_numeric($discount)) {
            $error['discount_error'] = 'The discount must be a number!';
        } else {
            if ($discount < 0 || $discount > 100) {
                $error['discount_error'] = 'The discount must be between 0% and 100%!';
            }
        }
    } else {
        $error['discount_error'] = 'The discount can’t be empty!';
    }

    if (!empty($error)) {
        $value = [
            'error' => $error
        ];
        return $value;

    } else {
        $value = [
            'cate_id' => $cate_id,
            'product_id' => $product_id,
            'product_name' => $product_name,
            'price' => $price,
            'quantity' => $quantity,
            'description' => $description,
            'images' => $images,
            'discount' => $discount
        ];
        return $value;
    }

}
// Function check form add role
function check_form_add_role()
{
    $error = [];
    $role_name = $_POST['role_name'];

    if (!empty($role_name)) {
        if (is_numeric($role_name)) {
            $error['error_role'] = 'The role name must be letters!';
        }
    } else {
        $error['error_role'] = 'The role name can’t be empty!';
    }

    if (!empty($error)) {
        $value = [
            'error' => $error
        ];
        return $value;
    } else {
        $value = [
            'role_name' => $role_name,
        ];
        return $value;
    }
}

//Check name of product
function check_form_update_role()
{
    $error = [];
    // Kiểm tra xem 'role_id' có tồn tại trong $_POST không
    $role_id = $_POST['role_id'];
    $role_name = $_POST['role_name'];

    // Check name of role
    if (!empty($role_name)) {
        if (is_numeric($role_name)) {
            $error['error_role'] = 'The role name must be letters!';
        }
    } else {
        $error['error_role'] = 'The role name can’t be empty!';
    }

    if (!empty($error)) {
        $value = [
            'error' => $error
        ];
        return $value;
    } else {
        $value = [
            'role_id' => $role_id,
            'role_name' => $role_name,
        ];
        return $value;
    }
}

?>