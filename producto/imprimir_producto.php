<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="../css/general.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php error_reporting (0);?>
<?php
include_once("../clases/clsProducto.php");
$criterio=$_GET["criterio"];
$busqueda=$_GET["busqueda"];
$objProducto=new clsProducto;
$result=$objProducto->consultarProductoPorParametro($criterio,$busqueda,'');
date_default_timezone_set('America/El_Salvador');
?>
<H4>SISTEMA DE VENTAS</H4>
<center><B><H2>REPORTE DE PRODUCTOS</H2></B></center>
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
    <th><a href="#">Nombre</a></th>
    <th><a href="#">Descripción</a></th>
    <th><a href="#">Stock</a></th>
    <th><a href="#">Precio Venta</a></th>
    <th><a href="#">Estado</a></th>
    <th><a href="#">Categoría</a></th>
	<th><a href="#">ID</a></th>

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
	echo "<td>".$row['Codigo']."</td>";
	echo "<td>".utf8_encode($row['Nombre'])."</td>";
	echo "<td>".utf8_encode($row['Descripcion'])."</td>";
	echo "<td align='center'>".$row['Stock']."</td>";
	echo "<td align='center'>".$row['PrecioVenta']."</td>";
	$estado=$row['Estado'];
	if($estado=="ACTIVO"){
	echo "<td align='center'><img src='../img/header/activo.png' title='Activo'></td>";
}else{
	echo "<td align='center'><img src='../img/header/inactivo.png' title='Inactivo'></td>";
	}
	echo "<td align='center'>".$row['Categoria']."</td>";
	echo "<td width='1%'>".$row['IdProducto']."</td>";
	echo "</tr>";
}

?>
</tbody>
		<tfoot>
			<tr>
				<td colspan="13">
                <a href="#" onClick="window.print();return false;"><img src="../img/header/printer.png" border="0" style="cursor:pointer" title="Imprimir"></a>
              </td>
			</tr>
		</tfoot>
</table>


</body>
</html>