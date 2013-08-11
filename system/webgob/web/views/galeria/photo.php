<?php
$results = GaleriaModel::singleList();
while ($result = mysql_fetch_array($results['result'], MYSQL_ASSOC)) {
    $imgPpal = GaleriaModel::showPpalImg($result['idgallery']);
    ?>
    <a href="<?php print URL . 'galeria/seephoto/' . $result['idgallery']; ?>" class="photoGallery" style="background-image: url('<?php print URL . $imgPpal['location'] . $imgPpal['filename']; ?>'">
        <div class="infoPanel"><?php print strtoupper($result['name']); ?></div>
    </a>
<?php } ?>
