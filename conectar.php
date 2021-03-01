<?
@session_start();
include ("configuracion.php");
$conn1 = mysql_connect($HOST,$USER_DB,$PASS_DB);
mysql_select_db($DB);
/*$sql = "SELECT * FROM tipos_usuario";
$rs = mysql_query($sql);*/
?>