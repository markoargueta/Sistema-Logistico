<?php
    session_start();
    if(isset($_SESSION["usuario"])){
     header("Location:inicio.php");}
     //Hago que esto para que no muestre el login si hay sesion iniciada
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    
    <title>Logístico</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Bienvenido</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" name="frmUsuario" method="post" action="empleado/Ingresar.php">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Usuario" name="txtUsuario" id="txtUsuario" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Contraseña" name="txtPassword" id="txtPassword" type="password">
                                </div>
                                <div class="form-group">
                                    <select name="tipousuario" class="form-control">
                                    	<option>Administrador</option>
                                    </select>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-lg btn-success btn-block">Ingresar</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    

</body>

</html>
