<?php
extract($item);
?>
<div class="row">
    <div class="col-7">
        <div class="card mb-4">
            <div class="card-body">
                <form action="?pages=update_user" method="post" enctype="multipart/form-data">
                    <div class="row mb-4">
                        <div class="col-12 text-center">
                            <h2>Edit new user</h2>
                        </div>
                        <div class="col-6 form-group">
                            <label for="" class="form-label required">User Id</label>
                            <input type="" class="form-control" readonly value="<?=$user_id ?>" name="user_id">
                        </div>

                        <div class="col-6">
                            <label for="" class="form-label required">Username</label>
                            <input type="" class="form-control" id=" " value="<?=$username ?>" name="username">
                            <span id="red_error" class="form-text"><?php if (!empty($error['username_format'])) {
                                                            echo $error['username_format'];
                                                        } else if (!empty($error['username_empty'])) {
                                                            echo $error['username_empty'];
                                                        }
                                                        ?> </span>
                        </div>
                        <div class="col-6">
                            <label for="inputPassword4" class="form-label required">Password</label>
                            <input type="password" class="form-control"id="" name = "password" value="<?=$password ?>">
                            <span id="red_error" class="form-text"><?php if (!empty($error['password_format'])) {
                                                            echo $error['password_format'];
                                                        } else if (!empty($error['password_empty'])) {
                                                            echo $error['password_empty'];
                                                        }
                                                        ?> </span>
                        </div>
                        <div class="col-6">
                            <label for="inputPassword4" class="form-label required">Password</label>
                            <input type="password" class="form-control"id="" name = "password" value="<?=$password ?>">
                            <span id="red_error" class="form-text"><?php if (!empty($error['password_format'])) {
                                                            echo $error['password_format'];
                                                        } else if (!empty($error['password_empty'])) {
                                                            echo $error['password_empty'];
                                                        }
                                                        ?> </span>
                        </div>
                        
                        <div class="col-6">
                            <label for="" class="form-label required">Fullname</label>
                            <input type="" class="form-control" id=" " value="<?=$fullname ?>" name="fullname">
                            <span id="red_error" class="form-text"><?php if (!empty($error['fullname_format'])) {
                                                            echo $error['fullname_format'];
                                                        } else if (!empty($error['fullname_empty'])) {
                                                            echo $error['fullname_empty'];
                                                        }
                                                        ?> </span>
                        </div>

                        <div class="col-6">
                            <label for="exampleFormControlInput1" class="form-label required">Email</label>
                            <input type="email" name="email" class="form-control" value="<?=$email ?>"
                                placeholder="name@example.com">
                                <span id="red_error" class="form-text"><?php if (!empty($error['email_format'])) {
                                                            echo $error['email_format'];
                                                        } else if (!empty($error['email_empty'])) {
                                                            echo $error['email_empty'];
                                                        }
                                                        ?> </span>
                        </div>
                        <div class="col-6">
                            <label for="formFile" class="form-label required">Avatar</label>
                            <input class="form-control" name="avatar" type="file" id="formFile">
                        </div>
                        <div class="col-6">
                            <div class="col-6">
                                <label for="" class="form-label required">Phone</label>
                                <input type="text" name="phone" class="form-control" value="<?=$phone?>">
                                <span id="red_error" class="form-text"><?php if (!empty($error['phone'])) {
                                                            echo $error['phone_format'];
                                                        } else if (!empty($error['phone_empty'])) {
                                                            echo $error['phone_empty'];
                                                        }
                                                        ?> </span>  
                            </div>

                        </div>
                        <div class="col-6">
                            <label for="" class="form-label required">Role</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="role_id" value="0" id="role-radio3">
                                <label class="form-check-label" for="role-radio3">
                                    Admin
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="role_id" value="1" id="role-radio4"
                                    checked>
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