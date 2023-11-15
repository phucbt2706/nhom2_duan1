<div class="row">
    <div class="col-8">
        <div class="card mb-4">
            <div class="card-body">
                <form action="index.php" method="post" enctype="multipart/form-data">
                    <div id="form" class="row g-3">
                        <div class="col-12 text-center">
                            <h2>Thêm sản phẩm</h2>
                        </div>
                        <div class="col-6 form-group">
                            <label for="" class="form-label required">Product name</label>
                            <input type="" class="form-control" id="" value="<?php echo (!empty($_POST['product_name'])) ? $_POST['product_name'] : false; ?>" name="product_name">
                            <span id="red_error" class="form-text"><?php if (!empty($error['name_format'])) {
                                                            echo $error['name_format'];
                                                        } else if (!empty($error['name_empty'])) {
                                                            echo $error['name_empty'];
                                                        }
                                                        ?> </span>
                        </div>
                        <div class="col-6 form-group">
                            <label for="" class="form-label required">Price</label>
                            <input type="" class="form-control" id="" value="<?php echo (!empty($_POST['price'])) ? $_POST['price'] : false; ?>" name="price">
                            <span id="red_error" class="form-text"><?php if (!empty($error['price_format'])) {
                                                            echo $error['price_format'];
                                                        } else if (!empty($error['price_empty'])) {
                                                            echo $error['price_empty'];
                                                        }
                                                        ?> </span>
                        </div>
                        <div class="col-6 form-group">
                            <label for="" class="form-label required">Discount</label>
                            <input type="" class="form-control" id="" value="<?php echo (!empty($_POST['discount'])) ? $_POST['discount'] : false; ?>" name="discount">
                            <span id="red_error" class="form-text"><?php if (!empty($error['sale_format'])) {
                                                            echo $error['sale_format'];
                                                        } else if (!empty($error['sale_empty'])) {
                                                            echo $error['sale_empty'];
                                                        }
                                                        ?> </span>
                        </div>
                        <div class="col-6 form-group">
                            <label for="formFile" class="form-label required">Chọn hình ảnh</label>
                            <input class="form-control" name="images" type="file" id="formFile">
                        </div>

                        <div class="col-6 form-group ">
                            <label for="" class="form-label required">Loại hàng</label>
                            <select class="form-select" name="cate_id">

                                <option selected>Choose category of product</option>
                                <option value="1">Cate</option>
                                <?php
                                        // foreach ($loai_info as $loai_info ) {
                                        //     extract($loai_info);
                                        //     echo "<option value=".$ma_loai.">".$ten_loai."</option>";
                                        // }
                                    ?>
                            </select>
                        </div>
                        <div class="col-6 form-froup">
                            <label for="" class="form-label required">Status</label>
                            <div class="form-check ">
                                <input class="form-check-input" type="radio" name="status" value="0" id="status-radio1">
                                <label class="form-check-label" for="status-radio1">
                                    Chưa kích hoạt
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" value="1" id="status-radio2" checked>
                                <label class="form-check-label" for="status-radio2">
                                    Kích hoạt
                                </label>
                            </div>
                        </div>

                        <div class=" col-12 form-group">
                            <label class="required">Mô tả</label>
                            <textarea class="form-control" name="description" rows="3"><?php echo (!empty($_POST['mo_ta'])) ? $_POST['mo_ta'] : false; ?></textarea>
                        </div>
                        <div class="col-6">
                            <button type="submit" name="button" value="insert_product" class="btn btn-primary">Add</button>
                            <button type="submit" name="btn_list" value="btn_list" class="btn btn-primary">Liss of Product</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>