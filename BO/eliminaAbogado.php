<?php
        require_once '../EasyPDO/conexionPDO.php';
        $fecha_actual=date("Y-m-d H:i:s");
        
         // valida que todos los datos sean recibidos correctamente
        if(!isset($_GET['id'])) {
                $error="Ocurrio un problema con el abogado ingresado";
        }else{ 
                $id=$_GET['id'];
        }
        
        $db->prepare('delete FROM duralex.abogados WHERE ID_ABOGADO=:ID_ABOGADO');
        $db->execute(
	array(
		':ID_ABOGADO' => $id
	)
        );
        
        header("location: ../listarAbogados.php"); 
