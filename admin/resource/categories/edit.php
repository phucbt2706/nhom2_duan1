<?php
    extract($item);
?>
<div class="row">
    <div class="col-6">
        <div class="card mb-4">
            <div class="card-body">
                <form action="?pages=update_cate" method="post" enctype="multipart/form-data">
                    <div id="form-add-category" class="row flex-column  g-3">
                        <div class="col-12 text-center">
                            <h2>Update Category</h2>
                            </h2>
                        </div>
                        <div class="col-6">
                            <label for="" class="form-label required">Cate ID.</label>
                            <input type="" class="form-control" id="" name="cate_id" readonly value="<?= $id ?>">
                            <span id="red_error" class="form-text"></span>
                        </div>
                        <div class="col-6">
                            <label for="" class="form-label required">Cate Name</label>
                            <input type="" class="form-control <?= !empty($error['error_name_cate']) ? 'border border-danger' : false ?>" id="" name="cate_name" value="<?= $cate_name ?>">
                            <span id="red_error" class="form-text"><?= !empty($error['error_name_cate'])?$error['error_name_cate']:false;?> </span>
                        </div>
                        <div class="col-6 form-group ">
                            <label for="" class="form-label required">Parent Category</label>
                            <select class="form-select" name="parent_id">
                                <option selected value="0">Choose...</option>
                                <?php
                                    foreach ($list_cate as $item ) {
                                        extract($item);?>
                                <option value=<?= $cate_id ?>><?= $cate_id ." - ".$cate_name ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-6">
                            <button type="submit" name="btn_update" value="" class="btn btn-primary">Update</button>
                            <a class="btn btn-primary" href="?pages=list_cate" role="button">List of Category</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>