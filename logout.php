<? include ('conectar.php')?>
<?
@session_start();
$id=$_SESSION['usuario'];
mysql_query("update usuarios set ultimo_acceso = NOW() where id_usuario = $id ");
session_destroy();
header("location:index.php");
?>