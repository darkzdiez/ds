<?php
$results = $this->model->singleList();
foreach ($results['result'] as $key => $result) {
    $imgPpal = $this->model->showPpalImg($result['idgallery']);
    ?>
    <a href="<?php print PATH_NAV . 'galeria/seephoto/' . $result['idgallery']; ?>" class="photoGallery" style="background-image: url('<?php print PATH_SYSTEM . $imgPpal[0]['location'] . $imgPpal[0]['filename']; ?>'">
        <div class="infoPanel"><?php print strtoupper($result['name']); ?></div>
    </a>
<?php } ?>
