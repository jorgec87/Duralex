<?php
        require_once '../EasyPDO/conexionPDO.php';
        $fecha_actual=date("Y-m-d H:i:s");
        
             //   Imprimir parametros
        print_r($_GET);
         // valida que todos los datos sean recibidos correctamente
        if(!isset($_GET['id'])) {
                $error="Ocurrio un problema con el estado ingresado";
        }else{ 
                $id=$_GET['id'];
        }
        
                if(!isset($_GET['idAtencion'])) {
                $error="Ocurrio un problema con el id de atencion ingresado";
        }else{ 
                $idAtencion=$_GET['idAtencion'];
        }
        
        $db->prepare('UPDATE duralex.atenciones SET ID_ESTADO=:ID_ESTADO where ID_ATENCION=:ID_ATENCION');
        $db->execute(
	array(
		':ID_ESTADO' => $id,
                ':ID_ATENCION' => $idAtencion
	)
        );
        
        header("location: ../listarAtenciones.php?res=2"); 