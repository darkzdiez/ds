<form id="formCrearOrden" class="form-horizontal ajaxForm" method="post" action="<?php print PATH_NAV; ?>orden/guardarorden">
    <div class="bs-docs-example">
        <div class="descriptionForm">CREAR UNA ORDEN:</div>
        <div class="control-group">
            <label class="control-label" for="dependencia1">Responsable: </label>
            <div class="controls">
                    <select class="span7 required" id="responsable" name="responsable" required>
                        <option value="0">Seleccione</option>
                    </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="referencia">Referencia: </label>
            <div class="controls">
                    <textarea class="span7 required" type="text" rows="3" name="referencia" id="referencia" placeholder="Diario Yaracuy al dia P4"></textarea>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="marca">Asunto: </label>
            <div class="controls">
                    <textarea class="span7 required" type="text" rows="3" name="asunto" id="asunto" placeholder="Asfaltado de la marroquina" required></textarea>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="marca">Descripción: </label>
            <div class="controls">
                    <textarea class="span7 required" type="text" rows="3" name="descripcion" id="descripcion" placeholder="Se requiere" required></textarea>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="plazo">Plazo: </label>
            <div class="controls">
                    <input class="span7 required" type="text" name="plazo" id="plazo" placeholder="30">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="medio">Medio: </label>
            <div class="controls">
                    <select class="span7 required" id="medio" name="medio" required>
                        <option value="">Seleccione</option>
                        <option value="1">Verbal</option>
                        <option value="2">Escrito</option>
                        <option value="3">Electronica</option>
                    </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="oficio">Oficio: </label>
            <div class="controls">
                    <input class="span7 required" type="text" name="oficio" id="oficio" placeholder="SF-20130516-05">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="fecha" required>Fecha Emitida la Orden: </label>
            <div class="controls">
                    <div class="input-append" id="spanfecha"><input data-format="yyyy-MM-dd" class="span7 required" type="text" name="fecha" id="fecha" placeholder="2013-05-16" value="<?php print date("Y-m-d"); ?>" readonly><span class="add-on"><i class="icon-calendar"></i></span></div>
            </div>
        </div>

    </div>
    <div class="bs-docs-example">
        <div class="descriptionForm">OTRAS CATEGORIAS:</div>
            <div class="control-group">
                <label class="checkbox span2">
                    <input type="checkbox" class="check_boxes optional" id="gc" name="gc" value="1">
                    GOBIERNO DE CALLE
                </label>
            </div>
    </div>
    <button class="btn btn-danger" type="summit">GUARDAR ORDEN</button>
    <button class="btn btn-warning" type="reset">LIMPIAR FORMULARIO</button>
    
</form> 
    <script>
        
    $(function() {
        $('#spanfecha').datetimepicker({
            language: 'es-VE'
        });
    });
    </script>