<form class="form-horizontal ajaxForm" method="post" action="<?php print PATH_NAV; ?>user/guardarcrear">
    <div class="bs-docs-example">
        <div class="descriptionForm">CREAR USUARIO:</div>
      <div class="control-group">
            <label class="control-label" for="login">Usuario: </label>
            <div class="controls">
                    <input class="span4 required" type="text" name="login" id="login" placeholder="Nombre de usuario" required>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="password">Clave: </label>
            <div class="controls">
                    <input class="span4 required" type="password" name="password" id="password" placeholder=".........." required>
            </div>
        </div>
    </div>
    <button class="btn btn-primary" type="summit">GUARDAR ORDEN</button>
    <button class="btn btn-info" type="reset">LIMPIAR FORMULARIO</button>
    
</form>
<script>    
    $(function() {
        $('#spanfecha').datetimepicker({
            language: 'es-VE'
        });
    });
</script>