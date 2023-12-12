<?php
class Statistic extends Connect{
    function thong_ke_hang_hoa(){
        $sql = " SELECT c.cate_id,c.cate_name,c.parent_id,
                        COUNT(*) num_cate 
                        FROM product p 
                        JOIN category c ON c.cate_id = p.cate_id 
                        GROUP BY c.cate_id,c.cate_name
                        ";
        return $this->pdo_query($sql);
    }

    function get_name_parent($parent_id){
        $sql = " SELECT * FROM category WHERE cate_id = ?";
        $item = $this->pdo_query_one($sql,$parent_id);
        return $item['cate_name'];
    }

    
    function statistic_cmt($start,$num_rows_in_page){
        $sql = " SELECT p.product_id, p.product_name,
                MIN(c.comment_date) oldest,
                MAX(c.comment_date) newest
                FROM comments c
                JOIN product p ON c.product_id = p.product_id
                GROUP BY p.product_id, p.product_name
                LIMIT $start,$num_rows_in_page ";
        return $this->pdo_query($sql);
    }

    function num_row_cmt(){
        $sql = " SELECT p.product_id, p.product_name,
                COUNT(*) as num_row
                FROM comments c
                JOIN product p ON c.product_id = p.product_id
                GROUP BY p.product_id, p.product_name";
        return $this->pdo_query($sql);
    }

    
}
?>