<div class="photoUpload-zone">
	<div class="photoUpload-detail" id="photo2Upload-preview">
		<?=$func->getImage(['class' => 'rounded', 'size-error' => '250x250x1', 'upload' => $photo2Detail['upload'], 'image' => $photo2Detail['image'], 'alt' => 'Alt Photo'])?>
	</div>
	<label class="photoUpload-file" id="photo2-zone" for="file2-zone">
		<input type="file" name="file2" id="file2-zone">
		<i class="fas fa-cloud-upload-alt"></i>
		<p class="photoUpload-drop">Kéo và thả hình vào đây</p>
		<p class="photoUpload-or">hoặc</p>
		<p class="photoUpload-choose btn btn-sm bg-gradient-success">Chọn hình</p>
	</label>
	<div class="photoUpload-dimension"><?=$photo2Detail['dimension']?></div>
</div>