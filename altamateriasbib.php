<? include ('conectar.php')?>
<?
$error = "";
foreach($_REQUEST as $c =>$v){
   if($v == "") $error = $error ." Falta Ingresar ".$c ." <br>";
}
if($error == ""){
$materia = (isset($_REQUEST['agrmateria']))?$_REQUEST['agrmateria']:"";
$idusuario=$_SESSION['usuario'];


	$sql = "INSERT INTO materialibros (Materia, usuarios_idusuario) VALUES  ('$materia', $idusuario) ";
			//var_dump($sql);die;
	mysql_query($sql);
	//$m="Se ha agregado un Libro correctamente";
	header("location: mensaje_biblioteca.php?m=agregarml");
	exit();
} else $m = $error;
	//header("location:biblioteca.php");
	//echo $sql;
	header("location: mensaje_biblioteca.php?m=erraml");
	exit();
					
?>