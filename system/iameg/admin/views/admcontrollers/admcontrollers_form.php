<?php
if (isset($this->admcontrollers[0])) {
    $array = $this->admcontrollers[0];
}
?>
<form id="admcontrollers" style="display: <?php print $this->display; ?>;" class="admcontrollers ajaxForm" method="post" action="<?php echo $this->formAction; ?>">
    <fieldset>
        <legend>DATOS DEL CONTROLADOR:</legend>
        <div class="container_input_label">
            <label>NOMBRE</label>
            <input type="text" name="name" placeholder="Nombre" value="<?php @print $array['name']; ?>" />
        </div>
        <div class="container_input_label2">
            <label>DESCRIPCIÓN</label>
            <textarea name="description" placeholder="Añadir Descripción"><?php @print $array['description']; ?></textarea>
        </div>
    </fieldset>
    <fieldset class="tblFooters">
        <label>&nbsp;</label>
        <button class="ui-state-default button_ui buttonbar_close" alt="admcontrollers" type="submit">
            <span class="ui-icon ui-icon-disk"></span>
            Guardar Controlador
        </button>
        <button class="ui-state-default button_ui buttonbar_close" alt="admcontrollers" type="reset">
            <span class="ui-icon ui-icon-close"></span>
            Cerrar
        </button>
    </fieldset>
</form>
<?php if (isset($this->methodsList)) { ?>
    <form class="admcontrollers-method" style="display: <?php print $this->display; ?>;" method="post" action="<?php echo $this->formActionAddMethod; ?>">
        <fieldset>
            <legend>METODOS:</legend>
            <dl class="listMethodController">
                <?php
                foreach ($this->methodsList as $key => $value) {
                    print '<dt><strong>' . $value['name'] . '</strong> <div ref="' . $value['idmethod'] . '" class="styleLink removeMethod">X</div></dt>';
                }
                ?>
            </dl>
            <div class="container_input_label">
                <label>NOMBRE</label>
                <input type="text" name="name" placeholder="Nombre" value="" />
            </div>
            <button class="ui-state-default button_ui buttonbar_close" alt="admcontrollers-method" type="submit">
                <span class="ui-icon ui-icon-disk"></span>
                Añadir Metodo
            </button>
        </fieldset>
    </form>
<?php } ?>