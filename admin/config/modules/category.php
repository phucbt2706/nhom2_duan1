<?php 
require_once "database.php";
function getProductByCategory($category_id){
    global $connection;
    $data = [];
    $query = "SELECT * FROM category";

    $result = mysqli_query($connection, $query);

    if(mysqli_num_rows($result) > 0){
        $data = $result->fetch_all(MYSQLI_ASSOC);
    }

    return $data;
}