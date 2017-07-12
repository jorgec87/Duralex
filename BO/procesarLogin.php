<?php
	 require_once '../EasyPDO/conexionPDO.php';
         $fecha_actual=date("Y-m-d H:i:s");
         $error="";
         //   Imprimir parametros
        print_r($_POST);
         // valida que todos los datos sean recibidos correctamente
        if(!isset($_POST['txtRut'])) {
                $error="Ocurrio un problema con el rut";
        }else{
                $rut=$_POST['txtRut'];
        }

        if(!isset($_POST['txtPass'])) {
                $error="Ocurrio un problema con el password";
        }else{
                $pass=$_POST['txtPass'];
        }
        
     
       
	  // fin validacion de datos recibidos

	$db->prepare("SELECT * FROM duralex.usuarios WHERE RUT_USUARIO=:RUT_USUARIO",true);
	$db->execute(array(':RUT_USUARIO' => $rut));
	$res=$db->get_results();

	if(empty($res))
	{
		// USUARIO NO EXISTE
		header("location: ../login.php?error=1");
            
	}
	else
	{
		//VERIFICAR SI LA CONTRASEÑA ES LA CORRECTA
		$db->prepare("SELECT * FROM duralex.usuarios WHERE RUT_USUARIO=:RUT_USUARIO AND CONTRASEÑA=:pass",true);
		$db->execute(array(
			':RUT_USUARIO' => $res[0]->RUT_USUARIO,
			':pass' => sha1($pass)
		));

		$res_login = $db -> get_results();

		if(empty($res_login)){
			// CONTRASEÑA ES EQUIVOCADA
			header("location: ../login.php?error=2");
                    
		}else{
			foreach ($res_login as $key => $login) { 
				// dats para utilizar en las variables de sesion
				$id_usu=$login->ID_USUARIO;
				$rut_usu=$login->RUT_USUARIO;
				$nombre_usu=$login->NOMBRE_USER;
				$apellidop_usu=$login->APELLIDOP_USER;
				$apellidom_usu=$login->APELLIDOM_USER;
				$id_tipo_usuario=$login->ID_TIPO_USUARIO;
			}
			// Se inicia la sesion y se crean las variables de sesion
			session_start();
			$_SESSION['id_usuario']=$id_usu;
                        $_SESSION['rut']=$rut_usu;
			$_SESSION['nombre']=$nombre_usu;
                        $_SESSION['apellido_paterno']=$apellidop_usu;
                        $_SESSION['apellido_materno']=$apellidom_usu;
			$_SESSION['tipo']=$id_tipo_usuario;
			
			
                      
			header("location: ../index.php?res=1");
                      
      
                      
 
//                   for ($index = 0;$index < 200;$index++) {
//                        $index--;
//                        
//                         $now = time();
//                      while ($now + 30000 > time()) {
//       
//                       }
//                     try {
//                         $sql_anulados = $db->get_results("select ID_ATENCION from duralex.atenciones where FECHA_ATENCION < DATE_ADD(NOW(),INTERVAL 24 HOUR) and ID_ESTADO = 1");
//                     
//                       foreach ($sql_anulados as $key => $anular) {
//    		
//                      $db->prepare("update duralex.atenciones set ID_ESTADO = 3 where ID_ATENCION =:id",true);
//		        $db->execute(array(
//			':id' => $anular->ID_ATENCION
//                        )); 
//                    } 
//                     } catch (Exception $ex) {
//                      echo $ex;
//                     }
//                  
//                    }
                    
                    
         
                     
        }
                
                
	}

?>