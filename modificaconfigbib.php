<Html>

	<Head>   
	
	<title> Mensaje de Sistema - Biblioteca </title>
	<link href="estilo.css" rel="stylesheet" type="text/css" />
	
	</Head>
	<body bgcolor="#6495ED">
		<br>
		<br>
		<center>
		<img src="img/instituto.png">
		
		<br>
		<br>
		<br>
		<br>
		<br>
		
			<center>
			
			<div id="contenedor_login">

				<?php
				 include ('conectar.php');
				 
								$idusuario=$_SESSION['usuario'];
								$contrasenaactual = (isset($_POST['contrasenaactual']))?$_POST['contrasenaactual']:"";
								$nuevacont = (isset($_POST['contrasenanueva']))?$_POST['contrasenanueva']:"";
										
								$busqueda= mysql_query("SELECT * FROM usuarios WHERE contrasena='$contrasenaactual'");
								
								if(mysql_num_rows($busqueda)) {			
										
									$sql = "UPDATE usuarios SET
											contrasena = '$nuevacont'
											
											WHERE idusuario = $idusuario ";
											
									
									mysql_query($sql);
											echo '<b>La contraseña se modifico correctamente.</b>';
											echo '<br>';
											echo '<br>';
											echo "<center> <a href='configbib.php'> Volver </a> </center>";
											exit();
								 } else {
											echo '<b> Error al modificar contraseña.</b>';
											echo '<br>';
											echo '<br>';
											echo '<b> Contraseña Actual no es correcta.</b>';
											echo '<br>';
											echo '<br>';
											echo "<center> <a href='configbib.php'> Volver </a> </center>";
											exit();
									}					
										?>
				
			</div>
			
			</center>
			
</Html>