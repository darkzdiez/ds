<?php
$results = $this->model->singleList();
foreach ($results['result'] as $key => $result) {
	$dir='system/webgob/media/images/galeria/' . $result['idgallery'];
	if (is_dir($dir)) {
		$photo = scandir($dir);
		$photo = array_values(array_diff($photo, array('thumbnail','..','.')));
	    //$imgPpal = $this->model->showPpalImg($result['idgallery']);
		?>
		<a href="<?php print PATH_NAV . 'galeria/seephoto/' . $result['idgallery']; ?>" class="photoGallery" style="background-image: url('<?php print PATH_SYSTEM . 'media/images/galeria/' . $result['idgallery'] . '/' . $photo[0]; ?>')">
			<div class="infoPanel"><?php print strtoupper($result['name']); ?></div>
		</a>
		<?php
	}
}
?>
