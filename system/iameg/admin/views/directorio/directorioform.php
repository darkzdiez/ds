<?php @$ad=$this->ad[0]; ?>
<form id="newsform" style="display: <?php print $this->display; ?>;" class="ajaxForm" method="post" action="<?php echo $this->formAction; ?>">
    <fieldset>
        <legend>Agregar Grupo:</legend>
        <div class="container_input_label">
            <label>(<span id="targetnombre<?php @print $this->id; ?>">0</span> de 80) Nombre:</label>
            <input class="nombre" name="nombre" type="text" value="<?php @print $ad['title']; ?>" maxlength="80" id="nombre<?php @print $this->id; ?>" ref="targetnombre<?php @print $this->id; ?>" />
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