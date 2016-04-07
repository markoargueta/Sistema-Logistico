
<?php
require_once("../../lib/pdf/class.ezpdf.php");
include_once("../../clases/clsVenta.php");

//$fechaini=$_GET["fechaini"];
//$fechafin=$_GET["fechafin"];
$fechaini="2013-01";
$fechafin="2013-12";

$pdf =& new Cezpdf('a4');
$pdf->selectFont('../../lib/pdf/fonts/Helvetica.afm');
$pdf->ezSetCmMargins(1,1,1.5,1.5);

$objVenta=new clsVenta;
$result=$objVenta->consultarVentaMensual('consultar',$fechaini,$fechafin);


$ixx = 0;
while($datatmp = mysql_fetch_assoc($result)) { 
	$ixx = $ixx+1;
	$data[] = array_merge($datatmp, array('num'=>$ixx));
}
$titles = array(
				'num'=>'<b>#</b>',
				'Fecha'=>'<b>FECHA</b>',
				'Total'=>'<b>TOTAL</b>',
				'Porcentaje'=>'<b>PORCENTAJE</b>'

			);
$options = array(
				'shadeCol'=>array(0.9,0.9,0.9),
				'xOrientation'=>'center',
				'width'=>500,
				'fontSize'=>'7',
				'cols'=>array('num'=>array('justification'=>'center', 'width'=>30), 'Fecha'=>array('justification'=>'center', 'width'=>100), 'Total'=>array('justification'=>'center', 'width'=>80), 'Porcentaje'=>array('justification'=>'center', 'width'=>80))
				);
$txttit="<b>SISTEMA DE VENTAS</b>";
$txtsubtit="Reporte de ventas mensual\n";

$pdf->addJpegFromFile("../../img/icon/logo_casita_jpg.jpg", 475, 760, 70,50);


date_default_timezone_set('America/Lima');
$pdf->ezText($txttit,16);
$pdf->ezText($txtsubtit,12);
$pdf->ezText("<b>Fecha: </b> ". date('d/m/Y'), 10);
$pdf->ezText("<b>Hora: </b> ". date('H:i:s'). "\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n", 10);
$img_graph = ImageCreatefrompng('grafico/ventas.png'); // aqui llamamos a la imagen generada por pChart
$pdf->addImage($img_graph,50,470,500,250);
$pdf->ezTable($data, $titles, '', $options);
$pdf->ezText("\n\n\n", 9);
$pdf->ezStream();


?>