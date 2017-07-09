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
        if(!isset($_POST['txtNombre'])) {
                $error="Ocurrio un problema con el nombre";
        }else{
                $nombre=$_POST['txtNombre'];
        }

        if (!isset($_POST['txtApellidoP'])) {
                $error="Ocurrio un problema con el apellido paterno";
        }else{
                $apellidoP=$_POST['txtApellidoP'];
        }

        if (!isset($_POST['txtApellidoM'])) {
                $error="Ocurrio un problema con el apellido materno";
        }else{
                $apellidoM=$_POST['txtApellidoM'];
        }

        if (!isset($_POST['txtRut'])) {
                $error="Ocurrio un problema con el rut";
        }else{
                $rut=$_POST['txtRut'];
        }

        if (!isset($_POST['txtEspecialidad'])) {
                $error="Ocurrio un problema con la especialidad";
        }else{
                $especialidad=$_POST['txtEspecialidad'];
        }       
        
        if (!isset($_POST['txtValor'])) {
                $error="Ocurrio un problema con el valor";
        }else{
                $valor=$_POST['txtValor'];
        }
        
                if (!isset($_POST['txtFechaContrato'])) {
                $error="Ocurrio un problema con la fecha";               
        }else{
                $fecha=$_POST['txtFechaContrato'];
                $newDate = date("y-m-d", strtotime($fecha));
        }
        if($error !=""){
                echo $error; 
        }

        // fin validacion de datos recibidos
        if ($error=="") {
               $db->prepare("INSERT INTO abogados SET
                       RUT_ABOGADO=:RUT_ABOGADO,
                       NOMBRE_ABO=:NOMBRE_ABO,
                       APELLIDOP_ABO=:APELLIDOP_ABO,
                       APELLIDOM_ABO=:APELLIDOM_ABO,
                       FECHA_CONTRATO=:FECHA_CONTRATO,
                       ESPECIALIDAD=:ESPECIALIDAD,
                       VALOR_X_HORA=:VALOR_X_HORA"
                       ,true);
               $db->execute(array(
                       ':RUT_ABOGADO' => $rut,
                       ':NOMBRE_ABO' => $nombre,
                       ':APELLIDOP_ABO' => $apellidoP,
                       ':APELLIDOM_ABO' => $apellidoM,
                       ':FECHA_CONTRATO' => $newDate, 
                       ':ESPECIALIDAD' => $especialidad,
                       ':VALOR_X_HORA' => $valor          
               ));           
           // header("location: ../index.php");
            }
?>