-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 29-03-2016 a las 13:18:55
-- Versión del servidor: 5.5.47-0+deb8u1
-- Versión de PHP: 5.6.17-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `dbgerencial`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `ANIO_GRAFICO`()
BEGIN
	select distinct year(Fecha) as anio from venta;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `reporte_grafico_dias`()
SELECT
 v.fecha,dayname(v.Fecha) as mes, sum(v.totalpagar) as total_dia
	from venta v inner join detalleventa dv on v.IdVenta = dv.IdVenta

			where year(v.Fecha) = year(curdate())
		group by v.fecha
		order by day(v.Fecha) desc
			limit 15$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `reporte_grafico_mes`()
SELECT
 monthname(v.Fecha) as mes, sum(v.totalpagar) as total_dia
	from venta v inner join detalleventa dv on v.IdVenta = dv.IdVenta

			where year(v.Fecha) = year(curdate())
		group by monthname(v.Fecha)
		order by month(v.Fecha) desc
			limit 12$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `reporte_grafico_totales`()
SELECT
distinct monthname(v.Fecha) as mes ,
 sum(p.precioventa-p.preciocosto) as total_utilidad, sum(v.totalpagar) as total_venta,
	sum(c.total) as total_compra
	from venta v inner join detalleventa dv on v.IdVenta = dv.IdVenta
	inner join producto p on p.IdProducto = dv.IdProducto
	inner join detallecompra dc on dc.IdProducto = p.IdProducto
	inner join compra c on c.idcompra=dc.IdCompra
	where year(v.Fecha) = year(curdate())
		group by monthname(v.Fecha),p.IdProducto,v.IdVenta,c.idcompra
		order by monthname(v.Fecha) desc
			limit 1$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_I_Categoria`(	
			pdescripcion varchar(100)
		)
BEGIN		
		INSERT INTO categoria(descripcion)
		VALUES(pdescripcion);
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_I_Cliente`(	
			pnombre varchar(100),
			pruc varchar(11),
			pdni varchar(8),
			pdireccion varchar(50),
			ptelefono varchar(15),
			pobsv text,
			pusuario varchar(30),
			pcontrasena varchar(10)
		)
BEGIN		
		INSERT INTO cliente(nombre,ruc,dni,direccion,telefono,obsv,usuario,contrasena)
		VALUES(pnombre,pruc,pdni,pdireccion,ptelefono,pobsv,pusuario,pcontrasena);
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_I_Compra`(	
			pidtipodocumento int,
			pidproveedor int,
			pidempleado int,
			pnumero varchar(20),
			pfecha date,
			psubtotal decimal(8,2),
			piva decimal(8,2),
			ptotal decimal(8,2),
			pestado varchar(30)
		)
BEGIN		
		INSERT INTO compra(idtipodocumento,idproveedor,idempleado,numero,fecha,subtotal,iva,total,estado)
		VALUES(pidtipodocumento,pidproveedor,pidempleado,pnumero,pfecha,psubtotal,piva,ptotal,pestado);
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_I_DetalleCompra`(	
			pidcompra int,
			pidproducto int,
			pcantidad decimal(8,2),
			pprecio decimal(8,2),
			ptotal decimal(8,2)
		)
BEGIN		
		INSERT INTO detallecompra(idcompra,idproducto,cantidad,precio,total)
		VALUES(pidcompra,pidproducto,pcantidad,pprecio,ptotal);
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_I_DetalleVenta`(	
			pidventa int,
			pidproducto int,
			pcantidad decimal(8,2),
			pcosto decimal(8,2),
			pprecio decimal(8,2),
			ptotal decimal(8,2)
		)
BEGIN		
		INSERT INTO detalleventa(idventa,idproducto,cantidad,costo,precio,total)
		VALUES(pidventa,pidproducto,pcantidad,pcosto,pprecio,ptotal);
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_I_Empleado`(	
			pnombre varchar(50),
			papellido varchar(80),
			psexo varchar(1),
			pfechanac date,
			pdireccion varchar(100),
			ptelefono varchar(10),
			pcelular varchar(15),
			pemail varchar(80),
			pdni varchar(8),
			pfechaing date,
			psueldo decimal(8,2),
			pestado varchar(30),
			pusuario varchar(20),
			pcontrasena text,
			pidtipousuario int
		)
BEGIN		
		INSERT INTO empleado(nombre,apellido,sexo,fechanac,direccion,telefono,celular,email,dni,fechaing,sueldo,estado,usuario,contrasena,idtipousuario)
		VALUES(pnombre,papellido,psexo,pfechanac,pdireccion,ptelefono,pcelular,pemail,pdni,pfechaing,psueldo,pestado,pusuario,pcontrasena,pidtipousuario);
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_I_Producto`(	
			pcodigo varchar(50),
			pnombre varchar(100),
			pdescripcion text,
			pstock decimal(8,2),
			pstockmin decimal(8,2),
			ppreciocosto decimal(8,2),
			pprecioventa decimal(8,2),
			putilidad decimal(8,2),
			pestado varchar(30),
			pimagen varchar(100),
			pidcategoria int
		)
BEGIN		
		INSERT INTO producto(codigo,nombre,descripcion,stock,stockmin,preciocosto,precioventa,utilidad,estado,imagen,idcategoria)
		VALUES(pcodigo,pnombre,pdescripcion,pstock,pstockmin,ppreciocosto,pprecioventa,putilidad,pestado,pimagen,pidcategoria);
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_I_Proveedor`(	
			pnombre varchar(100),
			pruc varchar(11),
			pdni varchar(8),
			pdireccion varchar(100),
			ptelefono varchar(10),
			pcelular varchar(15),
			pemail varchar(80),
			pcuenta1 varchar(50),
			pcuenta2 varchar(50),
			pestado varchar(30),
			pobsv text
		)
BEGIN		
		INSERT INTO proveedor(nombre,ruc,dni,direccion,telefono,celular,email,cuenta1,cuenta2,estado,obsv)
		VALUES(pnombre,pruc,pdni,pdireccion,ptelefono,pcelular,pemail,pcuenta1,pcuenta2,pestado,pobsv);
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_I_TipoDocumento`(	
			pdescripcion varchar(80)
		)
BEGIN		
		INSERT INTO tipodocumento(descripcion)
		VALUES(pdescripcion);
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_I_TipoUsuario`(	
			pdescripcion varchar(80),
			pp_venta int,
			pp_compra int,
			pp_producto int,
			pp_proveedor int,
			pp_empleado int,
			pp_cliente int,
			pp_categoria int,
			pp_tipodoc int,
			pp_tipouser int,
			pp_anularv int,
			pp_anularc int,
			pp_estadoprod int,
			pp_ventare int,
			pp_ventade int,
			pp_estadistica int,
			pp_comprare int,
			pp_comprade int,
			pp_pass int,
			pp_respaldar int,
			pp_restaurar int,
			pp_caja int
		)
BEGIN		
		INSERT INTO tipousuario(descripcion,p_venta,p_compra,p_producto,p_proveedor,p_empleado,p_cliente,p_categoria,p_tipodoc,p_tipouser,p_anularv,p_anularc,
		p_estadoprod,p_ventare,p_ventade,p_estadistica,p_comprare,p_comprade,p_pass,p_respaldar,p_restaurar,p_caja)
		VALUES(pdescripcion,pp_venta,pp_compra,pp_producto,pp_proveedor,pp_empleado,pp_cliente,pp_categoria,pp_tipodoc,pp_tipouser,pp_anularv,pp_anularc,
		pp_estadoprod,pp_ventare,pp_ventade,pp_estadistica,pp_comprare,pp_comprade,pp_pass,pp_respaldar,pp_restaurar,pp_caja);
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_I_Venta`(	
			pidtipodocumento int,
			pidcliente int,
			pidempleado int,
			pserie varchar(5),
			pnumero varchar(20),
			pfecha date,
			ptotalventa decimal(8,2),
			piva decimal(8,2),
			ptotalpagar decimal(8,2),
			pestado varchar(30)
		)
BEGIN		
		INSERT INTO venta(idtipodocumento,idcliente,idempleado,serie,numero,fecha,totalventa,iva,totalpagar,estado)
		VALUES(pidtipodocumento,pidcliente,pidempleado,pserie,pnumero,pfecha,ptotalventa,piva,ptotalpagar,pestado);
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_S_CANTIDAD_CATEGORIAS`()
BEGIN
	select count(*) as cantidad_categoria from categoria;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_S_CANTIDAD_COMPRAS`()
BEGIN
	select count(*) as cantidad_compras from compra where Fecha like curdate();
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_S_CANTIDAD_PRODUCTOS`()
BEGIN
	select count(*) as cantidad_producto from producto;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_S_CANTIDAD_PROVEEDORES`()
BEGIN
	select count(*) as cantidad_proveedores from proveedor;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_S_CANTIDAD_VENTAS`()
BEGIN
	select count(*) as cantidad_ventas from venta where Fecha like curdate();
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_S_Categoria`(	
		
		)
BEGIN
		SELECT * FROM categoria ORDER BY descripcion ASC;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_S_CategoriaCantidadTotal`(	
		
		)
BEGIN
		SELECT COUNT(*) as total FROM categoria;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_S_CategoriaIdMaximo`(	
		
		)
BEGIN
		SELECT MAX(IdCategoria) AS Maximo FROM categoria;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_S_CategoriaPorParametro`(	
			pcriterio varchar(20),
			pbusqueda varchar(20),
			plimit varchar(20)
		)
BEGIN
		IF pcriterio = "id" THEN		
			SET @sentencia = CONCAT("SELECT c.IdCategoria,c.Descripcion FROM categoria AS c WHERE c.IdCategoria=",pbusqueda," ORDER BY c.IdCategoria DESC ",plimit);
			PREPARE consulta FROM @sentencia;
			EXECUTE consulta;
		ELSEIF pcriterio = "descripcion" THEN
			SET @sentencia = CONCAT("SELECT c.IdCategoria,c.Descripcion FROM categoria AS c WHERE c.Descripcion LIKE '",CONCAT("%",pbusqueda,"%"),"'"," ORDER BY c.IdCategoria DESC ",plimit);
			PREPARE consulta FROM @sentencia;
			EXECUTE consulta;	
		ELSE	
			SET @sentencia = CONCAT("SELECT c.IdCategoria,c.Descripcion FROM categoria AS c ORDER BY c.IdCategoria DESC ",plimit);
			PREPARE consulta FROM @sentencia;
			EXECUTE consulta;	
		END IF; 
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_S_Cliente`(
	
	)
BEGIN
		SELECT * FROM cliente;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_S_ClienteCantidadTotal`(	
		
		)
BEGIN
		SELECT COUNT(*) as total FROM cliente;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_S_ClienteIdMaximo`(	
		
		)
BEGIN
		SELECT MAX(IdCliente) AS Maximo FROM cliente;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_S_ClientePorParametro`(	
			pcriterio varchar(20),
			pbusqueda varchar(20),
			plimit varchar(20)
		)
BEGIN	
		IF pcriterio = "id" THEN		
			SET @sentencia = CONCAT("SELECT c.IdCliente,c.Nombre,c.Ruc,c.Dni,c.Direccion,c.Telefono,c.Obsv,c.Usuario,c.Contrasena FROM cliente AS c WHERE c.IdCliente=",pbusqueda," ORDER BY c.IdCliente DESC ",plimit);
			PREPARE consulta FROM @sentencia;
			EXECUTE consulta;
		ELSEIF pcriterio = "nombre" THEN
			SET @sentencia = CONCAT("SELECT c.IdCliente,c.Nombre,c.Ruc,c.Dni,c.Direccion,c.Telefono,c.Obsv,c.Usuario,c.Contrasena FROM cliente AS c WHERE c.Nombre LIKE '",CONCAT("%",pbusqueda,"%"),"'"," ORDER BY c.IdCliente DESC ",plimit);
			PREPARE consulta FROM @sentencia;
			EXECUTE consulta;			
		ELSEIF pcriterio = "ruc" THEN
			SET @sentencia = CONCAT("SELECT c.IdCliente,c.Nombre,c.Ruc,c.Dni,c.Direccion,c.Telefono,c.Obsv,c.Usuario,c.Contrasena FROM cliente AS c WHERE c.Ruc LIKE '",CONCAT("%",pbusqueda,"%"),"'"," ORDER BY c.IdCliente DESC ",plimit);
			PREPARE consulta FROM @sentencia;
			EXECUTE consulta;
		ELSEIF pcriterio = "dni" THEN
			SET @sentencia = CONCAT("SELECT c.IdCliente,c.Nombre,c.Ruc,c.Dni,c.Direccion,c.Telefono,c.Obsv,c.Usuario,c.Contrasena FROM cliente AS c WHERE c.Dni LIKE '",CONCAT("%",pbusqueda,"%"),"'"," ORDER BY c.IdCliente DESC ",plimit);
			PREPARE consulta FROM @sentencia;
			EXECUTE consulta;		
		ELSE	
			SET @sentencia = CONCAT("SELECT c.IdCliente,c.Nombre,c.Ruc,c.Dni,c.Direccion,c.Telefono,c.Obsv,c.Usuario,c.Contrasena FROM cliente AS c ORDER BY c.IdCliente DESC ",plimit);
			PREPARE consulta FROM @sentencia;
			EXECUTE consulta;	
		END IF; 
	 
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_S_Compra`(
	
	)
BEGIN
		SELECT c.IdCompra,td.Descripcion AS TipoDocumento,p.Nombre AS Proveedor,CONCAT(e.Nombre," ",e.Apellido) AS Empleado,c.Numero,c.Fecha,c.SubTotal,c.Iva,c.Total,c.Estado
		FROM compra AS c
		INNER JOIN tipodocumento AS td ON c.IdTipoDocumento=td.IdTipoDocumento	 
		INNER JOIN proveedor AS p ON c.IdProveedor=p.IdProveedor		
		INNER JOIN empleado AS e ON c.IdEmpleado=e.IdEmpleado
		ORDER BY c.IdCompra;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_S_CompraPorDetalle`(
			pcriterio varchar(30),
			pfechaini date,
			pfechafin date
	)
BEGIN
		IF pcriterio = "consultar" THEN
			SELECT p.Codigo,p.Nombre AS Producto,ca.Descripcion AS Categoria,dc.Precio,
			SUM(dc.Cantidad) AS Cantidad,SUM(dc.Total) AS Total FROM compra AS c
			INNER JOIN detallecompra AS dc ON c.IdCompra=dc.IdCompra
			INNER JOIN producto AS p ON dc.IdProducto=p.IdProducto
			INNER JOIN categoria AS ca ON p.IdCategoria=ca.IdCategoria
			WHERE (c.Fecha>=pfechaini AND c.Fecha<=pfechafin) AND c.Estado="NORMAL" GROUP BY p.IdProducto
			ORDER BY c.IdCompra DESC;
		END IF;

	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_S_CompraPorFecha`(
			pcriterio varchar(30),
			pfechaini date,
			pfechafin date,
			pdocumento varchar(30)
	)
BEGIN
		IF pcriterio = "anular" THEN
			SELECT c.IdCompra,p.Nombre AS Proveedor,c.Fecha,CONCAT(e.Nombre," ",e.Apellido) AS Empleado,td.Descripcion AS TipoDocumento,c.Numero,
			c.Estado,c.Total FROM compra AS c
			INNER JOIN tipodocumento AS td ON c.IdTipoDocumento=td.IdTipoDocumento
			INNER JOIN proveedor AS p ON c.IdProveedor=p.IdProveedor
			INNER JOIN empleado AS e ON c.IdEmpleado=e.IdEmpleado
			WHERE (c.Fecha>=pfechaini AND c.Fecha<=pfechafin) AND td.Descripcion=pdocumento ORDER BY c.IdCompra DESC;
		ELSEIF pcriterio = "consultar" THEN
		   SELECT c.IdCompra,p.Nombre AS Proveedor,c.Fecha,CONCAT(e.Nombre," ",e.Apellido) AS Empleado,td.Descripcion AS TipoDocumento,c.Numero,
			c.Estado,c.Total FROM compra AS c
			INNER JOIN tipodocumento AS td ON c.IdTipoDocumento=td.IdTipoDocumento
			INNER JOIN proveedor AS p ON c.IdProveedor=p.IdProveedor
			INNER JOIN empleado AS e ON c.IdEmpleado=e.IdEmpleado
			WHERE c.Fecha>=pfechaini AND c.Fecha<=pfechafin ORDER BY c.IdCompra DESC;
		ELSE
		   SELECT c.IdCompra,p.Nombre AS Proveedor,c.Fecha,CONCAT(e.Nombre," ",e.Apellido) AS Empleado,td.Descripcion AS TipoDocumento,c.Numero,
			c.Estado,c.Total FROM compra AS c
			INNER JOIN tipodocumento AS td ON c.IdTipoDocumento=td.IdTipoDocumento
			INNER JOIN proveedor AS p ON c.IdProveedor=p.IdProveedor
			INNER JOIN empleado AS e ON c.IdEmpleado=e.IdEmpleado ORDER BY c.IdCompra DESC LIMIT 10;			
		END IF;

	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_S_CompraPorParametro`(
		   pcriterio varchar(20),
			pbusqueda varchar(20)
	)
BEGIN
			IF pcriterio = "id" THEN
				SELECT c.IdCompra,td.Descripcion AS TipoDocumento,p.Nombre AS Proveedor,CONCAT(e.Nombre," ",e.Apellido) AS Empleado,c.Numero,c.Fecha,c.SubTotal,
				c.Iva,c.Total,c.Estado  FROM compra AS c
				INNER JOIN tipodocumento AS td ON c.IdTipoDocumento=td.IdTipoDocumento
				INNER JOIN proveedor AS p ON c.IdProveedor=p.IdProveedor
				INNER JOIN empleado AS e ON c.IdEmpleado=e.IdEmpleado
				WHERE c.IdCompra=pbusqueda ORDER BY c.IdCompra;
			ELSEIF pcriterio = "documento" THEN
				SELECT c.IdCompra,td.Descripcion AS TipoDocumento,p.Nombre AS Proveedor,CONCAT(e.Nombre," ",e.Apellido) AS Empleado,c.Numero,c.Fecha,c.SubTotal,
				c.Iva,c.Total,c.Estado  FROM compra AS c
				INNER JOIN tipodocumento AS td ON c.IdTipoDocumento=td.IdTipoDocumento
				INNER JOIN proveedor AS p ON c.IdProveedor=p.IdProveedor
				INNER JOIN empleado AS e ON c.IdEmpleado=e.IdEmpleado
				WHERE td.Descripcion=pbusqueda ORDER BY c.IdCompra;
			END IF; 
			

	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_S_COMPRA_TOTAL_DIARIA`()
BEGIN
select sum(dc.Cantidad * dc.Precio) as total_compras from
	compra c inner join detallecompra dc on c.IdCompra = dc.IdCompra where c.Fecha like curdate();
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_S_DetalleCompra`(
	
	)
BEGIN
		SELECT * FROM detallecompra;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_S_DetalleCompraPorParametro`(
		   pcriterio varchar(20),
			pbusqueda varchar(20)
	)
BEGIN
			IF pcriterio = "id" THEN
				SELECT dc.IdCompra,p.IdProducto,p.Codigo,p.Nombre,p.Descripcion,dc.Cantidad,dc.Precio,dc.Total  FROM detallecompra AS dc
				INNER JOIN producto AS p ON dc.IdProducto=p.IdProducto
				WHERE dc.IdCompra=pbusqueda ORDER BY dc.IdCompra;
			
			END IF; 
			
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_S_DetalleVenta`(
	
	)
BEGIN
		SELECT * FROM detalleventa;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_S_DetalleVentaPorParametro`(
		   pcriterio varchar(20),
			pbusqueda varchar(20)
	)
BEGIN
			IF pcriterio = "id" THEN
				SELECT dv.IdVenta,p.IdProducto,p.Codigo,p.Nombre,p.Descripcion,dv.Cantidad,dv.Precio,dv.Total  FROM detalleventa AS dv
				INNER JOIN producto AS p ON dv.IdProducto=p.IdProducto
				WHERE dv.IdVenta=pbusqueda ORDER BY dv.IdVenta;
			
			END IF; 
			
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_S_Empleado`(	
			pcriterio varchar(20),
			pbusqueda varchar(20)
		)
BEGIN
	IF pcriterio = "id" THEN
		SELECT e.IdEmpleado,e.Nombre,e.Apellido,e.Sexo,e.FechaNac,e.Direccion,e.Telefono,e.Celular,e.Email,
		e.Dni,e.FechaIng,e.Sueldo,e.Estado,e.Usuario,e.Contrasena,e.IdTipoUsuario
		FROM empleado AS e WHERE e.IdEmpleado=pbusqueda;
	ELSEIF pcriterio = "nombre" THEN
		SELECT e.IdEmpleado,e.Nombre,e.Apellido,e.Sexo,e.FechaNac,e.Direccion,e.Telefono,e.Celular,e.Email,
		e.Dni,e.FechaIng,e.Sueldo,e.Estado,e.Usuario,e.Contrasena,e.IdTipoUsuario
		FROM empleado AS e WHERE ((e.Nombre LIKE CONCAT("%",pbusqueda,"%")) OR (e.Apellido LIKE CONCAT("%",pbusqueda,"%")));
	ELSEIF pcriterio = "dni" THEN
		SELECT e.IdEmpleado,e.Nombre,e.Apellido,e.Sexo,e.FechaNac,e.Direccion,e.Telefono,e.Celular,e.Email,
		e.Dni,e.FechaIng,e.Sueldo,e.Estado,e.Usuario,e.Contrasena,e.IdTipoUsuario
		FROM empleado AS e WHERE e.Dni LIKE CONCAT("%",pbusqueda,"%");
	ELSE
	   SELECT e.IdEmpleado,e.Nombre,e.Apellido,e.Sexo,e.FechaNac,e.Direccion,e.Telefono,e.Celular,e.Email,
		e.Dni,e.FechaIng,e.Sueldo,e.Estado,e.Usuario,e.Contrasena,e.IdTipoUsuario FROM empleado AS e;
	END IF; 
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_S_EmpleadoCantidadTotal`(	
		
		)
BEGIN
		SELECT COUNT(*) as total FROM empleado;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_S_EmpleadoIdMaximo`(	
		
		)
BEGIN
		SELECT MAX(IdEmpleado) AS Maximo FROM empleado;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_S_EmpleadoPorParametro`(	
			pcriterio varchar(20),
			pbusqueda varchar(20),
			plimit varchar(20)
		)
BEGIN
	
	
	IF pcriterio = "id" THEN					
			SET @sentencia = CONCAT("SELECT e.IdEmpleado,e.Nombre,e.Apellido,e.Sexo,e.FechaNac,e.Direccion,e.Telefono,e.Celular,e.Email,e.Dni,e.FechaIng,e.Sueldo,e.Estado,e.Usuario,e.Contrasena,tu.Descripcion AS TipoUsuario FROM empleado AS e INNER JOIN tipousuario AS tu ON e.IdTipoUsuario = tu.IdTipoUsuario WHERE e.IdEmpleado=",pbusqueda," ORDER BY e.IdEmpleado DESC ",plimit);
			PREPARE consulta FROM @sentencia;
			EXECUTE consulta;
		ELSEIF pcriterio = "nombre" THEN
			SET @sentencia = CONCAT("SELECT e.IdEmpleado,e.Nombre,e.Apellido,e.Sexo,e.FechaNac,e.Direccion,e.Telefono,e.Celular,e.Email,e.Dni,e.FechaIng,e.Sueldo,e.Estado,e.Usuario,e.Contrasena,tu.Descripcion AS TipoUsuario FROM empleado AS e INNER JOIN tipousuario AS tu ON e.IdTipoUsuario = tu.IdTipoUsuario WHERE (e.Nombre LIKE '",CONCAT("%",pbusqueda,"%"),"') OR (e.Apellido LIKE '",CONCAT("%",pbusqueda,"%"),"')"," ORDER BY e.IdEmpleado DESC ",plimit);
			PREPARE consulta FROM @sentencia;
			EXECUTE consulta;			
		ELSEIF pcriterio = "dni" THEN
			SET @sentencia = CONCAT("SELECT e.IdEmpleado,e.Nombre,e.Apellido,e.Sexo,e.FechaNac,e.Direccion,e.Telefono,e.Celular,e.Email,e.Dni,e.FechaIng,e.Sueldo,e.Estado,e.Usuario,e.Contrasena,tu.Descripcion AS TipoUsuario FROM empleado AS e INNER JOIN tipousuario AS tu ON e.IdTipoUsuario = tu.IdTipoUsuario WHERE e.Dni LIKE '",CONCAT("%",pbusqueda,"%"),"'"," ORDER BY e.IdEmpleado DESC ",plimit);
			PREPARE consulta FROM @sentencia;
			EXECUTE consulta;
		ELSE	
			SET @sentencia = CONCAT("SELECT e.IdEmpleado,e.Nombre,e.Apellido,e.Sexo,e.FechaNac,e.Direccion,e.Telefono,e.Celular,e.Email,e.Dni,e.FechaIng,e.Sueldo,e.Estado,e.Usuario,e.Contrasena,tu.Descripcion AS TipoUsuario FROM empleado AS e INNER JOIN tipousuario AS tu ON e.IdTipoUsuario = tu.IdTipoUsuario ORDER BY e.IdEmpleado DESC ",plimit);
			PREPARE consulta FROM @sentencia;
			EXECUTE consulta;	
	END IF; 
	
	
	
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_S_INGRESAR_SISTEMA`(n_usuario varchar(20), n_contrasena text)
BEGIN

select e.*, tu.Descripcion from empleado e inner join tipousuario tu 
	WHERE e.Usuario like n_usuario and e.Contrasena like (n_contrasena);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_S_Login`(	
			pusuario varchar(20),
			pcontrasena text,
			pdescripcion varchar(80)
		)
BEGIN
	
		SELECT e.IdEmpleado,e.Nombre,e.Apellido,e.Sexo,e.FechaNac,e.Direccion,e.Telefono,e.Celular,e.Email,
		e.Dni,e.FechaIng,e.Sueldo,e.Estado,e.Usuario,e.Contrasena,tu.Descripcion
		FROM empleado AS e INNER JOIN tipousuario AS tu ON e.IdTipoUsuario = tu.IdTipoUsuario WHERE e.Usuario = pusuario AND e.`Contraseña` = pcontrasena AND tu.Descripcion=pdescripcion;
		
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_S_LoginPermisos`(	
			pnombre_usuario varchar(20),
			pdescripcion_tipousuario varchar(80)

		)
BEGIN
	
		SELECT tu.IdTipoUsuario,e.Usuario,tu.Descripcion,tu.p_venta,tu.p_compra,tu.p_producto,tu.p_proveedor,tu.p_empleado,tu.p_cliente,tu.p_categoria,tu.p_tipodoc,tu.p_tipouser,
		tu.p_anularv,tu.p_anularc,tu.p_estadoprod,tu.p_ventare,tu.p_ventade,tu.p_estadistica,tu.p_comprare,tu.p_comprade,tu.p_pass,tu.p_respaldar,tu.p_restaurar,tu.p_caja
		FROM tipousuario AS tu INNER JOIN empleado AS e ON tu.IdTipoUsuario = e.IdTipoUsuario WHERE e.Usuario = pnombre_usuario AND tu.Descripcion=pdescripcion_tipousuario;
		
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_S_Producto`(	
			pcriterio varchar(20),
			pbusqueda varchar(50)
		)
BEGIN
	IF pcriterio = "id" THEN
		SELECT p.IdProducto,p.Codigo,p.Nombre,p.Descripcion,p.Stock,p.StockMin,p.PrecioCosto,p.PrecioVenta,p.Utilidad,p.Estado,p.Imagen,p.IdCategoria
		FROM producto AS p WHERE p.IdProducto=pbusqueda;
	ELSEIF pcriterio = "codigo" THEN
		SELECT p.IdProducto,p.Codigo,p.Nombre,p.Descripcion,p.Stock,p.StockMin,p.PrecioCosto,p.PrecioVenta,p.Utilidad,p.Estado,p.Imagen,p.IdCategoria
		FROM producto AS p WHERE p.Codigo=pbusqueda;
	ELSEIF pcriterio = "nombre" THEN
		SELECT p.IdProducto,p.Codigo,p.Nombre,p.Descripcion,p.Stock,p.StockMin,p.PrecioCosto,p.PrecioVenta,p.Utilidad,p.Estado,p.Imagen,p.IdCategoria
		FROM producto AS p WHERE p.Nombre LIKE CONCAT("%",pbusqueda,"%");
	ELSEIF pcriterio = "descripcion" THEN
		SELECT p.IdProducto,p.Codigo,p.Nombre,p.Descripcion,p.Stock,p.StockMin,p.PrecioCosto,p.PrecioVenta,p.Utilidad,p.Estado,p.Imagen,p.IdCategoria
		FROM producto AS p WHERE p.Descripcion LIKE CONCAT("%",pbusqueda,"%");
	ELSE
		SELECT p.IdProducto,p.Codigo,p.Nombre,p.Descripcion,p.Stock,p.StockMin,p.PrecioCosto,p.PrecioVenta,p.Utilidad,p.Estado,p.Imagen,p.IdCategoria
		FROM producto AS p;
	END IF; 
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_S_ProductoActivo`(
	
	)
BEGIN
		SELECT p.IdProducto,p.Codigo,p.Nombre,p.Descripcion,p.Stock,p.StockMin,p.PrecioCosto,p.PrecioVenta,p.Utilidad,p.Estado,p.Imagen,c.Descripcion AS categoria
		FROM producto AS p INNER JOIN categoria AS c ON p.IdCategoria=c.IdCategoria WHERE p.Estado="Activo"
		ORDER BY p.IdProducto;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_S_ProductoActivoPorParametro`(	
			pcriterio varchar(20),
			pbusqueda varchar(50)
		)
BEGIN
	IF pcriterio = "id" THEN
		SELECT p.IdProducto,p.Codigo,p.Nombre,p.Descripcion,p.Stock,p.StockMin,p.PrecioCosto,p.PrecioVenta,p.Utilidad,p.Estado,p.Imagen,c.Descripcion AS Categoria
		FROM producto AS p INNER JOIN categoria AS c ON p.IdCategoria = c.IdCategoria
		WHERE p.IdProducto=pbusqueda AND p.Estado="ACTIVO";
 	ELSEIF pcriterio = "codigo" THEN
		SELECT p.IdProducto,p.Codigo,p.Nombre,p.Descripcion,p.Stock,p.StockMin,p.PrecioCosto,p.PrecioVenta,p.Utilidad,p.Estado,p.Imagen,c.Descripcion AS Categoria
		FROM producto AS p INNER JOIN categoria AS c ON p.IdCategoria = c.IdCategoria
		WHERE p.Codigo=pbusqueda AND p.Estado="Activo";
	ELSEIF pcriterio = "nombre" THEN
		SELECT p.IdProducto,p.Codigo,p.Nombre,p.Descripcion,p.Stock,p.StockMin,p.PrecioCosto,p.PrecioVenta,p.Utilidad,p.Estado,p.Imagen,c.Descripcion AS Categoria
		FROM producto AS p INNER JOIN categoria AS c ON p.IdCategoria = c.IdCategoria
		WHERE p.Nombre LIKE CONCAT("%",pbusqueda,"%") AND p.Estado="Activo";
	ELSEIF pcriterio = "descripcion" THEN
		SELECT p.IdProducto,p.Codigo,p.Nombre,p.Descripcion,p.Stock,p.StockMin,p.PrecioCosto,p.PrecioVenta,p.Utilidad,p.Estado,p.Imagen,c.Descripcion AS Categoria
		FROM producto AS p INNER JOIN categoria AS c ON p.IdCategoria = c.IdCategoria
		WHERE p.Descripcion LIKE CONCAT("%",pbusqueda,"%") AND p.Estado="Activo";
	ELSEIF pcriterio = "categoria" THEN
		SELECT p.IdProducto,p.Codigo,p.Nombre,p.Descripcion,p.Stock,p.StockMin,p.PrecioCosto,p.PrecioVenta,p.Utilidad,p.Estado,p.Imagen,c.Descripcion AS Categoria
		FROM producto AS p INNER JOIN categoria AS c ON p.IdCategoria = c.IdCategoria
		WHERE c.Descripcion LIKE CONCAT("%",pbusqueda,"%") AND p.Estado="Activo";
	ELSE
		SELECT p.IdProducto,p.Codigo,p.Nombre,p.Descripcion,p.Stock,p.StockMin,p.PrecioCosto,p.PrecioVenta,p.Utilidad,p.Estado,p.Imagen,c.Descripcion AS Categoria
		FROM producto AS p INNER JOIN categoria AS c ON p.IdCategoria = c.IdCategoria WHERE p.Estado="Activo";
	END IF; 
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_S_ProductoCantidadTotal`(	
		
		)
BEGIN
		SELECT COUNT(*) as total FROM producto;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_S_ProductoIdMaximo`(	
		
		)
BEGIN
		SELECT MAX(IdProducto) AS Maximo FROM producto;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_S_ProductoPorParametro`(	
			pcriterio varchar(20),
			pbusqueda varchar(50),
			plimit varchar(50)
		)
BEGIN		
		
	IF pcriterio = "id" THEN					
			SET @sentencia = CONCAT("SELECT p.IdProducto,p.Codigo,p.Nombre,p.Descripcion,p.Stock,p.StockMin,p.PrecioCosto,p.PrecioVenta,p.Utilidad,p.Estado,p.Imagen,c.Descripcion AS Categoria FROM producto AS p INNER JOIN categoria AS c ON p.IdCategoria = c.IdCategoria WHERE p.IdProducto=",pbusqueda," ORDER BY p.IdProducto DESC ",plimit);
			PREPARE consulta FROM @sentencia;
			EXECUTE consulta;
		ELSEIF pcriterio = "codigo" THEN
			SET @sentencia = CONCAT("SELECT p.IdProducto,p.Codigo,p.Nombre,p.Descripcion,p.Stock,p.StockMin,p.PrecioCosto,p.PrecioVenta,p.Utilidad,p.Estado,p.Imagen,c.Descripcion AS Categoria FROM producto AS p INNER JOIN categoria AS c ON p.IdCategoria = c.IdCategoria WHERE p.Codigo=",pbusqueda," ORDER BY p.IdProducto DESC ",plimit);
			PREPARE consulta FROM @sentencia;
			EXECUTE consulta;				
		ELSEIF pcriterio = "nombre" THEN
			SET @sentencia = CONCAT("SELECT p.IdProducto,p.Codigo,p.Nombre,p.Descripcion,p.Stock,p.StockMin,p.PrecioCosto,p.PrecioVenta,p.Utilidad,p.Estado,p.Imagen,c.Descripcion AS Categoria FROM producto AS p INNER JOIN categoria AS c ON p.IdCategoria = c.IdCategoria WHERE p.Nombre LIKE '",CONCAT("%",pbusqueda,"%"),"'"," ORDER BY p.IdProducto DESC ",plimit);
			PREPARE consulta FROM @sentencia;
			EXECUTE consulta;			
		ELSEIF pcriterio = "descripcion" THEN
			SET @sentencia = CONCAT("SELECT p.IdProducto,p.Codigo,p.Nombre,p.Descripcion,p.Stock,p.StockMin,p.PrecioCosto,p.PrecioVenta,p.Utilidad,p.Estado,p.Imagen,c.Descripcion AS Categoria FROM producto AS p INNER JOIN categoria AS c ON p.IdCategoria = c.IdCategoria WHERE p.Descripcion LIKE '",CONCAT("%",pbusqueda,"%"),"'"," ORDER BY p.IdProducto DESC ",plimit);
			PREPARE consulta FROM @sentencia;
			EXECUTE consulta;		
		ELSEIF pcriterio = "categoria" THEN
			SET @sentencia = CONCAT("SELECT p.IdProducto,p.Codigo,p.Nombre,p.Descripcion,p.Stock,p.StockMin,p.PrecioCosto,p.PrecioVenta,p.Utilidad,p.Estado,p.Imagen,c.Descripcion AS Categoria FROM producto AS p INNER JOIN categoria AS c ON p.IdCategoria = c.IdCategoria WHERE c.Descripcion LIKE '",CONCAT("%",pbusqueda,"%"),"'"," ORDER BY p.IdProducto DESC ",plimit);
			PREPARE consulta FROM @sentencia;
			EXECUTE consulta;							
		ELSE	
			SET @sentencia = CONCAT("SELECT p.IdProducto,p.Codigo,p.Nombre,p.Descripcion,p.Stock,p.StockMin,p.PrecioCosto,p.PrecioVenta,p.Utilidad,p.Estado,p.Imagen,c.Descripcion AS Categoria FROM producto AS p INNER JOIN categoria AS c ON p.IdCategoria = c.IdCategoria ORDER BY p.IdProducto DESC ",plimit);
			PREPARE consulta FROM @sentencia;
			EXECUTE consulta;	
	END IF; 		
		
		
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_S_ProductoVerificarCodigoBar`(	
			pbusqueda varchar(50)
		)
BEGIN
	
		SELECT p.IdProducto,p.Codigo,p.Nombre,p.Descripcion,p.Stock,p.StockMin,p.PrecioCosto,p.PrecioVenta,p.Utilidad,p.Estado,p.Imagen,c.Descripcion AS Categoria
		FROM producto AS p INNER JOIN categoria AS c ON p.IdCategoria = c.IdCategoria
		WHERE p.Codigo=pbusqueda;

	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_S_Proveedor`(
	
	)
BEGIN
		SELECT * FROM proveedor;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_S_ProveedorCantidadTotal`(	
		
		)
BEGIN
		SELECT COUNT(*) as total FROM proveedor;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_S_ProveedorIdMaximo`(	
		
		)
BEGIN
		SELECT MAX(IdProveedor) AS Maximo FROM proveedor;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_S_ProveedorPorParametro`(	
			pcriterio varchar(20),
			pbusqueda varchar(20),
			plimit varchar(20)
		)
BEGIN
	
	
	IF pcriterio = "id" THEN					
			SET @sentencia = CONCAT("SELECT p.IdProveedor,p.Nombre,p.Ruc,p.Dni,p.Direccion,p.Telefono,p.Celular,p.Email,p.Cuenta1,p.Cuenta2,p.Estado,p.Obsv FROM proveedor AS p WHERE p.IdProveedor=",pbusqueda," ORDER BY p.IdProveedor DESC ",plimit);
			PREPARE consulta FROM @sentencia;
			EXECUTE consulta;
		ELSEIF pcriterio = "nombre" THEN
			SET @sentencia = CONCAT("SELECT p.IdProveedor,p.Nombre,p.Ruc,p.Dni,p.Direccion,p.Telefono,p.Celular,p.Email,p.Cuenta1,p.Cuenta2,p.Estado,p.Obsv FROM proveedor AS p WHERE p.Nombre LIKE '",CONCAT("%",pbusqueda,"%"),"'"," ORDER BY p.IdProveedor DESC ",plimit);
			PREPARE consulta FROM @sentencia;
			EXECUTE consulta;			
		ELSEIF pcriterio = "ruc" THEN
			SET @sentencia = CONCAT("SELECT p.IdProveedor,p.Nombre,p.Ruc,p.Dni,p.Direccion,p.Telefono,p.Celular,p.Email,p.Cuenta1,p.Cuenta2,p.Estado,p.Obsv FROM proveedor AS p WHERE p.Ruc LIKE '",CONCAT("%",pbusqueda,"%"),"'"," ORDER BY p.IdProveedor DESC ",plimit);
			PREPARE consulta FROM @sentencia;
			EXECUTE consulta;
		ELSEIF pcriterio = "dni" THEN
			SET @sentencia = CONCAT("SELECT p.IdProveedor,p.Nombre,p.Ruc,p.Dni,p.Direccion,p.Telefono,p.Celular,p.Email,p.Cuenta1,p.Cuenta2,p.Estado,p.Obsv FROM proveedor AS p WHERE p.Dni LIKE '",CONCAT("%",pbusqueda,"%"),"'"," ORDER BY p.IdProveedor DESC ",plimit);
			PREPARE consulta FROM @sentencia;
			EXECUTE consulta;			
		ELSE	
			SET @sentencia = CONCAT("SELECT p.IdProveedor,p.Nombre,p.Ruc,p.Dni,p.Direccion,p.Telefono,p.Celular,p.Email,p.Cuenta1,p.Cuenta2,p.Estado,p.Obsv FROM proveedor AS p ORDER BY p.IdProveedor DESC ",plimit);
			PREPARE consulta FROM @sentencia;
			EXECUTE consulta;	
	END IF; 
	
	
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_S_TipoDocumento`(	
		
		)
BEGIN
		SELECT * FROM tipodocumento;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_S_TipoDocumentoCantidadTotal`(	
		
		)
BEGIN
		SELECT COUNT(*) as total FROM tipodocumento;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_S_TipoDocumentoIdMaximo`(	
		
		)
BEGIN
		SELECT MAX(IdTipoDocumento) AS Maximo FROM tipodocumento;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_S_TipoDocumentoPorParametro`(	
			pcriterio varchar(20),
			pbusqueda varchar(20),
			plimit varchar(20)
		)
BEGIN
			
	IF pcriterio = "id" THEN		
			SET @sentencia = CONCAT("SELECT td.IdTipoDocumento,td.Descripcion FROM tipodocumento AS td WHERE td.IdTipoDocumento=",pbusqueda," ORDER BY td.IdTipoDocumento DESC ",plimit);
			PREPARE consulta FROM @sentencia;
			EXECUTE consulta;
		ELSEIF pcriterio = "descripcion" THEN
			SET @sentencia = CONCAT("SELECT td.IdTipoDocumento,td.Descripcion FROM tipodocumento AS td WHERE td.Descripcion LIKE '",CONCAT("%",pbusqueda,"%"),"'"," ORDER BY td.IdTipoDocumento DESC ",plimit);
			PREPARE consulta FROM @sentencia;
			EXECUTE consulta;	
		ELSE	
			SET @sentencia = CONCAT("SELECT td.IdTipoDocumento,td.Descripcion FROM tipodocumento AS td ORDER BY td.IdTipoDocumento DESC ",plimit);
			PREPARE consulta FROM @sentencia;
			EXECUTE consulta;	
	END IF; 

	
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_S_TipoUsuario`(	
		
		)
BEGIN
		SELECT * FROM tipousuario;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_S_TipoUsuarioPorParametro`(	
			pcriterio varchar(20),
			pbusqueda varchar(20)		
		)
BEGIN
	IF pcriterio = "id" THEN
		SELECT * FROM tipousuario AS tp WHERE tp.IdTipoUsuario=pbusqueda;
	ELSEIF pcriterio = "descripcion" THEN
		SELECT * FROM tipousuario AS tp WHERE tp.Descripcion LIKE CONCAT("%",pbusqueda,"%");
	ELSE
		SELECT * FROM tipousuario AS tp;
	END IF; 
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_S_UltimoIdCompra`(
	
	)
BEGIN
		SELECT MAX(IdCompra) AS id FROM compra;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_S_UltimoIdVenta`(
	
	)
BEGIN
		SELECT MAX(IdVenta) AS id FROM venta;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_S_Venta`(
	
	)
BEGIN
		SELECT v.IdVenta,td.Descripcion AS TipoDocumento,c.Nombre AS Cliente,CONCAT(e.Nombre," ",e.Apellido) AS Empleado,v.Serie,v.Numero,v.Fecha,v.TotalVenta,
		v.Iva,v.TotalPagar,v.Estado
		FROM venta AS v 
		INNER JOIN tipodocumento AS td ON v.IdTipoDocumento=td.IdTipoDocumento
		INNER JOIN cliente AS c ON v.IdCliente=c.IdCliente
		INNER JOIN empleado AS e ON v.IdEmpleado=e.IdEmpleado
		ORDER BY v.IdVenta;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_S_VentaMensual`(
		   pcriterio varchar(20),
			pfecha_ini varchar(20),
			pfecha_fin varchar(20)
	)
BEGIN
			IF pcriterio = "consultar" THEN
			SELECT CONCAT(UPPER(MONTHNAME(v.Fecha))," ",YEAR(v.Fecha)) AS Fecha,SUM(v.TotalPagar) AS Total,
				ROUND((SUM(v.TotalPagar)*100)/(SELECT SUM(v.TotalPagar) AS TotalVenta FROM venta AS v WHERE ((date_format(v.Fecha,'%Y-%m') >= pfecha_ini) AND (date_format(v.Fecha,'%Y-%m') <= pfecha_fin)) AND v.Estado="EMITIDO")) AS Porcentaje
				FROM venta AS v
				WHERE ((date_format(v.Fecha,'%Y-%m') >= pfecha_ini) AND (date_format(v.Fecha,'%Y-%m') <= pfecha_fin)) AND v.Estado="EMITIDO" GROUP BY v.Fecha;			
								
			END IF; 
			

	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_S_VentaPorDetalle`(
			pcriterio varchar(30),
			pfechaini date,
			pfechafin date
	)
BEGIN
		IF pcriterio = "consultar" THEN
			SELECT p.Codigo,p.Nombre AS Producto,c.Descripcion AS Categoria,dv.Costo,dv.Precio,
			SUM(dv.Cantidad) AS Cantidad,SUM(dv.Total) AS Total,
			SUM(TRUNCATE((Total-(dv.Costo*dv.Cantidad)),2)) AS Ganancia FROM venta AS v
			INNER JOIN detalleventa AS dv ON v.IdVenta=dv.IdVenta
			INNER JOIN producto AS p ON dv.IdProducto=p.IdProducto
			INNER JOIN categoria AS c ON p.IdCategoria=c.IdCategoria
			WHERE (v.Fecha>=pfechaini AND v.Fecha<=pfechafin) AND v.Estado="EMITIDO" GROUP BY p.IdProducto
			ORDER BY v.IdVenta DESC;
		ELSE
			SELECT p.Codigo,p.Nombre AS Producto,c.Descripcion AS Categoria,dv.Costo,dv.Precio,
			SUM(dv.Cantidad) AS Cantidad,SUM(dv.Total) AS Total,
			SUM(TRUNCATE((Total-(dv.Costo*dv.Cantidad)),2)) AS Ganancia FROM venta AS v
			INNER JOIN detalleventa AS dv ON v.IdVenta=dv.IdVenta
			INNER JOIN producto AS p ON dv.IdProducto=p.IdProducto
			INNER JOIN categoria AS c ON p.IdCategoria=c.IdCategoria
			WHERE v.Estado="EMITIDO" GROUP BY p.IdProducto
			ORDER BY v.IdVenta DESC LIMIT 10;
		END IF;

	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_S_VentaPorFecha`(
			pcriterio varchar(30),
			pfechaini date,
			pfechafin date,
			pdocumento varchar(30)
	)
BEGIN
		IF pcriterio = "anular" THEN
			SELECT v.IdVenta,c.Nombre AS Cliente,v.Fecha,CONCAT(e.Nombre," ",e.Apellido) AS Empleado,td.Descripcion AS TipoDocumento,v.Serie,v.Numero,
			v.Estado,v.TotalPagar  FROM venta AS v
			INNER JOIN tipodocumento AS td ON v.IdTipoDocumento=td.IdTipoDocumento
			INNER JOIN cliente AS c ON v.IdCliente=c.IdCliente
			INNER JOIN empleado AS e ON v.IdEmpleado=e.IdEmpleado
			WHERE (v.Fecha>=pfechaini AND v.Fecha<=pfechafin) AND td.Descripcion=pdocumento ORDER BY v.IdVenta DESC;
		
		ELSEIF pcriterio = "consultar" THEN	
			SELECT v.IdVenta,c.Nombre AS Cliente,v.Fecha,CONCAT(e.Nombre," ",e.Apellido) AS Empleado,td.Descripcion AS TipoDocumento,v.Serie,v.Numero,
			v.Estado,v.TotalVenta,v.Iva,v.TotalPagar  FROM venta AS v 
			INNER JOIN tipodocumento AS td ON v.IdTipoDocumento=td.IdTipoDocumento 
			INNER JOIN cliente AS c ON v.IdCliente=c.IdCliente 
			INNER JOIN empleado AS e ON v.IdEmpleado=e.IdEmpleado 
			WHERE (v.Fecha>=pfechaini AND v.Fecha<=pfechafin) ORDER BY v.IdVenta DESC;
	
		ELSEIF pcriterio = "caja" THEN	
		   SELECT SUM(dv.Cantidad) AS Cantidad,p.Nombre AS Producto,dv.Precio,
			SUM(dv.Total) AS Total, SUM(TRUNCATE((Total-(dv.Costo*dv.Cantidad)),2)) AS Ganancia,v.Fecha FROM venta AS v
			INNER JOIN detalleventa AS dv ON v.IdVenta=dv.IdVenta
			INNER JOIN producto AS p ON dv.IdProducto=p.IdProducto
			INNER JOIN categoria AS c ON p.IdCategoria=c.IdCategoria
			WHERE v.Fecha=pfechaini AND v.Estado="EMITIDO" GROUP BY p.IdProducto
			ORDER BY v.IdVenta DESC;
			
		ELSE
			SELECT v.IdVenta,c.Nombre AS Cliente,v.Fecha,CONCAT(e.Nombre," ",e.Apellido) AS Empleado,td.Descripcion AS TipoDocumento,v.Serie,v.Numero,
			v.Estado,v.TotalVenta,v.Iva,v.TotalPagar  FROM venta AS v 
			INNER JOIN tipodocumento AS td ON v.IdTipoDocumento=td.IdTipoDocumento 
			INNER JOIN cliente AS c ON v.IdCliente=c.IdCliente 
			INNER JOIN empleado AS e ON v.IdEmpleado=e.IdEmpleado ORDER BY v.IdVenta DESC LIMIT 10;	
		END IF;

	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_S_VentaPorParametro`(
		   pcriterio varchar(20),
			pbusqueda varchar(20)
	)
BEGIN
			IF pcriterio = "id" THEN
				SELECT v.IdVenta,td.Descripcion AS TipoDocumento,c.Nombre AS Cliente,CONCAT(e.Nombre," ",e.Apellido) AS Empleado,v.Serie,v.Numero,v.Fecha,v.TotalVenta,
				v.Iva,v.TotalPagar,v.Estado  FROM venta AS v
				INNER JOIN tipodocumento AS td ON v.IdTipoDocumento=td.IdTipoDocumento
				INNER JOIN cliente AS c ON v.IdCliente=c.IdCliente
				INNER JOIN empleado AS e ON v.IdEmpleado=e.IdEmpleado
				WHERE v.IdVenta=pbusqueda ORDER BY v.IdVenta;
			ELSEIF pcriterio = "documento" THEN
				SELECT v.IdVenta,td.Descripcion AS TipoDocumento,c.Nombre AS Cliente,CONCAT(e.Nombre," ",e.Apellido) AS Empleado,v.Serie,v.Numero,v.Fecha,v.TotalVenta,
				v.Iva,v.TotalPagar,v.Estado  FROM venta AS v
				INNER JOIN tipodocumento AS td ON v.IdTipoDocumento=td.IdTipoDocumento
				INNER JOIN cliente AS c ON v.IdCliente=c.IdCliente
				INNER JOIN empleado AS e ON v.IdEmpleado=e.IdEmpleado
				WHERE td.Descripcion=pbusqueda ORDER BY v.IdVenta;
			END IF; 
			

	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_S_Venta_DetallePorParametro`(
		   pcriterio varchar(20),
			pbusqueda varchar(20)
	)
BEGIN
			IF pcriterio = "id" THEN
				SELECT v.IdVenta,td.Descripcion AS TipoDocumento,c.Nombre AS Cliente,CONCAT(e.Nombre," ",e.Apellido) AS Empleado,v.Serie,v.Numero,v.Fecha,v.TotalVenta,
				v.Iva,v.TotalPagar,v.Estado,p.Codigo,p.Nombre,dv.Cantidad,p.PrecioVenta,dv.Total  FROM venta AS v
				INNER JOIN tipodocumento AS td ON v.IdTipoDocumento=td.IdTipoDocumento
				INNER JOIN cliente AS c ON v.IdCliente=c.IdCliente
				INNER JOIN empleado AS e ON v.IdEmpleado=e.IdEmpleado
				INNER JOIN detalleventa AS dv ON v.IdVenta=dv.IdVenta
				INNER JOIN producto AS p ON dv.IdProducto=p.IdProducto
				WHERE v.IdVenta=pbusqueda ORDER BY v.IdVenta;
			
			END IF; 
			

	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_S_VENTA_TOTAL_DIARIA`()
BEGIN
	select sum(dv.Cantidad * dv.Precio) as total_ventas from
	venta v inner join detalleventa dv on v.IdVenta = dv.IdVenta where v.Fecha like curdate();
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_U_ActualizarCompraEstado`(	
		   pidcompra int,
			pestado varchar(30)
		)
BEGIN
		UPDATE compra SET
			estado=pestado
		WHERE idcompra = pidcompra;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_U_ActualizarProductoStock`(	
		   pidproducto int,
			pstock decimal(8,2)
		)
BEGIN
		UPDATE producto SET
			stock=pstock
		WHERE idproducto = pidproducto;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_U_ActualizarVentaEstado`(	
		   pidventa int,
			pestado varchar(30)
		)
BEGIN
		UPDATE venta SET
			estado=pestado
		WHERE idventa = pidventa;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_U_CambiarPass`(	
		   pidempleado int,
			pcontrasena text
		)
BEGIN
		UPDATE empleado SET
			contrasena=pcontrasena
		WHERE idempleado = pidempleado;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_U_Categoria`(	
		   pidcategoria int,
			pdescripcion varchar(100)
		)
BEGIN
		UPDATE categoria SET
			descripcion=pdescripcion	
		WHERE idcategoria = pidcategoria;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_U_Cliente`(	
		   pidcliente int,
		   pnombre varchar(100),
		   pruc varchar(11),
		   pdni varchar(8),
		   pdireccion varchar(50),
		   ptelefono varchar(15),
		   pobsv text,
  			pusuario varchar(30),
			pcontrasena varchar(10)
		)
BEGIN
		UPDATE cliente SET
			nombre=pnombre,
			ruc=pruc,
			dni=pdni,
			direccion=pdireccion,
			telefono=ptelefono,
			obsv=pobsv,
			usuario=pusuario,
			contrasena=pcontrasena
		WHERE idcliente = pidcliente;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_U_Compra`(	
		   pidcompra int,
			pidtipodocumento int,
			pidproveedor int,
			pidempleado int,
			pnumero varchar(20),
			pfecha date,
			psubtotal decimal(8,2),
			piva decimal(8,2),
			ptotal decimal(8,2),
			pestado varchar(30)
		)
BEGIN
		UPDATE compra SET
			idtipodocumento=pidtipodocumento,
			idproveedor=pidproveedor,
			idempleado=pidempleado,
			numero=pnumero,
			fecha=pfecha,
			subtotal=psubtotal,
			iva=piva,
			total=ptotal,
			estado=pestado
		WHERE idcompra = pidcompra;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_U_DetalleCompra`(	
			pidcompra int,
			pidproducto int,
			pcantidad decimal(8,2),
			pprecio decimal(8,2),
			ptotal decimal(8,2)
		)
BEGIN
		UPDATE venta SET
			idcompra=pidcompra,
			idproducto=pidproducto,
			cantidad=pcantidad,
			precio=pprecio,
			total=ptotal
		WHERE idcompra = pidcompra;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_U_DetalleVenta`(	
			pidventa int,
			pidproducto int,
			pcantidad decimal(8,2),
			pcosto decimal(8,2),
			pprecio decimal(8,2),
			ptotal decimal(8,2)
		)
BEGIN
		UPDATE venta SET
			idventa=pidventa,
			idproducto=pidproducto,
			cantidad=pcantidad,
			costo=pcosto,
			precio=pprecio,
			total=ptotal
		WHERE idventa = pidventa;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_U_Empleado`(	
		   pidempleado int,
		   pnombre varchar(50),
		   papellido varchar(80),
		   psexo varchar(1),
		   pfechanac date,
		   pdireccion varchar(100),
		   ptelefono varchar(10),
		   pcelular varchar(15),
		   pemail varchar(80),
		   pdni varchar(8),
			pfechaing date,
			psueldo decimal(8,2),
		   pestado varchar(30),
		   pusuario varchar(20),
		   pcontrasena text,
		   pidtipousuario int
		)
BEGIN
		UPDATE empleado SET
			nombre=pnombre,
			apellido=papellido,
			sexo=psexo,
			fechanac=pfechanac,
			direccion=pdireccion,
			telefono=ptelefono,
			celular=pcelular,
			email=pemail,
			dni=pdni,
			fechaing=pfechaing,
			sueldo=psueldo,
			estado=pestado,
			usuario=pusuario,
			contrasena=pcontrasena,
			idtipousuario=pidtipousuario			
		WHERE idempleado = pidempleado;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_U_Producto`(	
		   pidproducto int,
			pcodigo varchar(50),
			pnombre varchar(100),
			pdescripcion text,
			pstock decimal(8,2),
			pstockmin decimal(8,2),
			ppreciocosto decimal(8,2),
			pprecioventa decimal(8,2),
			putilidad decimal(8,2),
			pestado varchar(30),
			pimagen varchar(100),
			pidcategoria int
		)
BEGIN
		UPDATE producto SET
			codigo=pcodigo,
			nombre=pnombre,
			descripcion=pdescripcion,
			stock=pstock,
			stockmin=pstockmin,
			preciocosto=ppreciocosto,
			precioventa=pprecioventa,
			utilidad=putilidad,
			estado=pestado,
			imagen=pimagen,
			idcategoria=pidcategoria
			
		WHERE idproducto = pidproducto;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_U_Proveedor`(	
		   pidproveedor int,
		   pnombre varchar(100),
			pruc varchar(11),
			pdni varchar(8),
			pdireccion varchar(100),
			ptelefono varchar(10),
			pcelular varchar(15),
			pemail varchar(80),
			pcuenta1 varchar(50),
			pcuenta2 varchar(50),
			pestado varchar(30),
			pobsv text
		)
BEGIN
		UPDATE proveedor SET
			nombre=pnombre,
			ruc=pruc,
			dni=pdni,
			direccion=pdireccion,
			telefono=ptelefono,
			celular=pcelular,
			email=pemail,
			cuenta1=pcuenta1,
			cuenta2=pcuenta2,
			estado=pestado,
			obsv=pobsv
		WHERE idproveedor = pidproveedor;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_U_TipoDocumento`(	
		   pidtipodocumento int,
			pdescripcion varchar(80)
		)
BEGIN
		UPDATE tipodocumento SET
			descripcion=pdescripcion	
		WHERE idtipodocumento = pidtipodocumento;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_U_TipoUsuario`(	
		   pidtipousuario int,
			pdescripcion varchar(80),
			pp_venta int,
			pp_compra int,
			pp_producto int,
			pp_proveedor int,
			pp_empleado int,
			pp_cliente int,
			pp_categoria int,
			pp_tipodoc int,
			pp_tipouser int,
			pp_anularv int,
			pp_anularc int,
		   pp_estadoprod int,
			pp_ventare int,
			pp_ventade int,
			pp_estadistica int,
			pp_comprare int,
			pp_comprade int,
			pp_pass int,
			pp_respaldar int,
			pp_restaurar int,
			pp_caja int
		)
BEGIN
		UPDATE tipousuario SET
			descripcion=pdescripcion,
			p_venta=pp_venta,
			p_compra=pp_compra,
			p_producto=pp_producto,
			p_proveedor=pp_proveedor,
			p_empleado=pp_empleado,
			p_cliente=pp_cliente,
			p_categoria=pp_categoria,
			p_tipodoc=pp_tipodoc,
			p_tipouser=pp_tipouser,
			p_anularv=pp_anularv,
			p_anularc=pp_anularc,
			p_estadoprod=pp_estadoprod,
			p_ventare=pp_ventare,
			p_ventade=pp_ventade,
			p_estadistica=pp_estadistica,
			p_comprare=pp_comprare,
			p_comprade=pp_comprade,
			p_pass=pp_pass,
			p_respaldar=pp_respaldar,
			p_restaurar=pp_restaurar,
			p_caja=pp_caja
		WHERE idtipousuario = pidtipousuario;
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_U_Venta`(	
		   pidventa int,
			pidtipodocumento int,
			pidcliente int,
			pidempleado int,
			pserie varchar(5),
			pnumero varchar(20),
			pfecha date,
			ptotalventa decimal(8,2),
			piva decimal(8,2),
			ptotalpagar decimal(8,2),
			pestado varchar(30)
		)
BEGIN
		UPDATE venta SET
			idtipodocumento=pidtipodocumento,
			idcliente=pidcliente,
			idempleado=pidempleado,
			serie=pserie,
			numero=pnumero,
			fecha=pfecha,
			totalventa=ptotalventa,
			iva=piva,
			totalpagar=ptotalpagar,
			estado=pestado
		WHERE idventa = pidventa;
	END$$

--
-- Funciones
--
CREATE DEFINER=`root`@`localhost` FUNCTION `DiaEnLetras`(pfecha DATE
) RETURNS varchar(10) CHARSET latin1
BEGIN
DECLARE Dia varchar(10);
SELECT 
CONCAT(ELT(WEEKDAY( PFECHA ) + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo')) 
into Dia;
RETURN Dia;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
`IdCategoria` int(11) NOT NULL,
  `Descripcion` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`IdCategoria`, `Descripcion`) VALUES
(1, 'TecnologÃ­a'),
(2, 'FÃ¡rmacos'),
(3, 'Bebidas'),
(4, 'Cereales'),
(5, 'Software');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
`IdCliente` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Ruc` varchar(11) DEFAULT NULL,
  `Dni` varchar(8) DEFAULT NULL,
  `Direccion` varchar(50) DEFAULT NULL,
  `Telefono` varchar(15) DEFAULT NULL,
  `Obsv` text,
  `Usuario` varchar(30) DEFAULT NULL,
  `Contrasena` varchar(10) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`IdCliente`, `Nombre`, `Ruc`, `Dni`, `Direccion`, `Telefono`, `Obsv`, `Usuario`, `Contrasena`) VALUES
(1, 'PUBLICO GENERAL', '20477157771', '47715777', 'Chiclayo', '455630', 'aaa', 'cliente', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE IF NOT EXISTS `compra` (
`IdCompra` int(11) NOT NULL,
  `IdTipoDocumento` int(11) NOT NULL,
  `IdProveedor` int(11) NOT NULL,
  `IdEmpleado` int(11) NOT NULL,
  `Numero` varchar(20) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `SubTotal` decimal(8,2) DEFAULT NULL,
  `Iva` decimal(8,2) DEFAULT NULL,
  `Total` decimal(8,2) DEFAULT NULL,
  `Estado` varchar(30) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`IdCompra`, `IdTipoDocumento`, `IdProveedor`, `IdEmpleado`, `Numero`, `Fecha`, `SubTotal`, `Iva`, `Total`, `Estado`) VALUES
(1, 1, 1, 1, 'C0000000001', '2016-03-15', 273.37, 49.21, 322.58, 'EMITIDO'),
(2, 1, 1, 1, 'C0000000002', '2016-03-18', 21.19, 3.81, 25.00, 'EMITIDO'),
(3, 1, 1, 1, 'C0000000003', '2016-03-20', 1366.86, 246.03, 1612.90, 'EMITIDO'),
(4, 2, 1, 1, 'C0000000004', '2016-03-23', 379.31, 68.28, 447.58, 'EMITIDO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallecompra`
--

CREATE TABLE IF NOT EXISTS `detallecompra` (
  `IdCompra` int(11) NOT NULL,
  `IdProducto` int(11) NOT NULL,
  `Cantidad` decimal(8,2) NOT NULL,
  `Precio` decimal(8,2) NOT NULL,
  `Total` decimal(8,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detallecompra`
--

INSERT INTO `detallecompra` (`IdCompra`, `IdProducto`, `Cantidad`, `Precio`, `Total`) VALUES
(1, 3, 1.00, 322.58, 322.58),
(2, 2, 1.00, 25.00, 25.00),
(3, 3, 5.00, 322.58, 1612.90),
(4, 3, 1.00, 322.58, 322.58),
(4, 2, 5.00, 25.00, 125.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepedido`
--

CREATE TABLE IF NOT EXISTS `detallepedido` (
  `IdPedido` int(11) NOT NULL,
  `IdProducto` int(11) NOT NULL,
  `Cantidad` decimal(8,2) DEFAULT NULL,
  `Precio` decimal(8,2) DEFAULT NULL,
  `Total` decimal(8,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventa`
--

CREATE TABLE IF NOT EXISTS `detalleventa` (
  `IdVenta` int(11) NOT NULL,
  `IdProducto` int(11) NOT NULL,
  `Cantidad` decimal(8,2) NOT NULL,
  `Costo` decimal(8,2) NOT NULL,
  `Precio` decimal(8,2) NOT NULL,
  `Total` decimal(8,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalleventa`
--

INSERT INTO `detalleventa` (`IdVenta`, `IdProducto`, `Cantidad`, `Costo`, `Precio`, `Total`) VALUES
(1, 3, 3.00, 322.58, 482.24, 1446.72),
(1, 2, 5.00, 25.00, 45.00, 225.00),
(2, 4, 1.00, 40.00, 40.00, 40.00),
(3, 2, 1.00, 25.00, 45.00, 45.00),
(4, 2, 1.00, 25.00, 45.00, 45.00),
(5, 3, 3.00, 322.58, 482.24, 1446.72),
(5, 2, 1.00, 25.00, 45.00, 45.00),
(6, 2, 1.00, 25.00, 45.00, 45.00),
(7, 4, 3.00, 40.00, 40.00, 120.00),
(7, 5, 1.00, 2.00, 2.00, 2.00),
(8, 2, 2.00, 25.00, 45.00, 90.00),
(9, 2, 2.00, 25.00, 50.00, 100.00),
(9, 3, 3.00, 328.58, 482.24, 1446.72),
(10, 2, 3.00, 25.00, 45.00, 135.00),
(11, 2, 2.00, 25.00, 45.00, 90.00),
(12, 2, 2.00, 25.00, 45.00, 90.00),
(13, 2, 4.00, 25.00, 45.00, 180.00),
(14, 5, 1.00, 2.00, 2.00, 2.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE IF NOT EXISTS `empleado` (
`IdEmpleado` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(80) NOT NULL,
  `Sexo` varchar(1) NOT NULL,
  `FechaNac` date NOT NULL,
  `Direccion` varchar(100) DEFAULT NULL,
  `Telefono` varchar(10) DEFAULT NULL,
  `Celular` varchar(15) DEFAULT NULL,
  `Email` varchar(80) DEFAULT NULL,
  `Dni` varchar(10) DEFAULT NULL,
  `FechaIng` date NOT NULL,
  `Sueldo` decimal(8,2) DEFAULT NULL,
  `Estado` varchar(30) NOT NULL,
  `Usuario` varchar(20) DEFAULT NULL,
  `Contrasena` text,
  `IdTipoUsuario` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`IdEmpleado`, `Nombre`, `Apellido`, `Sexo`, `FechaNac`, `Direccion`, `Telefono`, `Celular`, `Email`, `Dni`, `FechaIng`, `Sueldo`, `Estado`, `Usuario`, `Contrasena`, `IdTipoUsuario`) VALUES
(1, 'Marco', 'Argueta', 'M', '1994-05-31', 'San Miguel', '', '7496-2720', 'markoargueta@hotmail.com', '05021736-4', '2013-06-15', 2500.00, 'ACTIVO', 'admin', 'admin', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
`IdPedido` int(11) NOT NULL,
  `IdCliente` int(11) NOT NULL,
  `Fecha_solicitud` datetime DEFAULT NULL,
  `Fecha_entrega` datetime DEFAULT NULL,
  `Total` decimal(8,2) DEFAULT NULL,
  `Estado` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
`IdProducto` int(11) NOT NULL,
  `Codigo` varchar(50) DEFAULT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Descripcion` text,
  `Stock` decimal(8,2) DEFAULT NULL,
  `StockMin` decimal(8,2) DEFAULT NULL,
  `PrecioCosto` decimal(8,2) DEFAULT NULL,
  `PrecioVenta` decimal(8,2) DEFAULT NULL,
  `Utilidad` decimal(8,2) DEFAULT NULL,
  `Estado` varchar(30) NOT NULL,
  `Imagen` varchar(100) DEFAULT NULL,
  `IdCategoria` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`IdProducto`, `Codigo`, `Nombre`, `Descripcion`, `Stock`, `StockMin`, `PrecioCosto`, `PrecioVenta`, `Utilidad`, `Estado`, `Imagen`, `IdCategoria`) VALUES
(1, '11', 'Monitor', 'monitor LCD pantalla de retina liquida', 10.00, 2.00, 80.00, 100.00, 20.00, 'ACTIVO', '', 1),
(2, '22', 'Teclado Multifuncional', 'Teclado ergonomico', -4.00, 3.00, 25.00, 45.00, 20.00, 'ACTIVO', '', 1),
(3, '33', 'CPU', 'Unidad Central de Procesamiento', 11.00, 5.00, 322.58, 482.24, 159.66, 'ACTIVO', '', 1),
(4, '123567', 'Mouse Inalambrico', 'Inalambrico', 46.00, 50.00, 40.00, 40.00, 0.00, 'ACTIVO', 'mouse.jpg', 1),
(5, '823824723', 'amoxicilina', '', 118.00, 120.00, 2.00, 2.00, 0.00, 'ACTIVO', '', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE IF NOT EXISTS `proveedor` (
`IdProveedor` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Ruc` varchar(11) DEFAULT NULL,
  `Dni` varchar(8) DEFAULT NULL,
  `Direccion` varchar(100) DEFAULT NULL,
  `Telefono` varchar(10) DEFAULT NULL,
  `Celular` varchar(15) DEFAULT NULL,
  `Email` varchar(80) DEFAULT NULL,
  `Cuenta1` varchar(50) DEFAULT NULL,
  `Cuenta2` varchar(50) DEFAULT NULL,
  `Estado` varchar(30) NOT NULL,
  `Obsv` text
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`IdProveedor`, `Nombre`, `Ruc`, `Dni`, `Direccion`, `Telefono`, `Celular`, `Email`, `Cuenta1`, `Cuenta2`, `Estado`, `Obsv`) VALUES
(1, 'SIN PROVEEDOR', '', '', '', '', '', '', '', '', 'ACTIVO', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodocumento`
--

CREATE TABLE IF NOT EXISTS `tipodocumento` (
`IdTipoDocumento` int(11) NOT NULL,
  `Descripcion` varchar(80) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipodocumento`
--

INSERT INTO `tipodocumento` (`IdTipoDocumento`, `Descripcion`) VALUES
(1, 'BOLETA'),
(2, 'FACTURA'),
(3, 'TICKET');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE IF NOT EXISTS `tipousuario` (
`IdTipoUsuario` int(11) NOT NULL,
  `Descripcion` varchar(20) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`IdTipoUsuario`, `Descripcion`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'CAJERO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE IF NOT EXISTS `venta` (
`IdVenta` int(11) NOT NULL,
  `IdTipoDocumento` int(11) NOT NULL,
  `IdCliente` int(11) NOT NULL,
  `IdEmpleado` int(11) NOT NULL,
  `Serie` varchar(5) DEFAULT NULL,
  `Numero` varchar(20) DEFAULT NULL,
  `Fecha` date NOT NULL,
  `TotalVenta` decimal(8,2) NOT NULL,
  `Iva` decimal(8,2) NOT NULL,
  `TotalPagar` decimal(8,2) NOT NULL,
  `Estado` varchar(30) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`IdVenta`, `IdTipoDocumento`, `IdCliente`, `IdEmpleado`, `Serie`, `Numero`, `Fecha`, `TotalVenta`, `Iva`, `TotalPagar`, `Estado`) VALUES
(1, 1, 1, 1, '001', 'C0000000001', '2016-03-02', 1416.71, 255.01, 1671.72, 'EMITIDO'),
(2, 1, 1, 1, '001', 'C0000000002', '2016-03-02', 33.90, 6.10, 40.00, 'EMITIDO'),
(3, 1, 1, 1, '001', 'C0000000003', '2016-03-05', 38.14, 6.87, 45.00, 'EMITIDO'),
(4, 1, 1, 1, '001', 'C0000000004', '2016-03-06', 38.14, 6.87, 45.00, 'EMITIDO'),
(5, 1, 1, 1, '001', 'C0000000005', '2016-03-07', 1264.17, 227.55, 1491.72, 'EMITIDO'),
(6, 1, 1, 1, '001', 'C0000000006', '2016-03-10', 38.14, 6.87, 45.00, 'EMITIDO'),
(7, 1, 1, 1, '001', 'C0000000007', '2016-03-13', 103.39, 18.61, 122.00, 'EMITIDO'),
(8, 1, 1, 1, '001', 'C0000000008', '2016-03-14', 76.27, 13.73, 90.00, 'EMITIDO'),
(9, 1, 1, 1, 'C0000', 'C0000000008', '2016-03-15', 68.50, 18.50, 70.00, 'EMITIDO'),
(10, 2, 1, 1, '001', 'C0000000010', '2016-03-15', 114.41, 20.59, 135.00, 'EMITIDO'),
(11, 1, 1, 1, '001', 'C0000000011', '2016-03-20', 76.27, 13.73, 90.00, 'EMITIDO'),
(12, 1, 1, 1, '001', 'C0000000012', '2016-03-23', 76.27, 13.73, 90.00, 'EMITIDO'),
(13, 1, 1, 1, '001', 'C0000000013', '2016-03-23', 152.54, 27.46, 180.00, 'EMITIDO'),
(14, 1, 1, 1, '001', 'C0000000014', '2016-03-26', 1.69, 0.30, 2.00, 'EMITIDO');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
 ADD PRIMARY KEY (`IdCategoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
 ADD PRIMARY KEY (`IdCliente`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
 ADD PRIMARY KEY (`IdCompra`), ADD KEY `fk_Compra_Proveedor1_idx` (`IdProveedor`), ADD KEY `fk_Compra_Empleado1_idx` (`IdEmpleado`), ADD KEY `fk_Compra_TipoDocumento1_idx` (`IdTipoDocumento`);

--
-- Indices de la tabla `detallecompra`
--
ALTER TABLE `detallecompra`
 ADD KEY `fk_DetalleCompra_Compra1_idx` (`IdCompra`), ADD KEY `fk_DetalleCompra_Producto1_idx` (`IdProducto`);

--
-- Indices de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
 ADD KEY `fk_DetallePedido_Pedido1` (`IdPedido`), ADD KEY `fk_DetallePedido_Producto1` (`IdProducto`);

--
-- Indices de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
 ADD KEY `fk_DetalleVenta_Producto1_idx` (`IdProducto`), ADD KEY `fk_DetalleVenta_Venta1_idx` (`IdVenta`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
 ADD PRIMARY KEY (`IdEmpleado`), ADD KEY `fk_Empleado_TipoUsuario1_idx` (`IdTipoUsuario`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
 ADD PRIMARY KEY (`IdPedido`), ADD KEY `fk_Pedido_Cliente1` (`IdCliente`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
 ADD PRIMARY KEY (`IdProducto`), ADD KEY `fk_Producto_Categoria_idx` (`IdCategoria`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
 ADD PRIMARY KEY (`IdProveedor`);

--
-- Indices de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
 ADD PRIMARY KEY (`IdTipoDocumento`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
 ADD PRIMARY KEY (`IdTipoUsuario`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
 ADD PRIMARY KEY (`IdVenta`), ADD KEY `fk_Venta_TipoDocumento1_idx` (`IdTipoDocumento`), ADD KEY `fk_Venta_Cliente1_idx` (`IdCliente`), ADD KEY `fk_Venta_Empleado1_idx` (`IdEmpleado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
MODIFY `IdCategoria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
MODIFY `IdCliente` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
MODIFY `IdCompra` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
MODIFY `IdEmpleado` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
MODIFY `IdPedido` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
MODIFY `IdProducto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
MODIFY `IdProveedor` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
MODIFY `IdTipoDocumento` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
MODIFY `IdTipoUsuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
MODIFY `IdVenta` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
