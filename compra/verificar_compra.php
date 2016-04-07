<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="../css/general.css" rel="stylesheet" type="text/css">
<link href="../css/icon.css" rel="stylesheet" type="text/css">
<link href="../css/box.css" rel="stylesheet" type="text/css">

</head>
<?php error_reporting (0);?>
<body>

<?php
include_once("../clases/clsCompra.php");
include_once("../clases/clsDetalleCompra.php");

$objCompra = new clsCompra;
$result_c=$objCompra->consultarCompraUltimoId();

while($row_compra=mysql_fetch_array($result_c)){
	$idcompra=$row_compra['id'];
}

$result_cd=$objCompra->consultarCompraPorParametro('id',$idcompra);
while($row_comprad=mysql_fetch_array($result_cd)){
	$tipo_doc=$row_comprad['TipoDocumento'];
	$proveedor=$row_comprad['Proveedor'];
	$empleado=$row_comprad['Empleado'];
	$numero=$row_comprad['Numero'];
	$fecha_com=$row_comprad['Fecha'];
	$subtotal_com=$row_comprad['SubTotal'];
	$iva_com=$row_comprad['Iva'];
	$total_com=$row_comprad['Total'];				
}


$estado=$_GET["estado"];

?>

<div class="wrapper">

<div class="block">

    <div class="block_head"> 
    	<div class="imagen_head"><img src="../img/header/venta_h.png" width="48" height="48"></div>
    <div class="titulo_head">GESTOR DE COMPRAS</div>
    
      <div class="toolbar" id="toolbar">
            <table class="toolbar">
            	<tbody>
                	<tr>     
     
                    <td id="toolbar-new">
                    <?php
                    if($estado=="efectuado"){
						echo '<a href="javascript:void(0);" class="toolbar" onClick="parent:location=\'index.php?action=vacear\'"><span class="icon-32-nuevo" title="Nueva compra"></span>Nueva compra</a>';
					}
					?>
                    </td>
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
	echo "<div class='box-info'>Compra realizada con éxito</div><br>";
?>



<fieldset class="adminform">
<legend>Datos de la compra</legend>
<table class="admintable">
    <tr>
        <td class="key">Número de Compra:</td>
        <td><?php echo $numero?></td>
    </tr>
    <tr>
        <td class="key">Fecha:</td>
        <td><?php echo $fecha_com?></td>
    </tr>
    <tr>
        <td class="key">Tipo de documento:</td>
        <td><?php echo $tipo_doc?></td>
    </tr>    
    <tr>
        <td class="key">Empleado:</td>
        <td><?php echo $empleado?></td>
    </tr>
    <tr>
        <td class="key">Proveedor:</td>
        <td><?php echo $proveedor?></td>
    </tr>
    <tr>
        <td class="key">Total:</td>
        <td><?php echo "$ ". $total_com?></td>
    </tr>                                                   
</table>
</fieldset>
<fieldset class="adminform">
<legend>Detalle de la compra</legend>
<table class="adminlist" cellspacing="1">
<thead>
<tr>
	<th>#</th>
	<th><a href="#">Código</a></th>
   	<th><a href="#">Nombre</a></th>
   	<th><a href="#">Descripción</a></th>
	<th><a href="#">Cantidad</a></th>    
	<th><a href="#">Precio Cost.</a></th>
	<th><a href="#">Total</a></th> 
	<th><a href="#">ID</a></th>
</tr>
</thead>

<tbody class="adminlist">

<?php

$objDetalleCompra = new clsDetalleCompra;
$result_det=$objDetalleCompra->consultarDetalleCompraPorParametro('id',$idcompra);



$c=0;
$i=0;

while($row=mysql_fetch_array($result_det)){
	$i=$i+1;
	if ($c==1){
	echo "<tr class='row1'>";
		$c=2;
	}else{
	    	echo "<tr class='row0'>";
		$c=1;
	}

	echo "<td width='10'>".$i."</td>";
	echo "<td align='center'>".$row['Codigo']."</td>";
	echo "<td>".$row['Nombre']."</td>";
	echo "<td>".$row['Descripcion']."</td>";
	echo "<td align='center'>".$row['Cantidad']."</td>";
	echo "<td align='center'>"."$ ".$row['Precio']."</td>";
	echo "<td align='center'>"."$ ".$row['Total']."</td>";
	echo "<td align='center'>".$row['IdCompra']."</td>";
	echo "</tr>";
}

?>
</tbody>
		<tfoot>
			<tr>
				<td colspan="13">
                &nbsp;
                </td>
			</tr>
		</tfoot>
</table>
</fieldset>
<?php	
	
}else if($estado=="pendiente"){
	echo "<div class='box-warning'>No hay productos en la Cesta</div><br>";		
}
?>










</div><!--Cierra Block_Content-->
</div><!--Cierra Wrapper-->
</div><!--Cierra Block-->

</body>
</html>