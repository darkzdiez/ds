<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Titulo P</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="IAMEG - Instituto Autonomo de Minerales del Estado Guarico">
  <meta name="author" content="DiezSoluciones.com">
  <meta name="google-site-verification" content="y9bAKLKaxMObeSSjefRuyogE7Uzw5ylw_q_jBhMism8" />  <script type="text/javascript">
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
        <div class="col-md-5">
          <div class="logo">
            <img src="<?php print PATH_FILE; ?>public/images/logo3.gif">
          </div>
        </div>
        <div class="col-md-4 pull-right">
          <form class="form-search" action="#" id="searchform" method="get">
            <div class="input-group">
              <input type="text" class="form-control" id="s" name="s" value="">
              <span class="input-group-btn">
                <button class="btn btn-danger" type="submit">Buscar</button>
              </span>
            </div>
          </form>
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
          <li class="active"><a href="<?php print PATH_NAV; ?>"><i class="icon-user-md"></i> Inicio</a></li>
          <li><a href="#about"><i class="icon-medkit"></i> Productos</a></li>
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-group"></i> Clientes <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="#"><i class="icon-edit"></i> Registrate</a></li>
              <li class="divider"></li>
              <li class="dropdown-header">Iniciar Sesión</li>
              <li>
                <form action="" method="post" class="form-inline form-nav" role="form" accept-charset="UTF-8">
                  <input id="user_username" class="form-control" type="text" name="user[username]" size="30" />
                  <input id="user_password" class="form-control" type="password" name="user[password]" size="30" />
                  <input id="user_remember_me" type="checkbox" name="user[remember_me]" value="1" />
                  <label class="string optional" for="user_remember_me"> Recordar</label>
                 
                  <input class="btn btn-danger" type="submit" name="commit" value="Sign In" />
                </form>
              </li>
              <li class="divider"></li>
              <li class="dropdown-header">Ingresar con:</li>
              <li><a href="#"><i class="icon-google-plus-sign"></i> Google</a></li>
              <li><a href="#"><i class="icon-facebook-sign"></i> Facebook</a></li>
            </ul>
          </li>
          <li><a href="<?php print PATH_NAV . 'empresa'; ?>"><i class="icon-hospital"></i> Conocenos</a></li>
          <li><a href="<?php print PATH_NAV . 'contacto'; ?>"><i class="icon-comments"></i> Contactanos</a></li>
        </ul>
        <ul class="nav navbar-nav pull-right">
          <li class="dropdown list-shopping-card">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="glyphicon glyphicon-shopping-cart"></i> Carrito <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li>
                <form action="" method="post" class="form-inline form-nav" role="form" accept-charset="UTF-8">
                <ul>
                  <li class="item">
                    <div class="col-xs-4"><img src="<?php print PATH_SYSTEM.'primasalud_ecologico2.png'; ?>"></div>
                    <div class="col-xs-8">Solución Fisiologica 0.9</div>
                  </li>
                </ul>
              </form>
              </li>
              <li><a href="#">No hay Productos en el Carrito</a></li>
            </ul>
          </li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-3 col-sm-4" id="sidebar" role="navigation">
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Drogueria</h3>
            </div>
            <div class="panel-body">
                <ul class="nav">
                  <li class="active"><a href="#">Link</a></li>
                  <li><a href="#">Link</a></li>
                  <li><a href="#">Link</a></li>
                  <li><a href="#">Link</a></li>
                  <li><a href="#">Link</a></li>
                  <li><a href="#">Link</a></li>
                  <li><a href="#">Link</a></li>
                  <li><a href="#">Link</a></li>
                </ul>
            </div>
          </div>
          <div class="panel panel-danger">
            <div class="panel-heading">
              <h3 class="panel-title">Lenceria Descartable</h3>
            </div>
            <div class="panel-body">
                <ul class="nav">
                  <li class="active"><a href="#">Link</a></li>
                  <li><a href="#">Link</a></li>
                  <li><a href="#">Link</a></li>
                  <li><a href="#">Link</a></li>
                  <li><a href="#">Link</a></li>
                  <li><a href="#">Link</a></li>
                  <li><a href="#">Link</a></li>
                  <li><a href="#">Link</a></li>
                </ul>
            </div>
          </div>
        </div><!--/span-->
        <div class="col-xs-12 col-md-9 col-sm-8">