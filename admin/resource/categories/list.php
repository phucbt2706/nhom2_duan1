<?php
$cate = new Category();
$rows = $cate->num_row_cate();
$total_rows  = $rows[0]['num_row'];
$num_rows_in_page = 10;

$num_page = ceil($total_rows / $num_rows_in_page);

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; 

$start = ($page - 1) * $num_rows_in_page;

$list_cate = $cate->cate_select_page($start, $num_rows_in_page);
?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">eCommerce /</span> Category List
    </h4>
    <div class="app-ecommerce-category">
        <!-- Category List Table -->
        <div class="card">
            <div class="card-datatable table-responsive">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                    <div class="card-header d-flex flex-wrap py-0">
                        <div class="me-5 ms-n2 pe-5">
                            <div id="DataTables_Table_0_filter" class="dataTables_filter"><label><input type="search" class="form-control" placeholder="Search Category" aria-controls="DataTables_Table_0"></label></div>
                        </div>
                        <div class="d-flex justify-content-start justify-content-md-end align-items-baseline">
                            <div class="dt-action-buttons d-flex align-items-start align-items-md-center justify-content-sm-center mb-3 mb-sm-0 gap-3 pt-0">
                                <div class="dataTables_length mt-0 mt-md-3" id="DataTables_Table_0_length">
                                    <label>
                                        <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-select">
                                            <option value="7">7</option>
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="50">50</option>
                                            <option value="70">70</option>
                                            <option value="100">100</option>
                                        </select>
                                    </label>
                                </div>
                                <div class="dt-buttons">
                                    <a href="?pages=form_add_cate" class="dt-button add-new btn btn-primary ms-2" tabindex="0" aria-controls="DataTables_Table_0" type="button">
                                        <span><i class="bx bx-plus me-0 me-sm-1"></i>Add Category</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="datatables-category-list table border-top dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 1210px;">
                        <thead>
                            <tr>
                                <th class=" dt-checkboxes-cell dt-checkboxes-select-all" style="width: 18px;" data-col="1" aria-label=""><input type="checkbox" class="form-check-input"></th>
                                <th class="text-nowrap" tabindex="0" aria-controls="DataTables_Table_0" style="width: 168px;" aria-label="Total Products &amp;nbsp;: activate to sort column ascending">ID.</th>
                                <th class="" tabindex="0" aria-controls="DataTables_Table_0" style="width: 580px;" aria-label="Categories: activate to sort column ascending" aria-sort="descending">Categories</th>
                                <th class="text-nowrap " style="width: 143px;" aria-label="Total Earning">Parent ID</th>
                                <th class="text-lg-center " style="width: 93px;" aria-label="Actions">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $stt = 0;
                                foreach ($list_cate as $item) {
                                extract($item);
                                $stt++;
                            ?>
                            <tr class="odd">
                                <td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td>
                                <td><?= $cate_id ?></td>
                                <td class="sorting_1">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-wrapper me-2 rounded-2 bg-label-secondary">
                                            <div class="avatar"><img src="../../assets/img/ecommerce-images/product-16.png" alt="" class="rounded-2"></div>
                                        </div>
                                        <div class="d-flex flex-column justify-content-center"><span class="text-body text-wrap fw-medium"><?=  $cate_name ?></span><span class="text-muted text-truncate mb-0 d-none d-sm-block"><small>Choose from wide range of travel accessories from popular brands</small></span></div>
                                    </div>
                                </td>
                                <td><?= $parent_id ?></td>
                                <td>
                                    <div class="d-flex align-items-sm-center justify-content-sm-center">
                                        <a role="button" href="?pages=delete_cate&cate_id=<?= $cate_id ?>" class="btn btn-sm btn-icon delete-record me-2">
                                            <i class="bx bx-trash"></i>
                                        </a>
                                        <a role="button" href="?pages=edit_cate&cate_id=<?= $cate_id ?>" class="btn btn-sm btn-icon" >
                                            <i class="bx bx-edit"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <div class="row mx-2">
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 7 of 14 entries</div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                <?php echo get_pagging_cate($num_page,$page) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Offcanvas to add new customer -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEcommerceCategoryList" aria-labelledby="offcanvasEcommerceCategoryListLabel">
            <!-- Offcanvas Header -->
            <div class="offcanvas-header py-4">
                <h5 id="offcanvasEcommerceCategoryListLabel" class="offcanvas-title">Add Category</h5>
                <button type="button" class="btn-close bg-label-secondary text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <!-- Offcanvas Body -->
            <div class="offcanvas-body border-top">
                <form action="?pages=insert_cate" method="POST" class="pt-0 fv-plugins-bootstrap5 fv-plugins-framework" id="eCommerceCategoryListForm" novalidate="novalidate">
                    <!-- Title -->
                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label" for="ecommerce-category-title">Category Name</label>
                        <input type="text" class="form-control" id="ecommerce-category-title" placeholder="Enter category title" name="categoryTitle" aria-label="category title">
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                    <!-- Slug -->
                    <div class="mb-3 fv-plugins-icon-container">
                        <label class="form-label" for="ecommerce-category-slug">Slug</label>
                        <input type="text" id="ecommerce-category-slug" class="form-control" placeholder="Enter slug" aria-label="slug" name="slug">
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                    </div>
                    <!-- Image -->
                    <div class="mb-3">
                        <label class="form-label" for="ecommerce-category-image">Attachment</label>
                        <input class="form-control" type="file" id="ecommerce-category-image">
                    </div>
                    <!-- Parent category -->
                    <div class="mb-3 ecommerce-select2-dropdown">
                        <label class="form-label" for="ecommerce-category-parent-category">Parent category</label>
                        <div class="position-relative"><select id="ecommerce-category-parent-category" class="select2 form-select select2-hidden-accessible" data-placeholder="Select parent category" data-select2-id="ecommerce-category-parent-category" tabindex="-1" aria-hidden="true">
                                <option value="" data-select2-id="2">Select parent Category</option>
                                <option value="Household">Household</option>
                                <option value="Management">Management</option>
                                <option value="Electronics">Electronics</option>
                                <option value="Office">Office</option>
                                <option value="Automotive">Automotive</option>
                            </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="1" style="width: 335.2px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false"
                                        aria-labelledby="select2-ecommerce-category-parent-category-container"><span class="select2-selection__rendered" id="select2-ecommerce-category-parent-category-container" role="textbox" aria-readonly="true"><span class="select2-selection__placeholder">Select parent category</span></span><span class="select2-selection__arrow" role="presentation"><b
                                                role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></div>
                    </div>
                    <!-- Description -->
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <div class="form-control p-0 pt-1">
                            <div class="comment-editor border-0 ql-container ql-snow" id="ecommerce-category-description">
                                <div class="ql-editor ql-blank" data-gramm="false" contenteditable="true" data-placeholder="Enter category description...">
                                    <p><br></p>
                                </div>
                                <div class="ql-clipboard" contenteditable="true" tabindex="-1"></div>
                                <div class="ql-tooltip ql-hidden"><a class="ql-preview" rel="noopener noreferrer" target="_blank" href="about:blank"></a><input type="text" data-formula="e=mc^2" data-link="https://quilljs.com" data-video="Embed URL"><a class="ql-action"></a><a class="ql-remove"></a></div>
                            </div>
                            <div class="comment-toolbar border-0 rounded ql-toolbar ql-snow">
                                <div class="d-flex justify-content-end">
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
                        </div>

                    </div>
                    <!-- Status -->
                    <div class="mb-4 ecommerce-select2-dropdown">
                        <label class="form-label">Select category status</label>
                        <div class="position-relative"><select id="ecommerce-category-status" class="select2 form-select select2-hidden-accessible" data-placeholder="Select category status" data-select2-id="ecommerce-category-status" tabindex="-1" aria-hidden="true">
                                <option value="" data-select2-id="4">Select category status</option>
                                <option value="Scheduled">Scheduled</option>
                                <option value="Publish">Publish</option>
                                <option value="Inactive">Inactive</option>
                            </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="3" style="width: 335.2px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false"
                                        aria-labelledby="select2-ecommerce-category-status-container"><span class="select2-selection__rendered" id="select2-ecommerce-category-status-container" role="textbox" aria-readonly="true"><span class="select2-selection__placeholder">Select category status</span></span><span class="select2-selection__arrow" role="presentation"><b
                                                role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></div>
                    </div>
                    <!-- Submit and reset -->
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary me-sm-3 me-1">Add</button>
                        <button type="reset" class="btn bg-label-danger" data-bs-dismiss="offcanvas">Discard</button>
                    </div>
                    <input type="hidden">
                </form>
            </div>
        </div>
    </div>
</div>