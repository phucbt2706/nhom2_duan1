<?php

if (isset($_POST["edit_paw"])) {
    $user = new KhachHang();
    $data = $user->user_select_by_email($retrieved_data['email']);
    if ($data['password'] == $_POST["pass"]) {
        if ($_POST["newPass"] == $_POST["passC"]) {

            $username = $retrieved_data['username'];
            $password = $_POST['newPass'];
            $fullname = $retrieved_data['fullname'];
            $phone = $retrieved_data['phone'];
            $email = $retrieved_data['email'];
            $avatar = $retrieved_data['avatar'];
            $role_id = $retrieved_data['role_id'];
            $user_id = $retrieved_data["user_id"];
            $user->user_update($user_id, $username, $password, $fullname, $email, $phone, $avatar, $role_id);

            $data = $user->user_select_by_email($retrieved_data['email']);
            $_SESSION['user'] = serialize($data);
            $retrieved_data = unserialize($_SESSION['user']);

            echo "<script>window.location.href = '?pages=account';</script>";
        } else {
            $errol = "Xác nhận mật khẩu không đúng";
        }
    } else {
        $errol = "Mật khẩu không đúng";
    }
}
?>

<!-- register Section Begin -->
<section class="contact spad">
    <div class="container">
        <div class="row mt-5 pt-1">
            <div class="col-lg-3 col-md-3"></div>
            <div class="col-lg-6 col-md-6 rounded border p-5" style="box-shadow: 0 0 5px grey;">
                <div class="contact__form text-center ">
                    <h2><b>Cập nhật mật khẩu</b></h2>
                    <form method="post" enctype="multipart/form-data" class="">
                        <div class="row">
                            <div class="col-lg-12 mt-2">
                                <input name="pass" type="password" placeholder="Mật khẩu cũ" class="form-control" required>
                            </div>
                            <div class="col-lg-12 mt-2">
                                <input name="passC" type="password" placeholder="Xác nhận mật khẩu" class="form-control" required>
                            </div>
                            <div class="col-lg-12 mt-2">
                                <input name="newPass" type="password" placeholder="Mật khẩu mới" class="form-control" required>
                            </div>
                            <div class="col-lg-12">
                                <small class="text-danger"><?= $errol ?? "" ?></small>
                            </div>
                            <div class="col-lg-12 mt-2 ">
                                <button name="edit_paw" type="submit" class="btn btn-primary w-100">Cập nhật</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- register Section end -->