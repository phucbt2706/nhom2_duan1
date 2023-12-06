<?php
extract($item);
?>
<h4 class="py-3 mb-4">
    <span class="text-muted fw-light">eCommerce /</span><span> Edit Product</span>
</h4>
<form action="?pages=update_product" method="post" enctype="multipart/form-data">
    <div class="app-ecommerce">

        <!-- Add Product -->
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">

            <div class="d-flex flex-column justify-content-center">
                <h4 class="mb-1 mt-3">Add a new Product</h4>
                <p class="text-muted">Orders placed across your store</p>
            </div>
            <div class="d-flex align-content-center flex-wrap gap-3">
                <a href="?pages=list_products" class="btn btn-label-primary">Product list</a>
                <button type="submit" class="btn btn-primary">Publish product</button>
            </div>

        </div>

        <div class="row">
            <!-- First column-->
            <div class="col-12 col-lg-8">
                <!-- Product Information -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-tile mb-0">Product information</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-1">
                            <div class="col-6">
                                <label for="" class="form-label required">Product ID</label>
                                <input type="" class="form-control" readonly value="<?= $product_id ?>" name="product_id">
                            </div>
                            <div class="col-6">
                                <label class="form-label required" for="ecommerce-product-name">Product Name</label>
                                <input type="" class="form-control <?= !empty($error['name_error']) ? 'border border-danger' : false ?>" value="<?= !empty($_POST['product_name'])?$_POST['product_name'] :$product_name ?>" name="product_name">
                                <span id="red_error" class="form-text"><?= !empty($error['name_error']) ? $error['name_error']:false ?></span>
                            </div>
                        </div>
                        <div class="mb-1">
                            <label for="formFile" class="form-label required">Images</label>
                            <input class="form-control" name="images" type="file" id="formFile">
                            <span id="red_error" class="form-text"></span>
                        </div>
                        <!-- Description -->
                        <div class="mb-3">
                            <label class="form-label">Description <span class="text-muted">(Optional)</span></label>
                            <textarea class="form-control" name="description" rows="3"><?= !empty($_POST['description'])?$_POST['description'] :$description ?></textarea>

                        </div>

                    </div>
                </div>
            </div>
            <!-- /Second column -->

            <!-- Second column -->
            <div class="col-12 col-lg-4">
                <!-- Pricing Card -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Pricing</h5>
                    </div>
                    <div class="card-body">
                        <!-- Base Price -->
                        <div class="mb-1">
                            <label class="form-label required" for="ecommerce-product-price">Base Price</label>
                            <input type="" class="form-control <?= !empty($error['price_error']) ? 'border border-danger' : false ?>" value="<?= !empty($_POST['price'])?$_POST['price'] :$price ?>" name="price">
                            <span id="red_error" class="form-text"><?= !empty($error['price_error']) ? $error['price_error']:false ?> </span>
                        </div>
                        <!-- Discounted Price -->
                        <div class="mb-1">
                            <label class="form-label required" for="ecommerce-product-discount-price">Discounted Price</label>
                            <input type="" class="form-control <?= !empty($error['discount_error']) ? 'border border-danger' : false ?>" value="<?= !empty($_POST['discount'])?$_POST['discount'] :$discount ?>" name="discount">
                            <span id="red_error" class="form-text"><?= !empty($error['discount_error']) ? $error['discount_error']:false ?></span>
                        </div>
                        <div class="mb-1">
                            <label class="form-label " for="ecommerce-product-discount-price">Quantity</label>
                            <input type="" class="form-control <?= !empty($error['quantity']) ? 'border border-danger' : false ?>" id="" value="<?php echo (!empty($_POST['quantity'])) ? $_POST['quantity'] : $quantity ?>" name="quantity">
                            <span id="red_error" class="form-text"><?= !empty($error['quantity_error']) ? $error['quantity_error']:false ?> </span>
                        </div>

                    </div>
                </div>
                <!-- /Pricing Card -->
                <!-- Organize Card -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Organize</h5>
                    </div>
                    <div class="card-body">
                        <!-- Category -->
                        <div class="mb-3 col ecommerce-select2-dropdown">
                            <label class="form-label mb-1 d-flex justify-content-between align-items-center" for="category-org">
                                <span>Category</span><a href="javascript:void(0);" class="fw-medium">Add new category</a>
                            </label>
                            <div class="position-relative">
                                <select id="category-org" name="cate_id" class="select2 form-select " data-placeholder="Select Category" data-select2-id="category-org" tabindex="-1">
                                    <?php
                                     foreach ($list_cate as $item ) {?>
                                    <option <?= $item['cate_id']== $cate_id? 'selected':false ?> value=<?= $item['cate_id'] ?>><?= $item['cate_id'] ." - ".$item['cate_name'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!-- Status -->
                        <div class="mb-3 col ecommerce-select2-dropdown">
                            <label class="form-label mb-1" for="status-org">Status
                            </label>
                            <div class="position-relative">
                                <select id="status-org" class="select2 form-select " data-placeholder="Published" data-select2-id="status-org" tabindex="-1" aria-hidden="true">
                                    <option value="" data-select2-id="12">Published</option>
                                    <option value="Published">Published</option>
                                    <option value="Scheduled">Scheduled</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- /Organize Card -->
                </div>
                <!-- /Second column -->
            </div>

        </div>
</form>