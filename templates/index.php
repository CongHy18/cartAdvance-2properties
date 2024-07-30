<?php /* $start_timestamp = microtime(true); */?>
<!DOCTYPE html>
<html lang="<?= $config['website']['lang-doc'] ?>">

<head>
    <?php include TEMPLATE . LAYOUT . "head.php"; ?>
    <?php include TEMPLATE . LAYOUT . "css.php"; ?>
</head>

<body>
    <div class="wrap-container">
    <?php
    include TEMPLATE . LAYOUT . "seo.php";
    include TEMPLATE . LAYOUT . "header.php";
    include TEMPLATE . LAYOUT . "menu.php";
    include TEMPLATE . LAYOUT . "mmenu.php";
    if ($source == 'index') include TEMPLATE . LAYOUT . "slide.php";
    else include TEMPLATE . LAYOUT . "breadcrumb.php";
    ?>
    <div class="<?= ($source == 'index') ? 'wrap-home' : 'wrap-main' ?> w-clear">
        <?php include TEMPLATE . $template . "_tpl.php"; ?>
    </div>
    <?php
    include TEMPLATE . LAYOUT . "footer.php";
    // include TEMPLATE . LAYOUT . "loading.php";
    if($deviceType=='mobile') include TEMPLATE.LAYOUT."phone.php";
    else include TEMPLATE . LAYOUT . "phone_pc.php";
    include TEMPLATE . LAYOUT . "modal.php";
    include TEMPLATE . LAYOUT . "js.php";
    ?>
    </div>
</body>

</html>
<?php /*$end_timestamp = microtime(true);
$duration = $end_timestamp - $start_timestamp;
print("Execution took " . $duration . " milliseconds."); */?>