<?php
    session_start();
    error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="../css/general.css" rel="stylesheet" type="text/css">
<link href="../css/icon.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
include_once("../clases/clsEmpleado.php");

$objempleado = new clsEmpleado;
$resultado=$objempleado->consultarEmpleadoPorParametro('id',$_SESSION["id"],'');

while($row=mysql_fetch_array($resultado)){
        $idempleado=$row["IdEmpleado"];
        $nombre=$row["Nombre"];
        $apellido=$row["Apellido"];
        $sexo=$row["Sexo"];
        $fechanac=$row["FechaNac"];
        $direccion=$row["Direccion"];
        $telefono=$row["Telefono"];
        $celular=$row["Celular"];
        $email=$row["Email"];
        $dni=$row["Dni"];
        $fechaing=$row["FechaIng"];
        $sueldo=$row["Sueldo"];
        $estado=$row["Estado"];
        $usuario=$row["Usuario"];
        $contrasena=$row["Contrasena"];
        $tipousuario=$row["TipoUsuario"];
}

?>
<div class="wrapper">
<div class="block">

    <div class="block_head"> 
        <div class="imagen_head"><img src="../img/header/empleado.png" width="48" height="43"></div>
        <div class="titulo_head">Gestor de Empleados</div>
        
              
    </div><!--Cierra block_head-->
    
    <div class="block_content">
        <fieldset class="adminform">
        <legend>Detalles del empleado</legend>
      
        <table class="admintable">
            <tr>
                <td width="100" class="key">ID:</td>
                <td><?php echo $idempleado?></td>
            </tr>
            <tr>
                <td class="key">Nombre:</td>
                <td><?php echo $nombre?></td>
            </tr>
            <tr>
                <td class="key">Apellidos:</td>
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
                <td class="key">Dni:</td>
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
            </tr>              <tr>
                <td class="key">Tipo de Usuario:</td>
                <td><?php echo $tipousuario?></td>
            </tr>    
        </table>
        </fieldset>

    </div><!--Cierra block_content-->
</div><!--Cierra block-->
</div><!--Cierra Wrapper-->

</body>
</html>