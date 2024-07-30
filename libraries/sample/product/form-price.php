<div class="row">
    <div class="col-12">
        <div class="d-block text-success"><label>Giá theo thuộc tính: </label> <span class="text-info">(<?= $params['sale']['nameColor'] ?> <?=($params['sale']['nameColor']&&$params['sale']['nameSize'])?'-':''?> <?= $params['sale']['nameSize'] ?>)</span> </div>
    </div>
    <div class="form-group col-md-4">
        <label class="d-block" for="regular_price_<?= $params['sale']['k'] ?>">Giá bán:</label>
        <div class="input-group">
            <input type="text" class="form-control format-price regular_price_<?= $params['sale']['k'] ?> text-sm" name="data_regular_price[]" id="regular_price_<?= $params['sale']['k'] ?>" placeholder="Giá bán" value="<?= $params['sale']['regular_price_new'] ?>">
            <div class="input-group-append">
                <div class="input-group-text"><strong>VNĐ</strong></div>
            </div>
        </div>
    </div>
    <div class="form-group col-md-4">
        <label class="d-block" for="sale_price_<?= $params['sale']['k'] ?>">Giá mới:</label>
        <div class="input-group">
            <input type="text" class="form-control format-price sale_price_<?= $params['sale']['k'] ?> text-sm" name="data_sale_price[]" id="sale_price_<?= $params['sale']['k'] ?>" placeholder="Giá mới" value="<?= $params['sale']['sale_price_new'] ?>">
            <div class="input-group-append">
                <div class="input-group-text"><strong>VNĐ</strong></div>
            </div>
        </div>
    </div>
    <div class="form-group col-md-4">
        <label class="d-block" for="discount_<?= $params['sale']['k'] ?>">Chiết khấu:</label>
        <div class="input-group">
            <input type="text" class="form-control discount_<?= $params['sale']['k'] ?> text-sm" name="data_discount[]" id="discount_<?= $params['sale']['k'] ?>" placeholder="Chiết khấu" value="<?= $params['sale']['discount_new'] ?>" maxlength="3" readonly>
            <div class="input-group-append">
                <div class="input-group-text"><strong>%</strong></div>
            </div>
        </div>
    </div>
</div>

<script>
    /* Format price */
	if ($('.format-price').length) {
		$('.format-price').priceFormat({
			limit: 13,
			prefix: '',
			centsLimit: 0
		});
	}
    if ($('.regular_price_<?= $params['sale']['k'] ?>').length && $('.sale_price_<?= $params['sale']['k'] ?>').length) {
		$('.regular_price_<?= $params['sale']['k'] ?>, .sale_price_<?= $params['sale']['k'] ?>').keyup(function () {
			var regular_price = $('.regular_price_<?= $params['sale']['k'] ?>').val();
			var sale_price = $('.sale_price_<?= $params['sale']['k'] ?>').length ? $('.sale_price_<?= $params['sale']['k'] ?>').val() : 0;
			var discount = 0;

			if (regular_price == '' || regular_price == '0' || sale_price == '' || sale_price == '0') {
				discount_<?= $params['sale']['k'] ?> = 0;
			} else {
				regular_price = regular_price.replace(/,/g, '');
				sale_price = sale_price_<?= $params['sale']['k'] ?> ? sale_price.replace(/,/g, '') : 0;
				regular_price = parseInt(regular_price);
				sale_price = parseInt(sale_price);

				if (sale_price < regular_price) {
					discount = 100 - (sale_price * 100) / regular_price;
					discount = roundNumber(discount, 0);
				} else {
					$('.regular_price_<?= $params['sale']['k'] ?>, .sale_price_<?= $params['sale']['k'] ?>').val(0);
					if ($('.discount_<?= $params['sale']['k'] ?>').length) {
						discount = 0;
						$('.sale_price_<?= $params['sale']['k'] ?>').val(0);
					}
				}
			}

			if ($('.discount_<?= $params['sale']['k'] ?>').length) {
				$('.discount_<?= $params['sale']['k'] ?>').val(discount);
			}
		});
	}
</script>
