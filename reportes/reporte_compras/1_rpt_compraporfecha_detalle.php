<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="../../css/general.css" rel="stylesheet" type="text/css">
<link href="../../css/icon.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
include_once("../../clases/clsCompra.php");
$idcompra=$_GET['idcompra'];

$objCompra = new clsCompra;
$result=$objCompra->consultarCompraPorParametro('id',$idcompra);

while($row=@mysql_fetch_array($result)){
		$tipodoc=$row["TipoDocumento"];
		$proveedor=$row["Proveedor"];
		$empleado=$row["Empleado"];
		$numero=$row["Numero"];
		$fecha=$row["Fecha"];
		$subtotal=$row["SubTotal"];
		$iva=$row["Iva"];
		$total=$row["Total"];
		$estado=$row["Estado"];
}

?>
<div class="wrapper">
<div class="block">

    <div class="block_head"> 
    	<div class="imagen_head"><img src="../../img/header/rpt_compra.png" width="48" height="48"></div>
    	<div class="titulo_head">INFORME DE COMPRAS AL DETALLE</div>
		
        
 <div class="toolbar" id="toolbar">
            <table class="toolbar">
            	<tbody>
                	<tr>                      

                    <td>
                        <a href="1_rpt_compraporfecha.php" class="toolbar">
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
        <legend>Datos de la compra</legend>
      
        <table class="admintable">
            <tr>
                <td width="100" class="key">Nº de compra:</td>
                <td><?php echo $numero?></td>
            </tr>
            <tr>
                <td class="key">Fecha:</td>
                <td><?php echo $fecha?></td>
            </tr>
            <tr>
                <td class="key">Documento:</td>
                <td><?php echo $tipodoc?></td>
            </tr>
            <tr>
                <td class="key">Proveedor:</td>
                <td><?php echo $proveedor?></td>
            </tr>
            <tr>
                <td class="key">Empleado:</td>
                <td><?php echo $empleado?></td>
            </tr>
            <tr>
                <td class="key">Sub Total:</td>
                <td><?php echo "$ ".$subtotal?></td>
            </tr>
            <tr>
                <td class="key">IVA:</td>
                <td><?php echo "$ ".$iva?></td>
            </tr>
            <tr>
                <td class="key">Total:</td>
                <td><?php echo "<b>$ ".$total."</b>"?></td>
            </tr>
            <tr>
                <td class="key">Estado:</td>
                <td><?php echo $estado?></td>
            </tr>            
        </table>
        </fieldset>

</fieldset>
<fieldset class="adminform">
<legend>Detalle de la compra</legend>
<table class="adminlist" cellspacing="1">
<thead>
<tr>
	<th>#</th>
	<th><a href="#">Código Bar.</a></th>
   	<th><a href="#">Nombre</a></th>
   	<th><a href="#">Descripción</a></th>
	<th><a href="#">Cantidad</a></th>    
	<th><a href="#">Precio cost.</a></th>
	<th><a href="#">Total</a></th> 
	<th><a href="#">ID</a></th>
</tr>
</thead>

<tbody class="adminlist">

<?php
include_once("../../clases/clsDetalleCompra.php");
$objDetalle = new clsDetalleCompra;
$result_det=$objDetalle->consultarDetalleCompraPorParametro('id',$idcompra);



$c=0;
$i=0;

while($row=mysql_fetch_array($result_det)){
	$i=$i+1;
	if ($c==1){
	echo "<tr class='row1'>";
		$c=2;
	}else{
	    	echo "<tr class='row0'>";
		$c=1;
	}

	echo "<td width='10'>".$i."</td>";
	echo "<td align='center'>".$row['Codigo']."</td>";
	echo "<td>".$row['Nombre']."</td>";
	echo "<td>".$row['Descripcion']."</td>";
	echo "<td align='center'>".$row['Cantidad']."</td>";
	echo "<td align='center'>"."$ ".$row['Precio']."</td>";
	echo "<td align='center'>"."$ ".$row['Total']."</td>";
	echo "<td align='center'>".$row['IdCompra']."</td>";
	echo "</tr>";
}

?>
</tbody>
		<tfoot>
			<tr>
				<td colspan="13">
               <div align="left" style="padding:4px 0px 4px 4px;"><?php echo "Se cargaron ".$i." productos" ?></div>
                
                </td>
			</tr>
		</tfoot>
</table>
</fieldset>
</div><!--Cierra block_content-->
</div><!--Cierra block-->
</div><!--Cierra Wrapper-->

</body>
</html>