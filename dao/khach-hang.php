<?php
class KhachHang extends Connect
{
    // Insert category
    function user_insert($username, $password, $fullname, $email, $phone, $avatar, $role_id)
    {
        $sql = "INSERT INTO `user`(`username`, `password`, `fullname`, `email`, `phone`, `avatar`, `role_id`) VALUES(?,?,?,?,?,?,?)";
        $this->pdo_execute($sql, $username, $password, $fullname, $email, $phone, $avatar, $role_id);
    }

    // Update category
    function user_update($username, $password, $fullname, $email, $phone, $avatar, $role_id, $user_id)
    {
        $sql = "UPDATE `user` SET username='$username', password='$password', fullname='$fullname', email='$email', phone='$phone', avatar='$avatar', role_id='$role_id' WHERE user_id=?";
        $this->pdo_execute($sql, $user_id);
    }

    // Delete category
    function khach_hang_delete($ma_kh)
    {
        $sql = "DELETE FROM khach_hang WHERE ma_kh=?";
        if (is_array($ma_kh)) {
            foreach ($ma_kh as $ma) {
                $this->pdo_execute($sql, $ma);
            }
        } else {
            $this->pdo_execute($sql, $ma_kh);
        }
    }

    // Get all data
    function khach_hang_select_all()
    {
        $sql = "SELECT * FROM khach_hang";
        return  $this->pdo_query($sql);
    }

    function khach_hang_select_by_id($ma_kh)
    {
        $sql = "SELECT * FROM khach_hang WHERE ma_kh=?";
        return  $this->pdo_query_one($sql, $ma_kh);
    }

    function khach_hang_exist($ma_kh)
    {
        $sql = "SELECT count(*) FROM khach_hang WHERE ma_kh=?";
        return  $this->pdo_query_value($sql, $ma_kh) > 0;
    }

    function khach_hang_select_by_role($vai_tro)
    {
        $sql = "SELECT * FROM khach_hang WHERE vai_tro=?";
        return  $this->pdo_query_one($sql, $vai_tro);
    }

    function khach_hang_change_password($ma_kh, $mat_khau_moi)
    {
        $sql = "UPDATE khach_hang SET mat_khau=? WHERE ma_kh=?";
        $this->pdo_execute($sql, $mat_khau_moi, $ma_kh);
    }

    function kiemTraSoDienThoai($soDienThoai)
    {
        // Loại bỏ các ký tự không phải số từ chuỗi số điện thoại
        $soDienThoai = preg_replace('/\D/', '', $soDienThoai);

        // Kiểm tra xem số điện thoại sau khi loại bỏ ký tự không phải số có đúng định dạng không
        if (preg_match('/^0[0-9]{9}$/', $soDienThoai)) {
            return true; // Số điện thoại đúng định dạng
        } else {
            return false; // Số điện thoại không đúng định dạng
        }
    }

    function user_select_by_email($email)
    {
        $sql = "SELECT `user_id`, `username`, `password`, `fullname`, `email`, `phone`, `avatar`, `role_id` FROM `user` WHERE email = '$email';";
        return  $this->pdo_query_one($sql);
    }
}
