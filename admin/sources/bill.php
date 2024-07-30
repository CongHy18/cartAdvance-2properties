


<?php

    if(!defined('SOURCES')) die("Error");

	/* Kiểm tra có đăng nhập chưa */
	if($func->checkLoginAdmin()==false && $act!="login")
	{
		$func->redirect("index.php?com=user&act=login");
	}

	/* Kiểm tra active export word */
	if(!isset($config['order']['bill']) || $config['order']['bill'] == false) $func->transfer("Trang không tồn tại", "index.php", false);

	/* Setting */
	$setting = $d->rawQueryOne("select * from #_setting limit 0,1");
	$optsetting = (isset($setting['options']) && $setting['options'] != '') ? json_decode($setting['options'],true) : null;
    $logo = $d->rawQueryOne("select id, photo, options from #_photo where type = ? and act = ? limit 0,1", array('logo','photo_static'), 'fetch', 7200);



    switch($act)
	{
		case "man":
			$template = "bill/man/mans";
			break;
		default:
			$template = "404";
	}


	/* Thông tin đơn hàng */
	$id_order = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;
	if(empty($id_order)) $func->transfer("Dữ liệu không có thực", "index.php?com=order&act=man", false);
	$order_detail = $d->rawQueryOne("select * from #_order where id = ? limit 0,1",array($id_order));

	/* Chi tiết đơn hàng */
	$detail = $d->rawQuery("select * from #_order_detail where id_order = ?",array($id_order));
	
	/* Payment */
	$order_payment = (!empty($order_detail['order_payment'])) ? htmlspecialchars($order_detail['order_payment']) : 0;
	$order_payment_data = $func->getInfoDetail('namevi', 'news', $order_payment);
	$order_payment_text = $order_payment_data['namevi'];




	/* Gán giá trị đơn hàng */
	$time = time();
	$code = @$order_detail['code'];
	$order_date = date('H:i A d-m-Y',@$order_detail['date_created']);
	$order_status = @$order_detail['order_status'];
	$fullname_customer = @$order_detail["fullname"];
	$id_storebrand = @$order_detail["storebrand"];
	$phone_customer = @$order_detail["phone"];
	$email_customer = @$order_detail["email"];
	$address_customer = @$order_detail["address"];
	$requirements_customer = @$order_detail["requirements"];
	$temp_price = $func->formatMoney(@$order_detail['temp_price']);
	$total_price = $func->formatMoney(@$order_detail['total_price']);
	$ship_price = @$order_detail['ship_price'];
	if($ship_price) $ship_price = $func->formatMoney($ship_price);
	else $ship_price = "Không";

	/* Trang thái */
	$order_status_info = $d->rawQueryOne("select namevi from #_order_status where id = ? limit 0,1",array($order_status));
    /* Chi nhánh */
    $chinhanh = $d->rawQueryOne("select id, namevi from #_news where type = ? and id = ? limit 0,1", array('chi-nhanh',$id_storebrand), 'fetch', 7200);
    $nameStoreBrand = $chinhanh['namevi'];
?>