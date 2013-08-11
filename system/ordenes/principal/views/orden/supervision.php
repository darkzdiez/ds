<h2>Datos de la Orden:</h2>
<dl class="dl-horizontal">
    <dt>Responsable:</dt>
    <dd><?php print $this->datosOrden[0]['usuario_nombre']; ?>.</dd>
    <dt>Referencia:</dt>
    <dd><?php print $this->datosOrden[0]['referencia']; ?>.</dd>
    <dt>Asunto:</dt>
    <dd><?php print $this->datosOrden[0]['asunto']; ?>.</dd>
    <dt>Descripción:</dt>
    <dd><?php print $this->datosOrden[0]['descripcion']; ?>.</dd>
    <dt>Medio:</dt>
    <dd><?php print $this->datosOrden[0]['medio']; ?>.</dd>
    <dt>Oficio:</dt>
    <dd><?php print $this->datosOrden[0]['oficio']; ?>.</dd>
    <dt>Plazo:</dt>
    <dd><?php print $this->datosOrden[0]['plazo']; ?> Días.</dd>
    <dd><?php print ($this->datosOrden[0]['dias_restantes'] * -1); ?> Días Restantes.</dd>
    <dt>Fecha de la Orden:</dt>
    <dd>Emisión <?php print $this->datosOrden[0]['fecha_emision']; ?>.</dd>
    <dd>Culminación <?php print $this->datosOrden[0]['fecha_culminacion']; ?>.</dd>
</dl>
<div class="container">
    <div class="bs-docs-example">
        <div class="descriptionForm">SUPERVISIONES</div>
        <?php if (Session::get('role') == 1 or Session::get('role') == 2) { ?>
        <div>
            <a href="<?php print PATH_NAV.'orden/supervisioncrear/'.$this->idOrden; ?>" class="btn"><i class="icon-plus-sign"></i> Agregar</a>
        </div>
        <hr>
        <?php } ?>
        <table id="tabla-supervisiones" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Descripcion</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
$(function(){
    buscar_supervisiones(<?php print $this->idOrden; ?>);
});
</script>