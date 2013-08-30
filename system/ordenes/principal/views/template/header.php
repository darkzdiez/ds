<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Sistema de Ordenes</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
    <script type="text/javascript">
    DOMAIN = '<?php print DOMAIN; ?>';
    PATH_SYSTEM = '<?php print PATH_SYSTEM; ?>';
    PATH_FILE = '<?php print PATH_FILE; ?>';
    PATH_NAV = '<?php print PATH_NAV; ?>';
    START_SESSION = '<?php print Session::get('sessionTime'); ?>';
    </script>
  <!-- Le styles -->
  <link href="<?php print DOMAIN; ?>public/css/bootstrap.css" rel="stylesheet">
  <link href="<?php print DOMAIN; ?>public/css/default.css" rel="stylesheet">
  <link href="<?php print DOMAIN; ?>public/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php print DOMAIN; ?>public/css/font-awesome-ie7.min.css" rel="stylesheet">
  <link href="<?php print DOMAIN; ?>public/css/bootstrap-responsive.css" rel="stylesheet">
  <link href="<?php print DOMAIN; ?>public/css/jquery-ui/redmond/jquery-ui-1.10.0.custom.min.css" rel="stylesheet">
  <link href="<?php print DOMAIN; ?>public/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
  <link href="<?php print PATH_FILE; ?>public/css/default.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php print DOMAIN;?>public/css/fileupload/style.css">
  <link rel="stylesheet" href="<?php print DOMAIN;?>public/css/fileupload/jquery.fileupload-ui.css">
  <link rel="stylesheet" href="<?php print DOMAIN;?>public/css/fileupload/query.fileupload-ui-noscript.css">
  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<![endif]-->

<!-- Fav and touch icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo DOMAIN; ?>public/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo DOMAIN; ?>public/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo DOMAIN; ?>public/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="<?php echo DOMAIN; ?>public/ico/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="<?php echo DOMAIN; ?>public/ico/favicon.png">
    <script type="text/javascript" src="<?php echo DOMAIN; ?>public/js/jquery.js"></script>
    <script type="text/javascript" src="<?php print DOMAIN; ?>public/js/var.js"></script>
    <script type="text/javascript" src="<?php print DOMAIN; ?>public/js/jquery-ui-1.10.0.custom.min.js"></script>
    <script type="text/javascript" src="<?php echo DOMAIN; ?>public/js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript" src="<?php echo DOMAIN; ?>public/js/bootstrap/bootstrap-transition.js"></script>
    <script type="text/javascript" src="<?php echo DOMAIN; ?>public/js/bootstrap/bootstrap-alert.js"></script>
    <script type="text/javascript" src="<?php echo DOMAIN; ?>public/js/bootstrap/bootstrap-modal.js"></script>
    <script type="text/javascript" src="<?php echo DOMAIN; ?>public/js/bootstrap/bootstrap-dropdown.js"></script>
    <script type="text/javascript" src="<?php echo DOMAIN; ?>public/js/bootstrap/bootstrap-scrollspy.js"></script>
    <script type="text/javascript" src="<?php echo DOMAIN; ?>public/js/bootstrap/bootstrap-tab.js"></script>
    <script type="text/javascript" src="<?php echo DOMAIN; ?>public/js/bootstrap/bootstrap-tooltip.js"></script>
    <script type="text/javascript" src="<?php echo DOMAIN; ?>public/js/bootstrap/bootstrap-popover.js"></script>
    <script type="text/javascript" src="<?php echo DOMAIN; ?>public/js/bootstrap/bootstrap-button.js"></script>
    <script type="text/javascript" src="<?php echo DOMAIN; ?>public/js/bootstrap/bootstrap-collapse.js"></script>
    <script type="text/javascript" src="<?php echo DOMAIN; ?>public/js/bootstrap/bootstrap-carousel.js"></script>
    <script type="text/javascript" src="<?php echo DOMAIN; ?>public/js/bootstrap/bootstrap-typeahead.js"></script>
    <script type="text/javascript" src="<?php echo DOMAIN; ?>public/js/bootstrap/bootstrap-tab.js"></script>
    <script type="text/javascript" src="<?php echo DOMAIN; ?>public/js/bootstrap/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="<?php echo DOMAIN; ?>public/js/bootstrap/bootstrap-affix.js"></script>
    <script type="text/javascript" src="<?php echo DOMAIN; ?>public/js/general.js"></script>
    <script type="text/javascript" src="<?php echo PATH_FILE; ?>public/js/custom.js"></script>
    <script type="text/javascript" src="<?php echo DOMAIN; ?>public/js/jquery.jCombo.js"></script>

    <!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
    <script src="<?php echo DOMAIN; ?>public/js/fileupload/vendor/jquery.ui.widget.js"></script>
    <!-- The Templates plugin is included to render the upload/download listings -->
    <script src="<?php echo DOMAIN; ?>public/js/fileupload/tmpl.min.js"></script>
    <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
    <script src="<?php echo DOMAIN; ?>public/js/fileupload/load-image.min.js"></script>
    <!-- The Canvas to Blob plugin is included for image resizing functionality -->
    <script src="<?php echo DOMAIN; ?>public/js/fileupload/canvas-to-blob.min.js"></script>
    <!-- Bootstrap JS and Bootstrap Image Gallery are not required, but included for the demo -->
   <!--<script src="<?php echo DOMAIN; ?>public/js/fileupload/bootstrap.min.js"></script>-->
    <script src="<?php echo DOMAIN; ?>public/js/fileupload/bootstrap-image-gallery.min.js"></script>
    <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
    <script src="<?php echo DOMAIN; ?>public/js/fileupload/jquery.iframe-transport.js"></script>
    <!-- The basic File Upload plugin -->
    <script src="<?php echo DOMAIN; ?>public/js/fileupload/jquery.fileupload.js"></script>
    <!-- The File Upload processing plugin -->
    <script src="<?php echo DOMAIN; ?>public/js/fileupload/jquery.fileupload-process.js"></script>
    <!-- The File Upload image preview & resize plugin -->
    <script src="<?php echo DOMAIN; ?>public/js/fileupload/jquery.fileupload-image.js"></script>
    <!-- The File Upload audio preview plugin -->
    <script src="<?php echo DOMAIN; ?>public/js/fileupload/jquery.fileupload-audio.js"></script>
    <!-- The File Upload video preview plugin -->
    <script src="<?php echo DOMAIN; ?>public/js/fileupload/jquery.fileupload-video.js"></script>
    <!-- The File Upload validation plugin -->
    <script src="<?php echo DOMAIN; ?>public/js/fileupload/jquery.fileupload-validate.js"></script>
    <!-- The File Upload user interface plugin -->
    <script src="<?php echo DOMAIN; ?>public/js/fileupload/jquery.fileupload-ui.js"></script>
    <!-- The main application script -->


    <!-- The XDomainRequest Transport is included for cross-domain file deletion for IE8+ -->
<!--[if gte IE 8]><script src="<?php echo DOMAIN; ?>public/js/fileupload/jquery.xdr-transport.js"></script><![endif]-->
    
    <?php $this->showJs() ?>
</head>

<body>
  <div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
        <?php
        $logged = Session::get('loggedIn');
        if ($logged == true) {
        ?>
        <div class="btn-group pull-right">
          <div class="btn btn-danger disabled"><i class="icon-user icon-white"></i> <span class="hidden-phone"><?php print Session::get('login');?></span></div>
          <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu">
            <li><a href="<?php echo PATH_NAV; ?>perfil"><i class="icon-pencil"></i> Editar Perfil</a></li>
            <li><a href="<?php echo PATH_NAV; ?>soporte"><i class="icon-phone"></i> Soporte y Sugerencias</a></li>
            <li class="divider"></li>
            <li><a href="<?php echo PATH_NAV; ?>login"><i class="icon-off"></i> Salir</a></li>
          </ul>
        </div>
        <?php }else{ ?>
        <div class="pull-right">
          <a class="btn btn-danger" href="<?php echo PATH_NAV; ?>login"><i class="icon-user icon-white"></i> <span class="">Ingresar</span></a>
        </div>
        <?php } ?>
        <div class ="ajaxLoader btn-group pull-right"><img class="hidden" src="<?php echo PATH_NAV; ?>public/images/ajax-loader.gif"></div>
        <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="brand linkAjax" href="<?php echo PATH_NAV; ?>"><img src="http://yaracuy.gob.ve/web//site/template/img/menu/gobyaracuy.png" style="margin-bottom: -16px; float: left; margin-top: -6px;"> SIGOIGOBY</a>
        <div class="nav-collapse collapse">
          <nav>
            <ul class="nav">
              <?php
              $logged = Session::get('loggedIn');
              if ($logged == true) {
              ?>
              <li class="dropdown">
                <a href="<?php print PATH_NAV.'orden'; ?>" class=""><i class="icon icon-tasks"></i> Ordenes</a>
              </li>
              <li class="dropdown">
                <a href="<?php print PATH_NAV.'ayuda'; ?>" class=""><i class="icon icon-question-sign"></i> Ayuda</a>
              </li>
              <?php
              }
              if(Session::get('role')==1){
              ?>
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="icon icon-user"></span> Usuarios <b class="caret"></b></a>
                <span style="position: absolute; top: 2px; font-size: 9px; padding: 1px 5px; right: 3px;" class="badge badge-success">1</span>
                <ul class="dropdown-menu">
                  <li><a class="linkAjax" href="<?php print PATH_NAV.'user/index'; ?>">Administrar</a></li>
                  <li><a class="linkAjax" href="<?php print PATH_NAV.'grupo/index'; ?>">Grupos</a></li>
                  <li><a class="linkAjax" href="<?php print PATH_NAV.'instituto/index'; ?>">Institutos</a></li>
                </ul>
              </li>
              <?php } ?>
            </ul>
          </nav>
        </div><!--/.nav-collapse -->
      </div>
    </div>
  </div>
  <div class="container">
      <?php $this->breadcrumb() ?>
  </div>
  <div id="contentDATA" class="container">
    <?php if (Session::get('seguridadPass')=='m') {
      print '<script> $(document).ready(function() { alertBS("close", "#alertClaveBS"); }); </script>';
    }elseif (Session::get('seguridadPass')=='b'){
      print '<script> $(document).ready(function() { alertBS("open", "#alertClaveBS"); }); </script>';
    } ?>
      <div class="alert alert-block alert-danger fade in" id="alertClaveBS" style="display: none;">
        <button type="button" class="close" aria-hidden="true">×</button>
        <h4>Seguridad Baja</h4>
        <p>La <strong>“Clave”</strong> que esta utilizando para ingresar al sistema es de muy baja seguridad, Se le recomienda ser cambiada.</p>
        <p>
          <a class="btn btn-danger" href="<?php echo PATH_NAV; ?>perfil"><i class="icon-pencil"></i> Editar Perfil</a>
        </p>
      </div>