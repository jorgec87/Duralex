<?php
	// DATABASE LOCALHOST
	$conf['db_hostname'] = "localhost";
	$conf['db_username'] = "root";
        $conf['db_password'] = "1234"; 
	$conf['db_name'] = "anuncios_beta";
        
        // CORREO 
        $conf['email'] = "avisos.clasificados.g@gmail.com";
        $conf['email_password'] = "avisos2017";
        
        
        // RUTA PATH DEL SERVIDOR
        $puerto =80;
        $server ='http://localhost:'.$puerto.'/AvisosClasificados/';
        
        $conf['name_server'] = $server;
        
        // NUMERO AVISOS X PAGINA -> PAGINACION
        $conf['numero_pag'] = 2;

        //RUTA PATH DONDE SE GUARDAN LAS IMAGENES
	$conf['path_files'] = "C:/xampp/htdocs/AvisosClasificados/img_avisos";
        
        
        
        
        
        
        
        

?>