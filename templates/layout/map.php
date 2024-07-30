
<div class="footer_map_tab">
    <?php if(isset($map_nb) && count($map_nb) > 0) { ?>
        <div class="wrap_map">
            <div class="wrap-content">
                <div class="flex_map d-flex justify-content-center align-items-center flex-wrap">
                    <?php foreach ($map_nb as $k => $v) { ?>
                        <div class="map_items <?=($k==0)?"active":""?> btn btn-primary mx-1 my-1" data-map="<?=$v['id']?>" title="<?=$v['name'.$lang]?>">
                            <?=$v['name'.$lang]?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php }?>
    <div class="map_frame">
        <?=htmlspecialchars_decode($optsetting['coords_iframe'])?>
    </div>
</div>
