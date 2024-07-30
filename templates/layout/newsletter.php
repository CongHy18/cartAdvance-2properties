    <div class="main-form">
        <div class="title-form">Đăng Ký Nhận Tin</div>
        <form class="validation-newsletter" novalidate method="post" action="" enctype="multipart/form-data">
            <div class="col-input d-flex flex-wrap">
                <div class="newsletter-input col-md-6">
                    <input type="text" class="form-control text-sm" id="fullname-newsletter" name="dataNewsletter[fullname]" placeholder="<?= hoten ?>" required />
                    <div class="invalid-feedback"><?= vuilongnhaphoten ?></div>
                </div>
                <div class="newsletter-input col-md-6">
                    <input type="number" class="form-control text-sm" id="phone-newsletter" name="dataNewsletter[phone]" placeholder="<?= sodienthoai ?>" required />
                    <div class="invalid-feedback"><?= vuilongnhapsodienthoai ?></div>
                </div>
            </div>
            <div class="col-input d-flex flex-wrap">
                <div class="newsletter-input col-md-6">
                    <input type="email" class="form-control text-sm" id="email-newsletter" name="dataNewsletter[email]" placeholder="Email " required />
                    <div class="invalid-feedback"><?= vuilongnhapdiachiemail ?></div>
                </div>
                <div class="newsletter-input col-md-6">
                    <input type="text" class="form-control text-sm" id="address-newsletter" name="dataNewsletter[address]" placeholder="<?= diachi ?>" />
                    <div class="invalid-feedback"><?= vuilongnhapdiachi ?></div>
                </div>
            </div>

            <div class="col-content col-md-12">
                <textarea class="form-control text-sm" id="content-newsletter" name="dataNewsletter[content]" placeholder="Nội dung góp ý" required /><?= $flash->get('content') ?></textarea>
                <div class="invalid-feedback"><?= vuilongnhapnoidung ?></div>
            </div>

            <div class="col-submit">
                <div class="newsletter-button text-center btn btn-success">
                    <input type="submit" class="text-white" name="submit-newsletter" value="ĐĂNG KÝ" disabled>
                    <input type="hidden" class="text-white" name="recaptcha_response_newsletter" id="recaptchaResponseNewsletter">
                </div>
            </div>

        </form>
    </div>
  