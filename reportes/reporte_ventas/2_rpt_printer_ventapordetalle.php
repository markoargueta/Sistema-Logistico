<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="../../css/general.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
include_once("../../clases/clsVenta.php");

$fechaini=$_GET["fechaini"];
$fechafin=$_GET["fechafin"];


$objVenta=new clsVenta;
if($fechaini==""&&$fechafin==""){
	$result=$objVenta->consultarVentaPorDetalle('',$fechaini,$fechafin);
}else{
	$result=$objVenta->consultarVentaPorDetalle('consultar',$fechaini,$fechafin);
}
date_default_timezone_set('America/Lima');
?>
<H4>LA CASITA ARTESANAL</H4>
<center><B><H2>REPORTE DE VENTAS POR DETALLE</H2></B></center>
<?php 
echo "<b>Fecha: </b>".date('d/m/Y')."<br>";
echo "<b>Hora: </b>".date('H:i:s')."<br >";
?>
&nbsp;
<table class="adminlist" cellspacing="1">
  <thead>
<tr>
	<th>#</th>
	<th><a href="#">Código Bar.</a></th>
    <th><a href="#">Producto</a></th>
    <th><a href="#">Categoría</a></th>
    <th><a href="#">Precio Venta</a></th>
    <th><a href="#">Cantidad</a></th>
    <th><a href="#">Total</a></th>
    <th><a href="#">Ganancia</a></th>
</tr>
</thead>

<tbody class="adminlist">
<?php

$c=0;
$i=0;

while($row=mysql_fetch_array($result)){
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
	echo "<td>".$row['Producto']."</td>";
	echo "<td align='center'>".$row['Categoria']."</td>";
	echo "<td align='center'>$ ".$row['Precio']."</td>";
	echo "<td align='center'>".$row['Cantidad']."</td>";
	echo "<td align='center'>$ ".$row['Total']."</td>";
	echo "<td align='center'>$ ".$row['Ganancia']."</td>";
	echo "</tr>";
}

?>
</tbody>
		<tfoot>
			<tr>
				<td colspan="13">
                <a href="#" onClick="window.print();return false;"><img src="../../img/header/printer.png" border="0" style="cursor:pointer" title="Imprimir"></a>
              </td>
			</tr>
		</tfoot>
</table>


</body>
</html>