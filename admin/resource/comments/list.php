<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="text-center">
                <h3 class="card-header">Quản lí bình luận</h3>
            </div>
            <div class="table-responsive text-nowrap">
                <form action="?pages=delete_all_product" method="post">
                    <button type="submit" class="btn btn-secondary">Delete</button>
                    <a class="btn btn-primary" role="button" href="?pages=add_products">Add</a>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th><input type="checkbox" name="product_id[]" id="product1" onclick="checkedAllPro();"></th>
                                <th scope="col">Số lượng bình luận</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col" colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($comments as $cmt) {
                            ?>
                                <tr>
                                    <td> <input type="checkbox"></td>
                                    <td><?= $cmt['quantity'] ?></td>
                                    <td><?= $cmt['name_product'] ?></td>
                                    <td>
                                        <a class="btn btn-primary" href="?pages=detail&product_id=<?= $cmt['prod_id'] ?>">Detail</a>
                                    </td>
                                </tr>
                            <?php
                            } ?>
                        </tbody>
                    </table>
                </form>

            </div>
        </div>
    </div>
</div>