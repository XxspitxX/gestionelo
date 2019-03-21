<?php 
require_once dirname(__DIR__).'/init.php';
// echo 
?>
<!--*******************************Inicio************************-->
<div class="row">
    <div class="col-sm-12">
    
    <h1 class="page-title txt-color-blueDark">
                <!--****PAGE HEADER ****-->
                <i class="glyphicon glyphicon-hdd   "></i>
                EQUIPOS DE COMPUTO 
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
                    <h2>Equipos de Computo</h2>
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
				<span class="glyphicon glyphicon-plus" ></span>
			</button>
            <button id="btnEditarModal" class="btn btn-primary" data-toggle="modal" data-target="#ModalEdicion" margin-top="20px" style="display: none;">
				Editar 
			</button>
            <button id="btnEliminarModal" class="btn btn-primary" data-toggle="modal" data-target="#ModalEliminar" margin-top="20px" style="display: none;" >
				Eliminar 
			</button>
		</caption>
        <!---------------------------Tabla------------------------------------------>
		<table id="grvDatos"  class="table table-hover table-condensed table-bordered">
		<thead>
			<tr>
					<th data-hide="phone">Id</th>
					<th>Marca</th>
					<th>Referencia</th>                                        
					<th data-hide="phone"><i class="fa fa-fw fa-phone text-muted hidden-md hidden-sm hidden-xs"></i>Perifericos</th>
					<th data-hide="phone,tablet"><i class="fa fa-fw fa-map-marker txt-color-blue hidden-md hidden-sm hidden-xs"></i>Incidencias</th>
					<th>Editar</th>
					<th>Eliminar</th>
			</tr>
		</thead>
		<tbody>
			
		</tbody>		
		</table>
	</div>
</div>
    </div>
    </div>
<!--************************************************ Modal Para Agregar computadores *******************************************-->
    <form action="" id="form1"  novalidate="novalidate">
        <div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Agregar Computador</h4>
                
            </div>
            <div class="modal-body">
            <div id="divMensajeEdicion"></div>
        	<input type="text"   Id="Marca" name="Marca"  class="form-control input-sm" placeholder="Marca" required>
        	<input type="text"  id="Referencia" name="Referencia"  class="form-control input-sm" placeholder="Referencia" required>
        	<input type="text"  id="perifericos" name="perifericos" class="form-control input-sm" placeholder=Perifericos required>
        	<input type="text" id="Incidencias" name= "Incidencias" class="form-control input-sm" placeholder="Incidencias"required>
            <label></label>
      <div class="modal-footer">
        <a id="button" class="btn btn-default" data-dismiss="modal">Cerrar</a>
       <a id="btn_guardar" class="btn btn-primary" href="javascript:fn_tab1_guardar_submit();">Agregar</a>

       
       
      
      </div>
    </div>
  </div>
</div>
</form>
</div>

<!--******************************************* Modal para edicion de datos ***************************************-->

<form action="" id="feditar"  novalidate="novalidate">
<div class="modal fade" id="ModalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar datos</h4>
      </div>
      <div class="modal-body">
          <input style="display:none" type="text" name="id" id="id" class="form-control input-sm" readonly>
        	<label>Marca</label>
        	<input type="text" name="Marca" id="Marca" class="form-control input-sm">
        	<label>Referencia</label>
        	<input type="text" name="Referencia" id="Referencia" class="form-control input-sm">
        	<label>perifericos</label>
        	<input type="text" name="perifericos" id="perifericos" class="form-control input-sm">
        	<label>Incidencias</label>
        	<input type="text" name="Incidencias" id="Incidencias" class="form-control input-sm">
      </div>
      <div class="modal-footer">
      <a id="button" class="btn btn-default" data-dismiss="modal">Cerrar</a>
      <a id="btn_editar" class="btn btn-warning" href="javascript:fn_tab1_editar_submit();" data-dismiss="modal">Actualizar</a>
        
      </div>
    </div>
  </div>
</div>
</form>
<!---------------------Modal Delete---------------------------------------------->
<form action="" id="feliminar"  novalidate="novalidate">
<div class="modal fade" id="ModalEliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Eliminar Datos</h4>
      </div>
      <div class="modal-body">

      <h2>¿ Desea Eliminar Registro ? </h2>
      </div>
      
      <div class="modal-footer">
      <a id="button" class="btn btn-default" data-dismiss="modal">Cancelar</a>
      <a id="btn_eliminar" class="btn btn-warning" href="javascript:fn_tab1_eliminar_submit();" data-dismiss="modal">Eliminar</a>

<!-- ************************* Fin General  *************************************************-->

<script src="<?php echo ASSETS_URL; ?>/4_Utils/Utils.js?v=1"></script>
<script src="<?php echo ASSETS_URL; ?>/1_view/computadores_view.js?v=3"></script>

    
		