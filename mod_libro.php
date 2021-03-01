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
					$idlibro = (isset($_POST['idlibro']))?$_POST['idlibro']:0;
					$isbn = (isset($_POST['isbn']))?$_POST['isbn']:0;
					$titulo = (isset($_POST['tit']))?$_POST['tit']:"";
					$autor = (isset($_POST['autor']))?$_POST['autor']:"";
					$editorial = (isset($_POST['editorial']))?$_POST['editorial']:"";
					$anoimp = (isset($_POST['anoimp']))?$_POST['anoimp']:"";
					$lugarimp = (isset($_POST['lugarimp']))?$_POST['lugarimp']:"";
					$materia =  (isset($_POST['materia']))?$_POST['materia']:"";
					$forma = (isset($_POST['forma']))?$_POST['forma']:"";
                $sql = "UPDATE libros SET
				        Isbn = $isbn,
						Titulo = '$titulo',
						Autor = '$autor',
						Editorial = '$editorial',
						Yearimp = '$anoimp',
						Lugarimp = '$lugarimp',
						materialibros_Idmateria = '$materia',
						formaadq_Idforma = '$forma'
						WHERE idlibro = $idlibro ";
						//echo $sql;
						
						$registro = $_POST['selectbuscarpor'];
						 if ($registro == "C01"){
								$co = "C01";
							} elseif ($registro == "C02"){
								
								$co = "C02";
							}
							
							
						$registro1 = $_POST['buscarpor'];
						
						mysql_query($sql);
								echo '<b>El Libro se modifico correctamente.</b>';
								echo '<br>';
								echo '<br>';
								echo "<center> <a href='buscalibro.php?selectbuscarpor=".$registro."&buscarpor=".$registro1."&idlibro=$idlibro'> Volver </a> </center>";
								exit();
						 } else $m = $error;
								echo '<b> Error al modificar Libro.</b>';
								echo '<br>';
								echo '<br>';
								echo '<b>Usted ha modificado Libro con algún dato vacío.</b>';
								echo '<br>';
								echo '<br>';
								echo "<center> <a href='buscalibro.php?selectbuscarpor=".$registro."&buscarpor=".$registro1."&idlibro=$idlibro'> Volver </a> </center>";
								exit();
							
							   ?>	
							 
		</div>
			
		</center>
			
</html>