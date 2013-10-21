<!--<a href="<?php print PATH_NAV; ?>" class="spritex282 spritex282-MORRALES-pag"></a>
<a href="<?php print PATH_NAV; ?>" class="spritex282 spritex282-PUEBLO-SANO-pag"></a>
<a href="<?php print PATH_NAV; ?>" class="spritex282 spritex282-TANQUES"></a>
<a href="<?php print PATH_NAV; ?>" class="spritex282 spritex282-viviendas-pag"></a>-->
<?php
$data = array_diff($this->imagenes, array('thumbnail','..','.'));
foreach ($data as $key => $value) {
    ?>
    <a href="<?php print PATH_NAV; ?>" class="spritex282"><img src="<?php print PATH_SYSTEM . 'media/images/banner/1/' . $value; ?>"></a>
    <?php
}
?>