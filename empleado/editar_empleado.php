<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="../css/general.css" rel="stylesheet" type="text/css">
<link href="../css/icon.css" rel="stylesheet" type="text/css">
<link href="../css/box.css" rel="stylesheet" type="text/css">
<?php error_reporting (0);?>
</head>
<body>
<div class="wrapper">
<form name="form_empleado" method="post" action="guardar_empleado.php">
<div class="block">

    <div class="block_head"> 
    	<div class="imagen_head"><img src="../img/header/empleado.png" width="48" height="43"></div>
    <div class="titulo_head">EDITAR EMPLEADO</div>
    
      <div class="toolbar" id="toolbar">
            <table class="toolbar">
            	<tbody>
                	<tr>     
                    <td>
<button type="submit" class="button">
                   <span class="icon-32-guardar_editar" title="Guardar">
                        </span>
                        Guardar
          			</button>
                    </td>       
                    <td>
                        <a href="index.php" class="toolbar">
                        <span class="icon-32-cancelar" title="Nuevo">
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

<?php
include_once("../clases/clsEmpleado.php");

include_once("../clases/clsTipoUsuario.php");
$objtipousuario=new clsTipoUsuario;
$resultado_tipousuario=$objtipousuario->consultarTipoUsuario();

$id_emp=$_GET["idempleado"];
	
$objempleado=new clsEmpleado;
$resultado=$objempleado->consultarEmpleado('id',$id_emp);
	
while($row=mysql_fetch_array($resultado)){
	$cod=$row["IdEmpleado"];
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
	$idtipousuario=$row["IdTipoUsuario"];
}

?>


<input type="hidden" name="codigo" value="<?php echo $cod ?>">
<input id="accion" name="accion" value="modificar" type="hidden">
    <fieldset class="adminform">
    <legend>Detalles del empleado</legend>
    <table class="admintable">
        <tr>
            <td width="100" class="key">ID:</td>
            <td><?php echo $id_emp ?></td>
        </tr>
        <tr>
            <td class="key">Nombre:</td>
            <td><input type="text" name="nombre" value="<?php echo $nombre ?>" size="25"></td>
        </tr>
        <tr>
            <td class="key">Apellidos:</td>
            <td><input type="text" name="apellido" value="<?php echo $apellido ?>" size="30"></td>
        </tr>
        <tr>
            <td class="key">Sexo:</td>
            <td><label><input type="radio" name="sexo" value="M" <?php if($sexo=='M') print "checked=true"?> />Masculino</label>
		<label><input type="radio" name="sexo" value="F" <?php if($sexo=='F') print "checked=true"?> />Femenino</label></td>
        </tr>
        <tr>
            <td class="key">Fecha de Nacimiento:</td>
            <td><input type="text" name="fechanac" value="<?php echo $fechanac ?>" size="25"></td>
        </tr>
        <tr>
            <td class="key">Dirección:</td>
            <td><input type="text" name="direccion" value="<?php echo $direccion ?>" size="60"></td>
        </tr>
        <tr>
            <td class="key">Teléfono:</td>
            <td><input type="text" name="telefono"value="<?php echo $telefono ?>" size="25"></td>
        </tr>
                <tr>
            <td class="key">Celular:</td>
            <td><input type="text" name="celular" value="<?php echo $celular ?>" size="25"></td>
        </tr>
        <tr>
            <td class="key">Email:</td>
            <td><input type="text" name="email" value="<?php echo $email ?>" size="30"></td>
        </tr>
        <tr>
            <td class="key">DNI:</td>
            <td><input type="text" name="dni" value="<?php echo $dni ?>" size="25"></td>
        </tr>
        <tr>
            <td class="key">Fecha de Ingreso:</td>
            <td><input type="text" name="fechaing"  value="<?php echo $fechaing ?>" size="25"></td>
        </tr>
        <tr>
            <td class="key">Sueldo:</td>
            <td><input type="text" name="sueldo" value="<?php echo $sueldo ?>" size="25"></td>
        </tr>
        <tr>
            <td class="key">Estado:</td>
            <td><label><input type="radio" name="estado" value="ACTIVO" <?php if($estado=='ACTIVO') print "checked=true"?> />ACTIVO</label>
		<label><input type="radio" name="estado" value="INACTIVO" <?php if($estado=='INACTIVO') print "checked=true"?> />INACTIVO</label></td>
        </tr>
<tr>
            <td class="key">Usuario:</td>
            <td><input type="text" name="usuario" value="<?php echo $usuario ?>" size="25"></td>
        </tr>
<tr>
            <td class="key">Contrasena:</td>
            <td><input name="contrasena" type="password" value="<?php echo $contrasena ?>" size="25"></td>
        </tr>
        <tr>
            <td class="key">Tipo de Usuario:</td>
            <td><select name="idtipousuario">
          	<option value="0">Seleccione un tipo de usuario</option>
          <?php
		while($row=mysql_fetch_array($resultado_tipousuario)){
			?>

            <?php 
				if($idtipousuario==$row['IdTipoUsuario']){?>
				 <option value="<?php echo $row['IdTipoUsuario']?>" selected="selected"><?php echo $row['Descripcion']?></option>
				<?php } else { ?>		
				<option value="<?php echo $row['IdTipoUsuario']?>"><?php echo $row['Descripcion']?></option>
				<?php }?>
            
          
            
	<?php } ?>
        </select></td>
        </tr>
    </table>

	</fieldset>




	</div><!--Cierra Block_Content-->
</div><!--Cierra Wrapper-->
</form>
</div><!--Cierra Block-->

</body>
</html>