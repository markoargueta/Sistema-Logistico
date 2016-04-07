<?php 
//Referenciamos la clase clsConexion
@include_once("../venta/producto.php");
@include_once ("clsConexion.php");

//Implementamos la clase tipousuario
class clsPedido
{
	 //Constructor	
 	function clsPedido()
	{
	}	
 
 //Funcion para agregar una nueva tipousuario en la BD
 	/*function agregarPedido($idcliente, $fecha_sol, $fecha_ent, $total, $estado){
		$con = new clsConexion;
		if($con->conectarse()==true){
			$query = "CALL SP_I_Pedido('$idcliente', '$fecha_sol', '$fecha_ent', '$total', '$estado')";
			$result = @mysql_query($query);
			if (!$result)
				return false;
			else
				return true;
   		}
 	}*/
	
 //Modificar empleado en la base de datos
 	function modificarPedido($id, $idcliente, $fecha_sol, $fecha_ent, $total, $estado){
   		$con = new clsConexion;
   		if($con->conectarse()==true){
     		$query = "CALL SP_U_Pedido('$id','$idcliente', '$fecha_sol', '$fecha_ent', '$total', '$estado')";
     		$result = @mysql_query($query);
     		if (!$result)
	   			return false;
     		else
       			return true;
   		}
 	}

 
 	function consultarPedidoPorParametro($criterio,$busqueda){
   	//creamos el objeto $con a partir de la clase clsConexion
   		$con = new clsConexion;
   //usamos el metodo conectar para realizar la conexion
   		if($con->conectarse()==true){
     		$query = "CALL SP_S_PedidoPorParametro('$criterio','$busqueda')";
	 		$result = @mysql_query($query);
	 		if (!$result)
	   			return false;
	 		else
	   			return $result;
   		}
 	} 
	
	function guardarPedido($productos,$idcliente,$npedido,$valorventa,$iva,$total,$estado)
	{
		$con = new clsConexion;
		if($con->conectarse()==true)
		{
			$query = "CALL SP_I_Pedido('$idcliente','$npedido',now(), ' ', '$valorventa','$iva','$total', '$estado')";
			$result = @mysql_query($query);				 
			if(!$result)
			{
				echo "Error en la Transaccion: ".mysql_error();
				mysql_query("ROLLBACK;");           //Terminar la transaccion si hay error
				exit();
			}			
		}
		
		$rs = mysql_query("SELECT MAX(IdPedido) AS id FROM pedido");
		if ($row = mysql_fetch_row($rs)) {
			$id = trim($row[0]);
		}
		/*$facnum = mysql_insert_id();*/
		
		foreach($productos as $producto){
			if($con->conectarse()==true){
				$sql1 = "CALL SP_I_DetallePedido($id, $producto->idpro,$producto->cantidad,$producto->prepro,{$producto->precioTotal()})"; 
				$result = @mysql_query($sql1);				 
				if(!$result){
					echo "Error en la Transaccion: ".mysql_error();
					mysql_query("ROLLBACK;");           //Terminar la transaccion si hay error
					exit();
				}
				$sql2="SELECT * FROM producto WHERE IdProducto='$producto->idpro'";
				$ncant=0;
				$result2 = @mysql_query($sql2);		
				while($row = mysql_fetch_array($result2)){
					$cant=$row["Stock"];
				}
				$ncant=$cant-$producto->cantidad;
				$sql3="UPDATE producto SET Stock='$ncant' WHERE IdProducto='$producto->idpro'";
				$result3 = @mysql_query($sql3);		
			}
		}
	}
}

?>