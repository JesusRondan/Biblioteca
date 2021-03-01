<? include ('conectar.php')?>
<?

$fechapre = (isset($_REQUEST['fechapre']))?$_REQUEST['fechapre']:"";
$fechadev = (isset($_REQUEST['fechadev']))?$_REQUEST['fechadev']:"";
$dni = $_POST['dni'];
$idlibro = $_POST['idlibro'];
$destacada = (isset($_REQUEST['destacada']))?$_REQUEST['destacada']:"";
$idusuario=$_SESSION['usuario'];
	
	
	$consulta1 = 'SELECT * FROM cliente WHERE dni = ' . $dni;
	$resultado1 = mysql_query($consulta1);
	$cliente = mysql_fetch_object($resultado1);
	$idcliente = $cliente->idcliente;
	
	
	$consulta2 = 'SELECT * FROM libros WHERE idlibro = ' . $idlibro;
	$resultado2 = mysql_query($consulta2);
	$libro = mysql_fetch_object($resultado2);
	
	$idlibro = $libro->idlibro;

	$busqueda= mysql_query("SELECT l.idlibro, p.Alta FROM prestamos as p INNER JOIN libros as l ON p.libros_idlibro = l.idlibro 
							WHERE p.Alta = 'on' AND l.idlibro='$idlibro'");
							
			if(mysql_num_rows($busqueda)>0) {
				header("location: mensaje_biblioteca.php?m=errap");
				exit();
			
			} else {
				
						$sql = "INSERT INTO prestamos (Fechaprestado, Fechadevolucion, cliente_idcliente, libros_idlibro, Alta, usuarios_idusuario) VALUES  ('$fechapre', '$fechadev', '$idcliente', '$idlibro', '$destacada', $idusuario)";
						mysql_query($sql);
						//var_dump($sql);die
						
						header("location: mensaje_biblioteca.php?m=agregarp");
						exit();	
			
			}	
	/*
	
	$sql = "INSERT INTO prestamos (Fechaprestado, Fechadevolucion, cliente_idcliente, libros_idlibro, Alta, usuarios_idusuario) VALUES  ('$fechapre', '$fechadev', '$idcliente', '$idlibro', '$destacada', $idusuario)";
	//var_dump($sql);die;
	mysql_query($sql);
	//$m="Se ha agregado un Libro correctamente";
	header("location: mensaje_biblioteca.php?m=agregarp");
	exit();
} else $m = $error;
	//header("location:biblioteca.php");
	//echo $sql;
	header("location: mensaje_biblioteca.php?m=errap");
	exit();
	*/
					
?>