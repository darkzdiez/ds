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
      <div class="col-md-6">
        <div class="form">
          <form class="form-search" action="#" id="searchform" method="get">
            <input type="text" class="input-medium" id="s" name="s" value="">
            <button class="btn" type="submit">Buscar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</header>