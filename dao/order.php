<?php

class Order extends Connect{

    function order_insert($user_id,$total,$note,$order_date){
        $conn = $this->pdo_get_connection();
        $sql = "INSERT INTO orders(`user_id`,`total`,`note`,`order_date`) VALUES('$user_id','$total','$note','$order_date')";
        $conn->exec($sql);
        $last_id = $conn->lastInsertId();
        return $last_id;
    }

    function order_details_insert($qty,$price,$product_id,$order_id){
        $sql = "INSERT INTO order_detail(`qty`,`price`, `product_id`,`order_id`) VALUES(?,?,?,?)";
        $this->pdo_execute($sql, $qty,$price, $product_id,$order_id);
    }

    function add_order(){
        $user_id = $_POST['user_id'];
        $total = $_POST['total'];
        $note = !empty($_POST['note']) ? $_POST['note'] : '';
        $order_date = date_format(date_create(),'Y-m-d h-m-s');

        $order_id = $this->order_insert($user_id,$total,$note,$order_date);

        foreach ($_SESSION['cart']['buy'] as $item) {
            $product_id = $item['product_id'];
            $qty = $item['qty'];
            $price = $item['price'];
            $this->order_details_insert($qty,$price,$product_id,$order_id);
        }

        unset($_SESSION['cart']);
        return true;
    }

    function order_delete($order_id){
        $sql = "DELETE FROM `orders` WHERE `order_id` = ?";
        if (is_array($order_id)) {
            foreach ($order_id as $id) {
                $this->pdo_execute($sql, $id);
            }
        } else {
            $this->pdo_execute($sql, $order_id);
        }
    }

    function order_detail_delete($product_id,$order_id){
        $sql = "DELETE FROM `order_detail` WHERE `product_id` = $product_id AND `order_id` = $order_id";
        if (is_array($product_id)) {
            foreach ($product_id as $id) {
                $this->pdo_execute($sql, $id, $order_id);
            }
        } else {
            $this->pdo_execute($sql, $product_id, $order_id);
        }
    }

    function num_row_order(){
        $sql = "SELECT COUNT(order_id) as num_row FROM orders";
        return $this->pdo_query($sql);
    }

    function order_select_page($start,$num_rows_in_page){
        $sql = "SELECT o.order_id, u.fullname ,o.total,COUNT(*) as 'qty'
        FROM user u 
        JOIN orders o ON u.user_id = o.user_id 
        JOIN order_detail od ON o.order_id = od.order_id 
        JOIN product p ON od.product_id = p.product_id 
        GROUP BY od.order_id LIMIT $start,$num_rows_in_page";
        return  $this->pdo_query($sql);
    }

    function order_select_detail($id){
        $sql = "SELECT p.product_name,od.qty,od.price,od.order_id,od.product_id
        FROM user u 
        JOIN orders o ON u.user_id = o.user_id 
        JOIN order_detail od ON o.order_id = od.order_id 
        JOIN product p ON od.product_id = p.product_id 
        WHERE od.order_id = ?";
        return  $this->pdo_query($sql,$id);
    }
   
}