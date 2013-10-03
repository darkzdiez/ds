<script>
	$(function() {
	    $('#spanfechadesde').datetimepicker({
	        language: 'es-VE'
	    });
	    $('#spanfechahasta').datetimepicker({
	        language: 'es-VE'
	    });
	});
</script>
<style type="text/css">
/* 
Generic Styling, for Desktops/Laptops 
*/
.table-responsive table { 
	width: 100% !important; 
	border-collapse: collapse !important;
}
/* Zebra striping */
.table-responsive tr:nth-of-type(odd) { 
  /*background: #eee !important; */
}
/*th { 
  background: #333 !important; 
  color: white !important; 
  font-weight: bold !important; 
}*/
.table-responsive td, .table-responsive th { 
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
	.table-responsive table, .table-responsive thead, .table-responsive tbody, .table-responsive th, .table-responsive td, .table-responsive tr { 
		display: block !important; 
	}
	
	/* Hide table headers (but not display: none;, for accessibility) */
	.table-responsive thead tr { 
		position: absolute !important;
		top: -9999px !important;
		left: -9999px !important;
	}
	
	.table-responsive tr { border: 1px solid #ccc !important; }
	
	.table-responsive td { 
		/* Behave  like a "row" */
		border: none !important;
		border-bottom: 1px solid #eee !important; 
		position: relative !important;
		padding-left: 50% !important; 
	}
	
	.table-responsive td:before { 
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
	.table-responsive td:nth-of-type(1):before { content: "#"; }
	.table-responsive td:nth-of-type(2):before { content: "Codigo"; }
	.table-responsive td:nth-of-type(3):before { content: "Responsable"; }
	.table-responsive td:nth-of-type(4):before { content: "Descripcion"; }
	.table-responsive td:nth-of-type(5):before { content: "Emision"; }
	.table-responsive td:nth-of-type(6):before { content: "Culminacion"; }
	.table-responsive td:nth-of-type(7):before { content: "Restantes"; }
	.table-responsive td:nth-of-type(8):before { content: "Estatus"; }
	.table-responsive td:nth-of-type(9):before { content: "Acciones"; }
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
				<div class="span3"><input type="text" class="span12" placeholder="Asunto, Descripción o Codigo" name="filtrar-admin" id="filtrar-admin"></div>
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
				<div class="span3">
					<div class="btn btn-small disabled span12" style="font-weight: bold; text-align: right; font-size: 0.9em;">FECHA:</div>
				</div>
				<div class="span3">
					<div class="control-group">
						<div class="controls">
							<div class="input-append" id="spanfechadesde"><input data-format="yyyy-MM-dd" class="required" type="text" name="fechadesde" id="fechadesde" placeholder="DESDE" value="" readonly><span class="add-on"><i class="icon-calendar"></i></span></div>
						</div>
					</div>
				</div>
				<div class="span3">
					<div class="control-group">
						<div class="controls">
							<div class="input-append" id="spanfechahasta"><input data-format="yyyy-MM-dd" class="required" type="text" name="fechahasta" id="fechahasta" placeholder="HASTA" value="" readonly><span class="add-on"><i class="icon-calendar"></i></span></div>
						</div>
					</div>
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

		<table id="tabla-administrar" class="table table-bordered table-hover table-responsive">
			<thead>
				<tr>
					<th>#</th>
					<th>Codigo</th>
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
			<div class="bs-docs-example">
				<div class="descriptionForm">ACCIONES</div>
				<div class="row-fluid">
					<div class="span3"><a class="btn btn-danger span12" href="<?php print PATH_NAV.'orden/pdfcantidades'; ?>" target="_new"><i class="icon-print"></i> GENERAR PDF</a></div>
				</div>
			</div>
			<br>
			<table id="cantidadOrdenes" class="table-responsive">
				<thead>
					<tr>
						<th>N°</th>
						<th>INSTITUTO</th>
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