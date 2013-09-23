          <div class="jumbotron hidden-xs">
            <img src="<?php print PATH_SYSTEM.'media/images/banner1/banner1.jpg'; ?>" alt="">
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