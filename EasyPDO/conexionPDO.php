<?php  
        require_once $_SERVER['DOCUMENT_ROOT'].'/AvisosClasificados/EasyPDO/EasyDB.php';
        require_once $_SERVER['DOCUMENT_ROOT'].'/AvisosClasificados/config.php';
        
	$db = new EasyDB($conf['db_hostname'],$conf['db_username'],$conf['db_password'],$conf['db_name']);

?>