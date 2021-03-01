<Html>

	<Head>   
	
	<title> Mensaje de Sistema - Biblioteca </title>
	<link href="estilo.css" rel="stylesheet" type="text/css" />
	
	</Head>
	
	<Body style="background-image:url('img/bibliotecas.jpg'); background-repeat:repeat; background-position:top center">
		
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		
			<center>
			
			<div id="contenedor_login">
 
 
 <?php
 include ('conectar.php');
 
					$error = "";
					foreach($_REQUEST as $c =>$v){
						   if($v == "") $error = $error ." Falta Ingresar ".$c ." <br>";
						}
					if($error == ""){
					$idcliente = (isset($_POST['idcliente']))?$_POST['idcliente']:0;
					$apellido = (isset($_POST['apellido']))?$_POST['apellido']:"";
					$nombre = (isset($_POST['nombre']))?$_POST['nombre']:"";
					$dni = (isset($_POST['dni']))?$_POST['dni']:0;
					$localidad = (isset($_POST['localidad']))?$_POST['localidad']:"";
					$direccion = (isset($_POST['direccion']))?$_POST['direccion']:"";
					$telefono = (isset($_POST['telefono']))?$_POST['telefono']:0;
                $sql = "UPDATE cliente SET
				        Apellido = '$apellido',
						Nombre = '$nombre',
						DNI = '$dni',
						Localidad = '$localidad',
						Direccion = '$direccion',
						Telefono = '$telefono' 
						WHERE idcliente = $idcliente ";
						//echo $sql;
						
						
						$registro = $_POST['selectbuscarpor'];
						 if ($registro == "C01"){
								$co = "C01";
							} elseif ($registro == "C02"){
								
								$co = "C02";
							}
							
							
						$registro1 = $_POST['buscarpor'];
						 
						
						//$co = "C01";
						
							mysql_query($sql);
								echo '<b>El Cliente se modifico correctamente.</b>';
								echo '<br>';
								echo '<br>';
								echo "<center> <a href='buscacliente.php?selectbuscarpor=".$co."&buscarpor=".$registro1."&idcliente=$idcliente'> Volver </a> </center>";
								exit();
						 } else $m = $error;
								echo '<b> Error al modificar Cliente.</b>';
								echo '<br>';
								echo '<br>';
								echo '<b>Usted ha modificado Cliente con algún dato vacío.</b>';
								echo '<br>';
								echo '<br>';
								echo "<center> <a href='buscacliente.php?selectbuscarpor=".$co."&buscarpor=".$registro1."&idcliente=$idcliente'> Volver </a> </center>";
								exit();
							
							   ?>
							 
		</div>
			
		</center>
			
</html>