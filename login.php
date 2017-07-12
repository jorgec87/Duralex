<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Duralex - Login</title>
	
	<!-- bootstrap -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css" />
	
	<!-- RTL support - for demo only -->
	<script src="js/demo-rtl.js"></script>
	<!-- 
	If you need RTL support just include here RTL CSS file <link rel="stylesheet" type="text/css" href="css/libs/bootstrap-rtl.min.css" />
	And add "rtl" class to <body> element - e.g. <body class="rtl"> 
	-->
	<link href="css/toastr.min.css" rel="stylesheet" type="text/css"/>
	<!-- libraries -->
	<link rel="stylesheet" type="text/css" href="css/libs/font-awesome.css" />
	<link rel="stylesheet" type="text/css" href="css/libs/nanoscroller.css" />

	<!-- global styles -->
	<link rel="stylesheet" type="text/css" href="css/compiled/theme_styles.css" />
        
        <!-- this page specific styles -->
	<link rel="stylesheet" type="text/css" href="css/libs/ns-default.css"/>
	<link rel="stylesheet" type="text/css" href="css/libs/ns-style-growl.css"/>
	<link rel="stylesheet" type="text/css" href="css/libs/ns-style-bar.css"/>
	<link rel="stylesheet" type="text/css" href="css/libs/ns-style-attached.css"/>
	<link rel="stylesheet" type="text/css" href="css/libs/ns-style-other.css"/>
	<link rel="stylesheet" type="text/css" href="css/libs/ns-style-theme.css"/>

	<!-- this page specific styles -->

	<!-- google font libraries -->
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400' rel='stylesheet' type='text/css'>
	
	<!-- Favicon -->
	<link type="image/x-icon" href="favicon.png" rel="shortcut icon"/>

	<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body id="login-page-full"  class="pace-done theme-blue-gradient fixed-header fixed-leftmenu">
 
    <div id="login-full-wrapper">
        <div class="container">
       <div class="row">
                <div class="col-xs-12">
                    <div id="login-box">
                        <div id="login-box-holder">
                            <div class="row">
                                <div class="col-xs-12">
                                    <header id="login-header">
                                        <div id="login-logo">
                                            <h2>Duralex</h2>
                                        </div>
                                    </header>
                                    <div id="login-box-inner">
                                        <form role="form" id="form_log" method="post" action="BO/procesarLogin.php">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                <input class="form-control" name="txtRut" id="txtRut" type="text" placeholder="Ingrese Rut">
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                                <input type="password" name="txtPass" id="txtPass"class="form-control" placeholder="Contraseña">
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <button type="submit" class="btn btn-success col-xs-12">Ingresar</button>
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
        </div>
    </div>

	
	
	<!-- global scripts -->
	<script src="js/demo-skin-changer.js"></script> <!-- only for demo -->
	
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/jquery.nanoscroller.min.js"></script>
	
	<script src="js/demo.js"></script> <!-- only for demo -->
	
	<!-- this page specific scripts -->
        <script src="js/jquery.Rut.js" type="text/javascript"></script>
  <script src="js/jquery.validate.min.js" type="text/javascript"></script>
	<!-- theme scripts -->
	<script src="js/scripts.js"></script>
	<script src="js/toastr.min.js" type="text/javascript"></script>
	<!-- this page specific inline scripts -->
	
        	<!-- this page specific scripts -->
	<script src="js/modernizr.custom.js"></script>
	<script src="js/snap.svg-min.js"></script> <!-- For Corner Expand and Loading circle effect only -->
	<script src="js/classie.js"></script>
	<script src="js/notificationFx.js"></script>
        
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


    

     
  //Agregar validacion de rut a Jquery validate
            jQuery.validator.addMethod("Rut", function(value, element){
             if ($.Rut.validar(value)) {
                 return true;
             } else {
                 return false;
             };
                }, "El RUT ingresado no es válido"); 
          
            //funcion que valida campos
            $("#form_log").validate({
                rules: {
                    txtRut: {
                        required: true,
                         Rut : true,
                        number:true
                    },
                    txtPass: {
                        required: true,
                         minlength: 4
                    }
                    
        }
            });
    
    
   });
   
    

</script> 
 <?php 
      //mensaje de error desde procesa_login
         if(isset($_GET['error'])) {
            if($_GET['error']==1 || $_GET['error']==2){
              ?>     
                     <script>
    // create the notification
            var notification = new NotificationFx({
                    wrapper: document .body,
                    message : '<span class="fa fa-times fa-3x pull-left"></span><p>Datos de acceso no validos <a href="#">Favor verificar!</a>.</p>',
                    layout : 'attached',
                    effect : 'bouncyflip',
                    type : 'error', // notice, warning or error
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