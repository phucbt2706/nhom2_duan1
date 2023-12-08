<?php
$tk = new KhachHang();
$rows = $tk->num_row_user();
$total_rows  = $rows[0]['num_row'];
$num_rows_in_page = 10;
$num_page = ceil($total_rows / $num_rows_in_page);

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

$start = ($page - 1) * $num_rows_in_page;

$list_user = $tk->user_select_page($start, $num_rows_in_page);

?>

<?php
// ...

// Kiểm tra xem user_id đã được lưu trong session hay chưa
if (isset($_SESSION['user'])) {
    // Lấy thông tin người dùng từ session
    $userData = unserialize($_SESSION['user']);

    // Sử dụng user_id
    $user_id_login = $userData['user_id'];
}
echo '<script>';
echo 'var user_id_login = ' . json_encode($user_id_login) . ';';
echo '</script>';
?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="text-center">
                <h3 class="card-header">Users list</h3>
            </div>
            <div class="table-responsive text-nowrap">
                <form action="?pages=delete_all_user" method="post">
                    <button type="submit" class="btn btn-secondary">Delete</button>
                    <a class="btn btn-primary" role="button" href="?pages=add_user">Add</a>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th><input type="checkbox" name="user_id[]" id="name1" onclick="checkedAllUser();"></th>
                                <th scope="col">Username</th>
                                <th scope="col">Password</th>
                                <th scope="col">Fullname</th>
                                <th scope="col">Email</th>
                                <th scope="col">Avatar</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Role</th>
                                <th scope="col">Action</th>
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
                                <td><img id="img_hh" src="../../public/img/product/<?= $avatar ?>" alt=""></td>
                                <td><?=$phone?></td>
                                <td><?=$role_id?></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="index.php?pages=edit_user&user_id=<?=$user_id?>"><i class="bx bx-edit-alt me-1"></i>Edit</a>
                                            <!-- Thay thế liên kết "Delete" -->
                                            <a class="dropdown-item" href="javascript:void(0);"
                                                    onclick="showConfirmation(<?= $user_id ?>)">
                                                    <i class="bx bx-edit-alt me-1"></i>Delete
                                                </a>
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
<div class="row mt-2">
    <div class="col-12 d-flex justify-content-end">
        <?php echo get_pagging_user($num_page,$page) ?>
    </div>
</div>

<!-- JavaScript -->
<script>
    function showConfirmation(user_id) {
        // Hiển thị popup xác nhận
        var confirmation = confirm("Bạn có chắc chắn muốn xóa User này?");

        // Kiểm tra nếu người dùng đã nhấp vào OK (đồng ý)
        if (confirmation) {
            // Kiểm tra user_id
            if (user_id_login == user_id) {
                alert('Bạn không thể xóa tài khoản đang đăng nhập!!!');
            } else {
                // Chuyển hướng đến trang xóa với user_id
                window.location.href = "?pages=delete_user&user_id=" + user_id;
            }
        }
    }
    
</script>