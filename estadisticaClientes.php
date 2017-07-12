<?php
require_once './EasyPDO/conexionPDO.php';
require_once './include/include_valida_session.php';

//        Consulta a la tablas categoria




//         Fin consultas

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Duralex - Estadisticas de Usuarios</title>
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
        <link rel="stylesheet" href="css/libs/morris.css" type="text/css" />
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
	<!-- Favicon -->
	<link type="image/x-icon" href="favicon.png" rel="shortcut icon"/>
        <!-- this page specific styles -->
	<link rel="stylesheet" href="css/libs/morris.css" type="text/css" />
	

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
                                        <li class="active">
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
                                                
                                                <li class="active">
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
                                        <h1 style="text-align: center;">Estadistica De Clientes</h1>
                                    </header>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="main-box clearfix">
                                                <div class="col-lg-8 col-lg-offset-2">
                                                    <header style="margin-bottom: -10px; margin-left: -12px;" class="main-box-header clearfix">
                                                    <h2 style="text-align:left;">FILTROS DE BUSQUEDA</h2>                                                  
                                                </header>
                                                    <form id="form_filtro" method="POST" action="">
                                                 <div class="form-group col-md-6">
                                                <label>Meses</label>
                                                <input type="number" class="form-control" id="txtMeses" name="txtValor" placeholder="Ingrese Meses">
                                                 </div>
                                                   <div class="form-group col-md-6 form-group-select2">
                                                <label>Tipo de Persona</label>
                                                <select style="width:300px" id="ddltipo" name="ddlEspecialidad">
                                                    <option value="0">Seleccione Tipo de Persona</option>
                                                    <option value="1">Naturar</option>
                                                    <option value="2">Jurídica</option>
                                                      
                                                </select>
                                            </div>
                                                 <div class="form-group col-lg-4 col-lg-offset-4">
                                                        <div class="form-group">
                                                            <button type="button" id="btnBuscar" style="width:80%; border-radius:4px;" class="btn  btn-success">&nbsp&nbsp&nbsp&nbsp&nbsp&nbspFiltrar&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                </div>                                             
                                            </div>
                                        </div>
                                     </div>
                                    <div class="row">
                                        <div class="col-lg-6">

                                            <div class="main-box-body clearfix">
                                                <div id="hero-donut"></div>
                                            </div>
                                        </div>
                                        
                                        <div id="cantidad" class="infographic-box merged merged-top col-lg-6">
                                            <i class="fa fa-user fa-4x green-bg"></i>
                                            <span id="valor_cli" class="value green">2.562</span>
                                            <span class="headline green">Clientes</span>
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
                                                                    <th class="text-left"><a><span>Nombre</span></a></th>
                                                                    <th class="text-left"><a><span>Rut</span></a></th>
                                                                    <th class="text-left"><a><span>Tipo de persona</span></a></th>
                                                                    <th class="text-left"><a><span>Fecha de registro</span></a></th>
                                                                    <th class="text-left"><a><span>Teléfono</span></a></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="tabla_clientes">
                                                                                                                    
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
        <script src="js/jquery-ui.custom.min.js"></script>
	<script src="js/fullcalendar.min.js"></script>
	<script src="js/jquery.slimscroll.min.js"></script>
	<script src="js/raphael-min.js"></script>
	<script src="js/morris.min.js"></script>
	<script src="js/moment.min.js"></script>
	<script src="js/daterangepicker.js"></script>
	<script src="js/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="js/jquery-jvectormap-world-merc-en.js"></script>
	<script src="js/gdp-data.js"></script>
         <script src="js/select2.min.js"></script>
        <!-- theme scripts -->
        <script src="js/scripts.js"></script>
        <script src="js/pace.min.js"></script>
        
        <!-- this page specific scripts -->
	<script src="js/jquery.knob.js"></script>
	<script src="js/raphael-min.js"></script>
	<script src="js/morris.js"></script>
	

<!-- this page specific inline scripts -->
	

    </body>
</html>


 <script>
      
   $( document ).ready(function() {
       
       
         $("#cantidad").hide(); 
       
     $('#ddltipo').select2();   
     
      //BOTON AGREGAR MEDICAMNETO CON LLAMADA AJAX
             $("#btnBuscar").click(function(){
            
           //    INICIO AJAX CREAR PRESCRIPCION
     
           var id_tipo = $("#ddltipo").val();
           var meses = $("#txtMeses").val();
           
      
            var parametros = {"ddlTipo" : id_tipo, "txtMeses" : meses};

          $.ajax({
              data:  parametros,
              url:   'BO/filtrarClientes.php',
              type:  'post',
               success: function(data) 
               {  var obj = jQuery.parseJSON( data );
                 $("#hero-donut").empty(); 
                  $("#cantidad").show(); 
                  
                   
                   var total_natural = 0;
                   var total_juridica = 0;
                   for( var i=0; i< obj.length ; i++){
                    if(obj[i].TIPO_PERSONA==1){
                        total_natural ++;
                    }else{
                        total_juridica ++;
                    }
                        
                   }
                 
                   $("#valor_cli").text(obj.length);
                  //             GRAFICO
             	graphDonut = Morris.Donut({
			element: 'hero-donut',
			data: [
				{label: 'Jurídicas', value: total_natural },
				{label: 'Naturales', value: total_juridica }
			],
			colors: ['#2ecc71', '#f1c40f', '#e74c3c', '#3498db', '#9b59b6', '#95a5a6'],
			formatter: function (y) { return y + "%" },
			resize: true
		});
                   
                 if(obj[0].NOMBRE_CLI != null){
                    $("#tabla_clientes").empty();
                    for( var i=0; i< obj.length ; i++){
                        var persona;
                        if(obj[i].TIPO_PERSONA==1){
                          persona = ' <span class="label label-success">Natural</span> ';  
                        }else{
                             persona = '<span class="label label-primary">Juridica</span>';
                        }
                        
			  var item = "<tr>"+
 				"	<td><a href=\"#\">"+obj[i].NOMBRE_CLI+" "+obj[i].APELLIDOP_CLI+""+obj[i].APELLIDOM_CLI+"</a></td>"+
 				"	<td>"+obj[i].RUT_CLIENTE+"</td>"+
 				"	<td>"+persona+"</td>"+
 				"	<td>"+obj[i].FECHA_REGISTRO+"</td>"+
 				"	<td>"+obj[i].TELEFONO+"</td>"+
 				"</tr>";
                     $("#tabla_clientes").append(item);
		}
                
                     
                 }
              }
               
              });
            
            });  
            

   
             


                    
   
    
   });
	</script>
        
						