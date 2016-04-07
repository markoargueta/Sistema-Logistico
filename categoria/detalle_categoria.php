<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="../css/general.css" rel="stylesheet" type="text/css">
<link href="../css/icon.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php error_reporting (0);?>
<?php
include_once("../clases/clsCategoria.php");
$idemp=$_GET['idcategoria'];

$objempleado = new clsCategoria;
$resultado=$objempleado->consultarCategoriaPorParametro('id',$idemp,'');

while($row=@mysql_fetch_array($resultado)){
		$idcategoria=$row["IdCategoria"];
		$descripcion=$row["Descripcion"];
}

?>
<div class="wrapper">
<div class="block">

    <div class="block_head"> 
    	<div class="imagen_head"><img src="../img/header/categoria.png" width="48" height="48"></div>
    	<div class="titulo_head">Gestor de CategorÍas</div>
		
        
 <div class="toolbar" id="toolbar">
            <table class="toolbar">
            	<tbody>
                	<tr>
                    <td>
                    <?php
                        echo "<a class='toolbar' href=editar_categoria.php?idcategoria=".$idcategoria."><span class='icon-32-editar' title='Editar'>
                        </span>Editar</a>"; ?>
     
                    </td>                        
                    <td>
                        <a href="registrar_categoria.php" class="toolbar">
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
        <legend>Detalles de categoría</legend>
      
        <table class="admintable">
            <tr>
                <td width="100" class="key">ID:</td>
                <td><?php echo $idcategoria?></td>
            </tr>
            <tr>
                <td class="key">Descripción:</td>
                <td><?php echo $descripcion?></td>
            </tr>

        </table>
        </fieldset>

    </div><!--Cierra block_content-->
</div><!--Cierra block-->
</div><!--Cierra Wrapper-->

</body>
</html>