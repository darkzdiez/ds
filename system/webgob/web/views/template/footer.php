</section>
<!--<div class="title_section cufon_myriad">Vídeos mas Recientes...</div>-->
<?php // aqui se llama los videos $this->callControllerModule('video','moduleDualYoutubeHome'); ?>
</td>
<td id="contenido_culum_b">
    <div id="search">
        <!--<form name="form1" method="post" id="searchForm">
            <div id="inicio_buscar_nav"></div>
            <input type="text" name="campo_buscar_nav" id="campo_buscar_nav" placeholder="Buscar en el Sitio">
            <input type="submit" name="btn_buscar_nav" id="btn_buscar_nav" value="">
        </form>-->
        <div style="float: right; height: 6px; width: 232px;"></div>
    </div>
    <div id="fondo_top_colum_b"></div>
    <div class="container_col_right">
        <?php $this->callControllerModule('videoyoutube','printlast'); ?>
    </div>
    <div class="container_col_right">
        <?php //llama el video $this->callControllerModule('video','moduleLastYoutube'); ?>
    </div>
    <div class="container_col_right">
        <a class="twitter-timeline"  href="https://twitter.com/JULIOLEONYARA"  data-widget-id="380710333662244864">Tweets por @JULIOLEONYARA</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    </div>

    <div class="container_col_right">
        <a href="<?php print PATH_NAV; ?>galeria/movie" class="spritex282 spritex282-RINDIENDO-CUENTAS-FOTO-NUEVA" style="float: left;"></a>
    </div>
    <div class="container_col_right">
        <a class="twitter-timeline"  href="https://twitter.com/prensayaracuy"  data-widget-id="380712491174477824">Tweets por @prensayaracuy</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    </div>
    <div class="container_col_right">
        <a href="<?php print PATH_NAV; ?>directorio2" class="spritex282 spritex282-directorio" style="float: left;"></a>
    </div>
                                <div class="container_col_right">
                                    <?php $this->callControllerModule('comisioncontratacion','modulePrintLast'); ?>
                                </div>
                                <div id="slide_282x236">
                                    <a href="<?php print PATH_NAV; ?>" class="spritex282 spritex282-MORRALES-pag"></a>
                                    <a href="<?php print PATH_NAV; ?>" class="spritex282 spritex282-PUEBLO-SANO-pag"></a>
                                    <a href="<?php print PATH_NAV; ?>" class="spritex282 spritex282-TANQUES"></a>
                                    <a href="<?php print PATH_NAV; ?>" class="spritex282 spritex282-viviendas-pag"></a>
                                </div>
                                <div class="titulo_col_der">Gobierno en Linea</div>
                                <div class="sistemas_col_der">
                                    <a href="<?php print PATH_NAV . 'scsd'; ?>" title="Sistema de control de Solicitudes y Donaciones">
                                        <div class="imagen"><img src="<?php print PATH_FILE; ?>public/images/sistemas/scsd.jpg" width="44" height="44" alt="Sistema de control de Solicitudes y Donaciones"></div>
                                        <div class="texto">
                                            <div class="titulo">SCSD</div>
                                            <div class="descripcion">Solicitudes y Donaciones</div>
                                        </div>
                                    </a>
                                    <a href="http://www.yaracuy.gob.ve/minas/" class="ultimo" title="Sistema de Registro Minero">
                                        <div class="imagen"><img src="<?php print PATH_FILE; ?>public/images/sistemas/eminas.jpg" width="44" height="44" alt="Sistema de Registro Minero"></div>
                                        <div class="texto">
                                            <div class="titulo">E-Minas</div>
                                            <div class="descripcion">Sistema Registro Minero</div>
                                        </div>
                                    </a>
                                </div>
                                <div class="container_col_right">
                                    <a href="<?php print PATH_NAV; ?>ccomuna" class="spritex282 spritex282-ccomunal"></a>
                                </div>
                            </td>
                        </tr>
                    </table>    
                </div>
            </div>
            <!--<div class="fondo" id="pie_pagina_f">
                <div class="contenedor" id="pie_pagina_c">
                    <footer>
                        <div id="columna_a" class="columna_footer">
                            <div class="titulo">Informacion del Sitio</div>
                            Diseño, Desarrollo e implantación por Gobierno Bolivariano del Estado Yaracuy | Dirección de Informática, ultima actualización 24-09-2012<br />
                            <a href="<?php print PATH_NAV; ?>">www.yaracuy.gob.ve</a>
                            <div id="address"><address>Av Caracas con Av Libertador, Edificio Administrativo. - San Felipe - Yaracuy - Venezuela RIF.: G-20000164-0</address></div>
                        </div>
                        <div id="columna_b" class="columna_footer columna_footer_medio">
                            <div class="titulo">Sitio WEB Amigos</div>
                            <a id="sitio_amigos1" href="<?php print PATH_NAV; ?>171" class="sitio_amigos" title="171 - Es un centro de atención a la ciudadanía, que se encarga de integrar y coordinar los cuerpos de seguridad competentes, en caso de situaciones de emergencias y solicitudes de servicios, para así brindar mayor seguridad y confianza al usuario."></a>
                            <a id="sitio_amigos2" href="http://www.cantv.com.ve/" class="sitio_amigos" title="CANTV - Es la primera empresa de telecomunicaciones en Venezuela que tiene como objetivo fundamental fomentar la inclusión social y la disminución de la brecha al acceso de tecnologías digitales."></a>
                            <a id="sitio_amigos3" href="http://www.ivss.gob.ve/Gran%20Misi%C3%B3n%20en%20Amor%20Mayor%20Venezuela" class="sitio_amigos" title="Gran Misión en Amor Mayor Venezuela - Creada para la atención de adultos mayores con las siguientes características."></a>
                            <a id="sitio_amigos4" href="http://www.minci.gob.ve/category/hijosdevenezuela/" class="sitio_amigos" title="Gran Mision Hijos de Venezuela - La gran Misión Hijos de Venezuela nació para aclara la disminución de la pobreza crítica de nuestro país, a través de la protección de los hogares en situación de vulnerabilidad."></a>
                            <a id="sitio_amigos5" href="http://www.tves.gob.ve/" class="sitio_amigos" title="Tves - Televisora Venezolana Social Tves, espacio cultural y deportivo dedicado al impulso y promoción de la producción nacional independiente en Venezuela."></a>
                            <a id="sitio_amigos6" href="http://www.cne.gov.ve/" class="sitio_amigos" title="CNE - El Consejo Nacional Electoral es el ente rector del Poder Electoral, responsable de la transparencia de los procesos electorales y referendarios; garantiza a los venezolanos y las venezolanas, la eficiente organización de todos los actos electorales que se realicen en el país."></a>
                            <a id="sitio_amigos7" href="http://www.vtv.gob.ve/" class="sitio_amigos" title="Venezolana de Televisión - Es la más importante cadena de televisión pública de Venezuela, con cobertura a nivel nacional en señal abierta 24 horas."></a>
                            <a id="sitio_amigos8" href="http://www.rnv.gov.ve/" class="sitio_amigos" title="Radio Nacional de Venezuela - Emisora oficial del Estado venezolano con información actualizada al minuto sobre nuestro pais."></a>
                        </div>
                        <div id="columna_c" class="columna_footer">
                            <div class="titulo">Información de Desarrollo</div>
                            Nuestra Plataforma esta totalmente construida bajo Soluciones Libres, cumpliendo así con el Decreto Presidencial 3390 para impulsar la soberanía tecnológica<br />
                            <a title="¡CSS3 Válido!" target="_blank" href="http://validator.w3.org/check?uri=referer" class="validados_w3c" id="html5" ></a>
                            <a title="¡HTML5 Válido!" target="_blank" href="http://jigsaw.w3.org/css-validator/check/referer" class="validados_w3c" id="css3"></a>
                            <a title="¡Mapa del Sitio!" href="<?php print PATH_NAV; ?>sitemap" class="validados_w3c" id="sitemap"></a>
                        </div>
                    </footer>
                </div>
            </div>-->

        </div>
        </div>
    </body>
    </html>
    <?php exit; ?>