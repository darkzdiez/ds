<?php $ccontrataciones=$this->var; ?>
<p style="height: 10px; line-height:1.3; color: #000000; text-align: center; margin: 0px; padding: 0px; text-decoration: underline; font-weight: bold;">
LLAMADO A CONCURSO ABIERTO<br>Nº <?php print $ccontrataciones['titulo']; ?>
</p>
<?php print $ccontrataciones['articulo']; ?>
<p><strong>DENOMINACIÓN DEL PROCESO: </strong><?php print $ccontrataciones['denominacion']; ?></p>
<p><strong>ACTIVIDAD: </strong><?php print $ccontrataciones['actividad']; ?></p>
<p><strong>ENTE CONTRATANTE: </strong><?php print $ccontrataciones['ente']; ?></p>
<p><strong>DISPONIBILIDAD Y LUGAR DEL RETIRO DEL PLIEGO:</strong></p>
<table border="1" cellspacing="0" cellpadding="0" style="text-align: center; vertical-align: middle;">
    <thead>
        <tr style="font-weight: bold;">
            <th>Fecha</th>
            <th>Horarios</th>
            <th>Estado</th>
            <th>Municipio</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><strong>Desde:</strong><?php print $ccontrataciones['pfechad']; ?><br><strong>Hasta:</strong><?php print $ccontrataciones['pfechah']; ?></td>
            <td><?php print $ccontrataciones['phorario']; ?></td>
            <td><?php print $ccontrataciones['estado']; ?></td>
            <td><?php print $ccontrataciones['municipio']; ?></td>
        </tr>
    </tbody>
</table>
<p></p>
<p><strong>LUGAR: </strong><?php print $ccontrataciones['lugar']; ?></p>
<p><strong>COSTO DEL PLIEGO: </strong><?php print $ccontrataciones['costo']; ?> Bs. (Deposito debe realizarse en efectivo)</p>
<table border="1" cellspacing="0" cellpadding="0" style="text-align: center; vertical-align: middle;">
    <thead>
        <tr style="font-weight: bold;">
            <th>Banco</th>
            <th>Tipo de Cuenta</th>
            <th>Nº de Cuenta</th>
            <th>Beneficiario</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php print $ccontrataciones['banco']; ?></td>
            <td><?php print $ccontrataciones['tcuenta']; ?></td>
            <td><?php print $ccontrataciones['ncuenta']; ?></td>
            <td><?php print $ccontrataciones['benificiario']; ?></td>
        </tr>
    </tbody>
</table>
<p></p>
<p><?php print $ccontrataciones['info']; ?></p>
<p><strong>PERIODO DE LAS ACLARATORIAS:</strong></p>
<table border="1" cellspacing="0" cellpadding="0" style="text-align: center; vertical-align: middle;">
    <thead>
        <tr style="font-weight: bold;">
            <th colspan="2">SOLICITUD</th>
            <th colspan="2">RESPUESTAS</th>
        </tr>
        <tr style="font-weight: bold;">
            <th>Fecha</th>
            <th>Horarios</th>
            <th>Fecha</th>
            <th>Hora</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><strong>Desde:</strong><?php print $ccontrataciones['afechad']; ?><br><strong>Hasta:</strong><?php print $ccontrataciones['afechah']; ?></td>
            <td><?php print $ccontrataciones['ahorario']; ?></td>
            <td><?php print $ccontrataciones['rfechad']; ?></td>
            <td><?php print $ccontrataciones['rhora']; ?></td>
        </tr>
    </tbody>
</table>
<p></p>
<p><strong>FECHA, HORA Y LUGAR DE ENTREGA DE SOBRES:</strong></p>
<p><strong>Fecha:</strong><?php print $ccontrataciones['efecha']; ?>. <strong>Hora:</strong><?php print $ccontrataciones['ehora']; ?>.</p>
<p><strong>LUGAR: </strong><?php print $ccontrataciones['lugarsobres']; ?></p>
<p><strong><?php print $ccontrataciones['ente']; ?></strong>, se reserva el derecho de suspender o dar por terminado los procesos cuando lo considere pertinente, sin que resulte procedente reclamación alguna.</p>
<p style="height: 10px; line-height:1.3; color: #000000; text-align: center; margin: 0px; padding: 0px; text-decoration: none; font-weight: bold;">
COMISIÓN ÚNICA DE CONTRATACIONES DE <?php print $ccontrataciones['actividad']; ?> DE LA GOBERNACIÓN DEL ESTADO YARACUY
</p>