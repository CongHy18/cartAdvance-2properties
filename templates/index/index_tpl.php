<div class="wrap-aboutus py50">
    <div class="wrap-content">
        <div class="row">
            <div class="col-md-6 mgb-res">
                <div class="title-aboutus">
                    <span><?= $gioithieu['name' . $lang] ?></span>
                </div>
                <div class="desc-aboutus text-split">
                    <?= $gioithieu['desc' . $lang] ?>
                </div>
                <a href="gioi-thieu" class="btn btn-aboutus">Xem thêm</a>
            </div>
            <div class="col-md-6">
                <p class="aboutus-image">
                    <?= $func->getImage(['class' => 'lazy w-100', 'sizes' => '647x421x2', 'upload' => UPLOAD_NEWS_L, 'image' => $gioithieu['photo'], 'alt' => $gioithieu['name' . $lang]]) ?>
                    <!-- <iframe src="https://animevietsub.fun/phim/the-gioi-phep-thuat-a474/tap-01-42081.html" frameborder="0" width="100%" height="400px"></iframe> -->
                </p>
            </div>
        </div>
    </div>
</div>

<!-- <div class="wrap-content">
    <iframe src="https://motchilli.net/phim-chieu-rap.html" frameborder="0" width="100%" height="700px"></iframe>
</div> -->


<div class="wrap-content">
</div>




<?php if (count($splistnb)) { ?>
    <div class="wrap-product py50">
        <div class="wrap-content">
            <div class="title-main mb-1"><span>Sản phẩm nổi bật</span></div>
            <!-- Category -->
            <div class="post-tabs-demo">
                <div class="nav-demo-list post-nav-demo list-unstyled p-0 title-product-list d-flex justify-content-center align-items-center flex-wrap mb-30">
                    <div class="nav-demo-list-item post-tab-show btn btn-outline-custom mx-1 my-1 active" data-id="all-0">
                        Tất cả</div>
                    <?php foreach ($splistnb as $k => $v) { ?>
                        <div class="nav-demo-list-item post-tab-show btn btn-outline-custom mx-1 my-1" data-id="category-<?= $v['id'] ?>"><?= $v['name' . $lang] ?></div>
                    <?php } ?>
                </div>
            </div>
            <!-- All products -->
            <div class="post-tab-content post-tab-show" data-rel="all" data-id="all-0">
                <div class="post-desc">
                    <div class="post-portfolio grid-product">
                        <?php if ($sanphamnb) {
                            foreach ($sanphamnb as $k => $v) {
                                $proSale = $func->getProSale($v['id']);
                                $v['name'] = $v['name' . $lang];
                                $v['href'] = $v[$sluglang];
                                $v['regular_price'] = $v['regular_price'];
                                $v['sale_price'] = $v['sale_price'];
                                $v['discount'] = $v['discount'];
                                $v['showCart'] = true;
                                $v['showQuickView'] = (!empty($config['LQD']['quickview']));
                                /* Lấy màu */
                                $productColor = $d->rawQuery("select id_color from #_product_sale where id_parent = ?", array($v['id']));
                                $productColor = (!empty($productColor)) ? $func->joinCols($productColor, 'id_color') : array();
                                $v['rowColor'] = [];
                                if (!empty($productColor)) {
                                    $v['rowColor'] = $d->rawQuery("select id from #_color where type='" . $v['type'] . "' and id in ($productColor) and find_in_set('hienthi',status) order by numb,id desc");
                                }
                                /* Lấy size */
                                $productSize = $d->rawQuery("select id_size from #_product_sale where id_parent = ?", array($v['id']));
                                $productSize = (!empty($productSize)) ? $func->joinCols($productSize, 'id_size') : array();
                                $v['rowSize'] = [];
                                if (!empty($productSize)) {
                                    $v['rowSize'] = $d->rawQuery("select id, name$lang from #_size where type='" . $v['type'] . "' and id in ($productSize) and find_in_set('hienthi',status) order by numb,id desc");
                                } ?>

                                <?= $func->getProductItem($v) ?>
                            <?php }
                        } else { ?>
                            <div class="alert alert-warning gr-100 text-center" role="alert">
                                <strong><?= sanphamdangcapnhat ?>!</strong>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="post-readmore text-center">
                        <button type="button" class="btn btn-outline-custom btn-loading" data-id="0" data-show="4" data-page="1" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Đang xử lý" style="display: inline-block;"><i class="fas fa-plus"></i> Xem thêm sản phẩm</button>
                        <div class="lds-spinner">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Products by category -->
            <?php foreach ($splistnb as $key => $vlist) {
                $sanphamnb = $func->getPostInListNb($vlist['id'], 'product', 'san-pham', 'limit 0,8'); //id,type,limit 0,8
            ?>
                <div class="post-tab-content" data-rel="category" data-id="category-<?= $vlist['id'] ?>">
                    <div class="post-desc">
                        <div class="post-portfolio grid-product">
                            <?php if ($sanphamnb) {
                                foreach ($sanphamnb as $k => $v) {
                                    $proSale = $func->getProSale($v['id']);
                                    $v['name'] = $v['name' . $lang];
                                    $v['href'] = $v[$sluglang];
                                    $v['regular_price'] = ($proSale['regular_price'] > 0) ? $proSale['regular_price'] : $v['regular_price'];
                                    $v['sale_price'] = ($proSale['regular_price'] > 0) ? $proSale['sale_price'] : $v['sale_price'];
                                    $v['discount'] = ($proSale['regular_price'] > 0) ? $proSale['discount'] : $v['discount'];
                                    $v['showCart'] = true;
                                    /* Lấy màu */
                                    $productColor = $d->rawQuery("select id_color from #_product_sale where id_parent = ?", array($v['id']));
                                    $productColor = (!empty($productColor)) ? $func->joinCols($productColor, 'id_color') : array();
                                    $v['rowColor'] = [];
                                    if (!empty($productColor)) {
                                        $v['rowColor'] = $d->rawQuery("select id from #_color where type='" . $v['type'] . "' and id in ($productColor) and find_in_set('hienthi',status) order by numb,id desc");
                                    }
                                    /* Lấy size */
                                    $productSize = $d->rawQuery("select id_size from #_product_sale where id_parent = ?", array($v['id']));
                                    $productSize = (!empty($productSize)) ? $func->joinCols($productSize, 'id_size') : array();
                                    $v['rowSize'] = [];
                                    if (!empty($productSize)) {
                                        $v['rowSize'] = $d->rawQuery("select id, name$lang from #_size where type='" . $v['type'] . "' and id in ($productSize) and find_in_set('hienthi',status) order by numb,id desc");
                                    }
                            ?>
                                    <?= $func->getProductItem($v) ?>
                                <?php }
                            } else { ?>
                                <div class="alert alert-warning gr-100 text-center" role="alert">
                                    <strong><?= sanphamdangcapnhat ?>!</strong>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="post-readmore text-center">
                            <button type="button" class="btn btn-outline-custom btn-loading" data-id="<?= $vlist['id'] ?>" data-show="4" data-page="1" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Đang xử lý"><i class="fas fa-plus"></i> Xem thêm sản phẩm</button>
                            <div class="lds-spinner">
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>

<?php if (count($brand)) { ?>
    <div class="wrap-brand">
        <div class="wrap-content">
            <div class="owl-page owl-carousel owl-theme" data-items="screen:0|items:2|margin:10,screen:425|items:3|margin:10,screen:575|items:4|margin:10,screen:767|items:4|margin:10,screen:991|items:5|margin:10,screen:1199|items:7|margin:10" data-rewind="1" data-autoplay="1" data-loop="0" data-lazyload="0" data-mousedrag="1" data-touchdrag="1" data-smartspeed="500" data-autoplayspeed="3500" data-dots="0" data-nav="1" data-navcontainer=".control-brand">
                <?php foreach ($brand as $v) { ?>
                    <div>
                        <a class="brand text-decoration-none" href="<?= $v[$sluglang] ?>" title="<?= $v['name' . $lang] ?>">
                            <?= $func->getImage(['class' => 'lazy w-100', 'sizes' => '150x150x2', 'upload' => UPLOAD_PRODUCT_L, 'image' => $v['photo'], 'alt' => $v['name' . $lang]]) ?>
                        </a>
                    </div>
                <?php } ?>
            </div>
            <div class="control-brand control-owl transition"></div>
        </div>
    </div>
<?php } ?>

<?php if (count($pronb)) { ?>
    <div class="wrap-product py50">
        <div class="wrap-content">
            <div class="title-main"><span>Sản phẩm nổi bật</span></div>
            <div class="paging-product"></div>
        </div>
    </div>
<?php } ?>

<?php /* ?>
<?php if (count($splistnb)) {
    foreach ($splistnb as $vlist) { ?>
<div class="wrap-product">
    <div class="wrap-content">
        <div class="title-main"><span><?= $vlist['name' . $lang] ?></span></div>
        <div class="paging-product-category paging-product-category-<?= $vlist['id'] ?>"
            data-list="<?= $vlist['id'] ?>">
        </div>
    </div>
</div>
<?php }
} ?>

<!-- Sản phẩm list  -->
<?php if (count($splistnb)) {?>
<div class="wrap-product mb-50 py-0">
    <div class="wrap-content">
        <ul
            class="list-unstyled p-0 title-product-list d-flex justify-content-center align-items-center flex-wrap mb-30">
            <?php foreach ($splistnb as $k => $vlist) { ?>
            <li class="mx-1 my-1"><a class="btn <?=($k==0)?'active':''?> btn-outline-custom"
                    data-list="<?= $vlist['id'] ?>"><?= $vlist['name' . $lang] ?></a></li>
            <?php } ?>
        </ul>
        <div class="paging-product-category"></div>
    </div>
</div>
<?php } ?>

<!-- Sản phẩm list cat -->
<?php if (count($splistnb)) {
    foreach ($splistnb as $key => $vlist) { $spcat = $func->getProductCat($vlist['id']);?>
<div class="wrap-product mb-50 py-0">
    <div class="wrap-content">
        <div class="title-main"><span><?= $vlist['name' . $lang] ?></span></div>
        <ul
            class="list-unstyled p-0 title-product-cat d-flex justify-content-center align-items-center flex-wrap mb-30">
            <?php foreach ($spcat as $k => $vcat) { ?>
            <li class="mx-1 my-1"><a class="btn <?=($k==0)?'active':''?> btn-outline-custom" data-list="<?= $vlist['id'] ?>"
                    data-cat="<?= $vcat['id'] ?>"><?= $vcat['name' . $lang] ?></a></li>
            <?php } ?>
        </ul>
        <div class="paging-product-category-<?=$vlist['id']?>"></div>
    </div>
</div>
<?php }
} ?>
<?php */ ?>
<div class="wrap-intro py50">
    <div class="wrap-content">
        <div class="title-main"><span>Video clip - tin tức</span></div>
        <div class="row">
            <div class="col-md-6 mgb-res">
                <?php if (!empty($newsnb)) { ?>
                    <div class="news-intro position-relative">
                        <span class="news-control position-absolute transition" id="up"><i class="fas fa-chevron-up"></i></span>
                        <span class="news-control position-absolute transition" id="down"><i class="fas fa-chevron-down"></i></span>
                        <div class="news-scroll position-relative">
                            <ul class="list-unstyled p-0 m-0">
                                <?php foreach ($newsnb as $v) { ?>
                                    <li>
                                        <div class="news-shadow">
                                            <div class="news-shadow-time position-relative text-capitalize text-center">
                                                <span class="d-block"><?= $func->makeDate($v['date_created']) ?></span>
                                                <span class="d-block"><?= date("d/m/Y", $v['date_created']) ?></span>
                                            </div>
                                            <div class="news-shadow-article position-relative">
                                                <a class="news-shadow-image rounded-circle scale-img" href="<?= $v[$sluglang] ?>" title="<?= $v['name' . $lang] ?>">
                                                    <?= $func->getImage(['class' => 'lazy w-100', 'sizes' => '90x90x1', 'upload' => UPLOAD_NEWS_L, 'image' => $v['photo'], 'alt' => $v['name' . $lang]]) ?>
                                                </a>
                                                <div class="news-shadow-info">
                                                    <h3 class="news-shadow-name">
                                                        <a class="text-decoration-none transition text-split" href="<?= $v[$sluglang] ?>" title="<?= $v['name' . $lang] ?>"><?= $v['name' . $lang] ?></a>
                                                    </h3>
                                                    <div class="news-shadow-desc text-split"><?= $v['desc' . $lang] ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="col-md-6">
                <div class="video-intro">
                    <?= $addons->set('video-fotorama', 'video-fotorama', 2); ?>
                    <?php /* $addons->set('video-select', 'video-select', 4); */ ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if (count($tieuchi)) { ?>
    <div class="wrap-criteria mb-50">
        <div class="wrap-content position-relative">
            <div class="owl-page owl-carousel owl-theme" data-items="screen:0|items:2|margin:0,screen:425|items:2|margin:0,screen:575|items:3|margin:0,screen:767|items:3|margin:0,screen:991|items:4|margin:0,screen:1199|items:4|margin:0" data-rewind="1" data-autoplay="1" data-loop="0" data-lazyload="0" data-mousedrag="1" data-touchdrag="1" data-smartspeed="300" data-autoplayspeed="500" data-autoplaytimeout="3500" data-dots="0" data-nav="1" data-navcontainer=".control-criteria">
                <?php foreach ($tieuchi as $v) { ?>
                    <div class="criteria">
                        <div class="box-criteria position-relative form-row">
                            <div class="col-3">
                                <a class="criteria-image d-inline-block" title="<?= $v['name' . $lang] ?>">
                                    <?= $func->getImage(['class' => 'lazy', 'sizes' => '42x42x3', 'upload' => UPLOAD_NEWS_L, 'image' => $v['photo'], 'alt' => $v['name' . $lang]]) ?>
                                </a>
                            </div>
                            <div class="col-9 criteria-info">
                                <h3 class="criteria-name">
                                    <a class="text-decoration-none transition text-split" title="<?= $v['name' . $lang] ?>"><?= $v['name' . $lang] ?></a>
                                </h3>
                                <div class="criteria-desc text-split"><?= $v['desc' . $lang] ?></div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="control-criteria control-owl transition"></div>
        </div>
    </div>
<?php } ?>

<?php if (count($partner)) { ?>
    <div class="wrap-partner py50">
        <div class="wrap-content">
            <div class="position-relative">
                <div class="owl-page owl-carousel owl-theme" data-items="screen:0|items:2|margin:10,screen:425|items:3|margin:10,screen:575|items:4|margin:10,screen:767|items:4|margin:10,screen:991|items:5|margin:10,screen:1199|items:7|margin:10" data-rewind="1" data-autoplay="1" data-loop="0" data-lazyload="0" data-mousedrag="1" data-touchdrag="1" data-smartspeed="300" data-autoplayspeed="500" data-autoplaytimeout="3500" data-dots="0" data-nav="1" data-navcontainer=".control-partner">
                    <?php foreach ($partner as $v) { ?>
                        <div class="py-1">
                            <a class="partner" href="<?= $v['link'] ?>" target="_blank" title="<?= $v['name' . $lang] ?>">
                                <?= $func->getImage(['class' => 'lazy w-100', 'sizes' => '150x120x2', 'upload' => UPLOAD_PHOTO_L, 'image' => $v['photo'], 'alt' => $v['name' . $lang]]) ?>
                            </a>
                        </div>
                    <?php } ?>
                </div>
                <div class="control-partner control-owl transition"></div>
            </div>
        </div>
    </div>
<?php } ?>

<div class="wrap-form py60">
    <div class="wrap-content">
        <?php include TEMPLATE . LAYOUT . "newsletter.php"; ?>
    </div>
</div>