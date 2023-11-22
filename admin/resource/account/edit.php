<?php
if (isset($_POST["edit_acount"])) {
    $user = new KhachHang();
    $data = unserialize($_SESSION['user']);
    if ($user->kiemTraSoDienThoai($_POST["phone"])) {
        if (!empty($_FILES['avatar']['name'])) {
            $avatar =  $_FILES['avatar'];
            $target_dir = "./img/";
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
            $avatar = $data["avatar"];
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
                <div class="contact__form text-center">
                    <form method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-12">
                                <h2 class="text-center mb-4"><b>Update account information</b></h2>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <input name="role_id" type="number" value="<?= $retrieved_data['role_id'] ?? "" ?>" placeholder="Role_id" min="1" max="2" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <input name="username" type="text" value="<?= $retrieved_data['username'] ?? "" ?>" placeholder="Username" min="1" max="2" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <input name="name" type="text" value="<?= $retrieved_data['fullname'] ?? "" ?>" placeholder="Full name" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <input name="email" type="email" value="<?= $retrieved_data['email'] ?? "" ?>" placeholder="Email" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <input name="phone" type="text" placeholder="Số điện thoại" value="<?= $retrieved_data['phone'] ?? "" ?>" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <input name="avatar" type="file" class="form-control">
                                    <label class="form-label" for="formFile">Avatar</label>
                                </div>
                                <div>
                                    <small class="text-danger"><?= $errol ?? "" ?></small>
                                </div>
                                <div class="mt-3">
                                    <button name="edit_acount" type="submit" class="btn btn-primary w-100">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- register Section end -->