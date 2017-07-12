<?php
        require_once '../EasyPDO/conexionPDO.php';
        $fecha_actual=date("Y-m-d H:i:s");
        
         // valida que todos los datos sean recibidos correctamente
        if(!isset($_GET['id'])) {
                $error="Ocurrio un problema con el cliente ingresado";
        }else{ 
                $id=$_GET['id'];
        }
        
        $db->prepare('delete FROM duralex.clientes WHERE ID_CLIENTE=:ID_CLIENTE');
        $db->execute(
	array(
		':ID_CLIENTE' => $id
	)
        );
        
        header("location: ../listarClientes.php?res=2"); 