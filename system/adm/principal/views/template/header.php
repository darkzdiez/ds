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
    <script type="text/javascript" src="<?php echo DOMAIN; ?>public/js/general.js"></script>
    <script type="text/javascript" src="<?php echo PATH_FILE; ?>public/js/custom.js"></script>
    <script type="text/javascript" src="<?php echo DOMAIN; ?>public/js/jquery.jCombo.js"></script>
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
          <div class="btn btn-warning disabled"><i class="icon-user icon-white"></i> <span class="hidden-phone"><?php print Session::get('login');?></span></div>
          <button class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu">
            <li><a href="#"><i class="icon-pencil"></i> Editar Perfil</a></li>
            <li class="divider"></li>
            <li><a href="<?php echo PATH_NAV; ?>login"><i class="icon-off"></i> Salir</a></li>
          </ul>
        </div>
        <?php }else{ ?>
        <div class="pull-right">
          <a class="btn btn-warning" href="<?php echo PATH_NAV; ?>login"><i class="icon-user icon-white"></i> <span class="">Ingresar</span></a>
        </div>
        <?php } ?>
        <div class ="ajaxLoader btn-group pull-right"><img class="hidden" src="<?php echo PATH_NAV; ?>public/images/ajax-loader.gif"></div>
        <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="brand linkAjax" href="<?php echo PATH_NAV; ?>">SIPGOB - Admin</a>
        <div class="nav-collapse collapse">
          <nav>
            <ul class="nav">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuarios <b class="caret"></b></a>
                <span style="position: absolute; top: 2px; font-size: 9px; padding: 1px 5px; right: 3px;" class="badge badge-success">1</span>
                <ul class="dropdown-menu">
                  <li><a class="linkAjax" href="<?php print PATH_NAV.'user/index'; ?>">Administrar</a></li>
                  <li><a class="linkAjax" href="<?php print PATH_NAV.'grupo/index'; ?>">Grupos</a></li>
                  <li><a class="linkAjax" href="<?php print PATH_NAV.'instituto/index'; ?>">Institutos</a></li>
                </ul>
              </li>
            </ul>
          </nav>
        </div><!--/.nav-collapse -->
      </div>
    </div>
  </div>
  <div id="contentDATA" class="container">