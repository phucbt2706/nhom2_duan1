<div class="col-lg-3">
    <div class="shop__sidebar">
        <div class="shop__sidebar__search">
            <form action="?pages=shop" method="get">
                <input hidden type="text" name="pages" value="shop">
                <input name="search" type="text" placeholder="Search...">
                <button type="submit"><span class="icon_search"></span></button>
            </form>
        </div>
        <div class="shop__sidebar__accordion">
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-heading">
                        <a data-toggle="collapse" data-target="#collapseOne">Categories</a>
                    </div>
                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="shop__sidebar__categories">
                                <ul class="nice-scroll">
                                    <?php
                                    $cate  = new Category();
                                    foreach ($cate->category_select_all() as $item) {
                                        extract($item) ?>
                                        <li><a href="?pages=shop&cate_id=<?= $cate_id ?>"><?= $cate_name ?></a></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-heading">
                        <a data-toggle="collapse" data-target="#collapseTwo">Branding</a>
                    </div>
                    <div id="collapseTwo" class="collapse show" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="shop__sidebar__brand">
                                <ul>
                                <?php
                                    $cate  = new Category();
                                    foreach ($cate->category_select_brand() as $item) {
                                        extract($item) ?>
                                        <li><a href="?pages=shop&cate_id=<?= $cate_id ?>"><?= $cate_name ?></a></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-heading">
                        <a data-toggle="collapse" data-target="#collapseThree">Filter Price</a>
                    </div>
                    <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="shop__sidebar__price">
                                <ul>
                                    <li><a href="?pages=shop&price_min=1&price_max=100">$0.00 - $100.00</a></li>
                                    <li><a href="?pages=shop&price_min=100&price_max=200">$100.00 - $200.00</a></li>
                                    <li><a href="?pages=shop&price_min=200&price_max=500">$200.00 - $500.00</a></li>
                                    <li><a href="?pages=shop&price_min=500&price_max=700">$500.00 - $700.00</a></li>
                                    <li><a href="?pages=shop&price_min=700&price_max=1000">$700.00 - $1000.00</a></li>
                                    <li><a href="?pages=shop&price_min=1000">$1000.00+</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>