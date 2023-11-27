<?php
class BinhLuan extends Connect
{
    function binh_luan_delete_one($ma_bl)
    {
        $sql = "DELETE FROM comments WHERE comment_id=?";
        return $this->pdo_execute($sql, $ma_bl);
    }

    function binh_luan_delete($ma_bl)
    {
        $sql = "DELETE FROM comments WHERE ma_bl=?";
        if (is_array($ma_bl)) {
            foreach ($ma_bl as $ma) {
                $this->pdo_execute($sql, $ma);
            }
        } else {
            $this->pdo_execute($sql, $ma_bl);
        }
    }

    function binh_luan_select_all()
    {
        $sql = "SELECT hh.product_name as 'name_product', COUNT(*) as 'quantity',
        hh.product_id as 'prod_id'          
        FROM `comments` bl 
        JOIN `product` hh ON bl.product_id = hh.product_id  
        JOIN `user` kh ON bl.user_id  = kh.user_id
        GROUP BY hh.product_id ";
        return $this->pdo_query($sql);
    }
    function binh_luan_get_detail($id)
    {
        $sql = "SELECT user.username 'name', 
        comments.content as 'content', comments.comment_id as 'cmt_id'
        FROM comments JOIN user ON comments.user_id = user.user_id  
        WHERE comments.product_id = ?";
        return $this->pdo_query($sql, $id);
    }
    function binh_luan_select_by_id($ma_bl)
    {
        $sql = "SELECT * FROM comments WHERE ma_bl =?";
        return $this->pdo_query_one($sql, $ma_bl);
    }

    function binh_luan_exist($ma_bl)
    {
        $sql = "SELECT count(*) FROM comments WHERE ma_bl =?";
        return $this->pdo_query_value($sql, $ma_bl) > 0;
    }
    function addComment($user_id, $product_id, $content)
    {
        $sql = "INSERT INTO `comments` (`comment_id`, 
                                        `user_id`, 
                                        `product_id`, 
                                        `fullname`, 
                                        `email`, 
                                        `content`) 
                VALUES (NULL, ?, ?, '', '', ?);
        ";
        return $this->pdo_execute($sql, $user_id, $product_id, $content);
    }
    function binh_luan_select_by_hang_hoa($ma_hh)
    {
        $sql = "SELECT b.*, h.ten_hh FROM comments b JOIN product h ON h.ma_hh = b.ma_hh WHERE b.ma_hh = ? ORDER BY ngay_bl DESC";
        return $this->pdo_query($sql, $ma_hh);
    }
}
