<div class="header">
    <div class="header-top">
        <div class="wrap-content">
            <p class="info-header"><?= $slogan['name' . $lang] ?></p>
            <p class="info-header"><i class="fas fa-envelope"></i>Email: <?= $optsetting['email'] ?></p>
            <p class="info-header"><i class="fas fa-phone-square-alt"></i>Hotline: <?= $func->formatPhone($optsetting['hotline']) ?></p>
            <ul class="social social-header list-unstyled p-0 m-0">
                <?php foreach ($social as $k => $v) { ?>
                    <li class="d-inline-block align-top mr-1">
                        <a href="<?= $v['link'] ?>" target="_blank" class="hvr-float-shadow">
                            <?= $func->getImage(['sizes' => '30x30x2', 'upload' => UPLOAD_PHOTO_L, 'image' => $v['photo'], 'alt' => $v['name' . $lang]]) ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
            
        </div>
    </div>
    <div class="header-bottom">
        <div class="wrap-content">
            <a class="logo-header peShiner" href="">
                <?= $func->getImage(['sizes' => '120x100x2', 'upload' => UPLOAD_PHOTO_L, 'image' => $logo['photo'], 'alt' => $setting['name' . $lang]]) ?>
            </a>
            <a class="banner-header " href="">
                <?= $func->getImage(['sizes' => '730x120x2', 'upload' => UPLOAD_PHOTO_L, 'image' => $banner['photo'], 'alt' => $setting['name' . $lang]]) ?>
            </a>
            <a class="hotline-header">
                <?= $func->getImage(['class' => 'mr-2 animate__tada animate__animated animate__infinite','size-error' => '40x40x2', 'upload' => 'assets/images/', 'image' => 'hotline.png', 'alt' => 'Hotline']) ?>
                <div class="w-phone">
                    <p>Hotline hỗ trợ:</p>
                    <span><?= $func->formatPhone($optsetting['hotline'],'-') ?></span>
                </div>
            </a>
        </div>
    </div>
</div>
