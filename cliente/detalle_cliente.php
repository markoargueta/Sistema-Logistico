<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="../css/general.css" rel="stylesheet" type="text/css">
<link href="../css/icon.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php error_reporting (0);?>
<?php
include_once("../clases/clsCliente.php");

$idclie=$_GET['idcliente'];

$objcliente = new clsCliente;
$resultado=$objcliente->consultarClientePorParametro('id',$idclie,'');

while($row=@mysql_fetch_array($resultado)){
		$idcliente=$row["IdCliente"];
		$nombre=$row["Nombre"];
		$ruc=$row["Ruc"];
		$dni=$row["Dni"];
		$direccion=$row["Direccion"];
		$telefono=$row["Telefono"];
		$obsv=$row["Obsv"];
		$usuario=$row["Usuario"];
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
                    <?php
                        echo "<a class='toolbar' href=editar_cliente.php?idcliente=".$idcliente."><span class='icon-32-editar' title='Editar'>
                        </span>Editar</a>"; ?>
     
                    </td>                        
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
    <fieldset class="adminform">
    <legend>Detalles del Cliente</legend>


<table class="admintable">
	<tr>
		<td width="100" class="key">ID:</td>
		<td><?php echo $idcliente?></td>
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
		<td><?php echo $obsv?></td>
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