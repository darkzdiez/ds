<form class="form-horizontal ajaxForm" method="post" action="<?php print PATH_NAV; ?>perfil/guardareditar">
    <div class="bs-docs-example">
        <div class="descriptionForm">EDITAR TU PERFIL:</div>
        <div class="control-group">
            <label class="control-label" for="nombres">Nombre y Apellido: </label>
            <div class="controls">
                    <input class="span4 required" type="text" name="nombres" id="nombres" placeholder="Nombre Apellido" value="<?php print $this->usuario[0]['nombres']; ?>" required>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="email">Correo Electronico: </label>
            <div class="controls">
                    <input class="span4 required" type="text" name="email" id="email" placeholder="ejemplo@empresa.com" value="<?php print $this->usuario[0]['email']; ?>" required>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="cargo">Cargo: </label>
            <div class="controls">
                    <input class="span4 required" type="text" name="cargo" id="cargo" placeholder="Secretario | Presidente | Director" value="<?php print $this->usuario[0]['cargo']; ?>" required>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="instituto">Institución: </label>
            <div class="controls">
                    <select class="span4 required" id="instituto" name="instituto" required>
                        <option value="">Seleccione</option>
                        <?php foreach ($this->institutos as $key => $value) {
                            $select="";
                            if($this->usuario[0]['id_instituto']==$value['id']){
                                $select=" selected";
                            }
                            print '<option value="'.$value['id'].'"' . $select . '>'.$value['nombre'].'</option>';
                        } ?>
                    </select>
            </div>
        </div>
    </div>
    <button class="btn btn-primary" type="summit">EDITAR PERFIL</button>
    
</form>
<form class="form-horizontal ajaxForm" method="post" action="<?php print PATH_NAV; ?>perfil/guardareditarclave">
    <div class="bs-docs-example">
        <div class="descriptionForm">Cambiar Clave:</div>
        <div class="control-group">
            <label class="control-label" for="password">Clave: </label>
            <div class="controls">
                    <input class="span4 required" type="password" name="password" id="password" placeholder=".........." required>
            </div>
        </div>
    </div>
    <button class="btn btn-primary" type="summit">CAMBIAR CLAVE</button>
</form>
<script>    
    $(function() {
        $('#spanfecha').datetimepicker({
            language: 'es-VE'
        });
    });
</script>