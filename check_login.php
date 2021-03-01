<?
@session_start();

if($_SESSION['autenticado']==false){
				$m="No se ha autenticado correctamente en el sistema. Acceso no autorizado";
			header("location:index.php?m=$m");

}
?>