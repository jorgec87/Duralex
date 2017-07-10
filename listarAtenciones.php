<?php
require_once './include/include_valida_session.php';
require_once './EasyPDO/conexionPDO.php';

//        Consulta a la tablas categoria

$sql_ATENCIONES = $db->get_results("SELECT ID_ATENCION id,FECHA_ATENCION fecha,VALOR valor,".
        "(SELECT NOMBRE_CLI FROM duralex.clientes where ID_CLIENTE=atenciones.ID_CLIENTE)nombre_cli,".
        "(SELECT APELLIDOP_CLI FROM duralex.clientes where ID_CLIENTE=atenciones.ID_CLIENTE)apellidop_cli,". 
        "(SELECT APELLIDOM_CLI FROM duralex.clientes where ID_CLIENTE=atenciones.ID_CLIENTE)apellidom_cli,".
        "(SELECT NOMBRE_ABO FROM duralex.abogados where ID_ABOGADO=atenciones.ID_ABOGADO)nombre_abo,".
        "(SELECT APELLIDOP_ABO FROM duralex.abogados where ID_ABOGADO=atenciones.ID_ABOGADO)apellidop_abo,". 
        "(SELECT APELLIDOM_ABO FROM duralex.abogados where ID_ABOGADO=atenciones.ID_ABOGADO)apellidom_abo,". 
        "(SELECT DESCRIPCION FROM duralex.estados WHERE ID_ESTADO = atenciones.ID_ESTADO)estado FROM duralex.ATENCIONES");

$sql_ESTADOS = $db->get_results("SELECT * FROM ESTADOS"); 
//         Fin consultas

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Duralex - Listar Atenciones</title>
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
                                           <?php echo $_SESSION['nombre']." ".$_SESSION['apellido_paterno'];?> 
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
                                                     <?php if($_SESSION['tipo']!= 4){ ?>
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
                                               
                                                <?php } ?> 
                                                <li class="active">
                                                    <a href="listarAtenciones.php">
                                                        Atenciones
                                                    </a>
                                                </li>
                                               
                                                    <?php if($_SESSION['tipo']!= 1 && $_SESSION['tipo']!= 3 && $_SESSION['tipo']!= 4){ ?>
                                                   <li>
                                                     <a href="listarUsuarios.php">
                                                        Usuarios
                                                    </a>
                                                </li>
                                                <?php } ?> 
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
                                        <h2>Listado De Atenciones</h2>
                                    </header>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="main-box clearfix">
                                                <header class="main-box-header clearfix">
                                                    <h2 class="pull-left">Atenciones</h2>
                                                    <?php if($_SESSION['tipo']!= 1 && $_SESSION['tipo']!= 4){ ?>
                                                       <div class="filter-block pull-right">

                                                        <a href="crearAtencion.php" class="btn btn-primary pull-right">
                                                            <i class="fa fa-plus-circle fa-lg"></i> Registrar Atencion
                                                        </a>
                                                    </div>
                                                    <?php } ?> 
                                                   
                                                </header>

                                                <div class="main-box-body clearfix">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-left"><a><span>Fecha</span></a></th>
                                                                    <th class="text-left"><a><span>Cliente</span></a></th>
                                                                    <th class="text-left"><a><span>Abogado</span></a></th>
                                                                    <th class="text-left"><a><span>Valor de Atencion</span></a></th>
                                                                    <th class="text-left"><a><span>Estado</span></a></th>
                                                                     <?php if($_SESSION['tipo']!= 1 && $_SESSION['tipo']!= 4){ ?>
                                                                    <th class="text-left"><a><span>Cambiar Estado</span></a></th>
                                                                  <?php } ?> 
                                                                    <th>&nbsp;</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                 <?php
                                                                foreach ($sql_ATENCIONES as $key => $atencion) 
                                                                { 
                                                                    ?>
                                                                 <tr>
                                                                <td class="text-left"> 
                                                                    <?php echo $atencion->fecha; ?>
                                                                </td>
                                                                <td class="text-left"> 
                                                                    <?php echo $atencion->nombre_cli.' '.$atencion->apellidop_cli.' '.$atencion->apellidom_cli; ?>
                                                                </td>
                                                                <td class="text-left"> 
                                                                    <?php echo $atencion->nombre_abo.' '.$atencion->apellidop_abo.' '.$atencion->apellidom_abo; ?>
                                                                </td>
                                                                <td class="text-left"> 
                                                                    <?php echo $atencion->valor; ?>
                                                                </td>
                                                                <td class="text-left"> 
                                                                    <?php echo $atencion->estado; ?>
                                                                </td>
                                                                 <?php if($_SESSION['tipo']!= 1 && $_SESSION['tipo']!= 4){ ?>
                                                                 <td>    
                                                                    <div class="form-group-select2">
                                                                        <select style="width:170px" id="sel3" name="sel3">
                                                                            <option value="0">Seleccione el estado</option>
                                                                            <?php
                                                                            foreach ($sql_ESTADOS as $key => $estado) {
                                                                                ?>									
                                                                                <option value="<?php echo $estado->ID_ESTADO; ?>"><?php echo $estado->DESCRIPCION; ?></option>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                       </select>
                                                                    </div>
                                                                </td>
                                                                <td style="width: 5%;">
                                                                        <a   onclick="ActualizarEstado(<?php echo $atencion->id;?>)" class="table-link danger">
                                                                            <span class="fa-stack">
                                                                                <i class="fa fa-square fa-stack-2x"></i>
                                                                                <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                                                            </span>
                                                                        </a>    
                                                            
                                                                    
                                                                 </td>
                                                                  <?php
                                                                    }
                                                                 ?>   
                                                               
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
                
                $('#sel3').select2();      
                
	});
        
      
            window.ActualizarEstado =  function(id){
               if (confirm("Esta seguro de actualizar el estado?")) 
               {
    window.location.href = "/Duralex/BO/cambiarEstadoAtencion.php?id="+$('select[name=sel3]').val()+"&idAtencion="+id;
} 
               
              
             }   
	</script>
        
						