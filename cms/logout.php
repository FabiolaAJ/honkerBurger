<?php 
// codigo para a quebra de sessão do usario
	session_start();
	session_destroy();
	session_unset();
	session_write_close();
	
	header('location:../index.php');

?>