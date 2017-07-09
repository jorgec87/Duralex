<?php
//require_once './include/include_valida_session.php';
require_once './EasyPDO/conexionPDO.php';

//        Consulta a la tablas categoria

$sql_clientes = $db->get_results("SELECT * FROM duralex.clientes");

//         Fin consultas

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Duralex - Listar Clientes</title>
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
                                    <a class="btn">
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
                                    <img alt="" src="img/samples/scarlet-159.png" />
                                    <div class="user-box">
                                        <span class="name">
                                            Welcome<br/>
                                            Scarlett
                                        </span>
                                        <span class="status">
                                            <i class="fa fa-circle"></i> Online
                                        </span>
                                    </div>
                                </div>
                                <div class="collapse navbar-collapse navbar-ex1-collapse" id="sidebar-nav">	
                                    <ul class="nav nav-pills nav-stacked">
                                        <li>
                                            <a href="index.html">
                                                <i class="fa fa-dashboard"></i>
                                                <span>Dashboard</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="crearAbogado.php" class="active">
                                                <i class="fa fa-dashboard"></i>
                                                <span>Agregar Abogado</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="crearAtencion.php" class="active">
                                                <i class="fa fa-dashboard"></i>
                                                <span>Crear Atencion</span>
                                            </a>
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
                                        <h2>Clientes</h2>
                                    </header>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="main-box clearfix">
                                                <header class="main-box-header clearfix">
                                                  <div class="filter-block pull-right">
                                                      <a href="crearCliente.php" class="btn btn-primary pull-right">
                                                            <i class="fa fa-plus-circle fa-lg"></i> Agregar Cliente
                                                        </a>
                                                    </div>
                                                </header>

                                                <div class="main-box-body clearfix">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-left"><a><span>Nombre</span></a></th>
                                                                    <th class="text-left"><a><span>Rut</span></a></th>
                                                                    <th class="text-left"><a><span>Tipo de persona</span></a></th>
                                                                    <th class="text-left"><a><span>Fecha de registro</span></a></th>
                                                                    <th class="text-left"><a><span>Teléfono</span></a></th>
                                                                     <th class="text-left"><a><span>Acción</span></a></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                 <?php
                                                                foreach ($sql_clientes as $key => $cliente) 
                                                                    {
                                                                    ?>	
                                                                <tr>
                                                                <td class="text-left"> 
                                                                    <a><?php echo $cliente->NOMBRE_CLI." ".$cliente->APELLIDOP_CLI." ".$cliente->APELLIDOM_CLI; ?></a> 
                                                                </td>
                                                                <td class="text-left"> 
                                                                    <?php echo $cliente->RUT_CLIENTE; ?>
                                                                </td>
                                                                <?php
                                                                if($cliente->TIPO_PERSONA == 1){?>	
                                                                <td class="text-left"> 
                                                                    Natural
                                                                </td>
                                                               <?php }else{?>
                                                                <td class="text-left"> 
                                                                    Juridica
                                                                </td>
                                                                <?php }?>
                                                                 <td class="text-left"> 
                                                                    <?php echo $cliente->FECHA_REGISTRO; ?>
                                                                </td>
                                                                 <td class="text-left"> 
                                                                    <?php echo $cliente->TELEFONO; ?>
                                                                </td>
                                                                <td style="width: 15%;">
                                                                    <a href="actualizarCliente.php?id=<?php echo $cliente->ID_CLIENTE; ?>" class="table-link">
                                                                            <span class="fa-stack">
                                                                                <i class="fa fa-square fa-stack-2x"></i>
                                                                                <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                                                            </span>
                                                                        </a>
                                                                    <a href="BO/eliminarCliente.php?id=<?php echo $cliente->ID_CLIENTE; ?>" onclick="return confirm('¿Esta seguro de eliminar Cliente?')" class="table-link danger">
                                                                            <span class="fa-stack">
                                                                                <i class="fa fa-square fa-stack-2x"></i>
                                                                                <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                                                            </span>
                                                                        </a>
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


						