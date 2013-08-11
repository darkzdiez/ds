<h1>Ingresar al Sistema</h1>

<form action="<?php print PATH_NAV; ?>login/run" class="ajaxForm" method="post" style="margin-bottom: 20px;">
    <label>Usuario</label><input type="text" name="login" /><br />
    <label>Clave</label><input type="password" name="password" /><br />
    <label></label>
    <button class="ui-state-default button_ui" type="submit">
        <span class="ui-icon ui-icon-key"></span>
        Ingresar
    </button>
    <br />
</form>