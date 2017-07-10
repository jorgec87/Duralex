<?php 
	require_once '../EasyPDO/conexionPDO.php';

	session_start();
	
	session_destroy(); 

	header("location: ../login.php");
        
?>