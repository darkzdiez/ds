<h1>Portada</h1>
<div class="buttonbar">
    <div class="ui-state-default button_ui buttonbar_show" alt="newsform">
        <span class="ui-icon ui-icon-plus"></span>
        Agregar Portada
    </div>
</div>
<?php require 'coveradform.php'; ?>
<table id="list-news" class="ui-widget ui-widget-content table-content">
    <thead>
        <tr class="ui-widget-header ">
            <th>Antetítulo</th>
            <th>Título</th>
            <th>Sumario</th>
            <th>Usuario</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody><?php
foreach ($this->singleList as $key => $value) {
    ?>
            <tr>
                <td><?php print $value['toptitle']; ?></td>
                <td><?php print $value['title']; ?></td>
                <td><?php print $value['description']; ?></td>
                <td><?php print $value['file_idfile']; ?></td>
                <?php
                print '<td style="white-space: nowrap;">
                        <div ref="' . $value['id'] . '" class="styleLink edit close">Editar</div> ';
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
<?php
//print pagination::insert($this->singleList['num'], 10);
print 'pendiente pag'
?>