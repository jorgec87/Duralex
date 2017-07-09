<?php
        //require_once '../include/include_valida_session.php';
 
        require_once '../EasyPDO/conexionPDO.php';
        $fecha_actual=date("Y-m-d");
        
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
        
        if (!isset($_POST['txtDireccion'])) {
                $error="Ocurrio un problema con la direccion";
        }else{
                $direccion =$_POST['txtDireccion'];
        }       
        

        if (!isset($_POST['txtTelefono'])) {
                $error="Ocurrio un problema con el elefono";
        }else{
                $telefono=$_POST['txtTelefono'];
        }    
        
         if (!isset($_POST['rdoTipo'])) {
                $error="Ocurrio un problema con el tipo de persona";
        }else{
                $tipo=$_POST['rdoTipo'];
        }  
        
        
        if($error !=""){
                echo $error; 
        }

  
        // fin validacion de datos recibidos
        if ($direccion !="") {
            
               $db->prepare("INSERT INTO duralex.clientes SET
                       RUT_CLIENTE=:RUT_CLIENTE,
                       NOMBRE_CLI=:NOMBRE_CLI,
                       APELLIDOP_CLI=:APELLIDOP_CLI,
                       APELLIDOM_CLI=:APELLIDOM_CLI,
                       FECHA_REGISTRO=:FECHA_REGISTRO,
                       DIRECCION=:DIRECCION,
                       TELEFONO=:TELEFONO,
                       TIPO_PERSONA=:TIPO_PERSONA
                       "
                       
                       ,true);
               
               $db->execute(array(
                       ':RUT_CLIENTE' => $rut,
                       ':NOMBRE_CLI' => $nombre,
                       ':APELLIDOP_CLI' => $apellidoP,
                       ':APELLIDOM_CLI' => $apellidoM,
                       ':FECHA_REGISTRO' => $fecha_actual, 
                       ':DIRECCION' => sha1($direccion),
                       ':TELEFONO' => $telefono,
                       ':TIPO_PERSONA' => $tipo 
               ));       
               
              header("location: ../listarClientes.php"); 
            }else{
                $db->prepare("INSERT INTO duralex.clientes SET
                       RUT_CLIENTE=:RUT_CLIENTE,
                       NOMBRE_CLI=:NOMBRE_CLI,
                       APELLIDOP_CLI=:APELLIDOP_CLI,
                       APELLIDOM_CLI=:APELLIDOM_CLI,
                       FECHA_REGISTRO=:FECHA_REGISTRO,
                       TELEFONO=:TELEFONO,
                       TIPO_PERSONA=:TIPO_PERSONA
                       "
                       
                       ,true);
               
               $db->execute(array(
                       ':RUT_CLIENTE' => $rut,
                       ':NOMBRE_CLI' => $nombre,
                       ':APELLIDOP_CLI' => $apellidoP,
                       ':APELLIDOM_CLI' => $apellidoM,
                       ':FECHA_REGISTRO' => $fecha_actual,
                       ':TELEFONO' => $telefono,
                       ':TIPO_PERSONA' => $tipo 
               ));       
               
              header("location: ../listarClientes.php"); 
            }
?>