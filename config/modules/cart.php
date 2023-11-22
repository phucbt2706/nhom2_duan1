<?php
session_start();

if (!isset($_SESSION ['cart'])) {
    $_SESSION ['cart'] = [] ;
}
// Them vao gio hang
if (isset ($_POST ['addcart'])) {
    $id = $_POST ['id'] ;
    $name = $_POST ['name'] ;
    $thumbnail = $_POST ['thumbnail'] ;
    $sale_price = $_POST ['sale_price'] ; 
    $qty = 1 ;
    $product = [
        'id' => $id ,
        'name' => $name ,
        'thumbnail' => $thumbnail ,
        'sale_price' => $sale_price ,
        'qty' => $qty 
    ] ;
    $found = false ;
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $productId) {
            if ($id == $productId['id']) {
                $_SESSION['cart']["$id"]['qty']++ ;
                $found = true ; 
                break ;
            }
        }
}
if (!$found) {
    $_SESSION['cart']["$id"] = $product ;
}
header ('location: cart.php') ;
}


if (isset($_SESSION['cart'])) {
    if (isset($_POST['removecart'])) {
        $id = $_POST['removecart'];
        foreach($_SESSION['cart'] as $productId) {
            if($id == $productId["id"]){
                
                unset($_SESSION['cart']["$id"]) ;
                header('Location: cart.php') ;
                break ;

            }
        }
    }
}



