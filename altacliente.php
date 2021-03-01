<? include ('conectar.php')?>
<?

$apellido = (isset($_REQUEST['apellido']))?$_REQUEST['apellido']:"";
$nombre = (isset($_REQUEST['nombre']))?$_REQUEST['nombre']:"";
$dni = (isset($_REQUEST['dni']))?$_REQUEST['dni']:"";
$direccion = (isset($_REQUEST['direccion']))?$_REQUEST['direccion']:"";
$localidad = (isset($_REQUEST['localidad']))?$_REQUEST['localidad']:"";
$telefono = (isset($_REQUEST['telefono']))?$_REQUEST['telefono']:0;
$idusuario=$_SESSION['usuario'];	


		$busqueda= mysql_query("SELECT * FROM cliente WHERE DNI='$dni'");
			if(mysql_num_rows($busqueda)>0) {
				header("location: mensaje_biblioteca.php?m=errac");
				exit();
			} else {
					
							$sql = "INSERT INTO cliente (Apellido, Nombre, DNI ,Localidad , Direccion, Telefono, usuarios_idusuario) VALUES  ('$apellido' , '$nombre' , '$dni', '$localidad','$direccion' , '$telefono', '$idusuario') ";
						mysql_query($sql);
						
						header("location: mensaje_biblioteca.php?m=agregarc");
						exit();	
			
			}	
 	
					
?>