<?php 
    class Category extends Connect{
        //Insert category
        function cate_insert($cate_name,$parent_id)
        {
            $sql = "INSERT INTO category(`cate_name`,`parent_id`) VALUES(?,?)";
            $this->pdo_execute($sql, $cate_name, $parent_id);
        }

        //Update
        function cate_update($cate_id, $cate_name,$parent_id)
        {
            $sql = "UPDATE `category` SET `cate_name`=?,`parent_id`=? WHERE `cate_id`=?";
            $this->pdo_execute($sql, $cate_name,$parent_id, $cate_id);
        }

        //Delete
        function cate_delete($cate_id)
        {
            $sql = "DELETE FROM `category` WHERE `cate_id`=?";
            if (is_array($cate_id)) {
                foreach ($cate_id as $id) {
                    $this->pdo_execute($sql, $id);
                }
            } else {
                $this->pdo_execute($sql, $cate_id);
            }
        }

        //Get all
        function category_select_all()
        {
            $sql = "SELECT * FROM category WHERE parent_id = 0";
            return $this->pdo_query($sql);
        }
        function category_select_brand()
        {
            $sql = "SELECT * FROM category WHERE parent_id != 0 LIMIT 0,7";
            return $this->pdo_query($sql);
        }

        function num_row_cate(){
            $sql = "SELECT count(*) as num_row FROM category";
            return $this->pdo_query($sql);
        }

        function cate_select_page($start,$num_rows_in_page){
            $sql = "SELECT * FROM category LIMIT $start,$num_rows_in_page";
            return $this->pdo_query($sql);
        }

        function cate_select_by_id($cate_id)
        {
            $sql = "SELECT * FROM category WHERE cate_id=?";
            return $this->pdo_query_one($sql, $cate_id);
        }
        
        function cate_select_by_parent_id($parent_id)
        {
            $sql = "SELECT * FROM category WHERE parent_id=?";
            return $this->pdo_query($sql, $parent_id);
        }

        function loai_exist($ma_loai)
        {
            $sql = "SELECT count(*) FROM category WHERE ma_loai=?";
            return $this->pdo_query_value($sql, $ma_loai) > 0;
        }
    }
    
?>