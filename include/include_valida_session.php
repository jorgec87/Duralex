<?php
  
    session_start();
   if (!isset($_SESSION['id_usuario'])) {
		// Direccion a la pagina de inicio
		header('Location: login.php');
		// Fin redireccionamiento
	}
?>