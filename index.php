<?php
require_once './EasyPDO/conexionPDO.php';
require_once './include/include_valida_session.php';
$sql_TIPO_USUARIO = $db->get_results("SELECT * FROM duralex.TIPO_USUARIO");
$sql_ABOGADOS = $db->get_results("SELECT * FROM duralex.ABOGADOS");
$sql_CLIENTES = $db->get_results("SELECT * FROM duralex.CLIENTES");
$sql_ATENCIONES = $db->get_results("SELECT ID_ATENCION id,FECHA_ATENCION fecha,"
        ."(SELECT VALOR_X_HORA FROM duralex.abogados where ID_ABOGADO=atenciones.ID_ABOGADO)valor,".
        "(SELECT NOMBRE_CLI FROM duralex.clientes where ID_CLIENTE=atenciones.ID_CLIENTE)nombre_cli,".
        "(SELECT APELLIDOP_CLI FROM duralex.clientes where ID_CLIENTE=atenciones.ID_CLIENTE)apellidop_cli,". 
        "(SELECT APELLIDOM_CLI FROM duralex.clientes where ID_CLIENTE=atenciones.ID_CLIENTE)apellidom_cli,".
        "(SELECT NOMBRE_ABO FROM duralex.abogados where ID_ABOGADO=atenciones.ID_ABOGADO)nombre_abo,".
        "(SELECT APELLIDOP_ABO FROM duralex.abogados where ID_ABOGADO=atenciones.ID_ABOGADO)apellidop_abo,". 
        "(SELECT APELLIDOM_ABO FROM duralex.abogados where ID_ABOGADO=atenciones.ID_ABOGADO)apellidom_abo,". 
        "(SELECT DESCRIPCION FROM duralex.estados WHERE ID_ESTADO = atenciones.ID_ESTADO)estado FROM duralex.ATENCIONES");

$sql_ESTADOS = $db->get_results("SELECT * FROM ESTADOS"); 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Duralex - Index</title>
        <!-- bootstrap -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css" />
        <!-- RTL support - for demo only -->
        <script src="js/demo-rtl.js"></script>
        <!-- libraries -->
        <link rel="stylesheet" type="text/css" href="css/libs/font-awesome.css" />
        <link rel="stylesheet" type="text/css" href="css/libs/nanoscroller.css" />
        <!-- global styles -->
        <link rel="stylesheet" type="text/css" href="css/compiled/theme_styles.css" />
        <!-- this page specific styles -->
        <link rel="stylesheet" href="css/libs/daterangepicker.css" type="text/css" />
        <link rel="stylesheet" href="css/libs/select2.css" type="text/css" />
        <!-- this page specific styles -->
	<link rel="stylesheet" type="text/css" href="css/libs/ns-default.css"/>
	<link rel="stylesheet" type="text/css" href="css/libs/ns-style-growl.css"/>
	<link rel="stylesheet" type="text/css" href="css/libs/ns-style-bar.css"/>
	<link rel="stylesheet" type="text/css" href="css/libs/ns-style-attached.css"/>
	<link rel="stylesheet" type="text/css" href="css/libs/ns-style-other.css"/>
	<link rel="stylesheet" type="text/css" href="css/libs/ns-style-theme.css"/>
        <!-- Favicon -->
        <link type="image/x-icon" href="favicon.png" rel="shortcut icon"/>
        <!-- google font libraries -->
        <link href='//fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400' rel='stylesheet' type='text/css'>

    </head>
    
    <body>
     
        <div id="theme-wrapper">
            
            <header class="navbar" id="header-navbar">
                <div class="container">
                    <a href="index.php" id="logo" class="navbar-brand">
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
                                    <i class="fa fa-user  fa-5x" style="color: #fff"></i>
                                    
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
                                        <li class="active" >
                                            <a href="index.php" >
                                                <i class="fa fa-dashboard"></i>
                                                <span>Inicio</span>
                                            </a>
                                        </li>
                                        
                                        <li >
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
                                                 <li>
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
                                        <?php if($_SESSION['tipo']== 1 || $_SESSION['tipo']== 2){ ?>
                                        <li >
                                            <a href="#" class="dropdown-toggle">
                                                <i class="fa fa-bar-chart-o"></i>
                                                <span>Estadistica</span>
                                                <i class="fa fa-chevron-circle-right drop-icon"></i>
                                            </a>
                                            <ul class="submenu">
                                                  
                                                <li >
                                                    <a href="estadisticasAtenciones.php">
                                                        Atenciones
                                                    </a>
                                                </li>
                                                
                                                <li >
                                                    <a href="estadisticaClientes.php">
                                                        Clientes
                                                         </a>
                                                  </li>      
                                            </ul>
                                        </li>
                                        <?php } ?> 
                                    </ul>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div id="content-wrapper">
                        
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="main-box">
										<div class="clearfix">
											<div class="infographic-box merged merged-top pull-left">
												<i class="fa fa-user green-bg"></i>
												<span class="value green">3</span>
												<span class="headline">Usuarios</span>
											</div>
											<div class="infographic-box merged merged-top merged-right pull-left">
												<i class="fa fa-money green-bg"></i>
												<span class="value green">$12.400</span>
												<span class="headline">Recaudacion</span>
											</div>
										</div>
										<div class="clearfix">
											<div class="infographic-box merged pull-left">
												<i class="fa fa-eye yellow-bg"></i>
												<span class="value yellow">125</span>
												<span class="headline"> Visitas Mensuales</span>
											</div>
											<div class="infographic-box merged merged-right pull-left">
												<i class="fa fa-globe red-bg"></i>
												<span class="value red">28</span>
												<span class="headline">Countries</span>
											</div>
										</div>
									</div>
								</div>
                       <div class="row">
                            <div class="col-lg-10 col-lg-offset-1">
                                <div class="main-box">
                                    
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="main-box clearfix">
                                                <header class="main-box-header clearfix">
                                                    <h2 class="pull-left">Ultimas Atenciones</h2>
                                                
                                                   
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
                                                                   
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                 <?php
                                                                foreach ($sql_ATENCIONES as $key => $atencion) 
                                                                { 
                                                                    ?>
                                                                 <tr>
                                                                <td class="text-left"> 
                                                                    <a><?php echo $atencion->fecha; ?></a> 
                                                                </td>
                                                                <td class="text-left"> 
                                                                    <?php echo $atencion->nombre_cli.' '.$atencion->apellidop_cli.' '.$atencion->apellidom_cli; ?>
                                                                </td>
                                                                <td class="text-left"> 
                                                                    <?php echo $atencion->nombre_abo.' '.$atencion->apellidop_abo.' '.$atencion->apellidom_abo; ?>
                                                                </td>
                                                                <td class="text-left"> 
                                                                    <?php echo "$ ".$atencion->valor; ?>
                                                                </td>
                                                                <?php if($atencion->estado == "Anulada" || $atencion->estado == "Perdida" ){ ?>
                                                                  <td class="text-left"> 
                                                                 <span class="label label-danger"><?php echo $atencion->estado; ?></span>
                                                                 </td>
                                                               <?php }else{?>
                                                                <td class="text-left"> 
                                                                   <span class="label label-primary"><?php echo $atencion->estado; ?></span> 
                                                                </td>
                                                                <?php }?>
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
	<!-- this page specific scripts -->
	<script src="js/modernizr.custom.js"></script>
	<script src="js/snap.svg-min.js"></script> <!-- For Corner Expand and Loading circle effect only -->
	<script src="js/classie.js"></script>
	<script src="js/notificationFx.js"></script>
	

        <!-- theme scripts -->
        <script src="js/scripts.js"></script>
        <script src="js/pace.min.js"></script>

<!-- this page specific inline scripts -->
	<script>
	$(function($) {	
	
         
 $('#ddl_select_tipo').select2();
 

	});
	</script>

    </body>
</html>

 <?php 
      
         if(isset($_GET['res'])) {
            if($_GET['res']==1){
              ?>     
                    <script>
    // create the notification
            var notification = new NotificationFx({
                    wrapper: document .body,
                    message : '<span class="fa fa-user fa-3x pull-left"></span><p><strong>Bienvenido!</strong>  <?php echo "     ".$_SESSION['nombre']." ".$_SESSION['apellido_paterno'];?></p>',
                    layout : 'attached',
                    effect : 'bouncyflip',
                    type : 'success', // notice, warning or error
                    onClose : function() {

                    }
            });

            // show the notification
            notification.show();
                    </script>
               <?php
            }
        }
 ?>
