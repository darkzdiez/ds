<h1>Usuarios</h1>
<p class="buttonbar">
    <a href="#" class="ui-state-default button_ui buttonbar_show" alt="add_user">
        <span class="ui-icon ui-icon-plus"></span>
        Agregar un Usuario
    </a>
</p>
<form method="post" id="add_user" class="ajaxForm" action="<?php echo PATH_NAV; ?>user/create" style="display: none;">
    <label>Usuario</label><input type="text" name="nameuser" /><br />
    <label>Clave</label><input type="text" name="password" /><br />
    <label>Perfil</label>
    <select name="role">
        <option value="default">Normal</option>
        <option value="admin">Admin</option>
        <option value="owner">Owner</option>
    </select><br />
    <label>&nbsp;</label>
    <button class="ui-state-default button_ui buttonbar_close" alt="add_user" type="submit">
        <span class="ui-icon ui-icon-disk"></span>
        Guardar Usuario
    </button>
    <button class="ui-state-default button_ui buttonbar_close" alt="add_user" type="reset">
        <span class="ui-icon ui-icon-close"></span>
        Cerrar
    </button><br />
    <hr />    
</form>

<table id="list-user" class="ui-widget ui-widget-content table-content">
    <thead>
        <tr class="ui-widget-header ">
            <th>Usuario</th>
            <th>Perfil</th>
            <th>Accion</th>
        </tr>
    </thead>
    <tbody><?php
    foreach ($this->userList as $key => $value) {
     ?>
     <tr>
        <td><?php print $value['nameuser']; ?></td>
        <td><?php
        $arrayProfile=array();
        foreach ($this->userProfilesList[$value['iduser']] as $profile) {
         $arrayProfile[]=$profile['name'];
     }
     print implode(', ', $arrayProfile);
     ?></td>
     <?php
     print '<td>
     <a href="' . PATH_NAV . 'user/edit/' . $value['iduser'] . '">Editar</a>
     <a href="' . PATH_NAV . 'user/delete/' . $value['iduser'] . '">Eliminar</a></td>';
     print '</tr>';
 }
 ?></tbody>
</table>