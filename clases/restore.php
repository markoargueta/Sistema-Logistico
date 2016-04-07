<?php 
include ("conexion.php"); 
echo'<title>Restore & backup para windows y linux</title>'; 
if (!isset ($_FILES["ficheroDeCopia"])) 
{ 
$contenidoDeFormulario="<form action='restoreback.php' method='post' enctype='multipart/form-data' name='formularioDeRestauracion'"; 
$contenidoDeFormulario.="id='formularioDeRestauracion'>\n"; 
$contenidoDeFormulario.="<table width='360' border='0' align='center' class='normal' cellspacing='7'>\n"; 
$contenidoDeFormulario.="<tr>\n"; 
$contenidoDeFormulario.="<td colspan='4' align=center>Indique el origen del archivo de copia: </td>\n"; 
$contenidoDeFormulario.="</tr>\n"; 
$contenidoDeFormulario.="<td colspan='2' align=center><input type='file' name='ficheroDeCopia' id='ficheroDeCopia'"; 
$contenidoDeFormulario.="size='30'></td>\n"; 
$contenidoDeFormulario.="<tr>\n"; 
$contenidoDeFormulario.="<td colspan='3' align='center'><input name='envio' type='submit' "; 
$contenidoDeFormulario.="id='envio' value='[ Aceptar ]'></td>\n"; 
$contenidoDeFormulario.="</tr>\n"; 
$contenidoDeFormulario.="</tbody>\n"; 
$contenidoDeFormulario.="</table>\n"; 
$contenidoDeFormulario.="</form>\n"; 
echo ($contenidoDeFormulario); 
} 
 else  
 { 
 $archivoRecibido=$_FILES["ficheroDeCopia"]["tmp_name"]; 
 $destino="./ficheroParaRestaurar.sql"; 
     
if (!move_uploaded_file ($archivoRecibido, $destino)) 
{ 
$mensaje='EL proceso ha fallado'; 
echo $mensaje; 
} 
$sistema="show variables where variable_name= 'basedir'"; 
$restore=mysql_query($sistema); 
$DirBase=mysql_result($restore,0,"value"); 
$primero=substr($DirBase,0,1); 
if ($primero=="/") { 
    $DirBase="bin/mysql"; 
}  
else  
{ 
    $DirBase=$DirBase."bin\mysql"; 
} 
$executa = "$DirBase -h $servername -u $dbusername --password=$dbpassword  $dbname < $destino"; 
system($executa,$resultado); 
if ($resultado)  
{  
echo "<H3>Error ejecutando comando: $executa</H3>\n"; 
$mensaje="ERROR. La copia de seguridad no se ha restaurado."; 
$cabecera="COPIA DE SEGURIDAD NO RESTAURADA"; 
echo $mensaje; 
echo "<meta http-equiv='Refresh' content='3;url=index.php'>"; 
}  
else  
{ 
    $mensaje2="La copia de seguridad se ha restaurado correctamente.";  
    $cabecera2="COPIA DE SEGURIDAD RESTAURADA"; 
    echo $mensaje2; 
    echo "<meta http-equiv='Refresh' content='3;url=index.php'>"; 
} 

unlink ("ficheroParaRestaurar.sql"); 
     
} 

?>