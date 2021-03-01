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
<title> Buscar Libros </title>
</Head>
<Body onload="document.form.selectbuscarpor.value='<?=(isset($_REQUEST['selectbuscarpor']))?$_REQUEST['selectbuscarpor']:$_POST['selectbuscarpor']?>'" style="background-image:url('img/bibliotecas.jpg'); background-repeat:repeat; background-position:top center">
<?php include("i_menubiblioteca.php"); ?>
<br>
<br>
<br>

<div id="titulo">BUSCAR LIBROS</div> 

<br>
<br>
<br>
	
		<div id="contenedor_formulario2">
<?php
$seleccionado=isset($_POST['selectbuscarpor'])?$_POST['selectbuscarpor']:"";
$C01="";
$C02="";
$C03="";
$C04="";
$C05="";
$C06="";

switch ($seleccionado) {
    case 'CO1':
			$C01='selected';
        break;
    case 'CO2':
			$C02='selected';
        break;
	case 'C03':
			$C03='selected';
        break;
	case 'C04':
			$C04='selected';
        break;
    case 'C05':
			$C05='selected';
        break;
    case 'C06':
			$C06='selected';
        break;		

		}
?>
		
		<form action="buscalibro.php" method="post" id="busca">
			<b>Buscar por: </b> <p align="left">
					<select name="selectbuscarpor" class="textbox">
						<option <?php echo $C01; ?> value="C01">ISBN</option>
						<option <?php echo $C02; ?> value="C02">Titulo</option>
						<option <?php echo $C03; ?> value="C03">Autor</option>
						<option <?php echo $C04; ?> value="C04">Editorial</option>
						<option <?php echo $C05; ?> value="C05">Materia</option>
						<option <?php echo $C06; ?> value="C06">Forma de Adq.</option>
					</select>	
					
					<?php if ( isset($_POST['buscarpor']) && $_POST['buscarpor'] != '' ) { ?>
										<input type="text" name="buscarpor" id="buscarpor" size="15" class="textbox" value='<?php echo  $_POST['buscarpor']; ?>'>
									<?php } else if ( isset($_REQUEST['buscarpor']) && $_REQUEST['buscarpor'] != '' ){ ?>
										<input type="text" name="buscarpor" id="buscarpor" size="15" class="textbox" value='<?php echo  $_REQUEST['buscarpor']; ?>'>
									<?php }  else { ?>
										<input type="text" name="buscarpor" id="buscarpor" size="15" class="textbox">
									<?php } ?></td>
										<input class="button" type="submit" value="BUSCAR LIBRO" size="12">
										</p>
	</form>
				<br>
				<br>
				
				<table border="0" width="91%" cellpadding="10" cellspacing="0">
					<tr bgcolor="#CCEEFF" >
							<td width="13%"> <center> <b> Codigo </b> </center> </td>
							<td width="13%"> <center> <b> ISBN </b> </center> </td>
							<td width="13%"> <center> <b> Titulo </b> </center> </td>       
							<td width="13%"> <center> <b> Editorial </b> </center> </td>
							<td width="13%"> <center> <b> Materia </b> </center> </td>
							<td width="13%"> <center> <b> Forma de Adq. </b> </center> </td>
							<td width="13%"> <center> <b> Opciones </b> </center> </td>
							 
						</tr>
						
			  </table>
						<div class="scrolling-table-container">
			
			<table border="0" width="91%" cellpadding="10" cellspacing="0">
						
						<?php 
						
									$consultaRealizada = false;
									 if ( isset($_REQUEST['buscarpor']) || (isset($_POST['buscarpor']) && $_POST['buscarpor'] != '' )){
										 
										 if ( isset($_REQUEST['buscarpor'])) {
											$busqueda = $_REQUEST['buscarpor'];
										}
										else if (isset($_POST['buscarpor'])) {
											$busqueda = $_POST['buscarpor']; 
										}
										
										if ( isset($_REQUEST['buscarpor']) && $_REQUEST['buscarpor'] != '' ) {
										 
										if ( $_REQUEST['selectbuscarpor'] == 'C01' ) {
										
											$isbn = $_REQUEST['buscarpor']; 
											if (!is_numeric($isbn)) { 
											echo "<br>";
											echo "<br>";
											echo "<br>";
											echo "Escriba solo numeros para ISBN";
											exit();
											}  
											$result = mysql_query("select * FROM libros as p INNER JOIN formaadq as c ON p.formaadq_Idforma = c.Idforma INNER JOIN materialibros as a ON p.materialibros_Idmateria = a.Idmateria WHERE Isbn = " . $_REQUEST['buscarpor']);
											$consultaRealizada = true;
										} elseif ( $_REQUEST['selectbuscarpor'] == 'C02' ) {
											$result = mysql_query("select * FROM libros as p INNER JOIN formaadq as c ON p.formaadq_Idforma = c.Idforma INNER JOIN materialibros as a ON p.materialibros_Idmateria = a.Idmateria WHERE Titulo like '" . $_REQUEST['buscarpor'] . "%'");
											$consultaRealizada = true;
										} elseif ( $_REQUEST['selectbuscarpor'] == 'C03' ) {
											$result = mysql_query("select * FROM libros as p INNER JOIN formaadq as c ON p.formaadq_Idforma = c.Idforma INNER JOIN materialibros as a ON p.materialibros_Idmateria = a.Idmateria WHERE Autor like '" . $_REQUEST['buscarpor'] . "%'");
											$consultaRealizada = true;
										} elseif ( $_REQUEST['selectbuscarpor'] == 'C04' ) {
											$result = mysql_query("select * FROM libros as p INNER JOIN formaadq as c ON p.formaadq_Idforma = c.Idforma INNER JOIN materialibros as a ON p.materialibros_Idmateria = a.Idmateria WHERE Editorial like '" . $_REQUEST['buscarpor'] . "%'");
											$consultaRealizada = true;
										} elseif ( $_REQUEST['selectbuscarpor'] == 'C05' ) {
											$result = mysql_query("select * FROM libros as p INNER JOIN formaadq as c ON p.formaadq_Idforma = c.Idforma INNER JOIN materialibros as a ON p.materialibros_Idmateria = a.Idmateria WHERE Materia like '" . $_REQUEST['buscarpor'] . "%'");
											$consultaRealizada = true;
										} elseif ( $_REQUEST['selectbuscarpor'] == 'C06' ) {
											$result = mysql_query("select * FROM libros as p INNER JOIN formaadq as c ON p.formaadq_Idforma = c.Idforma INNER JOIN materialibros as a ON p.materialibros_Idmateria = a.Idmateria WHERE Formaadq like '" . $_REQUEST['buscarpor'] . "%'");
											$consultaRealizada = true;
										}
										
										}
										
										
										if ( isset($_POST['buscarpor']) && $_POST['buscarpor'] != '' ) {
										 
										if ( $_POST['selectbuscarpor'] == 'C01' ) {
										
											$isbn = $_REQUEST['buscarpor']; 
											if (!is_numeric($isbn)) { 
											echo "Escriba solo numeros para ISBN";
											echo "<br>";
											echo "<br>";
											exit();
											}  
											$result = mysql_query("select * FROM libros as p INNER JOIN formaadq as c ON p.formaadq_Idforma = c.Idforma INNER JOIN materialibros as a ON p.materialibros_Idmateria = a.Idmateria WHERE Isbn = " . $_POST['buscarpor']);
											$consultaRealizada = true;
										} elseif ( $_POST['selectbuscarpor'] == 'C02' ) {
											$result = mysql_query("select * FROM libros as p INNER JOIN formaadq as c ON p.formaadq_Idforma = c.Idforma INNER JOIN materialibros as a ON p.materialibros_Idmateria = a.Idmateria WHERE Titulo like '" . $_POST['buscarpor'] . "%'");
											$consultaRealizada = true;
										} elseif ( $_POST['selectbuscarpor'] == 'C03' ) {
											$result = mysql_query("select * FROM libros as p INNER JOIN formaadq as c ON p.formaadq_Idforma = c.Idforma INNER JOIN materialibros as a ON p.materialibros_Idmateria = a.Idmateria WHERE Autor like '" . $_POST['buscarpor'] . "%'");
											$consultaRealizada = true;
										} elseif ( $_POST['selectbuscarpor'] == 'C04' ) {
											$result = mysql_query("select * FROM libros as p INNER JOIN formaadq as c ON p.formaadq_Idforma = c.Idforma INNER JOIN materialibros as a ON p.materialibros_Idmateria = a.Idmateria WHERE Editorial like '" . $_POST['buscarpor'] . "%'");
											$consultaRealizada = true;
										} elseif ( $_POST['selectbuscarpor'] == 'C05' ) {
											$result = mysql_query("select * FROM libros as p INNER JOIN formaadq as c ON p.formaadq_Idforma = c.Idforma INNER JOIN materialibros as a ON p.materialibros_Idmateria = a.Idmateria WHERE Materia like '" . $_POST['buscarpor'] . "%'");
											$consultaRealizada = true;
										} elseif ( $_POST['selectbuscarpor'] == 'C06' ) {
											$result = mysql_query("select * FROM libros as p INNER JOIN formaadq as c ON p.formaadq_Idforma = c.Idforma INNER JOIN materialibros as a ON p.materialibros_Idmateria = a.Idmateria WHERE Formaadq like '" . $_POST['buscarpor'] . "%'");
											$consultaRealizada = true;
										}
										
										}
									
									
									if ( $consultaRealizada == true ) {
											While ($fila = mysql_fetch_assoc($result)) {
											
											echo '<tr>';
											echo '<td width="13%"> <center>' .$fila['idlibro']. '</center></td>';
											echo '<td width="13%"> <center>' .$fila['Isbn']. '</center></td>';
											echo '<td width="13%"> <center>' .$fila['Titulo']. '</center></td>';
											echo '<td width="13%"> <center>' .$fila['Editorial']. '</center></td>';
											echo '<td width="13%"> <center>' .$fila['Materia']. '</center></td>';
											echo '<td width="13%"> <center>' .$fila['Formaadq']. '</center></td>';
											echo '<td width="13%"> <center> <a href="modificalibro.php?idlibro='.$fila['idlibro'].'&idmateria='.$fila['Idmateria'].'&selectbuscarpor='.$_REQUEST['selectbuscarpor'].'&buscarpor='.$_REQUEST['buscarpor'].' "> <img src="img/icono-mod.png"> </a> </center> </td> ';
											echo '</tr>';
									 }
									}
							   }
							 
							?>
						
				</table>
				
				</div>
				
		</div>



</body>
</html>