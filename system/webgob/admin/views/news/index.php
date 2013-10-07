<h1>Noticias</h1>
<div class="buttonbar">
    <a class="ui-state-default button_ui" href="<?php print PATH_NAV; ?>news/agregar">
        <span class="ui-icon ui-icon-plus"></span>
        Agregar Noticia
    </a>
</div>
<table id="list-news" class="ui-widget ui-widget-content table-content">
    <thead>
        <tr class="ui-widget-header">
            <th>Título</th>
            <th>Sumario</th>
            <th>Fecha</th>
            <th>Usuario</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody><?php
foreach ($this->singleList['array'] as $key => $value) {
    ?>
            <tr>
                <td><?php print $value['title']; ?></td>
                <td><?php print $value['summary']; ?></td>
                <td><?php print $value['release_date']; ?></td>
                <td><?php print $value['nameuser']; ?></td>
                <?php
                print '<td style="white-space: nowrap;">
                        <div ref="' . $value['idarticle'] . '" class="styleLink edit close">Editar</div>
                        <div ref="' . $value['idarticle'] . '" class="styleLink images close">Imagenes</div>
                        <a href="' . PATH_NAV . 'news/agregarportada/' . $value['idarticle'] . '" class="styleLink">Portada</a> ';
                if ($value['status'] == 1) {
                    print '<div ref="' . $value['idarticle'] . '" class="styleLink state disable">Desactivar</div></td>';
                } else {
                    print '<div ref="' . $value['idarticle'] . '" class="styleLink state enable">Activar</div></td>';
                }
            }
            ?>
        </tr>
    </tbody>
</table>
<?php
print pagination::insert($this->singleList['num'], 10);
?>