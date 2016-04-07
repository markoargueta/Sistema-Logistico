<?php error_reporting (0);?>
<?
    session_start();
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="../css/general.css" rel="stylesheet" type="text/css">
<link href="../css/Imagenes.css" rel="stylesheet" type="text/css">
<link href="../css/paginator.css" rel="stylesheet" type="text/css">
<script>
function enviarPDF()
{
	var busqueda=document.datos.busqueda.value;
	window.open("reporte_tipodocumento.php?busqueda="+busqueda,'win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=640,height=480,directories=no,location=no');
return false;
	
}
function enviarPrinter()
{
	var busqueda=document.datos.busqueda.value;
	window.open("imprimir_tipodocumento.php?busqueda="+busqueda,'win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=640,height=480,directories=no,location=no');
return false;	
}
</script>
</head>
<body>
<div class="wrapper">
<div class="block">

    <div class="block_head"> 
    	<div class="imagen_head"><img src="../img/Iconfinder/archiver-32.png" width="48" height="48"></div>
    	<div class="titulo_head">GESTOR DEL TIPO DE DOCUMENTO</div>
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
                   <span style="background-image:url(../img/Iconfinder/PDF2.png);" title="Convertir a PDF">
                        </span>
                        PDF
          			</button>
                    </td>                               
                    <td>
                        <a href="registrar_tipodocumento.php" class="toolbar">
                        <span class="NuevoOtros" title="Nuevo">
                        </span>
                        Nuevo
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


<?php

include_once("../clases/clsTipoDocumento.php");
include_once("../lib/paginator/paginator.class.php");

$objTipoDocumento=new clsTipoDocumento;
$result_tot=$objTipoDocumento->consultarTotalTipoDocumentos();
$num_rows = mysql_fetch_row($result_tot);

//Parametro del Paginador
$pages = new Paginator;
$pages->items_total = $num_rows[0];
$pages->mid_range = 9; // Number of pages to display. Must be odd and > 3
$pages->paginate();

$result=$objTipoDocumento->consultarTipoDocumentoPorParametro($criterio,$busqueda,$pages->limit);

if(isset($_POST['buscar_dato'])){
			
	$busqueda=$_POST["txtDato"];
	$result=$objTipoDocumento->consultarTipoDocumentoPorParametro('descripcion',$busqueda,$pages->limit);

}
if(isset($_POST['restablecer'])){
		
	$result=$objTipoDocumento->consultarTipoDocumentoPorParametro($criterio,$busqueda,$pages->limit);

}
?>
<form name="datos" action="index.php" method="post">
Filtro:<input type="text" name="txtDato">
<input name="buscar_dato" type="submit" value="Buscar">
<input name="restablecer" type="submit" value="Restablecer">
<input type="hidden" name="busqueda" id="busqueda" value="<?php echo $busqueda ?>">
</form>

<table class="adminlist" cellspacing="1">
<thead>
<tr>
	<th>#</th>
	<th><a href="#">Descripción</a></th>
	<th><a href="#">ID</a></th>
    <th>Ver</th>
	<th>Editar</th>
</tr>
</thead>

<tbody class="adminlist">
<?php


$i=0;
$c=0;
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
	echo "<td>".$row['Descripcion']."</td>";
	echo "<td width='1%' align='center'>".$row['IdTipoDocumento']."</td>";
	echo "<td width='5%' align='center'><a href=detalle_tipodocumento.php?idtipodocumento=".$row["IdTipoDocumento"]." title='Ver Detalle'><img src='../img/Iconfinder/search-16.png'></td>";
    echo "<td width='5%' align='center'><a href=editar_tipodocumento.php?idtipodocumento=".$row["IdTipoDocumento"]." title='Editar'><img src='../img/Iconfinder/page_edit.png'></td>";
	echo "</tr>";
}

?>
</tbody>
		<tfoot>
			<tr>
				<td colspan="13">
                 <div align="left" style="float:left; width:310px; padding:4px 0px 0px 4px;"><?php echo "Se cargaron ".$i." registros" ?></div>
                <div align="left">                <?php
echo $pages->display_items_per_page()."&nbsp;&nbsp;&nbsp;&nbsp;".$pages->display_pages()."&nbsp;&nbsp;&nbsp;&nbsp;Página: ".$pages->current_page." de ".$pages->num_pages;

?></div>
                </td>
			</tr>
		</tfoot>
</table>
    </div><!--Cierra block_content-->
</div><!--Cierra block-->
</div><!--Cierra Wrapper-->
    
</body>
</html>