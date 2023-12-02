<?php
extract($item);
?>
<div class="row">
    <div class="col-8">
        <div class="card mb-4">
            <div class="card-body">
                <form action="?pages=update_user" method="post" enctype="multipart/form-data">
                    <div class="row mb-4">
                        <div class="col-12 text-center">
                            <h2>Edit user</h2>
                        </div>
                        <input type="" class="form-control" hidden value="<?=$user_id ?>" name="user_id">
                        <div class="col-6">
                            <label for="" class="form-label required">Username</label>
                            <input type="" class="form-control <?= !empty($error['error_username']) ? 'border border-danger' : false ?>" id=" " value="<?= !empty($_POST['username'])?$_POST['username'] : $username ?>" name="username">
                            <span id="red_error" class="form-text"><?= !empty($error['error_username'])?$error['error_username']:false;?> </span>
                        </div>
                        <div class="col-6">
                            <label for="" class="form-label required">Fullname</label>
                            <input type="" class="form-control <?= !empty($error['error_name']) ? 'border border-danger' : false ?>" id=" " value="<?= !empty($_POST['fullname'])?$_POST['fullname'] :$fullname ?>" name="fullname">
                            <span id="red_error" class="form-text"><?= !empty($error['error_name'])?$error['error_name']:false;?> </span>
                        </div>
                        <div class="col-6">
                            <label for="inputPassword4" class="form-label required">Password</label>
                            <input type="password" class="form-control <?= !empty($error['error_pass']) ? 'border border-danger' : false ?>" id="" name="password" value="<?= !empty($_POST['password'])?$_POST['password'] :$password ?>">
                            <span id="red_error" class="form-text"><?= !empty($error['error_pass'])?$error['error_pass']:false;?> </span>
                        </div>
                        <div class="col-6">
                            <label for="inputPassword4" class="form-label required">Confirm Password</label>
                            <input type="password" class="form-control <?= !empty($error['error_conf_pass']) ? 'border border-danger' : false ?>" id="" name="confirm_password" value="<?= !empty($_POST['confirm_password'])?$_POST['confirm_password'] :$password ?>">
                            <span id="red_error" class="form-text"><?= !empty($error['error_conf_pass'])?$error['error_conf_pass']:false;?> </span>
                        </div>
                        <div class="col-6">
                            <label for="exampleFormControlInput1" class="form-label required">Email</label>
                            <input type="email" name="email" class="form-control <?= !empty($error['error_email']) ? 'border border-danger' : false ?>" value="<?= !empty($_POST['email'])?$_POST['email'] :$email ?>" placeholder="name@example.com">
                            <span id="red_error" class="form-text"><?= !empty($error['error_email'])?$error['error_email']:false;?> </span>

                        </div>
                        <div class="col-6">
                            <label for="formFile" class="form-label required">Avatar</label>
                            <input class="form-control" name="avatar" type="file" id="formFile">
                        </div>
                        <div class="col-6">
                            <div class="col-6">
                                <label for="" class="form-label required">Phone</label>
                                <input type="text" name="phone" class="form-control <?= !empty($error['error_phone']) ? 'border border-danger' : false ?>" value="<?= !empty($_POST['phone'])?$_POST['phone'] :$phone?>">
                                <span id="red_error" class="form-text"><?= !empty($error['error_phone'])?$error['error_phone']:false;?> </span>
                            </div>

                        </div>
                        <div class="col-6">
                            <label for="" class="form-label required">Role</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="role_id" value="1" id="role-radio3" <?= $role_id== 1?'checked':false ?>>
                                <label class="form-check-label" for="role-radio3">
                                    Admin
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="role_id" value="2" id="role-radio4" <?= $role_id== 2?'checked':false ?> >
                                <label class="form-check-label" for="role-radio">
                                    User
                                </label>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <button type="submit" name="button" value="update_user" class="btn btn-primary">Update</button>
                            <a class="btn btn-primary" href="?pages=list_account" role="button">Users list</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>