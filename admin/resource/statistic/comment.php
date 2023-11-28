<?php
$statistic_cmt      = new Statistic();
$rows               = $statistic_cmt->num_row_cmt();
$total_rows         = count($rows);
$num_rows_in_page   = 10;
$num_page           = ceil($total_rows / $num_rows_in_page);
$page               = isset($_GET['page']) ? (int)$_GET['page'] : 1; 
$start              = ($page - 1) * $num_rows_in_page;
?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="text-center">
                <h3 class="card-header">Statistic Comment</h3>
            </div>
            <div class="table-responsive text-nowrap">
                <form action="?pages=#" method="post">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Product ID</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Oldest</th>
                                <th scope="col">Newest</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            foreach ( $statistic_cmt->statistic_cmt($start,$num_rows_in_page) as $item) { extract($item)?>
                            <tr>
                                <td>SP0<?= $product_id ?></td>
                                <td><?= $product_name ?></td>
                                <td><?= $oldest ?></td>
                                <td><?= $newest ?></td>
                            </tr>
                            <?php 
                            } ?>
                        </tbody>
                    </table>
                </form>

            </div>
        </div>
    </div>
</div>
<div class="row mt-2">
    <div class="col-12 d-flex justify-content-end">
    <?php echo get_pagging_statistic_cmt($num_page,$page) ?>
    </div>
</div>
