<!DOCTYPE html>
<html lang="en">
<?php include_once "clases/clsVenta.php";
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Logístico</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

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

        
        <div id="page-wrapper">
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-fw fa-desktop"></i> Acerca De...
                                
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="containertodo" style="width:90%; "><h3>Acerca De!</h3>
                            <p>Puedes revisar manuales de programación en el Siguiente Link 
                            <strong><a href="www.youtube.com/jcarlosad7">www.youtube.com/jcarlosad7</a></strong></p>
                            <p>Puedes descargar sistemas completos de programación en desde nuestra comunidad 
                            <strong><a href="www.incanatoit.com">www.incanatoit.com</a></strong></p>
                            
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    
                
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
<?php
    } else {
        header("Location:index.php");
    }
?>
</body>

</html>
