<?php 
error_reporting(E_ERROR | E_PARSE | E_CORE_ERROR); 
$servername='';//localhost 
$dbusername='';//root 
$dbpassword='';//tupass 
$dbname='';//tuclave 
connecttodb($servername,$dbname,$dbusername,$dbpassword); 
function connecttodb($servername,$dbname,$dbusername,$dbpassword) 
{ 
$link=mysql_connect ($servername,$dbusername,$dbpassword); 
if(!$link) 
{ 
die('No puedo Conectarme al Administrador MySQL'.mysql_error()); 
} 
mysql_select_db($dbname,$link) 
or die ('No puedo seleccionar la base de datos'.mysql_error()); 
} 
?>