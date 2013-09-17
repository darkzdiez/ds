<h1>Directorio</h1>
<div class="buttonbar">
    <div class="ui-state-default button_ui buttonbar_show" alt="newsform">
        <span class="ui-icon ui-icon-plus"></span>
        Agregar Grupo
    </div>
</div>
<?php require 'directorioform.php'; ?>
<table id="list-news" class="ui-widget ui-widget-content table-content">
    <thead>
        <tr class="ui-widget-header ">
            <th>Nombre</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody><?php
foreach ($this->singleList as $key => $value) {
    ?>
            <tr>
                <td><?php print utf8_encode($value['nombre']); ?></td>
                <?php
                print '<td style="white-space: nowrap;">
                        <div ref="' . $value['id'] . '" class="styleLink edit close">Editar</div> '
                        .'<div ref="' . $value['id'] . '" class="styleLink edit close">Personas</div> ';
                if ($value['status'] == 1) {
                    print '<div ref="' . $value['id'] . '" class="styleLink state disable">Desactivar</div></td>';
                } else {
                    print '<div ref="' . $value['id'] . '" class="styleLink state enable">Activar</div></td>';
                }
            }
            ?>
        </tr>
    </tbody>
</table>