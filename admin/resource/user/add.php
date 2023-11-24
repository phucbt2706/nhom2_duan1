<div class="row">
    <div class="col-8">
        <div class="card mb-4">
            <div class="card-body">
                <form action="?pages=insert_user" method="post" enctype="multipart/form-data">
                    <div class="row mb-4">
                        <div class="col-12 text-center">
                            <h2>Add new user</h2>
                        </div>
                        <div class="col-6">
                            <label for="" class="form-label required">Username</label>
                            <input type="" class="form-control <?= !empty($error['error_username']) ? 'border border-danger' : false ?> " id=" " value="<?= !empty($_POST['username']) ? $_POST['username'] : false ?>" name="username">
                            <span id="red_error" class="form-text"><?= !empty($error['error_username'])?$error['error_username']:false?> </span>
                        </div>
                        <div class="col-6">
                            <label for="" class="form-label required">Fullname</label>
                            <input type="" class="form-control <?= !empty($error['error_name']) ? 'border border-danger' : false ?>" id=" " value="<?= !empty($_POST['fullname']) ? $_POST['fullname'] : false ?>" name="fullname">
                            <span id="red_error" class="form-text"><?= !empty($error['error_name'])?$error['error_name']:false;?> </span>
                        </div>
                        <div class="col-6">
                            <label for="inputPassword4" class="form-label required">Password</label>
                            <input type="password" class="form-control <?= !empty($error['error_pass']) ? 'border border-danger' : false ?>" id="" name="password" value="<?= !empty($_POST['password']) ? $_POST['password'] : false ?>">
                            <span id="red_error" class="form-text"><?= !empty($error['error_pass'])?$error['error_pass']:false;?> </span>
                        </div>
                        <div class="col-6">
                            <label for="inputPassword4" class="form-label required">Confirm Password</label>
                            <input type="password" class="form-control <?= !empty($error['error_conf_pass']) ? 'border border-danger' : false ?>" id="" value="<?= !empty($_POST['confirm_password']) ? $_POST['confirm_password'] : false ?>" name="confirm_password">
                            <span id="red_error" class="form-text"><?= !empty($error['error_conf_pass'])?$error['error_conf_pass']:false;?> </span>
                        </div>
                        <div class="col-6">
                            <label for="exampleFormControlInput1" class="form-label required">Email</label>
                            <input type="email" name="email" class="form-control <?= !empty($error['error_email']) ? 'border border-danger' : false ?>" value="<?= !empty($_POST['email']) ? $_POST['email'] : false ?>" placeholder="name@example.com">
                            <span id="red_error" class="form-text"><?= !empty($error['error_email'])?$error['error_email']:false;?> </span>
                        </div>
                        <div class="col-6">
                            <label for="formFile" class="form-label required">Avatar</label>
                            <input class="form-control" name="avatar" type="file" id="formFile">
                        </div>
                        <div class="col-6">
                            <label for="" class="form-label required">Phone</label>
                            <input type="text" name="phone" class="form-control <?= !empty($error['error_phone']) ? 'border border-danger' : false ?>" value="<?= !empty($_POST['phone']) ? $_POST['phone'] : false ?>">
                            <span id="red_error" class="form-text"><?= !empty($error['error_phone'])?$error['error_phone']:false;?> </span>
                        </div>
                        <div class="col-6">
                            <label for="" class="form-label required">Role</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="role_id" value="0" id="role-radio3">
                                <label class="form-check-label" for="role-radio3">
                                    User
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="role_id" value="1" id="role-radio4" checked>
                                <label class="form-check-label" for="role-radio">
                                    Admin
                                </label>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <button type="submit" name="button" value="insert_user" class="btn btn-primary">Add</button>
                            <a class="btn btn-primary" href="?pages=list_account" role="button">Users list</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>