<form class="form-signin ajaxForm" action="<?php print PATH_NAV; ?>login/run" class="ajaxForm" method="post">
	<h2 class="form-signin-heading">Por favor ingrese</h2>
	<input type="text" name="login" class="form-control" placeholder="Usuario" autofocus /><br />
	<input type="password" name="password" class="form-control" placeholder="Clave" /><br />
	<div class="checkbox">
		<label class="">
			<input type="checkbox" value="remember-me"> Recordar Usuario
		</label>
	</div>
	<button class="btn btn-lg btn-primary btn-block" type="submit">
		Ingresar
	</button>
	<br />
</form>