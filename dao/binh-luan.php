<?php
    class BinhLuan extends DB{
        function binh_luan_delete_one($ma_bl){
            $sql = "DELETE FROM binh_luan WHERE ma_bl=?";
            return $this->pdo_execute($sql, $ma_bl);
        }
            
        function binh_luan_delete($ma_bl){
            $sql = "DELETE FROM binh_luan WHERE ma_bl=?";
            if(is_array($ma_bl)){
                foreach ($ma_bl as $ma) {
                    $this->pdo_execute($sql, $ma);
                }
            }
            else{
                $this->pdo_execute($sql, $ma_bl);
            }
        }
    
        function binh_luan_select_all(){
            $sql = "SELECT * FROM binh_luan bl ORDER BY ngay_bl";
            return $this->pdo_execute($sql);
        }
    
        function binh_luan_select_by_id($ma_bl){
            $sql = "SELECT * FROM binh_luan WHERE ma_bl =?";
            return $this->pdo_query_one($sql,$ma_bl);
        }
    
        function binh_luan_exist($ma_bl){
            $sql = "SELECT count(*) FROM binh_luan WHERE ma_bl =?";
            return $this->pdo_query_value($sql,$ma_bl)>0;
        }
    
        function binh_luan_select_by_hang_hoa($ma_hh){
            $sql = "SELECT b.*, h.ten_hh FROM binh_luan b JOIN hang_hoa h ON h.ma_hh = b.ma_hh WHERE b.ma_hh = ? ORDER BY ngay_bl DESC";
            return $this->pdo_query($sql,$ma_hh);
        }
    }

    
    

?>