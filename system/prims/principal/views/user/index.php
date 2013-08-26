<div class="container">
	<div class="bs-docs-example">
		<div class="descriptionForm">ADMINISTRAR ORDENES</div>
		<div>
			<a href="<?php print PATH_NAV.'user/crear'; ?>" class="btn"><i class="icon-plus-sign"></i> Agregar</a>
		</div>
		<div class="bs-docs-example">
			<div class="row-fluid">
				<div class="span2"><input type="text" class="span12" placeholder="Asunto o Descripción" name="filtrar-admin" id="filtrar-admin"></div>
				<div class="span2"><button class="btn btn-primary span12" type="summit" id="filtrarUser" name="filtrarUser"><i class="icon-search"></i> FILTRO</button></div>
			</div>
		</div>
		<table id="tabla-administrar" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Usuario</th>
					<th>Perfil</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
</div>
<script type="text/javascript">
$(function(){
    buscar_user();
});
</script>