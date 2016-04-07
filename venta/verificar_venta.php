<?php error_reporting (0);?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="../css/general.css" rel="stylesheet" type="text/css">
<link href="../css/icon.css" rel="stylesheet" type="text/css">
<link href="../css/box.css" rel="stylesheet" type="text/css">

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


$estado=$_GET["estado"];
$total_pago=$_GET["total_pago"];
$importe=$_GET["pago"];
?>

<div class="wrapper">

<div class="block">

    <div class="block_head"> 
    	<div class="imagen_head"><img src="../img/header/venta_h.png" width="48" height="48"></div>
    <div class="titulo_head">GESTOR DE VENTAS</div>
    
      <div class="toolbar" id="toolbar">
            <table class="toolbar">
            	<tbody>
                	<tr>     
                     <?php
                    if($estado=="efectuado"){
                   echo "<td>";
				   ?>
<a href="imprimir_venta.php" class="toolbar" onClick="window.open(this.href,'win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=530,height=480,directories=no,location=no'); return false;">
                        <span class="icon-32-printer" title="Imprimir">
                        </span>
                        Imprimir
                        </a>
                        <?php
					echo "</td>";
											
                    echo "<td>";
					echo '<a href="javascript:void(0);" class="toolbar" onClick="parent:location=\'index.php?action=vacear\'"><span class="icon-32-nuevo" title="Nueva venta"></span>Nueva venta</a>';
					echo "</td>";
					
					}
					?>
                    <td id="toolbar-new">
                    <?php
                    if($estado=="pendiente"){
						echo '<a href="index.php" class="toolbar"><span class="icon-32-regresar" title="Regresar"></span>Regresar</a>';
					}
					?>
                    </td>             
<td>
                        <a href="#" class="toolbar">
                        <span class="icon-32-ayuda" title="Ayuda">
                        </span>
                        Ayuda
                        </a>
                    </td>                   
                    </tr>
            	</tbody>
            </table>
        
        </div><!--Cierra toolbar-->
    </div><!--Cierra block_head-->
    
<div class="block_content">

<?php
if($estado=="efectuado"){
	echo "<div class='box-info'>Venta realizada con éxito</div><br>";
?>
<div class="zona_total">


      <div class="box_contado">
        

        <br>
        <div class="box_contado_texto">Total a Pagar</div>
        <div class="box_contado_dato" style="color:#090" > $ <?php echo number_format($total_pago,2, '.', ''); ?></div>
        <br>
        <div class="box_contado_texto">Importe recibido</div>
        <div class="box_contado_dato">$ <?php echo number_format($importe,2, '.', ''); ?></div>
        <br>
        <div class="box_contado_texto">Cambio</div>
        <div class="box_contado_dato" style="color: #BF6000">$ <?php echo number_format($importe-$total_pago,2, '.', ''); ?></div>
      </div>

</div><!--Cierra zona total-->
<?php
$objDetalleVenta = new clsDetalleVenta;
$result_det=$objDetalleVenta->consultarDetalleVentaPorParametro('id',$idventa);


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
    error_reporting(0);
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
      <td colspan="3" align="center">San Miguel</td>
    </tr>
    
</table>
<br>
</div>

<?php	
	
}else if($estado=="pendiente"){
	echo "<div class='box-warning'>El importe percibido es menor al total a pagar</div><br>";		
}
?>










</div><!--Cierra Block_Content-->
</div><!--Cierra Wrapper-->
</div><!--Cierra Block-->

</body>
</html>