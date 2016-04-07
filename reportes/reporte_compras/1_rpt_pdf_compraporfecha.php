
<?php
require_once("../../lib/pdf/class.ezpdf.php");
include_once("../../clases/clsCompra.php");

$fechaini=$_GET["fechaini"];
$fechafin=$_GET["fechafin"];


$pdf =& new Cezpdf('a4');
$pdf->selectFont('../../lib/pdf/fonts/Helvetica.afm');
$pdf->ezSetCmMargins(1,1,1.5,1.5);

$objCompra=new clsCompra;
if($fechaini==""&&$fechafin==""){
	$result=$objCompra->consultarCompraPorFecha('',$fechaini,$fechafin,'');
}else{
	$result=$objCompra->consultarCompraPorFecha('consultar',$fechaini,$fechafin,'');	
}


$ixx = 0;
while($datatmp = mysql_fetch_assoc($result)) { 
	$ixx = $ixx+1;
	$data[] = array_merge($datatmp, array('num'=>$ixx));
}
$titles = array(
				'num'=>'<b>#</b>',
				'Proveedor'=>'<b>PROVEEDOR</b>',
				'Fecha'=>'<b>FECHA</b>',
				'Empleado'=>'<b>EMPLEADO</b>',
				'TipoDocumento'=>'<b>DOCUMENTO</b>',	
				'Numero'=>'<b>NUMERO</b>',	
				'Estado'=>'<b>ESTADO</b>',												
				'Total'=>'<b>TOTAL</b>',												
				'IdCompra'=>'<b>ID</b>'
			);
$options = array(
				'shadeCol'=>array(0.9,0.9,0.9),
				'xOrientation'=>'center',
				'width'=>500,
				'fontSize'=>'7',
				'cols'=>array('num'=>array('justification'=>'center', 'width'=>30), 'Proveedor'=>array('justification'=>'left', 'width'=>80), 'Fecha'=>array('justification'=>'center', 'width'=>60), 'TipoDocumento'=>array('justification'=>'center', 'width'=>60), 'Numero'=>array('justification'=>'center', 'width'=>60), 'Estado'=>array('justification'=>'center', 'width'=>40), 'Total'=>array('justification'=>'center', 'width'=>40),'IdCompra'=>array('justification'=>'center','width'=>30))
				);
$txttit="<b>SISTEMA DE VENTAS</b>";
$txtsubtit="Reporte general de compras\n";

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
