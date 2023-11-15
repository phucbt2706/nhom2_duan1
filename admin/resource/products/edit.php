<?php 
if(is_array($pro)){
    extract($pro);
}
?>


<!-- Form Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Thêm Sản Phẩm</h6>
                <form action="index.php?act=updatepro" method="post">
                    <!-- <div class="mb-3">
                    <label class="form-label">Mã Loại</label>
                        <input type="text" name="maloai">
                    </div> -->
                    <div class="mb-3">
                        <label class="form-label">Tên Sản Phẩm</label>
                        <input type="text" class="form-control" name="product_name" value="<?=$product_name?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Giá</label>
                        <input type="text" class="form-control" name="price" value="<?=$price?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Discound</label>
                        <input type="text" class="form-control" name="discount" value="<?=$discount?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Hình ảnh</label>
                        <input type="text" class="form-control" name="images" value="<?=$images?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <input type="text" class="form-control" name="description" value="<?=$description?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mã Loại</label>
                        <input type="text" class="form-control" name="cate_id" value="<?=$cate_id?>">
                    </div>

                   

                    <input type="hidden" name="product_id"value="<?php if(isset($product_id)&&$product_id>0) echo $product_id; ?>">

                    <input type="submit" name="updatepro" value="Cập Nhật">

                    <a href="index.php?act=listpro"><input type="button" value="DANH SÁCH"></a>

                </form>
            </div>
        </div>

        <!-- Form end -->