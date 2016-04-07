<?
    session_start();
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="../../css/back-end/general.css" rel="stylesheet" type="text/css">
<link href="../../css/back-end/icon.css" rel="stylesheet" type="text/css">
<link href="../../css/back-end/paginator.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
include_once("../clases/clsTipoUsuario.php");
$objtipousuario=new clsTipoUsuario;
$result=$objtipousuario->consultarTipoUsuario();
?>
<div class="wrapper">
<div class="block">

    <div class="block_head"> 
    	<div class="imagen_head"><img src="../../img/intranet/seguridad.png" width="48" height="48"></div>
    	<div class="titulo_head">Gestor de Permisos</div>
        
        <div class="toolbar" id="toolbar">
        <form id="Frmpermisos" method="post" action="asignar_permisos.php">
           <table class="toolbar">
            	<tbody>
                <tr>      
                <td>
            		<button type="submit" class="button">
                   <span class="icon-32-guardar" title="Guardar">
                        </span>
                        Guardar
          			</button>
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
    <?php $mensaje = $_GET['mensaje'];
	if ($mensaje != "")
	{
	?>    
    <div class="box-info"><?php echo $mensaje ?></div>
	<?php 
	}
	?>

<p>
  <select name="tipo_usu" required>
    <option value="">Seleccione un tipo de usuario</option>
    <?php
		while($row=mysql_fetch_array($result)){?>
    
    <option value="<?php echo $row['Descripcion']?>"><?php echo $row['Descripcion']?></option>
    <?php } ?>
  </select>
</p>
 <input name="estado" type="radio" id="estado_0" value="permitir" checked>
            Permitir</label>

        <label>
            <input type="radio" name="estado" value="denegar" id="estado_1">
            Denegar</label>
                
<table class="adminlist" cellspacing="1">
  <thead>
<tr>
	<th>#</th>
	<th><a href="#">Tabla</a></th>
	<th><a href="#">Select</a></th>
    <th><a href="#">Insert</a></th>
	<th><a href="#">Update</a></th>
</tr>
</thead>

<tbody class="adminlist">
	<tr>
    <td>1</td>
    <td>Categoria</td>
    <td align="center"><input type="checkbox" name="Scat"></td>
    <td align="center"><input type="checkbox" name="Icat"></td>
    <td align="center"><input type="checkbox" name="Ucat"></td>
    </tr>
    <tr>
    <td>2</td>
    <td>Cliente</td>
    <td align="center"><input type="checkbox" name="Scli"></td>
    <td align="center"><input type="checkbox" name="Icli"></td>
    <td align="center"><input type="checkbox" name="Ucli"></td>
    </tr>
    <tr>
    <td>3</td>
    <td>Compra</td>
    <td align="center"><input type="checkbox" name="Scomp"></td>
    <td align="center"><input type="checkbox" name="Icomp"></td>
    <td align="center"><input type="checkbox" name="Ucomp"></td>
    </tr>
    <tr>
    <td>4</td>
    <td>Detalle Compra</td>
    <td align="center"><input type="checkbox" name="Sdcomp"></td>
    <td align="center"><input type="checkbox" name="Idcomp"></td>
    <td align="center"><input type="checkbox" name="Udcomp"></td>
    </tr>
    <tr>
    <td>5</td>
    <td>Venta</td>
    <td align="center"><input type="checkbox" name="Svent"></td>
    <td align="center"><input type="checkbox" name="Ivent"></td>
    <td align="center"><input type="checkbox" name="Uvent"></td>
    </tr>
    <tr>
    <td>6</td>
    <td>Detalle Venta</td>
    <td align="center"><input type="checkbox" name="Sdvent"></td>
    <td align="center"><input type="checkbox" name="Idvent"></td>
    <td align="center"><input type="checkbox" name="Udvent"></td>
    </tr>
    <tr>
    <td>7</td>
    <td>Empleado</td>
    <td align="center"><input type="checkbox" name="Semp"></td>
    <td align="center"><input type="checkbox" name="Iemp"></td>
    <td align="center"><input type="checkbox" name="Uemp"></td>
    </tr>
    <tr>
    <td>8</td>
    <td>Producto</td>
    <td align="center"><input type="checkbox" name="Sprod"></td>
    <td align="center"><input type="checkbox" name="Iprod"></td>
    <td align="center"><input type="checkbox" name="Uprod"></td>
    </tr>
    <tr>
    <td>9</td>
    <td>Proveedor</td>
    <td align="center"><input type="checkbox" name="Sprov"></td>
    <td align="center"><input type="checkbox" name="Iprov"></td>
    <td align="center"><input type="checkbox" name="Uprov"></td>
    </tr>
    <tr>
    <td>10</td>
    <td>Tipo Documento</td>
    <td align="center"><input type="checkbox" name="Stdoc"></td>
    <td align="center"><input type="checkbox" name="Itdoc"></td>
    <td align="center"><input type="checkbox" name="Utdoc"></td>
    </tr>
    <tr>
    <td>11</td>
    <td>Tipo Usuario</td>
    <td align="center"><input type="checkbox" name="Stusu"></td>
    <td align="center"><input type="checkbox" name="Itusu"></td>
    <td align="center"><input type="checkbox" name="Utusu"></td>
    </tr>
    <td>12</td>
    <td>Pedido</td>
    <td align="center"><input type="checkbox" name="Sped"></td>
    <td align="center"><input type="checkbox" name="Iped"></td>
    <td align="center"><input type="checkbox" name="Uped"></td>
    </tr>
    <td>13</td>
    <td>Detalle Pedido</td>
    <td align="center"><input type="checkbox" name="Sdped"></td>
    <td align="center"><input type="checkbox" name="Idped"></td>
    <td align="center"><input type="checkbox" name="Udped"></td>
    </tr>
</tbody>
		<tfoot>
			<tr>
				<td colspan="13">
               
                </td>
			</tr>
		</tfoot>
</table>
</form>
    </div><!--Cierra block_content-->
</div><!--Cierra block-->
</div><!--Cierra Wrapper-->
    
</body>
</html>