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
  <link rel="stylesheet/less" type="text/css" href="<?php print PATH_FILE; ?>public/less/bootstrap.less" />
  <link href="<?php print DOMAIN; ?>public/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php print DOMAIN; ?>public/css/font-awesome-ie7.min.css" rel="stylesheet">
  <link rel="shortcut icon" href="<?php echo DOMAIN; ?>public/ico/favicon.png">
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
          <div class="logo">
            <img src="<?php print PATH_FILE; ?>public/images/logo3.gif">
          </div>
        </div>
        <div class="col-md-4 pull-right">
          <form class="form-search" action="#" id="searchform" method="get">
            <div class="input-group">
              <input type="text" class="form-control" id="s" name="s" value="">
              <span class="input-group-btn">
                <button class="btn" type="submit">Buscar</button>
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
          <li class="active"><a href="#"><i class="icon-user-md"></i> Inicio</a></li>
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
                 
                  <input class="btn btn-primary" type="submit" name="commit" value="Sign In" />
                </form>
              </li>
              <li class="divider"></li>
              <li class="dropdown-header">Ingresar con:</li>
              <li><a href="#"><i class="icon-google-plus-sign"></i> Google</a></li>
              <li><a href="#"><i class="icon-facebook-sign"></i> Facebook</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-hospital"></i> Conocenos <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="#">Quienes Somos</a></li>
              <li><a href="#">Donde Estamos</a></li>
            </ul>
          </li>
          <li><a href="#contact"><i class="icon-comments"></i> Contactanos</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>