<?php $noticia=$this->noticia[0];
?>
<article>
    <div class="more_article">
        <header>
            <div itemprop="date" class="div_date"><a class="date" href="#"><?php print Date::format_date($noticia['release_date'], $format = DATE_EXTENDED); ?></a></div>
            <div itemprop="category" class="category"><a href="#"><?php print strip_tags($noticia['categoryTipe']); ?></a>, <a href="#"><?php print strip_tags($noticia['categoryLocation']); ?></a>.</div>
            <h3 class="title" itemprop="name"><?php print strip_tags($noticia['title']); ?></h3>
            <div itemprop="description" class="description"><?php print strip_tags($noticia['summary']); ?></div>
        </header>
        <div class="linea"></div>
        <div id="slide_article">
            <?php
            foreach ($this->images as $key => $value) {
                $filenameExplode=explode('/', $value['filename']);
                if(count($filenameExplode)>1){
                    $filename=$filenameExplode[1];
                }else{
                    $filename=$value['filename'];
                }
                $fileThumb='system/webgob/temp/thumbnail/' . $noticia['idarticle'] . '-550x350-'.$filename;
                if(!file_exists($fileThumb)){
                    $obj = new Thumbnail();
                    $thumbnail = $obj->generateThumbnail('system/webgob/'.$value['location'] . $noticia['idarticle'] . '/' . $filename, $fileThumb, 550, 350);
                }else{
                    $thumbnail=$fileThumb;
                }
                ?>
                <div class="item">
                    <div class="image"><img src="<?php print DOMAIN.$thumbnail; ?>"></div>
                    <div class="descripcion"></div>
                    <div class="nav_slide_article"></div>
                    <div class="zoomin" onclick="zoominNews('<?php print $noticia['idarticle'] . '/' . $filename; ?>')"><i class="icon-zoom-in btntext"></i></div>
                </div>
                <?php
            }
            ?>
        </div>
        <hr><br>
        <table class="table_content">
            <tbody>
                <tr>
                    <td class="td_content">
                        <?php print str_replace('../../../', DOMAIN, $noticia['content']); ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</article>
<div id="comment_article">
    <div class="title_section cufon_myriad">Comentarios</div>
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
    <img id="loader_gif" src="<?php print PATH_NAV . '/site/template/img/loader.gif'; ?>" style=" display:none;"/>
    <div id="loader_comment">
    </div>
    <br />
</div>
<div id="dialogZoominimage" title="Dialog Title" style="display: none;"><img src="" id="zoominimage"></div>