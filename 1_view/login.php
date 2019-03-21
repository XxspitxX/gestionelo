<?php
if ( ! session_id() ) session_start();

	$_SESSION['Email'] = "";
	$_SESSION["IdUserNet"] = "";
	$_SESSION["IdEmpresa"] = "";
	$_SESSION["IdUsuario"] = "";
	$_SESSION["Alias"] = "";
	$_SESSION["NivelAdmin"] = "";
	session_destroy();

//initilize the page
require_once '../init.php';

/*---------------- PHP Custom Scripts ---------

YOU CAN SET CONFIGURATION VARIABLES HERE BEFORE IT GOES TO NAV, RIBBON, ETC.
E.G. $page_title = "Custom Title" */

$page_title = "Login";

/* ---------------- END PHP Custom Scripts ------------- */

//include header
//you can add your custom css in $page_css array.
//Note: all css files are inside css/ folder
//$page_css[] = "your_style.css";
$page_css[] = "";
$no_main_header = true;
$page_body_prop = array("id"=>"extr-page", "class"=>"animated fadeInDown");
include("../inc/header.php");


?>

<body <?php echo implode(' ', array_map(function($prop, $value) {
			return $prop.'="'.$value.'"';
		}, array_keys($page_body_prop), $page_body_prop)) ;?>>
		<!-- POSSIBLE CLASSES: minified, fixed-ribbon, fixed-header, fixed-width
			 You can also add different skin classes such as "smart-skin-1", "smart-skin-2" etc...-->
<!-- ==========================CONTENT STARTS HERE ========================== -->
<!-- possible classes: minified, no-right-panel, fixed-ribbon, fixed-header, fixed-width-->
<header id="header">
	<!--<span id="logo"></span>-->

	<div id="logo-group">
		<span id="logo"> <img src="<?php echo ASSETS_URL; ?>/img/logo.png" alt="Gestiónalo.com"> </span>

		<!-- END AJAX-DROPDOWN -->
	</div>

	<span id="extr-page-header-space"> <span class="hidden-mobile hiddex-xs">No estas registrado?</span> <a href="<?php echo APP_URL; ?>/register.php" class="btn btn-danger">Registrarse</a> </span>

</header>

<div id="main" role="main">

	<!-- MAIN CONTENT -->
	<div id="content" class="container">

		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-7 col-lg-8 hidden-xs hidden-sm">
				<h1 class="txt-color-red login-header-big">Gestiónalo.com</h1>
				<div class="hero">

					<div class="pull-left login-desc-box-l">
						<h4 class="paragraph-header">Gestiónalo.com  te ayuda a mantener tus procesos estandárizados, a gestionar adecuadamente tus compromisos, riesgos, compras, activos, proyectos y todo lo relacionado con la mejora continua de tu organización..</h4>
						<div class="login-app-icons">
							<a href="javascript:void(0);" class="btn btn-danger btn-sm">Manual</a>
							<a href="javascript:void(0);" class="btn btn-danger btn-sm">Video</a>
						</div>
					</div>
					
					<img src="<?php echo ASSETS_URL; ?>/img/demo/iphoneview.png" class="pull-right display-image" alt="" style="width:210px">

				</div>

			</div>
			<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
				<div class="well no-padding">
					<form  id="login-form" class="smart-form client-form">
						<header>
							Ingreso
						</header>

						<fieldset>
							<div id="divMensajeLogin"></div>
							<section>
								<label class="label">E-mail</label>
								<label class="input"> <i class="icon-append fa fa-user"></i>
									<input type="email" name="email" id="email">
									<b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Por favor ingrese E-mail/Usuario</b></label>
							</section>

							<section>
								<label class="label">Contraseña</label>
								<label class="input"> <i class="icon-append fa fa-lock"></i>
									<input type="password" name="password" id="password">
									<b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Ingrese su Contraseña</b> </label>
								<div class="note">
									<a href="<?php echo APP_URL; ?>/forgotpassword.php">Olvido su Contraseña?</a>
								</div>
							</section>

							<section>
								<label class="checkbox">
									<input type="checkbox" name="remember" checked="">
									<i></i>Mantener ingreso</label>
							</section>
						</fieldset>
						<footer>
							<button type="button" class="btn btn-primary" onclick="fn_login_form_submit()">
								Entrar
							</button>
						</footer>
					</form>

				</div>
				
			
			</div>
		</div>
	</div>

</div>
<!-- END MAIN PANEL -->
<!-- ==========================CONTENT ENDS HERE ========================== -->

<?php 
	//include required scripts
	include("../inc/scripts.php"); 
?>
<script src="<?php echo ASSETS_URL; ?>/4_Utils/Utils.js?v=1"></script>
<script src="<?php echo ASSETS_URL; ?>/1_view/login_view.js?v=1"></script>


<?php 
	//include footer
	include("../inc/google-analytics.php"); 
?>