<?php
require_once "database.php";
function getUsers()
{
    global $connection;
    $data = [];
    $query = "SELECT * FROM users";

    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        $data = $result->fetch_all(MYSQLI_ASSOC);
    }

    return $data;
}

function createUser($name, $email, $password)
{
    global $connection;

    $query = "INSERT INTO users (name, email, password) 
                VALUES ('$name', '$email', '$password')";
    mysqli_query($connection, $query);
}

// xóa 

if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    $query = "DELETE FROM users 
                WHERE id = $id";

    if (mysqli_query($connection, $query)) {
        header('location: /admin/?pages=account&action=list');
    } else {
        echo "có lỗi khi xóa";
    }

    mysqli_close($connection);
}

// end 

if (isset($_POST['name-dn'])) {
    $name = trim($_POST['name-dn']);
    $mail = trim($_POST['mail-dn']);
    $pass = trim($_POST['password-dn']);
    $pass_xn = trim($_POST['password-xn']);

    if (!($pass == $pass_xn)) {
        echo "Mật khẩu xác nhận không đúng";
    } else {
        $query = "INSERT INTO  `users` (name, email, password, created_at, updated_at) 
        VALUES ('$name', '$mail', '$pass', current_timestamp(), current_timestamp())";

            if (!mysqli_query($connection, $query)) {
                echo "Tài khoảng đã tồn tại";
            } else {
                header('Location: dangNhap.php');
            }
    }
}


function login($email, $pass)
{
    global $connection;    
    $queryry = "SELECT *
    FROM users
    WHERE users.email = '$email'";

    $data = mysqli_query($connection, $queryry);

    $post = mysqli_fetch_assoc($data);

    $emaildn =$post['email'] ;
    $passdn =$post['password'] ;
    if ($email == $emaildn && $pass == $passdn){
        header('Location: index.php');
    }else{
        echo 'Sai mật khẩu hoặc email';
    }
}
