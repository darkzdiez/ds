<h1><i class="icon icon-phone"></i> Centro de Soporte y Sugerencias.</h1>
<form id="formCrearOrden" class="form-horizontal ajaxForm" method="post" action="<?php print PATH_NAV; ?>orden/guardarorden">
    <div class="bs-docs-example">
        <div class="descriptionForm">Dejanos un Mensaje:</div>
        <div class="control-group">
            <label class="control-label" for="dependencia1">Con quien Comunicarse: </label>
            <div class="controls">
                    <select class="span4 required" id="responsable" name="responsable" required>
                        <option value="1">Cuerpo de Inspectores</option>
                        <option value="2">Dirección de Informática</option>
                    </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="marca">Asunto: </label>
            <div class="controls">
                    <input class="span4 required" type="text" name="asunto" id="asunto" placeholder="Asunto del Mensaje" required>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="marca">Descripción: </label>
            <div class="controls">
                    <textarea class="span4 required" type="text" name="descripcion" id="descripcion" placeholder="Cuerpo del Mensaje" required></textarea>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="medio">Grado de Importancia: </label>
            <div class="controls">
                    <select class="span4 required" id="medio" name="medio" required>
                        <option value="1">Normal</option>
                        <option value="2">Alta</option>
                    </select>
            </div>
        </div>
    </div>
    <button class="btn btn-danger" type="summit">ENVIAR MENSAJE</button>
    <button class="btn btn-warning" type="reset">LIMPIAR FORMULARIO</button>
    
</form> 
    <script>
        
    $(function() {
        $('#spanfecha').datetimepicker({
            language: 'es-VE'
        });
    });
    </script>