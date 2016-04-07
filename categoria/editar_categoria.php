<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="../css/general.css" rel="stylesheet" type="text/css">
<link href="../css/icon.css" rel="stylesheet" type="text/css">
<link href="../css/box.css" rel="stylesheet" type="text/css">
<script> 
function enviar_formulario(){ 
   document.form1.submit(); 
} 
</script> 
</head>
<?php error_reporting (0);?>
<body>
<div class="wrapper">
<form name="form1" method="post" action="guardar_categoria.php">
<div class="block">

    <div class="block_head"> 
    	<div class="imagen_head"><img src="../img/header/categoria.png" width="48" height="48"></div>
    <div class="titulo_head">EDITAR CATEGORÍA</div>
    
      <div class="toolbar" id="toolbar">
            <table class="toolbar">
            	<tbody>
                	<tr>     
                    <td>
                    
<!--                        <a href="javascript:document.form1.submit();" class="toolbar">-->
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
include_once("../clases/clsCategoria.php");

$id_cat=$_GET["idcategoria"];
	
$objempleado=new clsCategoria;
$resultado=$objempleado->consultarCategoriaPorParametro('id',$id_cat,'');
	
while($row=@mysql_fetch_array($resultado)){
	$cod=$row["IdCategoria"];
	$idcategoria=$row["IdCategoria"];
	$descripcion=$row["Descripcion"];
}

?>


<input type="hidden" name="codigo" value="<?php echo $cod ?>">
<input id="accion" name="accion" value="modificar" type="hidden">
    <fieldset class="adminform">
    <legend>Detalles de categoría</legend>
    <table class="admintable">
        <tr>
            <td width="100" class="key">ID:</td>
            <td><?php echo $id_cat ?></td>
        </tr>
        <tr>
            <td class="key">Descripción:</td>
            <td><input type="text" name="descripcion" value="<?php echo $descripcion ?>" size="30" title="Se necesita un nombre de categoría" required></td>
        </tr>
    </table>

	</fieldset>




	</div><!--Cierra Block_Content-->
</div><!--Cierra Wrapper-->
</form>
</div><!--Cierra Block-->

</body>
</html>