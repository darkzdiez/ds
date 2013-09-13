<div class="row">
    <div class="col-sm-4">
        <ul class="list-group link" id="listasRep">
            <li class="list-group-item"><strong><i class="icon-user icon-white"></i> USUARIO: <?php print strtoupper(Session::get('nameuser')); ?></strong></li>
            <li class="list-group-item active" id="listaItem1">Cuenta</li>
        </ul>
    </div>
    <div class="col-sm-8">
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">Informacion de la Cuenta</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <form name="form1" method="post" id="searchForm" class="form-horizontal ajaxForm" action="<?php print PATH_NAV; ?>">
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 control-label">Nombre</label>
                                    <div class="col-lg-10">
                                        <input type="email" class="form-control" id="nombres" placeholder="Tu Nombre y Apellido" value="<?php @print $this->usuario[0]['nombres']; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 control-label">Email</label>
                                    <div class="col-lg-10">
                                        <input type="email" class="form-control" id="inputEmail1" placeholder="tu@correo.com">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-10 pull-right">
                                        <button class="btn btn-primary pull-right" type="summit"><i class="icon icon-pencil"></i> GUARDAR CAMBIOS</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-danger">
                <div class="panel-heading">Seguridad de la Cuenta</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <form name="form1" method="post" id="searchForm" class="form-horizontal ajaxForm" action="<?php print PATH_NAV; ?>">
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 control-label">Clave</label>
                                    <div class="col-lg-10">
                                        <input type="password" class="form-control" id="clave" name="clave" placeholder="Nueva Clave" value="" required autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 control-label">Repetir Clave</label>
                                    <div class="col-lg-10">
                                        <input type="password" class="form-control" id="reclave" name="reclave" placeholder="Nueva Clave" value="" required autocomplete="off">
                                    </div>
                                </div>
                               <div class="form-group">
                                    <div class="col-lg-10 pull-right">
                                        <button class="btn btn-danger pull-right" type="summit"><i class="icon icon-pencil"></i> GUARDAR CAMBIOS</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>