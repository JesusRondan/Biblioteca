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
<title> Modificar Materia </title>
</Head>
<Body style="background-image:url('img/bibliotecas.jpg'); background-repeat:repeat; background-position:top center">
<?php include("i_menubiblioteca.php"); ?>
	
<br>
<br>
<br>

<div id="titulo"> MODIFICAR MATERIA </div> 

<br>
<br>
<br>

<?
				$Idmateria = (isset($_REQUEST['Idmateria']))?$_REQUEST['Idmateria']:0;
                $sql = "SELECT * FROM materialibros where Idmateria=$Idmateria ";
                $rs = mysql_query($sql);
				$row = mysql_fetch_object($rs);

 ?>
 
<div id="contenedor_formulario3">

	<form action="mod_matbib.php" method= "post">
				
		 
	<br>
	<br>
	
	<center> <b> Materia </b>
	<input type="hidden" value="<?=$Idmateria?>" name="Idmateria" />
	<input type="text" name="agrmat" id="agrmat" value="<?=$row->Materia?>"  size="20" class="textbox"> 
	
	<br>
	<br>
	<br>
	
	<input name="modificar alumno" type="submit" class="button" value="MODIFICAR MATERIA" />
	<input name="cancelar" type="button" class="button" onclick="javascript:location.href='materiasbib.php';" value="CANCELAR"  /> </center>
		
	</form>

    
	</div>
	


</Body>
</Html>
