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
<title> Agregar Libros </title>
<script>
function formulario(f) { 
		if (f.isbn.value   == '') { alert ('No ha ingresado ISBN');  
		f.isbn.focus(); return false; } 
		if (f.tit.value  == '') { alert ('No ha ingresado Título'); 
		 return false; }
		if (f.autor.value  == '') { alert ('No ha ingresado Autor'); 
		 return false; }
		if (f.editorial.value  == '') { alert ('No ha ingresado Editorial');
		return false; }
		 if (f.anoimp.value  == '') { alert ('No ha ingresado Año de Impresión');
		return false; }
		if (f.lugarimp.value  == '') { alert ('No ha ingresado Lugar de Inpresión');
		return false; }  
 return true; } 
</script>
</Head>
<Body style="background-image:url('img/bibliotecas.jpg'); background-repeat:repeat; background-position:top center">
<?php include("i_menubiblioteca.php"); ?>
<br>
<br>
<br>

<div id="titulo">AGREGAR LIBROS</div> 

<br>
<br>
<br>
	
	<div id="contenedor_formulario">
	<form action="altabiblioteca.php" onsubmit="return formulario(this)" method= "post">
		  
		  <label for="isbn"> <b> ISBN </b> </label>
		  <input type="number" id="isbn" name="isbn" value="" size="20" class="textbox" />
		 
		  <label for="tit"> <b> Título </b> </label>
		  <input type="text" id="tit" name="tit" value="" size="50" class="textbox" />
		 
		  <label for="autor"> <b> Autor </b> </label>
		  <input type="text" id="autor" name="autor" value="" size="25" maxlength="25" class="textbox" />
		  <br>
		  <br>
		  
		  <table border="0">
			<tr>
				<td> <center> <b> Editorial </b> </center> </td>
				<td> <center> <b> Año Imp. </b> </center> </td>
				<td> <center> <b> Lugar Imp. </b> </center> </td>
			</tr>
			<tr>
				<td> <input type="text" name="editorial" id="editorial" value="" size="30" class="textbox"> </td>
				<td> <input type="text" name="anoimp" id="anoimp" value="" size="5" class="textbox"> </td>
				<td> <input type="text" name="lugarimp" id="lugarimp" value="" size="20" class="textbox"> </td>
			</tr>
		</table>
		<br>
		<table border="0">
			<tr>
				<td> <center> <b> Materia </b> </center> </td>
				<td> <center> <b> Forma de Adq. </b> </center> </td>
				
			</tr>
			<tr>
				<td> 
						<select name="materia" id="materia" class="textbox" >
							<?
							//armo el set de datos de horario
							$i=1;
							$sql = "SELECT * FROM materialibros";
							$rs = mysql_query($sql);
							$cantidad=mysql_num_rows($rs); 
							while ($row = mysql_fetch_object($rs))
							{
							?>
							<option value="<?=$row->Idmateria?>"><?=$row->Materia?></option>
							<? }?>
						</select>
				</td>
				<td> 
						 <select name="forma" id="forma" class="textbox" >
							<?
							//armo el set de datos de horario
							$i=1;
							$sql = "SELECT * FROM formaadq";
							$rs = mysql_query($sql);
							$cantidad=mysql_num_rows($rs); 
							while ($row = mysql_fetch_object($rs))
							{
							?>
							<option value="<?=$row->IdForma?>"><?=$row->Formaadq?></option>
							<? }?>
						</select>

				</td>
				
			</tr>
		</table>		
				
		  
		 <br>
		 <br>
		  <input class="button" type="submit" value="AGREGAR LIBRO" size="12" class="textbox" />
		  
		
	</form>
	
	<br>
	
	</div>

</Body>
</Html>