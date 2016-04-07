<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="../css/general.css" rel="stylesheet" type="text/css">
<link href="../css/Imagenes.css" rel="stylesheet" type="text/css">
<link href="../css/box.css" rel="stylesheet" type="text/css">
</head>
<body>  
<?php error_reporting (0);?>
<?php
include_once("../clases/clsTipoDocumento.php");
$objtipodoc=new clsTipoDocumento;

$accion=$_POST["accion"];
$descripcion=$_POST["descripcion"];

if ($accion=="guardar") {

	if ($objtipodoc->agregarTipoDocumento($descripcion)==true)
	{
		$result=$objtipodoc->consultarTipoDocumentoIdMaximo();
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
	$desc_cat=$_POST["descripcion"];

	$objtipodoc=new clsTipoDocumento;
	if ($objtipodoc->modificarTipoDocumento($cod,$desc_cat)==true)
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
    <div class="imagen_head"><img src="../img/Iconfinder/archiver-32.png" width="48" height="48"></div>
    <div class="titulo_head">GESTOR DEL TIPO DE DOCUMENTO</div>    
		<div class="toolbar" id="toolbar">
            <table class="toolbar">
            	<tbody>
                	<tr>       
                    <td>
                        <a href="registrar_tipodocumento.php" class="toolbar">
                        <span class="Nuevo" title="Nuevo">
                        </span>
                        Nuevo
                        </a>
                    </td>
                    <td>
                        <a href="index.php" class="toolbar">
                        <span class="Cancelar" title="Cerrar">
                        </span>
                        Cerrar
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
    <div class="box-info"><?php echo $mensaje ?></div>

    <fieldset class="adminform">
    <legend>Detalles del tipo de documento</legend>
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