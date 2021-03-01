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

			
				

					
						<?
						
							if(isset($_GET['m']))
						{
							$grande=$_GET['m'];
							
							switch ($grande) {
								case 'erral':
									echo '<b>Error al agregar el nuevo Libro.</b>';
									echo '<br>';
									echo '<br>';
									echo '<b>Usted ha agregado Libro con algún dato vacío.</b>';
									echo '<br>';
									echo '<br>';
									echo "<center> <a href='biblioteca.php'> Volver </a> </center>";
									break;
								case 'agregar':
									echo '<b>El Libro se agrego correctamente.</b>';
									echo '<br>';
									echo '<br>';
									echo "<center> <a href='biblioteca.php'> Volver </a> </center>";
									break;
								case 'errac':
									echo  '<b>Error al agregar el nuevo Cliente.</b>';
									echo '<br>';
									echo '<br>';
									echo '<b>El DNI ingresado ya pertenece a un Cliente.</b>';
									echo '<br>';
									echo '<br>';
									echo "<center> <a href='cliente.php'> Volver </a> </center>";
									break;
									case 'agregarc':
									echo '<b>El Cliente se agrego correctamente.</b>';
									echo '<br>';
									echo '<br>';
									echo "<center> <a href='cliente.php'> Volver </a> </center>";
									break;
									case 'errap':
									echo '<b>Error al agregar el nuevo Préstamo.</b>';
									echo '<br>';
									echo '<br>';
									echo '<b>El libro seleccionado ha sido prestado.</b>';
									echo '<br>';
									echo '<br>';
									echo "<center> <a href='prestalibros.php'> Volver </a> </center>";
									break;
								case 'agregarp':
									echo '<b>El Prestamo se agrego correctamente.</b>';
									echo '<br>';
									echo '<br>';
									echo "<center> <a href='prestalibros.php'> Volver </a> </center>";
									break;
								case 'erraml':
									echo '<b>Error al agregar la nueva Materia.</b>';
									echo '<br>';
									echo '<br>';
									echo '<b>Usted ha agregado Materia con un dato vacío.</b>';
									echo '<br>';
									echo '<br>';
									echo "<center> <a href='materiasbib.php'> Volver </a> </center>";
									break;
								case 'agregarml':
									echo '<b>La Materia se agrego correctamente.</b>';
									echo '<br>';
									echo '<br>';
									echo "<center> <a href='materiasbib.php'> Volver </a> </center>";
									break;
								default:
									echo $grande;
							}
							
						}
						
						?>
			
			</div>
					
			</center>
			
			
			
	</body>

</Html>