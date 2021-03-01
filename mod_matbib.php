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
					$Idmateria = (isset($_POST['Idmateria']))?$_POST['Idmateria']:0;
					$materia = (isset($_POST['agrmat']))?$_POST['agrmat']:"";
                $sql = "UPDATE materialibros SET
				        Materia = '$materia'
						WHERE Idmateria = $Idmateria ";
						//echo $sql;
							mysql_query($sql);
								echo '<b>La materia se modifico correctamente.</b>';
								echo '<br>';
								echo '<br>';
								echo "<center> <a href='materiasbib.php'> Volver </a> </center>";
								exit();
						 } else $m = $error;
								echo '<b> Error al modificar materia.</b>';
								echo '<br>';
								echo '<br>';
								echo '<b>Usted ha modificado materia con un dato vacío.</b>';
								echo '<br>';
								echo '<br>';
								echo "<center> <a href='materiasbib.php'> Volver </a> </center>";
								exit();
							
							   ?>
			</div>
			
			</center>
			
</html>
					
					