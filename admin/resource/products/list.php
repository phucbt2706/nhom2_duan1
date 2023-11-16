<div class="row">
    <div class="col-12">
        <div class="card">
            <h5 class="card-header">List product</h5>
            <div class="table-responsive text-nowrap">
                <form action="?pages=delete_all_product" method="post">
                    <button type="submit" class="btn btn-secondary">Delete</button>
                    <a class="btn btn-primary" role="button" href="?pages=add_products">Add</a>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th><input type="checkbox" name="product_id[]" id="product1" onclick="checkedAllPro();"></th>
                                <th scope="col">ID.</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Đơn giá</th>
                                <th scope="col">Giảm giá</th>
                                <th scope="col">Hình</th>
                                <!-- <th scope="col">Ngày nhập</th> -->
                                <th scope="col">Mô tả</th>
                                <!-- <th scope="col">Đặc biệt</th> -->
                                <!-- <th scope="col">Số lượt xem</th> -->
                                <th scope="col">Mã loại</th>
                                <th scope="col" colspan="2">Action</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($list_product as $item) { extract($item)?>
                            <tr>
                                <td> <input type="checkbox" class="product" name="product_id[]" value="<?=$product_id?>"></td>
                                <td>SP0<?= $product_id ?></td>
                                <td><?= $product_name ?></td>
                                <td><?= $price ?></td>
                                <td><?= $discount ?></td>
                                <td><img id="img_hh" src="<?= "../../../public/img/product/". $images ?>" alt=""></td>
                                <!-- <td><?= $ngay_nhap ?></td> -->
                                <td><?= $description ?></td>
                                <!-- <td><?= $dac_biet ?></td> -->
                                <!-- <td><?= $so_luot_xem ?></td> -->
                                <td><?= $cate_id ?></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="?pages=edit_product&product_id=<?= $product_id ?>"><i class="bx bx-edit-alt me-1"></i>Edit</a>
                                            <a class="dropdown-item" href="?pages=delete_product&product_id=<?= $product_id ?>"><i class="bx bx-edit-alt me-1"></i>Delete</a>
                                        </div>
                                    </div>
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
<!-- Table End -->