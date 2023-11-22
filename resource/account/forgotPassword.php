<?php

if (isset($_POST['sendEmail'])) {
    $user = new KhachHang();
    $data = $user->user_select_by_email($_POST["email"]);
    if(!empty($data)) {
    $token = substr(md5(mt_rand(0, 999999)), 0, 8);
    $email = $_POST["email"];
    
    $user->user_update_token($token, $email);
    include "./config/mail.php";
    echo "<script>window.location.href = '?pages=forgotPassword&email=" . $_POST["email"] . "';</script>";
    } else {
        $errol = "You have not registered as a member";
    }
}


if (isset($_POST['check'])) {
    $user = new KhachHang();
    $database = $user->user_select_by_email($_GET['email']);
    if ($_POST['token'] == $database['token']) {

        echo "<script>window.location.href = '?pages=forgotPassword&email=" . $_POST["email"] . "&token=" . $_POST['token'] . "';</script>";
    } else {
        $errol = "Incorrect code";
    }
}

if (isset($_POST["update"])) {
    $user = new KhachHang();
    if ($_POST["passN"] == $_POST["passC"]) {
        $password = $_POST["passN"];
        $email = $_GET["email"];
        $user->user_update_password($password, $email);
        $forgot = "Password changed successfully";
        echo "<script>window.location.href = '?pages=finishForgot';</script>";
    } else {
        $errol = "Password was wrong";
    }
}
?>

<!-- login Section Begin -->
<section class="contact spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3"></div>
            <div class="col-lg-6 col-md-6">
                <div class="contact__form text-center">
                    <h2><b>Forgot password</b> </h2>
                    <form method="post">
                        <div class="row">
                            <?php if (isset($_GET['email']) && !isset($_GET['token'])) { ?>
                                <div class="col-lg-12 mt-3 bg-danger text-white">
                                    <small>Check your email to get the confirmation code</small>
                                </div>
                            <?php } else {
                                echo "";
                            } ?>
                            <div class="col-lg-12 mt-3">
                                <input name="email" value="<?= $_GET['email'] ?? "" ?>" type="text" <?php if (isset($_GET['email'])) {
                                                                                                        echo "readonly";
                                                                                                    }  ?> placeholder="Email" style="width: 100%; " required>
                            </div>
                            <?php if (isset($_GET['email'])) { ?>
                                <div class="col-lg-12 mt-1">
                                    <input name="token" type="text" placeholder="Token" value="<?= $_GET['token'] ?? "" ?>" type="text" <?php if (isset($_GET['token'])) {
                                                                                                                                            echo "readonly";
                                                                                                                                        }  ?> style="width: 100%;" required>
                                </div>
                                <?php if (!isset($_GET['token'])) { ?>
                                    <div class="col-lg-12 mt-2 text-center">
                                        <button name="check" type="submit" class="site-btn" style="width: 100%;">Check</button>
                                    </div>

                                <?php   }
                            } else {  ?>
                                <div class="col-lg-12 mt-2 text-center">
                                    <button name="sendEmail" type="submit" class="site-btn" style="width: 100%;">SenMail</button>
                                </div>
                            <?php }
                            if (isset($_GET['token'])) { ?>
                                <div class="col-lg-12 mt-1">
                                    <input name="passN" type="password" placeholder="New password" style="width: 100%;" required>
                                </div>
                                <div class="col-lg-12 mt-1">
                                    <input name="passC" type="password" placeholder="confirm new password" style="width: 100%;" required>
                                </div>
                                <div class="col-lg-12 mt-2 text-center">
                                    <button name="update" type="submit" class="site-btn" style="width: 100%;">Update</button>
                                </div>
                            <?php  } ?>
                            <div class="col-lg-12">
                                <small class="text-danger"><?= $errol ?? "" ?></small>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- login Section End -->