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
          <div class="jumbotron hidden-xs">
            <img src="<?php print PATH_SYSTEM.'/media/images/banner1/banner1.png'; ?>" alt="">
          </div>
          <div class="row">
            <?php for ($i=0; $i < 9; $i++) { ?>
              <div class="col-6 col-sm-6 col-lg-3 col-md-4 col-xs-6 producto <?php if($i==8){ print 'visible-md'; } ?>">
                <h4>Solución Fisiologica 0.9</h4>
                <p><img src="<?php print PATH_SYSTEM.'primasalud_ecologico2.png'; ?>" style="width: 100%;"></p>
                <p style="text-align: center;"><a class="btn btn-danger col-xs-12 col-sm-6" href="#"> Añadir <i class="glyphicon glyphicon-shopping-cart"></i></a><a class="btn btn-primary col-xs-12 col-sm-6" href="#"> Detalles &raquo;</a></p>
              </div><!--/span-->
            <?php } ?>
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->