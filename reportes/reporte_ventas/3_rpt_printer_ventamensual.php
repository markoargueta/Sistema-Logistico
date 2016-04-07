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
$result=$objVenta->consultarVentaMensual('consultar',$fechaini,$fechafin);
date_default_timezone_set('America/Lima');
?>
<H4>LA CASITA ARTESANAL</H4>
<center><B><H2>REPORTE DE VENTAS MENSUAL</H2></B></center>
<?php 
echo "<b>Fecha: </b>".date('d/m/Y')."<br>";
echo "<b>Hora: </b>".date('H:i:s')."<br >";
?>
&nbsp;
<img src="grafico/ventas.png" width="600" height="300">
&nbsp;
<table class="adminlist" cellspacing="1">
  <thead>
<tr>
	<th>#</th>
	<th><a href="#">Fecha</a></th>
    <th><a href="#">Total</a></th>
    <th><a href="#">Porcentaje</a></th>

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
	echo "<td align='center'>".$row['Fecha']."</td>";
	echo "<td align='center'>"."$ ".$row['Total']."</td>";
	echo "<td align='center'>".$row['Porcentaje']."%"."</td>";
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