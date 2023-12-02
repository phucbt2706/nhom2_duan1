<?php 
extract($item);
?>
<div class="row">
    <div class="col-7">
        <div class="card mb-4">
        <div class="text-center">
                <h3 class="card-header">Edit role</h3>
            </div>
            <div class="card-body">
                <form action="?pages=update_role" method="post" id="myForm" enctype="multipart/form-data">
                    <div class="row mb-4">
                        
                        <div class="col-6 form-group">
                            <label for="" class="form-label required">Role Id</label>
                            <input type="" class="form-control" readonly value="<?=$role_id ?>" name="role_id">
                        </div>
                        <div class="col-6 form-group">
                            <label for="" class="form-label required">Role Name</label>
                            <input type="" class="form-control <?= !empty($error['error_role']) ? 'border border-danger' : false ?>" value="<?= !empty($_POST['role_name'])?$_POST['role_name'] :$role_name ?>" name="role_name">
                            <span id="red_error" class="form-text"><?= !empty($error['error_role']) ? $error['error_role']:false ?> </span>
                        </div>
                        </div>
                        <div class="col-12 mt-4">
                        <button type="submit" class="btn btn-primary">Update</button>
                            <a class="btn btn-primary" href="?pages=list_role" role="button">List of Roles</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>