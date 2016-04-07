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
include_once("../clases/clsTipoUsuario.php");
$objtipousuario=new clsTipoUsuario;
?>

<?php
include_once("../clases/clsEmpleado.php");
$objempleado=new clsEmpleado;

$accion=$_POST["accion"];


if ($accion=="guardar"){
	$nombre=$_POST["nombre"];
	$apellido=$_POST["apellido"];
	$sexo=$_POST["sexo"];
	$fechanac=$_POST["fechanac"];
	$direccion=$_POST["direccion"];
	$telefono=$_POST["telefono"];
	$celular=$_POST["celular"];
	$email=$_POST["email"];
	$dni=$_POST["dni"];
	$fechaing=$_POST["fechaing"];
	$sueldo=$_POST["sueldo"];
	$estado=$_POST["estado"];
	$usuario=$_POST["usuario"];
	$contrasena=$_POST["contrasena"];
	$idtipousuario=$_POST["idtipousuario"];
	//Encriptacion de contraseña mediante MD5
	$pass_md5=md5($contrasena);

	if ($objempleado->agregarEmpleado($nombre,$apellido,$sexo,$fechanac,$direccion,$telefono,$celular,$email,$dni,$fechaing,$sueldo,$estado,$usuario,$pass_md5,$idtipousuario)==true)
	{
		$result=$objempleado->consultarEmpleadoIdMaximo();
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
	$apellido=$_POST["apellido"];
	$sexo=$_POST["sexo"];
	$fechanac=$_POST["fechanac"];
	$direccion=$_POST["direccion"];
	$telefono=$_POST["telefono"];
	$celular=$_POST["celular"];
	$email=$_POST["email"];
	$dni=$_POST["dni"];
	$fechaing=$_POST["fechaing"];
	$sueldo=$_POST["sueldo"];
	$estado=$_POST["estado"];
	$usuario=$_POST["usuario"];
	$contrasena=$_POST["contrasena"];
	$idtipousuario=$_POST["idtipousuario"];

	$objempleado=new clsEmpleado;
	if ($objempleado->modificarEmpleado($cod,$nombre,$apellido,$sexo,$fechanac,$direccion,$telefono,$celular,$email,$dni,$fechaing,$sueldo,$estado,$usuario,$contrasena,$idtipousuario)==true)
	{
		$mensaje="Registro actualizado correctamente";
	}else{
		$mensaje="Error de grabacion";
	}
}

$resultado_tipousuario=$objtipousuario->consultarTipoUsuarioPorParametro('id',$idtipousuario);
while($row=mysql_fetch_array($resultado_tipousuario))
{
	$desc_tipousuario=$row['Descripcion'];
}
?>      
     
<div class="wrapper">
<div class="block">
	<div class="block_head"> 
    <div class="imagen_head"><img src="../img/header/empleado.png" width="48" height="43"></div>
    <div class="titulo_head">Gestor de Empleados</div>    
		<div class="toolbar" id="toolbar">
            <table class="toolbar">
            	<tbody>
                	<tr>       
                    <td>
                        <a href="registrar_empleado.php" class="toolbar">
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
    <legend>Detalles del empleado</legend>
    <table class="admintable">
		<tr>
            <td class="key">ID:</td>
            <td><?php echo $cod?></td>
        </tr>
        <tr>
            <td class="key">Nombre:</td>
            <td><?php echo $nombre?></td>
        </tr>
        <tr>
            <td class="key">Apellido:</td>
            <td><?php echo $apellido?></td>
        </tr>
        <tr>
            <td class="key">Sexo:</td>
            <td><?php echo $sexo?></td>
        </tr>
        <tr>
            <td class="key">Fecha de Nacimiento:</td>
            <td><?php echo $fechanac?></td>
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
            <td class="key">DNI:</td>
            <td><?php echo $dni?></td>
        </tr>
        <tr>
            <td class="key">Fecha de Ingreso:</td>
            <td><?php echo $fechaing?></td>
        </tr>
        <tr>
            <td class="key">Sueldo:</td>
            <td><?php echo $sueldo?></td>
        </tr>
        <tr>
            <td class="key">Estado:</td>
            <td><?php echo $estado?></td>
        </tr>
		<tr>
            <td class="key">Usuario:</td>
            <td><?php echo $usuario?></td>
        </tr>
        <tr>
            <td class="key">Contraseña:</td>
            <td><?php echo $contrasena?></td>
        </tr>
        <tr>
            <td class="key">Tipo de Usuario:</td>
            <td><?php echo $desc_tipousuario?></td>
        </tr>            
    </table>
    </fieldset>

    </div><!--Cierra block_content-->
</div><!--Cierra block-->
</div><!--Cierra Wrapper-->
</body>
</html>