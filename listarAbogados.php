<?php
require_once './include/include_valida_session.php';
require_once './EasyPDO/conexionPDO.php';

//        Consulta a la tablas categoria

$sql_ABOGADOS = $db->get_results("SELECT ID_ABOGADO, RUT_ABOGADO,NOMBRE_ABO,APELLIDOP_ABO,APELLIDOM_ABO,FECHA_CONTRATO,(SELECT NOMBRE FROM duralex.especialidad WHERE ID_ESPECIALIDAD = ABOGADOS.ID_ESPECIALIDAD) ID_ESPECIALIDAD,VALOR_X_HORA FROM duralex.ABOGADOS");
$sql_ESPECIALIDAD = $db->get_results("SELECT * FROM duralex.ESPECIALIDAD");
//         Fin consultas

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Duralex - Listar Abogados</title>
        <!-- bootstrap -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css" />
         <!-- this page specific styles -->
	<link rel="stylesheet" type="text/css" href="css/libs/nifty-component.css"/>
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
        <link rel="stylesheet" type="text/css" href="css/libs/ns-default.css"/>
	<link rel="stylesheet" type="text/css" href="css/libs/ns-style-growl.css"/>
	<link rel="stylesheet" type="text/css" href="css/libs/ns-style-bar.css"/>
	<link rel="stylesheet" type="text/css" href="css/libs/ns-style-attached.css"/>
	<link rel="stylesheet" type="text/css" href="css/libs/ns-style-other.css"/>
	<link rel="stylesheet" type="text/css" href="css/libs/ns-style-theme.css"/>
        <link rel="stylesheet" href="css/libs/select2.css" type="text/css" />
        <!-- libraries -->
	<link rel="stylesheet" type="text/css" href="css/libs/font-awesome.css" />
	<link rel="stylesheet" type="text/css" href="css/libs/nanoscroller.css" />

	<!-- global styles -->
	<link rel="stylesheet" type="text/css" href="css/compiled/theme_styles.css" />
        <!-- google font libraries -->
        <link href='//fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400' rel='stylesheet' type='text/css'>

    </head>
    <body>
        
        <div class="md-modal md-effect-7" id="modal_1">
		<div class="md-content">
			<div class="modal-header">
				<button class="md-close close">&times;</button>
				<h4 class="modal-title">Registrar Abogado</h4>
			</div>
			<div class="modal-body">
<!--				MODAL BODY-->
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
                                            <div class="form-group col-md-6 form-group-select2">
                                                <label>Cliente</label>
                                                <select style="width:300px" id="ddlEspecialidad" name="ddlEspecialidad">
                                                    <option value="0">Seleccione Especialidad</option>
                                                        <?php
                                                    foreach ($sql_ESPECIALIDAD as $key => $especialidad) {
                                                        ?>									
                                                        <option value="<?php echo $especialidad->ID_ESPECIALIDAD; ?>"><?php echo $especialidad->NOMBRE ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Valor Por Hora</label>
                                                <input type="text" class="form-control" id="txtValor" name="txtValor" placeholder="Ingrese valor">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Fecha De Contrato</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    <input type="text" class="form-control" id="txtFechaContrato" name="txtFechaContrato" placeholder="Formato dd-mm-yyyy">
                                                </div>                                              
                                            </div>
                                          <div class="form-group col-md-6 ">
                                               <button type="submit" class="btn  btn-success">Registrar</button>&nbsp&nbsp&nbsp
                                               <a class="btn  btn-warning" href="listarAbogados.php">Volver</a>
                                         </div>
                                        </form>


<!--                            MODAL BODY-->
			</div>
			   <div class="clearfix"></div>
		</div>
	</div>
        
        
        
        
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
                                        <li >
                                            <a href="index.php" >
                                                <i class="fa fa-dashboard"></i>
                                                <span>Inicio</span>
                                            </a>
                                        </li>
                                        
                                        <li class="active" >
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
                                                <li class="active" >
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
                                        <li class="open" >
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
                        <div class="row">
                            <div class="col-lg-10 col-lg-offset-1">
                                <div class="main-box">
                                    <header class="main-box-header clearfix">
                                        <h2>Registrar Abogado</h2>
                                    </header>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="main-box clearfix">
                                                <header class="main-box-header clearfix">
                                                    <h2 class="pull-left">Abogados</h2>
                                                    <?php if($_SESSION['tipo']!= 1 && $_SESSION['tipo']!= 3){ ?>
                                                      <div class="filter-block pull-right">

                                                        <a class="md-trigger btn btn-primary mrg-b-lg" data-modal="modal_1">
                                                            <i class="fa fa-plus-circle fa-lg"></i> Registrar Abogado
                                                        </a>
                                                    </div>
                                                    <?php } ?> 
                                                    
                                                </header>

                                                <div class="main-box-body clearfix">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-left"><a><span>Rut</span></a></th>
                                                                    <th class="text-left"><a><span>Nombre</span></a></th>
                                                                    <th class="text-left"><a><span>Fecha De Contrato</span></a></th>
                                                                    <th class="text-left"><a><span>Especialidad</span></a></th>
                                                                    <th class="text-left"><a><span>Valor Por Hora</span></a></th>
                                                                    <th class="text-left"><a><span>Eliminar</span></a></th>
                                                                    <th>&nbsp;</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                 <?php
                                                                foreach ($sql_ABOGADOS as $key => $abogado) 
                                                                    {
                                                                    ?>	
                                                                <tr>
                                                                <td class="text-left"> 
                                                                  <a><?php echo $abogado->RUT_ABOGADO; ?></a>   
                                                                </td>
                                                                <td class="text-left"> 
                                                                    <?php echo $abogado->NOMBRE_ABO.' '.$abogado->APELLIDOP_ABO.' '.$abogado->APELLIDOM_ABO; ?>
                                                                </td>
                                                                <td class="text-left"> 
                                                                    <?php echo $abogado->FECHA_CONTRATO; ?>
                                                                </td>
                                                                <td class="text-left"> 
                                                                   <span class="label label-primary"><?php echo $abogado->ID_ESPECIALIDAD; ?></span> 
                                                                </td>
                                                                <td class="text-left"> 
                                                                    <?php echo "$ ".$abogado->VALOR_X_HORA; ?>
                                                                </td>
                                                                <?php if($_SESSION['tipo']!= 1 && $_SESSION['tipo']!= 3){ ?>
                                                                <td style="width: 15%;">
                                                                      
                                                                        <a href="BO/eliminarAbogado.php?id=<?php echo $abogado->id; ?>" onclick="return confirm('¿Esta seguro de eliminar el abogado?')" class="table-link danger">
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
<!-- this page specific scripts -->
	<script src="js/modernizr.custom.js"></script>
	<script src="js/classie.js"></script>
	<script src="js/modalEffects.js"></script>

	<!-- theme scripts -->
	<script src="js/scripts.js"></script>
	<script src="js/pace.min.js"></script>
         <script src="js/select2.min.js"></script>
        	<!-- this page specific scripts -->
	<script src="js/modernizr.custom.js"></script>
	<script src="js/snap.svg-min.js"></script> <!-- For Corner Expand and Loading circle effect only -->
	<script src="js/classie.js"></script>
	<script src="js/notificationFx.js"></script>
        
        <!-- Jquery Validate -->
    <script src="js/jquery.validate.min.js"></script>
     <!-- Jquery Rut -->
    <script src="js/jquery.Rut.js" type="text/javascript"></script>
        <!-- theme scripts -->
        <script src="js/scripts.js"></script>
        <script src="js/pace.min.js"></script>

<!-- this page specific inline scripts -->

<div class="md-overlay"></div><!-- the overlay element -->
    </body>
</html>
<script>
$( document ).ready(function() {
    
    jQuery.extend(jQuery.validator.messages, {
  required: "Este campo es obligatorio.",
  remote: "Por favor, rellena este campo.",
  email: "Por favor, escribe una dirección de correo válida",
  url: "Por favor, escribe una URL válida.",
  date: "Por favor, escribe una fecha válida.",
  dateISO: "Por favor, escribe una fecha (ISO) válida.",
  number: "Por favor, escribe un número entero válido.",
  digits: "Por favor, escribe sólo dígitos.",
  creditcard: "Por favor, escribe un número de tarjeta válido.",
  equalTo: "Por favor, escribe el mismo valor de nuevo.",
  accept: "Por favor, escribe un valor con una extensión aceptada.",
  maxlength: jQuery.validator.format("Por favor, no escribas más de {0} caracteres."),
  minlength: jQuery.validator.format("Por favor, no escribas menos de {0} caracteres."),
  rangelength: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1} caracteres."),
  range: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1}."),
  max: jQuery.validator.format("Por favor, escribe un valor menor o igual a {0}."),
  min: jQuery.validator.format("Por favor, escribe un valor mayor o igual a {0}.")
});
 $.validator.addMethod("valueNotEquals", function(value, element, arg){
  return arg != value;
 }, "Seleccione una Opcion");


    $('#ddlEspecialidad').select2();

     
  //Agregar validacion de rut a Jquery validate
            jQuery.validator.addMethod("Rut", function(value, element){
             if ($.Rut.validar(value)) {
                 return true;
             } else {
                 return false;
             };
                }, "El RUT ingresado no es válido"); 
          
            //funcion que valida campos
            $("#form_abogado").validate({
                rules: {
                    txtRut: {
                        required: true,
                         Rut : true,
                        number:true
                    },
                    ddlEspecialidad: {
                        valueNotEquals: "0" 
                    },
                    txtNombre:{
                        required: true
                         
                    },
                    txtApellidoP:{
                        required: true
                         
                    },
                    txtApellidoM:{
                        required: true
                         
                    },
                    txtValor:{
                        required: true,
                         number:true
                    },
                    txtFechaContrato:{
                        required: true,
                    }
                    
                    
                    
        }
            });
            
            
            $('#txtFechaContrato').datepicker({
		  format: 'dd-mm-yyyy',
                   autoclose: true
		});
    
    
   });
   
    

</script> 


	  <?php 
      
         if(isset($_GET['res'])) {
            if($_GET['res']==1){
              ?>     
                    <script>
     // create the notification
            var notification = new NotificationFx({
                    wrapper: document .body,
                    message : '<span class="fa fa-check fa-3x pull-left"></span>Abogado ha sido creado <a href="#">Exitosamente!</a>.',
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
            }else if($_GET['res']==2){
               ?>   
         <script>
     // create the notification
            var notification = new NotificationFx({
                    wrapper: document .body,
                    message : '<span class="fa fa-check fa-3x pull-left"></span><p>Abogado ha sido Eliminado <a href="#">Exitosamente!</a>.</p>',
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
     					