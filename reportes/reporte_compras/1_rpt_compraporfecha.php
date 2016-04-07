<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="../../css/general.css" rel="stylesheet" type="text/css">
<link href="../../css/Imagenes.css" rel="stylesheet" type="text/css">
<link href="../../css/paginator.css" rel="stylesheet" type="text/css">
<script>
function enviarPDF()
{
	var fi=document.datos.fechaini.value;
	var ff=document.datos.fechafin.value;
	window.open("1_rpt_pdf_compraporfecha.php?fechaini="+fi+"&fechafin="+ff,'win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=640,height=480,directories=no,location=no');
return false;
	
}
function enviarPrinter()
{
	var fi=document.datos.fechaini.value;
	var ff=document.datos.fechafin.value;
	window.open("1_rpt_printer_compraporfecha.php?fechaini="+fi+"&fechafin="+ff,'win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=640,height=480,directories=no,location=no');
return false;
	
}
</script>
</head>

<body>

<div class="wrapper">
<div class="block">

    <div class="block_head"> 
    	<div class="imagen_head"><img src="../../img/header/rpt_compra.png" width="48" height="48"></div>
    	<div class="titulo_head">INFORME DE COMPRAS</div>
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
include_once("../../clases/clsCompra.php");

$objCompra=new clsCompra;
$result=$objCompra->consultarCompraPorFecha('',$fechaini,$fechafin,'');

if(isset($_POST['buscar_dato'])){
			
	$fechaini=$_POST["txtFechaini"];
	$fechafin=$_POST["txtFechafin"];
	
	$result=$objCompra->consultarCompraPorFecha('consultar',$fechaini,$fechafin,'');

}
if(isset($_POST['restablecer'])){
		
	$result=$objCompra->consultarCompraPorFecha('',$fechaini,$fechafin,'');

}
?>
<form name="datos" action="1_rpt_compraporfecha.php" method="post">
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
	<th><a href="#">Proveedor</a></th>
    <th><a href="#">Fecha</a></th>
    <th><a href="#">Empleado</a></th>
    <th><a href="#">Documento</a></th>
    <th><a href="#">Número</a></th>
    <th><a href="#">Estado</a></th>
    <th><a href="#">Total</a></th>
	<th><a href="#">ID</a></th>
    <th>Ver</th>

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
	echo "<td>".$row['Proveedor']."</td>";
	echo "<td align='center'>".$row['Fecha']."</td>";
	echo "<td>".$row['Empleado']."</td>";
	echo "<td align='center'>".$row['TipoDocumento']."</td>";
	echo "<td align='center'>".$row['Numero']."</td>";
	$estado=$row['Estado'];
	if($estado=="EMITIDO"){
	echo "<td align='center'><img src='../../img/header/emitido.png' title='Emitido'></td>";
	}else{
	echo "<td align='center'><img src='../../img/header/anulado.png' title='Anulado'></td>";
	}
	echo "<td align='center'>$ ".$row['Total']."</td>";
	echo "<td width='1%' align='center'>".$row['IdCompra']."</td>";
	echo "<td width='5%' align='center'><a href=1_rpt_compraporfecha_detalle.php?idcompra=".$row["IdCompra"]." title='Ver Detalle'><img src='../../img/ver.png'></td>";

	echo "</tr>";
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


    </div><!--Cierra block_content-->
</div><!--Cierra block-->
</div><!--Cierra Wrapper-->
    
</body>
</html>