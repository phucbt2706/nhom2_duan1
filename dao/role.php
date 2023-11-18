<?php

class Role extends Connect
{
    // Insert role
    function role_insert($role_name)
    {
        $sql = "INSERT INTO `role`(`role_name`) VALUES(?)";
        $this->pdo_execute($sql, $role_name);
    }
    // Update role
    function update_role($role_id, $role_name)
    {
        $sql = "UPDATE role SET `role_name`=? WHERE `role_id`=?";
        $this->pdo_execute($sql, $role_name, $role_id);
    }
    // Get all data
    function role_select_all()
    {
        $sql = "SELECT * FROM role";
        return $this->pdo_query($sql);
    }
    function role_select_by_id($role_id){
        $sql = "SELECT * FROM role WHERE role_id=?";
        return $this->pdo_query_one($sql, $role_id);
    }
    function num_row_role()
    {
        $sql = "SELECT count(*) as num_row FROM role";
        return $this->pdo_query($sql);
    }
    function role_select_page($start, $num_rows_in_page)
    {
        $sql = "SELECT * FROM role LIMIT $start,$num_rows_in_page";
        return $this->pdo_query($sql);
    }
    function role_delete($role_id){
        $sql = "DELETE FROM role WHERE role_id=?";
        if (is_array($role_id)) {
            foreach ($role_id as $id) {
                $this->pdo_execute($sql, $id);
            }
        } else {
            $this->pdo_execute($sql, $role_id);
        }
    }
}

?>