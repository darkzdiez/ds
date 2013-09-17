<?php @$ad=$this->ad[0]; ?>
<form id="newsform" style="display: <?php print $this->display; ?>;" enctype="multipart/form-data" target="AjaxIframeUpload" method="post" action="<?php echo $this->formAction; ?>">
    <fieldset>
        <legend>Cargar Imagen:</legend>
        <div class="container_input_label">
            <label>(<span id="targettoptitle<?php print $this->id; ?>">0</span> de 80) Antetitulo:</label>
            <input class="toptitle" name="toptitle" type="text" value="<?php @print $ad['toptitle']; ?>" maxlength="80" id="toptitle<?php print $this->id; ?>" ref="targettoptitle<?php print $this->id; ?>" />
        </div>
        <div class="container_input_label">
            <label>(<span id="targettitle<?php print $this->id; ?>">0</span> de 80) Titulo:</label>
            <input class="title" name="title" type="text" value="<?php @print $ad['title']; ?>" maxlength="80" id="title<?php print $this->id; ?>" ref="targettitle<?php print $this->id; ?>" />
        </div>
        <div class="container_input_label2">
            <label>(<span id="targetdescription<?php print $this->id; ?>">0</span> de 250) Descripcion:</label>
            <textarea class="description" name="description" placeholder="" maxlength="250" ref="targetdescription<?php print $this->id; ?>"><?php @print $ad['description']; ?></textarea>
        </div>
        <div class="container_input_label2">
            <label>Foto:</label>
            <input name="file" readonly="readonly" type="file" value="" />
            <div style="margin: 6px 0 0">(900px × 450px) Max 200Kb</div>
        </div>
        <div class="container_input_label">
            <label for="dtexto">Desabilitar Texto:</label>
            <?php
            if(isset($ad['dtexto']) AND $ad['dtexto']==1){
                $checked="checked";
            }else{
                $checked="";
            }
            ?>
            <input type="checkbox" name="dtexto" id="dtexto" value="1" <?php print $checked; ?>>
        </div>
    </fieldset>
    <?php if ($this->action == 'edit') { ?>
        <fieldset class="tblFooters">
            <label>&nbsp;</label>
            <button class="ui-state-default button_ui buttonbar_close AjaxIframeUpload" alt="newsform" type="submit">
                <span class="ui-icon ui-icon-disk"></span>
                Editar
            </button>
        </fieldset>
    <?php } else { ?>
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
    <?php } ?>
</form>