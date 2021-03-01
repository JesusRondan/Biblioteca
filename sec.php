<?
//controlo los carteles de error de login.
if (isset($_SESSION['email'])){?>
	<font color="green">  Usuario: <?=$_SESSION['email']?> </font>
<? }?>

<?
$m = (isset($_REQUEST['m']))?$_REQUEST['m']:"";
if($m != ""){
?>
<br /><br />
<div class="alert" id="error"><?=$m?></div>
<? } ?>
<? 