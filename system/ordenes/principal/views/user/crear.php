<form class="form-horizontal ajaxForm" method="post" action="<?php print PATH_NAV; ?>user/guardarcrear">
    <div class="bs-docs-example">
        <div class="descriptionForm">CREAR USUARIO:</div>
        <div class="control-group">
            <label class="control-label" for="nombres">Nombre y Apellido: </label>
            <div class="controls">
                    <input class="span4 required" type="text" name="nombres" id="nombres" placeholder="Nombre Apellido" required>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="perfil">Perfil: </label>
            <div class="controls">
                    <select class="span4 required" id="perfil" name="perfil" required>
                        <option value="">Seleccione</option>
                        <option value="1">Administrador</option>
                        <option value="2">Inspector Orden</option>
                        <option value="3">Usuario Orden</option>
                    </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="instituto">Institución: </label>
            <div class="controls">
                    <select class="span4 required" id="instituto" name="instituto" required>
                        <option value="">Seleccione</option>
                        <?php foreach ($this->institutos as $key => $value) {
                        print '<option value="'.$value['id'].'">'.$value['nombre'].'</option>';
                        } ?>
                    </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="email">Correo Electronico: </label>
            <div class="controls">
                    <input class="span4 required" type="text" name="email" id="email" placeholder="ejemplo@empresa.com" value="" required>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="cargo">Cargo: </label>
            <div class="controls">
                    <input class="span4 required" type="text" name="cargo" id="cargo" placeholder="Secretario | Presidente | Director" value="" required>
            </div>
        </div>
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