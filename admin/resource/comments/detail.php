<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="text-center">
                <h3 class="card-header">Comment Detail</h3>
            </div>
            <div class="table-responsive text-nowrap">
                <form action="?pages=delete_all_product" method="post">
                    <!-- <button type="submit" class="btn btn-secondary">Delete</button>
                    <a class="btn btn-primary" role="button" href="?pages=add_products">Add</a> -->
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <!-- <th><input type="checkbox"></th> -->
                                <th scope="col">Khách hàng</th>
                                <th scope="col">Nội dung</th>
                                <th scope="col" colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($detail_comment)) : ?>
                                <?php
                                foreach ($detail_comment as $cmt) {
                                ?>
                                    <tr>
                                        <!-- <td> <input type="checkbox"></td> -->
                                        <td><?= $cmt['name'] ?></td>
                                        <td><?= $cmt['content'] ?></td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="?pages=edit_comment&comment_id=<?= $cmt['cmt_id'] ?>"><i class="bx bx-edit-alt me-1"></i>Edit</a>
                                                    <a class="dropdown-item" href="?pages=delete_comment&comment_id=<?= $cmt['cmt_id'] ?>"><i class="bx bx-edit-alt me-1"></i>Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                } ?>
                            <?php endif ?>
                        </tbody>
                    </table>
                </form>

            </div>
        </div>
    </div>
</div>