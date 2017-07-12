<?php
require_once './EasyPDO/conexionPDO.php';

//        Consulta a la tablas categoria

$sql_ESTADISTICAS = $db->get_results("Select count(atenciones.ID_ATENCION) as ATENCIONES, CONCAT('$',SUM(atenciones.VALOR)) as TOTAL,".
"CONCAT(abogados.NOMBRE_ABO,' ',abogados.APELLIDOP_ABO,' ',abogados.APELLIDOM_ABO) as ABOGADO, ".
"abogados.ESPECIALIDAD as ESPECIALIDAD,estados.DESCRIPCION as ESTADO From atenciones ".
"JOIN abogados on abogados.ID_ABOGADO=atenciones.ID_ABOGADO ".
"JOIN estados on estados.ID_ESTADO=atenciones.ID_ESTADO".
" WHERE atenciones.ID_ESTADO=5 AND atenciones.FECHA_ATENCION BETWEEN '2017-07-04' AND '2017-07-12' AND abogados.ESPECIALIDAD='Civil'".
" OR atenciones.ID_ESTADO=5 AND atenciones.FECHA_ATENCION  BETWEEN '2017-07-04' AND '2017-07-12' AND abogados.RUT_ABOGADO='16368450';");

$sql_ABOGADOS = $db->get_results("SELECT * FROM ABOGADOS"); 

$sql_ESTADOS = $db->get_results("SELECT * FROM ESTADOS");
//         Fin consultas

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Duralex - Estadisticas de Atenciones</title>
	<!-- bootstrap -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css" />
	
	<!-- RTL support - for demo only -->
	<script src="js/demo-rtl.js"></script>
	<!-- 
	If you need RTL support just include here RTL CSS file <link rel="stylesheet" type="text/css" href="css/libs/bootstrap-rtl.min.css" />
	And add "rtl" class to <body> element - e.g. <body class="rtl"> 
	-->
	
	<!-- libraries -->
	<link rel="stylesheet" type="text/css" href="css/libs/font-awesome.css" />
	<link rel="stylesheet" type="text/css" href="css/libs/nanoscroller.css" />

	<!-- global styles -->
	<link rel="stylesheet" type="text/css" href="css/compiled/theme_styles.css" />

	<!-- this page specific styles -->
	<link rel="stylesheet" href="css/libs/datepicker.css" type="text/css" />
	<link rel="stylesheet" href="css/libs/daterangepicker.css" type="text/css" />
	<link rel="stylesheet" href="css/libs/bootstrap-timepicker.css" type="text/css" />
	<link rel="stylesheet" href="css/libs/select2.css" type="text/css" />
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
	<!-- Favicon -->
	<link type="image/x-icon" href="favicon.png" rel="shortcut icon"/>

	<!-- google font libraries -->
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400' rel='stylesheet' type='text/css'>
    
        
       
        
    </head>
    <body>
        <div id="theme-wrapper">
            <header class="navbar" id="header-navbar">
                <div class="container">
                    <a href="index.html" id="logo" class="navbar-brand">
                        <label>DURALEX</label>
                    </a>

                    <div class="clearfix">
                        <button class="navbar-toggle" data-target=".navbar-ex1-collapse" data-toggle="collapse" type="button">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="fa fa-bars"></span>
                        </button>

                        <div class="nav-no-collapse navbar-left pull-left hidden-sm hidden-xs">
                            <ul class="nav navbar-nav pull-left">
                                <li>
                                    <a class="btn" id="make-small-nav">
                                        <i class="fa fa-bars"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="nav-no-collapse pull-right" id="header-nav">
                            <ul class="nav navbar-nav pull-right">
                                <li class="hidden-xxs">
                                    <a href="BO/cerrarSesion.php" class="btn">
                                        <i class="fa fa-power-off"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </header>
            <div id="page-wrapper" class="container">
                <div class="row">
                    <div id="nav-col">
                       <section id="col-left" class="col-left-nano">
                            <div id="col-left-inner" class="col-left-nano-content">
                                <div id="user-left-box" class="clearfix hidden-sm hidden-xs">
                                    <img src="img/icon-user.png" alt=""/>
                                    <div class="user-box">
                                        <span class="name">
                                            Bienvenido<br/>
                                           <?php //echo $_SESSION['nombre']." ".$_SESSION['apellido_paterno'];?> 
                                        </span>
                                        <span class="status">
                                            <i class="fa fa-circle"></i> Online
                                        </span>
                                    </div>
                                </div>
                                <div class="collapse navbar-collapse navbar-ex1-collapse" id="sidebar-nav">	
                                    <ul class="nav nav-pills nav-stacked">
                                        <li>
                                            <a href="index.php" class="active">
                                                <i class="fa fa-dashboard"></i>
                                                <span>Inicio</span>
                                            </a>
                                        </li>
                                        
                                        <li class="open active">
                                            <a href="#" class="dropdown-toggle">
                                                <i class="fa fa-table"></i>
                                                <span>Administrar</span>
                                                <i class="fa fa-chevron-circle-right drop-icon"></i>
                                            </a>
                                             <ul class="submenu">
                                                     <?php //if($_SESSION['tipo']!= 4){ ?>
                                                   <li>
                                                    <a href="listarClientes.php">
                                                        Clientes
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="listarAbogados.php">
                                                        Abogados
                                                    </a>
                                                </li>
                                               
                                                <?php //} ?> 
                                                <li class="active">
                                                    <a href="listarAtenciones.php">
                                                        Atenciones
                                                    </a>
                                                </li>
                                               
                                                    <?php //if($_SESSION['tipo']!= 1 && $_SESSION['tipo']!= 3 && $_SESSION['tipo']!= 4){ ?>
                                                   <li>
                                                     <a href="listarUsuarios.php">
                                                        Usuarios
                                                    </a>
                                                </li>
                                                <?php //} ?> 
                                            </ul>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div id="content-wrapper">
                        <div class="row">
                            <div class="col-lg-10 col-lg-offset-1">
                                <div class="main-box">
                                    <header class="main-box-header clearfix">
                                        <h1 style="text-align: center;">Estadistica De Atenciones</h1>
                                    </header>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="main-box clearfix">
                                                <div class="col-lg-8 col-lg-offset-2">
                                                    <header style="margin-bottom: -10px; margin-left: -12px;" class="main-box-header clearfix">
                                                    <h2 style="text-align:left;">FILTROS DE BUSQUEDA</h2>                                                  
                                                </header>
                                                    <form id="form_filtro" method="POST" action="BO/filtroAtenciones.php">
                                                    <div class="form-group col-lg-6">
                                                        <h5>FECHA</h5>
                                                        <div class="input-group">
                                                            <div class="onoffswitch">
                                                                <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" checked>
                                                                <label class="onoffswitch-label" for="myonoffswitch">
                                                                    <span class="onoffswitch-inner"></span>
                                                                    <span class="onoffswitch-switch"></span>
                                                                </label>
                                                            </div>
                                                        </div>  
                                                    </div>
                                                     <div class="form-group col-lg-6">
                                                        <h5>ABOGADO</h5>
                                                        <div class="input-group">
                                                            <div class="onoffswitchA">
                                                                <input type="checkbox" name="onoffswitchA" class="onoffswitchA-checkbox" id="myonoffswitchA" checked>
                                                                <label class="onoffswitchA-label" for="myonoffswitchA">
                                                                    <span class="onoffswitchA-inner"></span>
                                                                    <span class="onoffswitchA-switch"></span>
                                                                </label>
                                                            </div>
                                                        </div>  
                                                    </div>
                                                    <div class="form-group col-lg-6">                                                  															<label for="datepickerDateRange">Date range</label>
                                                    <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                                                            <input type="text" class="form-control" id="datepickerDateRange" name="datepickerDateRange">
                                                    </div>  
                                                    </div>
                                                    <div class="form-group col-lg-6">
                                                        <div class="form-group form-group-select2">
                                                            <label>Abogado</label>
                                                            <select style="width:300px" id="sel2" name="sel2">
                                                                <option value="">Seleccione el abogado</option>
                                                                <?php
                                                                foreach ($sql_ABOGADOS as $key => $abogado) {
                                                                    ?>									
                                                                    <option value="<?php echo $abogado->RUT_ABOGADO; ?>"><?php echo $abogado->NOMBRE_ABO.' '.$abogado->APELLIDOP_ABO.' '.$abogado->APELLIDOM_ABO;?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-lg-6">
                                                        <div class="form-group form-group-select2">
                                                            <label>Mes Del Año</label>
                                                            <select style="width:300px" id="sel3" name="sel3">
                                                                <option value="0">Seleccione el mes</option>
                                                                <option value="'2017-01-01' AND '2017-02-01'">Enero</option>
                                                                <option value="'2017-02-01' AND '2017-03-01'">Febrero</option>
                                                                <option value="'2017-03-01' AND '2017-04-01'">Marzo</option>
                                                                <option value="'2017-04-01' AND '2017-05-01'">Abril</option>
                                                                <option value="'2017-05-01' AND '2017-06-01'">Mayo</option>
                                                                <option value="'2017-06-01' AND '2017-07-01'">Junio</option>
                                                                <option value="'2017-07-01' AND '2017-08-01'">Julio</option>
                                                                <option value="'2017-08-01' AND '2017-09-01'">Agosto</option>
                                                                <option value="'2017-09-01' AND '2017-10-01'">Septiembre</option>
                                                                <option value="'2017-10-01' AND '2017-11-01'">Octubre</option>
                                                                <option value="'2017-11-01' AND '2017-12-01'">Noviembre</option>
                                                                <option value="'2017-12-01' AND '2018-01-01'">Diciembre</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-lg-6">
                                                        <div class="form-group form-group-select2">
                                                            <label>Estado</label>
                                                            <select style="width:300px" id="sel4" name="sel4">
                                                                <option value="">Seleccione el estado</option>
                                                                <?php
                                                                foreach ($sql_ESTADOS as $key => $estado) {
                                                                    ?>									
                                                                    <option value="<?php echo $estado->ID_ESTADO; ?>"><?php echo $estado->DESCRIPCION;?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-lg-4 col-lg-offset-4">
                                                        <div class="form-group">
                                                            <button type="submit" style="width:80%; border-radius:4px;" class="btn  btn-success">&nbsp&nbsp&nbsp&nbsp&nbsp&nbspFiltrar&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                </div>                                             
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="main-box">
                             <div class="main-box-body clearfix">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-left"><a><span>TOTAL DE ATENCIONES</span></a></th>
                                                                    <th class="text-left"><a><span>VALOR TOTAL</span></a></th>
                                                                    <th class="text-left"><a><span>ABOGADO</span></a></th>
                                                                    <th class="text-left"><a><span>ESPECIALIDAD</span></a></th>
                                                                    <th class="text-left"><a><span>ESTADO</span></a></th>                                                                     
                                                                    <th>&nbsp;</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                 <?php
                                                                foreach ($sql_ESTADISTICAS as $key => $estadistica) 
                                                                { 
                                                                    ?>
                                                                 <tr>
                                                                <td class="text-left"> 
                                                                    <?php echo $estadistica->ATENCIONES; ?>
                                                                </td>
                                                                <td class="text-left"> 
                                                                    <?php echo $estadistica->TOTAL; ?>
                                                                </td>
                                                                <td class="text-left"> 
                                                                    <?php echo $estadistica->ABOGADO; ?>
                                                                </td>
                                                                <td class="text-left"> 
                                                                    <?php echo $estadistica->ESPECIALIDAD; ?>
                                                                </td>
                                                                <td class="text-left"> 
                                                                    <?php echo $estadistica->ESTADO; ?>
                                                                </td>                                                              
                                                                 </tr>
                                                                <?php
                                                                    }
                                                                ?>                                                              
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                            </div>
                        </div>

                        <footer id="footer-bar" class="row">
                            <p id="footer-copyright" class="col-xs-12">
                                &copy; 2014 <a href="http://www.adbee.sk/" target="_blank">Adbee digital</a>. Powered by Centaurus Theme.
                            </p>
                        </footer>
                    </div>
                </div>
            </div>
        </div>

        <!-- global scripts -->
        <script src="js/demo-skin-changer.js"></script> <!-- only for demo -->
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/jquery.nanoscroller.min.js"></script>
        <script src="js/demo.js"></script> <!-- only for demo -->
        <!-- this page specific scripts -->
        <script src="js/jquery.maskedinput.min.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
        <script src="js/moment.min.js"></script>
        <script src="js/daterangepicker.js"></script>
        <script src="js/bootstrap-timepicker.min.js"></script>
        <script src="js/select2.min.js"></script>
        <script src="js/hogan.js"></script>
        <script src="js/typeahead.min.js"></script>
        <script src="js/jquery.pwstrength.js"></script>

        <!-- theme scripts -->
        <script src="js/scripts.js"></script>
        <script src="js/pace.min.js"></script>

<!-- this page specific inline scripts -->
	

    </body>
</html>

 <script>
	$(function($) {
            
                //nice select boxes
                $('#sel2').select2();
                //nice select boxes
                $('#sel3').select2();               
                //nice select boxes
                $('#sel4').select2();
                
                //daterange picker
		$('#datepickerDateRange').daterangepicker(); 
                
                //datepicker
		$('#datepickerDate').datepicker({
		  format: 'mm-yyyy'
		});
	});           
            window.ActualizarEstado =  function(id){
               if (confirm("Esta seguro de actualizar el estado?")) 
               {
    window.location.href = "/Duralex/BO/cambiarEstadoAtencion.php?id="+$('select[name=sel3]').val()+"&idAtencion="+id;
} 
               
              
             }   
	</script>
        
						