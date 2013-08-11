<h1>Comicion de Contrataciones</h1>
<p class="buttonbar">
    <a href="#" class="ui-state-default button_ui buttonbar_show" alt="ccontrataciones">
        <span class="ui-icon ui-icon-plus"></span>
        Agregar un Llamado
    </a>
</p>
<?php require 'ccontrataciones_form.php'; ?>
<table id="list-ccontrataciones" class="ui-widget ui-widget-content table-content">
    <thead>
        <tr class="ui-widget-header ">
            <th>Titulo</th>
            <th>Denominacion</th>
            <th>Accion</th>
        </tr>
    </thead>
    <tbody><?php
foreach ($this->singleList as $key => $value) {
    ?>
            <tr>
                <td><?php print $value['titulo']; ?></td>
                <td><?php print $value['denominacion']; ?></td>
                <?php
                print '<td style="white-space: nowrap;">
                        <a href="#" ref="' . $value['id'] . '" class="edit close">Editar</a> ';
                if ($value['status'] == 0) {
                    print '<a href="#" ref="' . $value['id'] . '" class="state disable">Desactivar</a>';
                } else {
                    print '<a href="#" ref="' . $value['id'] . '" class="state enable">Activar</a>';
                }
                print ' <a href="' . PATH_NAV . 'ccontrataciones/genpdf/' . $value['id'] . '">PDF</a></td>';
                ?>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>