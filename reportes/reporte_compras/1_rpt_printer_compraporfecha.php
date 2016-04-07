<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="../../css/general.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
include_once("../../clases/clsCompra.php");

$fechaini=$_GET["fechaini"];
$fechafin=$_GET["fechafin"];


$objCompra=new clsCompra;
if($fechaini==""&&$fechafin==""){
	$result=$objCompra->consultarCompraPorFecha('',$fechaini,$fechafin,'');
}else{
	$result=$objCompra->consultarCompraPorFecha('consultar',$fechaini,$fechafin,'');	
}
date_default_timezone_set('America/Lima');
?>
<H4>SISTEMA DE VENTAS</H4>
<center><B><H2>REPORTE GENERAL DE COMPRAS</H2></B></center>
<?php 
echo "<b>Fecha: </b>".date('d/m/Y')."<br>";
echo "<b>Hora: </b>".date('H:i:s')."<br >";
?>
&nbsp;
<table class="adminlist" cellspacing="1">
  <thead>
<tr>
	<th>#</th>
	<th><a href="#">Proveedor</a></th>
    <th><a href="#">Fecha</a></th>
    <th><a href="#">Documento</a></th>
    <th><a href="#">Número</a></th>
    <th><a href="#">Estado</a></th>
    <th><a href="#">Total</a></th>
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
	echo "<td>".$row['Proveedor']."</td>";
	echo "<td align='center'>".$row['Fecha']."</td>";
	echo "<td align='center'>".$row['TipoDocumento']."</td>";
	echo "<td align='center'>".$row['Numero']."</td>";
	$estado=$row['Estado'];
	if($estado=="EMITIDO"){
	echo "<td align='center'><img src='../../img/header/emitido.png' title='Emitido'></td>";
	}else{
	echo "<td align='center'><img src='../../img/header/anulado.png' title='Anulado'></td>";
	}
	echo "<td align='center'>$ ".$row['Total']."</td>";
	echo "<td width='1%' align='center'>".$row['IdCompra']."</td>";
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