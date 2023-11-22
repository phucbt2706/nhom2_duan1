<?php
require_once "database.php";






// edit 

if (isset($_GET["action"]) == "edit" && $_GET["pages"] == "post") {
    global $connection;

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        if (isset($_POST['name_td'])) {
            $name = trim($_POST['name_td']);
            $content = trim($_POST['moTa_td']);
            $slug = createSlug($name);

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
            echo "hhahaahahhahaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaahhaaaaaaaaaaaa".$_POST['id'];
            $query = "UPDATE posts 
             SET name = '$name', content = '$content', slug = '$slug', thumbnail = '$target_file',
            updated_at = current_timestamp()
             WHERE id = '$id'"; 
            if (mysqli_query($connection, $query)) {
                header('location: /admin/?pages=post&action=list');
            } else {
                echo "Có lỗi khi sửa bài viết";
            }
            mysqli_close($connection);
        }
    }
}



//end edit


// thêm


if (isset($_GET["action"]) == "add" && $_GET["pages"] == "post") {

    if (isset($_POST['name-td']) && isset($_GET["action"]) == "add") {
        $name = trim($_POST['name-td']);
        $content = trim($_POST['moTa-td']);
        $slug = createSlug($name);
        
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

        $query = "INSERT INTO  posts (name, slug, content, thumbnail, category_id, created_at, updated_at) 
            VALUES ('$name','$slug', '$content', '$target_file' , 1 , current_timestamp(), current_timestamp())";

        if (mysqli_query($connection, $query)) {
            header('location: /admin/?pages=post&action=list');
        } else {
            echo "Có lỗi khi thêm bài viết";
        }

        // mysqli_close($connection);
    }
}
//end thêm 




// xóa 

if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    $query = "DELETE FROM posts 
                WHERE id = $id";

    if (mysqli_query($connection, $query)) {
        header('location: /admin/?pages=post&action=list');
    } else {
        echo "có lỗi khi thêm sp";
    }

    mysqli_close($connection);
}

// end 




function getPosts()
{
    global $connection;
    $data = [];
    if (!isset($_POST['timKiem'])) {
        $query = "SELECT * FROM posts";
    }
    else {
        $tim = $_POST['timKiem'];
        $query = "SELECT * FROM posts WHERE name LIKE '%$tim%' ";
    }
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        $data = $result->fetch_all(MYSQLI_ASSOC);
    }

    return $data;
}
