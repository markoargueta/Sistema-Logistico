<?php 
//referenciamos la clase clsConexion
include_once("clsConexion.php");

//implementamos la clase empleado
class clsProducto{
 //constructor	
 function clsProducto(){
 }	
  function consultarProducto($criterio,$busqueda){
   //creamos el objeto $con a partir de la clase clsConexion
   $con = new clsConexion;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectarse()==true){
     $query = "CALL SP_S_Producto('$criterio','$busqueda')";
	 $result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
 }
function consultarTotalProductos(){
   //creamos el objeto $con a partir de la clase clsConexion
   $con = new clsConexion;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectarse()==true){
     $query = "CALL SP_S_ProductoCantidadTotal()";
	 $result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
 }

 function CantidadProductos(){
   //creamos el objeto $con a partir de la clase clsConexion
   $con = new clsConexion;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectarse()==true){
     $query = "CALL SP_S_CANTIDAD_PRODUCTOS()";
   $result = @mysql_query($query);
   if (!$result)
     return false;
   else
     return $result;
   }
 }

 function consultarProductoPorParametro($criterio,$busqueda,$limite){
   //creamos el objeto $con a partir de la clase clsConexion
   $con = new clsConexion;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectarse()==true){
     $query = "CALL SP_S_ProductoPorParametro('$criterio','$busqueda','$limite')";
	 $result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
 }
 //inserta un nuevo empleado en la base de datos
 function agregarProducto($codigo,$nombre,$descripcion,$stock,$stockmin,$precio_costo,$precio_venta,$utilidad,$estado,$imagen,$idcategoria){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "CALL SP_I_Producto('$codigo','$nombre','$descripcion','$stock','$stockmin','$precio_costo','$precio_venta','$utilidad','$estado','$imagen','$idcategoria')";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 //Modificar empleado en la base de datos
 function modificarProducto($idproducto,$codigoba,$nombre,$descripcion,$stock,$stockmin,$precio_costo,$precio_venta,$utilidad,$estado,$imagen,$idcategoria){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "CALL SP_U_Producto('$idproducto','$codigoba','$nombre','$descripcion','$stock','$stockmin','$precio_costo','$precio_venta','$utilidad','$estado','$imagen','$idcategoria')";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 function consultarProductoIdMaximo(){
   //creamos el objeto $con a partir de la clase clsConexion
   $con = new clsConexion;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectarse()==true){
     $query = "CALL SP_S_ProductoIdMaximo()";
	 $result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
 } 
 
}
?>
