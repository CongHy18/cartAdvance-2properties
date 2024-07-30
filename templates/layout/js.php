<!-- Js Config -->
<script type="text/javascript">
var NN_FRAMEWORK = NN_FRAMEWORK || {};
var CONFIG_BASE = '<?= $configBase ?>';
var ASSET = '<?= ASSET ?>';
var WEBSITE_NAME = '<?= (!empty($setting['name' . $lang])) ? addslashes($setting['name' . $lang]) : '' ?>';
var TIMENOW = '<?= date("d/m/Y", time()) ?>';
var SHIP_CART = <?= (!empty($config['order']['ship'])) ? 'true' : 'false' ?>;
var SOURCEWEB = '<?=$source?>';
var CONFIG_TOC = <?= (!empty($config['LQD']['toc'])&&( $config['LQD']['tocvip'] == false)) ? 'true' : 'false' ?>;
var CONFIG_SHOWCONTENT = <?= (!empty($config['LQD']['showcontent'])) ? 'true' : 'false' ?>;
var CONFIG_SHINER = <?= (!empty($config['LQD']['shinerlogo'])) ? 'true' : 'false' ?>;
var CART = <?= (!empty($config['LQD']['cart'])) ? 'true' : 'false' ?>;
var CART_ADVANCED = <?= (!empty($config['LQD']['cartadvanced'])) ? 'true' : 'false' ?>;
var LINK_FILTER = '<?= (!empty($linkFilter)) ? $linkFilter : '' ?>';
var QUICKVIEW = <?= (!empty($config['LQD']['quickview'])) ? 'true' : 'false' ?>;
var RECAPTCHA_ACTIVE = <?= (!empty($config['googleAPI']['recaptcha']['active'])) ? 'true' : 'false' ?>;
var RECAPTCHA_SITEKEY = '<?= $config['googleAPI']['recaptcha']['sitekey'] ?>';
var GOTOP = ASSET + 'assets/images/top.png';
var LANG = {
    'no_keywords': '<?= chuanhaptukhoatimkiem ?>',
    'delete_product_from_cart': '<?= banmuonxoasanphamnay ?>',
    'no_products_in_cart': '<?= khongtontaisanphamtronggiohang ?>',
    'ward': '<?= phuongxa ?>',
    'back_to_home': '<?= vetrangchu ?>',
};
</script>

<!-- Js Files -->
<?php
$js->set("js/jquery.min.js");
$js->set("js/lazyload.min.js");
$js->set("bootstrap/bootstrap.js");
$js->set("js/wow.min.js");
$js->set("confirm/confirm.js");
$js->set("holdon/HoldOn.js");
// $js->set("mmenu/mmenu.js");
$js->set("easyticker/easy-ticker.js");
$js->set("fotorama/fotorama.js");
$js->set("owlcarousel2/owl.carousel.js");
$js->set("magiczoomplus/magiczoomplus.js");
if (isset($config['LQD']['slick']) && $config['LQD']['slick'] == true) {
    $js->set("slick/slick.js");
}
$js->set("fancybox3/jquery.fancybox.js");
$js->set("photobox/photobox.js");
$js->set("simplenotify/simple-notify.js");
$js->set("fileuploader/jquery.fileuploader.min.js");
$js->set("datetimepicker/php-date-formatter.min.js");
$js->set("datetimepicker/jquery.mousewheel.js");
$js->set("datetimepicker/jquery.datetimepicker.js");
$js->set("js/functions.js");
// $js->set("js/comment.js");
if ((isset($config['LQD']['toc']) && $config['LQD']['toc'] == true)&&( $config['LQD']['tocvip'] == false)) {
    $js->set("toc/toc.js");
}
$js->set("js/placeholderTypewriter.js");
if (isset($config['LQD']['shinerlogo']) && $config['LQD']['shinerlogo'] == true) {
    $js->set("js/jquery.pixelentity.shiner.min.js");
}
if (isset($config['LQD']['tocvip']) && $config['LQD']['tocvip'] == true) {
    $js->set("toc/ftoc.min.js");
}
$js->set("js/apps.js");
echo $js->get();
?>

<?php if (!empty($config['googleAPI']['recaptcha']['active'])) { ?>
<!-- Js Google Recaptcha V3 -->
<script type="text/javascript">
     $(document).ready(function($) {
        $('#email-newsletter, #fullname-contact').click(function(event) {
            $.getScript(
                'https://www.google.com/recaptcha/api.js?render=<?= $config['googleAPI']['recaptcha']['sitekey'] ?>',
            function() {
                grecaptcha.ready(function() {
                    /* Newsletter */
                    <?php if ($source == 'index') { ?>
                        generateCaptcha('Newsletter', 'recaptchaResponseNewsletter');
                    <?php } ?>
                    <?php if ($source == 'contact') { ?>
                    /* Contact */
                    generateCaptcha('contact', 'recaptchaResponseContact');
                    <?php } ?>
                });
            });
        });
    });
</script>
<?php } ?>



<?php if (!empty($config['oneSignal']['active'])) { ?>
<!-- Js OneSignal -->
<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script type="text/javascript">
var OneSignal = window.OneSignal || [];
OneSignal.push(function() {
    OneSignal.init({
        appId: "<?= $config['oneSignal']['id'] ?>"
    });
});
</script>
<?php } ?>

<!-- Js Structdata -->
<?php include TEMPLATE . LAYOUT . "strucdata.php"; ?>

<!-- Js Addons -->
<?= $addons->set('script-main', 'script-main', 2); ?>
<?= $addons->get(); ?>

<!-- Js Body -->
<?= $func->decodeHtmlChars($setting['bodyjs']) ?>

<script type="text/javascript">
    var placeholderText = ["Nhập từ khóa..."];
    $('#keyword,#keyword-res').placeholderTypewriter({
        text: placeholderText
    });
</script>
<!-- Google translate -->
<?php if (isset($config['LQD']['translate']) && $config['LQD']['translate'] == true) {?>
    <script type="text/javascript">    
        function GoogleLanguageTranslatorInit() {new google.translate.TranslateElement({pageLanguage: 'vi', autoDisplay: false }, 'google_language_translator');}
    </script>
    <script type="text/javascript" src="http://translate.google.com/translate_a/element.js?cb=GoogleLanguageTranslatorInit" async defer></script>
    <script type='text/javascript' src='assets/js/flags.js'></script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<?php } ?>