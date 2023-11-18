<div class="row">
            <div class="col-12">
                <div class="card">
                    <h5 class="card-header">Danh sách người dùng</h5>
                    <div class="table-responsive text-nowrap">
                    <form action="?pages=delete_all_user" method="post">
                        <button type="submit" class="btn btn-secondary">Delete</button>
                            <a class="btn btn-primary"   role="button" href="?pages=add_user">Add</a>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" name="user_id[]" id="name1" onclick="checkedAllUser();"></th>
                                        <th scope="col">Tên đăng nhập</th>
                                        <th scope="col">Mật khẩu</th>
                                        <th scope="col">Họ và tên</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Hình</th>
                                        <th scope="col">Số Điện Thoại</th>
                                        <th scope="col">Vai trò</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                foreach ($list_user as $item) {
                                    extract($item)?>
                                    <tr>
                                        <td> <input type="checkbox" class="name1" name="user_id[]" value="<?=$user_id?>"></td>
                                        <td><?=$username?></td>
                                        <td><?=($password)?></td>
                                        <td><?=$fullname?></td>
                                        <td><?=$email?></td>
                                        <td><img id="img_hh" src="../../../content/images/<?= $hinh ?>" alt=""></td>
                                        <td><?=$phone?></td>
                                        <td><?=$role_id?></td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="index.php?pages=edit_user&user_id=<?=$user_id?>"><i class="bx bx-edit-alt me-1"></i>Edit</a>
                                                    <a class="dropdown-item" href="index.php?pages=delete_user&user_id=<?=$user_id?>"><i class="bx bx-edit-alt me-1"></i>Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </form>

                    </div>
                </div>

            </div>
        </div>