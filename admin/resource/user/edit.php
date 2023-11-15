<?php 
if(is_array($tk)){
    extract($tk);
}
?>



<!-- Form Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Thêm Tài Khoản</h6>
                <form action="index.php?act=updateuser" method="post">
                    <!-- <div class="mb-3">
                    <label class="form-label">Mã Loại</label>
                        <input type="text" name="maloai">
                    </div> -->
                    <div class="mb-3">
                        <label class="form-label">Tên Tài Khoản</label>
                        <input type="text" class="form-control" name="username" value="<?=$username?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mật Khẩu</label>
                        <input type="password" class="form-control" name="password" value="<?=$password?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Họ và Tên</label>
                        <input type="text" class="form-control" name="fullname" value="<?=$fullname?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">email</label>
                        <input type="email" class="form-control" name="email" value="<?=$email?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="number" class="form-control" name="phone" value="<?=$phone?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Hình Đại Diện</label>
                        <input type="text" class="form-control" name="avatar" value="<?=$avatar?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Vai Trò</label>
                        <select class="form-select" name="role_id">
                            <option value="1">Admin</option>
                            <option value="2">User</option>
                        </select>
                    </div>

                    <input type="hidden" name="user_id"value="<?php if(isset($user_id)&&$user_id>0) echo $user_id; ?>">

                    <input type="submit" name="updateuser" value="Thêm mới">

                    <a href="index.php?act=listuser"><input type="button" value="DANH SÁCH"></a>

                </form>
            </div>
        </div>

        <!-- Form end -->