<div class="row">
    <div class="col-8">
        <div class="card mb-4">
            <div class="card-body">
                <form action="?pages=insert_product" method="post" enctype="multipart/form-data">
                    <div id="form" class="row g-3">
                        <div class="col-12 text-center">
                            <h2>Add new product</h2>
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
                            <label for="formFile" class="form-label required">Images</label>
                            <input class="form-control" name="images" type="file" id="formFile">
                        </div>

                        <div class="col-6 form-group ">
                            <label for="" class="form-label required">Category</label>
                            <select class="form-select" name="cate_id">
                                <option selected value="1">Choose category ..</option>
                                <?php
                                    foreach ($list_cate as $item ) {
                                        extract($item);?>
                                        <option value=<?= $cate_id ?>><?= $cate_id ." - ".$cate_name ?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <!-- <div class="col-6 form-froup">
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
                        </div> -->
                        <span id="red_error" class="form-text"> </span>

                        <div class=" col-12 form-group">
                            <label class="required">Description</label>
                            <textarea class="form-control" name="description" rows="3"><?php echo (!empty($_POST['description'])) ? $_POST['description'] : false; ?></textarea>
                        </div>
                        <div class="col-6">
                            <button type="submit" name="button" value="insert_product" class="btn btn-primary">Add</button>
                            <a class="btn btn-primary" href="?pages=list_products" role="button">List of Product</a>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>