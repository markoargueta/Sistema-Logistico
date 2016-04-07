C<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="../css/general.css" rel="stylesheet" type="text/css">
<link href="../css/icon.css" rel="stylesheet" type="text/css">
<link href="../css/box.css" rel="stylesheet" type="text/css">
<style>
/* Estilo por defecto para validacion */  
input:required:invalid {  border: 1px solid red;  }  input:required:valid {  border: 1px solid green;  }
</style>
</head>
<body>
</head>
<body>
<div class="wrapper">
<form name="form_proveedor" method="post" action="guardar_proveedor.php">
<div class="block">

    <div class="block_head"> 
    	<div class="imagen_head"><img src="../img/header/categoria.png" width="48" height="48"></div>
    <div class="titulo_head">EDITAR PROVEEDOR</div>
    
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
include_once("../clases/clsProveedor.php");


	
	$idprov=$_GET["idproveedor"];
	
	$objproveedor=new clsProveedor;
	$resultado=$objproveedor->consultarProveedorPorParametro('id',$idprov,'');

	
	while($row=@mysql_fetch_array($resultado)){
		$cod=$row["IdProveedor"];
		$idproveedor=$row["IdProveedor"];
		$nombre=$row["Nombre"];
		$ruc=$row["Ruc"];
		$dni=$row["Dni"];
		$direccion=$row["Direccion"];
		$telefono=$row["Telefono"];
		$celular=$row["Celular"];
		$email=$row["Email"];
		$cuenta1=$row["Cuenta1"];
		$cuenta2=$row["Cuenta2"];
		$estado=$row["Estado"];
		$obsv=$row["Obsv"];

	}

?>


<input type="hidden" name="codigo" value="<?php echo $cod ?>">
<input id="accion" name="accion" value="modificar" type="hidden">
    <fieldset class="adminform">
    <legend>Detalles del proveedor</legend>
    <table class="admintable">
	<tr>
		<td width="100" class="key">ID:</td>
		<td><?php echo $idprov ?></td>
	</tr>
    <tr>
		<td class="key">Nombre o Razón Social:</td>
		<td><input type="text" name="nombre" value="<?php echo $nombre ?>" size="30" title="Se necesita un nombre o razón social del proveedor"  required></td>
	</tr>
    <tr>
		<td class="key">RUC:</td>
		<td><input type="text" name="ruc" value="<?php echo $ruc ?>" size="20"></td>
	</tr>
    <tr>
		<td class="key">DNI:</td>
		<td><input type="text" name="dni" value="<?php echo $dni ?>" size="20"></td>
	</tr>
    <tr>
		<td class="key">Dirección:</td>
		<td><input type="text" name="direccion" value="<?php echo $direccion ?>" size="50"></td>
	</tr>
    <tr>
		<td class="key">Teléfono:</td>
		<td><input type="text" name="telefono" value="<?php echo $telefono ?>" size="20"></td>
	</tr>
    <tr>
		<td class="key">Celular:</td>
		<td><input type="text" name="celular" value="<?php echo $celular ?>" size="20"></td>
	</tr>
    <tr>
		<td class="key">Email:</td>
		<td><input type="text" name="email" value="<?php echo $email ?>" size="30"></td>
	</tr>
    <tr>
		<td class="key">Cuenta Nº 1:</td>
		<td><input type="text" name="cuenta1" value="<?php echo $cuenta1 ?>" size="20"></td>
	</tr>
    <tr>
		<td class="key">Cuenta Nº 2:</td>
		<td><input type="text" name="cuenta2" value="<?php echo $cuenta2 ?>" size="20"></td>
	</tr>
    <tr>
		<td class="key">Estado:</td>
		<td><label><input type="radio" name="estado" value="ACTIVO" <?php if($estado=='ACTIVO') print "checked=true"?> />ACTIVO</label>
		<label><input type="radio" name="estado" value="INACTIVO" <?php if($estado=='INACTIVO') print "checked=true"?> />INACTIVO</label></td>
	</tr>
    <tr>
		<td class="key">Observación:</td>
		<td><textarea name="observacion"  id="textarea" cols="40" rows="2"><?php print($obsv); ?></textarea></td>
	</tr>
</table>
</fieldset>




	</div><!--Cierra Block_Content-->
</div><!--Cierra Wrapper-->
</form>
</div><!--Cierra Block-->

</body>
</body>