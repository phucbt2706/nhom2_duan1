<div class="row">
    <div class="col-12">
        <div class="card">
            <h5 class="card-header">Danh sách vai trò</h5>
            <div class="table-responsive text-nowrap">
                <form action="?btn_deleteall" method="post">
                    <button type="submit" class="btn btn-secondary" name="delete_all">Delete</button>
                    <a class="btn btn-primary" role="button" href="index.php">Add</a>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Tên đăng nhập</th>
                                <th scope="col">Mật khẩu</th>
                                <th scope="col">Họ và tên</th>
                                <th scope="col">Email</th>
                                <th scope="col">Hình</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Vai trò</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td> <input type="checkbox" class="name1" name="kh[]" value=""></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="index.php?btn_edit&ma_kh="><i
                                                    class="bx bx-edit-alt me-1"></i>Edit</a>
                                            <a class="dropdown-item" href="index.php?btn_delete&ma_kh="><i
                                                    class="bx bx-edit-alt me-1"></i>Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </form>

            </div>
        </div>

    </div>
</div>