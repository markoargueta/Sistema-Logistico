<?php error_reporting (0);?>

<?php

include_once("../clases/clsCategoria.php");
$objcategoria=new clsCategoria;
$result=$objcategoria->consultarCategoriaPorParametro('','');

?>

<table class="adminlist" cellspacing="1">
<thead>
<tr>
	<th>#</th>
	<th><a href="#">Descripción</a></th>
	<th><a href="#">ID</a></th>
    <th>Ver</th>
	<th>Editar</th>
</tr>
</thead>

<tbody class="adminlist">
<?php


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
	echo "<td width='1%'>".$row['IdCategoria']."</td>";
	echo "<td width='5%' align='center'><a href=detalle_categoria.php?idcategoria=".$row["IdCategoria"]."><img src='../img/ver.png'></td>";
    echo "<td width='5%' align='center'><a href=editar_categoria.php?idcategoria=".$row["IdCategoria"]."><img src='../img/editar.png'></td>";
	echo "</tr>";
}

?>
</tbody>
		<tfoot>
			<tr>
				<td colspan="13">&nbsp;</td>
			</tr>
		</tfoot>
</table>