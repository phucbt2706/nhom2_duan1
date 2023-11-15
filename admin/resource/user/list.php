<!-- Table Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-xl-12 col-xl-6">

            <form action="#" method="post">
                <div class="rounded h-100 p-4">

                    <h6 class="mb-4">Danh Sách Tài Khoản</h6> 

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">username</th>
                                <th scope="col">mật khẩu</th>
                                <th scope="col">full name</th>
                                <th scope="col">email</th>
                                <th scope="col">phone</th>
                                <th scope="col">avatar</th>
                                <th scope="col">vai trò</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($listuser as $tk) {
                            extract($tk);
                           

                            ?>
                        
                                <tr>
                                    <td> <?= $user_id ?> </td>
                                    <td> <?= $username ?></td>
                                    <th scope='col'> <?= $password ?>  </th>
                                    <th scope='col'><?= $fullname ?> </th>
                                    <th scope='col'> <?= $email ?> </th>
                                    <th scope='col'> <?= $phone ?></th>
                                    <th scope='col'> <?= $avatar ?> </th> 
                                    <th scope='col'> <?= ($role_id ==1) ? 'Admin' : 'User'?></th>
                                        <td> 
                                            <a href='index.php?act=suatk&user_id=<?= $user_id ?>'><i class='bx bxs-calendar-edit'></i></a>
                                            <a href='index.php?act=xoatk&user_id=<?= $user_id ?>'><i class='bx bxs-folder-minus'></i></a>
                                        </td>
                                </tr>
                                   
                               
                                <?php
                        }
                        ?>
                     </tbody>

                    </table>

                </div>
            </form>
        </div>



    </div>
</div>
<!-- Table End -->