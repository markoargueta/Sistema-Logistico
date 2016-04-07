<?php
    session_start();
	include_once("../clases/clsEmpleado.php");
    
    $objEmpleado = new clsEmpleado;
    if(!isset($_SESSION['txtUsuario'])) {

        if(isset($_POST['txtPassword'])) {

            $result=$objEmpleado->Ingresar_Sistema2($_POST['txtUsuario'],$_POST['txtPassword']);
            if($row=mysql_fetch_array($result)) {

                $_SESSION["id"] = $row['IdEmpleado'];
                $_SESSION["usuario"] = $row['Nombre'];

                header("Location:../inicio.php");
            } else {
                header("Location:../index.php");
            }
        }
    }
?>