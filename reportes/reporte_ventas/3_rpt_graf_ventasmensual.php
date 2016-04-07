<?php 

include_once("../../clases/clsConexion.php");
$con = new clsConexion;
include_once("../../lib/pChart/pPie.class.php");
include_once("../../lib/pChart/pData.class.php");
include_once("../../lib/pChart/pDraw.class.php");
include_once("../../lib/pChart/pImage.class.php");


$fecha_ini=$_GET['fechaini'];
$fecha_fin=$_GET['fechafin'];

//usamos el metodo conectar para realizar la conexion
if($con->conectarse()==true)
{
	$query = "CALL SP_S_VentaMensual('consultar','$fecha_ini','$fecha_fin')";
	$result=mysql_query($query);
	
	$MyData = new pData();
	while($row = @mysql_fetch_array($result))
	{
		$MyData->addPoints($row['Fecha'], 'Fecha');
		$MyData->addPoints($row['Total'], 'Ventas');
		//$MyData->addPoints($row['Porcentaje'], 'Porcentaje');
	}	


	$MyData->SetAxisName(0,"Total venta");
	
	$MyData->setAxisPosition(1,AXIS_POSITION_LEFT);
	$MyData->setSerieDescription("Fecha","Meses");
	$MyData->setAbscissa("Fecha");
	
	/* Create the pChart object */ 
	$myPicture = new pImage(650,300,$MyData); 
	
	 /* Turn of Antialiasing */ 
	$myPicture->Antialias = FALSE; 
	
	/* Add a border to the picture */ 
 	$myPicture->drawRectangle(0,0,649,299,array("R"=>0,"G"=>0,"B"=>0)); 
 
	/* Write the chart title */  
	$myPicture->setFontProperties(array("FontName"=>"../../lib/font/Forgotte.ttf","FontSize"=>11)); 
	$myPicture->drawText(150,35,"VENTAS POR MES",array("FontSize"=>20,"Align"=>TEXT_ALIGN_BOTTOMMIDDLE)); 
 
	/* Set the default font */ 
 	$myPicture->setFontProperties(array("FontName"=>"../../lib/font/pf_arma_five.ttf","FontSize"=>6)); 
 
	/* Define the chart area */ 
	$myPicture->setGraphArea(40,40,600,270);
 
	 /* Draw the scale */ 
 $scaleSettings = array("XMargin"=>10,"YMargin"=>10,"Floating"=>TRUE,"GridR"=>200,"GridG"=>200,"GridB"=>200,"DrawSubTicks"=>TRUE,"CycleBackground"=>TRUE);
 $myPicture->drawScale($scaleSettings); 
 

 
/* Turn on Antialiasing */ 
 $myPicture->Antialias = TRUE; 

 /* Draw the line chart */ 
 $myPicture->drawLineChart(array("DisplayValues"=>TRUE,"DisplayColor"=>DISPLAY_AUTO)); 

 /* Write the chart legend */ 
 $myPicture->drawLegend(540,20,array("Style"=>LEGEND_NOBORDER,"Mode"=>LEGEND_HORIZONTAL)); 

/* Render the picture (choose the best way) */ 
 //$myPicture->autoOutput("grafico/ventas.png"); 
	//$myPicture->drawLegend(90,20); //adds the legend
	$myPicture->render("grafico/ventas.png");
	echo "<img src='grafico/ventas.png'/>";
	




}
	
?>