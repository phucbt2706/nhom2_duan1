<?php
    class Cart extends HangHoa{
        function addCart($id){
            $items = $this->hang_hoa_select_by_id($id);
            extract($items);
    
            $qty = 1;
            if (isset($_SESSION['cart'])&& array_key_exists($id,$_SESSION['cart']['buy']) ) {
                $qty = $_SESSION['cart']['buy'][$id]['qty'] + 1;
            }
    
            $_SESSION['cart']['buy'][$id] = [
                'id' => $id,
                'ten_hh' => $ten_hh,
                'don_gia' => $don_gia,
                'hinh' => $hinh,
                'qty' => $qty,
                'sub_total' => $don_gia * $qty
            ];
            $this->updateCart();
        }

        function updateCart(){
            $num_order = 0;
            $total = 0;
            foreach ($_SESSION['cart']['buy'] as $item) {
                $num_order += $item['qty'];
                $total += $item['sub_total'];
            }
        
            $_SESSION['cart']['infor']=[
                'num_order' =>  $num_order,
                'total' =>   $total
            ];
        }

        function get_list_cart(){
            if (isset($_SESSION['cart'])) {
                return $_SESSION['cart']['buy'];
            }
        }
    
        function get_total_cart(){
            if (isset($_SESSION['cart'])) {
                return $_SESSION['cart']['infor']['total'];
            }
        }
    
        function deleteCart($id){
            if (isset($_SESSION['cart'])) {
                if (!empty($id)) {
                    unset($_SESSION['cart']['buy'][$id]);
                }else{
                    unset($_SESSION['cart']);
                }
                $this->updateCart();
            }
        }
    
        function updateQty($qty){
            if (isset($_POST['btn_update_qty'])) {
                foreach ($qty as $id => $new_qty) {
                    $_SESSION['cart']['buy'][$id]['qty'] = $new_qty;
                    $_SESSION['cart']['buy'][$id]['sub_total'] = $new_qty *  $_SESSION['cart']['buy'][$id]['don_gia'];
                }  
                $this->updateCart();   
            }   
        }
    }

?>