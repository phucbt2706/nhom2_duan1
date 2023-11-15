<!-- Form Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Thêm Sản Phẩm</h6>
                <form action="index.php?act=addpro" method="post">
                    <!-- <div class="mb-3">
                    <label class="form-label">Mã Loại</label>
                        <input type="text" name="maloai">
                    </div> -->
                    <div class="mb-3">
                        <label class="form-label">Tên Sản Phẩm</label>
                        <input type="text" class="form-control" name="product_name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Giá</label>
                        <input type="text" class="form-control" name="price">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Discound</label>
                        <input type="text" class="form-control" name="discount">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Hình ảnh</label>
                        <input type="text" class="form-control" name="images">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <input type="text" class="form-control" name="description">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mã Loại</label>
                        <input type="text" class="form-control" name="cate_id">
                    </div>
                   

                   



                    <input type="submit" name="addpro" value="Thêm mới">

                    <a href="index.php?act=listpro"><input type="button" value="DANH SÁCH"></a>

                </form>
            </div>
        </div>

        <!-- Form end -->