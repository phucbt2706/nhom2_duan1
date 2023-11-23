<?php
$order = new Order();
$product_id = $_GET['product_id'];
$order_id = $_GET['order_id'];

try {
    $order->order_detail_delete($product_id,$order_id );
    echo "<script>alert(\"Delete product successfully! \");</script>";
    echo "<script>window.location.href ='?pages=order_detail&order_id={$order_id}';</script>";
} catch (PDOException $e) {
    throw $e;
}
?>
