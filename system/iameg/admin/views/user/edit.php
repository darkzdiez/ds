<h1>Editar Usuario</h1>

<?php
$user = $this->user[0];
?>

<form name="user" method="post" action="<?php echo PATH_NAV; ?>user/editSave/<?php echo $user['iduser']; ?>">
    <fieldset>
        <legend>DATOS DEL USUARIO:</legend>
        <div class="container_input_label">
            <label>Usuario</label>
            <input type="text" name="nameuser" value="<?php echo $user['nameuser']; ?>" />
        </div>
        <div class="container_input_label">
            <label>Clave</label><input type="password" name="password" placeholder="Nueva Clave" value="" />
        </div>
    </fieldset>
    <fieldset>
        <legend>PERFIL:</legend>
        <dl>
            <?php
            foreach ($this->listProfile as $key => $value) {
                if(array_key_exists($value['idprofile'],$this->userProfilesList)){
                    $checked = 'checked = "checked"';
                } else {
                    $checked = '';
                }
                print '<dt><input type="checkbox" name="profile[]" value="' . $value['idprofile'] . '" ' . $checked . '/><strong>' . $value['name'] . '</strong></dt>';
            }
            ?>
        </dl>
    </fieldset>
    <fieldset class="tblFooters">
        <label>&nbsp;</label>
        <button class="ui-state-default button_ui" alt="user" type="submit">
            <span class="ui-icon ui-icon-disk"></span>
            Editar Usuario
        </button>
    </fieldset>
</form>