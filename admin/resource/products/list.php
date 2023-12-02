<?php
$rows = $db->num_row_product();
$total_rows  = $rows[0]['num_row'];
$num_rows_in_page = 10;
$num_page = ceil($total_rows / $num_rows_in_page);

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

$start = ($page - 1) * $num_rows_in_page;

$list_product = $db->product_select_page($start, $num_rows_in_page);

?>
<h4 class="py-3 mb-4">
    <span class="text-muted fw-light">eCommerce /</span> Product List
</h4>

<!-- Product List Widget -->

<div class="card mb-4">
    <div class="card-widget-separator-wrapper">
        <div class="card-body card-widget-separator">
            <div class="row gy-4 gy-sm-1">
                <div class="col-sm-6 col-lg-3">
                    <div class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0">
                        <div>
                            <h6 class="mb-2">In-store Sales</h6>
                            <h4 class="mb-2">$5,345.43</h4>
                            <p class="mb-0"><span class="text-muted me-2">5k orders</span><span class="badge bg-label-success">+5.7%</span></p>
                        </div>
                        <div class="avatar me-sm-4">
                            <span class="avatar-initial rounded bg-label-secondary">
                                <i class="bx bx-store-alt bx-sm"></i>
                            </span>
                        </div>
                    </div>
                    <hr class="d-none d-sm-block d-lg-none me-4">
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-3 pb-sm-0">
                        <div>
                            <h6 class="mb-2">Website Sales</h6>
                            <h4 class="mb-2">$674,347.12</h4>
                            <p class="mb-0"><span class="text-muted me-2">21k orders</span><span class="badge bg-label-success">+12.4%</span></p>
                        </div>
                        <div class="avatar me-lg-4">
                            <span class="avatar-initial rounded bg-label-secondary">
                                <i class="bx bx-laptop bx-sm"></i>
                            </span>
                        </div>
                    </div>
                    <hr class="d-none d-sm-block d-lg-none">
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="d-flex justify-content-between align-items-start border-end pb-3 pb-sm-0 card-widget-3">
                        <div>
                            <h6 class="mb-2">Discount</h6>
                            <h4 class="mb-2">$14,235.12</h4>
                            <p class="mb-0 text-muted">6k orders</p>
                        </div>
                        <div class="avatar me-sm-4">
                            <span class="avatar-initial rounded bg-label-secondary">
                                <i class="bx bx-gift bx-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6 class="mb-2">Affiliate</h6>
                            <h4 class="mb-2">$8,345.23</h4>
                            <p class="mb-0"><span class="text-muted me-2">150 orders</span><span class="badge bg-label-danger">-3.5%</span></p>
                        </div>
                        <div class="avatar">
                            <span class="avatar-initial rounded bg-label-secondary">
                                <i class="bx bx-wallet bx-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Product List Table -->
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Filter</h5>
        <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
            <div class="col-md-4 product_status"><select id="ProductStatus" class="form-select text-capitalize">
                    <option value="">Status</option>
                    <option value="Scheduled">Scheduled</option>
                    <option value="Publish">Publish</option>
                    <option value="Inactive">Inactive</option>
                </select></div>
            <div class="col-md-4 product_category"><select id="ProductCategory" class="form-select text-capitalize">
                    <option value="">Category</option>
                    <option value="Household">Household</option>
                    <option value="Office">Office</option>
                    <option value="Electronics">Electronics</option>
                    <option value="Shoes">Shoes</option>
                    <option value="Accessories">Accessories</option>
                    <option value="Game">Game</option>
                </select></div>
            <div class="col-md-4 product_stock"><select id="ProductStock" class="form-select text-capitalize">
                    <option value=""> Stock </option>
                    <option value="Out_of_Stock">Out of Stock</option>
                    <option value="In_Stock">In Stock</option>
                </select></div>
        </div>
    </div>
    <div class="card-datatable table-responsive">
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
            <div class="card-header d-flex border-top rounded-0 flex-wrap py-md-0">
                <div class="me-5 ms-n2 pe-5">
                    <div id="DataTables_Table_0_filter" class="dataTables_filter"><label><input type="search" class="form-control" placeholder="Search Product" aria-controls="DataTables_Table_0"></label></div>
                </div>
                <div class="d-flex justify-content-start justify-content-md-end align-items-baseline">
                    <div class="dt-action-buttons d-flex align-items-start align-items-md-center justify-content-sm-center mb-3 mb-sm-0">
                        <div class="dataTables_length mt-0 mt-md-3 me-3" id="DataTables_Table_0_length"><label><select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-select">
                                    <option value="7">7</option>
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="50">50</option>
                                    <option value="70">70</option>
                                    <option value="100">100</option>
                                </select></label></div>
                        <div class="dt-buttons d-flex flex-wrap"> <button class="dt-button buttons-collection dropdown-toggle btn btn-label-secondary me-3" tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="dialog" aria-expanded="false"><span><i class="bx bx-export me-1"></i>Export</span><span class="dt-down-arrow">▼</span></button> <button
                                class="dt-button add-new btn btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button"><span><i class="bx bx-plus me-0 me-sm-1"></i><span class="d-none d-sm-inline-block">Add Product</span></span></button> </div>
                    </div>
                </div>
            </div>
            <table class="datatables-products table border-top dataTable no-footer dtr-column collapsed" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 1211px;">
            <thead>
                            <tr>
                                <th><input type="checkbox" name="product_id[]" id="product1" onclick="checkedAllPro();"></th>
                                <th scope="col">ID.</th>
                                <th scope="col">Product name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Discount</th>
                                <th scope="col">Cate ID</th>
                                <th scope="col" colspan="2">Action</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($list_product as $item) { extract($item)?>
                            <tr>
                                <td> <input type="checkbox" class="product" name="product_id[]" value="<?=$product_id?>"></td>
                                <td>SP0<?= $product_id ?></td>
                                <td class="sorting_1">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-wrapper me-2 rounded-2 bg-label-secondary">
                                            <div class="avatar"><img src="<?= "../../../public/img/product/". $images ?>" alt="" class="rounded-2"></div>
                                        </div>
                                        <div class="d-flex flex-column justify-content-center"><span class="text-body text-wrap fw-medium"><?=  $product_name ?></span><span class="text-muted text-truncate mb-0 d-none d-sm-block"><small>Choose from wide range of travel accessories from popular brands</small></span></div>
                                    </div>
                                </td>
                                <td><?= currency_format($price) ?></td>
                                <td><?= $discount ?></td>
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
            <div class="row mx-2">
                <div class="col-sm-12 col-md-6">
                    <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Displaying 1 to 7 of 100 entries</div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                    <?php echo get_pagging_product($num_page,$page) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>