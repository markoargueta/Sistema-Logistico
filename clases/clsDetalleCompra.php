<?php 
//Referenciamos la clase clsConexion
include_once("clsConexion.php");

//Implementamos la clase categoria
class clsDetalleCompra{
 //Constructor	
 function clsDetalleCompra(){
 }	
 

 function consultarDetalleCompraPorParametro($criterio,$busqueda){
   //creamos el objeto $con a partir de la clase clsConexion
   $con = new clsConexion;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectarse()==true){
     $query = "CALL SP_S_DetalleCompraPorParametro('$criterio','$busqueda')";
	 $result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
 } 

 
}
?>