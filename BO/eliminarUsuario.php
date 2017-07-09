<?php
        require_once '../EasyPDO/conexionPDO.php';
        $fecha_actual=date("Y-m-d H:i:s");
        
         // valida que todos los datos sean recibidos correctamente
        if(!isset($_GET['id'])) {
                $error="Ocurrio un problema con el usuario ingresado";
        }else{ 
                $id=$_GET['id'];
        }
        
        $db->prepare('delete FROM duralex.usuarios WHERE ID_USUARIO=:ID_USUARIO');
        $db->execute(
	array(
		':ID_USUARIO' => $id
	)
        );
        
        header("location: ../listarUsuarios.php"); 