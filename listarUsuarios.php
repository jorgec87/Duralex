<?php
require_once './include/include_valida_session.php';
require_once './EasyPDO/conexionPDO.php';


$sql_TIPO_USUARIO = $db->get_results("SELECT * FROM duralex.TIPO_USUARIO");


$sql_usuarios = $db->get_results("SELECT ID_USUARIO id, concat(us.NOMBRE_USER,' ',us.APELLIDOP_USER,' ',us.APELLIDOM_USER) nombre,us.RUT_USUARIO rut,(SELECT ti.DESCRIPCION FROM duralex.tipo_usuario ti WHERE ti.ID_TIPO_USUARIO = us.ID_TIPO_USUARIO) tipo FROM duralex.usuarios us");

//         Fin consultas

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Duralex - Listar Usuarios</title>
        <!-- bootstrap -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css" />
        
	<link rel="stylesheet" type="text/css" href="css/libs/nifty-component.css"/>
       <!-- libraries -->
        <link rel="stylesheet" type="text/css" href="css/libs/font-awesome.css" />
     
        <link rel="stylesheet" href="css/libs/select2.css" type="text/css" />
        <!-- global styles -->
        <link rel="stylesheet" type="text/css" href="css/compiled/theme_styles.css" />
        <!-- this page specific styles -->
        <link rel="stylesheet" href="css/libs/daterangepicker.css" type="text/css" />
          <link type="image/x-icon" href="favicon.png" rel="shortcut icon"/>
        <link rel="stylesheet" type="text/css" href="css/libs/ns-default.css"/>
	<link rel="stylesheet" type="text/css" href="css/libs/ns-style-growl.css"/>
	<link rel="stylesheet" type="text/css" href="css/libs/ns-style-bar.css"/>
	<link rel="stylesheet" type="text/css" href="css/libs/ns-style-attached.css"/>
	<link rel="stylesheet" type="text/css" href="css/libs/ns-style-other.css"/>
	<link rel="stylesheet" type="text/css" href="css/libs/ns-style-theme.css"/>
        
       
        <!-- google font libraries -->
        <link href='//fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400' rel='stylesheet' type='text/css'>

    </head>
    <body>
        
        <div class="md-modal md-effect-7" id="modal_1">
		<div class="md-content">
			<div class="modal-header">
				<button class="md-close close">&times;</button>
				<h4 class="modal-title">Agregar Usuario</h4>
			</div>
			<div class="modal-body">
<!--				MODAL BODY-->
                               <form id="form_usuario" method="POST" action="BO/registroUsuario.php">
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
                                                <label>Contraseña</label>
                                                <input type="password" class="form-control" id="txtPass" name="txtPass" placeholder="Ingrese Contraseña">
                                            </div>
                                              <div class="form-group col-md-6 form-group-select2">
                                                <label>Cliente</label>
                                                <select style="width:300px" id="ddl_select_tipo" name="ddl_select_tipo">
                                                    <option value="0">Seleccione el cliente</option>
                                                        <?php
                                                    foreach ($sql_TIPO_USUARIO as $key => $tipo) {
                                                        ?>									
                                                        <option value="<?php echo $tipo->ID_TIPO_USUARIO; ?>"><?php echo $tipo->DESCRIPCION; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                               <button type="submit" class="btn  btn-success">Registrar</button>&nbsp&nbsp&nbsp
                                              <a class="btn  btn-warning" href="listarUsuarios.php">Volver</a>
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
                                        <li >
                                            <a href="index.php" >
                                                <i class="fa fa-dashboard"></i>
                                                <span>Inicio</span>
                                            </a>
                                        </li>
                                        
                                        <li class="active">
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
                                               
                                                    <?php if($_SESSION['tipo']!= 1 || $_SESSION['tipo']!= 3 || $_SESSION['tipo']!= 4){ ?>
                                                   <li class="active">
                                                     <a href="listarUsuarios.php">
                                                        Usuarios
                                                    </a>
                                                </li>
                                                <?php } ?> 
                                            </ul>
                                        </li>
                                        <?php if($_SESSION['tipo']== 1 || $_SESSION['tipo']== 2){ ?>
                                        <li class="open">
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
                                        <h2>Usuarios</h2>
                                    </header>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="main-box clearfix">
                                                <header class="main-box-header clearfix">
                                                  <div class="filter-block pull-right">
                                                      <a class="md-trigger btn btn-primary mrg-b-lg" data-modal="modal_1">
                                                            <i class="fa fa-plus-circle fa-lg"></i> Agregar Usuario
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
                                                                    <th class="text-left"><a><span>Tipo</span></a></th>
                                                                    <th class="text-left"><a><span>Acción</span></a></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                 <?php
                                                                foreach ($sql_usuarios as $key => $usuario) 
                                                                    {
                                                                    ?>	
                                                                <tr>
                                                                <td class="text-left"> 
                                                                    <a><?php echo $usuario->nombre; ?></a>  
                                                                </td>
                                                                <td class="text-left"> 
                                                                    <?php echo $usuario->rut; ?>
                                                                </td>
                                                                <td class="text-left"> 
                                                                    <span class="label label-primary"><?php echo $usuario->tipo; ?></span>
                                                                    
                                                                </td>
                                                                <td style="width: 15%;">
                                                                    
                                                                        <a href="BO/eliminarUsuario.php?id=<?php echo $usuario->id; ?>" onclick="return confirm('¿Esta seguro de eliminar usuario?')" class="table-link danger">
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
	<script src="js/modernizr.custom.js"></script>
	<script src="js/classie.js"></script>
	<script src="js/modalEffects.js"></script>

	<!-- theme scripts -->
	<script src="js/scripts.js"></script>
	<script src="js/pace.min.js"></script>
        
        	<!-- this page specific scripts -->
	<script src="js/modernizr.custom.js"></script>
	<script src="js/snap.svg-min.js"></script> <!-- For Corner Expand and Loading circle effect only -->
	<script src="js/classie.js"></script>
	<script src="js/notificationFx.js"></script>
          <script src="js/select2.min.js"></script>
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


    
  //nice select boxes
		$('#ddl_select_tipo').select2();
     
  //Agregar validacion de rut a Jquery validate
            jQuery.validator.addMethod("Rut", function(value, element){
             if ($.Rut.validar(value)) {
                 return true;
             } else {
                 return false;
             };
                }, "El RUT ingresado no es válido"); 
          
            //funcion que valida campos
            $("#form_usuario").validate({
                rules: {
                    txtRut: {
                        required: true,
                         Rut : true,
                        number:true
                    },
                    txtPass: {
                        required: true,
                         minlength: 4
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
                    ddl_select_tipo:{
                        valueNotEquals: "0" 
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
                    message : '<span class="fa fa-check fa-3x pull-left"></span>Usuario ha sido creado <a href="#">Exitosamente!</a>.',
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
                    message : '<span class="fa fa-check fa-3x pull-left"></span><p>Usuario ha sido Eliminado <a href="#">Exitosamente!</a>.</p>',
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
     									