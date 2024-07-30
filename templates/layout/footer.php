<div class="footer">
    <div class="footer-article">
        <div class="wrap-content">
            <div class="row justify-content-between">
                <div class="footer-news col-sm-5 mgb-res">
                    <h2 class="footer-title line-bottom bold up">Thông tin liên hệ</h2>
                    <div class="footer-info"><?= $func->decodeHtmlChars($footer['content' . $lang]) ?></div>
                    <ul class="social-footer d-flex align-items-center justify-content-start   list-unstyled p-0">
                        <?php foreach ($social as $k => $v) { ?>
                            <li class="d-flex align-items-center justify-content-center align-top mr-2">
                                <a href="<?= $v['link'] ?>" target="_blank" class="hvr-float-shadow">
                                    <?= $func->getImage(['sizes' => '20x20x3', 'upload' => UPLOAD_PHOTO_L, 'image' => $v['photo'], 'alt' => $v['name' . $lang]]) ?>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="footer-news col-sm-3 mgb-res">
                    <h2 class="footer-title line-bottom bold up">Chính sách</h2>
                    <ul class="footer-ul">
                        <?php foreach ($policy as $v) { ?>
                            <li><a href="<?= $v[$sluglang] ?>" title="<?= $v['name' . $lang] ?>"> - <?= $v['name' . $lang] ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="footer-news col-sm-4">
                    <?= $addons->set('fanpage-facebook', 'fanpage-facebook', 2); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-powered">
        <div class="wrap-content">
            <div class="row">
                <div class="footer-copyright col-md-6">Copyright © 2023 <?=$setting['namevi']?> All rights reserved. Designed by Nina</div>
                <div class="footer-statistic col-md-6">
                    <span><?= dangonline ?>: <?= $online ?></span>
                    <span><?= trongthang ?>: <?= $counter['month'] ?></span>
                    <span><?= tongtruycap ?>: <?= $counter['total'] ?></span>
                </div>
            </div>
        </div>
    </div>
    <?php include TEMPLATE . LAYOUT . "map.php";?>
</div>
<?php if (isset($config['LQD']['cart']) && $config['LQD']['cart'] == true) { if ($com != 'gio-hang') {?>
    <a class="cart-fixed text-decoration-none" href="gio-hang" title="Giỏ hàng">
        <i class="fa-regular fa-cart-plus"></i>
        <span class="count-cart"><?= (!empty($_SESSION['cart'])) ? count($_SESSION['cart']) : 0 ?></span>
    </a>
<?php } }?>

<div class="scrollToTop cursor-pointer active-progress">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 0;"></path>
    </svg>
</div>
