<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Titulo P</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="IAMEG - Instituto Autonomo de Minerales del Estado Guarico">
  <meta name="author" content="DiezSoluciones.com">
  <meta name="google-site-verification" content="nmUmgAYdYT9fFbXccXyz7RkF46tDAIPj8ssMEpHGRRE" />
  <script type="text/javascript">
  DOMAIN = '<?php print DOMAIN; ?>';
  PATH_SYSTEM = '<?php print PATH_SYSTEM; ?>';
  PATH_FILE = '<?php print PATH_FILE; ?>';
  PATH_NAV = '<?php print PATH_NAV; ?>';
  START_SESSION = '<?php print Session::get('sessionTime'); ?>';
  </script>
  <!-- Le styles -->

  <?php
  if ($_SERVER['REMOTE_ADDR'] == '::1' OR $_SERVER['REMOTE_ADDR'] == '127.0.0.1') {
      print '<link rel="stylesheet/less" type="text/css" href="' . PATH_FILE . 'public/less/bootstrap.less">';
  } else {
      print '<link rel="stylesheet" type="text/css" href="' . PATH_FILE . 'public/css/styles.css">';
  }
  ?>
  <link href="<?php print DOMAIN; ?>public/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php print DOMAIN; ?>public/css/font-awesome-ie7.min.css" rel="stylesheet">
  <link rel="shortcut icon" href="<?php print PATH_FILE; ?>public/images/favicon.ico">
  <script type="text/javascript" src="<?php print DOMAIN; ?>public/js/jquery.js"></script>
  <script type="text/javascript" src="<?php print DOMAIN; ?>public/js/less.js"></script>
  <script type="text/javascript" src="<?php print DOMAIN; ?>public/js/general.js"></script>
  <script type="text/javascript" src="<?php print DOMAIN; ?>public/js/var.js"></script>
  <script type="text/javascript" src="<?php print DOMAIN; ?>public/bootstrap-3.0/js/bootstrap.min.js"></script>
  <?php $this->showJs() ?>
</head>

<body>
  <header>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
            <img src="<?php print PATH_FILE; ?>public/images/headband2.png">
        </div>
        <div class="col-md-6">
          <img class="pull-right" src="<?php print PATH_FILE; ?>public/images/headband2.png" alt="">
        </div>
      </div>
    </div>
  </header>
  <div class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li class="active"><a href="#"><i class="glyphicon glyphicon-home"></i> Inicio</a></li>
          <li><a href="#about"><i class="icon-coffee"></i> Noticias</a></li>
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-hospital"></i> Conocenos <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="#">Quienes Somos</a></li>
              <li><a href="#">Donde Estamos</a></li>
            </ul>
          </li>
          <li><a href="#contact"><i class="glyphicon glyphicon-earphone"></i> Contacto</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>
    <div class="container">