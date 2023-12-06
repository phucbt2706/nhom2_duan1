<?php
session_start();

$protocol =  (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://");
$ROOT_URL = $protocol . $_SERVER['HTTP_HOST'];

//Admin
$ASSETS_URL = $ROOT_URL . "/admin/public/assets";

//Client
$PUBLIC_URL  = $ROOT_URL . "/public";

$UPLOAD_URL  = $ROOT_URL . "/upload";

$IMAGE_DIR   = $_SERVER["DOCUMENT_ROOT"] . "/public/img/product/";

function show_array($data)
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}

//Upload file
function save_file($fieldname, $target_dir)
{
    $file_uploaded = $_FILES[$fieldname];
    $file_name = basename($file_uploaded["name"]);
    $target_path = $target_dir . $file_name;
    move_uploaded_file($file_uploaded["tmp_name"], $target_path);
    return $file_name;
}

function add_cookie($name, $value, $day)
{
    setcookie($name, $value, time() + (86400 * $day), "/");
}

function delete_cookie($name)
{
    add_cookie($name, "", -1);
}

function get_cookie($name)
{
    return $_COOKIE[$name] ?? '';
}

function currency_format($number)
{
    return number_format($number) . ' $';
}
