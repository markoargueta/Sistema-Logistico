<html>
<head>
<?php error_reporting (0);?>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="../css/general.css" rel="stylesheet" type="text/css">
<link href="../css/Imagenes.css" rel="stylesheet" type="text/css">
<link href="../css/box.css" rel="stylesheet" type="text/css">
<style>
/* Estilo por defecto para validacion */  
input:required:invalid {  border: 1px solid red;  }  input:required:valid {  border: 1px solid green;  }
</style>
</head>
<body>
<?php
include_once("../clases/clsTipoUsuario.php");
$objtipousuario=new clsTipoUsuario;
$result=$objtipousuario->consultarTipoUsuario();
?>
<div class="wrapper">
<form action="guardar_empleado.php" method="post" name="form_empleado">
<div class="block">
    <div class="block_head"> 
    <div class="imagen_head"><img src="../img/Iconfinder/empleado.png" width="48" height="43"></div>
    <div class="titulo_head">REGISTRAR EMPLEADO</div>
        <div class="toolbar" id="toolbar">
            <table class="toolbar">
            	<tbody>
                	<tr>
					<td>
<button type="submit" class="button">
                   <span class="Guardar" title="Guardar">
                        </span>
                        Guardar
          			</button>
                    </td>                                 
                    <td>
                        <a href="index.php" class="toolbar">
                        <span class="Cancelar" title="Cancelar">
                        </span>
                        Cancelar
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

        <fieldset class="adminform">
        <legend>Detalles</legend>
        <table class="admintable">
        <tr>
            <td width="100" class="key">Nombre:</td>
            <td colspan="2"><input type="text" name="nombre" size="30" title="Se necesita un nombre del empleado" required></td>
        </tr>
        <tr>
            <td width="100" class="key">Apellidos:</td>
            <td colspan="2"><input type="text" name="apellido" size="30" title="Se necesita un apellido del empleado"  required></td>
        </tr>
        <tr>
            <td width="100" class="key">Sexo:</td>
            <td colspan="2"><label>
            <input name="sexo" type="radio" id="sexo_0" value="M" checked>
            Masculino</label>

          <label>
            <input type="radio" name="sexo" value="F" id="sexo_1">
            Femenino</label></td>
        </tr>
        <tr>
            <td width="100" class="key">Fecha de Nacimiento:</td>
            <td colspan="2"><input type="date" name="fechanac" size="25"></td>
        </tr>
        <tr>
            <td width="100" class="key">Dirección:</td>
            <td colspan="2"><input type="text" name="direccion" size="60"></td>
        </tr>
        <tr>
            <td width="100" class="key">Teléfono:</td>
            <td colspan="2"><input type="tel" name="telefono" size="25" pattern="[0-9]{10}"></td>
        </tr>
        <tr>
            <td width="100" class="key">Celular:</td>
            <td colspan="2"><input type="text" name="celular" size="25"></td>
        </tr>
        <tr>
            <td width="100" class="key">Email:</td>
            <td colspan="2"><input type="email" name="email" size="30" title="Ej: ejemplo@hotmail.com"></td>
        </tr>
        <tr>
            <td width="100" class="key">DNI:</td>
            <td colspan="2"><input type="text" name="dni" size="25"></td>
        </tr>  
        <tr>
            <td width="100" class="key">Fecha de Ingreso:</td>
            <td colspan="2"><input type="date" name="fechaing" size="25"></td>
        </tr>
        <tr>
            <td width="100" class="key">Sueldo:</td>
            <td colspan="2"><input type="text" name="sueldo" size="25"></td>
        </tr>
        <tr>
            <td width="100" class="key">Estado:</td>
            <td colspan="2"> <label>
            <input name="estado" type="radio" id="estado_0" value="ACTIVO" checked>
            ACTIVO</label>

          <label>
            <input type="radio" name="estado" value="INACTIVO" id="estado_1">
            INACTIVO</label></td>
        </tr>
        <tr>
            <td width="100" class="key">Usuario:</td>
            <td colspan="2"><input type="text" name="usuario" size="25"></td>
        </tr>
        <tr>
            <td width="100" class="key">Contraseña:</td>
            <td colspan="2"><input type="password" name="contrasena" size="25"></td>
        </tr>
        <tr>
            <td width="100" class="key">Tipo de Usuario:</td>
            <td colspan="2">         <select name="idtipousuario" required>
          			<option value="">- Seleccione un tipo de usuario -</option>
          <?php
		while($row=mysql_fetch_array($result)){?>

            <option value="<?php echo $row['IdTipoUsuario']?>"><?php echo $row['Descripcion']?></option>
	<?php } ?>
        </select>
 <input id="accion" name="accion" value="guardar" type="hidden">
</td>
        </tr>
           
        </table>
    	</fieldset>


</div><!--Cierra Block_Content-->
</div><!--Cierra Wrapper-->
</form>
</div><!--Cierra Block-->

</body>
</html>