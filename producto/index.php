<?
error_reporting(0);
    session_start();

?>

<html>
<head>
<meta http-equiv="content-type" content="text/html" charset="utf-8" />

<link href="../css/general.css" rel="stylesheet" type="text/css">
<link href="../css/Imagenes.css" rel="stylesheet" type="text/css">
<link href="../css/paginator.css" rel="stylesheet" type="text/css">
<script>
function enviarPDF()
{
	var criterio=document.datos.criterio.value;
	var busqueda=document.datos.busqueda.value;
	window.open("reporte_producto.php?criterio="+criterio+"&busqueda="+busqueda,'win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=640,height=480,directories=no,location=no');
return false;
	
}
function enviarPrinter()
{
	var criterio=document.datos.criterio.value;
	var busqueda=document.datos.busqueda.value;
	window.open("imprimir_producto.php?criterio="+criterio+"&busqueda="+busqueda,'win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=640,height=480,directories=no,location=no');
return false;
}
</script>

</head>
<body>
<div class="wrapper">
<div class="block">

    <div class="block_head"> 
    	<div class="imagen_head"><img src="../img/Iconfinder/product.png" width="46" height="43"></div>
    	<div class="titulo_head">GESTOR DE PRODUCTOS</div>
        <div class="toolbar" id="toolbar">
            <table class="toolbar">
            	<tbody>
                	<tr>
					<td>
                <button type="submit" class="button" onClick="enviarPrinter();">
                   <span class="Imprimir" title="Imprimir">
                        </span>
                        Imprimir
          			</button>
                    </td> 
                    <td>
<button type="submit" class="button" onClick="enviarPDF();">
                   <span style="background-image:url(../img/Iconfinder/PDF2.png);" title="Convertir a PDF">
                        </span>
                        PDF
          			</button>
                    </td>                                                
                    <td>
                        <a href="registrar_producto.php" class="toolbar">
                        <span class="NuevoOtros" title="Nuevo">
                        </span>
                        Nuevo
                        </a>
                    </td>               
                    <td>
                        <a href="#" class="toolbar">
                        <span class="Ayuda" title="Ayuda">
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
include_once("../clases/clsProducto.php");
include_once("../lib/paginator/paginator.class.php");

$objProducto=new clsProducto;
$result_tot=$objProducto->consultarTotalProductos();
$num_rows = mysql_fetch_row($result_tot);

//Parametro del Paginador
$pages = new Paginator;
$pages->items_total = $num_rows[0];
$pages->mid_range = 9; // Number of pages to display. Must be odd and > 3
$pages->paginate();

$result=$objProducto->consultarProductoPorParametro($criterio,$busqueda,$pages->limit);

if(isset($_POST['buscar_dato'])){
	$criterio=$_POST["cboCriterio"];	
	$busqueda=$_POST["txtDato"];
	$result=$objProducto->consultarProductoPorParametro($criterio,$busqueda,$pages->limit);

}
if(isset($_POST['restablecer'])){
		
	$result=$objProducto->consultarProductoPorParametro($criterio,$busqueda,$pages->limit);

}
?>
<form name="datos" action="index.php" method="post">
Filtro:<input type="text" name="txtDato">
<select name="cboCriterio" >
  <option>- Seleccione Criterio -</option>
  <option value="codigo">Código</option>
  <option value="nombre">Nombre</option>
  <option value="descripcion">Descripción</option>
  <option value="categoria">Categoría</option>
</select>
<input name="buscar_dato" type="submit" value="Buscar">
<input name="restablecer" type="submit" value="Restablecer">
<input type="hidden" name="criterio" id="criterio" value="<?php echo $criterio ?>">
<input type="hidden" name="busqueda" id="busqueda" value="<?php echo $busqueda ?>">
</form>
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
	echo "<td width='5%' align='center'><a href=detalle_producto.php?idproducto=".$row["IdProducto"]." title='Ver Detalle'><img src='../img/Iconfinder/search-16.png'></td>";
    echo "<td width='5%' align='center'><a href=editar_producto.php?idproducto=".$row["IdProducto"]." title='Editar'><img src='../img/Iconfinder/page_edit.png'></td>";
	echo "</tr>";
}

?>
</tbody>
		<tfoot>
			<tr>
				<td colspan="13">
                <div align="left" style="float:left; width:310px; padding:4px 0px 0px 4px;"><?php echo "Se cargaron ".$i." registros" ?></div>
                <div align="left">                <?php
echo $pages->display_items_per_page()."&nbsp;&nbsp;&nbsp;&nbsp;".$pages->display_pages()."&nbsp;&nbsp;&nbsp;&nbsp;Página: ".$pages->current_page." de ".$pages->num_pages;

?></div>                
                
                </td>
			</tr>
		</tfoot>
</table>
</div><!--Cierra block_content-->
</div><!--Cierra block-->
</div><!--Cierra Wrapper-->
    
</body>
</html>