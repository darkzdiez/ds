      <div class="row">
        <div class="col-xs-12 col-md-3 col-sm-4" id="sidebar" role="navigation">
          <div class="panel panel-danger">
            <div class="panel-heading">
              <h3 class="panel-title">Menu</h3>
            </div>
            <div class="panel-body">
                <ul class="nav">
                  <li class="active"><a href="#">Link</a></li>
                  <li><a href="#">Link</a></li>
                  <li><a href="#">Link</a></li>
                  <li><a href="#">Link</a></li>
                  <li><a href="#">Link</a></li>
                  <li><a href="http://iameg.org.ve/eminas/">Acceso a e-Minas</a></li>
                  <li><a href="#">Link</a></li>
                  <li><a href="#">Link</a></li>
                </ul>
            </div>
          </div>
        </div><!--/span-->
        <div class="col-xs-12 col-md-9 col-sm-8">
          <div class="jumbotron hidden-xs">
            <img src="<?php print PATH_SYSTEM . 'media/front/1.png' ?>" alt="">
          </div>
          <div class="row">
            <?php for ($i=0; $i < 9; $i++) { ?>
              <div class="col-sm-6 col-lg-4 col-md-4 col-xs-6 producto <?php if($i==8){ print 'visible-md visible-lg'; } ?>">
                <h4><a href="">Titulo de la Noticia</a></h4>
                <p>Mas detalles texto largo, Mas detalles texto largo, Mas detalles texto largo, Mas detalles texto largo, Mas detalles texto largo, Mas detalles texto largo, Mas detalles texto largo.</p>
                <p style="text-align: center;"><a class="btn btn-default col-xs-12 col-sm-6 pull-right" href="#"> Detalles &raquo;</a></p>
              </div><!--/span-->
            <?php } ?>
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->