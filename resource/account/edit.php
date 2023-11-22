<?php
if (isset($_POST["edit_acount"])) {
    $user = new KhachHang();
    if ($user->kiemTraSoDienThoai($_POST["phone"])) {
        if (!empty($_FILES['avatar']['name'])) {
            $avatar =  $_FILES['avatar'];
            $target_dir = "./admin/img/";
            $target_file = $target_dir . basename($avatar['name']);

            if (file_exists($target_file)) {
                $errol = "";
            } else {
                if (move_uploaded_file($avatar['tmp_name'], $target_file)) {
                    $errol = "";
                } else {
                    $errol = "";
                }
            }
        } else {
            $avatar = $retrieved_data["avatar"];
        }

        $username = $_POST["username"];
        $password = $retrieved_data['password'];
        $fullname = $_POST["name"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $avatar =$retrieved_data["avatar"];
        $role_id = $retrieved_data["role_id"];
        $user_id = $retrieved_data["user_id"];
      
        $user->user_update($user_id,$username, $password, $fullname, $email, $phone, $avatar, $role_id);

        $data = $user->user_select_by_email($email);
        $_SESSION['user'] = serialize($data);
        $retrieved_data = unserialize($_SESSION['user']);


        echo "<script>window.location.href = '?pages=account';</script>";
    } else {
        $errol = "Incorrect phone number format";
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
                    <h2 class="mb-4 text-center"><b>Update account information</b></h2>
                    <form method="post" enctype="multipart/form-data"> <!-- Để cho phép tải lên file -->
                        <div class="row">
                            <div class="col-lg-12 mt-1">
                                <label for="">Full Name</label>
                                <input name="name" type="text" value="<?= $retrieved_data['fullname'] ?? "" ?>" placeholder="Full name" style="width: 100%;" required>
                            </div>
                            <div class="col-lg-12 mt1">
                                <label for="">Username</label>
                                <input name="username" type="text" placeholder="Username" value="<?= $retrieved_data['username'] ?? "" ?>" style="width: 100%;" required>
                            </div>
                            <div class="col-lg-12 mt-1">
                                <label for="">Email</label>
                                <input name="email" type="email" value="<?= $retrieved_data['email'] ?? "" ?>" placeholder="Email" style="width: 100%;" required>
                            </div>
                            <div class="col-lg-12 mt-1">
                                <label for="">Phone</label>
                                <input name="phone" type="text" placeholder="Phone" value="<?= $retrieved_data['phone'] ?? "" ?>" style="width: 100%;" required>
                            </div>
                            <div class="col-lg-12 mt-1">
                                <label for="">Avatar</label>
                                <input name="avatar" type="file" style="width: 100%;">
                            </div>
                            <div class="col-lg-12">
                                <small class="text-danger"><?= $errol ?? "" ?></small>
                            </div>
                            <div class="col-lg-12 mt-1">
                                <button name="edit_acount" type="submit" class="site-btn" style="width: 100%;">Update</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- register Section end -->