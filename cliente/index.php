
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="../css/general.css" rel="stylesheet" type="text/css">
<link href="../css/Imagenes.css" rel="stylesheet" type="text/css">
<link href="../css/paginator.css" rel="stylesheet" type="text/css">
<script>
function enviarPDF()
{
	var criterio=document.datos.criterio.value;
	var busqueda=document.datos.busqueda.value;
	window.open("reporte_cliente.php?criterio="+criterio+"&busqueda="+busqueda,'win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=640,height=480,directories=no,location=no');
return false;
	
}
function enviarPrinter()
{
	var criterio=document.datos.criterio.value;
	var busqueda=document.datos.busqueda.value;
	window.open("imprimir_cliente.php?criterio="+criterio+"&busqueda="+busqueda,'win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=640,height=480,directories=no,location=no');
return false;
}
</script>
</head>
<?php error_reporting (0);?>
<body>
<?php
    session_start();
    if(isset($_SESSION["usuario"])){
?>
<div class="wrapper">
<div class="block">

    <div class="block_head"> 
    	<div class="imagen_head"><img src="../img/Iconfinder/customer.png" width="48" height="45"></div>
    	<div class="titulo_head">Gestor de Clientes</div>
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
                        <a href="registrar_cliente.php" class="toolbar">
                        <span style="background-image:url(../img/Iconfinder/user-group-new.png);" title="Nuevo">
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

include_once("../clases/clsCliente.php");
include_once("../lib/paginator/paginator.class.php");
$objcliente=new clsCliente;
$result_tot=$objcliente->consultarTotalClientes();
$num_rows = mysql_fetch_row($result_tot);

//Parametro del Paginador
$pages = new Paginator;
$pages->items_total = $num_rows[0];
$pages->mid_range = 9; // Number of pages to display. Must be odd and > 3
$pages->paginate();

$result=$objcliente->consultarClientePorParametro($criterio,$busqueda,$pages->limit);

if(isset($_POST['buscar_dato'])){
	$criterio=$_POST["cboCriterio"];		
	$busqueda=$_POST["txtDato"];
	$result=$objcliente->consultarClientePorParametro($criterio,$busqueda,$pages->limit);

}
if(isset($_POST['restablecer'])){
		
	$result=$objcliente->consultarClientePorParametro($criterio,$busqueda,$pages->limit);

}
?>
<form name="datos" action="index.php" method="post">
Filtro:<input type="text" name="txtDato">
<select name="cboCriterio" >
  <option>- Seleccione Criterio -</option>
  <option value="nombre">Nombre o Razón Social</option>
  <option value="ruc">RUC</option>
  <option value="dni">DNI</option>
</select>
<input name="buscar_dato" type="submit" value="Buscar">
<input name="restablecer" type="submit" value="Restablecer">
<input type="hidden" name="criterio" id="criterio" value="<?php echo $criterio ?>">
<input type="hidden" name="busqueda" id="busqueda" value="<?php echo $busqueda ?>">
</form>



<table class="adminlist" cellspacing="1">
<thead>
<tr>
	<th>#</th>
	<th><a href="#">Nombre o Razón Social</a></th>
	<th><a href="#">RUC</a></th>
    <th><a href="#">DNI</a></th>
   	<th><a href="#">Dirección</a></th>
   	<th><a href="#">Teléfono</a></th>
  	<th><a href="#">ID</a></th>
    <th>Ver</th>
	<th>Editar</th>
</tr>
</thead>

<tbody class="adminlist">
<?php


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
	echo "<td>".$row['Nombre']."</td>";
	echo "<td align='center'>".$row['Ruc']."</td>";
	echo "<td align='center'>".$row['Dni']."</td>";
	echo "<td>".$row['Direccion']."</td>";
	echo "<td width='6%' align='center'>".$row['Telefono']."</td>";
	echo "<td width='1%'>".$row['IdCliente']."</td>";
	echo "<td width='5%' align='center'><a href=detalle_cliente.php?idcliente=".$row["IdCliente"]." title='Ver Detalle'><img src='../img/Iconfinder/search-16.png' ></td>";
    echo "<td width='5%' align='center'><a href=editar_cliente.php?idcliente=".$row["IdCliente"]." title='Editar'><img src='../img/Iconfinder/page_edit.png'></td>";
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
    <?php 

    } else {
        header("Location:../index.php");
    }

?>
</body>
</html>