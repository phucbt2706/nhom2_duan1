<?php 
extract($item);
?>
<div class="row">
    <div class="col-7">
        <div class="card mb-4">
            <div class="card-body">
                <form action="?pages=update_role" method="post" id="myForm" enctype="multipart/form-data">
                    <div class="row mb-4">
                        <div class="col-12 text-center">
                            <h2>Chỉnh Sửa Vai Trò</h2>
                        </div>
                        <div class="col-6 form-group">
                            <label for="" class="form-label required">Role Id</label>
                            <input type="" class="form-control" readonly value="<?=$role_id ?>" name="role_id">
                        </div>
                        <div class="col-6 form-group">
                            <label for="" class="form-label required">Role Name</label>
                            <input type="" class="form-control" value="<?=$role_name ?>" name="role_name">
                            <span id="red_error" class="form-text"><?php if (!empty($error['name_format'])) {
                                                            echo $error['name_format'];
                                                        } else if (!empty($error['name_empty'])) {
                                                            echo $error['name_empty'];
                                                        }
                                                        ?> </span>
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