<?php
if (isset($this->profile[0])) {
    $client = $this->profile[0];
}
?>
<form id="profile" style="display: <?php print $this->display; ?>;" class="ajaxForm" method="post" action="<?php echo $this->formAction; ?>">
    <fieldset>
        <legend>DATOS DEL PERFIL:</legend>
        <div class="container_input_label">
            <label>NOMBRE</label>
            <input type="text" name="name" placeholder="Nombre" value="<?php @print $client['name']; ?>" />
        </div>
        <div class="container_input_label2">
            <label>DESCRIPCIÓN</label>
            <textarea name="description" placeholder="Añadir Descripción"><?php @print $client['description']; ?></textarea>
        </div>
    </fieldset>
    <div class="container-buttons">
        <label>&nbsp;</label>
        <button class="ui-state-default button_ui buttonbar_close" alt="profile" type="submit">
            <span class="ui-icon ui-icon-disk"></span>
            Guardar Llamado
        </button>
        <button class="ui-state-default button_ui buttonbar_close" alt="profile" type="reset">
            <span class="ui-icon ui-icon-close"></span>
            Cerrar
        </button><br />

        <hr />
    </div>
</form>