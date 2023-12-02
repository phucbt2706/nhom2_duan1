<h4 class="py-3 mb-4">
    <span class="text-muted fw-light">eCommerce /</span> Product List
</h4>

<!-- Product List Table -->
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Product List</h5>
        <!-- <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
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
        </div> -->
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
                        <th class=" dt-checkboxes-cell dt-checkboxes-select-all" rowspan="1" colspan="1" style="width: 18px;" data-col="1" aria-label=""><input type="checkbox" class="form-check-input"></th>
                        <th class=" " tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 387px;" aria-label="product: activate to sort column descending" aria-sort="ascending">product</th>
                        <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 119px;" aria-label="category: activate to sort column ascending">category</th>
                        <th class="" rowspan="1" colspan="1" style="width: 50px;" aria-label="stock">stock</th>
                        <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 41px;" aria-label="sku: activate to sort column ascending">sku</th>
                        <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 69px;" aria-label="price: activate to sort column ascending">price</th>
                        <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 31px;" aria-label="qty: activate to sort column ascending">qty</th>
                        <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 89px;" aria-label="status: activate to sort column ascending">status</th>
                        <th class="dtr-hidden" rowspan="1" colspan="1" style="width: 0px;" aria-label="Actions">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="odd">
                        <td class="  dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td>
                        <td class="sorting_1">
                            <div class="d-flex justify-content-start align-items-center product-name">
                                <div class="avatar-wrapper">
                                    <div class="avatar avatar me-2 rounded-2 bg-label-secondary"><img src="../../assets/img/ecommerce-images/product-9.png" alt="" class="rounded-2"></div>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="text-body text-nowrap mb-0">Air Jordan</h6><small class="text-muted text-truncate d-none d-sm-block">Air Jordan is a line of basketball shoes produced by Nike</small>
                                </div>
                            </div>
                        </td>
                        <td><span class="text-truncate d-flex align-items-center"><span class="avatar-sm rounded-circle d-flex justify-content-center align-items-center bg-label-info me-2"><i class="bx bx-walk"></i></span>Shoes</span></td>
                        <td><span class="text-truncate"><label class="switch switch-primary switch-sm"><input type="checkbox" class="switch-input" id="switch"><span class="switch-toggle-slider"><span class="switch-off"></span></span></label><span class="d-none">Out_of_Stock</span></span></td>
                        <td><span>31063</span></td>
                        <td><span>$125</span></td>
                        <td><span>942</span></td>
                        <td><span class="badge bg-label-danger" text-capitalized="">Inactive</span></td>
                        <td class="dtr-hidden">
                            <div class="d-inline-block text-nowrap"><button class="btn btn-sm btn-icon"><i class="bx bx-edit"></i></button><button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded me-2"></i></button>
                                <div class="dropdown-menu dropdown-menu-end m-0"><a href="javascript:0;" class="dropdown-item">View</a><a href="javascript:0;" class="dropdown-item">Suspend</a></div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="row mx-2">
                <div class="col-sm-12 col-md-6">
                    <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Displaying 1 to 7 of 100 entries</div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                        <ul class="pagination">
                            <li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous"><a aria-controls="DataTables_Table_0" aria-disabled="true" role="link" data-dt-idx="previous" tabindex="0" class="page-link">Previous</a></li>
                            <li class="paginate_button page-item active"><a href="#" aria-controls="DataTables_Table_0" role="link" aria-current="page" data-dt-idx="0" tabindex="0" class="page-link">1</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" role="link" data-dt-idx="1" tabindex="0" class="page-link">2</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" role="link" data-dt-idx="2" tabindex="0" class="page-link">3</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" role="link" data-dt-idx="3" tabindex="0" class="page-link">4</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" role="link" data-dt-idx="4" tabindex="0" class="page-link">5</a></li>
                            <li class="paginate_button page-item disabled" id="DataTables_Table_0_ellipsis"><a aria-controls="DataTables_Table_0" aria-disabled="true" role="link" data-dt-idx="ellipsis" tabindex="0" class="page-link">…</a></li>
                            <li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0" role="link" data-dt-idx="14" tabindex="0" class="page-link">15</a></li>
                            <li class="paginate_button page-item next" id="DataTables_Table_0_next"><a href="#" aria-controls="DataTables_Table_0" role="link" data-dt-idx="next" tabindex="0" class="page-link">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>