<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="../css/general.css" rel="stylesheet" type="text/css">
<link href="../css/Imagenes.css" rel="stylesheet" type="text/css">
<style>
/* Estilo por defecto para validacion */  
input:required:invalid {  border: 1px solid red;  }  input:required:valid {  border: 1px solid green;  }
</style>
</head>
<body>

<div class="wrapper">
<form action="guardar_proveedor.php" method="post" name="form_proveedor">
<div class="block">
    <div class="block_head"> 
    <div class="imagen_head"><img src="../img/Iconfinder/provider.png" width="48" height="48"></div>
    <div class="titulo_head">REGISTRAR PROVEEDOR</div>
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
    <legend>Detalle de proveedor</legend>
    <table class="admintable">
    <tr>
        <td class="key">Nombre o Razón Social:</td>
        <td colspan="2"><input type="text" name="nombre" size="30" title="Se necesita un nombre o razón social del proveedor"  required></td>
    </tr>
    <tr>
		<td class="key">RUC:</td>
		<td><input type="text" name="ruc" size="20"></td>
	</tr>
    <tr>
		<td class="key">DNI:</td>
		<td><input type="text" name="dni" size="20"></td>
	</tr>
    <tr>
		<td class="key">Dirección:</td>
		<td><input type="text" name="direccion" size="50"></td>
	</tr>
    <tr>
		<td class="key">Teléfono:</td>
		<td><input type="text" name="telefono" size="20"></td>
	</tr>
    <tr>
		<td class="key">Celular:</td>
		<td><input type="text" name="celular" size="20"></td>
	</tr>
    <tr>
		<td class="key">Email:</td>
		<td><input type="text" name="email" size="30"></td>
	</tr>
    <tr>
		<td class="key">Cuenta Nº 1:</td>
		<td><input type="text" name="cuenta1" size="20"></td>
	</tr>
    <tr>
		<td class="key">Cuenta Nº 2:</td>
		<td><input type="text" name="cuenta2" size="20"></td>
	</tr>
    <tr>
		<td class="key">Estado:</td>
		<td> <label>
            <input name="estado" type="radio" id="estado_0" value="ACTIVO" checked>
            ACTIVO</label>

          <label>
            <input type="radio" name="estado" value="INACTIVO" id="estado_1">
            INACTIVO</label></td>
	</tr>
    <tr>
		<td class="key">Observación:</td>
		<td><textarea name="observacion" id="textarea" cols="40" rows="2"></textarea><input id="accion" name="accion" value="guardar" type="hidden"></td>
	</tr>

    </table>
         
    
</fieldset>

</div><!--Cierra Block_Content-->
</div><!--Cierra Wrapper-->
</form>
</div><!--Cierra Block-->

</body>
</html>