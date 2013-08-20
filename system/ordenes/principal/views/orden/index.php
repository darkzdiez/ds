<style type="text/css">
/* 
Generic Styling, for Desktops/Laptops 
*/
table { 
	width: 100% !important; 
	border-collapse: collapse !important;
}
/* Zebra striping */
tr:nth-of-type(odd) { 
  /*background: #eee !important; */
}
/*th { 
  background: #333 !important; 
  color: white !important; 
  font-weight: bold !important; 
}*/
td, th { 
  padding: 6px !important; 
  border: 1px solid #ccc !important; 
  text-align: left !important; 
}
/* */
/* 
Max width before this PARTICULAR table gets nasty
This query will take effect for any screen smaller than 760px
and also iPads specifically.
*/
@media only screen and (max-width: 760px), (min-device-width: 768px) and (max-device-width: 1024px)  {

	/* Force table to not be like tables anymore */
	table, thead, tbody, th, td, tr { 
		display: block !important; 
	}
	
	/* Hide table headers (but not display: none;, for accessibility) */
	thead tr { 
		position: absolute !important;
		top: -9999px !important;
		left: -9999px !important;
	}
	
	tr { border: 1px solid #ccc !important; }
	
	td { 
		/* Behave  like a "row" */
		border: none !important;
		border-bottom: 1px solid #eee !important; 
		position: relative !important;
		padding-left: 50% !important; 
	}
	
	td:before { 
		/* Now like a table header */
		position: absolute !important;
		/* Top/left values mimic padding */
		top: 6px !important;
		left: 6px !important;
		width: 45% !important; 
		padding-right: 10px !important; 
		white-space: nowrap !important;
		font-weight: bold;
	}
	
	/*
	Label the data
	*/
	td:nth-of-type(1):before { content: "#"; }
	td:nth-of-type(2):before { content: "Responsable"; }
	td:nth-of-type(3):before { content: "Descripcion"; }
	td:nth-of-type(4):before { content: "Emision"; }
	td:nth-of-type(5):before { content: "Culminacion"; }
	td:nth-of-type(6):before { content: "Restantes"; }
	td:nth-of-type(7):before { content: "Estatus"; }
	td:nth-of-type(8):before { content: "Acciones"; }
}
</style>
<div class="container">
	<div class="bs-docs-example">
		<div class="descriptionForm">ADMINISTRAR ORDENES</div>
		<ul class="nav nav-tabs">
			<li class="active"><a href="#listado" data-toggle="tab">Listado</a></li>
			<li><a href="#cantidades" data-toggle="tab">Estadística</a></li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane active" id="listado">
		<?php if (Session::get('role') == 1 or Session::get('role') == 2) { ?>
		<div>
			<a href="<?php print PATH_NAV.'orden/crear'; ?>" class="btn"><i class="icon-plus-sign"></i> Agregar</a>
		</div>
		<div class="bs-docs-example" style="padding: 5px !important; margin: 5px 0 5px 0 !important;">
			<div class="row-fluid">
				<div class="span3"><input type="text" class="span12" placeholder="Asunto o Descripción" name="filtrar-admin" id="filtrar-admin"></div>
				<div class="span3"><select class="required span12" id="responsable" name="responsable"></select></div>
				<div class="span6">
					<label class="checkbox span4">
						<input type="checkbox" class="check_boxes optional" id="pendiente" name="pendiente" value="0" checked>
						Pendiente
					</label>
					<label class="checkbox span4">
						<input type="checkbox" class="check_boxes optional" id="enproceso" name="enproceso" value="1" checked>
						En Proceso
					</label>
					<label class="checkbox span4">
						<input type="checkbox" class="check_boxes optional" id="ejecutada" name="ejecutada" value="2" checked>
						Ejecutada
					</label>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span3">
					<div class="btn btn-small disabled span12" style="font-weight: bold; text-align: right; font-size: 0.9em;">OTRAS CATEGORIAS:</div>
				</div>
				<div class="span3">
				<label class="checkbox span12">
						<input type="checkbox" class="check_boxes optional" id="gobcalle" name="gobcalle" value="1">
						Gobierno de Calle
					</label>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span3"><button class="btn btn-danger span12" type="summit" id="filtrarOrdenes" name="filtrarOrdenes"><i class="icon-search"></i> FILTRO</button></div>
				<!--<div class="span3"><button class="btn btn-primary span12" type="summit" id="filtrarOrdenesHTML" name="filtrarOrdenesHTML" onclick="test()" ><i class="icon-print"></i> GENERAR Reporte Rapido</a></div>-->
				<div class="span3"><button class="btn btn-danger span12" type="summit" id="filtrarOrdenesPDF" name="filtrarOrdenesPDF" onclick="generarPDF()" ><i class="icon-print"></i> GENERAR Reporte PDF</a></div>
			</div>
		</div>
		<?php } ?>
		<div class="pagination">
			<ul>
				
			</ul>
		</div>
		<table id="tabla-administrar" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Responsable</th>
					<th>Descripcion</th>
					<th>Fecha Emision de la orden</th>
					<th>Fecha de Culminacion</th>
					<th>Dia Restantes</th>
					<th>Estatus</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
		<div class="pagination">
			<ul>
				
			</ul>
		</div>
		</div>
		<div class="tab-pane" id="cantidades">
			<table id="cantidadOrdenes">
				<thead>
					<tr>
						<th>N°</th>
						<th>RESPONSABLE</th>
						<th>PENDIENTE</th>
						<th>EN PROCESO</th>
						<th>EJECUTADAS</th>
						<th>TOTAL</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(function(){
    buscar_ordenes({
            descripcion: $("#filtrar-admin").val(),
            responsable: $("#responsable").val(),
            pendiente: $("#pendiente:checked").val(),
            enproceso: $("#enproceso:checked").val(),
            ejecutada: $("#ejecutada:checked").val()
        });
});
</script>