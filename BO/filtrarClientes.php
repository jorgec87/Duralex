<?php
require_once '../config.php';
require_once '../EasyPDO/conexionPDO.php';
$fecha_actual=date("Y-m-d H:i:s");


        if (!isset($_POST['txtMeses']) || $_POST['txtMeses'] == 0) {
                $meses=100;
        }else{
                $meses=$_POST['txtMeses'];
        }
        
        if (!isset($_POST['ddlTipo']) || $_POST['ddlTipo'] == 0) {
                $tipo= " ";
        }else{
                $tipo= " and TIPO_PERSONA = ".$_POST['ddlTipo'];
        }
        
       
        
        
        
        
        //VERIFICAR CANTIDAD DE CLIENTES
	$res_cant_clientes = $db->get_results("SELECT count(*) cantidad FROM duralex.clientes where FECHA_REGISTRO > date_sub(NOW(),INTERVAL ".$meses." month)".$tipo." ",true);
	$res_clientes = $db->get_results("SELECT * FROM duralex.clientes where FECHA_REGISTRO > date_sub(NOW(),INTERVAL ".$meses." month)".$tipo." ",true);	
         if(empty($res_clientes)){
            $res_clientes['cantidad']= $res_cant_clientes[0]->cantidad;
	      $res_clientes = $db->get_results("SELECT * FROM duralex.clientes",true);	
               echo json_encode($res_clientes);  
                    
                    
                }else{
                   echo json_encode($res_clientes); 
               
                    
                }
       // SELECT * FROM duralex.clientes where FECHA_REGISTRO > date_sub(NOW(),INTERVAL 5 month) and TIPO_PERSONA = 2;
        
        //TRATAR DE DEVOLVER STRING DE CONECCION PARA USAR EN LA PAGINA DE ESTADISTICA REEMPLAZANDO EL POR DEFECTO