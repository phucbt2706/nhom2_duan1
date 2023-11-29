<?php
    if (!empty($_GET['cate_id'])) {
        $cate  = new Category();
        $item = $cate->cate_select_by_id($_GET['cate_id']);
        extract($item);
    }
?>
<h4 class="py-3 mb-4">
    <span class="text-muted fw-light">eCommerce /</span><span> Edit Product</span>
</h4>

<div class="app-ecommerce" data-select2-id="17">
    <form action="?pages=update_cate" method="post">
        <!-- Add Product -->
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">

            <div class="d-flex flex-column justify-content-center">
                <h4 class="mb-1 mt-3">Edit category</h4>
                <p class="text-muted">Orders placed across your store</p>
            </div>
            <div class="d-flex align-content-center flex-wrap gap-3">
                <!-- <button class="btn btn-label-secondary">Discard</button> -->
                <a role="button" href="?pages=list_cate" class="btn btn-label-primary">Category List</a>
                <button type="submit" name="update_cate" class="btn btn-primary">Publish product</button>
            </div>

        </div>

        <div class="row">
            <!-- First column-->
            <div class="col-12 col-lg-8">
                <!-- Product Information -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-tile mb-0">Category information</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col"><label class="form-label">Category ID</label>
                                <input type="text" class="form-control " value="<?= $cate_id ?>" readonly name="cate_id">
                            </div>
                            <div class="col"><label class="form-label">Category Name</label>
                                <input type="text" class="form-control <?= !empty($error['error_name_cate']) ? 'border border-danger' : false ?>" value="<?= !empty($_POST['cate_name'])?$_POST['cate_name'] : $cate_name ?>" name="cate_name">
                            </div>
                        </div>
                        <!-- Description -->
                        <div>
                            <label class="form-label">Description <span class="text-muted"></span></label>
                            <div class="form-control p-0 pt-1">
                                <div class="comment-toolbar border-0 border-bottom ql-toolbar ql-snow">
                                    <div class="d-flex justify-content-start">
                                        <span class="ql-formats me-0">
                                            <button class="ql-bold" type="button"><svg viewBox="0 0 18 18">
                                                    <path class="ql-stroke" d="M5,4H9.5A2.5,2.5,0,0,1,12,6.5v0A2.5,2.5,0,0,1,9.5,9H5A0,0,0,0,1,5,9V4A0,0,0,0,1,5,4Z"></path>
                                                    <path class="ql-stroke" d="M5,9h5.5A2.5,2.5,0,0,1,13,11.5v0A2.5,2.5,0,0,1,10.5,14H5a0,0,0,0,1,0,0V9A0,0,0,0,1,5,9Z"></path>
                                                </svg></button>
                                            <button class="ql-italic" type="button"><svg viewBox="0 0 18 18">
                                                    <line class="ql-stroke" x1="7" x2="13" y1="4" y2="4"></line>
                                                    <line class="ql-stroke" x1="5" x2="11" y1="14" y2="14"></line>
                                                    <line class="ql-stroke" x1="8" x2="10" y1="14" y2="4"></line>
                                                </svg></button>
                                            <button class="ql-underline" type="button"><svg viewBox="0 0 18 18">
                                                    <path class="ql-stroke" d="M5,3V9a4.012,4.012,0,0,0,4,4H9a4.012,4.012,0,0,0,4-4V3"></path>
                                                    <rect class="ql-fill" height="1" rx="0.5" ry="0.5" width="12" x="3" y="15"></rect>
                                                </svg></button>
                                            <button class="ql-list" value="ordered" type="button"><svg viewBox="0 0 18 18">
                                                    <line class="ql-stroke" x1="7" x2="15" y1="4" y2="4"></line>
                                                    <line class="ql-stroke" x1="7" x2="15" y1="9" y2="9"></line>
                                                    <line class="ql-stroke" x1="7" x2="15" y1="14" y2="14"></line>
                                                    <line class="ql-stroke ql-thin" x1="2.5" x2="4.5" y1="5.5" y2="5.5"></line>
                                                    <path class="ql-fill" d="M3.5,6A0.5,0.5,0,0,1,3,5.5V3.085l-0.276.138A0.5,0.5,0,0,1,2.053,3c-0.124-.247-0.023-0.324.224-0.447l1-.5A0.5,0.5,0,0,1,4,2.5v3A0.5,0.5,0,0,1,3.5,6Z"></path>
                                                    <path class="ql-stroke ql-thin" d="M4.5,10.5h-2c0-.234,1.85-1.076,1.85-2.234A0.959,0.959,0,0,0,2.5,8.156"></path>
                                                    <path class="ql-stroke ql-thin" d="M2.5,14.846a0.959,0.959,0,0,0,1.85-.109A0.7,0.7,0,0,0,3.75,14a0.688,0.688,0,0,0,.6-0.736,0.959,0.959,0,0,0-1.85-.109"></path>
                                                </svg></button>
                                            <button class="ql-list" value="bullet" type="button"><svg viewBox="0 0 18 18">
                                                    <line class="ql-stroke" x1="6" x2="15" y1="4" y2="4"></line>
                                                    <line class="ql-stroke" x1="6" x2="15" y1="9" y2="9"></line>
                                                    <line class="ql-stroke" x1="6" x2="15" y1="14" y2="14"></line>
                                                    <line class="ql-stroke" x1="3" x2="3" y1="4" y2="4"></line>
                                                    <line class="ql-stroke" x1="3" x2="3" y1="9" y2="9"></line>
                                                    <line class="ql-stroke" x1="3" x2="3" y1="14" y2="14"></line>
                                                </svg></button>
                                            <button class="ql-link" type="button"><svg viewBox="0 0 18 18">
                                                    <line class="ql-stroke" x1="7" x2="11" y1="7" y2="11"></line>
                                                    <path class="ql-even ql-stroke" d="M8.9,4.577a3.476,3.476,0,0,1,.36,4.679A3.476,3.476,0,0,1,4.577,8.9C3.185,7.5,2.035,6.4,4.217,4.217S7.5,3.185,8.9,4.577Z"></path>
                                                    <path class="ql-even ql-stroke" d="M13.423,9.1a3.476,3.476,0,0,0-4.679-.36,3.476,3.476,0,0,0,.36,4.679c1.392,1.392,2.5,2.542,4.679.36S14.815,10.5,13.423,9.1Z"></path>
                                                </svg></button>
                                            <button class="ql-image" type="button"><svg viewBox="0 0 18 18">
                                                    <rect class="ql-stroke" height="10" width="12" x="3" y="4"></rect>
                                                    <circle class="ql-fill" cx="6" cy="7" r="1"></circle>
                                                    <polyline class="ql-even ql-fill" points="5 12 5 11 7 9 8 10 11 7 13 9 13 12 5 12"></polyline>
                                                </svg></button>
                                        </span>
                                    </div>
                                </div>
                                <div class="comment-editor border-0 pb-4 ql-container ql-snow" id="ecommerce-category-description">
                                    <div class="ql-editor ql-blank" data-gramm="false" contenteditable="true" data-placeholder="Product Description">
                                        <p><br></p>
                                    </div>
                                    <div class="ql-clipboard" contenteditable="true" tabindex="-1"></div>
                                    <div class="ql-tooltip ql-hidden"><a class="ql-preview" rel="noopener noreferrer" target="_blank" href="about:blank"></a><input type="text" data-formula="e=mc^2" data-link="https://quilljs.com" data-video="Embed URL"><a class="ql-action"></a><a class="ql-remove"></a></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Product Information -->
            </div>

            <!-- Second column -->
            <div class="col-12 col-lg-4">
                <!-- Organize Card -->
                <div class="card mb-4" data-select2-id="16">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Organize</h5>
                    </div>
                    <div class="card-body">
                        <!-- Vendor -->
                        <div class="mb-3 col ecommerce-select2-dropdown" data-select2-id="15">
                            <label class="form-label mb-1" for="vendor">
                                Parent Category
                            </label>
                            <div class="position-relative" data-select2-id="14">
                                <select id="vendor" name="parent_id" class="select2 form-select ">
                                    <option <?= ($parent_id==0)? 'selected' :false ?> value="0">0 - Empty</option>
                                    <?php
                                    foreach ($cate->category_select_all() as $item ) {?>
                                    <option <?= ($item['cate_id']==$parent_id)? 'selected' :false ?> value=<?= $item['cate_id'] ?>><?= $item['cate_id']." - ".$item['cate_name'] ?></option>
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
                </div>
                <!-- /Organize Card -->
                <div class="card mb-4" data-select2-id="16">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 card-title">Media</h5>
                        <a href="javascript:void(0);" class="fw-medium">Add media from URL</a>
                    </div>
                    <div class="card-body">
                        <form action="/upload" class="dropzone needsclick dz-clickable" id="dropzone-basic">
                            <div class="dz-message needsclick my-5">
                                <p class="fs-4 note needsclick my-2">Drag and drop your image here</p>
                                <small class="text-muted d-block fs-6 my-2">or</small>
                                <span class="note needsclick btn bg-label-primary d-inline" id="btnBrowse">Browse image</span>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <!-- /Second column -->
        </div>
    </form>
</div>