

<div class="title-main"><span><?= (!empty($titleCate)) ? $titleCate : @$titleMain ?></span></div>
<div class="content-main">
    <div class="row">
        <div class="col-md-3 mgb-res">
            <?php include TEMPLATE . LAYOUT . "productfilter.php";?>
        </div>
        <div class="col-md-9">
            <?php if ($com == 'tim-kiem') { ?>
                <div class="mb-3">Tìm thấy (<?= $total ?>) kết quả: <span>"<?php echo $tukhoa_show;?>"</span></div>
            <?php } ?>
            <div class="grid--product">
                <?php /*Giao diện thay đổi trong libraries/sample/product*/?>
                <?php if (!empty($product)) {
                    foreach ($product as $k => $v) {
                        $proSale = $func->getProSale($v['id']); 
                        $v['name'] = $v['name'.$lang];
                        $v['href'] = $v[$sluglang];
                        // $v['regular_price'] = ($proSale['regular_price']>0)?$proSale['regular_price']:$v['regular_price'];
                        // $v['sale_price'] = ($proSale['regular_price']>0)?$proSale['sale_price']:$v['sale_price'];
                        // $v['discount'] =($proSale['regular_price']>0)?$proSale['discount']:$v['discount'];
                        $v['regular_price'] = $v['regular_price'];
                        $v['sale_price'] = $v['sale_price'];
                        $v['discount'] =$v['discount'];
                        $v['showCart'] = true;
                        $v['showQuickView'] = (!empty($config['LQD']['quickview']));
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
    </div>
</div>

