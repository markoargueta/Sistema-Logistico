<?php
$criterio=$_GET["criterio"];
$busqueda=$_GET["busqueda"];

include_once("../clases/clsProveedor.php");	
$objProveedor=new clsProveedor;
$result=$objProveedor->consultarProveedorPorParametro($criterio,$busqueda,'');

//<!--<table id="productos">-->

$i=0;
	
while($row=@mysql_fetch_array($result)){
	$i=$i+1;
	if ($c==1){
		echo "<tr class='row1'>";
		$c=2;
	}else{
		echo "<tr class='row0'>";
		$c=1;
	}	
	echo "<td width='10'>".$i."</td>";
	echo "<td><a style='cursor: pointer;' href='index.php?IdProveedor=".$row['IdProveedor']."'>".$row['Nombre']."</a></td>";
	echo "<td align='center'>".$row['Ruc']."</a></td>";
	echo "<td align='center'>".$row['Dni']."</td>";
	echo "<td>".$row['Direccion']."</td>";
	echo "<td width='6%' align='center'>".$row['Telefono']."</td>";
	$estado=$row['Estado'];
	if($estado=="ACTIVO"){
	echo "<td align='center'><img src='../img/header/activo.png' title='Activo'></td>";
}else{
	echo "<td align='center'><img src='../img/header/inactivo.png' title='Inactivo'></td>";
	}
	echo "<td width='1%'>".$row['IdProveedor']."</td>";
	echo "</tr>";	
}
?>