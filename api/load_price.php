<?php
include "config.php";

$id_color = (!empty($_POST['id_color'])) ? htmlspecialchars($_POST['id_color']) : 0;
$id_size = (!empty($_POST['id_size'])) ? htmlspecialchars($_POST['id_size']) : 0;
$id_pro = (!empty($_POST['id_pro'])) ? htmlspecialchars($_POST['id_pro']) : 0;
$type = (isset($_POST['type'])) ? $_POST['type'] : '';

$rowProDetail = $d->rawQueryOne("select sale_price, regular_price, id from #_product where id = ? and type = ? limit 0,1", array($id_pro, $type));
$rowSaleDetail = $d->rawQueryOne("select sale_price, regular_price, id from #_product_sale where id_parent = ? and id_color = ? and id_size = ? limit 0,1", array($id_pro, $id_color, $id_size));
?>

<?php if (!empty($rowSaleDetail && $rowSaleDetail['regular_price']>0)) { ?>
    <label class="attr-label-pro-detail"><?= gia ?>:</label>
    <div class="attr-content-pro-detail">
        <?php if ($rowSaleDetail['sale_price']) { ?>
            <span class="price-new-pro-detail"><?= $func->formatMoney($rowSaleDetail['sale_price']) ?></span>
            <span class="price-old-pro-detail"><?= $func->formatMoney($rowSaleDetail['regular_price']) ?></span>
        <?php } else { ?>
            <span class="price-new-pro-detail"><?= ($rowSaleDetail['regular_price']) ? $func->formatMoney($rowSaleDetail['regular_price']) : lienhe ?></span>
        <?php } ?>
    </div>
<?php }else{ ?>
    <label class="attr-label-pro-detail"><?= gia ?>:</label>
    <div class="attr-content-pro-detail">
        <?php if ($rowProDetail['sale_price']) { ?>
            <span class="price-new-pro-detail"><?= $func->formatMoney($rowProDetail['sale_price']) ?></span>
            <span class="price-old-pro-detail"><?= $func->formatMoney($rowProDetail['regular_price']) ?></span>
        <?php } else { ?>
            <span class="price-new-pro-detail"><?= ($rowProDetail['regular_price']) ? $func->formatMoney($rowProDetail['regular_price']) : lienhe ?></span>
        <?php } ?>
    </div>
<?php }?>