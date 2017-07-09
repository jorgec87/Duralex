<?php
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Duralex - Registrar Abogado</title>
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
                            <div class="col-lg-6 col-lg-offset-3">
                                <div class="main-box">
                                    <header class="main-box-header clearfix">
                                        <h2>Registrar Abogado</h2>
                                    </header>
                                    <div class="main-box-body clearfix">
                                        <form id="form_abogado" method="POST" enctype="multipart/form-data" action="BO/registroAbogado.php">
                                            <div class="form-group col-md-6">
                                                <label>Nombre</label>
                                                <input type="text" class="form-control" id="txtNombre" name="txtNombre" placeholder="Ingrese nombre">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Apellido Paterno</label>
                                                <input type="text" class="form-control" id="txtApellidoP" name="txtApellidoP" placeholder="Ingrese Apellido Paterno">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Apellido Materno</label>
                                                <input type="text" class="form-control" id="txtApellidoM" name="txtApellidoM" placeholder="Ingrese Apellido Materno">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Rut</label>
                                                <input type="text" class="form-control" id="txtRut" name="txtRut" placeholder="Ingrese rut sin numero verificador">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Especialidad</label>
                                                <input type="text" class="form-control" id="txtEspecialidad" name="txtEspecialidad" placeholder="Ingrese especialidad del abogado">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Valor Por Hora</label>
                                                <input type="text" class="form-control" id="txtValor" name="txtValor" placeholder="Ingrese rut sin numero verificador">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Fecha De Contrato</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    <input type="text" class="form-control" id="txtFechaContrato" name="txtFechaContrato" placeholder="Formato dd-mm-yyyy">
                                                </div>                                              
                                            </div>
                                            <div class="form-group col-md-1 col-md-offset-3">
                                                <label>&nbsp</label>
                                                <div class="input-group">   
                                                <button type="submit" class="btn btn-success">&nbsp&nbsp&nbsp&nbsp Registrar &nbsp&nbsp&nbsp&nbsp</button>
                                                </div>
                                            </div>
                                        </form>
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
	<script>
	$(function($) {	
		//datepicker
		$('#txtFechaContrato').datepicker({
		  format: 'dd-mm-yyyy'
		});		
	});
	</script>

    </body>
</html>
