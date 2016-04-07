<?php 
//Referenciamos la clase clsConexion
include_once("clsConexion.php");
//Implementamos la clase categoria
class clsPermisos{
 //Constructor	
 function clsPermisos(){
 }
//Grant

 //Funcion para dar permisos de insercion categoria
 function insertarCategoria($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_I_Categoria TO $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 //Funcion para dar permisos de insercion cliente
 function insertarCliente($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_I_Cliente TO $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }	
  //Funcion para dar permisos de insercion compra
 function insertarCompra($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_I_Compra TO $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }	
  //Funcion para dar permisos de insercion detcompra
 function insertarDetcompra($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_I_DetalleCompra TO $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 //Funcion para dar permisos de insercion detventa
 function insertarDetventa($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_I_DetalleVenta TO $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 //Funcion para dar permisos de insercion empleado
 function insertarEmpleado($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_I_Empleado TO $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
  //Funcion para dar permisos de insercion producto
 function insertarProducto($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_I_Producto TO $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
   //Funcion para dar permisos de insercion proveedor
 function insertarProveedor($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_I_Proveedor TO $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
    //Funcion para dar permisos de insercion tipodoc
 function insertarTipodoc($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_I_TipoDocumento TO $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 	//Funcion para dar permisos de insercion tipousu
 function insertarTipousu($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_I_TipoUsuario TO $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 } 
 	//Funcion para dar permisos de insercion venta
 function insertarVenta($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_I_Venta TO $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
  	//Funcion para dar permisos de insercion pedido
 function insertarPedido($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_I_Pedido TO $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
  	//Funcion para dar permisos de insercion detalle pedido
 function insertarDetpedido($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_I_DetallePedido TO $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
    
 //Funcion para dar permisos de modificacion categoria
 function modificarCategoria($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_U_Categoria TO $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 //Funcion para dar permisos de modificacion cliente
 function modificarCliente($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_U_Cliente TO $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }	
  //Funcion para dar permisos de modificacion compra
 function modificarCompra($tipo_usu){
    $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_U_Compra TO $tipo_usu";
     $result = @mysql_query($query);
   }
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_U_ActualizarCompraEstado TO $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }	
  //Funcion para dar permisos de modificacion detcompra
 function modificarDetcompra($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_U_DetalleCompra TO $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 //Funcion para dar permisos de modificacion detventa
 function modificarDetventa($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_U_DetalleVenta TO $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 //Funcion para dar permisos de modificacion empleado
 function modificarEmpleado($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_U_Empleado TO $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
  //Funcion para dar permisos de modificacion producto
 function modificarProducto($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_U_Producto TO $tipo_usu";
     $result = @mysql_query($query);
   }
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_U_ActualizarProductoStock TO $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
   //Funcion para dar permisos de modificacion proveedor
 function modificarProveedor($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_U_Proveedor TO $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
    //Funcion para dar permisos de modificacion tipodoc
 function modificarTipodoc($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_U_TipoDocumento TO $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 	//Funcion para dar permisos de modificacion tipousu
 function modificarTipousu($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_U_TipoUsuario TO $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 } 
 	//Funcion para dar permisos de modificacion venta
 function modificarVenta($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_U_Venta TO $tipo_usu";
     $result = @mysql_query($query);
   }
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_U_ActualizarVentaEstado TO $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }  	
 	//Funcion para dar permisos de modificacion pedido
 function modificarPeido($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_U_Pedido TO $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 } 
 	//Funcion para dar permisos de modificacion detalle pedido
 function modificarDetpedido($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_U_DetallePedido TO $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 } 
 
 //Funcion para dar permisos de seleccion categoria
 function seleccionarCategoria($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_S_Categoria TO $tipo_usu";
     $result = @mysql_query($query);
   }
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_S_CategoriaIdMaximo TO $tipo_usu";
     $result = @mysql_query($query);
   }
    $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_S_CategoriaPorParametro TO $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 //Funcion para dar permisos de seleccion cliente
 function seleccionarCliente($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_S_Cliente TO $tipo_usu";
     $result = @mysql_query($query);
   }
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_S_ClienteIdMaximo TO $tipo_usu";
     $result = @mysql_query($query);
   }
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_S_ClientePorParametro TO $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }	
  //Funcion para dar permisos de seleccion compra
 function seleccionarCompra($tipo_usu){
    $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_S_Compra TO $tipo_usu";
     $result = @mysql_query($query);
   }
    $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_S_UltimoIdCompra TO $tipo_usu";
     $result = @mysql_query($query);
   }
    $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_S_CompraPorDetalle TO $tipo_usu";
     $result = @mysql_query($query);
   }
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_S_CompraPorFecha TO $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }	
  //Funcion para dar permisos de seleccion detcompra
 function seleccionarDetcompra($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_S_DetalleCompra TO $tipo_usu";
     $result = @mysql_query($query);
    }
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_S_DetalleCompraPorParametro TO $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 //Funcion para dar permisos de seleccion detventa
 function seleccionarDetventa($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_S_DetalleVenta TO $tipo_usu";
     $result = @mysql_query($query);
   }
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_S_DetalleVentaPorParametro TO $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 //Funcion para dar permisos de seleccion empleado
 function seleccionarEmpleado($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_S_Empleado TO $tipo_usu";
     $result = @mysql_query($query);
   }
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_S_EmpleadoIdMaximo TO $tipo_usu";
     $result = @mysql_query($query);
   }
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_S_EmpleadoPorParametro TO $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
  //Funcion para dar permisos de seleccion producto
 function seleccionarProducto($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_S_Producto TO $tipo_usu";
     $result = @mysql_query($query);
   }
    $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_S_ProductoActivo TO $tipo_usu";
     $result = @mysql_query($query);
   }
    $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_S_ProductoActivoPorParametro TO $tipo_usu";
     $result = @mysql_query($query);
   }
    $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_S_ProductoIdMaximo TO $tipo_usu";
     $result = @mysql_query($query);
   }
    $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_S_ProductoPorParametro TO $tipo_usu";
     $result = @mysql_query($query);
   }
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_S_ProductoVerificarCodigoBar TO $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
   //Funcion para dar permisos de seleccion proveedor
 function seleccionarProveedor($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_S_Proveedor TO $tipo_usu";
     $result = @mysql_query($query);
   }
    $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_S_ProveedorIdMaximo TO $tipo_usu";
     $result = @mysql_query($query);
   }
    $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_S_ProveedorPorParametro TO $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
    //Funcion para dar permisos de seleccion tipodoc
 function seleccionarTipodoc($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_S_TipoDocumento TO $tipo_usu";
     $result = @mysql_query($query);
   }
    $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_S_TipoDocumentoIdMaximo TO $tipo_usu";
     $result = @mysql_query($query);
   }
    $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_S_TipoDocumentoPorParametro TO $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 	//Funcion para dar permisos de seleccion tipousu
 function seleccionarTipousu($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_S_TipoUsuario TO $tipo_usu";
     $result = @mysql_query($query);
   }
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_S_TipoUsuarioPorParametro TO $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 } 
 	//Funcion para dar permisos de seleccion venta
 function seleccionarVenta($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_S_Venta TO $tipo_usu";
     $result = @mysql_query($query);
   }
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_S_UltimoIdVenta TO $tipo_usu";
     $result = @mysql_query($query);
   }
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_S_VentaMensual TO $tipo_usu";
     $result = @mysql_query($query);
   }
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_S_VentaPorDetalle TO $tipo_usu";
     $result = @mysql_query($query);
   }
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_S_VentaPorFecha TO $tipo_usu";
     $result = @mysql_query($query);
   }
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_S_VentaPorParametro TO $tipo_usu";
     $result = @mysql_query($query);
   }
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_S_Venta_DetallePorParametro TO $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }  
  	//Funcion para dar permisos de seleccion pedido
 function seleccionarPedido($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_S_PedidoPorParametro TO $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 	//Funcion para dar permisos de seleccion detalle pedido
 function seleccionarDetpedido($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "GRANT EXECUTE ON PROCEDURE db_casita.SP_S_DetallePedidoPorParametro TO $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 	
// Revoke

 //Funcion para dar permisos de insercion categoria
 function reinsertarCategoria($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_I_Categoria FROM $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 //Funcion para dar permisos de insercion cliente
 function reinsertarCliente($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_I_Cliente FROM $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }	
  //Funcion para dar permisos de insercion compra
 function reinsertarCompra($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_I_Compra FROM $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }	
  //Funcion para dar permisos de insercion detcompra
 function reinsertarDetcompra($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_I_DetalleCompra FROM $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 //Funcion para dar permisos de insercion detventa
 function reinsertarDetventa($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_I_DetalleVenta FROM $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 //Funcion para dar permisos de insercion empleado
 function reinsertarEmpleado($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_I_Empleado FROM $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
  //Funcion para dar permisos de insercion producto
 function reinsertarProducto($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_I_Producto FROM $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
   //Funcion para dar permisos de insercion proveedor
 function reinsertarProveedor($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_I_Proveedor FROM $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
    //Funcion para dar permisos de insercion tipodoc
 function reinsertarTipodoc($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_I_TipoDocumento FROM $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 	//Funcion para dar permisos de insercion tipousu
 function reinsertarTipousu($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_I_TipoUsuario FROM $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 } 
 	//Funcion para dar permisos de insercion venta
 function reinsertarVenta($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_I_Venta FROM $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
  	//Funcion para dar permisos de insercion pedido
 function reinsertarPedido($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_I_Pedido FROM $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
  	//Funcion para dar permisos de insercion detalle pedido
 function reinsertarDetpedido($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_I_DetallePedido FROM $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
    
 //Funcion para dar permisos de modificacion categoria
 function remodificarCategoria($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_U_Categoria FROM $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 //Funcion para dar permisos de modificacion cliente
 function remodificarCliente($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_U_Cliente FROM $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }	
  //Funcion para dar permisos de modificacion compra
 function remodificarCompra($tipo_usu){
    $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_U_Compra FROM $tipo_usu";
     $result = @mysql_query($query);
   }
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_U_ActualizarCompraEstado FROM $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }	
  //Funcion para dar permisos de modificacion detcompra
 function remodificarDetcompra($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_U_DetalleCompra FROM $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 //Funcion para dar permisos de modificacion detventa
 function remodificarDetventa($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_U_DetalleVenta FROM $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 //Funcion para dar permisos de modificacion empleado
 function remodificarEmpleado($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_U_Empleado FROM $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
  //Funcion para dar permisos de modificacion producto
 function remodificarProducto($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_U_Producto FROM $tipo_usu";
     $result = @mysql_query($query);
   }
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_U_ActualizarProductoStock FROM $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
   //Funcion para dar permisos de modificacion proveedor
 function remodificarProveedor($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_U_Proveedor FROM $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
    //Funcion para dar permisos de modificacion tipodoc
 function remodificarTipodoc($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_U_TipoDocumento FROM $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 	//Funcion para dar permisos de modificacion tipousu
 function remodificarTipousu($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_U_TipoUsuario FROM $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 } 
 	//Funcion para dar permisos de modificacion venta
 function remodificarVenta($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_U_Venta FROM $tipo_usu";
     $result = @mysql_query($query);
   }
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_U_ActualizarVentaEstado FROM $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }  	
 	//Funcion para dar permisos de modificacion pedido
 function remodificarPeido($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_U_Pedido FROM $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 } 
 	//Funcion para dar permisos de modificacion detalle pedido
 function remodificarDetpedido($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_U_DetallePedido FROM $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 } 
 
 //Funcion para dar permisos de seleccion categoria
 function reseleccionarCategoria($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_S_Categoria FROM $tipo_usu";
     $result = @mysql_query($query);
   }
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_S_CategoriaIdMaximo FROM $tipo_usu";
     $result = @mysql_query($query);
   }
    $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_S_CategoriaPorParametro FROM $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 //Funcion para dar permisos de seleccion cliente
 function reseleccionarCliente($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_S_Cliente FROM $tipo_usu";
     $result = @mysql_query($query);
   }
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_S_ClienteIdMaximo FROM $tipo_usu";
     $result = @mysql_query($query);
   }
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_S_ClientePorParametro FROM $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }	
  //Funcion para dar permisos de seleccion compra
 function reseleccionarCompra($tipo_usu){
    $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_S_Compra FROM $tipo_usu";
     $result = @mysql_query($query);
   }
    $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_S_UltimoIdCompra FROM $tipo_usu";
     $result = @mysql_query($query);
   }
    $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_S_CompraPorDetalle FROM $tipo_usu";
     $result = @mysql_query($query);
   }
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_S_CompraPorFecha FROM $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }	
  //Funcion para dar permisos de seleccion detcompra
 function reseleccionarDetcompra($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_S_DetalleCompra FROM $tipo_usu";
     $result = @mysql_query($query);
    }
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_S_DetalleCompraPorParametro FROM $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 //Funcion para dar permisos de seleccion detventa
 function reseleccionarDetventa($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_S_DetalleVenta FROM $tipo_usu";
     $result = @mysql_query($query);
   }
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_S_DetalleVentaPorParametro FROM $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 //Funcion para dar permisos de seleccion empleado
 function reseleccionarEmpleado($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_S_Empleado FROM $tipo_usu";
     $result = @mysql_query($query);
   }
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_S_EmpleadoIdMaximo FROM $tipo_usu";
     $result = @mysql_query($query);
   }
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_S_EmpleadoPorParametro FROM $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
  //Funcion para dar permisos de seleccion producto
 function reseleccionarProducto($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_S_Producto FROM $tipo_usu";
     $result = @mysql_query($query);
   }
    $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_S_ProductoActivo FROM $tipo_usu";
     $result = @mysql_query($query);
   }
    $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_S_ProductoActivoPorParametro FROM $tipo_usu";
     $result = @mysql_query($query);
   }
    $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_S_ProductoIdMaximo FROM $tipo_usu";
     $result = @mysql_query($query);
   }
    $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_S_ProductoPorParametro FROM $tipo_usu";
     $result = @mysql_query($query);
   }
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_S_ProductoVerificarCodigoBar FROM $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
   //Funcion para dar permisos de seleccion proveedor
 function reseleccionarProveedor($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_S_Proveedor FROM $tipo_usu";
     $result = @mysql_query($query);
   }
    $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_S_ProveedorIdMaximo FROM $tipo_usu";
     $result = @mysql_query($query);
   }
    $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_S_ProveedorPorParametro FROM $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
    //Funcion para dar permisos de seleccion tipodoc
 function reseleccionarTipodoc($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_S_TipoDocumento FROM $tipo_usu";
     $result = @mysql_query($query);
   }
    $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_S_TipoDocumentoIdMaximo FROM $tipo_usu";
     $result = @mysql_query($query);
   }
    $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_S_TipoDocumentoPorParametro FROM $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 	//Funcion para dar permisos de seleccion tipousu
 function reseleccionarTipousu($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_S_TipoUsuario FROM $tipo_usu";
     $result = @mysql_query($query);
   }
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_S_TipoUsuarioPorParametro FROM $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 } 
 	//Funcion para dar permisos de seleccion venta
 function reseleccionarVenta($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_S_Venta FROM $tipo_usu";
     $result = @mysql_query($query);
   }
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_S_UltimoIdVenta FROM $tipo_usu";
     $result = @mysql_query($query);
   }
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_S_VentaMensual FROM $tipo_usu";
     $result = @mysql_query($query);
   }
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_S_VentaPorDetalle FROM $tipo_usu";
     $result = @mysql_query($query);
   }
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_S_VentaPorFecha FROM $tipo_usu";
     $result = @mysql_query($query);
   }
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_S_VentaPorParametro FROM $tipo_usu";
     $result = @mysql_query($query);
   }
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_S_Venta_DetallePorParametro FROM $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }  
  	//Funcion para dar permisos de seleccion pedido
 function reseleccionarPedido($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_S_PedidoPorParametro FROM $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
 	//Funcion para dar permisos de seleccion detalle pedido
 function reseleccionarDetpedido($tipo_usu){
   $con = new clsConexion;
   if($con->conectarse()==true){
     $query = "REVOKE EXECUTE ON PROCEDURE db_casita.SP_S_DetallePedidoPorParametro FROM $tipo_usu";
     $result = @mysql_query($query);
     if (!$result)
	   return false;
     else
       return true;
   }
 }
}
?>