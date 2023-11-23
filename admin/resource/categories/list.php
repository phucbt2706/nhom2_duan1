<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="text-center">
                <h3 class="card-header">Categories list</h3>
            </div>
            <div class="table-responsive text-nowrap">
                <form action="?pages=delete_all_cate" method="post">
                    <button type="submit" class="btn btn-secondary" name="delete_all">Delete</button>
                    <a class="btn btn-primary" role="button" href="?pages=form_add_cate">Add</a>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="category1" onclick="checkedAllCate();"></th>
                                <th scope="col">ID.</th>
                                <th scope="col">Name Category</th>
                                <th scope="col">Parent ID.</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                $stt = 0;
                                foreach ($list_cate as $item) {
                                extract($item);
                                $stt++;?>
                            <tr>
                                <td> <input type="checkbox" class="category" name="cate_id[]" value="<?=$cate_id?>"></td>
                                <td><?= $cate_id ?></td>
                                <td><?= $cate_name ?></td>
                                <td><?= $parent_id ?></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="?pages=edit_cate&cate_id=<?= $cate_id ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <a class="dropdown-item" href="?pages=delete_cate&cate_id=<?= $cate_id ?>"><i class="bx bx-edit-alt me-1"></i> Delete</a>
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
        <?php echo get_pagging_cate($num_page,$page) ?>
    </div>
</div>