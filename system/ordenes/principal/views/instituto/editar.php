<form class="form-horizontal ajaxForm" method="post" action="<?php print PATH_NAV; ?>instituto/editSave/<?php echo $this->instituto[0]['id'] ?>">
    <div class="bs-docs-example">
        <div class="descriptionForm">CREAR INSTITUTO:</div>
        <div class="control-group">
            <label class="control-label" for="nombre">Nombre del Instituto: </label>
            <div class="controls">
                    <input class="span4 required" type="text" name="nombre" value="<?php echo $this->instituto[0]['nombre'] ?>" id="nombre" placeholder="Nombre del Instituto" required>
            </div>
        </div>
        
    </div>
    <button class="btn btn-primary" type="summit">EDITAR INSTITUTO</button>
    <button class="btn btn-info" type="reset">LIMPIAR FORMULARIO</button>
    
</form>
