<?php

class HangHoa extends DB{
    // Insert product
    function hang_hoa_insert( $ten_hh, $don_gia,$giam_gia,$hinh,$ngay_nhap,$mo_ta,$dac_biet,$ma_loai){
        $sql = "INSERT INTO hang_hoa(ten_hh,don_gia,giam_gia,hinh,ngay_nhap,mo_ta,dac_biet,ma_loai) VALUES(?,?,?,?,?,?,?,?)";
        $this->pdo_execute($sql, $ten_hh,$don_gia,$giam_gia,$hinh,$ngay_nhap,$mo_ta,$dac_biet,$ma_loai);
    }

    // Update product
    function hang_hoa_update( $ma_hh, $ten_hh, $don_gia,$giam_gia,$hinh,$ngay_nhap,$mo_ta,$dac_biet,$ma_loai){
        $sql = "UPDATE hang_hoa SET ten_hh=?,don_gia=?,giam_gia=?,hinh=?,ngay_nhap=?,mo_ta=?,dac_biet=?,ma_loai=? WHERE ma_hh=?";
        $this->pdo_execute($sql, $ten_hh,$don_gia,$giam_gia,$hinh,$ngay_nhap,$mo_ta,$dac_biet,$ma_loai, $ma_hh);
    }

    // Delete product
    function hang_hoa_delete($ma_hh){
        $sql = "DELETE FROM hang_hoa WHERE ma_hh=?";
        if (is_array($ma_hh)) {
            foreach ($ma_hh as $ma) {
                $this->pdo_execute($sql, $ma);
            }
        } else {
            $this->pdo_execute($sql, $ma_hh);
        }
    }

    function hang_hoa_tang_so_luot_xem($ma_hh){
        $sql = "UPDATE hang_hoa SET so_luot_xem = so_luot_xem + 1 WHERE ma_hh=?";
        return $this->pdo_execute($sql, $ma_hh);
    }

    // Get all data
    function hang_hoa_select_all(){
        $sql = "SELECT * FROM hang_hoa";
        return $this->pdo_query($sql);
    }
    function num_row(){
        $sql = "SELECT count(*) as num_row FROM hang_hoa";
        return $this->pdo_query($sql);
    }

    function num_row_cate($ma_loai){
        $sql = "SELECT count(*) as num_row FROM hang_hoa WHERE ma_loai = ? ";
        return $this->pdo_query($sql,$ma_loai);
    }

    function hang_hoa_select_by_id($ma_hh){
        $sql = "SELECT * FROM hang_hoa WHERE ma_hh=?";
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
    function hang_hoa_select_by_loai($ma_loai){
        $sql = "SELECT * FROM hang_hoa WHERE ma_loai = ? LIMIT 0,4";
        return $this->pdo_query($sql, $ma_loai);
    }

    function hang_hoa_select_loai_page($ma_loai,$start,$num_rows_in_page){
        $sql = "SELECT * FROM hang_hoa WHERE ma_loai = ? LIMIT $start,$num_rows_in_page";
        return $this->pdo_query($sql, $ma_loai);
    }

    function hang_hoa_select_keyword($keyword){
        $sql = "SELECT * FROM hang_hoa hh JOIN loai lo ON lo.ma_loai = hh.ma_loai WHERE ten_hh LIKE ? OR ten_loai LIKE ?";
        return $this->pdo_query($sql,'%'. $keyword. '%','%'. $keyword. '%');
    }

    function hang_hoa_select_page($start,$num_rows_in_page){
        $sql = "SELECT * FROM hang_hoa LIMIT $start,$num_rows_in_page";
        return $this->pdo_query($sql);
    }
}
    

?>