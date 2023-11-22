<?php
$errol = "";
if (isset($_POST["login"])) {
    $user = new KhachHang();
    $data = $user->user_select_by_username($_POST["username"]);
    if(!empty($data)){
        if($data['username'] == $_POST["username"] && $data['password'] == $_POST["pass"]){
            $_SESSION['user'] = serialize($data);
            $retrieved_data = unserialize($_SESSION['user']);
    
        }else{
            $errol = 'Username or password is wrong';
        }
        if(!empty($_SESSION['user'])){
            $retrieved_data = unserialize($_SESSION['user']);
            echo "<script>window.location.href = '?pages=account';</script>";
        }
    }else{
        $errol = 'Username or password is wrong';
    }



    if (!empty($_SESSION['user'])) {
        $retrieved_data = unserialize($_SESSION['user']);
        
        if(isset($_SESSION['check']) && $_SESSION['check'] == true){
            header("location: ?pages=checkout");
        }else {
            echo "<script>window.location.href = '?pages=home';</script>";
        }
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
                    <h2><b>LOGIN</b> </h2>
                    <form method="post">
                        <div class="row">
                            <div class="col-lg-12 mt-3">
                                <input name="username" type="text" placeholder="Username" style="width: 100%; " required>
                            </div>
                            <div class="col-lg-12 mt-1">
                                <input name="pass" type="password" placeholder="Password" style="width: 100%;" required>
                            </div>
                            <div class="col-lg-12">
                                <small class="text-danger"><?= $errol ?? "" ?></small>
                            </div>
                            <div class="col-lg-12 mt-1">
                                <button name="login" type="submit" class="site-btn" style="width: 100%;">Login</button>
                            </div>
                            <div class="col-lg-12 mt-3 text-center">
                                <a href="?pages=forgotPassword">For got Password?</a>
                            </div>
                            <div class="col-lg-12 mt-3 text-center">
                                <a href="?pages=register">Register</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- login Section End -->