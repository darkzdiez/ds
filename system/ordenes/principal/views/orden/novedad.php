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
    <dt>Estatus:</dt>
    <?php
    switch ($this->datosOrden[0]['estatus']) {
        case 0:
            $name="Pendiente";
            $icon="icon-star-empty";
            $nextstyle="btn-primary";
            $nextname="En Proceso";
            $nextid="1";
            $nexticon="icon-star-half-empty";
            break;
        case 1:
            $name="En Proceso";
            $icon="icon-star-half-empty";
            $nextstyle="btn-warning";
            $nextname="Ejecutado";
            $nextid="2";
            $nexticon="icon-star";
            break;
        case 2:
            $name="Ejecutado";
            $icon="icon-star";
            $nextstyle="";
            $nextname="";
            $nextid="";
            $nexticon="";
            break;
        default:
            $name="Pendiente";
            $icon="icon-star-empty";
            $nextstyle="btn-primary";
            $nextname="En Proceso";
            $nextid="1";
            $nexticon="icon-star-half-empty";
            break;
    }
    ?>
    <dd id="estatus"><div class="btn disabled"><i class="<?php print $icon; ?>"></i> <strong><?php print $name; ?></strong></div><?php if($nextname!=''){ if (Session::get('role') == 3 OR $this->datosOrden[0]['iduser']==Session::get('iduser')) { ?>, Cambiar a: <button class="btn <?php print $nextstyle; ?>" onclick="cambiarEstatus(<?php print $this->idOrden; ?>,<?php print $nextid; ?>)" type="button"><i class="<?php print $nexticon; ?>"></i> <?php print $nextname; ?></button><?php } } ?></dd>
</dl>
<div class="container">
    <div class="bs-docs-example">
        <div class="descriptionForm">NOVEDADES</div>
        <?php if (Session::get('role') == 3 OR $this->datosOrden[0]['iduser']==Session::get('iduser')) { ?>
        <div>
            <a href="<?php print PATH_NAV.'orden/novedadcrear/'.$this->idOrden; ?>" class="btn"><i class="icon-plus-sign"></i> Agregar</a>
        </div>
        <hr>
        <?php } ?>
        <table id="tabla-novedades" class="table table-bordered table-hover">
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
    buscar_novedades(<?php print $this->idOrden; ?>);
});
</script>