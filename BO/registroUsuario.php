<?php
        //require_once '../include/include_valida_session.php';
 
        require_once '../EasyPDO/conexionPDO.php';
        $fecha_actual=date("Y-m-d H:i:s");
        
        //$id_usu=$_SESSION['id_cliente'];
        $error="";
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
        
          if (!isset($_POST['txtPass'])) {
                $error="Ocurrio un problema con el txtPass";
        }else{
                $pass =$_POST['txtPass'];
        }       
        

        if (!isset($_POST['ddl_select_tipo'])) {
                $error="Ocurrio un problema con el tipo de susuario";
        }else{
                $tipo_usuario=$_POST['ddl_select_tipo'];
        }       
        
        
        if($error !=""){
                echo $error; 
        }

  
        // fin validacion de datos recibidos
        if ($error=="") {
            
               $db->prepare("INSERT INTO duralex.usuarios SET
                       RUT_USUARIO=:RUT_USUARIO,
                       NOMBRE_USER=:NOMBRE_USER,
                       APELLIDOP_USER=:APELLIDOP_USER,
                       APELLIDOM_USER=:APELLIDOM_USER,
                       CONTRASEÑA=:CONTRASENA,
                       ID_TIPO_USUARIO=:ID_TIPO_USUARIO
                       "
                       
                       ,true);
               
               $db->execute(array(
                       ':RUT_USUARIO' => $rut,
                       ':NOMBRE_USER' => $nombre,
                       ':APELLIDOP_USER' => $apellidoP,
                       ':APELLIDOM_USER' => $apellidoM,
                       ':CONTRASENA' => sha1($pass), 
                       ':ID_TIPO_USUARIO' => $tipo_usuario       
               ));       
               
            header("location: ../listarUsuarios.php?res=1"); 
            }
?>