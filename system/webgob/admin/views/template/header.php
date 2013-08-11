<!doctype html>
<html>
    <head>
        <title>Sistema Manejador de Contenido</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script type="text/javascript">
            DOMAIN='<?php print DOMAIN; ?>';
            PATH_SYSTEM='<?php print PATH_SYSTEM; ?>';
            PATH_FILE='<?php print PATH_FILE; ?>';
            PATH_NAV='<?php print PATH_NAV; ?>';
            START_SESSION='<?php print Session::get('sessionTime'); ?>'
        </script>
        <link rel="stylesheet" href="<?php print PATH_FILE; ?>public/css/default.css" />	
        <link rel="stylesheet" href="<?php print DOMAIN; ?>public/css/jquery-ui/redmond/jquery-ui-1.10.0.custom.min.css" />
        <!--<link href="<?php echo DOMAIN; ?>public/css/bootstrap.css" rel="stylesheet">-->
        <style>
            #ajax-loader2{
                text-align: center;
                vertical-align: central;
            }
        </style>
        <script type="text/javascript" src="<?php print DOMAIN; ?>public/js/jquery.js"></script>
        <script type="text/javascript" src="<?php print DOMAIN; ?>public/js/general.js"></script>
        <script type="text/javascript" src="<?php print DOMAIN; ?>public/js/var.js"></script>
        <script type="text/javascript" src="<?php print DOMAIN; ?>public/js/jquery-ui-1.10.0.custom.min.js"></script>
        <script type="text/javascript" src="<?php print DOMAIN; ?>public/js/tinymce/tinymce.min.js"></script>
        <script type="text/javascript" src="<?php print DOMAIN; ?>public/js/tinymce/jquery.tinymce.min.js"></script>
        <script type="text/javascript" src="<?php print DOMAIN; ?>public/js/bootstrap/bootstrap-modal.js"></script>
        <script type="text/javascript" src="<?php print PATH_FILE; ?>public/js/custom.js"></script>

        <?php
        if (isset($this->js)) {
            foreach ($this->js as $js) {
                echo '<script type="text/javascript" src="' . PATH_FILE . 'views/' . $js . '"></script>';
            }
        }
        ?>
    </head>
    <body>

        <?php Session::init(); ?>
        <div class="headband">
            <img src="<?php print PATH_FILE; ?>public/images/headband1.png" alt="Logo de Gobierno Bolivariano" height="50" id="Insert_logo" style="display:block; float: left;" /> 
            <img src="<?php print PATH_FILE; ?>public/images/headband2.png" alt="Logo de corazon venezolano" height="50" id="Insert_logo" style="background-color: #8090AB; display:block; float: right;" /> 
        </div>
        <div id="header">
            <ul class="mi-menu">
                <li><a href="<?php print PATH_NAV; ?>"><span class="styleNAV ui-icon ui-icon-home" style="margin-top: 5px; margin-left: 5px;"></span>Inicio</a></li>
                <?php
                if (Session::get('loggedIn') == true):
                    /* Contenido */
                    $access = new Permission();
                    $access->_listKeyAccessKey = Session::get('controller');
                    $access->_group = Session::get('profile');
                    $access->_groupAccess = 1;
                    $access->_elementFirs = '<li style="z-index:1000">
                        <span class="sub"><span class="styleNAV ui-icon ui-icon-pencil" style="margin-top: 5px; margin-left: 5px;"></span> Contenido</span>
                        <ul>';
                    $access->_elementEnd = '</ul>
                        </li>';
                    $access->filterPrint(3, '<li><a href="' . PATH_NAV . 'news"><span class="styleNAV ui-icon ui-icon-pencil" style="margin-top: 5px; margin-left: 5px;"></span>Noticias</a></li>');
                    $access->filterPrint(3, '<li><a href="' . PATH_NAV . 'comment"><span class="styleNAV ui-icon ui-icon-comment" style="margin-top: 5px; margin-left: 5px;"></span>Comentarios</a></li>');
                    $access->filterPrint(2, '<li><a href="' . PATH_NAV . 'ccontrataciones"><span class="styleNAV ui-icon ui-icon-document" style="margin-top: 5px; margin-left: 5px;"></span>C. Contrataciones</a></li>');
                    $access->filterPrint(3, '<li><a href="' . PATH_NAV . 'coveradmanager"><span class="styleNAV ui-icon ui-icon-image" style="margin-top: 5px; margin-left: 5px;"></span>Portada</a></li>');
                    $access->filterPrint(3, '<li><a href="' . PATH_NAV . 'news"><span class="styleNAV ui-icon ui-icon-image" style="margin-top: 5px; margin-left: 5px;"></span>Galeria</a></li>');
                    $access->filterPrint(3, '<li><a href="' . PATH_NAV . 'directorio"><span class="styleNAV ui-icon ui-icon-image" style="margin-top: 5px; margin-left: 5px;"></span>Directorio Ejecutivo</a></li>');
                    $access->printEnd();
                    /* Inventario */
                    $access = new Permission();
                    $access->_listKeyAccessKey = Session::get('controller');
                    $access->_group = Session::get('profile');
                    $access->_groupAccess = 1;
                    $access->_elementFirs = '<li style="z-index:1000">
                        <span class="sub"><span class="styleNAV ui-icon ui-icon-cart" style="margin-top: 5px; margin-left: 5px;"></span> Inventario</span>
                        <ul>';
                    $access->_elementEnd = '</ul>
                        </li>';
                    $access->filterPrint(1, '<li><a href="' . PATH_NAV . 'inventarioinformatica"><span class="styleNAV ui-icon ui-icon-cart" style="margin-top: 5px; margin-left: 5px;"></span>Informatica</a></li>');
                    $access->filterPrint(4, '<li><a href="' . PATH_NAV . 'goods"><span class="styleNAV ui-icon ui-icon-cart" style="margin-top: 5px; margin-left: 5px;"></span>Poder Comunal</a></li>');
                    $access->printEnd();
                    /* Sistema */
                    $access = new Permission();
                    $access->_listKeyAccessKey = Session::get('controller');
                    $access->_group = Session::get('profile');
                    $access->_groupAccess = 1;
                    $access->_elementFirs = '<li style="z-index:1000">
                        <span class="sub"><span class="styleNAV ui-icon ui-icon-gear" style="margin-top: 5px; margin-left: 5px;"></span> Sistema</span>
                        <ul>';
                    $access->_elementEnd = '</ul>
                        </li>';
                    $access->filterPrint(1, '<li><a href="' . PATH_NAV . 'profile"><span class="styleNAV ui-icon ui-icon-key" style="margin-top: 5px; margin-left: 5px;"></span>Perfiles</a></li>');
                    $access->filterPrint(1, '<li><a href="' . PATH_NAV . 'admcontrollers"><span class="styleNAV ui-icon ui-icon-gear" style="margin-top: 5px; margin-left: 5px;"></span>Controladores</a></li>');
                    $access->filterPrint(1, '<li><a href="' . PATH_NAV . 'user"><span class="styleNAV ui-icon ui-icon-person" style="margin-top: 5px; margin-left: 5px;"></span>Usuarios</a></li>');
                    $access->filterPrint(1, '<li><a href="' . PATH_NAV . 'admconfig"><span class="styleNAV ui-icon ui-icon-wrench" style="margin-top: 5px; margin-left: 5px;"></span>Configuracion</a></li>');
                    $access->printEnd();
                    ?>
                    <li><a href="<?php print PATH_NAV; ?>login/logout"><span class="styleNAV ui-icon ui-icon-locked" style="margin-top: 5px; margin-left: 5px;"></span>Salir</a></li>
                <?php else: ?>
                    <li><a href="<?php print PATH_NAV; ?>login"><span class="styleNAV ui-icon ui-icon-unlocked" style="margin-top: 5px; margin-left: 5px;"></span>Entrar</a></li>
                <?php endif; ?>
            </ul>
        </div>

        <!--<div id="header">
            <div id="infoTime">
                <table>
                    <tr><td id="time"></td></tr>
                    <tr><td id="trascurrido"></td></tr>
                </table>
            </div>
            <a href="<?php print PATH_FILE; ?>help"><span class="styleNAV ui-icon ui-icon-help" style="margin-top: 5px; margin-left: 5px;"></span>Ayuda</a>
        <?php if (Session::get('loggedIn') == true): ?>
                                <a href="<?php print PATH_FILE; ?>myaccount"><span class="styleNAV ui-icon ui-icon-person" style="margin-top: 5px; margin-left: 5px;"></span>Editar mi Cuenta</a>
                                <a href="<?php print PATH_FILE; ?>login/logout"><span class="styleNAV ui-icon ui-icon-power" style="margin-top: 5px; margin-left: 5px;"></span>Salir</a>	
        <?php else: ?>
                                <a href="<?php print PATH_FILE; ?>login">Ingresar</a>
        <?php endif; ?>
        </div>-->

        <div id="container">
            <div id="container_content">
                <!--<div class="sidebar1" style="<?php if (Session::get('panel') == 'hide') print 'display: none;'; ?>">
                    <dl class="nav">
                        <dt><a href="<?php print PATH_FILE; ?>index"><span class="styleNAV ui-icon ui-icon-home" style="margin-top: 5px; margin-left: 5px;"></span>Inicio</a></dt>
                <?php
                $access = new Permission();
                $access->_listKeyAccessKey = Session::get('controller');
                $access->_group = Session::get('profile');
                $access->_groupAccess = 1;
                $access->filterPrint(2, '<dt><a href="' . PATH_NAV . 'inventarioinformatica"><span class="styleNAV ui-icon ui-icon-pencil" style="margin-top: 5px; margin-left: 5px;"></span>Inventario de Informatica</a></dt>');
                $access->filterPrint(2, '<dt><a href="' . PATH_NAV . 'news"><span class="styleNAV ui-icon ui-icon-pencil" style="margin-top: 5px; margin-left: 5px;"></span>Noticias</a></dt>');
                $access->filterPrint(2, '<dt><a href="' . PATH_NAV . 'ccontrataciones"><span class="styleNAV ui-icon ui-icon-document" style="margin-top: 5px; margin-left: 5px;"></span>Comision de Contrataciones</a></dt>');
                $access->filterPrint(4, '<dt><a href="' . PATH_NAV . 'profile"><span class="styleNAV ui-icon ui-icon-key" style="margin-top: 5px; margin-left: 5px;"></span>Perfiles</a></dt>');
                $access->filterPrint(5, '<dt><a href="' . PATH_NAV . 'admcontrollers"><span class="styleNAV ui-icon ui-icon-gear" style="margin-top: 5px; margin-left: 5px;"></span>Controladores</a></dt>');
                $access->filterPrint(1, '<dt><a href="' . PATH_NAV . 'user"><span class="styleNAV ui-icon ui-icon-person" style="margin-top: 5px; margin-left: 5px;"></span>Usuarios</a></dt>');
                $access->filterPrint(0, '<dt><a href="' . PATH_NAV . 'admconfig"><span class="styleNAV ui-icon ui-icon-wrench" style="margin-top: 5px; margin-left: 5px;"></span>Configuracion</a></dt>');
                ?>
                    </dl>
                    <div class="ui-state-default ui-link" id="panel-hide" title="Ocultar Panel" style="display: list-item; list-style-type: none; height: 25px; width: 25px; float: right; cursor: pointer;">
                        <span class="ui-icon ui-icon-arrowthickstop-1-e" style="margin-top: 5px; margin-left: 5px;"></span>
                    </div>
                    <p><?php
                if (isset($this->infoModule)) {
                    print $this->infoModule;
                }
                ?></p>
                </div>-->
                <div class="content" style="<?php if (Session::get('panel') == 'hide') print 'width: 100%;'; ?>">
                    <div class="ui-state-default ui-link" id="panel-show" title="Aparecer Panel" style="display: list-item; list-style-type: none; height: 25px; width: 25px; float: right; cursor: pointer; <?php if (Session::get('panel') != 'hide') print 'display: none;'; ?>">
                        <span class="ui-icon ui-icon-arrowthickstop-1-w" style="margin-top: 5px; margin-left: 5px;"></span>
                    </div>