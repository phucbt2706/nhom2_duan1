<?php
if (isset($_POST["edit_acount"])) {
    $user = new KhachHang();
    if ($user->kiemTraSoDienThoai($_POST["phone"])) {
        if (!empty($_FILES['avatar']['name'])) {
            $avatar =  $_FILES['avatar'];
            $target_dir = "./admin/img/";
            $target_file = $target_dir . basename($avatar['name']);

            if (file_exists($target_file)) {
                $errol = "Tệp ko tồn tại";
            } else {
                if (move_uploaded_file($avatar['tmp_name'], $target_file)) {
                    $errol = "";
                } else {
                    $errol = "Upload thất bại";
                }
            }
        } else {
            $target_file = $retrieved_data['avatar'];
        }

        $username = $_POST["username"];
        $password = $retrieved_data['password'];
        $fullname = $_POST["name"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $avatar = $avatar['name'];
        $role_id = "2";
        $user_id = $retrieved_data["user_id"];
        $user->user_update($username, $password, $fullname, $email, $phone, $avatar, $role_id, $user_id);

        $data = $user->user_select_by_email($email);
        $_SESSION['user'] = serialize($data);
        $retrieved_data = unserialize($_SESSION['user']);


        echo "<script>window.location.href = '?pages=account';</script>";
    } else {
        $errol = "Định dạng số điện thoại sai";
    }
}
?>


<!-- register Section Begin -->
<section class="contact spad">
    <div class="container">

        <div class="row">
            <div class="col-lg-3 col-md-3"></div>
            <div class="col-lg-6 col-md-6">
                <div class="contact__form">
                    <h2 class="mb-4 text-center"><b>Cập nhật thông tin tài khoảng</b></h2>
                    <form method="post" enctype="multipart/form-data"> <!-- Để cho phép tải lên file -->
                        <div class="row">
                            <div class="col-lg-12 mt-1">
                                <label for="">Họ và tên</label>
                                <input name="name" type="text" value="<?= $retrieved_data['fullname'] ?? "" ?>" placeholder="Họ và tên" style="width: 100%;" required>
                            </div>
                            <div class="col-lg-12 mt1">
                                <label for="">Tên đăng nhập</label>
                                <input name="username" type="text" placeholder="Tên đăng nhập" value="<?= $retrieved_data['username'] ?? "" ?>" style="width: 100%;" required>
                            </div>
                            <div class="col-lg-12 mt-1">
                                <label for="">Email</label>
                                <input name="email" type="email" value="<?= $retrieved_data['email'] ?? "" ?>" placeholder="Email" style="width: 100%;" required>
                            </div>
                            <div class="col-lg-12 mt-1">
                                <label for="">Số điện thoại</label>
                                <input name="phone" type="text" placeholder="Số điện thoại" value="<?= $retrieved_data['phone'] ?? "" ?>" style="width: 100%;" required>
                            </div>
                            <div class="col-lg-12 mt-1">
                                <label for="">Ảnh đại diện</label>
                                <input name="avatar" type="file" style="width: 100%;">
                            </div>
                            <div class="col-lg-12">
                                <small class="text-danger"><?= $errol ?? "" ?></small>
                            </div>
                            <div class="col-lg-12 mt-1">
                                <button name="edit_acount" type="submit" class="site-btn" style="width: 100%;">Cập nhật</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- register Section end -->