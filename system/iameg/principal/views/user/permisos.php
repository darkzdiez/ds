<div class="container">
	<div class="bs-docs-example">
		<div class="descriptionForm">GRUPOS</div>
		<table id="tabla-administrar" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Grupo</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
		<hr>
		<div>
			<a href="<?php print PATH_NAV.'user/crear'; ?>" class="btn"><i class="icon-plus-sign"></i> Agregar Grupo</a>
		</div>
	</div>
	<div class="bs-docs-example">
		<div class="descriptionForm">PERMISOS</div>
		<table id="tabla-administrar" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Modulo</th>
					<th>Permiso</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
		<hr>
		<div>
			<a href="<?php print PATH_NAV.'user/crear'; ?>" class="btn"><i class="icon-plus-sign"></i> Agregar Permiso</a>
		</div>
	</div>
</div>
<script type="text/javascript">
$(function(){
    buscar_grupos(1);
});
</script>