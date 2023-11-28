<?php
class Statistic extends Connect{
    function thong_ke_hang_hoa(){
        $sql = " SELECT lo.ma_loai, lo.ten_loai,"
                        . " COUNT(*) so_luong,"
                        . " MIN(hh.don_gia) gia_min,"
                        . " MAX(hh.don_gia) gia_max,"
                        . " AVG(hh.don_gia) gia_avg,"
                        . " FROM hang_hoa hh "
                        . " JOIN loai_hang lo ON lo.ma_loai = hh.ma_loai "
                        . " GROUP BY lo.ma_loai, lo.ten_loai";
        return $this->pdo_query($sql);
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