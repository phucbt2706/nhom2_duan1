<div class="row">
    <div class="col-7">
        <div class="card mb-4">
            <div class="card-body">
                <form action="?pages=insert_role" method="post" id="myForm" enctype="multipart/form-data">
                    <div class="row mb-4">
                        <div class="col-12 text-center">
                            <h2>Thêm Vai Trò</h2>
                        </div>
                        <div class="col-6 form-group">
                            <label for="" class="form-label required">Role Name</label>
                            <input type="" class="form-control" id="" value="<?php echo (!empty($_POST['role_name'])) ? $_POST['role_name'] : false; ?>" name="role_name">
                            <span id="red_error" class="form-text"><?php if (!empty($error['name_format'])) {
                                                            echo $error['name_format'];
                                                        } else if (!empty($error['name_empty'])) {
                                                            echo $error['name_empty'];
                                                        }
                                                        ?> </span>
                        </div>
                        </div>
                        <div class="col-12 mt-4">
                        <button type="submit" class="btn btn-primary">Add</button>
                            <a class="btn btn-primary" href="?pages=list_role" role="button">List of Roles</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>