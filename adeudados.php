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
<title> Libros Adeudados </title>
</Head>
<Body style="background-image:url('img/bibliotecas.jpg'); background-repeat:repeat; background-position:top center">
<?php include("i_menubiblioteca.php"); ?>
<br>
<br>
<br>

<div id="titulo">LIBROS ADEUDADOS</div> 

<br>
<br>
<br>

<div id="contenedor_formulario">
<br>
				<table border="0" width="84%" cellpadding="10" cellspacing="0" align="center">
						<tr bgcolor="#CCEEFF" >
							<td width="14%"> <center> <b> Apellido </b> </center> </td>
							<td width="14%"> <center> <b> Nombre </b> </center> </td>
							<td width="14%"> <center> <b> Teléfono </b> </center> </td>
							<td width="14%"> <center> <b> Título </b> </center> </td>
							<td width="14%"> <center> <b> Fecha Pres. </b> </center> </td>
							<td width="14%"> <center> <b> Fecha Dev. </b> </center> </td>	 
						</tr>
				</table>
				
				<div class="scrolling-table-container">
	
					<table border="0" width="84%" cellpadding="10" cellspacing="0" align="center">
						
						<?php 
								
							$sql = "SELECT p.*, c.Apellido as Apellido, c.Nombre as Nombre, c.Telefono as Telefono, l.Titulo as Titulo FROM prestamos as p INNER JOIN cliente as c ON p.cliente_idcliente = c.idcliente INNER JOIN libros as l ON p.libros_idlibro = l.idlibro WHERE p.Alta != '' ORDER BY p.Idprestado DESC ";
																		 
										$result = mysql_query($sql);
										
										While ($fila = mysql_fetch_assoc($result)) {
										
											$fecha1= $fila['Fechaprestado'];
											$fecha2=date("d-m-Y",strtotime($fecha1));
											$fecha3= $fila['Fechadevolucion'];
											$fecha4=date("d-m-Y",strtotime($fecha3));
											
											echo '<tr>';
											echo '<td width="14%"> <center>' .$fila['Apellido']. '</center></td>';
											echo '<td width="14%"> <center>' .$fila['Nombre']. '</center></td>';
											echo '<td width="14%"> <center>' .$fila['Telefono']. '</center></td>';
											echo '<td width="14%"> <center>' .$fila['Titulo']. '</center></td>';
											echo '<td width="14%"> <center>' .$fecha2. '</center></td>';
											echo '<td width="14%"> <center>' .$fecha4. '</center></td>';
											echo '</tr>';
											
										 }
										
											
						
						
						
						
						
						
						?>
															
				</table>
				
			</div>
<br> 
<br>
<br>

			<?
				$mipeticion = mysql_query("SELECT COUNT(Idprestado) FROM prestamos where Alta = 'on' ");

					//lo mostramos con un while 

					while($perfil = mysql_fetch_array($mipeticion))
					{
					echo '<b> CANTIDAD DE LIBROS ADEUDADOS:' .$perfil['COUNT(Idprestado)']. '</b>' ;
					}
			?>

<br>
<br>
</div>

</body>

</Html>