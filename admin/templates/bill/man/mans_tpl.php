<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <style type="text/css" media="print">
    @page {
        size: portrait;
        /* auto is the initial value */
        margin: 0;
        /* this affects the margin in the printer settings */
    }
    .brand-image{
        max-width: 200px;
        height: 150px;
    }
    </style>
</head>

<body onload="window.print();" cz-shortcut-listen="true">
    <div class="container px-5 py-3">
       <div class="w-header text-center">
            <a class="d-inline-block mb-3"><img class="brand-image" src="../upload/photo/<?=$logo['photo']?>" alt="Nina"></a>
            <h4><?=$setting['namevi']?></h4>
            <p class="address mb-1"><?=$optsetting['address']?></p>
            <p class="phone">Hotline: <?=$func->formatphone($optsetting['phone'],'-')?></p>
            <h4 class="bold">Đơn Đặt Hàng</h4>
            <p class="code">Số phiếu: <?=$code?></p>
       </div>
       <div class="w-main">
            <div class="d-flex justify-content-between align-items-center mb-1">
                <span>Ngày tạo: </span>
                <span><?=date("d/m/Y h:i A",$time)?></span>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-1">
                <span>Khách hàng: </span>
                <span><?=$fullname_customer?></span>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-1">
                <span>Địa chỉ: </span>
                <span><?=$address_customer?></span>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-1">
                <span>Hình thức thanh toán: </span>
                <span><?=$order_payment_text?></span>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-1">
                <span>Điện thoại: </span>
                <span><?=$func->formatphone($phone_customer,'.')?></span>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <span>Chi nhánh: </span>
                <span><?=$nameStoreBrand?></span>
            </div>
            <div class="form-row border border-dark border-right-0 border-left-0 py-2">
                <div class="col-5">Tên</div>
                <div class="col-1">SL</div>
                <div class="col-3">Giá</div>
                <div class="col-3 text-right">Tổng</div>
            </div>
            <div class="mb-4">
                <?php $total = 0;$sumQty = 0; foreach ($detail as $k => $v) { $sumQty+=$v['quantity'];$total+=($v['sale_price']>0)?$v['sale_price']*$v['quantity']:$v['regular_price']*$v['quantity'];?>
                    <div class="form-row border border-secondary border-right-0 border-left-0 border-top-0 py-2">
                        <div class="col-5"><?=$v['name']?></div>
                        <div class="col-1"><?=$v['quantity']?></div>
                        <div class="col-3"><?=($v['sale_price']>0)?$func->formatMoney($v['sale_price']):$func->formatMoney($v['regular_price']);?></div>
                        <div class="col-3 text-right"><?=($v['sale_price']>0)?$func->formatMoney($v['sale_price']*$v['quantity']):$func->formatMoney($v['regular_price']*$v['quantity']);?></div>
                    </div>
                <?php } ?>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <span>Tổng SL món: </span>
                <span><?=$sumQty?></span>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-3 border border-dark border-right-0 border-top-0 border-left-0 pb-2">
                <span>Thành tiền: </span>
                <span><?=$func->formatMoney($total);?></span>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <span>Tổng thành toán: </span>
                <span><?=$func->formatMoney($total);?></span>
            </div>
            <h5 class="text-center bold mb-1">Xin cảm ơn quý khách!!</h5>
            <h6 class="text-center mb-1">Xin Chào và hẹn gặp lại!!</h6>
            <p class="text-center"><?=date("h:i A",$time)?></p>
       </div>
    </div>
</body>

</html>