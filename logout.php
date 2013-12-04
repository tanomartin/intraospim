<?
session_save_path("sesiones");
session_start();
if ($_SESSION['aut'] != "pepe") {
	session_save_path("sesiones");
	session_start();
	session_unset();
	session_destroy();
	header ("Location: http://www.ospim.com.ar/intranet/logintranet.php");
} else {
		$_SESSION['delcod']= $_SESSION['delori'];
		$_SESSION['aut'] = 'pepepascual';
		header ("Location: http://www.ospim.com.ar/intranet/menuControl.php");
}
?>