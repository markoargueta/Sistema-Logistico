<?php 
//Referenciamos la clase clsConexion
include_once("clsConexion.php");

//Implementamos la clase tipousuario
class clsTipoUsuario{
 //Constructor	
 function clsTipoUsuario(){
 }	
 
 //Funcion para agregar una nueva tipousuario en la BD
 function agregarTipoUsuario($descripcion){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "CALL SP_I_TipoUsuario('$descripcion')";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 //Modificar empleado en la base de datos
 function modificarTipoUsuario($idtipousuario,$descripcion){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "CALL SP_U_TipoUsuario('$idtipousuario','$descripcion')";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 function consultarTipoUsuario(){
   //creamos el objeto $con a partir de la clase clsConexion
   $con = new clsConexion;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectarse()==true){
     $query = "CALL SP_S_TipoUsuario()";
	 $result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
 }
 function consultarTipoUsuarioPorParametro($criterio,$idtipousuario){
   //creamos el objeto $con a partir de la clase clsConexion
   $con = new clsConexion;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectarse()==true){
     $query = "CALL SP_S_TipoUsuarioPorParametro('$criterio','$idtipousuario')";
	 $result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
 } 
 function consultarTipoUsuarioIdMaximo(){
   //creamos el objeto $con a partir de la clase clsConexion
   $con = new clsConexion;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectarse()==true){
     $query = "CALL SP_S_TipoUsuarioIdMaximo()";
	 $result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
 }
 
 
}
?>
