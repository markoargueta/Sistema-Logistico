<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="../css/general.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php error_reporting (0);?>
<?php
include_once("../clases/clsCategoria.php");
$busqueda=$_GET["busqueda"];
$objcategoria=new clsCategoria;
$result=$objcategoria->consultarCategoriaPorParametro('descripcion',$busqueda,'');
date_default_timezone_set('America/El_salvador');
?>
<H4>SISTEMA DE VENTAS</H4>
<center><B><H2>REPORTE DE CATEGORÍAS</H2></B></center>
<?php 
echo "<b>Fecha: </b>".date('d/m/Y')."<br>";
echo "<b>Hora: </b>".date('H:i:s')."<br >";
?>
&nbsp;
<table class="adminlist" cellspacing="1">
  <thead>
<tr>
	<th>#</th>
	<th><a href="#">Descripción</a></th>
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
	echo "<td>".$row['Descripcion']."</td>";
	echo "<td width='1%' align='center'>".$row['IdCategoria']."</td>";
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