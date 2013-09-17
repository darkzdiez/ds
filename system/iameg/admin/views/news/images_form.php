<?php
$images = $this->images;
?>
<form id="newsform" style="display: <?php print $this->display; ?>;" enctype="multipart/form-data" target="AjaxIframeUpload" method="post" action="<?php echo $this->formAction; ?>">
    <fieldset>
        <legend>Otras Imagenes:</legend>
        <ol id="images">
            <?php
            foreach ($images as $key => $value) {
                ?>
                    <li style="margin-left: 40px;"><img style="max-width: 100px; max-height: 100px;" src="<?php print PATH_SYSTEM . 'media/images/news/' . $value['article_idarticle'] . '/' . $value['filename']; ?>" alt=""><?php if($value['idfile']!=$value['main_idfile']){ ?> <div ref="<?php print $this->idnews.'/'.$value['idfile']; ?>" class="styleLink defaultImg">Predeterminada</div><?php } ?> <div ref="<?php print $value['idfile']; ?>" class="styleLink deleteImg">x</div></li>
                    <?php
            }
            ?>
        </ol>
    </fieldset>
    <fieldset>
        <legend>Cargar Imagen:</legend>
        <div class="container_input_label">
            <label>Foto:</label>
            <input name="file" readonly="readonly" type="file" value="" style="width:50px;" />
        </div>
    </fieldset>
    <fieldset class="tblFooters">
        <label>&nbsp;</label>
        <button class="ui-state-default button_ui buttonbar_close AjaxIframeUpload" alt="newsform" type="submit">
            <span class="ui-icon ui-icon-disk"></span>
            Agregar
        </button>
        <button class="ui-state-default button_ui buttonbar_close" alt="newsform" type="reset">
            <span class="ui-icon ui-icon-close"></span>
            Cerrar
        </button>
    </fieldset>
</form>