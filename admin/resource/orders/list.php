<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="text-center">
                <h3 class="card-header">Orders list</h3>
            </div>
            <div class="table-responsive text-nowrap">
                <form action="?pages=delete_all_product" method="post">
                    <button type="submit" class="btn btn-secondary">Delete</button>
                    <a class="btn btn-primary" role="button" href="?pages=add_products">Add</a>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th><input type="checkbox" name="order_id[]" id="order1" onclick="checkedAllOrder();"></th>
                                <th scope="col">ID. Order</th>
                                <th scope="col">Customer name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                                <th scope="col" colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($list_order as $item) {
                                extract($item);?>
                            <tr>
                                <td><input type="checkbox" class="product" name="product_id[]" value=""></td>
                                <td><?= $order_id ?></td>
                                <td><?= $fullname ?></td>
                                <td><?= $qty ?></td>
                                <td><?= currency_format($total)  ?></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="?pages=order_detail&order_id=<?= $order_id ?>"><i class="bx bx-edit-alt me-1"></i>Detail</a>
                                            <a class="dropdown-item" href="?pages="><i class="bx bx-edit-alt me-1"></i>Delete</a>
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