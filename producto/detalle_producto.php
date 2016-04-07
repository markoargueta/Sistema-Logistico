<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="../css/general.css" rel="stylesheet" type="text/css">
<link href="../css/icon.css" rel="stylesheet" type="text/css">
</head>
<body>

<?php error_reporting (0);?>

<?php
include_once("../lib/barcode/barcode.php");
include_once("../clases/clsProducto.php");

$idprod=$_GET['idproducto'];

$objproducto = new clsProducto;
$resultado=$objproducto->consultarProductoPorParametro('id',$idprod,'');

while($row=mysql_fetch_array($resultado)){
		$idproducto=$row["IdProducto"];
		$codigobarras=$row["Codigo"];
		$nombre=$row["Nombre"];
		$descripcion=$row["Descripcion"];
		$stock=$row["Stock"];
		$stockmin=$row["StockMin"];
		$preciocosto=$row["PrecioCosto"];
		$precioventa=$row["PrecioVenta"];
		$utilidad=$row["Utilidad"];
		$estado=$row["Estado"];
		$imagen=$row["Imagen"];
		$categoria=$row["Categoria"];

}


?>
<div class="wrapper">
<div class="block">

    <div class="block_head"> 
    	<div class="imagen_head"><img src="../img/header/producto.png" width="46" height="43"></div>
    	<div class="titulo_head">GESTOR DE PRODUCTOS</div>
		
        
 <div class="toolbar" id="toolbar">
            <table class="toolbar">
            	<tbody>
                	<tr>
                    <td>
                    <?php
                        echo "<a class='toolbar' href=editar_producto.php?idproducto=".$idproducto."><span class='icon-32-editar' title='Editar'>
                        </span>Editar</a>"; ?>
     
                    </td>                        
                    <td>
                        <a href="registrar_producto.php" class="toolbar">
                        <span class="icon-32-nuevo" title="Nuevo">
                        </span>
                        Nuevo
                        </a>
                    </td>
                    <td>
                        <a href="index.php" class="toolbar">
                        <span class="icon-32-cancelar" title="Cerrar">
                        </span>
                        Cerrar
                        </a>
                    </td>                                    
                    <td>
                        <a href="#" class="toolbar">
                        <span class="icon-32-ayuda" title="Ayuda">
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
    <fieldset class="adminform">
    <legend>Detalles de producto</legend>


<table class="admintable">
	<tr>
		<td width="100" class="key">ID:</td>
		<td><?php echo $idproducto?></td>
	</tr>
    <tr>
      <td class="key">Nombre:</td>
      <td><?php echo utf8_encode($nombre)?></td>
    </tr>
    <tr>
		<td class="key">Descripción:</td>
		<td><?php echo utf8_encode($descripcion)?></td>
	</tr>
    <tr>
		<td class="key">Stock:</td>
		<td><?php echo $stock?></td>
	</tr>
    <tr>
		<td class="key">Stock Mínimo:</td>
		<td><?php echo $stockmin?></td>
	</tr>
    <tr>
	<td class="key">Precio Costo:</td>
		<td><?php echo $preciocosto?></td>
	</tr>
	<td class="key">Precio Venta:</td>
		<td><?php echo $precioventa?></td>
	</tr>
	<td class="key">Utilidad:</td>
		<td><?php echo $utilidad?></td>
	</tr>
	<td class="key">Estado:</td>
		<td><?php echo $estado?></td>
	</tr>
	<td class="key">Categoria:</td>
		<td><?php echo $categoria?></td>
	</tr>
	<tr>
	  <td class="key">Código de barras:</td>
	  <td><?php echo "<img src='../lib/barcode/barcode.php?encode=EAN-13&bdata=".$codigobarras."&height=50&scale=2&bgcolor=%23FFFFEC&color=%23333366&type=jpg' width='150' height='70'>"; ?></td>
	  </tr>
	<td class="key">Imagen:</td>
		<td><img src="../producto/foto/<?php echo $imagen ?>" width="160px" height="140px" border="1"></td>
	</tr>
</table>
</fieldset>
    </div><!--Cierra block_content-->
</div><!--Cierra block-->
</div><!--Cierra Wrapper-->
</body>
</html>