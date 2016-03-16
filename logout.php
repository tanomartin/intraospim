<?php
session_save_path("sesiones");
session_start();
if ($_SESSION['aut'] != "pepe") {
	session_unset();
	session_destroy();
	header ("Location: index.php");
} else {
	$_SESSION['delcod']= $_SESSION['delori'];
	$_SESSION['aut'] = 'pepepascual';
	header ("Location: menuControl.php");
}
?>