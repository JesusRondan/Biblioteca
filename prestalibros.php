<Html>
<?php
include("check_login.php");

if ( $_SESSION['tipos_Idtipo'] != 1 ) {
    header("location:acceso.php?m=errpup");
}
?>
<?php include("i-enc.php");

$m = (isset($_REQUEST['m']))?$_REQUEST['m']:"";
 ?>
<Head>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<title> Agregar Préstamos de Libros </title>
<script>
			function Valida(formulario) {
			/* validación del DNI */
							if (isNaN(parseInt(formulario.dni.value))) {
								alert('Contenido del dni y/o isbn no es valido.'); 
								return false;
							  } 
							if (isNaN(parseInt(formulario.idlibro.value))) {
								alert('Contenido del isbn y/o dni no es valido.'); 
								return false;
							  } 
								return true;
							}
							
							function Validar(formulario2) {
							/* validación del DNI */
							if (isNaN(parseInt(formulario2.dni.value))) {
								alert('No ha buscado Persona o Libro.'); 
								return false;
							  } 
							if (isNaN(parseInt(formulario2.idlibro.value))) {
								alert('No ha buscado Persona o Libro.'); 
								return false;
							  }
							if (formulario2.fechapre.value   == '') { alert ('No ha ingresado Fecha Prestamo');  
								return false; }
							if (formulario2.fechadev.value   == '') { alert ('No ha ingresado Fecha Devolucion');  
								return false; }
							var opcion = document.formulario2.destacada; //acceso al botón
							if (opcion.checked == true) { //botón seleccionado
            
							}
							else {  //botón no seleccionado
							alert("Debe dar de alta Prestamo");
							return false; //el formulario no se envia
							} 		
								return true;
							}
				
		
</script>
</Head>
<Body style="background-image:url('img/bibliotecas.jpg'); background-repeat:repeat; background-position:top center">
<?php include("i_menubiblioteca.php"); ?>
<br>
<br>
<br>

<div id="titulo"> AGREGAR PRÉSTAMOS DE LIBROS</div> 

<br>
<br>
<br>

	<div id="contenedor_formulario3">
	
	<form action="prestalibros.php" method="post" onsubmit="return Valida(this);" id="busca">
	<br>
	<table border="0">
			<tr>
				<td> <center> <b> DNI </b> </center> </td>
				<td> <center> <b> CODIGO </b> </center> </td>
				
			</tr>
			<tr>
	 
				<td>	<?php if ( isset($_POST['dni']) && $_POST['dni'] != '') { ?>
							<input type="text" name="dni" id="dni" size="12" class="textbox" value='<?php echo $_POST['dni']; ?>'>
						<?php } else { ?>
							<input type="text" name="dni" id="dni" size="12" class="textbox" >
						<?php } ?>
				</td>
			
			
				<td>
						<?php if ( isset($_POST['idlibro']) && $_POST['idlibro'] != '') { ?>
						<input type="text" name="idlibro" id="idlibro" size="8" class="textbox" value='<?php echo $_POST['idlibro']; ?>'>
						<?php } else { ?>
						<input type="text" name="idlibro" id="idlibro" size="8" class="textbox" >
						<?php } ?>
				</td>
				
				<td> <input class="button" type="submit" value="Buscar" size="12"> </td>
				
			</tr>
			
	</table>		

	</form>
	
<?php

	if ( isset($_POST['dni']) && $_POST['dni'] != '' ) {
		$result = mysql_query("select * FROM cliente WHERE DNI = " . $_POST['dni']);
		
		$fila = mysql_fetch_assoc($result);
		
		
	}
?>
	
<br>	
<br>
<?php if ( isset($_POST['dni']) && $_POST['dni'] != '' && $fila != false) { ?> 
	<strong> Apellido y Nombre: <?php echo $fila['Apellido'] . ', ' . $fila['Nombre']; ?></strong>
<?php } else { ?>
	<strong> Apellido y Nombre: </strong>
<?php } ?>

<br>
<br>
<br>
<?php

	if ( isset($_POST['idlibro']) && $_POST['idlibro'] != '' ) {
		$result = mysql_query("select * FROM libros WHERE idlibro = " . $_POST['idlibro']);
		
		$fila = mysql_fetch_assoc($result);
	}
?>

		<?php if ( isset($_POST['idlibro']) && $_POST['idlibro'] != '' && $fila != false) { ?> 
			<strong> Titulo: <?php echo $fila['Titulo']; ?></strong>
		<?php } else { ?>
			<strong> Titulo: </strong>
		<?php } ?>
<br>
<br>
<br>
	
			<form name="formulario2" action="altaprestado.php"  onsubmit="return Validar(this);" method= "post">
						<table border="0">
							<tr>
								<td> <center> <b> Fecha Prest. </b> </center> </td>
								<td> <center> <b> Fecha Dev. </b> </center> </td>
								<td> <center> <b> Alta </b> </center> </td>
							</tr>
							<tr>
								<td> <input type="date" name="fechapre" id="fechapre" value="" size="12" class="textbox"> </td>
								<td> <input type="date" name="fechadev" id="fechadev" value="" size="12" class="textbox"> </td>
								<td> <center> <input type="checkbox" name="destacada" id="destacada" value="on" size="12" class="textbox"> </center> </td>
							</tr>
						</table>
						

				<br>
				<br>
						 <input class="button" type="submit" value="AGREGAR PRÉSTAMO" size="12" class="textbox" />
						 <input type="hidden" name='dni' id='dni' value='<?php echo $_POST['dni']; ?>'>
						 <input type="hidden" name='idlibro' id='idlibro' value='<?php echo $_POST['idlibro']; ?>'>
						 
						 
						 
		</form>
	   
<br>
	
</div>


</Body>
</Html>