
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Código Fuente Sistema de Ventas en Php y Mysql">
    <meta name="author" content="">

    <title>Logístico</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <!-- <link href="css/plugins/morris.css" rel="stylesheet"> -->

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<?php
    session_start();
    if(isset($_SESSION["usuario"])){
?>
    <div id="wrapper">

        <!-- Navegación-->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Marca y navegación quedan agrupados para una mejor visualización en dispositivos móviles -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Navegación</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Gerencial 1.0</a>
            </div>
            <!-- Items de menú superior -->
            <ul class="nav navbar-right top-nav">
                
                <!--li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="img/ventas.png" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>Ir a Ventas</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Ventas de Artículos</p>
                                        <p>Realice una venta Mostrador...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="img/compras.png" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>Ir a Compras</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Ingresos Almacén</p>
                                        <p>Realice un ingreso de Artículos Almacén...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="img/caja.png" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>reportes</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Consultar ventas diarias</p>
                                        <p>Consulta y reporte de Ventas Diarias...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Revise las Opciones del menú lateral</a>
                        </li>
                    </ul>
                </li-->


                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Ventas <span class="label label-default">
                                <?php
                                            include_once "clases/clsVenta.php";

                                            $objVenta = new clsVenta();

                                            $result=$objVenta->CantidadVentas();

                                            while($row=mysql_fetch_array($result)){
                                                echo $row['cantidad_ventas'];
                                            }

                                        ?>

                            </span></a>
                        </li>
                        <li>
                            <a href="#">Compras <span class="label label-primary">

                                <?php

                                            include_once "clases/clsVenta.php";

                                            $objVenta = new clsVenta();

                                            $result=$objVenta->CantidadCompras();

                                            while($row=mysql_fetch_array($result)){
                                                echo $row['cantidad_compras'];
                                            }

                                 ?>

                            </span></a>
                        </li>
                        <li>
                            <a href="#">Productos <span class="label label-success">

                                <?php

                                            include_once "clases/clsProducto.php";

                                            $objProducto = new clsProducto();

                                            $result=$objProducto->CantidadProductos();

                                            while($row=mysql_fetch_array($result)){
                                                echo $row['cantidad_producto'];
                                            }

                                 ?>

                            </span></a>
                        </li>
                        <li>
                            <a href="#">Categorías <span class="label label-info">

                                <?php

                                            include_once "clases/clsCategoria.php";

                                            $objCategoria = new clsCategoria();

                                            $result=$objCategoria->CantidadCategoria();

                                            while($row=mysql_fetch_array($result)){
                                                echo $row['cantidad_categoria'];
                                            }

                                 ?>

                            </span></a>
                        </li>
                        <li>
                            <a href="#">Proveedores <span class="label label-warning">
                                <?php

                                            include_once "clases/clsProveedor.php";

                                            $objProveedor = new clsProveedor();

                                            $result=$objProveedor->consultarTotalProveedores();

                                            while($row=mysql_fetch_array($result)){
                                                echo $row['total'];
                                            }

                                 ?>
                            </span></a>
                        </li>
                        <li>
                            <a href="#">Clientes <span class="label label-danger">

                                <?php

                                            include_once "clases/clsCliente.php";

                                            $objCliente = new clsCliente();

                                            $result=$objCliente->consultarTotalClientes();

                                            while($row=mysql_fetch_array($result)){
                                                echo $row['total'];
                                            }

                                 ?>

                            </span></a>
                        </li>


                        <!--li class="divider"></li>
                        <li>
                            <a href="#">Ver más estadísticas</a>
                        </li-->


                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION["usuario"]?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="empleado/ver_perfil.php" target="contenedor"><i class="fa fa-fw fa-user"></i> Perfil</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="CerrarSesion.php"><i class="fa fa-fw fa-power-off"></i> Cerrar Sesión</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Menú lateral artículos - Estos colapso al menú de navegación sensible en pantallas pequeñas -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="central.php" target="contenedor"><i class="fa fa-fw fa-dashboard"></i> Escritorio</a>
                    </li>
                    
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#almacen"><i class="fa fa-fw fa-edit"></i> Almacén <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="almacen" class="collapse">
                            <li>
                                <a href="producto/index.php" target="contenedor"><i class="fa fa-fw fa-table"></i>Productos</a>
                            </li>
                            <li>
                                <a href="categoria/index.php" target="contenedor"><i class="fa fa-fw fa-table"></i>Categorías</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#compras"><i class="fa fa-fw fa-desktop"></i> Compras <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="compras" class="collapse">
                            <li>
                                <a href="compra/index.php" target="contenedor"><i class="fa fa-fw fa-table"></i>Compra</a>
                            </li>
                            <li>
                                <a href="proveedor/index.php" target="contenedor"><i class="fa fa-fw fa-table"></i>Proveedor</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#ventas"><i class="fa fa-fw fa-file"></i> Ventas <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="ventas" class="collapse">
                            <li>
                                <a href="venta/index.php" target="contenedor"><i class="fa fa-fw fa-table"></i>Venta</a>
                            </li>
                            <li>
                                <a href="cliente/index.php" target="contenedor"><i class="fa fa-fw fa-table"></i>Cliente</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#consultasv"><i class="fa fa-fw fa-bar-chart-o"></i> Consultas Ventas<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="consultasv" class="collapse">
                            <li>
                                <a href="reportes/reporte_ventas/1_rpt_ventaporfecha.php" target="contenedor"><i class="fa fa-fw fa-table"></i>Ventas por Fecha</a>
                            </li>
                            <li>
                                <a href="reportes/reporte_ventas/2_rpt_ventapordetalle.php" target="contenedor"><i class="fa fa-fw fa-table"></i>Ventas por Detalle</a>
                            </li>
                            <li>
                                <a href="reportes/reporte_ventas/3_rpt_ventamensual.php" target="contenedor"><i class="fa fa-fw fa-table"></i>Ventas Mensual</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#consultasc"><i class="fa fa-fw fa-bar-chart-o"></i> Consultas Compras<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="consultasc" class="collapse">
                            <li>
                                <a href="reportes/reporte_compras/1_rpt_compraporfecha.php" target="contenedor"><i class="fa fa-fw fa-table"></i>Compras por Fecha</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#mantenimiento"><i class="fa fa-fw fa-wrench"></i> Mantenimiento<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="mantenimiento" class="collapse">
                            <li>
                                <a href="tipo_documento/index.php" target="contenedor"><i class="fa fa-fw fa-table"></i>Tipo Documento</a>
                            </li>
                            <li>
                                <a href="empleado/index.php" target="contenedor"><i class="fa fa-fw fa-table"></i>Empleado</a>
                            </li>
                            <li>
                                <a href="empleado/index.php" target="contenedor"><i class="fa fa-fw fa-table"></i>Tipo Empleado</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#herramientas"><i class="fa fa-fw fa-wrench"></i> Herramientas<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="herramientas" class="collapse">
                            <li>
                                <a href="clases/clsBackup.php" target="contenedor"><i class="fa fa-fw fa-table"></i>Respaldar Base de Datos</a>
                            </li>
                            
                            
                        </ul>
                    </li>


                    <!--li>
                        <a href="ayuda.php"  target="contenedor"><i class="fa fa-fw fa-desktop"></i> Ayuda</a>
                    </li>
                    <li>
                        <a href="ayuda.php"  target="contenedor"><i class="fa fa-fw fa-desktop"></i> Acerca de...</a>
                    </li-->
                    <li>
                        <a href="CerrarSesion.php"><i class="fa fa-fw fa-power-off"></i> Salir</a>
                    </li>


                </ul><!--Cierre del ul abajo del div contenedor-->
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <iframe src="central.php" name="contenedor" width="100%" height="1050px" frameborder=0 scrolling="no" style="margin-left: 0px; margin-right: 0px; margin-top: 2px; margin-bottom: 0px;"></iframe>
                        
                    </div>
                </div>
                <!-- /.row -->

                

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
<?php 

    } else {
        header("Location:index.php");
    }

?>
</body>

</html>
