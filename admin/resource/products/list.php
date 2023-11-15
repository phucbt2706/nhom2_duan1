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
                                <th scope="col">Product_id</th>
                                <th scope="col">Product_name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Discount</th>
                                <th scope="col">images</th>
                                <th scope="col">description</th>
                                <th scope="col">cate_id</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($listproduct as $pro) {
                            extract($pro);
                           

                            ?>
                        
                                <tr>
                                    <td> <?= $product_id ?> </td>
                                    <td> <?= $product_name ?></td>
                                    <th scope='col'> <?= $price ?>  </th>
                                    <th scope='col'><?= $discount ?> </th>
                                    <th scope='col'> <?= $images ?> </th>
                                    <th scope='col'> <?= $description ?></th>
                                    <th scope='col'> <?= $cate_id ?> </th> 
                                   
                                        <td> 
                                            <a href='index.php?act=suapro&product_id=<?= $product_id ?>'><i class='bx bxs-calendar-edit'></i></a>
                                            <a href='index.php?act=xoapro&product_id=<?= $product_id ?>'><i class='bx bxs-folder-minus'></i></a>
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