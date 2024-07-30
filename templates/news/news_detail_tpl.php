<div class="title-main"><span><?= $rowDetail['name' . $lang] ?></span></div>
<div class="time-main"><i class="fas fa-calendar-week"></i><span><?= ngaydang ?>: <?= date("d/m/Y h:i A", $rowDetail['date_created']) ?></span></div>
<?php if (!empty($rowDetail['content' . $lang])||!empty($rowDetail['file_attach'])) { ?>
    <?php if ((isset($config['LQD']['toc']) && $config['LQD']['toc'] == true) && ( $config['LQD']['tocvip'] == false)) { ?>
    <!-- Menu  -->
    <div class="meta-toc">
        <div class="box-readmore">
            <ul class="toc-list" ></ul>
        </div>
    </div>
    <?php } ?>
    
    <div id="ftwp-postcontent">
        <?php if (isset($config['LQD']['tocvip']) && $config['LQD']['tocvip'] == true) { ?>
        <div id="ftwp-container-outer" class="ftwp-in-post ftwp-float-none" style="height: auto;">
            <div id="ftwp-container" class="ftwp-wrap ftwp-middle-right ftwp-minimize">
                <button type="button" id="ftwp-trigger" class="ftwp-shape-round ftwp-border-medium"><span class="ftwp-trigger-icon ftwp-icon-menu"></span></button>
                <nav id="ftwp-contents" class="ftwp-shape-round ftwp-border-thin" data-colexp="collapse" style="height: auto;"> </nav>
            </div>
        </div>
        <?php } ?>
        <div class="content-main w-clear img-auto" id="toc-content"><?=htmlspecialchars_decode($rowDetail['content'.$lang])?></div>
    </div>



    <?php if (!empty($rowDetail['file_attach'])) { ?>
        <!-- Tacalogy -->
        <div class="file bg-light py-2 px-3 rounded">
            <b class="mr-2">Download file:</b>
            <a class="btn btn-link text-secondary" href="<?= UPLOAD_FILE_L . @$rowDetail['file_attach'] ?>" target="_blank"><i class="fa-duotone fa-file mr-2"></i><?=$rowDetail['namefile']?></a>
        </div>
    <?php } ?>
    <div class="share">
        <b><?= chiase ?>:</b>
        <div class="social-plugin w-clear">
            <?php
            $params = array();
            $params['oaid'] = $optsetting['oaidzalo'];
            echo $func->markdown('social/share', $params);
            ?>
        </div>
    </div>
<?php } else { ?>
    <div class="alert alert-warning w-100" role="alert">
        <strong><?= noidungdangcapnhat ?></strong>
    </div>
<?php } ?>


<?php if (!empty($news)) { ?>
    <div class="share othernews mb-3">
        <b><?= baivietkhac ?>:</b>
        <ul class="list-news-other">
            <?php foreach ($news as $k => $v) { ?>
                <li><a class="text-decoration-none" href="<?= $v[$sluglang] ?>" title="<?= $v['name' . $lang] ?>"><?= $v['name' . $lang] ?> - <?= date("d/m/Y", $v['date_created']) ?></a></li>
            <?php } ?>
        </ul>
        <div class="pagination-home w-100"><?= (!empty($paging)) ? $paging : '' ?></div>
    </div>
<?php } ?>

