<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="../css/general.css" rel="stylesheet" type="text/css">
<link href="../css/icon.css" rel="stylesheet" type="text/css">
<link href="../css/box.css" rel="stylesheet" type="text/css">
</head>
<?php error_reporting (0);?>
<body>
<div class="wrapper">
<form name="form_cliente" method="post" action="guardar_cliente.php">
<div class="block">

    <div class="block_head"> 
    	<div class="imagen_head"><img src="../img/header/cliente.png" width="48" height="45"></div>
    <div class="titulo_head">EDITAR CLIENTE</div>
    
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
include_once("../clases/clsCliente.php");


	$id_clie=$_GET["idcliente"];
	
	$objempleado=new clsCliente;
	$resultado=$objempleado->consultarClientePorParametro('id',$id_clie,'');

	
	while($row=@mysql_fetch_array($resultado)){
		$cod=$row["IdCliente"];
		$idcliente=$row["IdCliente"];
		$nombre=$row["Nombre"];
		$ruc=$row["Ruc"];
		$dni=$row["Dni"];
		$direccion=$row["Direccion"];
		$telefono=$row["Telefono"];
		$observacion=$row["Obsv"];
		$usuario=$row["Usuario"];
		$contrasena=$row["Contrasena"];

	}

?>

<input type="hidden" name="codigo" value="<?php echo $cod ?>">
<input id="accion" name="accion" value="modificar" type="hidden">
    <fieldset class="adminform">
    <legend>Detalles del Cliente</legend>
<table class="admintable">
	<tr>
		<td width="100" class="key">ID:</td>
		<td><?php echo $id_clie ?></td>
	</tr>
	<tr>
		<td class="key">Nombre o Razón Social:</td>
		<td><input type="text" name="nombre" value="<?php echo $nombre ?>" size="40" title="Se necesita un nombre o razón social"  required></td>
	</tr>
	<tr>
		<td class="key">RUC:</td>
		<td><input type="text" name="ruc" value="<?php echo $ruc ?>" size="25"></td>
	</tr>
	<tr>
		<td class="key">DNI:</td>
		<td><input type="text" name="dni" value="<?php echo $dni ?>" size="25"></td>
	</tr>
	<tr>
		<td class="key">Dirección:</td>
		<td><input type="text" name="direccion" value="<?php echo $direccion ?>" size="60"></td>
	</tr>
	<tr>
		<td class="key">Teléfono:</td>
		<td><input type="text" name="telefono" value="<?php echo $telefono ?>" size="25"></td>
	</tr>
	<tr>
		<td class="key">Observación:</td>
		<td><textarea name="observacion"  id="textarea" cols="40" rows="2"><?php print($observacion); ?></textarea></td>
	</tr>        
	<tr>
		<td class="key">Nombre de Usuario:</td>
		<td><input type="text" name="usuario" value="<?php echo $usuario ?>" size="25"></td>
	</tr>
	<tr>
		<td class="key">Contraseña:</td>
		<td><input type="text" name="contrasena" value="<?php echo $contrasena ?>" size="25"></td>
	</tr>    
	
</table>
</fieldset>





	</div><!--Cierra Block_Content-->
</div><!--Cierra Wrapper-->
</form>
</div><!--Cierra Block-->

</BODY>
</HTML>