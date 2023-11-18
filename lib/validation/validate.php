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
    $role_id = $_POST['role_id'];
    $up_hinh = save_file("avatar", $IMAGE_DIR);
    $avatar = strlen($up_hinh) > 0 ? $up_hinh : 'product_default.png';

    //---------------Check username---------------
    if (!empty($username)) {
        if (!check_username($username)) {
            $error['error_username'] = 'Username không đúng định dạng!';
        }
    } else {
        $error['error_username'] = 'Không để trống username!';
    }

    //---------------Check fullanme---------------
    if (!empty($fullname)) {
        if (strlen($fullname) > 40) {
            $error['error_name'] = 'Độ dài không phù hợp';
        }
    } else {
        $error['error_name'] = 'Không để trống họ và tên!';
    }

    //---------------Check password---------------
    if (!empty($password)) {
        if (!check_password($password)) {
            $error['error_pass'] = 'Password không đúng định dạng!';
        }
    } else {
        $error['error_pass'] = 'Không để trống password!';
    }

    //---------------Confirm password---------------
    
    if (!empty($confirm_password)) {
        if ($confirm_password != $password) {
            $error['error_conf_pass'] = 'Phải trùng password!';
        }
    } else {
        $error['error_conf_pass'] = 'Không để trống password!';
    }
    //---------------Check sđt---------------

    if (!empty($phone)) {
        if (!is_numeric($phone)) {
            $error['error_phone'] = 'Giá phải là số!';
        } else {
            if ($phone < 0) {
                $error['error_phone'] = 'Gía phải lớn hơn 0.';
            }
        }
    } else {
        $error['error_phone'] = 'Không để trống!';
    }


    //---------------Check email---------------
    if (!empty($email)) {
        if (!check_email($email)) {
            $error['error_email'] = 'Email không đúng định dạng!';
        }
    } else {
        $error['error_email'] = 'Không để trống email!';
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
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $role_id = $_POST['role_id'];
    $up_hinh = save_file("avatar", $IMAGE_DIR);
    $avatar = strlen($up_hinh) > 0 ? $up_hinh : 'product_default.png';

    //---------------Check username---------------
    if (!empty($username)) {
        if (!check_username($username)) {
            $error['username_format'] = 'Username không đúng định dạng!';
        } else {
            $username = $username;
        }
    } else {
        $error['username_empty'] = 'Không để trống username!';
    }

    //---------------Check fullanme---------------
    if (!empty($fullname)) {
        if (strlen($fullname) > 40) {
            $error['fullname_lenght'] = 'Độ dài không phù hợp';
        } else {
            $fullname = $fullname;
        }
    } else {
        $error['fullname_empty'] = 'Không để trống họ và tên!';
    }

    //---------------Check password---------------
    if (!empty($password)) {
        if (!check_password($password)) {
            $error['password_format'] = 'Password không đúng định dạng!';
        }
    } else {
        $error['password_empty'] = 'Không để trống password!';
    }
    //---------------Check sđt---------------

    if (!empty($phone)) {
        if (!is_numeric($phone)) {
            $error['phone_format'] = 'Giá phải là số!';
        } else {
            if ($phone < 0) {
                $error['phone_format'] = 'Gía phải lớn hơn 0.';
            } else {
                $phone = $phone;
            }
        }
    } else {
        $error['phone_empty'] = 'Không để trống!';
    }


    //---------------Check email---------------
    if (!empty($email)) {
        if (!check_email($email)) {
            $error['email_format'] = 'Email không đúng định dạng!';
        } else {
            $email = $email;
        }
    } else {
        $error['email_empty'] = 'Không để trống email!';
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
            $error['error_name_cate'] = 'Tên loại phải là chữ!';
        }
    } else {
        $error['error_name_cate'] = 'Không để trống tên loại!';
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
            $error['name_format'] = 'Tên loại phải là chữ!';
        } else {
            $cate_name = $cate_name;
        }
    } else {
        $error['name_empty'] = 'Không để trống tên loại!';
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
    $description = $_POST['description'];
    $up_hinh = save_file("images", $IMAGE_DIR);
    $images = strlen($up_hinh) > 0 ? $up_hinh : 'product_default.png';

    //Check name of product
    if (!empty($product_name)) {
        if (is_numeric($product_name)) {
            $error['name_format'] = 'Tên sản phẩm phải là chữ!';
        } else {
            $product_name = $product_name;
        }
    } else {
        $error['name_empty'] = 'Không để trống tên sản phẩm!';
    }

    //Check price of product
    if (!empty($price)) {
        if (!is_numeric($price)) {
            $error['price_format'] = 'Giá phải là số!';
        } else {
            if ($price < 0) {
                $error['price_format'] = 'Gía phải lớn hơn 0.';
            } else {
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
        } else {
            if ($discount < 0 || $discount > 100) {
                $error['sale_format'] = 'Giảm giá từ 0 - 100%.';
            } else {
                $discount = $discount;
            }
        }
    } else {
        $error['sale_format'] = 'Không để trống!';
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
    $description = $_POST['description'];
    $up_hinh = save_file("images", $IMAGE_DIR);
    $images = strlen($up_hinh) > 0 ? $up_hinh : 'product_default.png';

    //Check name of product
    if (!empty($product_name)) {
        if (is_numeric($product_name)) {
            $error['name_format'] = 'Tên sản phẩm phải là chữ!';
        } else {
            $product_name = $product_name;
        }
    } else {
        $error['name_empty'] = 'Không để trống tên sản phẩm!';
    }

    //Check price of product
    if (!empty($price)) {
        if (!is_numeric($price)) {
            $error['price_format'] = 'Giá phải là số!';
        } else {
            if ($price < 0) {
                $error['price_format'] = 'Gía phải lớn hơn 0.';
            } else {
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
        } else {
            if ($discount < 0 || $discount > 100) {
                $error['sale_format'] = 'Giảm giá từ 0 - 100%.';
            } else {
                $discount = $discount;
            }
        }
    } else {
        $error['sale_format'] = 'Không để trống!';
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
            $error['error_role'] = 'Tên loại phải là chữ!';
        } else {
            $role_name = $role_name;
        }
    } else {
        $error['error_role'] = 'Không để trống tên loại!';
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
            $error['error_role'] = 'Tên sản phẩm phải là chữ!';
        } else {
            $role_name = $role_name;
        }
    } else {
        $error['error_role'] = 'Không để trống tên sản phẩm!';
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