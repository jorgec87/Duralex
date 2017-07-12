<?php
require_once '../config.php';
require_once './EasyPDO/conexionPDO.php';
$fecha_actual=date("Y-m-d H:i:s");

//        Consulta a la tablas categoria

$queryEstadistica = "Select count(atenciones.ID_ATENCION) as ATENCIONES, CONCAT('$',SUM(atenciones.VALOR)) as TOTAL,".
"CONCAT(abogados.NOMBRE_ABO,' ',abogados.APELLIDOP_ABO,' ',abogados.APELLIDOM_ABO) as ABOGADO, ".
"abogados.ESPECIALIDAD as ESPECIALIDAD,estados.DESCRIPCION as ESTADO From atenciones ".
"JOIN abogados on abogados.ID_ABOGADO=atenciones.ID_ABOGADO ".
"JOIN estados on estados.ID_ESTADO=atenciones.ID_ESTADO".
" WHERE atenciones.ID_ESTADO=".$idEstado." AND atenciones.FECHA_ATENCION BETWEEN '".$desdeFecha."' AND '".$hastaFecha."' AND abogados.RUT_ABOGADO='".$rutAbogado."'".
" OR atenciones.ID_ESTADO=".$idEstado." AND atenciones.FECHA_ATENCION  BETWEEN '".$mes."' AND abogados.ESPECIALIDAD='Civil';";

//         Fin consultas

        if(!isset($_POST['datepickerDateRange'])) {
                $error="Ocurrio un problema con el rango de fecha";
        }else{
                $desdeFecha=$_POST['datepickerDateRange'];
                $hastaFecha=$_POST['datepickerDateRange'];
        }

        if (!isset($_POST['sel2'])) {
                $error="Ocurrio un problema con el rut del abogado";
        }else{
                $rutAbogado=$_POST['sel2'];
        }
        
        if (!isset($_POST['sel3'])) {
                $error="Ocurrio un problema con el mes";
        }else{
                $mes=$_POST['sel3'];
        }
        
        if (!isset($_POST['sel4'])) {
                $error="Ocurrio un problema con el estado";
        }else{
                $idEstado=$_POST['sel4'];
        }
        
        //TRATAR DE DEVOLVER STRING DE CONECCION PARA USAR EN LA PAGINA DE ESTADISTICA REEMPLAZANDO EL POR DEFECTO