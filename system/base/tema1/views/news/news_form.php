<?php
if (isset($this->news[0])) {
    $news = $this->news[0];
}
?>
<form id="newsform" style="display: <?php print $this->display; ?>;" class="ajaxForm paso1" method="post" action="<?php echo $this->formAction; ?>">
    <fieldset class="">
        <legend>DATOS DE LA NOTICIA:</legend>
        <div class="container_input_label2">
            <label>FECHA:</label>
            <input name="date" class="fecha_alt" readonly="readonly" type="text" value="<?php
if (isset($news)) {
    print $news['date'];
} else {
    print date("Y-m-d");
}
?>" />
            <input name="fecha_alt_for" disabled="disabled" class="fecha_alt_for" size="27" type="text" value="Hoy" />
        </div>
        <div class="container_input_label2">
            <label>TEMA:</label>
            <?php
            foreach ($this->category as $key => $value) {
                $data[$value['idcategory']] = $value['name'];
            }
            $form = new Form();
            $select = $form->printSelect('category', $data, @$news['category']);
            print $select;
            /* Aqui llamo las categorias de localizacion */
            unset($data);
            foreach ($this->location as $key => $value) {
                $data[$value['idcategory']] = $value['name'];
            }
            $select = $form->printSelect('location', $data, @$news['location']);
            print $select;
            ?>
        </div>
        <div class="container_input_label">
            <label>DESTACADO:</label>
            <select name="prominent">
                <option value="0">No</option>
                <option value="1"<?php
                if (isset($news) and $news['prominent'] == 1) {
                    print ' selected="selected"';
                }
                ?>>Si</option>
            </select>
        </div>
    </fieldset>
    <fieldset>
        <legend>CONTENIDO:</legend>
        <div class="container_input_label2 ">
            <label>TÍTULO:</label>
            <textarea name="title" placeholder=""><?php @print $news['title']; ?></textarea>
        </div>
        <div class="container_input_label2 ">
            <label>SUMARIO:</label>
            <textarea name="summary" placeholder=""><?php @print $news['summary']; ?></textarea>
        </div>
    </fieldset>
    <?php if(isset($this->proceso) && $this->proceso=='agregar'){ ?>
    <fieldset class="tblFooters">
        <label>&nbsp;</label>
        <button class="ui-state-default button_ui " alt="newsform" type="submit">
            <span class="ui-icon ui-icon-disk"></span>
            Guardar Noticia
        </button>
        <button class="ui-state-default button_ui" alt="newsform" type="reset">
            <span class="ui-icon ui-icon-close"></span>
            Limpiar
        </button>
    </fieldset>
    <?php }else{ ?>
    <fieldset>
        <legend>CUERPO:</legend>
        <div class="container_input_label2 " id="containerContent">
            <label>&nbsp;</label>
            <textarea class="tinymce" name="content" placeholder=""><?php @print $news['content']; ?></textarea>
        </div>
    </fieldset>
    <fieldset class="tblFooters">
        <label>&nbsp;</label>
        <button class="ui-state-default button_ui buttonbar_close" alt="newsform" type="submit">
            <span class="ui-icon ui-icon-disk"></span>
            Guardar Cambios
        </button>
        <button class="ui-state-default button_ui buttonbar_close" alt="newsform" type="reset">
            <span class="ui-icon ui-icon-close"></span>
            Cerrar
        </button>
    </fieldset>
    <?php } ?>
</form>
<form id="newsform2" style="display: <?php print $this->display2; ?>;" class="ajaxForm paso2" method="post" action="<?php echo $this->formAction2; ?>">
    <fieldset>
        <legend>CUERPO:</legend>
        <div class="container_input_label2 " id="containerContent">
            <label>&nbsp;</label>
            <textarea class="tinymce" name="content" placeholder=""></textarea>
            <input type="hidden" name="idnews" id="idnews" value="0">
        </div>
    </fieldset>
    <fieldset class="tblFooters">
        <label>&nbsp;</label>
        <button class="ui-state-default button_ui " alt="newsform" type="submit">
            <span class="ui-icon ui-icon-disk"></span>
            Guardar Cuerpo
        </button>
        <button class="ui-state-default button_ui" alt="newsform" type="reset">
            <span class="ui-icon ui-icon-close"></span>
            Limpiar
        </button>
    </fieldset>
</form>