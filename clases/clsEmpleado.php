<?php 
//Referenciamos la clase clsConexion
include_once("clsConexion.php");

//Implementamos la clase empleado
class clsEmpleado{
 //Constructor	
 function clsEmpleado(){
 }	
 
 //Funcion para agregar una nueva empleado en la BD
 function agregarEmpleado($nombre,$apellido,$sexo,$fechanac,$direccion,$telefono,$celular,$email,$dni,$fechaing,$sueldo,$estado,$usuario,$contrasena,$idtipousuario){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "CALL SP_I_Empleado('$nombre','$apellido','$sexo','$fechanac','$direccion','$telefono','$celular','$email','$dni','$fechaing','$sueldo','$estado','$usuario','$contrasena','$idtipousuario')";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 //Modificar empleado en la base de datos
 function modificarEmpleado($idempleado,$nombre,$apellido,$sexo,$fechanac,$direccion,$telefono,$celular,$email,$dni,$fechaing,$sueldo,$estado,$usuario,$contrasena,$idtipousuario){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "CALL SP_U_Empleado('$idempleado','$nombre','$apellido','$sexo','$fechanac','$direccion','$telefono','$celular','$email','$dni','$fechaing','$sueldo','$estado','$usuario','$contrasena','$idtipousuario')";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
  function consultarEmpleado($criterio,$busqueda){
   //creamos el objeto $con a partir de la clase clsConexion
   $con = new clsConexion;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectarse()==true){
     $query = "CALL SP_S_Empleado('$criterio','$busqueda')";
	 $result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
 }

 function Ingresar_Sistema2($user,$password){
   //creamos el objeto $con a partir de la clase clsConexion
   $con = new clsConexion;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectarse()==true){
     $query = "call SP_S_INGRESAR_SISTEMA('$user','$password')";
   $result = @mysql_query($query);
   if (!$result)
     return false;
   else
     return $result;
   }
 }

 function consultarTotalEmpleados(){
   //creamos el objeto $con a partir de la clase clsConexion
   $con = new clsConexion;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectarse()==true){
     $query = "CALL SP_S_EmpleadoCantidadTotal()";
	 $result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
 } 
 function consultarEmpleadoPorParametro($criterio,$busqueda,$limite){
   //creamos el objeto $con a partir de la clase clsConexion
   $con = new clsConexion;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectarse()==true){
     $query = "CALL SP_S_EmpleadoPorParametro('$criterio','$busqueda','$limite')";
	 $result = @mysql_query($query);
	 if (!$result)
	   //die("eeee".mysql_error($con->getCon()));
	   return false;
	 else
	   return $result;
   }
 } 
 
 
 function consultarEmpleadoIdMaximo(){
   //creamos el objeto $con a partir de la clase clsConexion
   $con = new clsConexion;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectarse()==true){
     $query = "CALL SP_S_EmpleadoIdMaximo()";
	 $result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
 }
 
 
}
?>
