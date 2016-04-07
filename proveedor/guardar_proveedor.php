<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="../css/general.css" rel="stylesheet" type="text/css">
<link href="../css/icon.css" rel="stylesheet" type="text/css">
<link href="../css/box.css" rel="stylesheet" type="text/css">
</head>
<body>  
<?php
include_once("../clases/clsProveedor.php");
$objproveedor=new clsProveedor;

$accion=$_POST["accion"];

$nombre=$_POST["nombre"];
$ruc=$_POST["ruc"];
$dni=$_POST["dni"];
$direccion=$_POST["direccion"];
$telefono=$_POST["telefono"];
$celular=$_POST["celular"];
$email=$_POST["email"];
$cuenta1=$_POST["cuenta1"];
$cuenta2=$_POST["cuenta2"];
$estado=$_POST["estado"];
$observacion=$_POST["observacion"];

if ($accion=="guardar") {

	if ($objproveedor->agregarProveedor($nombre,$ruc,$dni,$direccion,$telefono,$celular,$email,$cuenta1,$cuenta2,$estado,$observacion)==true)
	{
		$result=$objproveedor->consultarProveedorIdMaximo();
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
	$celular=$_POST["celular"];
	$email=$_POST["email"];
	$cuenta1=$_POST["cuenta1"];
	$cuenta2=$_POST["cuenta2"];
	$estado=$_POST["estado"];
	$observacion=$_POST["observacion"];

	$objproveedor=new clsProveedor;
	if ($objproveedor->modificarProveedor($cod,$nombre,$ruc,$dni,$direccion,$telefono,$celular,$email,$cuenta1,$cuenta2,$estado,$observacion)==true)
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
    <div class="imagen_head"><img src="../img/header/categoria.png" width="48" height="48"></div>
    <div class="titulo_head">GESTOR DE PROVEEDORES</div>    
		<div class="toolbar" id="toolbar">
            <table class="toolbar">
            	<tbody>
                	<tr>       
                    <td>
                        <a href="registrar_proveedor.php" class="toolbar">
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
    <legend>Detalles del proveedor</legend>
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
            <td class="key">Celular:</td>
            <td><?php echo $celular?></td>
        </tr>
        <tr>
            <td class="key">Email:</td>
            <td><?php echo $email?></td>
        </tr>
        <tr>
            <td class="key">Cuenta Nº 1:</td>
            <td><?php echo $cuenta1?></td>
        </tr>
        <tr>
            <td class="key">Cuenta Nº 2:</td>
            <td><?php echo $cuenta2?></td>
        </tr>
        <tr>
            <td class="key">Estado:</td>
            <td><?php echo $estado?></td>
        </tr>
        <tr>
            <td class="key">Observación:</td>
            <td><?php echo $observacion?></td>
        </tr>
    </table>
    </fieldset>

    </div><!--Cierra block_content-->
</div><!--Cierra block-->
</div><!--Cierra Wrapper-->
</body>
</html>