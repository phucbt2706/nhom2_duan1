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
    <!-- <div class="card-header">
        <h5 class="card-title">Filter</h5>
        <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
            <div class="col-md-4 product_status">
                <select id="ProductStatus" class="form-select text-capitalize">
                    <option value="">Status</option>
                    <option value="Scheduled">Scheduled</option>
                    <option value="Publish">Publish</option>
                    <option value="Inactive">Inactive</option>
                </select>
            </div>
            <div class="col-md-4 product_category">
                <select id="ProductCategory" class="form-select text-capitalize">
                    <option value="">Category</option>
                    <option value="Household">Household</option>
                    <option value="Office">Office</option>
                    <option value="Electronics">Electronics</option>
                    <option value="Shoes">Shoes</option>
                    <option value="Accessories">Accessories</option>
                    <option value="Game">Game</option>
                </select>
            </div>
            <div class="col-md-4 product_stock">
                <select id="ProductStock" class="form-select text-capitalize">
                    <option value=""> Stock </option>
                    <option value="Out_of_Stock">Out of Stock</option>
                    <option value="In_Stock">In Stock</option>
                </select>
            </div>
        </div>
    </div> -->
    <div class="card-datatable table-responsive">
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
            <div class="card-header d-flex flex-row justify-content-start border-top">
                <div class="d-flex flex-row me-2">
                    <input type="search" class="form-control me-2 w-400" placeholder="Search Product">
                    <button class="btn btn-danger me-2" type="button">
                        <span>
                            <i class="bx bx-plus me-0 me-sm-1"></i>
                            <span class="d-none d-sm-inline-block">Search</span>
                        </span>
                    </button>
                </div>
                <button class="btn btn-danger me-2" type="button">
                    <span>
                        <i class="bx bx-plus me-0 me-sm-1"></i>
                        <span class="d-none d-sm-inline-block">Delete</span>
                    </span>
                </button>
                <button class="btn btn-primary" type="button">
                    <span>
                        <i class="bx bx-plus me-0 me-sm-1"></i>
                        <span class="d-none d-sm-inline-block">Add Product</span>
                    </span>
                </button>
            </div>
            <table class="datatables-products table border-top dataTable no-footer dtr-column collapsed" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" ">
                <thead>
                    <tr>
                        <th></th>
                        <th><input type="checkbox" class="dt-checkboxes form-check-input"></th>
                        <th>product</th>
                        <th>category</th>
                        <th>stock</th>
                        <th>sku</th>
                        <th>price</th>
                        <th>qty</th>
                        <th>status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="odd">
                        <td class="control" tabindex="0"></td>
                        <td class="dt-checkboxes-cell"><input type="checkbox" class="dt-checkboxes form-check-input"></td>
                        <td class="sorting_1">
                            <div class="d-flex justify-content-start align-items-center product-name">
                                <div class="avatar-wrapper">
                                    <div class="avatar avatar me-2 rounded-2 bg-label-secondary"><img src="../../assets/img/ecommerce-images/product-9.png" alt="Product-9" class="rounded-2"></div>
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
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


</div>