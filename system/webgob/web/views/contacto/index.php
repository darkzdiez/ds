<div class="more_article">
    <div class="title_section cufon_myriad">Envianos un Mensaje</div>
    <img id="loader_gif" src="<?php print URL . '/site/template/img/loader.gif'; ?>" style=" display:none;"/>
    <div id="loader_comment"></div>
    <div id="loader_comment_error">
        <div class = "ui-widget">
            <div class = "ui-state-error ui-corner-all" style = "padding: 5px; margin: 5px;">
                <span class = "ui-icon ui-icon-alert" style = "float: left; margin-right: .3em;"></span>
                <strong>Alerta:</strong>
                <ol>
                    <li><label for="name" class="error">Ingrese un Nombre</label></li>
                    <li><label for="email" class="error">Ingrese un Correo Electronico Valido</label></li>
                    <li><label for="phone" class="error">Ingrese un Numero Telefonico Valido</label></li>
                    <li><label for="comment" class="error">Debe escribir un Comentario</label></li>
                </ol>
                <strong>Debe corregir los errores y intentar enviar el mensaje nuevamente.</strong>
            </div>
        </div>
    </div>
    <form id="send_comment_form" action="<?php print URL . 'comment/add/article/' . $_POST['more']; ?>" method="post"> 
        <table id="table_send_comment_form">
            <tr>
                <td style="text-align: right;"><label for="name">Nombre (*):</label></td>
                <td><input type="text" name="name" id="name" /></td>
            </tr>
            <tr>
                <td style="text-align: right;"><label for="email">Correo Electronico (*):</label></td>
                <td><input type="email" name="email" id="email" /></td>
            </tr>
            <tr>
                <td style="text-align: right;"><label for="phone">Telefono:</label></td>
                <td><input type="text" name="phone" id="phone" /></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;"><label for="comment">Comentario (*):</label></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;"><textarea name="comment" id="comment"></textarea></td>
            </tr>
            <tr>
                <td style="text-align: center;" colspan="2"><label for="phone">Escriba el Texto de Verificación:</label></td>
            </tr>
            <tr>
                <td style="text-align: right; padding-right: 10px;">
                    <img width="100" height="55" alt="" src="<?php print PATH_NAV . 'captcha/index/' . rand(0, 10000); ?>" title="Captcha" id="imgCaptchaComment">
                </td>
                <td>
                    <input type="text" name="captcha" id="inputCaptchaComment" maxlength="4" />
                </td>
            </tr>
            <tr>
                <td style="text-align: center;" colspan="2"><div id="resetCaptcha">(Haz click aqui recargar si no puedes leer la imagen)</div></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;"><button id="button_send_comment_form" class="btm_guardar">Enviar Comentario</button></td>
            </tr>
        </table>
    </form>
</div>