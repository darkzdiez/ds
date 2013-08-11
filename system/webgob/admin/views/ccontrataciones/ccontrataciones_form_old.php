<?php
if (isset($this->ccontrataciones[0])) {
    $client = $this->ccontrataciones[0];
}
?>
<form id="ccontrataciones" style="display: <?php print $this->display; ?>;" class="ajaxForm" method="post" action="<?php echo $this->formAction; ?>">
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
        <legend>DISPONIBILIDAD Y LUGAR DEL RETIRO DEL PLIEGO:</legend>
        <div class="container_input_label">
            <label>FECHA DESDE</label>
            <input type="text" name="pfechad" placeholder="04/12/2011" value="<?php @print $client['pfechad']; ?>" />
        </div>
        <div class="container_input_label">
            <label>FECHA HASTA</label>
            <input type="text" name="pfechah" placeholder="04/12/2011" value="<?php @print $client['pfechah']; ?>" />
        </div>
        <div class="container_input_label">
            <label>HORARIOS</label>
            <input type="text" name="phorario" placeholder="" value="<?php @print $client['phorario']; ?>" />
        </div>
        <div class="container_input_label">
            <label>ESTADO</label>
            <input type="text" name="estado" placeholder="" value="<?php @print $client['estado']; ?>" />
        </div>
        <div class="container_input_label">
            <label>MUNICIPIO</label>
            <input type="text" name="municipio" placeholder="" value="<?php @print $client['municipio']; ?>" />
        </div>
        <div class="container_input_label2">
            <label>LUGAR</label>
            <textarea name="lugar" placeholder=""><?php @print comVal::emptyPrint($client['lugar'], 'Sede de la Comisión Única de Contrataciones de Bienes y Servicios de la Gobernación del Estado Yaracuy, ubicada en la Avenida Libertador con Avenida Caracas. Edificio Administrativo, Tercer Piso, San Felipe, Estado Yaracuy.'); ?></textarea>
        </div>
        <div class="container_input_label">
            <label>COSTO</label>
            <input type="text" name="costo" placeholder="" value="<?php @print $client['costo']; ?>" />
        </div>
        <div class="container_input_label">
            <label>BANCO</label>
            <input type="text" name="banco" placeholder="" value="<?php @print $client['banco']; ?>" />
        </div>
        <div class="container_input_label">
            <label>TIPO DE CUENTA</label>
            <input type="text" name="tcuenta" placeholder="" value="<?php @print $client['tcuenta']; ?>" />
        </div>
        <div class="container_input_label">
            <label>NUMERO DE CUENTA</label>
            <input type="text" name="ncuenta" placeholder="" value="<?php @print $client['ncuenta']; ?>" />
        </div>
        <div class="container_input_label">
            <label>BENEFICIARIO</label>
            <input type="text" name="benificiario" placeholder="" value="<?php @print $client['benificiario']; ?>" />
        </div>
        <div class="container_input_label2">
            <label>INFO</label>
            <textarea name="info" placeholder=""><?php @print comVal::emptyPrint($client['info'], 'Los interesados deben consignar al momento de retirar el Pliego de Condiciones en una carpeta identificada con el nombre y numero de Concurso los siguientes recaudos: 1) Carta  de solicitud del Pliego de Condiciones (en caso de presentarse el Representante Legal de la empresa) o  Carta de autorización para retirar el Pliego de Condiciones emitida por el Representante Legal de la empresa (en caso de no presentarse el representante legal) con los datos específicos de la empresa, donde se indique dirección, teléfono, fax, correo electrónico, Nº RIF y nombre de la persona la cual se pueda contactar, a los fines de proceder a las notificaciones inherentes al procesos de selección de contratistas; 2) Planilla de Deposito (original y copia); 3)  Fotocopia de la Cédula de Identidad del Representante Legal 
de la empresa y 4) Fotocopia de la Cédula de Identidad de la persona Autorizada para retirar el Pliego de Condiciones.'); ?>
            </textarea>
        </div>
    </fieldset>
    <fieldset>
        <legend>PERIODO DE LAS ACLARATORIAS:</legend>
        <div class="container_input_label">
            <label>FECHA DE SOLICITUD DESDE</label>
            <input type="text" name="afechad" placeholder="" value="<?php @print $client['afechad']; ?>" />
        </div>
        <div class="container_input_label">
            <label>FECHA DE SOLICITUD HASTA</label>
            <input type="text" name="afechah" placeholder="" value="<?php @print $client['afechah']; ?>" />
        </div>
        <div class="container_input_label">
            <label>FECHA DE SOLICITUD HORARIO</label>
            <input type="text" name="ahorario" placeholder="" value="<?php @print $client['ahorario']; ?>" />
        </div>
        <div class="container_input_label">
            <label>FECHA DE RESPUESTA</label>
            <input type="text" name="rfechad" placeholder="" value="<?php @print $client['rfechad']; ?>" />
        </div>
        <div class="container_input_label">
            <label>HORA</label>
            <input type="text" name="rhora" placeholder="" value="<?php @print $client['rhora']; ?>" />
        </div>
    </fieldset>
    <fieldset>
        <legend>FECHA, HORA Y LUGAR DE ENTREGA DE SOBRES:</legend>
        <div class="container_input_label">
            <label>FECHA</label>
            <input type="text" name="efecha" placeholder="" value="<?php @print $client['efecha']; ?>" />
        </div>
        <div class="container_input_label">
            <label>HORA</label>
            <input type="text" name="ehora" placeholder="" value="<?php @print $client['ehora']; ?>" />
        </div>
        <div class="container_input_label2">
            <label>LUGAR</label>
            <textarea name="lugarsobres" class="tinymce" placeholder=""><?php @print comVal::emptyPrint($client['lugarsobres'], 'Sede de la Comisión Única de Contrataciones de Bienes y Servicios de la Gobernación del Estado Yaracuy, ubicada en la Avenida Libertador con Avenida Caracas. Edificio Administrativo, Tercer Piso, San Felipe, Estado Yaracuy.'); ?></textarea>
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