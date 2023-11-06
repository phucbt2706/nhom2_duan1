<?php 
    class Loai extends DB{
        //Insert category
        function loai_insert($ten_loai)
        {
            $sql = "INSERT INTO loai_hang(ten_loai) VALUES(?)";
            $this->pdo_execute($sql, $ten_loai);
        }

        //Update
        function loai_update($ma_loai, $ten_loai)
        {
            $sql = "UPDATE loai_hang SET ten_loai=? WHERE ma_loai=?";
            $this->pdo_execute($sql, $ten_loai, $ma_loai);
        }

        //Delete
        function loai_delete($ma_loai)
        {
            $sql = "DELETE FROM loai_hang WHERE ma_loai=?";
            if (is_array($ma_loai)) {
                foreach ($ma_loai as $ma) {
                    $this->pdo_execute($sql, $ma);
                }
            } else {
                $this->pdo_execute($sql, $ma_loai);
            }
        }

        //Get all
        function loai_select_all()
        {
            $sql = "SELECT * FROM loai_hang";
            return $this->pdo_query($sql);
        }

        function loai_select_by_id($ma_loai)
        {
            $sql = "SELECT * FROM loai_hang WHERE ma_loai=?";
            return $this->pdo_query_one($sql, $ma_loai);
        }

        function loai_exist($ma_loai)
        {
            $sql = "SELECT count(*) FROM loai_hang WHERE ma_loai=?";
            return $this->pdo_query_value($sql, $ma_loai) > 0;
        }
    }
    
?>