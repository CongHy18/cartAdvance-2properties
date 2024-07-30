<?php 
    $linkFilter = "./".@$lang_filter;
    $khoanggia = $cache->get("select price_from, price_to, name$lang from #_news where type = ? and find_in_set('hienthi',status) order by numb,id desc", array('khoang-gia'), 'result', 7200);
?>
<div class="menu_box">
    <div class="form-row align-items-center">
        <div class="col-10">
            <div class="title-filter bold"> Bộ lọc </div>
        </div>
        <div class="col-2">
            <div class="btn-fil text-right">
                <i class="fa-solid fa-filter-list i-menu"></i>
            </div>
        </div>
    </div>

    <div class="menu_box_ul mt-3">

        <form class="form-filter mgb30" method="post" action="" enctype="multipart/form-data">

        <?php /*
            <div class="filter-sort filter-only mb-3">
                <label class="name-filter" for="Sắp xếp">Sắp xếp</label>
                <label class="container">Giá tăng dần<input type="checkbox" name="sort_1" value="1"
                        <?= (isset($_REQUEST['1']) && ('1' == $_REQUEST['sort_'.'1'])) ? "checked" : '' ?>>
                    <span class="checkmark"></span>
                </label>
                <label class="container">Giá giảm dần<input type="checkbox" name="sort_2" value="2"
                        <?= (isset($_REQUEST['2']) && ('2' == $_REQUEST['sort_'.'2'])) ? "checked" : '' ?>>
                    <span class="checkmark"></span>
                </label>
            </div>

            <?php if(!empty($khoanggia)){ ?>
            <div class="filter-price  mb-3">
                <label class="name-filter" for="Mức giá">Mức giá</label>
                <?php foreach ($khoanggia as $k => $v) { ?>
                <label class="container"><?=$v['name'.$lang]?> <input type="checkbox" name="range_<?=$k?>"
                        value="<?=$v['price_from']?>-<?=$v['price_to']?>"
                        <?= (isset($_REQUEST['range_'.$k]) && (($v['price_from'] - $v['price_to']) == $_REQUEST['range_'.$k])) ? "checked" : '' ?>>
                    <span class="checkmark"></span>
                </label>
                <?php } ?>
            </div>
            <?php }?>
            <?php if(!empty($productSize)){ ?>
            <div class="filter-size mb-3">
                <label class="name-filter" for="Kích thước">Kích thước</label>
                <?php foreach ($productSize as $k => $v) { ?>
                <label class="container"><?=$v['name'.$lang]?><input type="checkbox" name="size_<?=$v['id']?>"
                        value="<?=$v['id']?>"
                        <?= (isset($_REQUEST[$v['id']]) && ($v['id'] == $_REQUEST['size_'.$v['id']])) ? "checked" : '' ?>>
                    <span class="checkmark"></span>
                </label>
                <?php }?>
            </div>
            <?php }?>
            <?php if(!empty($productColor)){ ?>
            <div class="filter-color mb-3">
                <label class="name-filter" for="Màu sắc">Màu sắc</label>
                <?php foreach ($productColor as $k => $v) { ?>
                <label class="container"><?=$v['name'.$lang]?><input type="checkbox" name="color_<?=$v['id']?>"
                        value="<?=$v['id']?>"
                        <?= (isset($_REQUEST[$v['id']]) && ($v['id'] == $_REQUEST['color_'.$v['id']])) ? "checked" : '' ?>>
                    <span class="checkmark"></span>
                </label>
                <?php }?>
            </div>
            <?php }?>
*/?>
            <?php if(!empty($brand)){ ?>
            <div class="filter-brand">
                <label class="name-filter" for="Thương hiệu">Thương hiệu</label>
                <?php foreach ($brand as $k => $v) { ?>
                <label class="container"><?=$v['name'.$lang]?><input type="checkbox" name="brand_<?=$v['id']?>"
                        value="<?=$v['id']?>"
                        <?= (isset($_REQUEST[$v['id']]) && ($v['id'] == $_REQUEST['brand_'.$v['id']])) ? "checked" : '' ?>>
                    <span class="checkmark"></span>
                </label>
                <?php }?>
            </div>
            <?php }?>
        </form>
    </div>
</div>

<style>
    .container{display:block;position:relative;padding-left:20px;margin-bottom:12px;cursor:pointer;-moz-user-select:none;-ms-user-select:none;user-select:none}
    .container input{position:absolute;opacity:0;cursor:pointer}
    .container input:checked~.checkmark{background-color:#fff}
    .container input:checked~.checkmark:after{display:block}
    .checkmark{position:absolute;top:50%;left:0;height:15px;width:15px;border:1px solid #eee;border-radius:50%;transform:translateY(-50%)}
    .checkmark:after{content:"";position:absolute;display:none}
    .container .checkmark::after{background:url(./assets/images/tick.png)!important;background-size:100% 100%!important;width:100%;height:100%}
    .title-filter{font-family:var(--f-bold);font-size:22px;color:var(--color-main)}
    .name-filter{font-family:var(--f-bold);background-color:#eee;display:block;padding:8px 15px}
    .btn-fil i{font-size:20px;color:var(--color-main)}
</style>
