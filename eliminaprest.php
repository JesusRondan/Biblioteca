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
</Head>

<Body style="background-image:url('img/bibliotecas.jpg'); background-repeat:repeat; background-position:top center">
		
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

				<?
				
				$registro1 = $_GET['selectbuscarpor'];
				$registro2 = $_GET['buscarpor'];
				
			   //echo $sql;
				
				$sSQL="Delete From prestamos Where Idprestado=" . $_GET['Idprestado'];
				mysql_query($sSQL);
				
				echo '<b> El Prestamo de Libro se elimino correctamente </b>';
				echo '<br>';
				echo '<br>';
				echo "<center> <a href='buscaprestamo.php?selectbuscarpor=".$registro1."&buscarpor=".$registro2."'> Volver </a> </center>";

				?>
			
			</div>
			
			</center>
			
</body>


</Html>
