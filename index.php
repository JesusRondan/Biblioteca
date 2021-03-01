<? include("i-enc.php"); ?>
<Html>
<head>
<title>Inicio Sistema</title>
<script>
function formulario(f) { 
		if (f.usuario.value   == '') { alert ('No ha ingresado Usuario');  
		f.usuario.focus(); return false; } 
		if (f.password.value  == '') { alert ('No ha ingresado Contraseña'); 
		f.password.focus(); return false; }
 
		 
 return true; }
 </script>
<link href="estilo.css" rel="stylesheet" type="text/css" />
</head>
<body style="background-image:url('img/bibliotecas.jpg'); background-repeat:repeat; background-position:top center">

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

	<form action="act_login.php" method="post" id="login" name="login" onsubmit="return formulario(this)">

	<br>

	<center><strong> <i> LOGIN </i> </strong></center>
	<br>

	<table cellpadding="0" cellspacing="0" border="0" width="50%" align="center">
	<tr>
	<td align="right"> <font size= "3" > <b> <i> Usuario </i> </b> </font> </td><td align="left"><input name="usuario" type="text" class="textbox" id="usuario" value="" size="20" align="right" /></td>
	</tr>
	<tr height="2"><td></td></tr>
	<tr>
	<td align="right"> <font size= "3" > <b> <i> Contraseña </i> </b> </font> </td><td align="left"><input name="password" type="password" class="textbox" id="password" size="20" align="right" /></td>
	</tr>       
	</table>


	<br>
	<br>

	<center> <input name="Ingresar" type="submit" class="button" value="INGRESAR" size="200" /> </center>
	</form>
	
</div>
</center>

<br>
<br>



</body>
</html>
