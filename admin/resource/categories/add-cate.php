<!-- Form Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Thêm Tài Khoản</h6>
                <form action="index.php?act=adddm" method="post">
                    <!-- <div class="mb-3">
                    <label class="form-label">Mã Loại</label>
                        <input type="text" name="maloai">
                    </div> -->
                    <div class="mb-3">
                        <label class="form-label">Tên Danh Mục</label>
                        <input type="text" class="form-control" name="name_dm">
                    </div>
                    



                    <input type="submit" name="adddm" value="Thêm mới">

                    <a href="index.php?act=listdm"><input type="button" value="DANH SÁCH"></a>

                </form>
            </div>
        </div>

        <!-- Form end -->