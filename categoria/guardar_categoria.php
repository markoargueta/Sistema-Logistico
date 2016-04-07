<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="../css/general.css" rel="stylesheet" type="text/css">
<link href="../css/icon.css" rel="stylesheet" type="text/css">
<link href="../css/box.css" rel="stylesheet" type="text/css">
</head>
<body> 
<?php error_reporting (0);?> 
<?php
include_once("../clases/clsCategoria.php");
$objcategoria=new clsCategoria;

$accion=$_POST["accion"];


if ($accion=="guardar") {
	$descripcion=$_POST["descripcion"];
	if ($objcategoria->agregarCategoria($descripcion)==true)
	{
		$result=$objcategoria->consultarCategoriaIdMaximo();
		$mensaje="Registro grabado correctamente";
	}else{
		$mensaje="Error de grabacion";
	}
	
	while($row=mysql_fetch_array($result))
	{
		$cod=$row['Maximo'];
	}
}

if ($accion=="modificar") 
{
	$cod=$_POST["codigo"];
	$descripcion=$_POST["descripcion"];

	$objcategoria=new clsCategoria;
	if ($objcategoria->modificarCategoria($cod,$descripcion)==true)
	{
		$mensaje="Registro actualizado correctamente";
	}else{
		$mensaje="Error de grabacion";
	}
}
?>      
     
<div class="wrapper">
<div class="block">
	<div class="block_head"> 
    <div class="imagen_head"><img src="../img/header/categoria.png" width="48" height="48"></div>
    <div class="titulo_head">Gestor de Categorias</div>    
		<div class="toolbar" id="toolbar">
            <table class="toolbar">
            	<tbody>
                	<tr>       
                    <td>
                        <a href="registrar_categoria.php" class="toolbar">
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
    <div class="box-info"><?php echo $mensaje ?></div>

    <fieldset class="adminform">
    <legend>Detalles de categoría</legend>
    <table class="admintable">
        <tr>
            <td class="key">ID:</td>
            <td><?php echo $cod?></td>
        </tr>
        <tr>
            <td class="key">Descripción:</td>
            <td><?php echo $descripcion?></td>
        </tr>
    </table>
    </fieldset>

    </div><!--Cierra block_content-->
</div><!--Cierra block-->
</div><!--Cierra Wrapper-->
</body>
</html>