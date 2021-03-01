<html>
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
<title> Configuración de Usuario </title>
<script>
function comprobar() {
         var mirarLargo="no";
		 var mirarLarg="no";
         var mirarIgual="no";
		 var contrasenaactual = document.formulario.contrasenaactual
         var contrasenanueva = document.formulario.contrasenanueva
         var confirmarcontrasena = document.formulario.confirmarcontrasena
         var aviso = document.getElementById("aviso");
         aviso.innerHTML = ""
		 if (contrasenaactual.value.length >= 6) {
            mirarLargo = "si"
            }
         else {
            texto = "La contraseña actual tiene entre 6 y 12 caracteres.<br/>"  
            aviso.innerHTML += texto
            }
         if (contrasenanueva.value.length >= 6) {
            mirarLarg = "si"
            }
         else {
            texto = "La contraseña nueva debe tener entre 6 y 12 caracteres.<br/>"  
            aviso.innerHTML += texto
            }
         if (contrasenanueva.value == confirmarcontrasena.value) {
            mirarIgual = "si"
            }
         else {
            texto = "La contraseña nueva y su repetición deben ser iguales.<br/>"  
            aviso.innerHTML += texto
            }
         if (mirarLargo == "no" || mirarLarg == "no" || mirarIgual == "no") {
            return false
            }
         }
function restaurar() {
         var aviso = document.getElementById("aviso");
         aviso.innerHTML = ""
         }
</script>
</Head>
<Body style="background-image:url('img/bibliotecas.jpg'); background-repeat:repeat; background-position:top center">
<?php include("i_menubiblioteca.php"); ?>
<br>
<br>
<br>

<div id="titulo"> CONFIGURACIÓN DE USUARIO</div> 

<br>
<br>
<br>

<center>

<div id="contenedor_login">
	
		  
		  <label for="seccion"> <b> Usuario </b> </label>
		  
		   <br>
		  
		  <?
				$mipeticion = mysql_query("SELECT * FROM usuarios where idusuario = 1");

					//lo mostramos con un while 

					while($perfil = mysql_fetch_array($mipeticion))
					{
					echo $perfil['nombre'].'<br>';
					}
			?>



<?
				$idusuario = (isset($_REQUEST['idusuario']))?$_REQUEST['idusuario']:0;
                $sql = "SELECT * FROM usuarios  where idusuario=$idusuario ";
                $rs = mysql_query($sql);
				$row = mysql_fetch_object($rs);

 ?>			
	     <br>
		 
		 
	<form name="formulario" action="modificaconfigbib.php" onsubmit="return comprobar()" method="post">
		  <input type="hidden" value="<?=$idusuario?>" name="idusuario" id="idusuario" />
		  
		  <label for="contrasena"> <b> Contraseña Actual </b> </label>
		  <input type="password" id="contrasenaactual" name="contrasenaactual" size="15" class="textbox" />
		  
		  <label for="contrasenanueva"> <b> Contraseña Nueva </b> </label>
		  <input type="password" id="contrasenanueva" name="contrasenanueva" size="15" class="textbox" pattern=".{0,12}" onfocus="restaurar()" />
		 
		  <label for="confirmarcontrasena"> <b> Confirmar Contraseña </b> </label>
		  <input type="password" id="confirmarcontrasena" name="confirmarcontrasena" size="15" class="textbox" pattern=".{0,12}" onfocus="restaurar()" />
		  <br>
		  <br>
		  <input class="button" type="submit" value="CONFIGURAR " size="12" class="textbox" />
		  <br>
		  <br>
		  
	</form>
	
	<p id="aviso"></p>	


</div>
	
</center>


</Body>
</html>