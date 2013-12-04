<? session_save_path("sesiones");
session_start();
$_SESSION['delori'] = $_SESSION['delcod'];
$_SESSION['delcod'] = "$dele";
$_SESSION['aut'] = 'pepe';
header ('location:menu.php');	
?>