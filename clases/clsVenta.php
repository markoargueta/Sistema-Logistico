<?php 
//Referenciamos la clase clsConexion
@include_once("clsConexion.php");
@include_once("producto_venta.php");

class clsVenta{

public function  __construct() {
	$this->conexion = new clsConexion;
}


function consultarVentaUltimoId(){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "CALL SP_S_UltimoIdVenta()";
	 $result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
}

function CompraTotalDiaria(){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "CALL SP_S_COMPRA_TOTAL_DIARIA()";
	 $result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
}

function MostrarGraficoTotal(){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "CALL reporte_grafico_totales()";
	 $result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
}

function MostrarGraficoMes(){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "CALL reporte_grafico_mes()";
	 $result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
}

function MostrarGraficoDia(){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "CALL reporte_grafico_dias()";
	 $result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
}


function MostrarAnioGrafico(){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "CALL ANIO_GRAFICO()";
	 $result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
}

function VentaTotalDiaria(){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "CALL SP_S_VENTA_TOTAL_DIARIA()";
	 $result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
}

function CantidadVentas(){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "CALL SP_S_CANTIDAD_VENTAS()";
	 $result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
}

function CantidadCompras(){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "CALL SP_S_CANTIDAD_COMPRAS()";
	 $result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
}


function consultarVentaPorParametro($criterio,$busqueda){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "CALL SP_S_VentaPorParametro('$criterio','$busqueda')";
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
            $productos[] = new Producto($array['IdProducto'],$array['Codigo'],$array['Nombre'],$array['Stock'],$array['PrecioCosto'],$array['PrecioVenta']);
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
            $producto = new Producto($array['IdProducto'],$array['Codigo'],$array['Nombre'],$array['Stock'],$array['PrecioCosto'],$array['PrecioVenta']);
        }
        return $producto;
   }
 } 


public function generarNumVenta() {
	
	$con = new clsConexion;
	if($con->conectarse()==true){
		$query = "CALL SP_S_UltimoIdVenta()";
	 	$result = @mysql_query($query);
		while($array = mysql_fetch_array($result)){
        	$ultimo_id_venta=$array['id']+1;
        }
		
	}
	$strNum_venta=str_pad((int) $ultimo_id_venta,10,"0",STR_PAD_LEFT);
	return "C".$strNum_venta;

}


//Guardar los datos de la Venta 
function guardarFactura($productos,$idtipodoc,$idclie,$idemp,$serie,$numfact,$valorventa,$iva,$total,$estado){
	$con = new clsConexion;
	if($con->conectarse()==true){
		$query="CALL SP_I_Venta($idtipodoc,$idclie,$idemp,'$serie','$numfact',now(),$valorventa,$iva,$total,'$estado')";
		$result = @mysql_query($query);				 
		if(!$result){
			echo "Error en la Transaccion: ".mysql_error();
			mysql_query("ROLLBACK;");           //Terminar la transaccion si hay error
			exit();
		}			
	}


	//Hallar el id de la ultima venta generada
	//	$facnum = mysql_insert_id();
	if($con->conectarse()==true){
		$sql_u="CALL SP_S_UltimoIdVenta()";
		$result_u = @mysql_query($sql_u);
		while($array_u = mysql_fetch_array($result_u)){
			$facnum=$array_u['id'];
			
		}
		
	}

	//Guardar el detalle de la venta
	

	foreach($productos as $producto){
		if($con->conectarse()==true){
			$sql1 = "CALL SP_I_detalleventa($facnum,$producto->idpro,$producto->cantidad,$producto->costpro,$producto->prepro,{$producto->precioTotal()})";

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
			
			$ncant=$cant-$producto->cantidad;
			if($con->conectarse()==true){	
			$sql3="CALL SP_U_ActualizarProductoStock('$producto->idpro','$ncant')";
			//$sql3="UPDATE producto SET Stock='$ncant' WHERE IdProducto='$producto->idpro'";
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

function consultarVentaPorFecha($criterio,$fechaini,$fechafin,$tipodoc){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "CALL SP_S_VentaPorFecha('$criterio','$fechaini','$fechafin','$tipodoc')";
	 $result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
}
function consultarVentaPorDetalle($criterio,$fechaini,$fechafin){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "CALL SP_S_VentaPorDetalle('$criterio','$fechaini','$fechafin')";
	 $result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
}
function consultarVentaMensual($criterio,$fechaini,$fechafin){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "CALL SP_S_VentaMensual('$criterio','$fechaini','$fechafin')";
	 $result = @mysql_query($query);
	 if (!$result)
	   return false;
	 else
	   return $result;
   }
}
}
?>

