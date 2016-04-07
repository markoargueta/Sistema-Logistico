<?php 
//Referenciamos la clase clsConexion
include_once("clsConexion.php");
include_once("producto_compra.php");

class clsCompra{

public function  __construct() {
	$this->conexion = new clsConexion;
}


function consultarCompraUltimoId(){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "CALL SP_S_UltimoIdCompra()";
	 $result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
}

function consultarCompraPorParametro($criterio,$busqueda){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "CALL SP_S_CompraPorParametro('$criterio','$busqueda')";
	 $result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
}

public function consultarProductos(){
   $productos =  array();
   //creamos el objeto $con a partir de la clase clsConexion
   $con = new clsConexion;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectarse()==true){
     $query = "CALL SP_S_ProductoActivo()";
	 $result = @mysql_query($query);
		while($array = mysql_fetch_array($result)){
            //Creo una instanacia de producto y lo almanceo en el array
            $productos[] = new Producto($array['IdProducto'],$array['Codigo'],$array['Nombre'],$array['Stock'],$array['PrecioCosto']);
        }
        return $productos;
   }
} 

//Recupero un producto de froma de objeto de base de datos indicandole su código
public function consultarProductoPorCodigo($codigo){
 $producto =  null;
   //creamos el objeto $con a partir de la clase clsConexion
   $con = new clsConexion;
   //usamos el metodo conectar para realizar la conexion
   if($con->conectarse()==true){
	 $query="CALL SP_S_ProductoActivoPorParametro('codigo','$codigo')";
     //$query = "SELECT * FROM producto WHERE Codigo=".mysql_escape_string($codigo);
	 $result = @mysql_query($query);
		 while($array = mysql_fetch_array($result)){
            //Creo una instanacia de producto y lo almanceo en el array
            $producto = new Producto($array['IdProducto'],$array['Codigo'],$array['Nombre'],$array['Stock'],$array['PrecioCosto']);
        }
        return $producto;
   }
 } 


public function generarNumCompra() {
	
	$con = new clsConexion;
	if($con->conectarse()==true){
		$query = "CALL SP_S_UltimoIdCompra()";
	 	$result = @mysql_query($query);
		while($array = mysql_fetch_array($result)){
        	$ultimo_id_compra=$array['id']+1;
        }
		
	}
	$strNum_compra=str_pad((int) $ultimo_id_compra,10,"0",STR_PAD_LEFT);
	return "C".$strNum_compra;

}


//Guardar los datos de la compra 
function guardarFactura($productos,$idtipodoc,$idprov,$idemp,$numfact,$subtotal,$iva,$total,$estado){
	$con = new clsConexion;
	if($con->conectarse()==true){
		$query="CALL SP_I_Compra($idtipodoc,$idprov,$idemp,'$numfact',now(),$subtotal,$iva,$total,'$estado')";
		
		$result = @mysql_query($query);				 
		if(!$result){
			echo "Error en la Transaccion: ".mysql_error();
			mysql_query("ROLLBACK;");           //Terminar la transaccion si hay error
			exit();
		}			
	}


	//Hallar el id de la ultima compra generada
	//	$facnum = mysql_insert_id();
	if($con->conectarse()==true){
		$sql_u="CALL SP_S_UltimoIdCompra()";
		$result_u = @mysql_query($sql_u);
		while($array_u = mysql_fetch_array($result_u)){
			$facnum=$array_u['id'];
			
		}
		
	}

	//Guardar el detalle de la compra
	

	foreach($productos as $producto){
		if($con->conectarse()==true){
			$sql1 = "CALL SP_I_DetalleCompra($facnum,$producto->idpro,$producto->cantidad,$producto->costpro,{$producto->precioTotal()})";

			$result = @mysql_query($sql1);				 
			if(!$result){
				echo "Error en la Transaccion: ".mysql_error();
				mysql_query("ROLLBACK;"); //Terminar la transaccion si hay error
				exit();
			}

			
		}
		if($con->conectarse()==true){	
			$sql_a="CALL SP_S_ProductoActivoPorParametro('id','$producto->idpro')";
			$ncant=0;
			$result_a = @mysql_query($sql_a);
			while($array_a = mysql_fetch_array($result_a)){
				$cant=$array_a['Stock'];
				
			}
			

		}
			
			$ncant=$cant+$producto->cantidad;
			if($con->conectarse()==true){	
			$sql3="CALL SP_U_ActualizarProductoStock('$producto->idpro','$ncant')";
			$result3 = @mysql_query($sql3);	
			if(!$result3){
				echo "Error en la Transaccion: ".mysql_error();

			}	
			}
		
	}

	
}

//-----------------------------------------------------
//----- Funciones para las Consultas-----------
//-----------------------------------------------------
function consultarCompraPorFecha($criterio,$fechaini,$fechafin,$tipodoc){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "CALL SP_S_CompraPorFecha('$criterio','$fechaini','$fechafin','$tipodoc')";
	 $result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
}
function consultarCompraPorDetalle($criterio,$fechaini,$fechafin){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "CALL SP_S_CompraPorDetalle('$criterio','$fechaini','$fechafin')";
	 $result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
}


}
?>

