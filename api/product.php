<?php 
	include "config.php";

	/* Paginations */
	include LIBRARIES."class/class.PaginationsAjax.php";
	$pagingAjax = new PaginationsAjax();
	$pagingAjax->perpage = (!empty($_GET['perpage'])) ? htmlspecialchars($_GET['perpage']) : 1;
	$eShow = htmlspecialchars($_GET['eShow']);
	$idList = (!empty($_GET['idList'])) ? htmlspecialchars($_GET['idList']) : 0;
	$idCat = (!empty($_GET['idCat'])) ? htmlspecialchars($_GET['idCat']) : 0;
	$p = (!empty($_GET['p'])) ? htmlspecialchars($_GET['p']) : 1;
	$start = ($p-1) * $pagingAjax->perpage;
	$pageLink = "api/product.php?perpage=".$pagingAjax->perpage;
	$tempLink = "";
	$where = "";
	$params = array();

	/* Math url */
	if($idCat)
	{
        $tempLink .= "&idCat=".$idCat."&idList=".$idList;
		$where .= " and id_cat = ".$idCat;
		array_push($params, $idCat);
	}elseif($idList){
        $tempLink .= "&idList=" . $idList;
		$where .= " and id_list = ".$idList;
		array_push($params, $idList);
	}
	$tempLink .= "&p=";
	$pageLink .= $tempLink;

	/* Get data */
	$sql = "select name$lang, slugvi, slugen, id, photo, regular_price, sale_price, discount, type from #_product where type='san-pham' $where and find_in_set('noibat',status) and find_in_set('hienthi',status) order by numb,id desc";
	$sqlCache = $sql." limit $start, $pagingAjax->perpage";
    $items = $cache->get($sqlCache, $params, 'result', 7200);

	/* Count all data */
	$countItems = count($cache->get($sql, $params, 'result', 7200));

	/* Get page result */
	$pagingItems = $pagingAjax->getAllPageLinks($countItems, $pageLink, $eShow);
?>

<?php if ($countItems) { ?>
	<?php /*Giao diện thay đổi trong libraries/sample/product*/?>
    <div class="grid-page grid-product">
        <?php foreach ($items as $k => $v) { 
			$proSale = $func->getProSale($v['id']); 
			$v['name'] = $v['name'.$lang];
			$v['href'] = $v[$sluglang];
			$v['showQuickView'] = (!empty($config['LQD']['quickview']));
			/* 
			$v['regular_price'] = ($proSale['regular_price']>0)?$proSale['regular_price']:$v['regular_price'];
			$v['sale_price'] = ($proSale['regular_price']>0)?$proSale['sale_price']:$v['sale_price'];
			$v['discount'] =($proSale['regular_price']>0)?$proSale['discount']:$v['discount'];
			$v['showCart'] = true;
			*/
			/* Lấy màu */
			$productColor = $d->rawQuery("select id_color from #_product_sale where id_parent = ?", array($v['id']));
			$productColor = (!empty($productColor)) ? $func->joinCols($productColor, 'id_color') : array();
			$v['rowColor'] = [];
			if(!empty($productColor))
			{
				$v['rowColor'] = $d->rawQuery("select id from #_color where type='".$v['type']."' and id in ($productColor) and find_in_set('hienthi',status) order by numb,id desc");
			}
			/* Lấy size */
			$productSize = $d->rawQuery("select id_size from #_product_sale where id_parent = ?", array($v['id']));
			$productSize = (!empty($productSize)) ? $func->joinCols($productSize, 'id_size') : array();
			$v['rowSize'] = [];
			if(!empty($productSize))
			{
				$v['rowSize'] = $d->rawQuery("select id, name$lang from #_size where type='".$v['type']."' and id in ($productSize) and find_in_set('hienthi',status) order by numb,id desc");
			}
			
			?>
			<?= $func->getProductItem($v) ?>
		<?php } ?>
    </div>
    <div class="pagination-ajax"><?= $pagingItems ?></div>
<?php } else{ ?>
    <div class="alert alert-warning w-100 text-center" role="alert">
        <strong><?=sanphamdangcapnhat?>!</strong>
    </div>
<?php }?>