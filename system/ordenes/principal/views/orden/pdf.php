<style type="text/css">
td{
  border-top: 1px solid #000000;
  border-left: 1px solid #000000;
}
th{
  border-top: 1px solid #000000;
  border-left: 1px solid #000000;
  text-align: center;
  font-weight: bold;
  background-color: #CFCFCF;
}
table{
  border-top: 1px solid #000000;
  border-bottom: 1px solid #000000;
  border-right: 1px solid #000000;
  width: 875px;
}
</style>
<table>
	<thead>
		<tr>
			<th width="30">#</th>
			<th>Responsable</th>
			<th width="200">Descripcion</th>
			<th>Fecha Emision de la orden</th>
			<th>Fecha de Culminacion</th>
			<th width="80">Dia Restantes</th>
			<th width="90">Estatus</th>
		</tr>
	</thead>
	<tbody>
		<?php
    $array=$this->result['d'];
		foreach ($array as $key => $value) {
            $n=$key+1;
            $dias_restantes=0;
            if($value['dias_restantes'] < 0 ){
                $dias_restantes=$value['dias_restantes'] * -1;
            }
            switch($value['estatus']){
                case "0":
                  $estatus='Pendiente';
                  break;
                case "1":
                  $estatus='En Proceso';
                  break;
                case "2":
                  $estatus='Ejecutado';
                  break;
                default:
                  $estatus='Pendiente';
            }
            print '<tr nobr="true">';
            print '<td width="30" style="text-align: center;">' . $n . '</td>';
            print '<td>' . $value['usuario_nombre']  . ' | ' . $value['usuario_instituto']  . '</td>';
            print '<td width="200">' . $value['descripcion'] . '</td>';
            print '<td>' . $value['fecha_emision'] . '</td>';
            print '<td>' . $value['fecha_culminacion'] . '</td>';
            print '<td width="80">' . $dias_restantes . ' dias</td>';
            print '<td width="90">' . $estatus . '</td>';
            print '</tr>';
		}
    ?>
	</tbody>
</table>