<?php 
include "config.php";
// Lấy tham số từ yêu cầu AJAX
$id_parent = (isset($_POST['id_parent'])) ? $_POST['id_parent'] : 0;
$type = (isset($_POST['type'])) ? $_POST['type'] : '';
$ColorList = (isset($_POST['ColorList'])) ? $_POST['ColorList'] : '';
$SizeList = (isset($_POST['SizeList'])) ? $_POST['SizeList'] : '';
$listColor = explode(',', $ColorList);
$listSize = explode(',', $SizeList);

$items = [];
foreach ($listColor as $item1) {
    foreach ($listSize as $item2) {
        $items[] = ['idColor' => $item1, 'idSize' => $item2];
    }
}

$response = [
    "check" => (empty($items)) ? "null" : "not_null",
    "count" => count($items),
    "items" => []
];

if (!empty($items)) {
    foreach ($items as $k => $v) { 
        $color_detail = $d->rawQueryOne("select id, namevi from #_color where type = ? and id = ? limit 0,1", array($type, $v['idColor'])); 
        $size_detail = $d->rawQueryOne("select id, namevi from #_size where type = ? and id = ? limit 0,1", array($type, $v['idSize']));
        $pro_sale_detail = $d->rawQueryOne("select regular_price,sale_price,discount from #_product_sale where id_parent = ? and id_color = ? and id_size = ? limit 0,1", array($id_parent, $v['idColor'],$v['idSize']));
        $v['nameColor'] = $color_detail['namevi'];
        $v['nameSize'] = $size_detail['namevi'];
        $v['k'] = $k;
        $v['regular_price_new'] = $pro_sale_detail['regular_price'];
        $v['sale_price_new'] = $pro_sale_detail['sale_price'];
        $v['discount_new'] = $pro_sale_detail['discount'];
        $itemHtml = $func->getProductSale($v);
        $response["items"][] = $itemHtml;  
    } 
}

echo json_encode($response);
?>

