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
            $address = $retrieved_data["address"];
            $user->user_update($user_id, $username, $password, $fullname, $email, $phone, $avatar, $role_id, $address);

            $data = $user->user_select_by_email($retrieved_data['email']);
            $_SESSION['user'] = serialize($data);
            $retrieved_data = unserialize($_SESSION['user']);

            echo "<script>window.location.href = '?pages=account';</script>";
        } else {
            $errol = "Password was wrong";
        }
    } else {
        $errol = "Incorrect password";
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
                    <h2><b>Update password</b></h2>
                    <form method="post" enctype="multipart/form-data"> <!-- Để cho phép tải lên file -->
                        <div class="row">
                            <div class="col-lg-12 mt-1">
                                <input name="pass" type="password" placeholder="Old password" style="width: 100%;" required>
                            </div>
                            <div class="col-lg-12 mt-1">
                                <input name="newPass" type="password" placeholder="New password" style="width: 100%;" required>
                            </div>
                            <div class="col-lg-12 mt-1">
                                <input name="passC" type="password" placeholder="Confirm password" style="width: 100%;" required>
                            </div>
                            <div class="col-lg-12">
                                <small class="text-danger"><?= $errol ?? "" ?></small>
                            </div>
                            <div class="col-lg-12 mt-1">
                                <button name="edit_paw" type="submit" class="site-btn" style="width: 100%;">Update</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- register Section end -->