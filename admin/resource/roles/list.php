<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="text-center">
                <h3 class="card-header">Roles list</h3>
            </div>
            <div class="table-responsive text-nowrap">
                <form action="?pages=delete_all_role" method="post">
                    <button type="submit" class="btn btn-secondary" name="delete_all">Delete</button>
                    <a class="btn btn-primary" role="button" href="?pages=add_role">Add</a>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th><input type="checkbox" name="role_id[]" id="role1" onclick="checkedAllRoles();"></th>
                                <th>ID.</th>                             
                                <th>Role name</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php
                                foreach ($list_role as $item) {
                                extract($item);
                                ?>
                            <tr>
                            <td> <input type="checkbox" class="role" name="role_id[]" value="<?=$role_id?>"></td>
                                <td><?= $role_id ?></td>
                                <td><?= $role_name ?></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="?pages=edit_role&role_id=<?= $role_id ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <a class="dropdown-item" href="?pages=delete_role&role_id=<?= $role_id ?>"><i class="bx bx-edit-alt me-1"></i> Delete</a>
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