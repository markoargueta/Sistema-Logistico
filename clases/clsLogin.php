<?php
include_once ("clsConexion.php");
$error = "";
$con = new clsConexion;

if($con->conectarse()==true)
{
	ini_set("session.use_only_cookies","1"); 
	ini_set("session.use_trans_sid","0"); 

	$Usuario = $_POST['Username'];
	$query = "CALL SP_S_Empleado_Verificar_Hora('$Usuario')";
	$rs = mysql_query($query);
	
	while($campo = MySQL_fetch_array($rs))
	{
		$bloqueo = $campo["EXPIRE_MINUTES"];
	}
	
	
	if(($bloqueo == "")||($bloqueo <= 0))
	{
		if($con->conectarse()==true)
		{
			$Pass = $_POST['Password'];
			$Tipo_usu = $_POST['tipo_usu'];
		
			$query = "CALL SP_S_Login('$Usuario','".md5($Pass)."','$Tipo_usu')";
		
			$GetUser = @mysql_query($query);
			$row = mysql_fetch_assoc($GetUser);

			if(mysql_num_rows($GetUser)!= 0)
			{
				session_name("loginUsuario");
				session_start();
				session_set_cookie_params(0, "/", $HTTP_SERVER_VARS["HTTP_HOST"], 0);
				$_SESSION["autentificado"]= "SI";
				$_SESSION["ultimoAcceso"]= date("Y-n-j H:i:s"); 
				$_SESSION['usuario']=array('nom'=>$row['Nombre'], 'ape'=>$row['Apellido'], 'tipo'=>$row['Descripcion']);
				unset($_SESSION['error']);
				header("Location: ../index.php");
				if($con->conectarse()==true)
				{
					$query = "CALL SP_U_Empleado_Estado('$Usuario','ACTIVAR')";
					$GetUser = @mysql_query($query);
				}
				
			}
			else
			{
				if($con->conectarse()==true)
				{
					$query = "CALL SP_S_Intento('$Usuario')";
					$rs = mysql_query($query);
					while($campo = MySQL_fetch_array($rs))
					{
						$intento = $campo["Intento"];
					}
					
					echo $intento;
				
					if($intento < 3)
					{
						if($con->conectarse()==true)
						{
							$query = "CALL SP_U_Empleado_Estado('$Usuario','AUMENTAR')";
							$GetUser = @mysql_query($query);
							$error = "Datos incorrectos usted va ".($intento+1)." intentos";
							/*echo $error;
							echo "<br>";
							echo "<a href=index.php>Regresar</a>";*/
							session_start();
							$_SESSION['error'] = $error;				
							header("Location: ../../login.php");
						}
					}
					else
					{
						if($con->conectarse()==true)
						{
							$query = "CALL SP_U_Empleado_Estado('$Usuario','DESACTIVAR')";
							$GetUser = @mysql_query($query);
							$error = "Usted ha superado el numero maximo de intentos, ha sido bloqueado por 10 minutos";
							session_start();
							$_SESSION['error'] = $error;				
							header("Location: ../../login.php");
							/*echo $error;
							echo "<br>";
							echo "<a href=index.php>Regresar</a>";*/
						}
					}				
				}
			}
			@mysql_free_result($GetUser);	
		}		
	}
	else
	{
		$error = "Usted ha superado el numero maximo de intentos debera esperar: ".$bloqueo." minutos";
		session_start();
		$_SESSION['error'] = $error;				
		header("Location: ../../login.php");
		/*echo $error;
		echo "<br>";
		echo "<a href=index.php>Regresar</a>";*/		
	}		
}
@mysql_close($con);
?>