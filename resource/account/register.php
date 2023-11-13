<?php
if (isset($_POST["register"])) {
    $user = new KhachHang();
    if ($_POST["pass"] == $_POST["passC"]) {
        if ($user->kiemTraSoDienThoai($_POST["phone"])) {
            if ($user->user_select_by_email($_POST["email"]) == Null) {
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
                $username = "khach_hang";
                $password = $_POST["pass"];
                $fullname = $_POST["name"];
                $phone = $_POST["phone"];
                $email = $_POST["email"];
                $avatar = $target_file;
                $role_id = "2";
                $user->user_insert($username, $password, $fullname, $email, $phone, $avatar, $role_id);
                echo "<script>window.location.href = '?pages=login';</script>";
            } else {
                $errol = "Tài khoảng đã tồn tại";
            }
        } else {
            $errol = "Định dạng số điện thoại sai";
        }
    } else {
        $errol = "Xác nhận mật khẩu không đúng";
    }
}
?>


<!-- register Section Begin -->
<section class="contact spad">
    <div class="container">
        
        <div class="row">
            <div class="col-lg-3 col-md-3"></div>
            <div class="col-lg-6 col-md-6">
                <div class="contact__form text-center">
                    <h2><b>Đăng ký</b></h2>
                    <form method="post" enctype="multipart/form-data"> <!-- Để cho phép tải lên file -->
                        <div class="row">
                            <div class="col-lg-12 mt-3">
                                <input name="name" type="text" placeholder="Họ và tên" style="width: 100%;" required>
                            </div>
                            <div class="col-lg-12 mt-1">
                                <input name="email" type="email" placeholder="Email" style="width: 100%;" required>
                            </div>
                            <div class="col-lg-12 mt-3">
                                <input name="phone" type="text" placeholder="Số điện thoại" style="width: 100%;" required>
                            </div>
                            <div class="col-lg-12 mt-1">
                                <input name="pass" type="password" placeholder="Mật khẩu" style="width: 100%;" required>
                            </div>
                            <div class="col-lg-12 mt-1">
                                <input name="passC" type="password" placeholder="Xác nhận mật khẩu" style="width: 100%;" required>
                            </div>
                            <div class="col-lg-12 mt-3">
                                <input name="avatar" type="file" style="width: 100%;" required>
                            </div>
                            <div class="col-lg-12">
                                <small class="text-danger"><?= $errol ?? "" ?></small>
                            </div>
                            <div class="col-lg-12 mt-1">
                                <button name="register" type="submit" class="site-btn" style="width: 100%;">Đăng ký</button>
                            </div>
                            <div class="col-lg-12 mt-3 text-center">
                                <a href="?pages=login">Đã có tài khoản? Đăng nhập ngay</a>
                            </div>
                            <div class="col-lg-12 mt-3 text-center">
                                <a href="">Quên mật khẩu?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- register Section end -->