<?php 
//referenciamos la clase clsConexion
//include_once("clsConexion.php");
include_once("clsConexion.php");

//implementamos la clase empleado
class clsCliente{
 //constructor	
 function clsCliente(){
 }	
 
 //inserta un nuevo empleado en la base de datos
 function agregarCliente($nombre,$ruc,$dni,$direccion,$telefono,$obsv,$usuario,$pass){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "CALL SP_I_Cliente('$nombre','$ruc','$dni','$direccion','$telefono','$obsv','$usuario','$pass')";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 //Modificar empleado en la base de datos
 function modificarCliente($idcliente,$nombre,$ruc,$dni,$direccion,$telefono,$obsv,$usuario,$pass){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "CALL SP_U_Cliente('$idcliente','$nombre','$ruc','$dni','$direccion','$telefono','$obsv','$usuario','$pass')";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
  function consultarCliente(){
   //creamos el objeto $con a partir de la clase clsConexion
   $con = new clsConexion;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectarse()==true){
     $query = "CALL SP_S_Cliente()";
	 $result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
 }
 function consultarTotalClientes(){
   //creamos el objeto $con a partir de la clase clsConexion
   $con = new clsConexion;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectarse()==true){
     $query = "CALL SP_S_ClienteCantidadTotal()";
	 $result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
 } 
 function consultarClientePorParametro($criterio,$busqueda,$limite){
   //creamos el objeto $con a partir de la clase clsConexion
   $con = new clsConexion;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectarse()==true){
     $query = "CALL SP_S_ClientePorParametro('$criterio','$busqueda','$limite')";
	 $result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
 }
 function consultarClienteIdMaximo(){
   //creamos el objeto $con a partir de la clase clsConexion
   $con = new clsConexion;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectarse()==true){
     $query = "CALL SP_S_ClienteIdMaximo()";
	 $result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
 }
 
}
?>
