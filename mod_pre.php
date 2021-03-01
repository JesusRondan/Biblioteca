<? include("i-enc.php"); ?>
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
							$Idprestado = (isset($_POST['Idprestado']))?$_POST['Idprestado']:0;
							$fechapre = (isset($_POST['fechapre']))?$_POST['fechapre']:0;
							$fechadev = (isset($_POST['fechadev']))?$_POST['fechadev']:0;
							$destacada = (isset($_POST['destacada']))?$_POST['destacada']:"";
							$sql = "UPDATE prestamos SET
									Fechaprestado = '$fechapre',
									Fechadevolucion = '$fechadev',
									Alta = '$destacada'
									WHERE Idprestado = $Idprestado ";
									
									$registro = $_POST['selectbuscarpor'];
									if ($registro == "C01"){
										$co = "C01";
									} elseif ($registro == "C02"){
										$co = "C02";
									}
							
							
									$registro1 = $_POST['buscarpor'];
									
									//echo $sql;
										mysql_query($sql);
								echo '<b>El préstamo se modifico correctamente.</b>';
								echo '<br>';
								echo '<br>';
								echo "<center> <a href='buscaprestamo.php?Idprestado=$Idprestado&selectbuscarpor=".$registro."&buscarpor=".$registro1."'> Volver </a> </center>";
								exit();
						 } else $m = $error;
								echo '<b> Error al modificar préstamo.</b>';
								echo '<br>';
								echo '<br>';
								echo '<b>Usted ha modificado préstamo con algún dato vacío.</b>';
								echo '<br>';
								echo '<br>';
								echo "<center> <a href='buscaprestamo.php?Idprestado=$Idprestado&selectbuscarpor=".$registro."&buscarpor=".$registro1."'>'> Volver </a> </center>";
								exit();
							
							   ?>
			
		</center>
			
</html>
