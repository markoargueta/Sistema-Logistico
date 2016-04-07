<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="../css/general.css" rel="stylesheet" type="text/css">
<link href="../css/box.css" rel="stylesheet" type="text/css">
<link href="../css/Imagenes.css" rel="stylesheet" type="text/css">
<style>
/* Estilo por defecto para validacion */  
input:required:invalid {  border: 1px solid red;  }  input:required:valid {  border: 1px solid green;  }
</style>
</head>
<?php error_reporting (0);?>
<body>

<div class="wrapper">
<form action="guardar_cliente.php" method="post" name="form_cliente">
<div class="block">
    <div class="block_head"> 
    <div class="imagen_head"><img src="../img/Iconfinder/customer.png" width="48" height="45"></div>
    <div class="titulo_head">REGISTRAR CLIENTE</div>
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
    <legend>Detalle del cliente</legend>
    <table class="admintable">
    <tr>
        <td width="100" class="key">Nombre o Razón Social:</td>
        <td colspan="2"><input type="text" name="nombre" size="40" title="Se necesita un nombre o razón social de cliente"  required></td>
    <tr>
        <td width="100" class="key">RUC:</td>
        <td colspan="2"><input type="text" name="ruc" size="25" title="El número de RUC debe contener 11 dígitos" pattern="[0-9]{11}"></td>
    <tr>
        <td width="100" class="key">DNI:</td>
        <td colspan="2"><input type="text" name="dni" size="25" title="El número de DNI debe contener 8 dígitos" pattern="[0-9]{8}"></td>
    </tr>
    <tr>
        <td width="100" class="key">Dirección:</td>
        <td colspan="2"><input type="text" name="direccion" size="60"></td>
    <tr>
        <td width="100" class="key">Teléfono:</td>
        <td colspan="2"><input type="text" name="telefono" size="25"></td>
    </tr>
    <tr>
        <td width="100" class="key">Observación:</td>
        <td colspan="2"><textarea name="observacion" id="textarea" cols="40" rows="2"></textarea></td> 

    </tr>
 	<tr>
        <td width="100" class="key">Nombre de Usuario:</td>
        <td colspan="2"><input type="text" name="usuario" size="25"></td>
    </tr>
 	<tr>
        <td width="100" class="key">Contraseña:</td>
        <td colspan="2"><input type="password" name="contrasena" size="25"><input id="accion" name="accion" value="guardar" type="hidden"></td>
    </tr>    
    </table>
         
    
</fieldset>



</div><!--Cierra Block_Content-->
</div><!--Cierra Wrapper-->
</form>
</div><!--Cierra Block-->



</body>
</html>