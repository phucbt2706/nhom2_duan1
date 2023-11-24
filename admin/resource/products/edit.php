<?php
extract($item);
?>
<div class="row">
    <div class="col-8">
        <div class="card mb-4">
            <div class="card-body">
                <form action="?pages=update_product" method="post" enctype="multipart/form-data">
                    <div id="form" class="row g-3">
                        <div class="col-12 text-center">
                            <h2>Update the product "<?= $product_name; ?>"</h2>
                        </div>
                        <div class="col-6 form-froup">
                            <label for="" class="form-label required">Product ID</label>
                            <input type="" class="form-control" readonly value="<?= $product_id ?>" name="product_id">
                        </div>
                        <div class="col-6 form-group">
                            <label for="" class="form-label required">Product Name</label>
                            <input type="" class="form-control <?= !empty($error['name_error']) ? 'border border-danger' : false ?>" value="<?= $product_name ?>" name="product_name">
                            <span id="red_error" class="form-text"><?= !empty($error['name_error']) ? $error['name_error']:false ?></span>
                        </div>
                        <div class="col-6 form-group">
                            <label for="" class="form-label required">Price</label>
                            <input type="" class="form-control <?= !empty($error['price_error']) ? 'border border-danger' : false ?>" value="<?= $price ?>" name="price">
                            <span id="red_error" class="form-text"><?= !empty($error['price_error']) ? $error['price_error']:false ?> </span>
                        </div>
                        <div class="col-6 form-group">
                            <label for="" class="form-label required">Discount</label>
                            <input type="" class="form-control <?= !empty($error['discount_error']) ? 'border border-danger' : false ?>" value="<?= $discount ?>" name="discount">
                            <span id="red_error" class="form-text"><?= !empty($error['discount_error']) ? $error['discount_error']:false ?></span>
                        </div>
                        <div class="col-6 form-group">
                            <label for="formFile" class="form-label required">Images</label>
                            <input class="form-control" name="images" value="<?= $images ?>" type="file" id="formFile">
                            <span id="red_error" class="form-text"></span>
                        </div>
                        
                        <div class="col-6 form-group ">
                            <label for="" class="form-label required">Category</label>
                            <select class="form-select" name="cate_id">
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
                                <input class="form-check-input" type="radio" name="dac_biet" value="0" id="status-radio1">
                                <label class="form-check-label" for="status-radio1">
                                    Chưa kích hoạt
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="dac_biet" value="1" id="status-radio2" checked>
                                <label class="form-check-label" for="status-radio2">
                                    Kích hoạt
                                </label>
                            </div>
                        </div> -->

                        <div class=" col-12 form-group">
                            <label class="form-label required">Description</label>
                            <textarea class="form-control" name="description"  rows="3"><?= $description ?></textarea>
                        </div>
                        <div class="col-6">
                            <button type="submit" name="button" class="btn btn-primary">Update</button>
                            <a class="btn btn-primary" href="?pages=list_products" role="button">Products list</a>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
