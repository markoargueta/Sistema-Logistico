<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../css/general.css" rel="stylesheet" type="text/css">
<link href="../../css/Imagenes.css" rel="stylesheet" type="text/css">
<link href="../../css/paginator.css" rel="stylesheet" type="text/css">
<style>
fieldset
{
	background-image: url(../../img/icon/fondo_png.png);
	background-repeat:repeat;
    margin-bottom: 10px;
    border: 1px #ccc solid;
	border-radius:6px;
    padding: 5px;
    text-align: left;
	box-shadow:0 2px 2px -2px rgba(0,0,0,0.2);
	float:right;
	width:400px;
}

fieldset p {  margin: 10px 0px;  }

legend    {
    color: #0B55C4;
    font-size: 12px;
    font-weight: bold;
}

fieldset.informe { border: 1px solid #ccc; margin: 0 10px 10px 10px; }

.input_text{
	border-radius:3px;
	border: 1px #ccc solid;
	text-align:center;
	font-family: Arial, Helvetica, sans-serif;
	font-size:16px;
	font-weight:bold;
	color:#000;
	height:30px;
	/*box-shadow: inset 0 0 0.3em  #CCCCCC;*/
}
.input_text#total{
		background-color: #FFC;
}

</style>
<script>
function enviarPDF()
{
	var fi=document.datos.fechaini.value;
	var ff=document.datos.fechafin.value;
	window.open("2_rpt_pdf_ventapordetalle.php?fechaini="+fi+"&fechafin="+ff,'win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=640,height=480,directories=no,location=no');
return false;
	
}
function enviarPrinter()
{
	var fi=document.datos.fechaini.value;
	var ff=document.datos.fechafin.value;
	window.open("2_rpt_printer_ventapordetalle.php?fechaini="+fi+"&fechafin="+ff,'win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=640,height=480,directories=no,location=no');
return false;
	
}
</script>
</head>
<body>

<div class="wrapper">
<div class="block">

    <div class="block_head"> 
    	<div class="imagen_head"><img src="../../img/header/rpt_venta_detalle.png" width="48" height="48"></div>
    	<div class="titulo_head">INFORME DE VENTAS POR DETALLE</div>
        <div class="toolbar" id="toolbar">
            <table class="toolbar">
            	<tbody>
                	<tr>
                                       <td>
                       <button type="submit" class="button" onClick="enviarPrinter();">
                   <span class="Imprimir" title="Imprimir">
                        </span>
                        Imprimir
          			</button>
                    </td> 
                    <td>
<button type="submit" class="button" onClick="enviarPDF();">
                   <span style="background-image:url(../../img/Iconfinder/PDF2.png);" title="Convertir a PDF">
                        </span>
                        PDF
          			</button>
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
    

<?php
error_reporting(0);
include_once("../../clases/clsVenta.php");

$objVenta=new clsVenta;
$result=$objVenta->consultarVentaPorDetalle('',$fechaini,$fechafin);

if(isset($_POST['buscar_dato'])){
			
	$fechaini=$_POST["txtFechaini"];
	$fechafin=$_POST["txtFechafin"];
	
	$result=$objVenta->consultarVentaPorDetalle('consultar',$fechaini,$fechafin);

}
if(isset($_POST['restablecer'])){
		
	$result=$objVenta->consultarVentaPorDetalle('',$fechaini,$fechafin);

}
?>
<form name="datos" action="2_rpt_ventapordetalle.php" method="post">
Desde:<input type="date" name="txtFechaini">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hasta:<input type="date" name="txtFechafin">
<input name="buscar_dato" type="submit" value="Buscar">
<input name="restablecer" type="submit" value="Restablecer">
<input type="hidden" name="fechaini" id="fechaini" value="<?php echo $fechaini ?>">
<input type="hidden" name="fechafin" id="fechafin" value="<?php echo $fechafin ?>">
</form>
<table class="adminlist" cellspacing="1">
<thead>
<tr>
	<th>#</th>
	<th><a href="#">Código Bar.</a></th>
    <th><a href="#">Producto</a></th>
    <th><a href="#">Categoría</a></th>
    <th><a href="#">Costo</a></th>
    <th><a href="#">Precio Venta</a></th>
    <th><a href="#">Cantidad</a></th>
    <th><a href="#">Total</a></th>
    <th><a href="#">Ganancia</a></th>
</tr>
</thead>

<tbody class="adminlist">
<?php

$c=0;
$i=0;

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
	echo "<td align='center'>".$row['Codigo']."</td>";
	echo "<td>".$row['Producto']."</td>";
	echo "<td align='center'>".$row['Categoria']."</td>";
	echo "<td align='center'>$ ".$row['Costo']."</td>";
	echo "<td align='center'>$ ".$row['Precio']."</td>";
	echo "<td align='center'>".$row['Cantidad']."</td>";
	echo "<td align='center'>$ ".$row['Total']."</td>";
	echo "<td align='center'>$ ".$row['Ganancia']."</td>";
	echo "</tr>";
	$cant_tot=$cant_tot+$row['Cantidad'];
	$tot_venta=$tot_venta+$row['Total'];
	$tot_ganancia=$tot_ganancia+$row['Ganancia'];
}

?>
</tbody>
		<tfoot>
			<tr>
				<td colspan="13">
				<div align="left" style="padding:4px 0px 4px 4px;"><?php echo "Se cargaron ".$i." registros" ?></div>
                
                </td>
			</tr>
		</tfoot>
</table>
<br>

<fieldset class="informe">
<legend>Cálculos económicos de las ventas realizadas</legend>

<table width="100%" border="0">
	<tr>
    	<td align="center"><b>CANTIDAD</b></td>
        <td align="center"><b>TOTAL</b></td>
        <td align="center"><b>GANANCIA</b></td>
    </tr>
    <tr>
    	<td align="center"><input name="txtCantidad" type="text" disabled id="textfield4" class="input_text" value="<?php echo $cant_tot ?>" size="10"></td>
        <td align="center"><input name="txtTotal" type="text" disabled id="textfield" class="input_text" value="<?php echo "$ ".number_format($tot_venta, 2, '.', ''); ?>" size="10" style="background-color:#FFC"></td>
        <td align="center">
              <input name="txtGanancia" type="text" disabled id="textfield4" class="input_text" value="<?php echo "$ ".number_format($tot_ganancia, 2, '.', ''); ?>" size="10" style="background-color: #DFF; ">
        </td>
    </tr>
</table>

</fieldset>
</div><!--Cierra block_content-->
</div><!--Cierra block-->
</div><!--Cierra Wrapper-->
    
</body>
</html>