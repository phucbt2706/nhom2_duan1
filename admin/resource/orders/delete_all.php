<?php
$order = new Order();

if (!empty($_POST['order_id'])) {
    $id = $_POST['order_id'];
    try {
        $order->order_delete($id);
        echo "<script>alert(\"Delete order successfully! \");</script>";
        echo "<script>window.location.href ='?pages=orders';</script>";
    } catch (PDOException $e) {
        throw $e;
    }
}else {
    echo "<script>alert(\"Chưa chọn sản phẩm để xóa \");</script>";
    echo "<script>window.location.href ='?pages=orders';</script>";
}


?>