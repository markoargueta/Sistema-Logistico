<?php error_reporting (0);?>
<?php
$criterio=$_GET["criterio"];
$busqueda=$_GET["busqueda"];

include_once("../clases/clsCliente.php");	
$objCliente=new clsCliente;
$result=$objCliente->consultarClientePorParametro($criterio,$busqueda,'');

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
	//echo "<td><a style='cursor: pointer;' href='index.php?txtCodigo=".$row['Codigo']."'>".$row['Codigo']."</a></td>";


	echo "<td><a style='cursor: pointer;' href='index.php?IdCliente=".$row['IdCliente']."'>".$row['Nombre']."</a></td>";
	echo "<td align='center'>".$row['Ruc']."</a></td>";
	echo "<td align='center'>".$row['Dni']."</td>";
	echo "<td>".$row['Direccion']."</td>";
	echo "<td width='6%' align='center'>".$row['Telefono']."</td>";
	echo "<td width='1%'>".$row['IdCliente']."</td>";
	echo "</tr>";	
}
?>