<html>
<?php error_reporting (0);?>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="../../css/back-end/general.css" rel="stylesheet" type="text/css">
<link href="../../css/back-end/icon.css" rel="stylesheet" type="text/css">
<link href="../../css/back-end/box.css" rel="stylesheet" type="text/css">
<style>
/* Estilo por defecto para validacion */  
input:required:invalid {  border: 1px solid red;  }  input:required:valid {  border: 1px solid green;  }
</style>
</head>
<body>

<div class="wrapper">
    <form action="guardar_tipousuario.php" method="post" name="form1">
<div class="block">
    <div class="block_head"> 
    <div class="imagen_head"><img src="../img/header/categoria.png" width="48" height="48"></div>
    <div class="titulo_head">REGISTRAR TIPO DE USUARIO</div>
        <div class="toolbar" id="toolbar">
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
                    <td id="toolbar-new">
                        <a href="index.php" class="toolbar">
                        <span class="icon-32-cancelar" title="Cancelar">
                        </span>
                        Cancelar
                        </a>
                    </td>               
                    <td id="toolbar-new">
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
        <legend>Detalle de Tipo de Usuario</legend>
        <table class="admintable">
        <tr>
            <td width="100" class="key">Descripción:</td>
            <td colspan="2"><input type="text" name="descripcion" id="descripcion" size="30" title="Se necesita un nombre de categoría"  required><input id="accion" name="accion" value="guardar" type="hidden"></td>
        </tr>
        </table>
    	</fieldset>


</div><!--Cierra Block_Content-->
</div><!--Cierra Wrapper-->
    </form>
</div><!--Cierra Block-->

</body>
</html>