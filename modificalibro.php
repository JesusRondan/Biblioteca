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
<? include("conectar.php"); ?>
<title> Modifica Libro </title>
</Head>
<Body style="background-image:url('img/bibliotecas.jpg'); background-repeat:repeat; background-position:top center">
<?php include("i_menubiblioteca.php"); ?>
<br>
<br>
<br>

<div id="titulo">MODIFICAR LIBRO</div> 

<br>
<br>
<br>
<?
				$idlibro = (isset($_REQUEST['idlibro']))?$_REQUEST['idlibro']:0;
				$sql = "select * from libros where idlibro= $idlibro "	; 
				$rs = mysql_query($sql); 
				$row = mysql_fetch_object($rs);

 ?>
 
 <div id="contenedor_formulario">
	
	<form action="mod_libro.php" method= "post">
		<input type="hidden" value="<?=$idlibro?>" name="idlibro" />
		  
		  <label for="codigo"> <b> Código </b> </label>
		  <input type="text" id="id" name="id" value="<?=$row->idlibro?>" size="4" maxlength="4" disabled class="textbox" />
		  
		  <label for="isbn"> <b> ISBN </b> </label>
		  <input type="number" id="isbn" name="isbn" value="<?=$row->Isbn?>" size="20" class="textbox" />
		 
		  <label for="tit"> <b> Título </b> </label>
		  <input type="text" id="tit" name="tit" value="<?=$row->Titulo?>" size="50" class="textbox" />
		 
		  <label for="autor"> <b> Autor </b> </label>
		  <input type="text" id="autor" name="autor" value="<?=$row->Autor?>" size="25" maxlength="25" class="textbox" />
		  <br>
		  <br>
		  
		  <table border="0">
			<tr>
				<td> <center> <b> Editorial </b> </center> </td>
				<td> <center> <b> Año Imp. </b> </center> </td>
				<td> <center> <b> Lugar Imp. </b> </center> </td>
			</tr>
			<tr>
				<td> <input type="text" name="editorial" id="editorial" value="<?=$row->Editorial?>" size="30" class="textbox"> </td>
				<td> <input type="text" name="anoimp" id="anoimp" value="<?=$row->Yearimp?>" size="5" class="textbox"> </td>
				<td> <input type="text" name="lugarimp" id="lugarimp" value="<?=$row->Lugarimp?>" size="20" class="textbox"> </td>
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
						 <select name="forma" id="forma" class="textbox">
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
		  <input name="modificar libro" class="button" type="submit" value="MODIFICAR LIBRO" size="12" class="textbox" />
		  <input type="hidden" name="selectbuscarpor" value="<?=$_GET['selectbuscarpor']?>">
		  <input type="hidden" name="buscarpor" value="<?=$_GET['buscarpor']?>">
		  <input name="cancelar" type="button" class="button" onclick="javascript:location.href='buscalibro.php?selectbuscarpor=<?=$_GET['selectbuscarpor']?>&buscarpor=<?=$_GET['buscarpor']?>';" value="CANCELAR">
		
		
	</form>
	
	<br>

				
 </div>

 
</Body>
</Html>				 
				 