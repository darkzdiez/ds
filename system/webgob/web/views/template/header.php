
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="google-site-verification" content="4LqxfEeqStBOE6akVH6A6D29wHuWmpqANjUF4U6V_hA" />
    <title><?php
        if (isset($this->title)) {
            print $this->title . '';
        }else{
            print TITLE_WEBSITE;
        }
    ?></title>
    <script type="text/javascript">
    DOMAIN = '<?php print DOMAIN; ?>';
    PATH_SYSTEM = '<?php print PATH_SYSTEM; ?>';
    PATH_FILE = '<?php print PATH_FILE; ?>';
    PATH_NAV = '<?php print PATH_NAV; ?>';
    START_SESSION = '<?php print Session::get('sessionTime'); ?>';
    </script>
    <link href="<?php echo DOMAIN; ?>public/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo DOMAIN; ?>public/css/font-awesome-ie7.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php print PATH_FILE; ?>public/css/style.css" />
    <link rel="stylesheet" type="text/css" href="<?php print PATH_FILE; ?>public/css/tooltip.css" />
    <script type="text/javascript" src="<?php print DOMAIN; ?>public/js/var.js"></script>
    <script type="text/javascript" src="<?php print DOMAIN; ?>public/js/jquery.js"></script>
    <script type="text/javascript" src="<?php print DOMAIN; ?>public/js/cargarRecursos.js"></script>
    <script type="text/javascript">
    cargarRecursos(
        DOMAIN + 'public/css/jquery-ui/smoothness/jquery-ui-1.10.0.custom.min.css',
        PATH_FILE + 'public/css/thickbox.css'
        );
    </script>
    <script type="text/javascript" src="<?php print DOMAIN; ?>public/js/jquery-ui-1.10.0.custom.min.js"></script>
    <script type="text/javascript" src="<?php print DOMAIN; ?>public/js/cufon-yui.js"></script>
    <script type="text/javascript" src="<?php print DOMAIN; ?>public/js/cufon_fonts/Gentium_Book.font.js"></script>
    <script type="text/javascript" src="<?php print DOMAIN; ?>public/js/cufon_fonts/Gudea.font.js"></script>
    <script type="text/javascript" src="<?php print DOMAIN; ?>public/js/cufon_fonts/Myriad_Pro.font.js"></script>
    <script type="text/javascript" src="<?php print DOMAIN; ?>public/js/tiny_mce/jquery.tinymce.js"></script>
    <script type="text/javascript" src="<?php print PATH_FILE; ?>public/js/jquery.cycle.all.js"></script>
    <script type="text/javascript" src="<?php print DOMAIN; ?>public/js/yoxview.js"></script>
    <link rel="shortcut icon" href="<?php print PATH_FILE; ?>public/images/favicon.ico" type="image/ico" />
    <script class="jwPlayer" type="application/swf" src="<?php print DOMAIN; ?>public/js/player.swf"></script>
    <script src="<?php print PATH_FILE; ?>public/js/custom.js"></script>
    <?php
    if (isset($this->js)) {
        foreach ($this->js as $js) {
            print '<script type="text/javascript" src="' . PATH_FILE . 'views/' . $js . '"></script>';
        }
    }
    if (isset($this->css)) {
        foreach ($this->css as $js) {
            print '<link rel="stylesheet" type="text/css" href="' . PATH_FILE . 'views/' . $js . '" />';
        }
    }
    ?>
    <script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-20036104-9']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

    </script>
</head>

<body>
    <div id="container_body">
        <div class="fondo" id="gobierno_bolivariano_f"><div class="contenedor" id="gobierno_bolivariano_c"><img src="<?php print PATH_FILE; ?>public/images/headband1.png" style="float: left;" alt="imagen" /><img src="<?php print PATH_FILE; ?>public/images/headband2.png" style="float: right;" alt="imagen" /></div></div>
        <header>
            <div class="fondo" id="nav_f">
                <div class="contenedor" id="nav_c">
                    <nav>
                        <ul id="menu">
                            <li><a href="<?php print PATH_NAV; ?>" title="Inicio" id="home"><span></span></a></li>
                            <li>
                                <a href="<?php print PATH_NAV; ?>noticias"><span class="cufon_myriad_bold">Noticias</span></a>
                                <!--<ul class="submenu">
                                    <li>
                                        <a href="?"><span>Regionales</span></a>
                                    </li>
                                    <li>
                                        <a href="?"><span>Nacionales</span></a>
                                    </li>
                                    <li>
                                        <a href="?"><span>Internacionales</span></a>
                                    </li>
                                </ul>-->
                            </li>
                            <li><a><span class="cufon_myriad_bold">Gobernación</span></a>
                                <ul class="submenu">
                                    <li>
                                        <a href="<?php print PATH_NAV . 'informacion/gobernacion/visionymision'; ?>"><span>Visión y Misión</span></a>
                                    </li>
                                    <li>
                                        <a href="<?php print PATH_NAV . 'informacion/gobernacion/organigrama'; ?>"><span>Organigrama</span></a>
                                    </li>
                                    <li>
                                        <a href="<?php print PATH_NAV . 'informacion/gobernacion/secretarias'; ?>"><span>Secretatias</span></a>
                                    </li>
                                    <li>
                                        <a href="<?php print PATH_NAV . 'informacion/gobernacion/institutos'; ?>"><span>Institutos Descentralizados</span></a>
                                    </li>
                                </ul>
                            </li>
                            <li><a><span class="cufon_myriad_bold">Yaracuy</span></a>
                                <ul class="submenu">
                                    <li>
                                       <a href="<?php print PATH_NAV . 'informacion/yaracuy/simbolos'; ?>"><span>Símbolos</span></a>
                                    </li>
                                    <!--<li>
                                        <a href="<?php print PATH_NAV . 'informacion/yaracuy/turismo'; ?>"><span>Turismo</span></a>
                                    </li>-->
                                    <li>
                                        <a href="<?php print PATH_NAV . 'informacion/yaracuy/faunayflora'; ?>"><span>Flora y Fauna</span></a>
                                    </li>
                                    <li>
                                        <a href="<?php print PATH_NAV . 'informacion/yaracuy/historia'; ?>"><span>Historia</span></a>
                                    </li>
                                </ul>
                            </li>
                            <!--<li><a href="<?php print PATH_NAV; ?>galeria"><span class="cufon_myriad_bold">Galer&iacute;a</span></a></li>-->
                            <!--li><a href="<?php print PATH_NAV; ?>informacion"><span class="cufon_myriad_bold">Informaci&oacute;n</span></a></li>-->
                            <li><a href="<?php print PATH_NAV; ?>contacto"><span class="cufon_myriad_bold">Cont&aacute;ctenos</span></a></li>
                        </ul>
                    </nav>
                    <div id="social1">
                        <a id="socialicon1" href="<?php print PATH_NAV; ?>contacto" title="eMail"><span></span></a>
                        <a id="socialicon2" href="<?php print PATH_NAV; ?>" title="RSS"><span></span></a>
                        <a id="socialicon3" href="https://twitter.com/#!/JULIOLEONYARA" title="Twitter" target="_blank"><span></span></a>
                        <a id="socialicon4" href="http://www.facebook.com/pages/Gobernacion-del-Estado-Yaracuy/238753326211242" title="Facebook" target="_blank"><span></span></a>
                    </div>
                </div>
            </div>
        </header>
        <?php
        if (isset($this->coverAdShow) && $this->coverAdShow == TRUE) {
            print '<div class="fondo" id="slide_ppal_f">
            <div class="contenedor" id="slide_ppal">

            </div>
            </div>';
        }
        ?>
        <div class="fondo" id="contenido_f">
            <div class="contenedor" id="contenido_c">

                <table id="table_contenido">
                    <tr>
                        <td id="contenido_culum_a">
                            <section>