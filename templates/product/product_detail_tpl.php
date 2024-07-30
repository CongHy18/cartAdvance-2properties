<div class="grid-pro-detail w-clear">
    <div class="row">
        <div class="left-pro-detail col-md-6 col-lg-5 mb-4">
            <a id="Zoom-1" class="MagicZoom" data-options="zoomMode: off; hint: off; rightClick: true; selectorTrigger: hover; expandCaption: false; history: false;" href="<?= ASSET . WATERMARK ?>/product/540x540x1/<?= UPLOAD_PRODUCT_L . $rowDetail['photo'] ?>" title="<?= $rowDetail['name' . $lang] ?>">
                <?= $func->getImage(['isLazy' => false, 'sizes' => '540x540x1', 'isWatermark' => true, 'prefix' => 'product', 'upload' => UPLOAD_PRODUCT_L, 'image' => $rowDetail['photo'], 'alt' => $rowDetail['name' . $lang]]) ?>
            </a>
            <?php if ($rowDetailPhoto) {
                if (count($rowDetailPhoto) > 0) { ?>
                    <div class="gallery-thumb-pro">
                        <div class="owl-page owl-carousel owl-theme owl-pro-detail" data-items="screen:0|items:5|margin:10" data-nav="1" data-navcontainer=".control-pro-detail">
                            <div>
                                <a class="thumb-pro-detail" data-zoom-id="Zoom-1" href="<?= ASSET . WATERMARK ?>/product/540x540x1/<?= UPLOAD_PRODUCT_L . $rowDetail['photo'] ?>" title="<?= $rowDetail['name' . $lang] ?>">
                                    <?= $func->getImage(['isLazy' => false, 'sizes' => '540x540x1', 'isWatermark' => true, 'prefix' => 'product', 'upload' => UPLOAD_PRODUCT_L, 'image' => $rowDetail['photo'], 'alt' => $rowDetail['name' . $lang]]) ?>
                                </a>
                            </div>
                            <?php foreach ($rowDetailPhoto as $v) { ?>
                                <div>
                                    <a class="thumb-pro-detail" data-zoom-id="Zoom-1" href="<?= ASSET . WATERMARK ?>/product/540x540x1/<?= UPLOAD_PRODUCT_L . $v['photo'] ?>" title="<?= $rowDetail['name' . $lang] ?>">
                                        <?= $func->getImage(['isLazy' => false, 'sizes' => '540x540x1', 'isWatermark' => true, 'prefix' => 'product', 'upload' => UPLOAD_PRODUCT_L, 'image' => $v['photo'], 'alt' => $rowDetail['name' . $lang]]) ?>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="control-pro-detail control-owl transition"></div>
                    </div>
            <?php }
            } ?>
        </div>

        <div class="right-pro-detail col-md-6 col-lg-7 mb-4">
            <p class="title-pro-detail mb-2"><?= $rowDetail['name' . $lang] ?></p>

            <div class="social-plugin social-plugin-pro-detail w-clear">
                <?php
                $params = array();
                $params['oaid'] = $optsetting['oaidzalo'];
                echo $func->markdown('social/share', $params);
                ?>
            </div>
            <div class="desc-pro-detail"><?= nl2br($func->decodeHtmlChars($rowDetail['desc' . $lang])) ?></div>
            <ul class="attr-pro-detail">
                <?php if (!empty($rowDetail['code'])) { ?>
                    <li class="w-clear">
                        <label class="attr-label-pro-detail"><?= masp ?>:</label>
                        <div class="attr-content-pro-detail"><?= $rowDetail['code'] ?></div>
                    </li>
                <?php } ?>
                <?php if (!empty($productBrand['id'])) { ?>
                    <li class="w-clear">
                        <label class="attr-label-pro-detail"><?= thuonghieu ?>:</label>
                        <div class="attr-content-pro-detail"><a class="text-decoration-none" href="<?= $productBrand[$sluglang] ?>" title="<?= $productBrand['name' . $lang] ?>"><?= $productBrand['name' . $lang] ?></a></div>
                    </li>
                <?php } ?>
                <li class="w-clear price_box">
                    <?php if (isset($config['LQD']['cartadvanced']) && $config['LQD']['cartadvanced'] == false || (empty($rowColor) || empty($rowSize))) {?>
                        <label class="attr-label-pro-detail"><?= gia ?>:</label>
                        <div class="attr-content-pro-detail">
                            <?php if ($rowDetail['sale_price']) { ?>
                                <span class="price-new-pro-detail"><?= $func->formatMoney($rowDetail['sale_price']) ?></span>
                                <span class="price-old-pro-detail"><?= $func->formatMoney($rowDetail['regular_price']) ?></span>
                            <?php } else { ?>
                                <span class="price-new-pro-detail"><?= ($rowDetail['regular_price']) ? $func->formatMoney($rowDetail['regular_price']) : lienhe ?></span>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </li>
                
                <?php if (!empty($rowColor)) { ?>
                    <li class="color-block-pro-detail w-clear">
                        <label class="attr-label-pro-detail d-block"><?= mausac ?>:</label>
                        <div class="attr-content-pro-detail d-block">
                            <?php foreach ($rowColor as $k => $v) { ?>
                                <?php if ($v['type_show'] == 1) { ?>
                                    <label for="color-pro-detail-<?= $v['id'] ?>" class="color-pro-detail text-decoration-none load_price <?=($config['LQD']['cartadvanced'] == true&&$k==0)?'active':''?>" data-idproduct="<?= $rowDetail['id'] ?>" data-type="<?= $rowDetail['type'] ?>" style="background-image: url(<?= UPLOAD_COLOR_L . $v['photo'] ?>)">
                                        <input type="radio" value="<?= $v['id'] ?>" id="color-pro-detail-<?= $v['id'] ?>" name="color-pro-detail" <?=($config['LQD']['cartadvanced'] == true&&$k==0)?'checked':''?>>
                                    </label>
                                <?php } else { ?>
                                    <label for="color-pro-detail-<?= $v['id'] ?>" class="color-pro-detail text-decoration-none load_price <?=($config['LQD']['cartadvanced'] == true&&$k==0)?'active':''?>" data-idproduct="<?= $rowDetail['id'] ?>" data-type="<?= $rowDetail['type'] ?>" style="background-color: #<?= $v['color'] ?>">
                                        <input type="radio" value="<?= $v['id'] ?>" id="color-pro-detail-<?= $v['id'] ?>" name="color-pro-detail" <?=($config['LQD']['cartadvanced'] == true&&$k==0)?'checked':''?>>
                                    </label>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </li>
                <?php } ?>
                <?php if (!empty($rowSize)) { ?>
                    <li class="size-block-pro-detail w-clear">
                        <label class="attr-label-pro-detail d-block"><?= kichthuoc ?>:</label>
                        <div class="attr-content-pro-detail d-block">
                            <?php foreach ($rowSize as $k => $v) { ?>
                                <label for="size-pro-detail-<?= $v['id'] ?>" class="size-pro-detail text-decoration-none load_price <?=($config['LQD']['cartadvanced'] == true&&$k==0)?'active':''?>" data-idproduct="<?= $rowDetail['id'] ?>" data-type="<?= $rowDetail['type'] ?>">
                                    <input type="radio" value="<?= $v['id'] ?>" id="size-pro-detail-<?= $v['id'] ?>" name="size-pro-detail" <?=($config['LQD']['cartadvanced'] == true&&$k==0)?'checked':''?>>
                                    <?= $v['name' . $lang] ?>
                                </label>
                            <?php } ?>
                        </div>
                    </li>
                <?php } ?>
                <?php if (isset($config['LQD']['cart']) && $config['LQD']['cart'] == true) {?>
                <li class="w-clear">
                    <div class="d-flex justify-content-start align-items-center flex-wrap">
                        <label class="attr-label-pro-detail d-inline-block mr-2"><?= soluong ?>:</label>
                        <div class="attr-content-pro-detail d-block">
                            <div class="quantity-pro-detail">
                                <span class="quantity-minus-pro-detail">-</span>
                                <input type="number" class="qty-pro" min="1" value="1" readonly />
                                <span class="quantity-plus-pro-detail">+</span>
                            </div>
                        </div>
                    </div>
                </li>
                 <?php } ?>
                <li class="w-clear">
                    <label class="attr-label-pro-detail"><?= luotxem ?>:</label>
                    <div class="attr-content-pro-detail"><?= $rowDetail['view'] ?></div>
                </li>
            </ul>
            <?php if (isset($config['LQD']['cart']) && $config['LQD']['cart'] == true) {?>
            <div class="cart-pro-detail">
                <a class="btn btn-cart-main addcart mr-2" data-id="<?= $rowDetail['id'] ?>" data-action="addnow">
                    <i class="fa-light fa-bag-shopping mr-1"></i>
                    <span>Thêm vào giỏ hàng</span>
                </a>
                <a class="btn btn-dark addcart" data-id="<?= $rowDetail['id'] ?>" data-action="buynow">
                    <i class="fa-light fa-bag-shopping mr-1"></i>
                    <span>Mua ngay</span>
                </a>
            </div>
             <?php } ?>
        </div>
    </div>

    <div class="tags-pro-detail w-clear">
        <?php if (!empty($rowTags)) {
            foreach ($rowTags as $v) { ?>
                <a class="btn btn-sm btn-danger rounded" href="<?= $v[$sluglang] ?>" title="<?= $v['name' . $lang] ?>"><i class="fas fa-tags"></i><?= $v['name' . $lang] ?></a>
        <?php }
        } ?>
    </div>
    
    <?php if (empty($quickview)) { ?>
        <div class="tabs-pro-detail">
            <ul class="nav nav-tabs" id="tabsProDetail" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="info-pro-detail-tab" data-toggle="tab" href="#info-pro-detail" role="tab"><?= thongtinsanpham ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="commentfb-pro-detail-tab" data-toggle="tab" href="#commentfb-pro-detail" role="tab"><?= binhluan ?></a>
                </li>
            </ul>
            <div class="tab-content pt-4 pb-4" id="tabsProDetailContent">
                <div class="tab-pane fade show active w-pro-detail" id="info-pro-detail" role="tabpanel">
                    <?php /*Toc*/ if ((isset($config['LQD']['toc']) && $config['LQD']['toc'] == true)&&($config['LQD']['tocvip'] == false)) { ?>
                        <div class="meta-toc">
                            <div class="box-readmore">
                                <ul class="toc-list"></ul>
                            </div>
                        </div>
                    <?php } ?>
                    
                    <div id="ftwp-postcontent">
                        <?php /*Toc vip*/ if (isset($config['LQD']['tocvip']) && $config['LQD']['tocvip'] == true) { ?>
                            <div id="ftwp-container-outer" class="ftwp-in-post ftwp-float-none" style="height: auto;">
                                <div id="ftwp-container" class="ftwp-wrap ftwp-middle-right ftwp-minimize">
                                    <button type="button" id="ftwp-trigger" class="ftwp-shape-round ftwp-border-medium"><span class="ftwp-trigger-icon ftwp-icon-menu"></span></button>
                                    <nav id="ftwp-contents" class="ftwp-shape-round ftwp-border-thin" data-colexp="collapse" style="height: auto;"> </nav>
                                </div>
                            </div>
                            <?php } ?>
                            <div id="toc-content" class="img-auto <?=(isset($config['LQD']['showcontent']) && $config['LQD']['showcontent'] == true)?'content_product':''?>  "><?=htmlspecialchars_decode($rowDetail['content'.$lang])?></div>
                        </div>
                        
                        <?php /*Xem thêm nội dung*/ if (isset($config['LQD']['showcontent']) && $config['LQD']['showcontent'] == true) {?>
                            <div class="show-more btn_read text-center add-none">
                                <a class="btn btn-primary btn-sm btn-click">
                                    <span class="d-block">Xem thêm <i class="fa-regular fa-circle-chevron-down"></i></span>
                                </a>
                            </div>
                        <?php }?>
        
                </div>

                <div class="tab-pane fade" id="commentfb-pro-detail" role="tabpanel">
                    <div class="fb-comments" data-href="<?= $func->getCurrentPageURL() ?>" data-numposts="3" data-colorscheme="light" data-width="100%"></div>
                </div>
            </div>
        </div>
    <?php } ?>

</div>
<?php if (empty($quickview)) { ?>

    <div class="title-main"><span><?= sanphamcungloai ?></span></div>
    <div class="content-main">
        <div class="grid-product">
            <?php /*Giao diện thay đổi trong libraries/sample/product*/?>
            <?php if (!empty($product)) {
                foreach ($product as $k => $v) { 
                    $proSale = $func->getProSale($v['id']); 
                    $v['name'] = $v['name'.$lang];
                    $v['href'] = $v[$sluglang];
                    $v['regular_price'] = ($proSale['regular_price']>0)?$proSale['regular_price']:$v['regular_price'];
                    $v['sale_price'] = ($proSale['regular_price']>0)?$proSale['sale_price']:$v['sale_price'];
                    $v['discount'] =($proSale['regular_price']>0)?$proSale['discount']:$v['discount'];
                    $v['showCart'] = true;
                    /* Lấy màu */
                    $productColor = $d->rawQuery("select id_color from #_product_sale where id_parent = ?", array($v['id']));
                    $productColor = (!empty($productColor)) ? $func->joinCols($productColor, 'id_color') : array();
                    $v['rowColor'] = [];
                    if(!empty($productColor))
                    {
                        $v['rowColor'] = $d->rawQuery("select id from #_color where type='".$type."' and id in ($productColor) and find_in_set('hienthi',status) order by numb,id desc");
                    }
                    /* Lấy size */
                    $productSize = $d->rawQuery("select id_size from #_product_sale where id_parent = ?", array($v['id']));
                    $productSize = (!empty($productSize)) ? $func->joinCols($productSize, 'id_size') : array();
                    $v['rowSize'] = [];
                    if(!empty($productSize))
                    {
                        $v['rowSize'] = $d->rawQuery("select id, name$lang from #_size where type='".$type."' and id in ($productSize) and find_in_set('hienthi',status) order by numb,id desc");
                    }
                    ?>
                    <?= $func->getProductItem($v) ?>
                <?php }
                } else { ?>
                <div class="gr-100">
                    <div class="alert alert-warning w-100" role="alert">
                        <strong><?= khongtimthayketqua ?></strong>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="gr-100">
            <div class="pagination-home w-100"><?= (!empty($paging)) ? $paging : '' ?></div>
        </div>
    </div>
<?php } ?>