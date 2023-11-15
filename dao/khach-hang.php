<?php
// Insert user
function khach_hang_insert($username, $password, $fullname, $email, $phone, $avatar, $role_id)
{
    $sql = "insert into user(username, password, fullname, email, phone, avatar, role_id) values ('$username', '$password', '$fullname', '$email' , '$phone', '$avatar', '$role_id')";
    pdo_execute($sql);

}
function loadall_taikhoan()
{
    $sql = "select * from user order by user_id asc";
    $listuser = pdo_query($sql);
    return $listuser;
}
function delete_taikhoan()
{
    $sql = "delete from user where user_id = " . $_GET['user_id'];
    $listuser = pdo_query($sql);
}

// Update user
function khach_hang_update()
{
    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $avatar = $_POST['avatar'];
    $role_id = $_POST['role_id'];


    $sql = "UPDATE user SET 
        username = '" . $username . "',
        password = '" . $password . "',
        fullname = '" . $fullname . "',
        email = '" . $email . "',
        phone = '" . $phone . "',
        avatar = '" . $avatar . "',
        role_id = '" . $role_id . "'
    WHERE user_id = " . $user_id;

    pdo_execute($sql);
}



// Delete user
function khach_hang_delete($ma_kh)
{
    $sql = "DELETE FROM khach_hang WHERE ma_kh=?";
    if (is_array($ma_kh)) {
        foreach ($ma_kh as $ma) {
            pdo_execute($sql, $ma);
        }
    } else {
        pdo_execute($sql, $ma_kh);
    }
}

// Get all data
function khach_hang_select_all()
{
    $sql = "SELECT * FROM user";
    return pdo_query($sql);
}

function khach_hang_select_by_id($user_id)
{
    $sql = "SELECT * FROM user WHERE user_id=?";
    return pdo_query_one($sql, $user_id);
}

function khach_hang_exist($ma_kh)
{
    $sql = "SELECT count(*) FROM khach_hang WHERE ma_kh=?";
    return pdo_query_value($sql, $ma_kh) > 0;
}

function khach_hang_select_by_role($vai_tro)
{
    $sql = "SELECT * FROM khach_hang WHERE vai_tro=?";
    return pdo_query_one($sql, $vai_tro);
}

function khach_hang_change_password($ma_kh, $mat_khau_moi)
{
    $sql = "UPDATE khach_hang SET mat_khau=? WHERE ma_kh=?";
    pdo_execute($sql, $mat_khau_moi, $ma_kh);
}
?>