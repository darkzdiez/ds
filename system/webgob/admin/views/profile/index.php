<h1>Perfiles</h1>
<p class="buttonbar">
    <a href="#" class="ui-state-default button_ui buttonbar_show" alt="profile">
        <span class="ui-icon ui-icon-plus"></span>
        Agregar un Llamado
    </a>
</p>
<?php require 'profile_form.php'; ?>
<table id="list-profile" class="ui-widget ui-widget-content table-content">
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
                        <a href="#" ref="' . $value['idprofile'] . '" class="edit close">Editar</a> ';
                if ($value['status'] == 0) {
                    print '<a href="#" ref="' . $value['idprofile'] . '" class="state disable">Desactivar</a></td>';
                } else {
                    print '<a href="#" ref="' . $value['idprofile'] . '" class="state enable">Activar</a></td>';
                }
            }
            ?>
        </tr>
    </tbody>
</table>