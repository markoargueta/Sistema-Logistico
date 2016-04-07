<?

    error_reporting(0);
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="../css/general.css" rel="stylesheet" type="text/css">
<link href="../css/Imagenes.css" rel="stylesheet" type="text/css">
<link href="../css/box.css" rel="stylesheet" type="text/css">
<link href="../css/venta.css" rel="stylesheet" type="text/css">
<style>
/* Estilo por defecto para validacion */  
input:required:invalid {  border: 1px solid red;  }  input:required:valid {  border: 1px solid green;  }
</style>
<link rel="stylesheet" type="text/css" href="css/style_v.css" /> 
<script type="text/javascript" src="js/ajax.js"></script> 
<script type="text/javascript" src="js/jquery.min.js"></script> 
<script type="text/javascript" src="js/jquery.leanModal.min.js"></script> 
<script type="text/javascript"> 
	$(function() {
    	$('a[rel*=leanModal]').leanModal({ top : 200, closeButton: ".modal_close" });		
	});
</script> 
<script> 
function enviar_formulario_directo(){
	var idtipodoc_compra=document.datos.idtipodocumento.value;
	var idprov_compra=document.datos.txtIdProveedor.value;
	var num_compra=document.datos.txtNumCompra.value;
	window.location.href="index.php?action=guardar_directo&idtipodoc="+idtipodoc_compra+"&idproveedor="+idprov_compra+"&numcompra="+num_compra; 

}
function enviar_formulario(){
	var pago_compra = document.contado.txtPago.value;
	var idtipodoc_compra=document.datos.idtipodocumento.value;
	var idprov_compra=document.datos.txtIdProveedor.value;
	parent.location.href="index.php?action=guardar&pago="+pago_compra+"&idtipodoc="+idtipodoc_compra+"&idproveedor="+idprov_compra; 

} 
</script>        
</head>
<body>
<div class="wrapper">

<div class="block">
    <div class="block_head"> 
    <div class="imagen_head"><img src="../img/Iconfinder/generar_compras.png" width="48" height="43"></div>
    <div class="titulo_head">GESTOR DE COMPRAS</div>
        <div class="toolbar" id="toolbar">
            <table class="toolbar">
            	<tbody>
                	<tr>
                                       
					<td>
           		<button type="submit" class="button" onClick="enviar_formulario_directo();">
              <!-- <button type="submit" class="button" onClick="parent:location='index.php?action=guardar_directo';">-->
                   <span style="background-image:url('../img/Iconfinder/Generate-tables.png')" title="Generar Compra">
                    </span>
                        Generar compra
          			</button>
                    </td>                                 
                
            
                  <td id="toolbar-new">
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

<p>

<?php
include_once("../clases/clsCarritoCompra.php");
include_once("../clases/clsCompra.php");
include_once("../clases/clsTipoDocumento.php");
include_once("../clases/clsProveedor.php");

$objCompra = new clsCompra;
$num_compra=$objCompra->generarNumCompra();


$objTipoDoc=new clsTipoDocumento;
$result_td=$objTipoDoc->consultarTipoDocumento();

if(isset ($_GET['IdProveedor'])){
	$id_proveedor=$_GET["IdProveedor"];
}else{
	$id_proveedor=1;
}


$objProveedor=new clsProveedor;
$result_prov=$objProveedor->consultarProveedorPorParametro('id',$id_proveedor,'');

while($row_prov=mysql_fetch_array($result_prov)){
	$idproveedor=$row_prov['IdProveedor'];
	$nomproveedor=$row_prov['Nombre'];
}

//Llenar cesta
session_start();

//Creamos al objeto carrito vacio
$carrito = new Carrito(session_id());

//Recupero el objeto carrito de la sesion en caso exista
if(isset($_SESSION['carrito'])) $carrito = $_SESSION['carrito'];

if(isset ($_GET['action'])){
    switch ($_GET['action']){
        case 'agregar':	
			$idprod=(int)$_GET['idProducto'];
			if($idprod!=""){
				$productoDAO = new clsCompra;
				$producto = $productoDAO->consultarProductoPorCodigo($idprod);
				$carrito->agregarProducto($producto);
			}
			
        break;

        case 'vacear':
            $carrito = new Carrito(session_id());
        break;

        case 'eliminar':
            $carrito->eliminarProducto((int)$_GET['idProducto']);
            break;

        case 'actualizar': 
		foreach($_GET as $codigo => $cantidad){
			if((int)$codigo > 0 && (int)$cantidad > 0){
				//Actualizamos la cantidad para un mismo producto
				$carrito->actualizarCantidadIngresada($codigo, $cantidad);
			}
		}          
        break;
		case 'guardar_directo':

			if($carrito->calcularTotalPagar()>0){
			
			$id_tipodoc=$_GET['idtipodoc'];
			$id_prov=$_GET['idproveedor'];
			$num_compra=$_GET['numcompra'];
//			$id_emp=$_GET['txtIdEmp'];

			$id_emp="1";
			$estado="EMITIDO";
			

       		$productoDAO = new clsCompra();
			$facnum = $productoDAO->guardarFactura($carrito->productos,$id_tipodoc,$id_prov,$id_emp,$num_compra,$carrito->calcularValorCompra(),$carrito->calcularIva(),$carrito->calcularTotalPagar(),$estado);

				header("Location: verificar_compra.php?estado=efectuado&total_pago=".$carrito->calcularTotalPagar()."&pago=".$carrito->calcularTotalPagar());
			}else{
				header('Location: verificar_compra.php?estado=pendiente');
			}
			exit();
		break;
        case 'guardar':
		$pago=$_GET["pago"];
		if($pago>$carrito->calcularTotalPagar()&&$carrito->calcularTotalPagar()>0){
			

			$id_tipodoc=$_GET['idtipodoc'];
			$id_prov=$_GET['idproveedor'];
//			$id_emp=$_GET['txtIdEmp'];
	
			$id_emp="1";
			$estado="EMITIDO";
			
       		$productoDAO = new clsCompra();
$facnum = $productoDAO->guardarFactura($carrito->productos,$id_tipodoc,$id_prov,$id_emp,$num_compra,$carrito->calcularValorCompra(),$carrito->calcularIva(),$carrito->calcularTotalPagar(),$estado);

				header("Location: verificar_compra.php?estado=efectuado&total_pago=".$carrito->calcularTotalPagar()."&pago=".$pago);
			}else{
				header('Location: verificar_compra.php?estado=pendiente');
			}
			exit();
		break;
    }
    
//Guardo nuevamente el carrito de la session
$_SESSION['carrito'] = $carrito;
header('Location: index.php');
exit(); //Paramos el script
}
?>

 
  
  
<?php
$cod=$_GET["txtCodigo"];
$objProducto = new clsCompra;
$producto= $objProducto->consultarProductoPorCodigo($cod);

$id=$producto->idpro;
$cod=$producto->codpro;
$nom=$producto->nompro;
$stock=$producto->stockpro;
$cost=$producto->costpro;




if(isset($_POST['Buscar_codigo'])){
$cod=$_POST["txtCodigo"];
$objProducto = new clsCompra;
$producto= $objProducto->consultarProductoPorCodigo($cod);

$id=$producto->idpro;
$cod=$producto->codpro;
$nom=$producto->nompro;
$stock=$producto->stockpro;
$cost=$producto->costpro;

}
?>
<div class="zona_producto"><form name="form2" method="post" action="index.php">
  <fieldset class="adminform">
    <legend>Datos del Producto</legend>  
  <table width="100%" border="0" class="admintable">
    <tr>
      <td class="key">
        <input type="hidden" name="txtId" value="<?php echo $id ?>">
        Código de Barras:  </td>
      <td align="20%"><input name="txtCodigo" type="text" value="<?php echo $cod ?>" size="17">
        <input type="submit" name="Buscar_codigo"  class="button_p" value="" id="boton_buscar">&nbsp;&nbsp;&nbsp;<a href="#myprod" rel="leanModal" name="signup" class="button_p" title="Buscar producto" style="paddin-top:10px"><img src="../img/Iconfinder/page_edit.png"></a></td>
      <td class="key"><span class="key">
        Precio:</span></td>
      <td align="20%"><input name="textfield2" type="text" disabled id="textfield2" value="<?php echo $cost ?>" size="8" style="text-align:center"></td>
      </tr>
    <tr>
      <td  class="key">Nombre: </td>
      <td align="20%"><input name="textfield" type="text" disabled id="textfield" value="<?php echo $nom ?>" size="35"></td>
      <td align="20%" class="key">Stock:</td>
      <td align="20%"><input name="textfield3" type="text" disabled id="textfield3" value="<?php echo $stock ?>" size="8" style="text-align:center"></td>
      </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="20%">&nbsp;</td>
      <td align="20%">&nbsp;</td>
      <td align="center"><a href="javascript:void(0);" onClick="window.location='index.php?action=agregar&idProducto=<?php echo $producto->codpro ;?>';"  class="button_p" id="boton_agregar" ><img src="../img/Iconfinder/agregar_venta.png"></a></td>
      </tr>
    
  </table>
  </fieldset>
</form>

<form name="detalle" action="index.php" method="get">

<?php

	$total = 0;
	if(count($carrito->productos)>0){
?>

	
	<table class="adminlist">
    <thead>
    <tr>
        <th>#</th>
        <th><a href="#">Cant.</a></th>
        <th><a href="#">C&oacute;digo</a></th>
        <th><a href="#">Nombre</a></th>
        <th><a href="#">Precio Cost.</a></th>
        <th><a href="#">Precio Total</a></th>
        <th>&nbsp;</th>
	</tr>
    </thead>
    <tbody class="adminlist">
	<?php
	$i=0;
    foreach($carrito->productos as $producto){
	$i++;
		if ($c==1){
	echo "<tr class='row1'>";
		$c=2;
	}else{
	    	echo "<tr class='row0'>";
		$c=1;
	}
    ?>
       
            <td width="10"><?php echo $i ?></td>
            <td width="30" align="center"><input type="text" name="<?php echo $producto->codpro ;?>" value="<?php echo $producto->cantidad ;?>" maxlength="3" size="4" style="text-align: center" /></td>
            <td align="center"><?php echo $producto->codpro ;?></td>
            <td align="left"><?php echo $producto->nompro ;?></td>                  
            <td width="20" align="center">$<?php echo $producto->costpro ;?></td>
            <td width="20"align="center">$<?php echo $producto->precioTotal() ;?></td>
            <td width="5%" align="center"><a href="javascript:void(0);" onClick="window.location='index.php?action=eliminar&idProducto=<?php echo $producto->codpro ;?>';"><img src="../img/icon/eliminar.png"></a></td>
        </tr>
	<?php
    }
    ?>
    </tbody>
    <tfoot>
			<tr>
				<td colspan="13">&nbsp;</td>
			</tr>
	</tfoot>
  </table>
	<br>
<center><input type="button" value="Limpiar Cesta" class="btn_operaciones" style="width:130px;" onClick="parent:location='index.php?action=vacear'"/>
<input type="hidden" name="action" value="actualizar"  style="width:130px;"/>
<input type="submit" value="Actualizar" class="btn_operaciones"  style="width:130px;" ></center>
<!--<input type="button" value="Grabar" class="btn_operaciones" style="width: 130px" onClick="parent:location='index.php?action=guardar';">-->
     <?php
     }else
     	echo "<div class='box-info'>No tiene ningun producto en la cesta</div>";
     ?>



</form> <!--Cierra form detalle-->
           		
 
                


</div>

<div class="zona_datos">
<form name="datos" action="index.php" method="get">
<table width="100%" border="0">
  <tr>
    <td width="32%"><div class="total_venta" style="font-size:35px"><center><?php echo '$ '.number_format($carrito->calcularTotalPagar(), 2, '.', ''); ?></center></div></td>
  </tr>
  <tr>
    <td>
      <div class="box_1">
        <table width="271" border="0">
          <tr>
            <td align="center">&nbsp;&nbsp;</td>
            <td align="center"><b>Nº DE COMPRA</b></td>
            <td align="center">&nbsp;&nbsp;</td>
            </tr>
          <tr>
            <td align="center">&nbsp;</td>
            <td align="center">
              <input name="txtNumCompra" type="text" id="textfield4" value="<?php echo $num_compra ?>" size="30" style="text-align:center">
              </td>
            <td align="center">&nbsp;</td>
            </tr>
          </table>
        </div>
      <br>
      <div class="box_1">
        <table width="100%" border="0">
          <tr>
            <td>Nombre del proveedor (Opcional): </td>
            </tr>
          <tr>
            <td><input type="hidden" name="txtIdProveedor" value="<?php echo $idproveedor ?>"><input name="txtNomProv" type="text" disabled size="25" value="<?php echo $nomproveedor ?>">&nbsp;&nbsp;&nbsp;<a href="#myprov" rel="leanModal" name="myprov" class="button_p" title="Buscar producto"><img src="../img/icon/buscar_detalle.png"></a></td>
            </tr>
          <tr>
            <td>Tipo de documento: <select name="idtipodocumento">
              <?php
		while($row=mysql_fetch_array($result_td)){?>
              
              <option value="<?php echo $row['IdTipoDocumento']?>"><?php echo $row['Descripcion']?></option>
              <?php } ?>
              </select>  </td>
            </tr>
          
          </table>
        </div>
      <br>
      <div class="box_1">
        
        <table width="100%" border="0">
          <tr>
            <td class="txt_box">Cantidad de Productos:</td>
            <td align="right"><?php echo $carrito->calcularCantidad(); ?></td>
            </tr>
          <tr>
            <td class="txt_box">Valor Venta:</td>
            <td align="right"><?php echo "$ ".$carrito->calcularValorCompra(); ?></td>
            </tr>

          <tr>
            <td sclass="txt_box">IVA %: </td>
            <td align="right"><?php echo "$ ".$carrito->calcularIva(); ?></td>
            </tr>
          </table>
        <br>
        <div class="box_1_1">
          <table width="100%" border="0">
            <tr>
              <td class="txt_box_bottom">Total a Pagar:</td>
              <td class="txt_box_bottom" align="right"><?php echo "$ ". $carrito->calcularTotalPagar(); ?></td>
              </tr>
            </table>
          </div>
      </div></td>
  </tr>
</table>
</form><!-- form datos -->

</div>

<?php


$v_cliente="12345";




?>

<!------------------------------Modal -- myProducto --------------------------->
<div id="myprod">


<div class="modal-header">    
    <div class="txt-title">BUSCAR PRODUCTO</div>
    <a class="modal_close" href="#" title="Cerrar"></a> 
</div><!-- modal-header -->

<div class="modal-body">

<form name="form_producto" action="#" method="post" enctype="multipart/form-data">
Filtro:<input type="text" name="txtDato_producto" id="txtDato_producto">
<select name="cboCriterio_producto" id="cboCriterio_producto">
  <option>- Seleccione Criterio -</option>
  <option value="codigo">Código</option>
  <option value="nombre">Nombre</option>
  <option value="descripcion">Descripción</option>
  <option value="categoria">Categoría</option>
</select>
<input type="button" name="button" id="button" onClick="enviarParametrosProducto()" value="Buscar">


</form>
    	    
            
<table class="adminlist" cellspacing="1">
    <thead>
        <tr>
            <th>#</th>
            <th><a href="#">Código</a></th>
            <th><a href="#">Nombre</a></th>
            <th><a href="#">Descripción</a></th>
            <th><a href="#">Stock</a></th>
            <th><a href="#">Precio Costo</a></th>
            <th><a href="#">Estado</a></th>
            <th><a href="#">Categoría</a></th>
            <th><a href="#">ID</a></th>

		</tr>
	</thead>

	<tbody class="adminlist" id="table_body_producto">
 
		</tbody>
		<tfoot>
			<tr>
				<td colspan="13">                
                </td>
			</tr>
		</tfoot>
	</table>


</div><!-- moda-body -->
</div><!-- Cierra myProducto -->
<!------------------------------Modal -- myProveedor --------------------------->
<div id="myprov">


<div class="modal-header">    
    <div class="txt-title">BUSCAR PROVEEDOR</div>
    <a class="modal_close" href="#" title="Cerrar"></a> 
</div><!-- modal-header -->

<div class="modal-body">

<form name="form_proveedor" action="#" method="post" enctype="multipart/form-data" id="form_proveedor">
Filtro:<input type="text" name="txtDato_proveedor" id="txtDato_proveedor">
<select name="cboCriterio_proveedor" id="cboCriterio_proveedor">
  <option>- Seleccione Criterio -</option>
  <option value="nombre">Nombre o Razón Social</option>
  <option value="ruc">RUC</option>
  <option value="dni">DNI</option>
</select>
<input type="button" name="button" id="button" onClick="enviarParametrosProveedor()" value="Buscar">


</form>
    	    
            
<table class="adminlist" cellspacing="1">
    <thead>
        <tr>
            <th>#</th>
            <th><a href="#">Nombre</a></th>
            <th><a href="#">RUC</a></th>
            <th><a href="#">DNI</a></th>
            <th><a href="#">Dirección</a></th>
            <th><a href="#">Teléfono</a></th>
            <th><a href="#">Estado</a></th>
            <th><a href="#">ID</a></th>

		</tr>
	</thead>

	<tbody class="adminlist" id="table_body_proveedor">
 
		</tbody>
		<tfoot>
			<tr>
				<td colspan="13">                
                </td>
			</tr>
		</tfoot>
	</table>


</div><!-- moda-body -->

</div><!-- Cierra myCliente -->






</div><!--Cierra Block_Content-->
</div><!--Cierra Wrapper-->

</div><!--Cierra Block-->

</body>
</html>