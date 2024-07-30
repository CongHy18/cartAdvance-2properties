<?php
	/* Kiểm tra có đăng nhập chưa */
	if($func->checkLoginAdmin() == false && $act != "login")
	{
		$func->redirect("index.php?com=user&act=login");
	}

	/* Setting */
	$setting = $d->rawQueryOne("select * from #_setting limit 0,1");
	$optsetting = (isset($setting['options']) && $setting['options'] != '') ? json_decode($setting['options'],true) : null;
    $logo = $d->rawQueryOne("select id, photo, options from #_photo where type = ? and act = ? limit 0,1", array('logo','photo_static'), 'fetch', 7200);

	/* Thông tin đơn hàng */
	$sql = "select * from #_order where id<>0";

	$listid = (isset($_REQUEST['listid'])) ? htmlspecialchars($_REQUEST['listid']) : '';
	$order_status = (isset($_REQUEST['order_status'])) ? htmlspecialchars($_REQUEST['order_status']) : 0;
	$order_payment = (isset($_REQUEST['order_payment'])) ? htmlspecialchars($_REQUEST['order_payment']) : 0;
	$storebrand = (isset($_REQUEST['storebrand'])) ? htmlspecialchars($_REQUEST['storebrand']) : 0;
	$order_date = (isset($_REQUEST['order_date'])) ? htmlspecialchars($_REQUEST['order_date']) : '';
	$range_price = (isset($_REQUEST['range_price'])) ? htmlspecialchars($_REQUEST['range_price']) : '';
	$city = (isset($_REQUEST['id_city'])) ? htmlspecialchars($_REQUEST['id_city']) : 0;
	$district = (isset($_REQUEST['id_district'])) ? htmlspecialchars($_REQUEST['id_district']) : 0;
	$ward = (isset($_REQUEST['id_ward'])) ? htmlspecialchars($_REQUEST['id_ward']) : 0;

	if($listid) $sql .= " and id IN ($listid)";
	if($order_status) $sql .= " and order_status=$order_status";
	if($order_payment) $sql .= " and order_payment=$order_payment";
	if($storebrand) $sql .= " and storebrand=$storebrand";
	if($order_date)
	{
		$order_date = explode("-",$order_date);
		$date_from = trim($order_date[0].' 12:00:00 AM');
		$date_to = trim($order_date[1].' 11:59:59 PM');
		$date_from = strtotime(str_replace("/","-",$date_from));
		$date_to = strtotime(str_replace("/","-",$date_to));
		$sql .= " and date_created<=$date_to and date_created>=$date_from";
	}
	if($range_price)
	{
		$range_price = explode(";",$range_price);
		$price_from = trim($range_price[0]);
		$price_to = trim($range_price[1]);
		$sql .= " and total_price<=$price_to and total_price>=$price_from";
	}
	if($city) $sql .= " and city=$city";
	if($district) $sql .= " and district=$district";
	if($ward) $sql .= " and ward=$ward";
	if(isset($_REQUEST['keyword']))
	{
		$keyword = htmlspecialchars($_REQUEST['keyword']);
		$sql .= " and (fullname LIKE '%$keyword%' or email LIKE '%$keyword%' or phone LIKE '%$keyword%' or code LIKE '%$keyword%')";
	}

	$sql .= " order by date_created desc";
	$orders = $d->rawQuery($sql);


    switch($act)
	{
		case "print":
			$template = "bill/man/printAll";
			break;
		default:
			$template = "404";
	}



	// /* Lấy và Xuất dữ liệu */
	// for($i=0;$i<count($orders);$i++)
	// {
	// 	/* Phí ship */
	// 	if(isset($orders[$i]['ship_price']) && $orders[$i]['ship_price'] > 0) $ship_price = $func->formatMoney(@$orders[$i]['ship_price']);
	// 	else $ship_price = "Không";
	
	// 	/* Trang thái */
	// 	$order_status_info = $d->rawQueryOne("select namevi from #_order_status where id = ? limit 0,1",array($orders[$i]['order_status']));

	// 	/* Lấy hình thức thanh toán */
	// 	$order_payment = $func->getInfoDetail('namevi', 'news', @$orders[$i]['order_payment']);

	// 	/* Lấy chi nhánh */
	// 	$order_storebrand = $func->getInfoDetail('namevi', 'news', @$orders[$i]['storebrand']);
	
	// }



?>