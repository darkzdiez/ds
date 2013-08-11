<div class="container">
	<div class="bs-docs-example">
		<div class="descriptionForm">VER ORDENES</div>
		<div>
                        <input type="text" placeholder="Asunto o Descripción" name="filtrar" id="filtrar">
                        <label class="checkbox inline">
                        <input type="checkbox" class="check_boxes optional" id="cumplida" name="cumplida" value="1">
                        Cumplida
                        </label>
                        <label class="checkbox inline">
                        <input type="checkbox" class="check_boxes optional" id="sincumplir" name="sincumplir" value="1">
                        Sin Cumplir
                        </label>
		</div>
		<hr>
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Orden</th>
					<th>Fecha Emision de la orden</th>
					<th>Fecha de Culminacion</th>
					<th>Dia Restantes</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1</td>
					<td>Asfaltado de La marroquina</td>
					<td>14/04/2013</td>
					<td>17/05/2013</td>
					<td><i class="icon-exclamation"></i> <span>1 dia</span> </td>
					<td>
						<a href="<?php print PATH_NAV.'orden/crear'; ?>" class="btn"><i class="icon-book"></i> Reporte</a> 
						<a href="<?php print PATH_NAV.'orden/crear'; ?>" class="btn"><i class="icon-edit"></i> Observación</a> 
					</td>
				</tr>
				<tr>
					<td>2</td>
					<td>Asfaltado de La marroquina</td>
					<td>14/05/2013</td>
					<td>30/05/2013</td>
					<td>14 dias</td>
					<td>
						<a href="<?php print PATH_NAV.'orden/crear'; ?>" class="btn"><i class="icon-book"></i> Reporte</a> 
						<a href="<?php print PATH_NAV.'orden/crear'; ?>" class="btn"><i class="icon-edit"></i> Observación</a> 
					</td>
				</tr>
				<tr>
					<td>3</td>
					<td>Asfaltado de La marroquina</td>
					<td>14/05/2013</td>
					<td>30/05/2013</td>
					<td>14 dias</td>
					<td>
						<a href="<?php print PATH_NAV.'orden/crear'; ?>" class="btn"><i class="icon-book"></i> Reporte</a> 
						<a href="<?php print PATH_NAV.'orden/crear'; ?>" class="btn"><i class="icon-edit"></i> Observación</a> 					
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>