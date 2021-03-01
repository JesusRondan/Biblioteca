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
<title> Inicio Biblioteca </title>
</Head>
<Body style="background-image:url('img/bibliotecas.jpg'); background-repeat:repeat; background-position:top center">

<?php include("i_menubiblioteca.php"); ?>
	

</Body>
</Html>