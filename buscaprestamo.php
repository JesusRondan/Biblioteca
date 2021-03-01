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
<script>
function confirmar()
{
	if(confirm('¿Estas seguro que desea eliminar Prestamo de Libro?'))
		return true;
	else
		return false;
}
</script>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<title> Buscar Préstamos de Libros </title>
<script>
        function Valida(formulario) {
		if (isNaN(parseInt(formulario.buscarpor.value))) {
            alert('La búsqueda mal realizada'); 
            return false;
          }   
          return true
          }
        </script>
</Head>
<Body style="background-image:url('img/bibliotecas.jpg'); background-repeat:repeat; background-position:top center">
<?php include("i_menubiblioteca.php"); ?>

<br>
<br>
<br>

<div id="titulo">BUSCAR PRÉSTAMOS DE LIBROS</div> 

<?php
	$seleccionado=isset($_POST['selectbuscarpor'])?$_POST['selectbuscarpor']:"";
	if($seleccionado=='C01'){
	$C01='selected';
	}else{
	$C01='';
	}
	if($seleccionado=='C02'){
	$C02='selected';
	}else{
	$C02='';
	}
	?>

<br>
<br>
<br>

	<div id="contenedor_formulario">
	
			<form action="buscaprestamo.php" method="post" onsubmit="return Valida(this);" id="busca">
			<b>Buscar por: </b> <p align="left">
					 <select name="selectbuscarpor" class="textbox">
						 <option <?php echo $C01; ?> value="C01">DNI</option>
						 <option <?php echo $C02; ?> value="C02">ISBN</option>
					</select>	
							<?php if ( isset($_POST['buscarpor']) && $_POST['buscarpor'] != '' ) { ?>
							<input type="text" name="buscarpor" id="buscarpor" size="15" class="textbox" value='<?php echo  $_POST['buscarpor']; ?>'>
						<?php } else if ( isset($_REQUEST['buscarpor']) && $_REQUEST['buscarpor'] != '' ){ ?>
							<input type="text" name="buscarpor" id="buscarpor" size="15" class="textbox" value='<?php echo  $_REQUEST['buscarpor']; ?>'>
						<?php }  else { ?>
							<input type="text" name="buscarpor" id="buscarpor" size="15" class="textbox">
						<?php } ?></td>
							<input class="button" type="submit" value="BUSCAR PRESTÁMOS" size="12">
							</p>
			</form>
		
		<br>
		<br>
	    <strong> PRÉSTAMOS DE LIBROS </strong>
		<br>
		<br>
				<table border="0" width="90%" cellpadding="10" cellspacing="0">
							<tr bgcolor="#CCEEFF" >
							
								<td width="15%"> <center> <b> Cliente </b> </center> </td>      
								<td width="15%"> <center> <b> Titulo </b> </center> </td>
								<td width="15%"> <center> <b> Fecha Prest </b> </center> </td>
								<td width="15%"> <center> <b> Fecha Dev </b> </center> </td>
								<td width="15%"> <center> <b> Modificar </b> </center> </td>
								<td width="15%"> <center> <b> Eliminar </b> </center> </td>
								
							</tr>

					</table>
					
					<div class="scrolling-table-container">

							<table border="0" width="90%"  cellpadding="10" cellspacing="0">
							
								<?php 
								
										
										$consultaRealizada = false;
										
										
										if ( isset($_REQUEST['buscarpor']) || (isset($_POST['buscarpor']) && $_POST['buscarpor'] != '' )) {
										
											
										if ( isset($_REQUEST['buscarpor'])) {
											$busqueda = $_REQUEST['buscarpor'];
										}
										else if (isset($_POST['buscarpor'])) {
											$busqueda = $_POST['buscarpor']; 
										}
										
										
										if ( isset($_REQUEST['buscarpor']) && $_REQUEST['buscarpor'] != '' ) {
										if ( $_REQUEST['selectbuscarpor'] == 'C01' ) {
																
										$sql = "SELECT p.*, c.Apellido as Apellido, c.Nombre as Nombre, c.Telefono as Telefono, l.Titulo as Titulo FROM prestamos as p INNER JOIN cliente as c ON p.cliente_idcliente = c.idcliente INNER JOIN libros as l ON p.libros_idlibro = l.idlibro WHERE c.DNI = " . $_REQUEST['buscarpor'];
										
											$result = mysql_query($sql);
																	
											$consultaRealizada = true;
										} elseif ( $_POST['selectbuscarpor'] == 'C02' ) {
											$sql = "SELECT p.*, c.Apellido as Apellido, c.Nombre as Nombre, c.Telefono as Telefono, l.Titulo as Titulo FROM prestamos as p INNER JOIN cliente as c ON p.cliente_idcliente = c.idcliente INNER JOIN libros as l ON p.libros_idlibro = l.idlibro WHERE l.Isbn = " . $_REQUEST['buscarpor'];
											$result = mysql_query($sql);
																		
											$consultaRealizada = true;

										}
										
										
										if ( isset($_POST['buscarpor']) && $_POST['buscarpor'] != '' ) {
										if ( $_POST['selectbuscarpor'] == 'C01' ) {
																
										$sql = "SELECT p.*, c.Apellido as Apellido, c.Nombre as Nombre, c.Telefono as Telefono, l.Titulo as Titulo FROM prestamos as p INNER JOIN cliente as c ON p.cliente_idcliente = c.idcliente INNER JOIN libros as l ON p.libros_idlibro = l.idlibro WHERE c.DNI = " . $_POST['buscarpor'];
										
											$result = mysql_query($sql);
																	
											$consultaRealizada = true;
										} elseif ( $_POST['selectbuscarpor'] == 'C02' ) {
											$sql = "SELECT p.*, c.Apellido as Apellido, c.Nombre as Nombre, c.Telefono as Telefono, l.Titulo as Titulo FROM prestamos as p INNER JOIN cliente as c ON p.cliente_idcliente = c.idcliente INNER JOIN libros as l ON p.libros_idlibro = l.idlibro WHERE l.Isbn = " . $_POST['buscarpor'];
											$result = mysql_query($sql);
																		
											$consultaRealizada = true;

										}
										
										}
										 
										if ( $consultaRealizada == true ) {
										
										While ($fila = mysql_fetch_assoc($result)) {
										
											$fecha1= $fila['Fechaprestado'];
											$fecha2=date("d-m-Y",strtotime($fecha1));
											$fecha3= $fila['Fechadevolucion'];
											$fecha4=date("d-m-Y",strtotime($fecha3));
											
											echo '<tr>';
											echo '<td width="15%"> <center>' .$fila['Apellido']. ', ' .$fila['Nombre']. '</center></td>';
											echo '<td width="15%"> <center>' .$fila['Titulo']. '</center></td>';
											echo '<td width="15%"> <center>' .$fecha2. '</center></td>';
											echo '<td width="15%"> <center>' .$fecha4. '</center></td>';
											echo '<td width="15%"> <center> <a href="modificaprestamo.php?Idprestado='.$fila['Idprestado'].'&selectbuscarpor='.$_REQUEST['selectbuscarpor'].'&buscarpor='.$_REQUEST['buscarpor'].'  "> <img src="img/icono-mod.png"> </a> </center> </td> ';
											echo '<td width="13%" > <center> <a href="eliminaprest.php?Idprestado='.$fila['Idprestado'].'&selectbuscarpor='.$_REQUEST['selectbuscarpor'].'&buscarpor='.$_REQUEST['buscarpor'].' " onclick="return confirmar()"> <img src="img/icono_eliminar.png"> </a> </center> </td> ';
											echo '</tr>';
											
										}
										
								}
							}
							
							}
							
							
									
							   ?>
								
							
				</table>
				</div>
				
	</div>



</body>
</html>