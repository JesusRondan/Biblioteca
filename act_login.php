<? include ('conectar.php')?>
<?
$usuario = $_REQUEST['usuario'];
$password = $_REQUEST['password'];
$rs_login = mysql_query("SELECT * FROM usuarios WHERE email = '$usuario' ");
//echo $rs_login;
if (mysql_num_rows($rs_login) != 1){
	$m="El Usuario y la Contraseña no coinciden. Intente nuevamente";
	//header("location:acceso.php?m=$m");
	header("location:acceso.php?m=errscup");
	exit();
}
$row_login = mysql_fetch_object($rs_login);
if ($row_login->contrasena != $password){
	$m="El Usuario y la Contraseña no coinciden. Intenten nuevamente  $sql";
	 header("location:acceso.php?m=errscup");
	$_SESSION['autenticado']=false;
	exit();
}
$_SESSION['usuario'] = $row_login->idusuario;
$_SESSION['email'] = $row_login->email;
$_SESSION['password'] = $row_login->contrasena;
$_SESSION['autenticado']=true;
$_SESSION['tipos_Idtipo'] = $row_login->tipos_Idtipo;
$tipo=$row_login->tipos_Idtipo;


switch ($tipo) {
    case 0://usuario deshabilitado
			$m="El usuario está temporalmente deshabilitado. Comuníquese con el adminstrador del sistema";
			header("location:acceso.php?m=errudt");
			session_destroy();
			exit();
        break;
    case 1:
			header("location:iniciobiblio.php") ;
        
		break;
		}
?>