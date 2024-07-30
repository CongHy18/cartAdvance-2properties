<div class="menu-res">
    <div class="menu-bar-res">
        <div class="search search-res-w100 w-clear">
            <input type="text" id="keyword-res" placeholder="<?= nhaptukhoatimkiem ?>"
            onkeypress="doEnter(event,'keyword-res');" />
            <p onclick="onSearch('keyword-res');"><i class="fas fa-search"></i></p>
        </div>
        <a id="hamburger" class="mmenu-menu-mobile" href="#menu" title="Menu"><span></span></a>
        <?php /* ?>
        <div class="search-res">
            <p class="icon-search transition"><i class="fa fa-search"></i></p>
            <div class="search-grid w-clear">
                <input type="text" name="keyword-res" id="keyword-res" placeholder="<?= nhaptukhoatimkiem ?>"
                    onkeypress="doEnter(event,'keyword-res');" />
                <p onclick="onSearch('keyword-res');"><i class="fa fa-search"></i></p>
            </div>
        </div>
        <?php */?>
    </div>
    <div class="opacity-menu"></div>
    <div class="mmenu-fixwidth">
        <div class="section wrap-menu">
            <div class="logos-menu text-center">
                <a class="logo-menu" href="">
                    <?= $func->getImage(['sizes' => '120x100x2', 'upload' => UPLOAD_PHOTO_L, 'image' => $logo['photo'], 'alt' => $setting['name' . $lang]]) ?>
                </a>
            </div>
            <nav class="nav-menu">
                <ul>
                    <li><a class="<?php if ($com == '' || $com == 'index') echo 'active'; ?> transition" href=""
                            title="<?= trangchu ?>"><?= trangchu ?></a></li>

                    <li><a class="<?php if ($com == 'gioi-thieu') echo 'active'; ?> transition" href="gioi-thieu"
                            title="<?= gioithieu ?>"><?= gioithieu ?></a></li>

                    <li>
                        <a class="has-child <?php if ($com == 'san-pham') echo 'active'; ?> transition" href="san-pham"
                            title="<?= sanpham ?>"><?= sanpham ?></a>
                        <?php if (count($splist)) { ?>
                        <span class="btn-dropdown-menu "></span>
                        <ul class="none">
                            <?php foreach ($splist as $klist => $vlist) {
                            $spcat = $d->rawQuery("select name$lang, slugvi, slugen, id from #_product_cat where id_list = ? and find_in_set('hienthi',status) order by numb,id desc", array($vlist['id'])); ?>
                            <li>
                                <a class="has-child transition" title="<?= $vlist['name' . $lang] ?>"
                                    href="<?= $vlist[$sluglang] ?>"><?= $vlist['name' . $lang] ?></a>
                                <?php if (!empty($spcat)) { ?>
                                <span class="btn-dropdown-menu "></span>
                                <ul class="none">
                                    <?php foreach ($spcat as $kcat => $vcat) {
                                            $spitem = $d->rawQuery("select name$lang, slugvi, slugen, id from #_product_item where id_cat = ? and find_in_set('hienthi',status) order by numb,id desc", array($vcat['id'])); ?>
                                    <li>
                                        <a class="has-child transition" title="<?= $vcat['name' . $lang] ?>"
                                            href="<?= $vcat[$sluglang] ?>"><?= $vcat['name' . $lang] ?></a>
                                        <?php if (!empty($spitem)) { ?>
                                        <span class="btn-dropdown-menu "></span>
                                        <ul class="none">
                                            <?php foreach ($spitem as $kitem => $vitem) {
                                                            $spsub = $d->rawQuery("select name$lang, slugvi, slugen, id from #_product_sub where id_item = ? and find_in_set('hienthi',status) order by numb,id desc", array($vitem['id'])); ?>
                                            <li>
                                                <a class="has-child transition" title="<?= $vitem['name' . $lang] ?>"
                                                    href="<?= $vitem[$sluglang] ?>"><?= $vitem['name' . $lang] ?></a>
                                                <?php if (!empty($spsub)) { ?>
                                                <span class="btn-dropdown-menu "></span>
                                                <ul class="none">
                                                    <?php foreach ($spsub as $ksub => $vsub) { ?>
                                                    <li>
                                                        <a class="transition" title="<?= $vsub['name' . $lang] ?>"
                                                            href="<?= $vsub[$sluglang] ?>"><?= $vsub['name' . $lang] ?></a>
                                                    </li>
                                                    <?php } ?>
                                                </ul>
                                                <?php } ?>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                        <?php } ?>
                                    </li>
                                    <?php } ?>
                                </ul>
                                <?php } ?>
                            </li>
                            <?php } ?>
                        </ul>
                        <?php } ?>
                    </li>

                    <li>
                        <a class="has-child <?php if ($com == 'tin-tuc') echo 'active'; ?> transition" href="tin-tuc"
                            title="<?= tintuc ?>"><?= tintuc ?></a>
                        <?php if (count($dvlist)) { ?>
                       <ul class="none">
                            <?php foreach ($dvlist as $klist => $vlist) {
                            $ttcat = $d->rawQuery("select name$lang, slugvi, slugen, id from #_news_cat where id_list = ? and find_in_set('hienthi',status) order by numb,id desc", array($vlist['id'])); ?>
                            <li>
                                <a class="has-child transition" title="<?= $vlist['name' . $lang] ?>"
                                    href="<?= $vlist[$sluglang] ?>"><?= $vlist['name' . $lang] ?></a>
                                <?php if (!empty($ttcat)) { ?>
                               <ul class="none">
                                    <?php foreach ($ttcat as $kcat => $vcat) {
                                            $ttitem = $d->rawQuery("select name$lang, slugvi, slugen, id from #_news_item where id_cat = ? and find_in_set('hienthi',status) order by numb,id desc", array($vcat['id'])); ?>
                                    <li>
                                        <a class="has-child transition" title="<?= $vcat['name' . $lang] ?>"
                                            href="<?= $vcat[$sluglang] ?>"><?= $vcat['name' . $lang] ?></a>
                                        <?php if (!empty($ttitem)) { ?>
                                       <ul class="none">
                                            <?php foreach ($ttitem as $kitem => $vitem) {
                                                            $ttsub = $d->rawQuery("select name$lang, slugvi, slugen, id from #_news_sub where id_item = ? and find_in_set('hienthi',status) order by numb,id desc", array($vitem['id'])); ?>
                                            <li>
                                                <a class="has-child transition" title="<?= $vitem['name' . $lang] ?>"
                                                    href="<?= $vitem[$sluglang] ?>"><?= $vitem['name' . $lang] ?></a>
                                                <?php if (!empty($ttsub)) { ?>
                                               <ul class="none">
                                                    <?php foreach ($ttsub as $ksub => $vsub) { ?>
                                                    <li>
                                                        <a class="transition" title="<?= $vsub['name' . $lang] ?>"
                                                            href="<?= $vsub[$sluglang] ?>"><?= $vsub['name' . $lang] ?></a>
                                                    </li>
                                                    <?php } ?>
                                                </ul>
                                                <?php } ?>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                        <?php } ?>
                                    </li>
                                    <?php } ?>
                                </ul>
                                <?php } ?>
                            </li>
                            <?php } ?>
                        </ul>
                        <?php } ?>
                    </li>

                    <li><a class="<?php if ($com == 'tuyen-dung') echo 'active'; ?> transition" href="tuyen-dung"
                            title="<?= tuyendung ?>"><?= tuyendung ?></a></li>

                    <li><a class="<?php if ($com == 'thu-vien-anh') echo 'active'; ?> transition" href="thu-vien-anh"
                            title="<?= thuvienanh ?>"><?= thuvienanh ?></a></li>

                    <li><a class="<?php if ($com == 'video') echo 'active'; ?> transition" href="video"
                            title="Video">Video</a>
                    </li>

                    <li><a class="<?php if ($com == 'lien-he') echo 'active'; ?> transition" href="lien-he"
                            title="<?= lienhe ?>"><?= lienhe ?></a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>



<?php /*?>
Thêm none vào class ul
<?php */ ?>