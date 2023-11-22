<?php

require_once "database.php";

function createSlug($string)
{
    $slug = strtolower(trim(preg_replace('/[^a-zA-Z0-9]+/', '-', $string), '-'));
    return $slug;
}

function selectDataa($table)
{
    $query = "SELECT * FROM $table";
    global $connection;
    $resuls = mysqli_query($connection, $query);
    $data = mysqli_fetch_all($resuls, MYSQLI_ASSOC);
    return $data;
}


function getOneProducts($table, $column, $id)
{
    global $connection;

    $query = "SELECT * FROM $table WHERE `id` = ?";

    if ($stmt = mysqli_prepare($connection, $query)) {

        $data = mysqli_stmt_bind_param($stmt, "i", $id);

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt,);

        $data = mysqli_fetch_assoc($result);
    }

    return $data;
}


// edit product

if (isset($_GET["action"])   == "edit"  && $_GET["pages"] == "product") {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        if (isset($_POST['name-sp'])) {
            $name = trim($_POST['name-sp']);
            $slug = createSlug($name);
            $content = trim($_POST['moTa-sp']);
            $price = trim($_POST['gia-sp']);
            $sale_price = trim($_POST['gia-sale-sp']);
            $danhMuc = trim($_POST['danhMuc']);

            if (!empty($_FILES['thumbnail']['name'])) {
                $thumbnail =  $_FILES['thumbnail'];
                $target_dir = "../images/";
                $target_file = $target_dir . basename($thumbnail['name']);

                if (file_exists($target_file)) {
                    echo "Tệp ko tồn tại";
                } else {
                    if (move_uploaded_file($thumbnail['tmp_name'], $target_file)) {
                        echo "Upload thành công";
                    } else {
                        echo "Upload thất bại";
                    }
                }
            } else {
                $target_file = $_POST['current_thumbnail'];
            }
            $query = "UPDATE products 
                 SET name = '$name', content = '$content', slug = '$slug', thumbnail = '$target_file',
                price = '$price', sale_price = '$sale_price', updated_at = current_timestamp(), danhMuc = '$danhMuc'
                 WHERE id = '$id'";

            if (mysqli_query($connection, $query)) {
                header('location: /admin/?pages=product&action=list');
            } else {
                echo "có lỗi khi sửa sp";
            }
            mysqli_close($connection);
        }
    }
}


//end edit sản phẩm


// thêm sp

if (isset($_GET["action"])  == "add" && $_GET["pages"] == "product") {
    if (isset($_POST['name-sp'])) {
        if (is_numeric($_POST['gia-sp']) && is_numeric($_POST['gia-sale-sp'])) {
            if ($_POST['gia-sp'] > $_POST['gia-sale-sp']) {
                $name = trim($_POST['name-sp']);
                $slug = createSlug($name);
                $content = trim($_POST['moTa-sp']);
                $price = trim($_POST['gia-sp']);
                $sale_price = trim($_POST['gia-sale-sp']);
                $danhMuc = trim($_POST['danhMuc']);

                $thumbnail =  $_FILES['thumbnail'];
                $target_dir = "../images/";
                $target_file = $target_dir . basename($thumbnail['name']);


                if (file_exists($target_file)) {
                    echo "Tệp ko tồn tại";
                } else {
                    if (move_uploaded_file($thumbnail['tmp_name'], $target_file)) {
                        echo "Upload thành công";
                    } else {
                        echo "Upload thất bại";
                    }
                }

                $query = "INSERT INTO  products (name, slug, content, thumbnail, price, sale_price, created_at, updated_at, danhMuc) 
                VALUES ('$name', '$slug', '$content', '$target_file' , '$price', '$sale_price', current_timestamp(), current_timestamp(), '$danhMuc')";

                if (mysqli_query($connection, $query)) {
                    header('location: /admin/?pages=product&action=list');
                } else {
                    echo "Có lỗi khi thêm sp";
                }
            } else {
                echo " <div class='d-flex justify-content-center'><p class='text-danger'> Giá sale phải nhỏ hơn giá gốc!!!</p></div>";
            }
        } else {
            echo "<div class='d-flex justify-content-center'><p class='text-danger'> Giá của sản phẩm phải là số!!!</p></div>";
        }



        mysqli_close($connection);
    }
}
//end thêm sản phẩm


// xóa sản phẩm

if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    $query = "DELETE FROM products 
                WHERE id = $id";

    if (mysqli_query($connection, $query)) {
        header('location: /admin/?pages=product&action=list');
    } else {
        echo "có lỗi khi thêm sp";
    }
    mysqli_close($connection);
}

// end xóa sản phẩm

// in danh sách sản phẩm
function getAllProducts()
{
    global $connection;
    $data = [];


    if(isset($_POST['category'])){
        $category = $_POST['category'];
        $query = "SELECT * FROM products WHERE danhMuc = '$category'";
    } else{
    if (!isset($_POST['timKiem'])) {
        $query = "SELECT * FROM products";
    }
    else {
        $tim = $_POST['timKiem'];
        $query = "SELECT * FROM products WHERE name LIKE '%$tim%' ";
    }}

    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        $data = $result->fetch_all(MYSQLI_ASSOC);
    }
    mysqli_close($connection);
    return $data;
}


