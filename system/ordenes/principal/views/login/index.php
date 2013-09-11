<div class="container">	
	<form class="form-horizontal" id="formLogin" method="post" action="<?php print PATH_NAV; ?>login/run">
		<div class="bs-docs-example span6">
			<div class="descriptionForm"><i class="icon-user"></i> INGRESAR:</div>
			<div class="control-group">
				<label class="control-label span3" for="inputEmail">Usuario: </label>
				<div class="controls">
					<input name="login" type="text" id="login" placeholder="usuario" class="span3">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label span3" for="inputPassword">Clave: </label>
				<div class="controls">
					<input name="password" type="password" id="password" placeholder="......." class="span3">
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
					<label class="checkbox">
						<input type="checkbox" name="recordarme"> No cerrar sesión
					</label>
					<button type="submit" class="btn btn-danger">Ingresar</button>
				</div>
			</div>
		</div>
		<input name="redirect" value="index" type="hidden">
	</form>
</div>