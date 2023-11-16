<?php

if(isset($_POST["login"])){
    $user = new KhachHang();
    $data = $user->user_select_by_email($_POST["email"]);
    if($data['email'] == $_POST["email"] && $data['password'] == $_POST["pass"]){
        $_SESSION['user'] = serialize($data);
        $retrieved_data = unserialize($_SESSION['user']);

    }else{
        $errol = 'Email hoặc mật khẩu sai';
    }
    if(!empty($_SESSION['user'])){
        $retrieved_data = unserialize($_SESSION['user']);
        echo "<script>window.location.href = '?pages=account';</script>";
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
                    <h2><b>Đăng nhập</b> </h2>
                    <form method="post">
                        <div class="row">
                            <div class="col-lg-12 mt-3">
                                <input name="email" type="email" placeholder="Email" style="width: 100%; " required>
                            </div>
                            <div class="col-lg-12 mt-1">
                                <input name="pass" type="password" placeholder="Mật khẩu" style="width: 100%;" required>
                            </div>
                            <div class="col-lg-12">
                                <small class="text-danger"><?= $errol ?? "" ?></small>
                            </div>
                            <div class="col-lg-12 mt-1">
                                <button name="login" type="submit" class="site-btn" style="width: 100%;">Đăng nhập</button>
                            </div>
                            <div class="col-lg-12 mt-3 text-center">
                                <a href="">Quên mật khẩu?</a>
                            </div>
                            <div class="col-lg-12 mt-3 text-center">
                                <a href="?pages=register">Đăng ký</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- login Section End -->