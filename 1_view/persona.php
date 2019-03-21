<?php 
define('__ROOT__', dirname(dirname(__FILE__))); 
//require_once (__DIR__).'../init.php';
require_once(__ROOT__.'/init.php'); 
// echo 
?>
<!-- --------------------------------Librerias No se elimina-------------------------------------------------------------------->
<link rel="stylesheet" type="text/css" href="Table/librerias/alertifyjs/css/alertify.css">
<link rel="stylesheet" type="text/css" href="Table/librerias/alertifyjs/css/themes/default.css">
<script src="Table/librerias/alertifyjs/alertify.js"></script>
<div class="row">
	<div class="col-sm-12">
		
	<h1 class="page-title txt-color-blueDark">

                            <!-- PAGE HEADER -->
                            <i class="glyphicon glyphicon-globe"></i> 
                                    Registro de Origen
                    </h1> 
					 
            <article class="col-sm-12 col-md-12">
                <div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-1" data-widget-editbutton="false">

                                    <!-- widget options:
                                    usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

                                    data-widget-colorbutton="false"
                                    data-widget-editbutton="false"
                                    data-widget-togglebutton="false"
                                    data-widget-deletebutton="false"
                                    data-widget-fullscreenbutton="false"
                                    data-widget-custombutton="false"
                                    data-widget-collapsed="true"
                                    data-widget-sortable="false"

                                    -->
		<caption>
			
				<header><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
                        <span class="widget-icon">
                        <i class="fa fa-table"></i>
                        </span>
                        <h2>Lista Personas</h2>
                </header>

                <!-- widget div-->
                <div>

                <!-- widget edit box -->
                <div class="jarviswidget-editbox">
                        <!-- This area used as dropdown edit box -->

                </div>
                <!-- end widget edit box -->


				<!-------------------- Bottom Agregar Nuevo------------------------------->
			<button class="btn btn-primary" data-toggle="modal" data-target="#modalNuevo" margin-top="20px" onclick="limpiar()">
				Agregar nuevo 
				<span class="glyphicon glyphicon-plus" margin-bottom="20px"></span>
			</button>
      <button id="btnEditarModal" class="btn btn-primary" data-toggle="modal" data-target="#ModalEdicion" margin-top="20px" style="display: none;">
				Editar 
			</button>
      <button id="btnEliminarModal" class="btn btn-primary" data-toggle="modal" data-target="#ModalEliminar" margin-top="20px" style="display: none;">
				Eliminar 
			</button>
		</caption>
		
		<!---------------------------Tabla------------------------------------------>
		<table id="grvDatos"  class="table table-hover table-condensed table-bordered">
		<thead>
			<tr>
					<th data-hide="phone">Id</th>
					<th>Nombre</th>
					<th>Apellido</th>                                        
					<th data-hide="phone"><i class="fa fa-fw fa-phone text-muted hidden-md hidden-sm hidden-xs"></i> Email</th>
					<th data-hide="phone,tablet"><i class="fa fa-fw fa-map-marker txt-color-blue hidden-md hidden-sm hidden-xs"></i> Telefono</th>
					<th>Editar</th>
					<th>Eliminar</th>
			</tr>
		</thead>
		<tbody>
			
		</tbody>		
		</table>
	</div>
</div>

<!--************************************************ Modal Para Agregar Personas *******************************************-->
<form action="" id="form1"  novalidate="novalidate" >
<div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"onsubmit="return ValidaDatos()">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <div id="divMensajeR"></div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Agrega nueva persona</h4>
        
      </div>
      <div class="modal-body">
      <div id="divMensajeAgregar"></div>
      <input style="display:none" type="text" name="id" id="id" class="form-control input-sm" readonly>
        	<input type="text"   id="nombre" name="nombre" place class="form-control input-sm"placeholder="Nombre" required maxlength="100">
        	<input type="text"  id="apellido" name="apellido"  class="form-control input-sm" placeholder="Apellido" required maxlength="100" >
        	<input type="email"  id="email" name="email" class="form-control input-sm" placeholder="Correo"  required maxlength="100" >
        	<input type="text" id="telefono" name= "telefono" class="form-control input-sm" placeholder="Telefono" required maxlength="100">
      </div>
      <div class="modal-footer">
      <a Id="button" class="btn btn-default" data-dismiss="modal">Cerrar</a>
      <a Id="btn_guardar" class="btn btn-primary" href="javascript:fn_tab1_guardar_submit();">Agregar</a>
      </div>
    </div>
  </div>
</div>
</form>
<!--******************************************* Modal para edicion de datos ***************************************-->

<form action="" id="feditar"  novalidate="novalidate">
<div class="modal fade" id="ModalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar datos</h4>
      </div>
      <div id="divMensajeEdicion"></div>
      <div class="modal-body">
          <input style="display:none" type="text" name="id" id="id" class="form-control input-sm" readonly>
        	<input type="text" name="nombre" id="nombre" class="form-control input-sm" placeholder="Nombre" required maxlength="50" >
        	<input type="text" name="apellido" id="apellido" class="form-control input-sm" placeholder="Apellido"required maxlength="50" >
        	<input type="email" name="email" id="email" class="form-control input-sm"  placeholder="Email"required maxlength="50">
        	<input type="text" name="telefono" id="telefono" class="form-control input-sm" placeholder="Telefono"required maxlength="50" >
      </div>
      <div class="modal-footer">
      <a Id="button" class="btn btn-default" data-dismiss="modal">Cerrar</a>
      <a Id="btn_editar" class="btn btn-warning" href="javascript:fn_tab1_editar_submit();"> Actualizar</a>
        
      </div>
    </div>
  </div>
</div>
</form>

<!--******************************************* Modal para eliminar datos ***************************************-->
<form action="" id="feliminar"  novalidate="novalidate">
<div class="modal fade" id="ModalEliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
      </div>
      <div class="modal-body">
      <h3>¿Desea Eliminar Registro?</h3>
      </div>
      <div class="modal-footer">
      <a Id="button" class="btn btn-default" data-dismiss="modal">No</a>
      <button id="btn_eliminar" class="btn btn-danger" onclick="fn_tab1_eliminar_submit()" data-dismiss="modal">
        Si 
      </button>

<!-- ************************* Fin General  *************************************************-->

<script src="<?php echo ASSETS_URL; ?>/4_Utils/Utils.js?v=1"></script>
<script src="<?php echo ASSETS_URL; ?>/1_view/persona_view.js?v=6"></script>
