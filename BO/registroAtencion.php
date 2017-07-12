<?php
        //require_once '../include/include_valida_session.php';
        require_once '../config.php';
        require_once '../EasyPDO/conexionPDO.php';
        $fecha_actual=date("Y-m-d H:i:s");
        
        //$id_usu=$_SESSION['id_cliente'];
        $error="";
        
         //   Imprimir parametros
        print_r($_POST);

         // valida que todos los datos sean recibidos correctamente
        if(!isset($_POST['sel2'])) {
                $error="Ocurrio un problema con el abogado";
        }else{
                $idAbogado=$_POST['sel2'];
        }

        if (!isset($_POST['sel3'])) {
                $error="Ocurrio un problema con el cliente";
        }else{
                $idCliente=$_POST['sel3'];
        }

        if (!isset($_POST['txtFecha'])) {
                $error="Ocurrio un problema con la fecha";
        }else{
                $fecha=$_POST['txtFecha'];
                
        }
        
        
        
        if (!isset($_POST['timepicker'])) {
                $error="Ocurrio un problema con la hora";
        }else{
                $hora=$_POST['timepicker'];
                $newDate = date("Y-m-d H:i:s", strtotime($fecha.' '.$hora));
        }
        echo $newDate;
        
        
        
        if($error !=""){
                echo $error; 
        }

        // fin validacion de datos recibidos
        if ($error=="") {
               $db->prepare("INSERT INTO ATENCIONES SET
                       FECHA_ATENCION=:FECHA_ATENCION,
                       VALOR=:VALOR,
                       ID_CLIENTE=:ID_CLIENTE,
                       ID_ABOGADO=:ID_ABOGADO,
                       ID_ESTADO=:ID_ESTADO"
                       ,true);
               $db->execute(array(
                       ':FECHA_ATENCION' => $newDate,
                       ':VALOR' => 0,
                       ':ID_CLIENTE' => $idCliente,
                       ':ID_ABOGADO' => $idAbogado,
                       ':ID_ESTADO' => 1          
               ));           
            header("location: ../listarAtenciones.php?res=1");
            }
?>
