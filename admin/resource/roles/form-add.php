<div class="row">
    <div class="col-7">
        <div class="card mb-4">
            <div class="card-body">
                <form action="?pages=add_role" method="post" id="myForm" enctype="multipart/form-data">
                    <div class="row mb-4">
                        <div class="col-12 text-center">
                            <h2>Thêm người dùng</h2>
                        </div>
                        <div class="col-6">
                            <label for="" class="form-label required">Tên đăng nhập</label>
                            <input type="" class="form-control" id="" value="">
                                    
                        </div>
                        <div class=" col-6">
                            <label for="" class="form-label required">Tên khách hàng</label>
                            <input type="" class="form-control" id=" " value="" name="ten_kh">

                        </div>
                        <div class="col-6">
                            <label for="inputPassword4" class="form-label required">Mật khẩu</label>
                            <input type="password" class="form-control" id="inputPassword4" value="">

                        </div>
                        <div class="col-6">
                            <label for="inputPassword4" class="form-label required">Xác nhận mật khẩu</label>
                            <input type="password" class="form-control" id="inputPassword4"
                                value=""
                                name="mat_khau2">

                        </div>
                        <div class="col-6">
                            <label for="exampleFormControlInput1" class="form-label required">Email</label>
                            <input type="email" name="email" class="form-control" value=""
                                placeholder="name@example.com">

                        </div>
                        <div class="col-6">
                            <label for="formFile" class="form-label required">Chọn hình ảnh</label>
                            <input class="form-control" name="hinh" type="file" id="formFile">
                        </div>
                        <div class="col-6">
                            <label for="" class="form-label required">Trạng thái</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="kich_hoat" value="0"
                                    id="status-radio1">
                                <label class="form-check-label" for="status-radio1">
                                    Chưa kích hoạt
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="kich_hoat" value="1"
                                    id="status-radio2" checked>
                                <label class="form-check-label" for="status-radio2">
                                    Kích hoạt
                                </label>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="" class="form-label required">Vai trò</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="vai_tro" value="0" id="role-radio3">
                                <label class="form-check-label" for="role-radio3">
                                    Khách hàng
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="vai_tro" value="1" id="role-radio4"
                                    checked>
                                <label class="form-check-label" for="role-radio">
                                    Nhân viên
                                </label>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <button type="submit" name="btn_insert" value="btn_insert" class="btn btn-primary">Thêm
                                mới</button>
                            <button type="submit" name="btn_list" value="btn_list" class="btn btn-primary">Danh
                                sách</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>