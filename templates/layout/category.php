<div class="box-sticky">
    <div class="category-box">
        <div class="title-category b-gradient"><span><i class="fas fa-bars"></i> Danh mục sản phẩm</span></div>
        <ul class="box_category_list">
			<?php foreach ($splistmenu as $key => $value) {
				$menucat = $cache->get("select name$lang, slugvi, slugen, id from #_product_cat where type = ? and id_list = ? and find_in_set('hienthi',status) order by numb,id desc", array('san-pham', $value['id']), 'result', 7200);
				?>
				<li><a href="<?=$value['slugvi']?>" class="d-flex justify-content-start align-items-center"><i class="fa-light fa-angles-right"></i><?=$value['name'.$lang]?></a>
					<?php 
					if(count($menucat)){
						echo '<ul>';
					foreach ($menucat as $key => $val) {?>
						<li class="sanpham-cat"><a href="<?=$val['slugvi']?>" class="d-flex justify-content-start align-items-center"><i class="fa-light fa-angles-right"></i><?=$val['name'.$lang]?></a></li>
					<?php }
					
					echo '</ul>';
					echo '<span class="toggle"><span><i class="fa-solid fa-minus"></i></span></span>';
					}
					?>
				</li>
			<?php } ?>
		</ul>
    </div>
</div>

