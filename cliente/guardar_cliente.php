<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="../css/general.css" rel="stylesheet" type="text/css">
<link href="../css/icon.css" rel="stylesheet" type="text/css">
<link href="../css/box.css" rel="stylesheet" type="text/css">
</head>
<?php error_reporting (0);?>
<body>  
<?php
include_once("../clases/clsCliente.php");
$objcliente=new clsCliente;

$accion=$_POST["accion"];



if ($accion=="guardar") {

	$nombre=$_POST["nombre"];
	$ruc=$_POST["ruc"];
	$dni=$_POST["dni"];
	$direccion=$_POST["direccion"];
	$telefono=$_POST["telefono"];
	$observacion=$_POST["observacion"];
	$usuario=$_POST["usuario"];
	$contrasena=$_POST["contrasena"];

	if ($objcliente->agregarCliente($nombre,$ruc,$dni,$direccion,$telefono,$observacion,$usuario,$contrasena)==true)
	{
		$result=$objcliente->consultarClienteIdMaximo();
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

	$nombre=$_POST["nombre"];
	$ruc=$_POST["ruc"];
	$dni=$_POST["dni"];
	$direccion=$_POST["direccion"];
	$telefono=$_POST["telefono"];
	$observacion=$_POST["observacion"];
	$usuario=$_POST["usuario"];
	$contrasena=$_POST["contrasena"];

	if ($objcliente->modificarCliente($cod,$nombre,$ruc,$dni,$direccion,$telefono,$observacion,$usuario,$contrasena)==true)
	{
		$mensaje="Registro actualizado correctamente";
	}else{
		$mensaje="Error de grabacion1";
	}
}
?>      
     
<div class="wrapper">
<div class="block">
	<div class="block_head"> 
    <div class="imagen_head"><img src="../img/header/cliente.png" width="48" height="45"></div>
    <div class="titulo_head">Gestor de Clientes</div>    
		<div class="toolbar" id="toolbar">
            <table class="toolbar">
            	<tbody>
                	<tr>       
                    <td>
                        <a href="registrar_cliente.php" class="toolbar">
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
    <legend>Detalle del cliente</legend>
    <table class="admintable">
        <tr>
            <td class="key">ID:</td>
            <td><?php echo $cod?></td>
        </tr>
        <tr>
            <td class="key">Nombre o Razón Social:</td>
            <td><?php echo $nombre?></td>
        </tr>
        <tr>
            <td class="key">RUC:</td>
            <td><?php echo $ruc?></td>
        </tr>
        <tr>
            <td class="key">DNI:</td>
            <td><?php echo $dni?></td>
        </tr>
        <tr>
            <td class="key">Dirección:</td>
            <td><?php echo $direccion?></td>
        </tr>
        <tr>
            <td class="key">Teléfono:</td>
            <td><?php echo $telefono?></td>
        </tr>
        <tr>
            <td class="key">Observación:</td>
            <td><?php echo $observacion?></td>
        </tr>
        <tr>
            <td class="key">Nombre de Usuario:</td>
            <td><?php echo $usuario?></td>
        </tr>                
    </table>
    </fieldset>

    </div><!--Cierra block_content-->
</div><!--Cierra block-->
</div><!--Cierra Wrapper-->
</body>
</html>