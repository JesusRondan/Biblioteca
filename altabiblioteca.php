<? include ('conectar.php')?>
<?
$error = "";
foreach($_REQUEST as $c =>$v){
   if($v == "") $error = $error ." Falta Ingresar ".$c ." <br>";
}
if($error == ""){
$isbn = (isset($_REQUEST['isbn']))?$_REQUEST['isbn']:0;
$titulo = (isset($_REQUEST['tit']))?$_REQUEST['tit']:"";
$autor = (isset($_REQUEST['autor']))?$_REQUEST['autor']:"";
$editorial = (isset($_REQUEST['editorial']))?$_REQUEST['editorial']:"";
$anoimp = (isset($_REQUEST['anoimp']))?$_REQUEST['anoimp']:0;
$lugarimp = (isset($_REQUEST['lugarimp']))?$_REQUEST['lugarimp']:"";
$materia = (isset($_REQUEST['materia']))?$_REQUEST['materia']:"";
$forma = (isset($_REQUEST['forma']))?$_REQUEST['forma']:"";
$idusuario=$_SESSION['usuario'];	
	
	$sql = "INSERT INTO libros (Isbn, Titulo, Autor, Editorial, Yearimp, Lugarimp, materialibros_Idmateria, Formaadq_IdForma, usuarios_idusuario) VALUES  ($isbn , '$titulo' , '$autor', '$editorial', '$anoimp' , '$lugarimp', $materia , $forma, $idusuario) ";
	
	mysql_query($sql);
	
	header("location: mensaje_biblioteca.php?m=agregar");
	exit();
} else {
		$m = $error;
		header("location: mensaje_biblioteca.php?m=erral");
	exit();
}	
					
?>