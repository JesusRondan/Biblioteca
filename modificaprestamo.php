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
<title> Modifica Préstamo </title>
</Head>
<Body style="background-image:url('img/bibliotecas.jpg'); background-repeat:repeat; background-position:top center">
<?php include("i_menubiblioteca.php"); ?>
<br>
<br>
<br>

<div id="titulo">MODIFICAR PRÉSTAMO</div> 

<br>
<br>
<br>

<?
				$Idprestado = (isset($_REQUEST['Idprestado']))?$_REQUEST['Idprestado']:0;
                $sql = "SELECT p.Alta, p.cliente_idcliente as cliente_idcliente, l.Titulo as Titulo, c.Apellido as CApellido, c.Nombre as CNombre, Fechaprestado, Fechadevolucion FROM prestamos as p, cliente as c, libros as l";
				$sql .= " WHERE p.cliente_idcliente = c.idcliente";
				$sql .= " AND p.libros_idlibro = l.idlibro";
				$sql .= " AND p.Idprestado = " . $_GET['Idprestado'];
				$rs = mysql_query($sql);
				$row = mysql_fetch_object($rs);

 ?>
 
 <div id="contenedor_formulario3">
 
	<br>	
	<br>
	
	<strong> Apellido y Nombre: <?php echo $row->CApellido . ', ' . $row->CNombre; ?></strong>
	<br>	
	<br>
	<strong> Título: <?php echo $row->Titulo; ?></strong>
	<br>
	<br>
	<br>
	
    <form action="mod_pre.php" method= "post">
		<input type="hidden" value="<?=$Idprestado?>" name="Idprestado" />
		<table border="0">
			<tr>
				<td> <center> <b> Fecha Prest. </b> </center> </td>
				<td> <center> <b> Fecha Dev. </b> </center> </td>
				<td> <center> <b> Alta </b> </center> </td>
			</tr>
			<tr>
				<td> <input type="date" name="fechapre" id="fechapre" value="<?=$row->Fechaprestado?>" size="12" class="textbox"> </td>
				<td> <input type="date" name="fechadev" id="fechadev" value="<?=$row->Fechadevolucion?>" size="12" class="textbox"> </td>
				<td> <input name="destacada" type="checkbox"  id="destacada" <?php if ($row->Alta=='on'){echo 'checked="checked"';} ?> size="12" class="textbox"> </td>
			</tr>
		</table>
		
	<br>	
    <br>

	<center>
		 <input name="modificar prestamo" class="button" type="submit" value="MODIFICAR PRESTAMO" size="12" class="textbox" />
		 <input type="hidden" name="selectbuscarpor" value="<?=$_GET['selectbuscarpor']?>">
		 <input type="hidden" name="buscarpor" value="<?=$_GET['buscarpor']?>">
		 <input name="cancelar" type="button" class="button" onclick="javascript:location.href='buscaprestamo.php?selectbuscarpor=<?=$_GET['selectbuscarpor']?>&buscarpor=<?=$_GET['buscarpor']?>';" value="CANCELAR">
		 
		 
	</center>
		 
	</form>
	   
<br>

 
 </div>

 
 
</Body>
</Html>