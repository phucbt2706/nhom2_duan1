<?php

class HangHoa extends Connect{
    // Insert product
    function product_insert($product_name, $price,$discount,$images,$description,$cate_id){
        $sql = "INSERT INTO product(`product_name`, `price`,`discount`,`images`,`description`,`cate_id`) VALUES(?,?,?,?,?,?)";
        $this->pdo_execute($sql, $product_name, $price,$discount,$images,$description,$cate_id);
    }

    // Update product
    function product_update($product_id,$product_name, $price,$discount,$images,$description,$cate_id){
        $sql = "UPDATE product SET `product_name`=?,`price`=?,`discount`=?,`images`=?,`description`=?,`cate_id`=? WHERE `product_id`=?";
        $this->pdo_execute($sql, $product_name, $price,$discount,$images,$description,$cate_id, $product_id);
    }

    // Delete product
    function product_delete($product_id){
        $sql = "DELETE FROM product WHERE product_id=?";
        if (is_array($product_id)) {
            foreach ($product_id as $id) {
                $this->pdo_execute($sql, $id);
            }
        } else {
            $this->pdo_execute($sql, $product_id);
        }
    }

    function hang_hoa_tang_so_luot_xem($ma_hh){
        $sql = "UPDATE hang_hoa SET so_luot_xem = so_luot_xem + 1 WHERE ma_hh=?";
        return $this->pdo_execute($sql, $ma_hh);
    }

    // Get all data
    function products_select_all(){
        $sql = "SELECT * FROM product";
        return $this->pdo_query($sql);
    }
    function num_row_product($condition){
        $sql = "SELECT count(*) as num_row FROM product p JOIN category c ON c.cate_id = p.cate_id  ".$condition;
        return $this->pdo_query($sql);
    }
    function num_row_product_admin(){
        $sql = "SELECT count(*) as num_row FROM product ";
        return $this->pdo_query($sql);
    }

    function num_row_cate($ma_loai){
        $sql = "SELECT count(*) as num_row FROM hang_hoa WHERE ma_loai = ? ";
        return $this->pdo_query($sql,$ma_loai);
    }

    function products_select_by_id($ma_hh){
        $sql = "SELECT * FROM product WHERE product_id=?";
        return $this->pdo_query_one($sql, $ma_hh);
    }

    function hang_hoa_exist($ma_hh){
        $sql = "SELECT count(*) FROM hang_hoa WHERE ma_hh=?";
        return $this->pdo_query_value($sql, $ma_hh) > 0;
    }

    function hang_hoa_select_top10(){
        $sql = "SELECT * FROM hang_hoa WHERE so_luot_xem > 0 ORDER BY so_luot_xem DESC LIMIT 0,10";
        return $this->pdo_query($sql);
    }

    function hang_hoa_select_dac_biet(){
        $sql = "SELECT * FROM hang_hoa WHERE dac_biet = 1 ";
        return $this->pdo_query($sql);
    }
    function hang_hoa_select_by_loai($product_id, $cate_id){
        $sql = "SELECT * FROM product WHERE product_id != ? AND cate_id = ?  LIMIT 0,4";
        return $this->pdo_query($sql, $product_id, $cate_id);
    }

    function hang_hoa_select_loai_page($ma_loai,$start,$num_rows_in_page){
        $sql = "SELECT * FROM hang_hoa WHERE ma_loai = ? LIMIT $start,$num_rows_in_page";
        return $this->pdo_query($sql, $ma_loai);
    }

    function hang_hoa_select_keyword($keyword){
        $sql = "SELECT * FROM hang_hoa hh JOIN loai lo ON lo.ma_loai = hh.ma_loai WHERE ten_hh LIKE ? OR ten_loai LIKE ?";
        return $this->pdo_query($sql,'%'. $keyword. '%','%'. $keyword. '%');
    }

    function product_select_page($start,$num_rows_in_page,$condition){
        $sql = "SELECT * FROM product p JOIN category c ON c.cate_id = p.cate_id  ".$condition." LIMIT $start,$num_rows_in_page";
        return $this->pdo_query($sql);
    }
    function product_select_page_admin($start,$num_rows_in_page){
        $sql = "SELECT * FROM product LIMIT $start,$num_rows_in_page";
        return $this->pdo_query($sql);
    }
}
    

?>