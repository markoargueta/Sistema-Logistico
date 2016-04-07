<?php 
//referenciamos la clase clsConexion
include_once("clsConexion.php");
error_reporting(0);

//implementamos la clase empleado
class clsProveedor{
 //constructor	
 function clsProveedor(){
 }	

 function consultarTotalProveedores(){
   //creamos el objeto $con a partir de la clase clsConexion
   $con = new clsConexion;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectarse()==true){
     $query = "CALL SP_S_ProveedorCantidadTotal()";
	 $result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
 }  
 function consultarProveedorPorParametro($criterio,$busqueda,$limite){
   //creamos el objeto $con a partir de la clase clsConexion
   $con = new clsConexion;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectarse()==true){
     $query = "CALL SP_S_ProveedorPorParametro('$criterio','$busqueda','$limitecccc')";
	 $result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
 }
 //inserta un nuevo empleado en la base de datos
 function agregarProveedor($nombre,$ruc,$dni,$direccion,$telefono,$celular,$email,$cuenta1,$cuenta2,$estado,$obsv){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "CALL SP_I_Proveedor('$nombre','$ruc','$dni','$direccion','$telefono','$celular','$email','$cuenta1','$cuenta2','$estado','$obsv')";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 //Modificar empleado en la base de datos
 function modificarProveedor($idproveedor,$nombre,$ruc,$dni,$direccion,$telefono,$celular,$email,$cuenta1,$cuenta2,$estado,$obsv){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "CALL SP_U_Proveedor('$idproveedor','$nombre','$ruc','$dni','$direccion','$telefono','$celular','$email','$cuenta1','$cuenta2','$estado','$obsv')";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 function consultarProveedorIdMaximo(){
   //creamos el objeto $con a partir de la clase clsConexion
   $con = new clsConexion;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectarse()==true){
     $query = "CALL SP_S_ProveedorIdMaximo()";
	 $result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
 }
 
}
?>
