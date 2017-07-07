<?php
  
    session_start();
   if (!isset($_SESSION['id_cliente'])) {
		// Direccion a la pagina de inicio
		header('Location: index.php');
		// Fin redireccionamiento
	}
?>