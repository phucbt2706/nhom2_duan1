<?php
if (!empty($_SESSION['user'])) {
    $retrieved_data = unserialize($_SESSION['user']);
    if ($retrieved_data['role_id'] == 1) {
        $_SESSION['userAdmin'] = $_SESSION['user'];
        echo '<script>location.reload();</script>';
    }
}

if (isset($_POST["login"])) {
    $user = new KhachHang();
    $data = $user->user_select_by_username($_POST["name"]);
    if (!empty($data)) {
        if ($data["username"] == $_POST["name"] && $data["password"] == $_POST["pass"] && $data["role_id"] == 1) {
            $_SESSION['userAdmin'] = serialize($data);
            $retrieved_data = unserialize($_SESSION['userAdmin']);
            echo "<script>window.location.href = '?pages=home';</script>";
        } else {
            $errol = 'Tên đăng nhập hoặc mật khẩu sai';
        }
    } else {
        $errol = 'Tên đăng nhập hoặc mật khẩu sai';
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>ADMIN</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= $ASSETS_URL ?>/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="<?= $ASSETS_URL ?>/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?= $ASSETS_URL ?>/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?= $ASSETS_URL ?>/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?= $ASSETS_URL ?>/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?= $ASSETS_URL ?>/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="<?= $ASSETS_URL ?>/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="<?= $ASSETS_URL ?>/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?= $ASSETS_URL ?>/js/config.js"></script>
</head>

<body class="bg-gray-200">
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container my-auto ">
                <div class="row" style="padding-top: 180px">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom ">
                            <div class="card-body ">
                                <div class="text-center">
                                    <h4>Đăng nhập Admin</h4>
                                </div>
                                <form role="form" class="text-start" method="POST">
                                    <div class="input-group input-group-outline my-3">
                                        <input name="name" placeholder="Tên đăng nhập" class="form-control" required>
                                    </div>
                                    <div class="input-group input-group-outline mb-3">
                                        <input type="password" name="pass" placeholder="Mật khẩu" class="form-control" required>
                                    </div>
                                    <div>
                                        <small style="color: red;"><?= $errol ?? ""  ?></small>
                                    </div>
                                    <div class="text-center">
                                        <button name="login" class="btn btn-primary w-100 my-2 mb-2">Đăng nhập</button>
                                    </div>
                                    <p class="mt-2 text-sm text-center">
                                        <a href="" class="text-primary text-gradient font-weight-bold">Quên mật khẩu?</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>