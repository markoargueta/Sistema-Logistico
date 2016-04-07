
<?php
require_once("../../lib/pdf/class.ezpdf.php");
include_once("../../clases/clsVenta.php");

$fechaini=$_GET["fechaini"];
$fechafin=$_GET["fechafin"];


$pdf =& new Cezpdf('a4');
$pdf->selectFont('../../lib/pdf/fonts/Helvetica.afm');
$pdf->ezSetCmMargins(1,1,1.5,1.5);

$objVenta=new clsVenta;
if($fechaini==""&&$fechafin==""){
	$result=$objVenta->consultarVentaPorDetalle('',$fechaini,$fechafin);
}else{
	$result=$objVenta->consultarVentaPorDetalle('consultar',$fechaini,$fechafin);
}


$ixx = 0;
while($datatmp = mysql_fetch_assoc($result)) { 
	$ixx = $ixx+1;
	$data[] = array_merge($datatmp, array('num'=>$ixx));
}
$titles = array(
				'num'=>'<b>#</b>',
				'Codigo'=>'<b>CODIGO BAR.</b>',
				'Producto'=>'<b>PRODUCTO</b>',
				'Categoria'=>'<b>CATEGORIA</b>',
				'Precio'=>'<b>PRECIO UNIT.</b>',	
				'Cantidad'=>'<b>CANTIDAD</b>',	
				'Total'=>'<b>TOTAL</b>',												
				'Ganancia'=>'<b>GANANCIA</b>'
			);
$options = array(
				'shadeCol'=>array(0.9,0.9,0.9),
				'xOrientation'=>'center',
				'width'=>500,
				'fontSize'=>'7',
				'cols'=>array('num'=>array('justification'=>'center', 'width'=>30), 'Codigo'=>array('justification'=>'center', 'width'=>60), 'Producto'=>array('justification'=>'left', 'width'=>120), 'Categoria'=>array('justification'=>'center', 'width'=>60), 'Precio'=>array('justification'=>'center', 'width'=>60), 'Cantidad'=>array('justification'=>'center', 'width'=>50), 'Total'=>array('justification'=>'center', 'width'=>40),'Ganancia'=>array('justification'=>'center','width'=>60))
				);
$txttit="<b>SISTEMA DE VENTAS</b>";
$txtsubtit="Reporte de ventas por detalle\n";

$pdf->addJpegFromFile("../../img/icon/logo_casita_jpg.jpg", 475, 760, 70,50);


date_default_timezone_set('America/Lima');
$pdf->ezText($txttit,16);
$pdf->ezText($txtsubtit,12);
$pdf->ezText("<b>Fecha: </b> ". date('d/m/Y'), 10);
$pdf->ezText("<b>Hora: </b> ". date('H:i:s'). "\n\n", 10);
$pdf->ezTable($data, $titles, '', $options);
$pdf->ezText("\n\n\n", 9);
$pdf->ezStream();

?>