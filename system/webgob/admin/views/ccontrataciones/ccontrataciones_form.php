<?php
if (isset($this->ccontrataciones[0])) {
    $client = $this->ccontrataciones[0];
}
?>
<form id="ccontrataciones" style="display: <?php print $this->display; ?>;" method="post" enctype="multipart/form-data" target="AjaxIframeUpload" action="<?php echo $this->formAction; ?>">
    <fieldset>
        <legend>DATOS DEL LLAMADO:</legend>
        <div class="container_input_label">
            <label>TITULO</label>
            <input type="text" name="titulo" placeholder="" value="<?php @print $client['titulo']; ?>" />
        </div>
        <div class="container_input_label2">
            <label>ARTICULO</label>
            <textarea name="articulo" class="tinymce" placeholder=""><?php @print comVal::emptyPrint($client['articulo'], 'MECANISMO QUE RIGE SEGÚN ATÍCULO 56 NUMERAL 1: Acto Único de recepción y apertura de sobres contentivos de: manifestación de voluntad de participar, documentos de Calificación y Ofertas.'); ?></textarea>
        </div>
        <div class="container_input_label2">
            <label>DENOMINACIÓN DEL PROCESO</label>
            <textarea name="denominacion" placeholder=""><?php @print comVal::emptyPrint($client['denominacion'], ''); ?></textarea>
        </div>
        <div class="container_input_label">
            <label>ACTIVIDAD</label>
            <input type="text" name="actividad" placeholder="" value="<?php @print $client['actividad']; ?>" />
        </div>
        <div class="container_input_label">
            <label>ENTE CONTRATANTE</label>
            <input type="text" name="ente" placeholder="Prosalud" value="<?php @print $client['ente']; ?>" />
        </div>
    </fieldset>
    <fieldset>
        <legend>SUBIR PDF:</legend>
        <div class="container_input_label">
            <label>ARCHIVO</label>
            <input name="file" readonly="readonly" type="file" value=""/>
        </div>
    </fieldset>
    <div class="container-buttons">
        <label>&nbsp;</label>
        <button class="ui-state-default button_ui buttonbar_close" alt="ccontrataciones" type="submit">
            <span class="ui-icon ui-icon-disk"></span>
            Guardar Llamado
        </button>
        <button class="ui-state-default button_ui buttonbar_close" alt="ccontrataciones" type="reset">
            <span class="ui-icon ui-icon-close"></span>
            Cerrar
        </button><br />

        <hr />
    </div>
</form>