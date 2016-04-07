<?php error_reporting (0);?>
<?
    session_start();
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="../css/general.css" rel="stylesheet" type="text/css">
<link href="../css/icon.css" rel="stylesheet" type="text/css">
<link href="../css/paginator.css" rel="stylesheet" type="text/css">
</head>
<body>

<div class="wrapper">
<div class="block">

    <div class="block_head"> 
    	<div class="imagen_head"><img src="../../img/intranet/tipo_usuario.png" width="48" height="48"></div>
    	<div class="titulo_head">Gestor de Tipos de Usuario</div>
        <div class="toolbar" id="toolbar">
            <table class="toolbar">
            	<tbody>
                	<tr>
                    <td>
                        <a href="../permisos/index.php" class="toolbar">
                        <span class="icon-32-seguridad" title="Permisos">
                        </span>
                        Permisos
                        </a>
                    </td>           
                    <td>
                        <a href="registrar_tipousuario.php" class="toolbar">
                        <span class="icon-32-nuevo" title="Nuevo">
                        </span>
                        Nuevo
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

include_once("../clases/clsTipoUsuario.php");
$objtusu=new clsTipoUsuario;
$result=$objtusu->consultarTipoUsuarioPorParametro('','');

?>

<table class="adminlist" cellspacing="1">
<thead>
<tr>
	<th>#</th>
	<th><a href="#">Descripción</a></th>
	<th><a href="#">ID</a></th>
    <th>Ver</th>
	<th>Editar</th>
</tr>
</thead>

<tbody class="adminlist">
<?php


$i=0;
$c=0;

while($row=mysql_fetch_array($result)){
	$i=$i+1;
	if ($c==1){
	echo "<tr class='row1'>";
		$c=2;
	}else{
	    	echo "<tr class='row0'>";
		$c=1;
	}

	echo "<td width='10'>".$i."</td>";
	echo "<td>".$row['Descripcion']."</td>";
	echo "<td width='1%'>".$row['IdTipoUsuario']."</td>";
	echo "<td width='5%' align='center'><a href=detalle_tipousuario.php?idtusu=".$row["IdTipoUsuario"]."><img src='../img/ver.png'></td>";
    echo "<td width='5%' align='center'><a href=editar_tipousuario.php?idtusu=".$row["IdTipoUsuario"]."><img src='../img/editar.png'></td>";
	echo "</tr>";
}

?>
</tbody>
		<tfoot>
			<tr>
				<td colspan="13">&nbsp;</td>
			</tr>
		</tfoot>
</table>
    </div><!--Cierra block_content-->
</div><!--Cierra block-->
</div><!--Cierra Wrapper-->
    
</body>
</html>