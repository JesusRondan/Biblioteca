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
<meta charset="utf-8">
<link href="estilo.css" rel="stylesheet" type="text/css" />
<script>
function formulario(f) { 
		if (f.buscarpor.value   == '') { alert ('No ha ingresado dato de busqueda');  
		f.buscarpor.focus(); return false; } 	 	 
	return true; } 
</script>
<title> Buscar Clientes </title>
</Head>
<Body onload="document.form.selectbuscarpor.value='<?=(isset($_REQUEST['selectbuscarpor']))?$_REQUEST['selectbuscarpor']:$_POST['selectbuscarpor']?>'" style="background-image:url('img/bibliotecas.jpg'); background-repeat:repeat; background-position:top center">
<?php include("i_menubiblioteca.php"); ?>
<br>
<br>
<br>

<div id="titulo">BUSCAR CLIENTES</div> 
<br>
<br>
<br>

	<div id="contenedor_formulario">
	<br>


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
	
	<form action="buscacliente.php" onsubmit="return formulario(this)" method="post" name="form" id="form">
	 <b>Buscar por DNI o Apellido </b> <p align="left">
	 <select name="selectbuscarpor" class="textbox">
		 <option <?php echo $C01; ?> value="C01">DNI</option>
		 <option <?php echo $C02; ?> value="C02">Apellido</option>
									  
	</select>	
	<?php if ( isset($_POST['buscarpor']) && $_POST['buscarpor'] != '' ) { ?>
							<input type="text" name="buscarpor" id="buscarpor" size="15" class="textbox" value='<?php echo  $_POST['buscarpor']; ?>'>
						<?php } else if ( isset($_REQUEST['buscarpor']) && $_REQUEST['buscarpor'] != '' ){ ?>
							<input type="text" name="buscarpor" id="buscarpor" size="15" class="textbox" value='<?php echo  $_REQUEST['buscarpor']; ?>'>
						<?php }  else { ?>
							<input type="text" name="buscarpor" id="buscarpor" size="15" class="textbox">
						<?php } ?></td>
	<input class="button" type="submit" value="BUSCAR CLIENTE" size="12">
	</p>
	</form>
	
	<br>
	<br>
	

		
				<table border="0" width="90%" cellpadding="10" cellspacing="0">
							<tr bgcolor="#CCEEFF" >
								<td width="15%"> <center> <b> Cliente </b> </center> </td>
								<td width="15%"> <center> <b> DNI </b> </center> </td>      
								<td width="15%"> <center> <b> Localidad </b> </center> </td>
								<td width="15%"> <center> <b> Domicilio </b> </center> </td>
								<td width="15%"> <center> <b> Telefono </b> </center> </td>
								<td width="15%"> <center> <b> Opciones </b> </center> </td>
								</tr>
			</table>
			
			<div class="scrolling-table-container">
		
				<table border="0" width="90%" cellpadding="10" cellspacing="0">
								
								<?php 
								
									$consultaRealizada = false;
									if ( isset($_REQUEST['buscarpor']) || (isset($_POST['buscarpor']) && $_POST['buscarpor'] != '' ))  {
									
										if ( isset($_REQUEST['buscarpor'])) {
											$busqueda = $_REQUEST['buscarpor'];
										}
										else if (isset($_POST['buscarpor'])) {
											$busqueda = $_POST['buscarpor']; 
										}

									if ( isset($_REQUEST['buscarpor']) && $_REQUEST['buscarpor'] != '' ) {		
									
									if ( $_REQUEST['selectbuscarpor'] == 'C01' ) {
										
											$dni = $_REQUEST['buscarpor']; 
											if (!is_numeric($dni)) {
											echo "<br>";
											echo "<br>";
											echo "Escriba solo numeros para DNI";
											echo "<br>";
											echo "<br>";
											exit();
											}  
											$result = mysql_query("select * FROM cliente WHERE DNI = " . $dni);
											$consultaRealizada = true;
									} else {
										$result = mysql_query("select * FROM cliente WHERE Apellido like '" . $busqueda . "%' ORDER BY Apellido");
										$consultaRealizada = true;
									}
									
									}
									
									if ( isset($_POST['buscarpor']) && $_POST['buscarpor'] != '' ) {
									if ( $_POST['selectbuscarpor'] == 'C01' ) {
										
											$dni = $_POST['buscarpor']; 
											if (!is_numeric($dni)) {
											echo "<br>";
											echo "<br>";
											echo "Escriba solo numeros para DNI";
											echo "<br>";
											echo "<br>";
											exit();
											}  
											$result = mysql_query("select * FROM cliente WHERE DNI = " . $dni);
											$consultaRealizada = true;
									} else {
										$result = mysql_query("select * FROM cliente WHERE Apellido like '" . $busqueda . "%' ORDER BY Apellido");
										$consultaRealizada = true;
									}
									
									}
									
									
									if ( $consultaRealizada == true ) {
										While ($fila = mysql_fetch_assoc($result)) {
									
									echo '<tr>';
									echo '<td width="15%"> <center>' .$fila['Apellido']. ', ' .$fila['Nombre']. ' </center></td>';
									echo '<td width="15%"> <center>' .$fila['DNI']. '</center></td>';
									echo '<td width="15%"> <center>' .$fila['Localidad']. '</center></td>';
									echo '<td width="15%"> <center>' .$fila['Direccion']. '</center></td>';
									echo '<td width="15%"> <center>' .$fila['Telefono']. '</center></td>';
									echo '<td width="13%"> <center> <a href="modificacliente.php?idcliente='.$fila['idcliente'].'&selectbuscarpor='.$_REQUEST['selectbuscarpor'].'&buscarpor='.$_REQUEST['buscarpor'].' "> <img src="img/icono-mod.png"> </a> </center> </td> ';
									echo '</tr>';
							     }
								 }
								 }
							   ?>
								
							</tr>
				</table>
				
			</div>

	</div>


</body>
</Html>