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
<title> Agregar Clientes </title>
<script>
function formulario(f) { 
		if (f.apellido.value   == '') { alert ('No ha ingresado Apellido');  
		f.apellido.focus(); return false; } 
		if (f.nombre.value  == '') { alert ('No ha ingresado Nombre'); 
		 return false; }
		if (f.dni.value  == '') { alert ('No ha ingresado DNI');
		return false; }
		 if (f.localidad.value  == '') { alert ('No ha ingresado Localidad');
		return false; }
		if (f.direccion.value  == '') { alert ('No ha ingresado Dirección');
		return false; } 
		if (f.telefono.value  == '') { alert ('No ha ingresado Teléfono');
		return false; } 
		 
 return true; } 
</script>
</Head>
<Body style="background-image:url('img/bibliotecas.jpg'); background-repeat:repeat; background-position:top center">
<?php include("i_menubiblioteca.php"); ?>
<br>
<br>
<br>

<div id="titulo">AGREGAR CLIENTES</div> 

<br>
<br>
<br>
	<div id="contenedor_formulario3">
	<form action="altacliente.php" onsubmit="return formulario(this)" method= "post">
				
			<br>
			  <table cellpadding="0" cellspacing="0" border="0" width="100%" align="center">
				<tr>
					<td align="right"> <b> Apellido </b> </td><td align="left"><input name="apellido" type="text"  id="apellido" value=""  size="20" class="textbox" align="right" /></td>
				</tr>
				<tr height="2"><td></td></tr>
				
				<tr>
					<td align="right"> <b> Nombre </b> </td><td align="left"><input name="nombre" type="text"  id="nombre" value=""  size="20" class="textbox" align="right" /></td>
				</tr>
				<tr height="2"><td></td></tr>
				
				<tr>
					<td align="right"> <b> DNI </b> </td><td align="left"><input name="dni" type="number"  id="dni" value=""  size="15" class="textbox" align="right" /></td>
				</tr>
				<tr height="2"><td></td></tr>
				
				<tr>
					<td align="right"> <b> Localidad </b> </td><td align="left"><input name="localidad" type="text"  id="localidad" value=""  size="30" class="textbox" align="right" /></td>
				</tr>
				<tr height="2"><td></td></tr>
				
				<tr>
					<td align="right"> <b> Dirección </b> </td><td align="left"><input name="direccion" type="text"  id="direccion" value=""  size="30" class="textbox" align="right" /></td>
				</tr>
				<tr height="2"><td></td></tr>
				
				<tr>
					<td align="right"> <b> Teléfono </b> </td><td align="left"><input name="telefono" type="number"  id="telefono" value=""  size="20"class="textbox"  align="right" /></td>
				</tr>
				
				<tr height="2"><td></td></tr>
				<tr height="2"><td></td></tr>
				<tr height="2"><td></td></tr>
				<tr height="2"><td></td></tr>
				
				<tr>
					<td></td><td align="left"><input name="Ingresar" type="submit" class="button" value="AGREGAR CLIENTE"  /></td>
				</tr>
				<tr height="2"><td></td></tr>
				
				
		</table>
	
			
	</form>
	</div>


</body>
</html>