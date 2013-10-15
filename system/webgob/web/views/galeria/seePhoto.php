<script type="text/javascript">
    $(document).ready(function(){
        $(".yoxview").yoxview({
            lang: "en",
            autoPlay: true
        });
    });
</script>
<div class="thumbnails yoxview">
    <?php
    $data = array_diff($this->photos, array('thumbnail','..','.'));
    foreach ($data as $key => $value) {
        ?>
        <a href="<?php print PATH_SYSTEM . 'media/images/galeria/' . $this->idGaleria . '/' . $value; ?>"><img src="<?php print PATH_SYSTEM . 'media/images/galeria/' . $this->idGaleria . '/thumbnail/' . $value; ?>" alt="First" title="<?php print htmlspecialchars($this->data[0]['name']);?>" /></a>
        <?php
    }
    ?>
</div>