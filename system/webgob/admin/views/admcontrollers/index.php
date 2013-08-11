<h1>Administracion de Controladores del Sistema</h1>
<div class="buttonbar">
    <div class="ui-state-default button_ui buttonbar_show" alt="admcontrollers">
        <span class="ui-icon ui-icon-plus"></span>
        Agregar un Llamado
    </div>
</div>
<?php require 'admcontrollers_form.php'; ?>
<table id="list-admcontrollers" class="ui-widget ui-widget-content table-content">
    <thead>
        <tr class="ui-widget-header ">
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Accion</th>
        </tr>
    </thead>
    <tbody><?php
foreach ($this->singleList as $key => $value) {
    ?>
            <tr>
                <td><?php print $value['name']; ?></td>
                <td><?php print $value['description']; ?></td>
                <?php
                print '<td style="white-space: nowrap;">
                        <div ref="' . $value['idcontroller'] . '" class="styleLink edit close">Editar</div> ';
                if ($value['status'] == 0) {
                    print '<div ref="' . $value['idcontroller'] . '" class="styleLink state disable">Desactivar</div></td>';
                } else {
                    print '<div ref="' . $value['idcontroller'] . '" class="styleLink state enable">Activar</div></td>';
                }
            }
            ?>
        </tr>
    </tbody>
</table>