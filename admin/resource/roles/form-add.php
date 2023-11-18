<div class="row">
    <div class="col-7">
        <div class="card mb-4">
            <div class="card-body">
                <form action="?pages=insert_role" method="post" id="myForm" enctype="multipart/form-data">
                    <div class="row mb-4">
                    <div class="col-12 text-center">
                            <h2>Add new role</h2>
                        </div>
                        <div class="col-6 form-group">
                            <label for="" class="form-label required">Role Name</label>
                            <input type="" class="form-control" id="" value="<?= !empty($_POST['role_name']) ? $_POST['role_name'] : false; ?>" name="role_name">
                            <span id="red_error" class="form-text"><?= !empty($error['error_role']) ? $error['error_role']:false ?> </span>
                        </div>
                        </div>
                        <div class="col-12 mt-4">
                        <button type="submit" class="btn btn-primary">Add</button>
                            <a class="btn btn-primary" href="?pages=list_role" role="button">Roles list</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>