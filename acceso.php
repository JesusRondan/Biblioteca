<? include("i-enc.php"); ?>
<Html>

	<Head>   
	
	<title> Acceso Denegado </title>
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

			
				

					<b>
						<?
						
							if(isset($_GET['m']))
						{
							$grande=$_GET['m'];
							
							switch ($grande) {
								case 'errscup':
									echo 'El Usuario y la Contrase�a no coinciden. Intente nuevamente';
									echo '<br>';
									echo '<br>';
									echo '<a href="acceso.php">  �Ha olvidado Contrase�a?  </a>';
									break;
								case 'errudt':
									echo 'El Usuario est� temporalmente deshabilitado. Comun�quese con el adminstrador del Sistema';
									break;
								case 'errpup':
									echo 'Permiso denegado para el Usuario en el Sistema';
									break;
								default:
									echo $grande;
							}
							
						}
						
						?>
					</b>

				<br>
				<br>
				
						<center> <a href="index.php"> Volver a P�gina Inicio </a> </center>	
			
			</div>
					
			</center>
			
			
			
	</body>

</Html>