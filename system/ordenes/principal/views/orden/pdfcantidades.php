<?php
$tablehtml='';
foreach ($this->data as $i => $item) {
    $n = $i+1;
    $p['pendiente_orden']=round(($item['pendiente_orden'] * 100) / $item['total_orden'],0);
    $p['proceso_orden']=round(($item['proceso_orden'] * 100) / $item['total_orden'],0);
    $p['ejecutada_orden']=round(($item['ejecutada_orden'] * 100) / $item['total_orden'],0);
    $item['instituto']=strtoupper($item['instituto']);
    $item['nombres']=strtoupper($item['nombres']);
    $classtr="";
    if ($i % 2) {
        $classtr="par";
    }
$tablehtml .= <<<TBODY
<tr class="$classtr">
<td width="30">$n</td>
<td width="170">$item[instituto]</td>
<td width="170">$item[nombres]</td>
<td width="52" class="num">$item[pendiente_orden]</td><td width="58" class="num">$p[pendiente_orden]%</td>
<td width="52" class="num">$item[proceso_orden]</td><td width="58" class="num">$p[proceso_orden]%</td>
<td width="52" class="num">$item[ejecutada_orden]</td><td width="58" class="num">$p[ejecutada_orden]%</td>
<td width="80" class="num">$item[total_orden]</td>
</tr>
TBODY;
}
?>
<style>
.tableppal td{
  border-top: 1px solid #000000;
  border-left: 1px solid #000000;
}
/*tr:nth-child(2n+1) {
  background-color: #99ff99;
}*/
.tableppal th{
  border-top: 1px solid #000000;
  border-left: 1px solid #000000;
  text-align: center;
  font-weight: bold;
  background-color: #CFCFCF;
}
.tableppal{
  border-top: 1px solid #000000;
  border-bottom: 1px solid #000000;
  border-right: 1px solid #000000;
  width: 875px;
}
.num{
    text-align: right;
}
.par{
    background-color: #E5E5E5;
}
.fechagenerado{
  text-align: right;
}
.fechagenerado .titulo{
  font-weight: bold;
}
.fechagenerado .fecha{
  text-decoration: underline;
  font-weight: bold;
}
</style>
<div class="fechagenerado">
  <span class="titulo">Fecha Generado:</span>
  <span class="fecha">&nbsp;&nbsp;<?php print date('Y/m/d H:i:s'); ?>&nbsp;&nbsp;</span>
</div>
<br>
<table class="tableppal">
    <thead>
        <tr>
            <th width="30">N°</th>
            <th width="170">INSTITUTO</th>
            <th width="170">RESPONSABLE</th>
            <th width="110" colspan="2">PENDIENTE</th>
            <th width="110" colspan="2">EN PROCESO</th>
            <th width="110" colspan="2">EJECUTADAS</th>
            <th width="80">TOTAL</th>
        </tr>
    </thead>
    <tbody><?php print $tablehtml; ?></tbody>
</table>