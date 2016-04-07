<?php 
include_once("../clases/clsPermisos.php");
$objpermisos=new clsPermisos;

$tipopermiso = $_POST["estado"];

if($tipopermiso == "permitir")
{
	$tipo_usu = $_POST["tipo_usu"];
	//categoria
	if (isset ($_POST["Icat"]) )
	{
		$objpermisos->insertarCategoria($tipo_usu);
	}
	if (isset ($_POST["Ucat"]) )
	{
		$objpermisos->modificarCategoria($tipo_usu);
	}
	if (isset ($_POST["Scat"]) )
	{
		$objpermisos->seleccionarCategoria($tipo_usu);
	}
	//cliente
	if (isset ($_POST["Icli"]) )
	{
		$objpermisos->insertarCliente($tipo_usu);
	}
	if (isset ($_POST["Ucli"]) )
	{
		$objpermisos->modificarCliente($tipo_usu);
	}
	if (isset ($_POST["Scli"]) )
	{
		$objpermisos->seleccionarCliente($tipo_usu);
	}
	//compra
	if (isset ($_POST["Icomp"]) )
	{
		$objpermisos->insertarCompra($tipo_usu);
	}
	if (isset ($_POST["Ucomp"]) )
	{
		$objpermisos->modificarCompra($tipo_usu);
	}
	if (isset ($_POST["Scomp"]) )
	{
		$objpermisos->seleccionarCompra($tipo_usu);
	}
	//detalle compra
	if (isset ($_POST["Idcomp"]) )
	{
		$objpermisos->insertarDetcompra($tipo_usu);
	}
	if (isset ($_POST["Udcomp"]) )
	{
		$objpermisos->modificarDetcompra($tipo_usu);
	}
	if (isset ($_POST["Sdcomp"]) )
	{
		$objpermisos->seleccionarDetcompra($tipo_usu);
	}
	//venta
	if (isset ($_POST["Ivent"]) )
	{
		$objpermisos->insertarVenta($tipo_usu);
	}
	if (isset ($_POST["Uvent"]) )
	{
		$objpermisos->modificarVenta($tipo_usu);
	}
	if (isset ($_POST["Svent"]) )
	{
		$objpermisos->seleccionarVenta($tipo_usu);
	}
	//detalle venta
	if (isset ($_POST["Idvent"]) )
	{
		$objpermisos->insertarDetventa($tipo_usu);
	}
	if (isset ($_POST["Udvent"]) )
	{
		$objpermisos->modificarDetventa($tipo_usu);
	}
	if (isset ($_POST["Sdvent"]) )
	{
		$objpermisos->seleccionarDetventa($tipo_usu);
	}
	//empleado
	if (isset ($_POST["Iemp"]) )
	{
		$objpermisos->insertarEmpleado($tipo_usu);
	}
	if (isset ($_POST["Uemp"]) )
	{
		$objpermisos->modificarEmpleado($tipo_usu);
	}
	if (isset ($_POST["Semp"]) )
	{
		$objpermisos->seleccionarEmpleado($tipo_usu);
	}
	//producto
	if (isset ($_POST["Iprod"]) )
	{
		$objpermisos->insertarProducto($tipo_usu);
	}
	if (isset ($_POST["Uprod"]) )
	{
		$objpermisos->modificarProducto($tipo_usu);
	}
	if (isset ($_POST["Sprod"]) )
	{
		$objpermisos->seleccionarProducto($tipo_usu);
	}
	//proveedor
	if (isset ($_POST["Iprov"]) )
	{
		$objpermisos->insertarProveedor($tipo_usu);
	}
	if (isset ($_POST["Uprov"]) )
	{
		$objpermisos->modificarProveedor($tipo_usu);
	}
	if (isset ($_POST["Sprov"]) )
	{
		$objpermisos->seleccionarProveedor($tipo_usu);
	}
	//tipo documento
	if (isset ($_POST["Itdoc"]) )
	{
		$objpermisos->insertarTipodoc($tipo_usu);
	}
	if (isset ($_POST["Utdoc"]) )
	{
		$objpermisos->modificarTipodoc($tipo_usu);
	}
	if (isset ($_POST["Stdoc"]) )
	{
		$objpermisos->seleccionarTipodoc($tipo_usu);
	}
	//tipo usuario
	if (isset ($_POST["Itusu"]) )
	{
		$objpermisos->insertarTipousu($tipo_usu);
	}
	if (isset ($_POST["Utusu"]) )
	{
		$objpermisos->modificarTipousu($tipo_usu);
	}
	if (isset ($_POST["Stusu"]) )
	{
		$objpermisos->seleccionarTipousu($tipo_usu);
	}
	//pedido
	if (isset ($_POST["Iped"]) )
	{
		$objpermisos->insertarPedido($tipo_usu);
	}
	if (isset ($_POST["Uped"]) )
	{
		$objpermisos->modificarPedido($tipo_usu);
	}
	if (isset ($_POST["Sped"]) )
	{
		$objpermisos->seleccionarPedido($tipo_usu);
	}
	//detalle pedido
	if (isset ($_POST["Idped"]) )
	{
		$objpermisos->insertarDetpedido($tipo_usu);
	}
	if (isset ($_POST["Udped"]) )
	{
		$objpermisos->modificarDetpedido($tipo_usu);
	}
	if (isset ($_POST["Sdped"]) )
	{
		$objpermisos->seleccionarDetpedido($tipo_usu);
	}
	header("Location: index.php?mensaje=Se asignaron los premisos correctamente");
}
else
{
	$tipo_usu = $_POST["tipo_usu"];
	//categoria
	if (isset ($_POST["Icat"]) )
	{
		$objpermisos->reinsertarCategoria($tipo_usu);
	}
	if (isset ($_POST["Ucat"]) )
	{
		$objpermisos->remodificarCategoria($tipo_usu);
	}
	if (isset ($_POST["Scat"]) )
	{
		$objpermisos->reseleccionarCategoria($tipo_usu);
	}
	//cliente
	if (isset ($_POST["Icli"]) )
	{
		$objpermisos->reinsertarCliente($tipo_usu);
	}
	if (isset ($_POST["Ucli"]) )
	{
		$objpermisos->remodificarCliente($tipo_usu);
	}
	if (isset ($_POST["Scli"]) )
	{
		$objpermisos->reseleccionarCliente($tipo_usu);
	}
	//compra
	if (isset ($_POST["Icomp"]) )
	{
		$objpermisos->reinsertarCompra($tipo_usu);
	}
	if (isset ($_POST["Ucomp"]) )
	{
		$objpermisos->remodificarCompra($tipo_usu);
	}
	if (isset ($_POST["Scomp"]) )
	{
		$objpermisos->reseleccionarCompra($tipo_usu);
	}
	//detalle compra
	if (isset ($_POST["Idcomp"]) )
	{
		$objpermisos->reinsertarDetcompra($tipo_usu);
	}
	if (isset ($_POST["Udcomp"]) )
	{
		$objpermisos->remodificarDetcompra($tipo_usu);
	}
	if (isset ($_POST["Sdcomp"]) )
	{
		$objpermisos->reseleccionarDetcompra($tipo_usu);
	}
	//venta
	if (isset ($_POST["Ivent"]) )
	{
		$objpermisos->reinsertarVenta($tipo_usu);
	}
	if (isset ($_POST["Uvent"]) )
	{
		$objpermisos->remodificarVenta($tipo_usu);
	}
	if (isset ($_POST["Svent"]) )
	{
		$objpermisos->reseleccionarVenta($tipo_usu);
	}
	//detalle venta
	if (isset ($_POST["Idvent"]) )
	{
		$objpermisos->reinsertarDetventa($tipo_usu);
	}
	if (isset ($_POST["Udvent"]) )
	{
		$objpermisos->remodificarDetventa($tipo_usu);
	}
	if (isset ($_POST["Sdvent"]) )
	{
		$objpermisos->reseleccionarDetventa($tipo_usu);
	}
	//empleado
	if (isset ($_POST["Iemp"]) )
	{
		$objpermisos->reinsertarEmpleado($tipo_usu);
	}
	if (isset ($_POST["Uemp"]) )
	{
		$objpermisos->remodificarEmpleado($tipo_usu);
	}
	if (isset ($_POST["Semp"]) )
	{
		$objpermisos->reseleccionarEmpleado($tipo_usu);
	}
	//producto
	if (isset ($_POST["Iprod"]) )
	{
		$objpermisos->reinsertarProducto($tipo_usu);
	}
	if (isset ($_POST["Uprod"]) )
	{
		$objpermisos->remodificarProducto($tipo_usu);
	}
	if (isset ($_POST["Sprod"]) )
	{
		$objpermisos->reseleccionarProducto($tipo_usu);
	}
	//proveedor
	if (isset ($_POST["Iprov"]) )
	{
		$objpermisos->reinsertarProveedor($tipo_usu);
	}
	if (isset ($_POST["Uprov"]) )
	{
		$objpermisos->remodificarProveedor($tipo_usu);
	}
	if (isset ($_POST["Sprov"]) )
	{
		$objpermisos->reseleccionarProveedor($tipo_usu);
	}
	//tipo documento
	if (isset ($_POST["Itdoc"]) )
	{
		$objpermisos->reinsertarTipodoc($tipo_usu);
	}
	if (isset ($_POST["Utdoc"]) )
	{
		$objpermisos->remodificarTipodoc($tipo_usu);
	}
	if (isset ($_POST["Stdoc"]) )
	{
		$objpermisos->reseleccionarTipodoc($tipo_usu);
	}
	//tipo usuario
	if (isset ($_POST["Itusu"]) )
	{
		$objpermisos->reinsertarTipousu($tipo_usu);
	}
	if (isset ($_POST["Utusu"]) )
	{
		$objpermisos->remodificarTipousu($tipo_usu);
	}
	if (isset ($_POST["Stusu"]) )
	{
		$objpermisos->reseleccionarTipousu($tipo_usu);
	}
	//pedido
	if (isset ($_POST["Iped"]) )
	{
		$objpermisos->reinsertarPedido($tipo_usu);
	}
	if (isset ($_POST["Uped"]) )
	{
		$objpermisos->remodificarPedido($tipo_usu);
	}
	if (isset ($_POST["Sped"]) )
	{
		$objpermisos->reseleccionarPedido($tipo_usu);
	}
	//detalle pedido
	if (isset ($_POST["Idped"]) )
	{
		$objpermisos->reinsertarDetpedido($tipo_usu);
	}
	if (isset ($_POST["Udped"]) )
	{
		$objpermisos->remodificarDetpedido($tipo_usu);
	}
	if (isset ($_POST["Sdped"]) )
	{
		$objpermisos->reseleccionarDetpedido($tipo_usu);
	}
	header("Location: index.php?mensaje=Se denegaron los premisos correctamente");
}
?>