<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="../css/general.css" rel="stylesheet" type="text/css">
<link href="../css/icon.css" rel="stylesheet" type="text/css">
<link href="../css/box.css" rel="stylesheet" type="text/css">
</head>
<body> 
<?php error_reporting (0);?> 
<?php

include_once("../clases/clsCategoria.php");
$objcategoria=new clsCategoria;

?>
<?php
include_once("../clases/clsProducto.php");
$objproducto=new clsProducto;


	

$accion=$_POST["accion"];


if ($accion=="guardar") {
	
	$codigobarras=$_POST["codigobarras"];
	$nombre=$_POST["nombre"];
	$descripcion=$_POST["descripcion"];
	$stock=$_POST["stock"];
	$stockmin=$_POST["stockmin"];
	$preciocosto=$_POST["preciocosto"];
	$precioventa=$_POST["precioventa"];
	$utilidad=$_POST["utilidad"];
	$estado=$_POST["estado"];
	$idcategoria=$_POST["idcategoria"];
	

	//Calcular la utilidad	
	$utilidad_total=$precioventa-$preciocosto;

//------------------------------Subir Imagen_1 ----------------------------------
		$copiarFichero_1 = false;
	

	   // Para garantizar la unicidad del nombre se añade una marca de tiempo
		if (is_uploaded_file ($_FILES['imagen']['tmp_name']))
		{
			$nombreDirectorio_1 = "foto/";
			$nombreFichero_1_1 = $_FILES['imagen']['name'];
			$nombreFichero_1=str_replace(" ","_",$nombreFichero_1_1);
			$copiarFichero_1 = true;
	
		//Si ya existe un fichero con el mismo nombre, renombrarlo
			$nombreCompleto_1 = $nombreDirectorio_1 . $nombreFichero_1;
			if (is_file($nombreCompleto_1))
			{
				$idUnico_1 = time();
				$nombreFichero_1 = $idUnico_1 . "-" . $nombreFichero_1;
			}
		 }
	   // No se ha introducido ningún fichero
		 else if ($_FILES['imagen']['name'] == "")
		 	$nombreFichero_1 = '';
	   // El fichero introducido no se ha podido subir
		 else
		 {
			 $errores["imagen"] = "¡No se ha podido subir el fichero!";
			 $error = true;
		 }
	   
   


	if ($objproducto->agregarProducto($codigobarras,$nombre,$descripcion,$stock,$stockmin,$preciocosto,$precioventa,$utilidad_total,$estado,$nombreFichero_1,$idcategoria)==true)
	{
		// Mover fichero de imagen chica a su ubicación definitiva
   		if ($copiarFichero_1)
    	move_uploaded_file($_FILES['imagen']['tmp_name'],$nombreDirectorio_1 . $nombreFichero_1);
 
		 		
		$result=$objproducto->consultarProductoIdMaximo();
		$mensaje="Registro grabado correctamente";
	}else{
		$mensaje="Error de grabacion";
	}
	
	while($row=mysql_fetch_array($result))
	{
		$cod=$row['Maximo'];
	}
}

if ($accion=="modificar") 
{
	$cod=$_POST["codigo"];
	$id_prod=$_POST["idproducto"];
	$codigobarras=$_POST["codigoba"];
	$nombre=$_POST["nombre"];
	$descripcion=$_POST["descripcion"];
	$stock=$_POST["stock"];
	$stockmin=$_POST["stockmin"];
	$preciocosto=$_POST["preciocosto"];
	$precioventa=$_POST["precioventa"];
	$utilidad=$_POST["utilidad"];
	$estado=$_POST["estado"];
	$img_eliminar_1=$_POST["img_eliminar_1"];
	$idcategoria=$_POST["idcategoria"];
	$utilidad_total=$precioventa-$preciocosto;
	

	
	
	 if ($_FILES['imagen']['name'] == "")
	 {
		$result_img=$objproducto->consultarProductoPorParametro('id',$cod,'');
		while($row=mysql_fetch_array($result_img))
		{
			$nom_img_1=$row['Imagen'];
		}
		$nombreFichero_1=$nom_img_1;
		$copiarFichero_1 = false;

	 }else{
	
				 
		//Subir fichero
		$copiarFichero_1 = false;
		
		//Para garantizar la unicidad del nombre se añade una marca de tiempo
		if (is_uploaded_file ($_FILES['imagen']['tmp_name']))
		{
			$nombreDirectorio_1 = "foto/";
			$nombreFichero_1_1 = $_FILES['imagen']['name'];
			$nombreFichero_1=str_replace(" ","_",$nombreFichero_1_1);
			
			$copiarFichero_1 = true;
		
		//Si ya existe un fichero con el mismo nombre, renombrarlo
			$nombreCompleto_1 = $nombreDirectorio_1 . $nombreFichero_1;
			if (is_file($nombreCompleto_1))
			{
				$idUnico_1 = time();
				$nombreFichero_1 = $idUnico_1 . "-" . $nombreFichero_1;

			}
		// No se ha introducido ningún fichero		
		}else if ($_FILES['imagen']['name'] == ""){
			$nombreFichero_1 = '';
		// El fichero introducido no se ha podido subir
		}else{
			$errores["imagen"] = "¡No se ha podido subir el fichero!";
			$error = true;
		}
		 
		 
	  
	}
	
	$objproducto=new clsProducto;
	if ($objproducto->modificarProducto($cod,$codigobarras,$nombre,$descripcion,$stock,$stockmin,$preciocosto,$precioventa,$utilidad_total,$estado,$nombreFichero_1,$idcategoria)==true)
	{

		// Mover fichero de imagen a su ubicación definitiva
		if($nombreFichero_1!=""){	
			if ($copiarFichero_1){
				move_uploaded_file($_FILES['imagen']['tmp_name'],$nombreDirectorio_1 . $nombreFichero_1);			
				$dir="foto/".$img_eliminar_1; 
				if($img_eliminar_1!=""){
					if(file_exists($dir)) 
					{
						unlink($dir);
					}
				}
			}
			
		
		}
		$mensaje="Registro actualizado correctamente";
	}else{
		$mensaje="Error de grabacion";
	}
}

$resultado_categ=$objcategoria->consultarCategoriaPorParametro('id',$idcategoria,'');
while($row=@mysql_fetch_array($resultado_categ))
{
	$desc_categ=$row['Descripcion'];
}
?>      
     
<div class="wrapper">
<div class="block">
	<div class="block_head"> 
    <div class="imagen_head"><img src="../img/header/producto.png" width="46" height="43"></div>
    <div class="titulo_head">Gestor de Productos</div>    
		<div class="toolbar" id="toolbar">
            <table class="toolbar">
            	<tbody>
                	<tr>       
                    <td>
                        <a href="registrar_producto.php" class="toolbar">
                        <span class="icon-32-nuevo" title="Nuevo">
                        </span>
                        Nuevo
                        </a>
                    </td>
                    <td>
                        <a href="index.php" class="toolbar">
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
    <div class="box-info"><?php echo $mensaje ?></div>

    <fieldset class="adminform">
    <legend>Detalles del producto</legend>
    <table class="admintable">
        <tr>
            <td class="key">ID:</td>
            <td><?php echo $cod?></td>
        </tr>
        <tr>
            <td class="key">Nombre:</td>
            <td><?php echo $nombre?></td>
        </tr>
        <tr>
            <td class="key">Descripción:</td>
            <td><?php echo $descripcion?></td>
        </tr>
        <tr>
            <td class="key">Stock:</td>
            <td><?php echo $stock?></td>
        </tr>
        <tr>
            <td class="key">Stock Mínimo:</td>
            <td><?php echo $stockmin?></td>
        </tr>
        <tr>
            <td class="key">Precio Costo:</td>
            <td><?php echo $preciocosto?></td>
        </tr>
        <tr>
            <td class="key">Precio Venta:</td>
            <td><?php echo $precioventa?></td>
        </tr>
        <tr>
            <td class="key">Utilidad:</td>
            <td><?php echo $utilidad_total?></td>
        </tr>
        <tr>
            <td class="key">Estado:</td>
            <td><?php echo $estado?></td>
        </tr>
        <tr>
            <td class="key">Categoría:</td>
            <td><?php echo $desc_categ?></td>
        </tr>
        <tr>
          <td class="key">Código de Barras:</td>
          <td><?php echo "<img src='../lib/barcode/barcode.php?encode=EAN-13&bdata=".$codigobarras."&height=50&scale=2&bgcolor=%23FFFFEC&color=%23333366&type=jpg' width='150' height='70'>"; ?></td>
        </tr>
        <tr>
            <td class="key">Imagen :</td>
            <td><?php       if ($nombreFichero_1 != "")
         print ("<A TARGET='_blank' HREF='" . $nombreDirectorio_1 . $nombreFichero_1 . "'>" . $nombreFichero_1 . "</A>\n");
      else
         print ("   Imagen: (no hay)\n");
      print ("\n") ;
	  ?></td>
        </tr>
    </table>
    </fieldset>

    </div><!--Cierra block_content-->
</div><!--Cierra block-->
</div><!--Cierra Wrapper-->
</body>
</html>