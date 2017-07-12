<?php
require_once './include/include_valida_session.php';
require_once './EasyPDO/conexionPDO.php';

//        Consulta a la tablas categoria
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
        
	<link rel="stylesheet" type="text/css" href="css/libs/nifty-component.css"/>

	<!-- this page specific styles -->
	<link rel="stylesheet" href="css/libs/datepicker.css" type="text/css" />
	<link rel="stylesheet" href="css/libs/daterangepicker.css" type="text/css" />
	<link rel="stylesheet" href="css/libs/bootstrap-timepicker.css" type="text/css" />
	<link rel="stylesheet" href="css/libs/select2.css" type="text/css" />
         <!-- this page specific styles -->
        <link rel="stylesheet" href="css/libs/daterangepicker.css" type="text/css" />
          <link type="image/x-icon" href="favicon.png" rel="shortcut icon"/>
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
        
        <div class="md-modal md-effect-7" id="modal_1">
		<div class="md-content">
			<div class="modal-header">
				<button class="md-close close">&times;</button>
				<h4 class="modal-title">Registrar Atención</h4>
			</div>
			<div class="modal-body">
<!--				MODAL BODY-->
                               <form id="form_atencion" method="POST" enctype="multipart/form-data" action="BO/registroAtencion.php">
                                             <div class="form-group form-group-select2 col-md-6">
                                                <label>Abogado</label>
                                                <select style="width:300px" id="sel2" name="sel2">
                                                    <option value="0">Seleccione el abogado</option>
                                                        <?php
                                                    foreach ($sql_ABOGADOS as $key => $abogado) {
                                                        ?>									
                                                        <option value="<?php echo $abogado->ID_ABOGADO; ?>"><?php echo $abogado->NOMBRE_ABO." ".$abogado->APELLIDOP_ABO." ".$abogado->APELLIDOM_ABO ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6 form-group-select2">
                                                <label>Cliente</label>
                                                <select style="width:300px" id="sel3" name="sel3">
                                                    <option value="0">Seleccione el cliente</option>
                                                        <?php
                                                    foreach ($sql_CLIENTES as $key => $cliente) {
                                                        ?>									
                                                        <option value="<?php echo $cliente->ID_CLIENTE; ?>"><?php echo $cliente->NOMBRE_CLI." ".$cliente->APELLIDOP_CLI." ".$cliente->APELLIDOM_CLI  ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            
                                            <div class="form-group col-md-6">
                                                <label>Fecha De Atencion</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    <input type="text" class="form-control" id="txtFecha" name="txtFecha" placeholder="Formato dd-mm-yyyy">
                                                </div>                                              
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="timepicker">Hora De Atencion</label>
                                                <div class="input-group input-append bootstrap-timepicker">
                                                    <input type="text" class="form-control" id="timepicker" name="timepicker">
                                                    <span class="add-on input-group-addon"><i class="fa fa-clock-o"></i></span>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-1 col-md-offset-2">
                                                <label>&nbsp</label>
                                                <div class="input-group">   
                                                <button type="submit" class="btn btn-success">&nbsp&nbsp&nbsp&nbsp AGENDAR &nbsp&nbsp&nbsp&nbsp</button>
                                                </div>
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
                                        
                                        <li class="active" >
                                            <a href="#" class="dropdown-toggle">
                                                <i class="fa fa-table"></i>
                                                <span>Administrar</span>
                                                <i class="fa fa-chevron-circle-right drop-icon"></i>
                                            </a>
                                            <ul class="submenu">
                                                     <?php if($_SESSION['tipo']!= 4){ ?>
                                                <li class="active">
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
                                        <h2>Listado De Atenciones</h2>
                                    </header>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="main-box clearfix">
                                                <header class="main-box-header clearfix">
                                                    <h2 class="pull-left">Atenciones</h2>
                                                    <?php if($_SESSION['tipo']!= 1 && $_SESSION['tipo']!= 4){ ?>
                                                       <div class="filter-block pull-right">

                                                       <a class="md-trigger btn btn-primary mrg-b-lg" data-modal="modal_1">
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
                                                                    <th class="text-center"><a><span>Cambiar Estado</span></a></th>
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
                                                                
                                                                 <?php if($_SESSION['tipo']!= 1 && $_SESSION['tipo']!= 4){ ?>
                                                                 <td>    
                                                                    <div class="form-group-select2">
                                                                        <select style="width:170px" id="<?php echo "sel".$atencion->id; ?>" name="sel3">
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

<!-- this page specific inline scripts -->
	

    </body>
</html>

<script>
$( document ).ready(function() {
    
     
            window.ActualizarEstado =  function(id){
                 if($('#sel'+id).val() == 0){
                    var notification = new NotificationFx({
                    wrapper: document .body,
                    message : '<span class="fa  fa-warning fa-3x pull-left"></span><p><a href="#">Atención!</a><br>Debe selecionar un estado antes de modificar.</p>',
                    layout : 'attached',
                    effect : 'bouncyflip',
                    type : 'warning', // notice, warning or error
                    onClose : function() {

                    }
            });

            // show the notification
            notification.show();
                   return ;
               }
               
               if (confirm("Esta seguro de actualizar el estado?")) 
               {
               window.location.href = "/Duralex/BO/cambiarEstadoAtencion.php?id="+$('#sel'+id+'').val()+"&idAtencion="+id;
                } 
               
              
             }  
    $('#txtFecha').datepicker({
		  format: 'dd-mm-yyyy',
                   autoclose: true
		});
                
                //nice select boxes
		$('#sel2').select2();
                $('#sel3').select2();
              
                //timepicker
		$('#timepicker').timepicker({
			minuteStep: 5,
			showSeconds: false,
			showMeridian: false,
			disableFocus: false,
			showWidget: true
		}).focus(function() {
			$(this).next().trigger('click');
		});
    
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


  
          
            //funcion que valida campos
            $("#form_atencion").validate({
                rules: {
                    sel2: {
                         valueNotEquals: "0" 
                    },
                    sel3: {
                        valueNotEquals: "0" 
                    },
                    txtFecha:{
                        required: true
                         
                    },
                    timepicker:{
                        required: true
                         
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
                    message : '<span class="fa fa-check fa-3x pull-left"></span>Atención ha sido creado <a href="#">Exitosamente!</a>.',
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
                    message : '<span class="fa fa-check fa-3x pull-left"></span><p>Estado ha sido Modificado <a href="#">Exitosamente!</a>.</p>',
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
     				