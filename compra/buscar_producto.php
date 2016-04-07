
<?php
error_reporting(0);
$criterio=$_GET["criterio"];
$busqueda=$_GET["busqueda"];

include_once("../clases/clsProducto.php");	
$objProducto=new clsProducto;
$result=$objProducto->consultarProductoPorParametro($criterio,$busqueda,'');

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
	echo "<td><a style='cursor: pointer;' href='index.php?txtCodigo=".$row['Codigo']."'>".$row['Codigo']."</a></td>";
	echo "<td><a style='cursor: pointer;' href='index.php?txtCodigo=".$row['Codigo']."'>".$row['Nombre']."</a></td>";
	echo "<td><a style='cursor: pointer;' href='index.php?txtCodigo=".$row['Codigo']."'>".$row['Descripcion']."</a></td>";
	echo "<td align='center'>".$row['Stock']."</td>";
	echo "<td align='center'>".$row['PrecioCosto']."</td>";
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