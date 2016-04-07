<?php 
//Referenciamos la clase clsConexion
include_once("clsConexion.php");

//Implementamos la clase categoria
class clsCategoria{
 //Constructor	
 function clsCategoria(){
 }	
 
 //Funcion para agregar una nueva categoria en la BD
 function agregarCategoria($descripcion){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "CALL SP_I_Categoria('$descripcion')";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }

 function CantidadCategoria(){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "CALL SP_S_CANTIDAD_CATEGORIAS()";
   $result = @mysql_query($query);
   if (!$result)
     return false;
   else
     return $result;
   }
}
 //Modificar empleado en la base de datos
 function modificarCategoria($idcategoria,$descripcion){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "CALL SP_U_Categoria('$idcategoria','$descripcion')";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 function consultarCategoria(){
   //creamos el objeto $con a partir de la clase clsConexion
   $con = new clsConexion;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectarse()==true){
     $query = "CALL SP_S_Categoria()";
	 $result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
 }
function consultarTotalCategorias(){
   //creamos el objeto $con a partir de la clase clsConexion
   $con = new clsConexion;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectarse()==true){
     $query = "CALL SP_S_CategoriaCantidadTotal()";
	 $result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
 }
 function consultarCategoriaPorParametro($criterio,$busqueda,$limite){
   //creamos el objeto $con a partir de la clase clsConexion
   $con = new clsConexion;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectarse()==true){

     $query = "CALL SP_S_CategoriaPorParametro('$criterio','$busqueda','$limite')";
	 $result = @mysql_query($query);
	 if (!$result)

	   return false .mysql_error();

	 else
	   return $result;
   }
 } 
 function consultarCategoriaIdMaximo(){
   //creamos el objeto $con a partir de la clase clsConexion
   $con = new clsConexion;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectarse()==true){
     $query = "CALL SP_S_CategoriaIdMaximo()";
	 $result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
 }
 
 
}
?>
