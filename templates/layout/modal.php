<?php if (!empty($popup)) { ?>
<!-- Modal popup -->
<div class="modal fade" id="popup" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="popupModalLabel"><?= $popup['name' . $lang] ?></h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <a href="<?= $popup['link'] ?>">
                    <?= $func->getImage(['sizes' => '800x530x1', 'upload' => UPLOAD_PHOTO_L, 'image' => $popup['photo'], 'alt' => 'Popup']) ?>
                </a>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<!-- Modal quickview -->
<div class="modal fade quickviewModal" id="popup-quickview" tabindex="-1" role="dialog" aria-labelledby="popup-quickviewLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"  role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="popup-quickviewLabel"><?= sanpham ?></h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
            </div>
            <div class="modal-body"></div>
        </div>
    </div>
</div>

<?php if (isset($config['LQD']['cart']) && $config['LQD']['cart'] == true) {?>
<!-- Modal cart -->
<div class="modal fade" id="popup-cart" tabindex="-1" role="dialog" aria-labelledby="popup-cart-label"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-top modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="popup-cart-label"><?= giohangcuaban ?></h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"></div>
        </div>
    </div>
</div>
<?php } ?>

<?php if (isset($config['LQD']['booking']) && $config['LQD']['booking'] == true) { ?>
<!-- Modal prototype -->
<button type="button" class="btn btn-custom btn-booking transition" data-toggle="modal" data-target=".bookingModal">
    <i class="fa-light fa-calendar-days mr-2 animate__tada animate__animated animate__infinite"></i> Booking
</button>
<div class="modal fade bookingModal mw-booking" tabindex="-1" role="dialog" aria-labelledby="bookingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="bookingModalLabel">Booking</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="validation-newsletter" novalidate method="post" action="" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="col-sm-6 mb-15">
                            <div class="newsletter-input">
                                <input type="text" class="form-control text-sm" id="fullname-booking" placeholder=""
                                    name="dataNewsletter[fullname]" required />
                                <span class="label"><?= nhaphoten ?></span>
                                <div class="invalid-feedback"><?= vuilongnhaphoten ?></div>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-15">
                            <div class="newsletter-input">
                                <input type="number" class="form-control text-sm" id="phone-booking"  placeholder=""
                                    name="dataNewsletter[phone]" required />
                                    <span class="label"><?= nhapdienthoai ?></span>
                                <div class="invalid-feedback"><?= vuilongnhapsodienthoai ?></div>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-15">
                            <div class="newsletter-input">
                                <input type="email" class="form-control text-sm" id="email-booking"  placeholder=""
                                    name="dataNewsletter[email]" required />
                                <span class="label"><?= nhapemail ?></span>
                                <div class="invalid-feedback"><?= vuilongnhapdiachiemail ?></div>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-15">
                            <div class="newsletter-input">
                                <input type="datetime-local" class="form-control text-sm" id="day-booking" min = "<?=date("Y-m-d H:i");?>" placeholder=""
                                    name="dataNewsletter[day]" required />
                                    <span class="label"><?= chonthoigian ?></span>
                                <div class="invalid-feedback"><?= vuilongchonthoigian ?></div>
                            </div>
                        </div>
                        <div class="col-12 mb-15">
                            <div class="newsletter-textarea">
                                <textarea class="form-control text-sm" id="content-booking"
                                    name="dataNewsletter[content]" placeholder=""  rows="5"></textarea>
                                <span class="label"><?= nhapnoidung ?></span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="newsletter-button text-center">
                                <input type="submit" class="btn btn-sm btn-custom" name="submit-newsletter"
                                    value="Booking" disabled>
                                <input type="hidden" class="btn btn-custom w-100"
                                name="dataNewsletter[type]" value="dangkybaogia">

                                <input type="hidden" class="btn btn-custom w-100"
                                    name="recaptcha_response_newsletter" id="recaptchaResponseBooking">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php } ?>





<?php /*
<!-- Modal prototype -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".exampleModal">
	Open Modal
</button>
<div class="modal fade exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h6 class="modal-title" id="exampleModalLabel">Modal title</h6>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				...
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>
*/ ?>