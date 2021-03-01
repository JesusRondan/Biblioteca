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
<title> Materias de Libros </title>
<script>
function formulario(f) { 
		if (f.agrmateria.value   == '') { alert ('No ha ingresado Materia');  
		f.agrmateria.focus(); return false; }   
 return true; } 
</script>
</Head>
<Body style="background-image:url('img/bibliotecas.jpg');background-repeat:repeat;background-position:top center;">
<?php include("i_menubiblioteca.php"); ?>
<br>
<br>
<br>

<div id="titulo">MATERIAS DE LIBROS</div> 

<br>
<br>
<br>

<div id="contenedor_formulario3">

	<form action="altamateriasbib.php" onsubmit="return formulario(this)" method= "post">
	
	<br>
	
	<input type="text" name="agrmateria" id="agrmateria" size="20" class="textbox">
	
	<input class="button" type="submit" value="AGREGAR MATERIA" size="12">
	</form>

<br>


<center>

			<table border="0" width="40%"   cellpadding="10" cellspacing="0">
				<tr bgcolor="#CCEEFF" >
					<td width="20%"  > <center> Materias </center> </td> <td width="20%" > <center> Opciones </center> </td>
				</tr>
			</table>
			
		<div class="scrolling-table-container">

			<table border="0" width="40%"  cellpadding="10" cellspacing="0">
				
				 <?
						$mipeticion = mysql_query("SELECT * FROM materialibros ORDER BY Materia ASC ");

							//lo mostramos con un while 

							while($perfil = mysql_fetch_array($mipeticion))
							{
							echo '<tr>';
							echo '<td width="20%" > <center>' .$perfil['Materia']. ' </center></td>';
							echo '<td width="20%" > <center> <a href=modmateriasbib.php?Idmateria='.$perfil['Idmateria'].' "> <img src="img/icono-mod.png"> </a> </center> </td> ';
							echo '</tr>';
							}
					?>		
					
			
			</table>
			
		</div>	

</center>

</div>

</body>
</Html>