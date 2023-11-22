<?php

if (isset($_POST['logout'])) {
  $_SESSION['user'] = "";
  echo "<script>window.location.href = '?pages=login';</script>";
}

if (isset($_POST['edit'])) {
  echo "<script>window.location.href = '?pages=edit';</script>";
}

if (isset($_POST['edit-pw'])) {
  echo "<script>window.location.href = '?pages=edit-pw';</script>";
}
?>


<!-- account Section Begin -->
<section style="background-color: #eee;">
  <div class="container py-5">

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="./img/<?= $retrieved_data['avatar'] ?? "" ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="mt-3 mb-1"><?= $retrieved_data['fullname'] ?? "" ?></h5>
            <p class="text-muted mb-1"><?= $retrieved_data['phone'] ?? "" ?></p>
            <p class="text-muted mb-2">Users in Vietnam</p>
            <div class="d-flex justify-content-center mb-2">
              <form method="post">
                <button class="btn btn-outline-primary ms-1" name="edit">Edit account</button>
                <button class="btn btn-outline-primary ms-1" name="edit-pw">Change Password</button>
                <button class="btn btn-primary mr-1 mt-1" name="logout">Log out</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Tên</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $retrieved_data['fullname'] ?? "" ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Username</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $retrieved_data['username'] ?? "" ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $retrieved_data['email'] ?? "" ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Phone</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $retrieved_data['phone'] ?? "" ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Password</p>
              </div>
              <div class="col-sm-9">
                <input class="text-muted mb-0" type="password" value="<?= $retrieved_data['password'] ?? "" ?>" disabled>
              </div>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<!-- account Section end -->
