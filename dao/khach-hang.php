<?php
class KhachHang extends Connect
{
    // Insert category
    function user_insert($username, $password, $fullname, $email, $phone, $avatar, $role_id, $address)
    {
        $sql = "INSERT INTO `user`(`username`, `password`, `fullname`, `email`, `phone`, `avatar`, `role_id`, `address`) VALUES(?,?,?,?,?,?,?,?)";
        $this->pdo_execute($sql, $username, $password, $fullname, $email, $phone, $avatar, $role_id, $address);
    }

    // Update category
    function user_update($user_id, $username, $password, $fullname, $email, $phone, $avatar, $role_id, $address)
    {
        $sql = "UPDATE `user` SET `username`=?, `password`=?, `fullname`=?, `email`=?, `phone`=?, `avatar`=?, `role_id`=?, `address`=? WHERE user_id=?";
        $this->pdo_execute($sql, $username, $password, $fullname, $email, $phone, $avatar, $role_id, $address, $user_id);
    }


    // Delete category
    function user_delete($user_id)
    {
        $sql = "DELETE FROM user WHERE user_id=?";
        if (is_array($user_id)) {
            foreach ($user_id as $id) {
                $this->pdo_execute($sql, $id);
            }
        } else {
            $this->pdo_execute($sql, $user_id);
        }
    }


    // Get all data
    function user_select_all()
    {
        $sql = "SELECT * FROM user";
        return  $this->pdo_query($sql);
    }
    function num_row_user()
    {
        $sql = "SELECT count(*) as num_row FROM user";
        return $this->pdo_query($sql);
    }
    function user_select_page($start, $num_rows_in_page)
    {
        $sql = "SELECT * FROM user LIMIT $start,$num_rows_in_page";
        return $this->pdo_query($sql);
    }

    function user_select_by_id($user_id)
    {
        $sql = "SELECT * FROM user WHERE user_id=?";
        return  $this->pdo_query_one($sql, $user_id);
    }

    function user_exist($user_id)
    {
        $sql = "SELECT count(*) FROM user WHERE user_id=?";
        return  $this->pdo_query_value($sql, $user_id) > 0;
    }

    function user_select_by_role($vai_tro)
    {
        $sql = "SELECT * FROM user WHERE vai_tro=?";
        return  $this->pdo_query_one($sql, $vai_tro);
    }

    function user_change_password($user_id, $mat_khau_moi)
    {
        $sql = "UPDATE user SET mat_khau=? WHERE user_id=?";
        $this->pdo_execute($sql, $mat_khau_moi, $user_id);
    }

    function kiemTraSoDienThoai($soDienThoai)
    {
        // Loại bỏ các ký tự không phải số từ chuỗi số điện thoại
        $soDienThoai = preg_replace('/\D/', '', $soDienThoai);

        // Kiểm tra xem số điện thoại sau khi loại bỏ ký tự không phải số có đúng định dạng không
        if (preg_match('/^\d{10}$/', $soDienThoai)) {
            return true; // Số điện thoại đúng định dạng
        } else {
            return false; // Số điện thoại không đúng định dạng
        }
    }

    function user_select_by_email($email)
    {
        $sql = "SELECT * FROM `user` WHERE email = '$email';";
        return  $this->pdo_query_one($sql);
    }

    function user_select_by_username($name)
    {
        $sql = "SELECT * FROM `user` WHERE username = '$name';";
        return  $this->pdo_query_one($sql);
    }

    function user_update_password($password, $email)
    {
        $sql = "UPDATE `user` SET password='$password' WHERE email= '$email';";
        $this->pdo_execute($sql);
    }
    function user_update_token($token, $email)
    {
        $sql = "UPDATE `user` SET `token`='$token' WHERE email= '$email';";
        $this->pdo_execute($sql);
    }
}
