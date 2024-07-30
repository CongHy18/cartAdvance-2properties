<?php
include "config.php";

// Lấy tham số từ yêu cầu AJAX
$idList = (!empty($_POST['id'])) ? htmlspecialchars($_POST['id']) : 0;
$show = (!empty($_POST['show'])) ? htmlspecialchars($_POST['show']) : 0;
$page = (!empty($_POST['page'])) ? htmlspecialchars($_POST['page']) + 2 : 1;
$start = ($page - 1) * $show;

$where = "";
$params = array();

/* Math url */
if($idList)
{
    $where .= " and id_list = ".$idList;
    // array_push($params, $idList);
}

/* Get data */
$sql = "select name$lang, slugvi, slugen, id, photo, regular_price, sale_price, discount, type from #_product where type='san-pham' $where and find_in_set('noibat',status) and find_in_set('hienthi',status) order by numb,id desc";
$sqlCache = $sql." limit $start, $show";
$items = $cache->get($sqlCache, $params, 'result', 7200);

$response = array(
    "check" => (empty($items)) ? "null" : "not_null",
    "count" => count($items),
    "items" => ""
);

if (!empty($items)) {
    foreach ($items as $k => $v) {
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
        $itemHtml = $func->getProductItem($v);
        $response["items"] .= $itemHtml;
    } 
}

// Trả về dữ liệu dưới dạng JSON
echo json_encode($response);
?>

