<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../css/general.css" rel="stylesheet" type="text/css">
<link href="../../css/Imagenes.css" rel="stylesheet" type="text/css">
<link href="../../css/paginator.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="../../venta/css/style_v.css" /> 
<script>
function enviarPDF()
{
	var fi=document.form.fechaini.value;
	var ff=document.form.fechafin.value;
	window.open("3_rpt_pdf_ventamensual.php?fechaini="+fi+"&fechafin="+ff,'win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=640,height=480,directories=no,location=no');
return false;
	
}
function enviarPrinter()
{
	var fi=document.form.fechaini.value;
	var ff=document.form.fechafin.value;
	window.open("3_rpt_printer_ventamensual.php?fechaini="+fi+"&fechafin="+ff,'win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=640,height=480,directories=no,location=no');
return false;
	
}
function enviarDatos()
{
	fi = document.getElementById('fechaini').value; 
	ff = document.getElementById('fechafin').value;
	if(fi!="" && fi!="" ){
		mostrarGrafico(fi,ff);
	}else{
		alert("Ingrese un rango de fechas")	
	}
	
}	

function mostrarGrafico(fi,ff)
{
	var xmlhttp;			
	if(window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	}else{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}	
		
	xmlhttp.onreadystatechange= function(){	
		if(xmlhttp.readyState=4 && xmlhttp.status==200){
			document.getElementById("grafico").innerHTML=xmlhttp.responseText;
		}
	}		
	xmlhttp.open("GET","3_rpt_graf_ventasmensual.php?fechaini="+fi+"&fechafin="+ff,true);
	xmlhttp.send();
}
</script>

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
	width:220px;
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

.input_text1 {	border-radius:3px;
	border: 1px #ccc solid;
	text-align:center;
	font-family: Arial, Helvetica, sans-serif;
	font-size:16px;
	font-weight:bold;
	color:#000;
	height:30px;
}
.input_text2 {	border-radius:3px;
	border: 1px #ccc solid;
	text-align:center;
	font-family: Arial, Helvetica, sans-serif;
	font-size:16px;
	font-weight:bold;
	color:#000;
	height:30px;
}
.input_text21 {border-radius:3px;
	border: 1px #ccc solid;
	text-align:center;
	font-family: Arial, Helvetica, sans-serif;
	font-size:16px;
	font-weight:bold;
	color:#000;
	height:30px;
}
</style>
</head>
<body>

<div class="wrapper">
<div class="block">

    <div class="block_head"> 
    	<div class="imagen_head"><img src="../../img/header/rpt_venta_mensual.png" width="48" height="48"></div>
    	<div class="titulo_head">INFORME DE VENTAS MENSUAL</div>
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
    
<div style="width:680px; float:left"> 
<?php

error_reporting(0);
include_once("../../clases/clsVenta.php");

$objVenta=new clsVenta;
$result=$objVenta->consultarVentaMensual('consultar',$fechaini,$fechafin);

if(isset($_POST['buscar_dato'])){
			
	$fechaini=$_POST["txtFechaini"];
	$fechafin=$_POST["txtFechafin"];
	
	$result=$objVenta->consultarVentaMensual('consultar',$fechaini,$fechafin);

}
if(isset($_POST['restablecer'])){
		
	$result=$objVenta->consultarVentaMensual('consultar',$fechaini,$fechafin);

}

?>
<form name="form" action="3_rpt_ventamensual.php" method="post">
Desde:
  <input type="month" name="txtFechaini" id="txtFechaini" style="width:200px">
  &nbsp;&nbsp;&nbsp;&nbsp;Hasta:
  <input type="month" name="txtFechafin" id="txtFechafin" style="width:200px">
<input name="buscar_dato" type="submit" value="Buscar" >
<input name="restablecer" type="submit" value="Restablecer">
<input type="hidden" name="fechaini" value="<?php echo $fechaini ?>">
<input type="hidden" name="fechafin" value="<?php echo $fechafin ?>">
</form>
<table class="adminlist" cellspacing="1">
<thead>
<tr>
	<th>#</th>
	<th><a href="#">Fecha</a></th>
    <th><a href="#">Total</a></th>
    <th><a href="#">Procentaje</a></th>

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
	echo "<td align='center'>".$row['Fecha']."</td>";
	echo "<td align='center'>"."$ ".$row['Total']."</td>";
	echo "<td align='center'>".$row['Porcentaje']." %"."</td>";
	echo "</tr>";

	$tot_venta=$tot_venta+$row['Total'];
	$tot_porcentaje=$tot_porcentaje+$row['Porcentaje'];
}
if($tot_porcentaje==99){
	$tot_porcentaje=$tot_porcentaje+1;
}else if($tot_porcentaje==101){
	$tot_porcentaje=$tot_porcentaje-1;
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
 <table><tr>
 <td><img src="../../img/icon/chart_bar.png" width=16 height=16 alt=''/></td>
 <td>&nbsp;Área de visualización</td>
</tr></table>
<div style='display:table-cell; padding: 10px; border: 2px solid #FFFFFF; vertical-align: middle; overflow: auto; background-image: url(../../img/fondo/dash.png);'>

<div id="grafico">
        <table>
<tr><td><img src="../../img/icon/accept.png" alt="" height="16" width="16"></td>
<td>Clic en ver gráfico para la renderización</td></tr>
        </table>
</div>
</div>

 




</div>
<div style="width:240px; float:right; padding-top:30px">

<fieldset class="informe">
<legend>Información económica</legend>

<table width="100%" border="0">
	<tr>
	  <td align="center">&nbsp;</td>
	  </tr>
	<tr>
    	<td align="center"><b>TOTAL VENTAS</b></td>
    </tr>
    <tr>
    	<td align="center"><input name="txtTotal" type="text" disabled id="textfield" class="input_text1" value="<?php echo "$ ".number_format($tot_venta, 2, '.', ''); ?>" size="15" style="background-color:#FFC; color:#090"></td>
    </tr>
    <tr>
      <td align="center">&nbsp;</td>
    </tr>
    <tr>
      <td align="center"><b>PORCENTAJE (%)</b></td>
    </tr>
    <tr>
      <td align="center"><input name="txtPorcentaje" type="text" disabled id="textfield4" class="input_text21" value="<?php echo $tot_porcentaje." %"; ?>" size="15" ></td>
    </tr>
    <tr>
      <td align="center">&nbsp;</td>
    </tr>
</table>

</fieldset>

<form name="datos" method="get">
<input type="hidden" name="fechaini" id="fechaini" value="<?php echo $fechaini ?>">
<input type="hidden" name="fechafin" id="fechafin" value="<?php echo $fechafin ?>">
 <center><input type="button" onClick="enviarDatos();" value="Ver Gráfico" class="btn_operaciones" style="width:130px;"/></center>
 </form>
 </div>



</div><!--Cierra block_content-->
</div><!--Cierra block-->
</div><!--Cierra Wrapper-->
    
</body>
</html>