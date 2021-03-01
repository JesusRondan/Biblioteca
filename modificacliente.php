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
<title> Modifica Cliente </title>
</Head>
<Body style="background-image:url('img/bibliotecas.jpg'); background-repeat:repeat; background-position:top center">
<?php include("i_menubiblioteca.php"); ?>
<br>
<br>
<br>

<div id="titulo">MODIFICAR CLIENTE</div> 

<br>
<br>
<br>

<?
				$idcliente = (isset($_REQUEST['idcliente']))?$_REQUEST['idcliente']:0;
				$sql = "select * from cliente where idcliente= $idcliente "	; 
				$rs = mysql_query($sql); 
				$row = mysql_fetch_object($rs); 
				
 ?>

<div id="contenedor_formulario3">
	<form action="mod_cliente.php" method= "post">
				<input type="hidden" value="<?=$idcliente?>" name="idcliente" />
			<br>
			  <table cellpadding="0" cellspacing="0" border="0" width="100%" align="center">
				<tr>
					<td align="right"> <b> Apellido </b> </td><td align="left"><input name="apellido" type="text"  id="apellido" value="<?=$row->Apellido?>"  size="20" class="textbox" align="right" /></td>
				</tr>
				<tr height="2"><td></td></tr>
				
				<tr>
					<td align="right"> <b> Nombre </b> </td><td align="left"><input name="nombre" type="text"  id="nombre" value="<?=$row->Nombre?>"  size="20" class="textbox" align="right" /></td>
				</tr>
				<tr height="2"><td></td></tr>
				
				<tr>
					<td align="right"> <b> DNI </b> </td><td align="left"><input name="dni" type="number"  id="dni" value="<?=$row->DNI?>"  size="15" class="textbox" align="right" /></td>
				</tr>
				<tr height="2"><td></td></tr>
				
				<tr>
					<td align="right"> <b> Localidad </b> </td><td align="left"><input name="localidad" type="text"  id="localidad" value="<?=$row->Localidad?>"  size="30" class="textbox" align="right" /></td>
				</tr>
				<tr height="2"><td></td></tr>
				
				<tr>
					<td align="right"> <b> Dirección </b> </td><td align="left"><input name="direccion" type="text"  id="direccion" value="<?=$row->Direccion?>"  size="30" class="textbox" align="right" /></td>
				</tr>
				<tr height="2"><td></td></tr>
				
				<tr>
					<td align="right"> <b> Teléfono </b> </td><td align="left"><input name="telefono" type="number"  id="telefono" value="<?=$row->Telefono?>"  size="20"class="textbox"  align="right" /></td>
				</tr>
				<tr height="2"><td></td></tr>
				<tr height="2"><td></td></tr>
		</table>
				
		<br>
		<br>
		
		<center>
			 <input name="modificar cliente" type="submit" class="button" value="MODIFICAR CLIENTE" />
			 <input type="hidden" name="selectbuscarpor" value="<?=$_GET['selectbuscarpor']?>">
			 <input type="hidden" name="buscarpor" value="<?=$_GET['buscarpor']?>">
			 <input name="cancelar" type="button" class="button" onclick="javascript:location.href='buscacliente.php?selectbuscarpor=<?=$_GET['selectbuscarpor']?>&buscarpor=<?=$_GET['buscarpor']?>';" value="CANCELAR"> 
		
					
		</center>
		
		
	</form>
				
	
	</div>

	


</Body>
</Html>