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
      print '<link rel="stylesheet/less" type="text/css" href="' . PATH_FILE . 'public/less/bootstrap.less">
      <script type="text/javascript" src="' . DOMAIN . 'public/js/less.js"></script>';
  } else {
      print '<link rel="stylesheet" type="text/css" href="' . PATH_FILE . 'public/css/styles.css">';
  }
  ?>
  <link href="<?php print DOMAIN; ?>public/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php print DOMAIN; ?>public/css/font-awesome-ie7.min.css" rel="stylesheet">
  <link rel="shortcut icon" href="<?php print PATH_FILE; ?>public/images/favicon.ico">
  <script type="text/javascript" src="<?php print DOMAIN; ?>public/js/jquery.js"></script>
  <script type="text/javascript" src="<?php print DOMAIN; ?>public/js/general.js"></script>
  <script type="text/javascript" src="<?php print DOMAIN; ?>public/js/var.js"></script>
  <script type="text/javascript" src="<?php print DOMAIN; ?>public/bootstrap-3.0/js/bootstrap.min.js"></script>
  <?php $this->showJs() ?>
</head>

<body>
    <div class="container">
      <div class="header">
        <ul class="nav nav-pills pull-right">
          <li class="active"><a href="#">Inicio</a></li>
          <li><a href="#">Portafolio</a></li>
          <li><a href="#">Contacto</a></li>
        </ul>
        <h3 class="text-muted">DiezSoluciones</h3>
      </div>