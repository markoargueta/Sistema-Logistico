<?php error_reporting (0);?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="../css/general.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
include_once("../clases/clsVenta.php");
include_once("../clases/clsDetalleVenta.php");

$objVenta = new clsVenta;
$result_v=$objVenta->consultarVentaUltimoId();

while($row_venta=mysql_fetch_array($result_v)){
	$idventa=$row_venta['id'];
}

$result_vd=$objVenta->consultarVentaPorParametro('id',$idventa);
while($row_ventad=mysql_fetch_array($result_vd)){
	$tipo_doc=$row_ventad['TipoDocumento'];
	$cliente=$row_ventad['Cliente'];
	$empleado=$row_ventad['Empleado'];
	$serie=$row_ventad['Serie'];
	$numero=$row_ventad['Numero'];
	$fecha_ven=$row_ventad['Fecha'];
	$total_ven=$row_ventad['TotalVenta'];
	$iva_ven=$row_ventad['Iva'];
	$totalpago_ven=$row_ventad['TotalPagar'];				
}

date_default_timezone_set('America/Lima');
?>
<?php
$objDetalle = new clsDetalleVenta;
$result_det=$objDetalle->consultarDetalleVentaPorParametro('id',$idventa);


?>
<div class="zona_impresion">
        <!-- codigo imprimir -->
<br>
<table border="0" align="center" width="300px">
	<tr>
    	<td align="center">
        .::<strong>Distribuidora Milagrito</strong>::.<br>
            Marco Argueta<br>
        </td>
	</tr>
    <tr>
        <td align="center"><?php echo "Fecha/Hora: ".date("Y-m-d H:i:s"); ?></td>
    </tr>
    <tr>
      <td align="center"></td>
    </tr>
    <tr>
        <td>Cliente: <?php echo $cliente; ?></td>
    </tr>
    <tr>
    	<td>Cajero: <?php echo $empleado; ?></td>
    </tr>
    <tr>
    	<td>Nº de venta: <?php echo $serie." - ".$numero ; ?></td>
    </tr>    
</table>
<br>
<table border="0" align="center" width="300px">
    <tr>
    	<td>CANT.</td>
    	<td>DESCRIPCIÓN</td>
    	<td align="right">IMPORTE</td>
    </tr>
    <tr>
      <td colspan="3">==========================================</td>
    </tr>
    
    <?php
    while($row_detalle=mysql_fetch_array($result_det)){
		echo "<tr>";
		echo "<td>".$row_detalle['Cantidad']."</td>";
		echo "<td>".$row_detalle['Nombre']."</td>";
		echo "<td align='right'>$ ".$row_detalle['Total']."</td>";
		echo "</tr>";
		$cantidad+=$row_detalle['Cantidad'];
	}
	?>
    <tr>
    <td>&nbsp;</td>
    <td align="right"><b>TOTAL:</b></td>
    <td align="right"><b>$ <?php echo $totalpago_ven  ?></b></td>
    </tr>
    <tr>
      <td colspan="3">Nº de artículos: <?php echo $cantidad ?></td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>      
    <tr>
      <td colspan="3" align="center">¡Gracias por su compra!</td>
    </tr>
    <tr>
      <td colspan="3" align="center">San Miguel - El Salvador</td>
    </tr>
    
</table>
<br>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

<p>
  
  <div style="margin-left:245px;"><a href="#" onClick="window.print();return false;"><img src="../img/header/printer.png" border="0" style="cursor:pointer" title="Imprimir"></a></div>
</body>
</html>