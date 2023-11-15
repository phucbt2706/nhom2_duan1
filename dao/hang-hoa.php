<?php
    // Insert product
    function hang_hoa_insert($product_name, $price, $discount, $images, $description, $cate_id){
        $sql = "insert into product(product_name, price, discount, images, description, cate_id) values ('$product_name', '$price', '$discount', '$images' , '$description', '$cate_id')";
        pdo_execute($sql);
    }

    // Update product
    function product_update()
{
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];
    $images = $_POST['images'];
    $description = $_POST['description'];
    $cate_id = $_POST['cate_id'];
    


    $sql = "UPDATE product SET 
        product_name = '" . $product_name . "',
        price = '" . $price . "',
        discount = '" . $discount . "',
        images = '" . $images . "',
        description = '" . $description . "',
        cate_id = '" . $cate_id . "'
        
    WHERE product_id = " . $product_id;

    pdo_execute($sql);
}

    // Delete product
    function product_delete()
    {
        $sql = "delete from product where product_id = " . $_GET['product_id'];
        $listproduct = pdo_query($sql);
    }

    function hang_hoa_tang_so_luot_xem($ma_hh){
        $sql = "UPDATE hang_hoa SET so_luot_xem = so_luot_xem + 1 WHERE ma_hh=?";
        return pdo_execute($sql, $ma_hh);
    }

    // Get all data
    function product_select_all(){
        $sql = "SELECT * FROM product";
        return pdo_query($sql);
    }
    function num_row(){
        $sql = "SELECT count(*) as num_row FROM hang_hoa";
        return pdo_query($sql);
    }

    function num_row_cate($ma_loai){
        $sql = "SELECT count(*) as num_row FROM hang_hoa WHERE ma_loai = ? ";
        return pdo_query($sql,$ma_loai);
    }

    function hang_hoa_select_by_id($ma_hh){
        $sql = "SELECT * FROM hang_hoa WHERE ma_hh=?";
        return pdo_query_one($sql, $ma_hh);
    }

    function hang_hoa_exist($ma_hh){
        $sql = "SELECT count(*) FROM hang_hoa WHERE ma_hh=?";
        return pdo_query_value($sql, $ma_hh) > 0;
    }

    function hang_hoa_select_top10(){
        $sql = "SELECT * FROM hang_hoa WHERE so_luot_xem > 0 ORDER BY so_luot_xem DESC LIMIT 0,10";
        return pdo_query($sql);
    }

    function hang_hoa_select_dac_biet(){
        $sql = "SELECT * FROM hang_hoa WHERE dac_biet = 1 ";
        return pdo_query($sql);
    }
    function hang_hoa_select_by_loai($ma_loai){
        $sql = "SELECT * FROM hang_hoa WHERE ma_loai = ? LIMIT 0,4";
        return pdo_query($sql, $ma_loai);
    }

    function hang_hoa_select_loai_page($ma_loai,$start,$num_rows_in_page){
        $sql = "SELECT * FROM hang_hoa WHERE ma_loai = ? LIMIT $start,$num_rows_in_page";
        return pdo_query($sql, $ma_loai);
    }

    function hang_hoa_select_keyword($keyword){
        $sql = "SELECT * FROM hang_hoa hh JOIN loai lo ON lo.ma_loai = hh.ma_loai WHERE ten_hh LIKE ? OR ten_loai LIKE ?";
        return pdo_query($sql,'%'. $keyword. '%','%'. $keyword. '%');
    }

    function hang_hoa_select_page($start,$num_rows_in_page){
        $sql = "SELECT * FROM hang_hoa LIMIT $start,$num_rows_in_page";
        return pdo_query($sql);
    }

?>