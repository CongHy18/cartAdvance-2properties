<?php
	include "config.php";
	
	$idMap = (isset($_GET['idMap']) && $_GET['idMap'] > 0) ? htmlspecialchars($_GET['idMap']) : 0;
	$row_detail = $d->rawQueryOne("select desc$lang from #_news where id = ? and type = ? limit 0,1",array($idMap,'chi-nhanh'));
?>
<?php if($row_detail) { ?>
    <?=htmlspecialchars_decode($row_detail['desc'.$lang])?>
<?php } else { ?>
	<?=htmlspecialchars_decode($optsetting['coords_iframe'])?>
<?php } ?>