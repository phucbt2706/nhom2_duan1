<?php
$order = new Order();
$id = $_GET['order_id'];

try {
    $order->order_delete($id);
    echo "<script>alert(\"Delete order successfully! \");</script>";
    echo "<script>window.location.href ='?pages=orders';</script>";
} catch (PDOException $e) {
    throw $e;
}
?>