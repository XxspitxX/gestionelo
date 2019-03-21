 <?php 

define('__ROOT__', dirname(dirname(__FILE__))); 
require_once(__ROOT__.'/init.php'); 
// echo 
?>

    <div class="row">
        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                <h1 class="page-title txt-color-blueDark">

                        <!-- PAGE HEADER -->
                        <i class="fa-fw fa fa-pencil-square-o"></i> 
                                INFORMACION DEL APARTAMENTO 
                </h1>
        </div>
    </div>

    <!-- widget grid -->
    <section id="widget-grid" class="">
	    <!-- START ROW -->
	    <div class="row">
		    <!-- NEW COL START -->
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-bank fa-lg fa-fw"></i></span>
                                        <label class="select">
                                        <select Id= "lstMisActivos" class="form-control input-lg" onchange="fn_lstMisActivos_onchange();">
                                        </select> 
                                         </label>
                                    </div>
                            </div>
                        </div>
                    </div>

                    <article class="col-sm-12 col-md-12">
                        <div class="jarviswidget jarviswidget-color-blueDark"  id="wid-id-1" data-widget-editbutton="false">
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
                        <header>
                                <span class="widget-icon">
                                <i class="fa fa-pencil fa-fw"></i>
                                </span>
                                <h2>Actualización de datos</h2>
                        </header>

                        <!-- widget div-->
                        <div>
                        <!-- widget content -->
                            <div class="widget-body">
                                <div class="row">
                                    <div id="bootstrap-wizard-1" class="col-sm-12">
                                        <div class="tab-content">
<!-- ***************** Tab1 **************************************************** -->
                        
     
     <!-- widget grid -->
		<section id="widget-grid" class="">

<!-- row -->
<div class="row">

    <!-- NEW WIDGET START -->
    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-0" data-widget-editbutton="false">
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
            <header>
                <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                <h2>Sección 1</h2>

            </header>

            <!-- widget div-->
            <div>

                <!-- widget edit box -->
                <div class="jarviswidget-editbox">
                    <!-- This area used as dropdown edit box -->

                </div>
                <!-- end widget edit box -->

                <!-- widget content -->
                <form action="" id="checkout-tab1"  novalidate="novalidate">
                            <div class="tab-pane active form" id="tab1">
                                <br>
                                <h3>Propietarios/Residentes</h3>
                                <div id="divMensajeR"></div>
                                <input type="hidden" id="IdActivoResidente" name="IdActivoResidente" value="0">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                            <span class="input-group-addon"> <input type="checkbox"  Id="chkEsPropietario" value="1" name="EsPropietario"></span>
                                            <label class="checkbox">
                                            <i></i>Es propietario</label>
                                            <span class="input-group-addon"><input type="checkbox" Id="chkEsResidente" value="1" name="EsResidente"></span>
                                            <label class="checkbox">
                                            <i></i> Es Residente</label>
                                            <span class="input-group-addon"><input type="checkbox" Id="chkEsPrincipal" value="1" name="EsContactoPrincipal"></span>
                                            <label class="checkbox">
                                            <i></i>Contacto principal</label>
                                            <span class="input-group-addon"><input type="checkbox" Id="chkEsVigente" value="1" name="Vigente"></span>
                                            <label class="checkbox">
                                            <i></i>Vigente</label>

                                                </div>
                                            </div>
                                    </div>	

                                    </div>		
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div style="margin-top: 5px; margin-bottom: 10px" class="form-group">
                                            <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user fa-lg fa-fw"></i></span>
                                            <input type="text" Id="r_nombre" placeholder="Nombre y Apellidos (*)" class="form-control input-lg" name="Nombres" required maxlength="100">
                                            </div>
                                            </div>
                                            </div>
                                            <div class="col-sm-6">
                                            <div class="form-group">
                                            <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-phone fa-lg fa-fw"></i></span>
                                            <input type="text" Id="r_telefono" placeholder="Telefonos" class="form-control input-lg" name="Telefono" maxlength="100">
                                            </div>
                                            </div>
                                            </div>
                                    </div>
                                    <div class="row">

                                            <div class="col-sm-6">
                                            <div class="form-group">
                                            <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-envelope fa-lg fa-fw"></i></span>
                                            <input type="email" Id="r_email" placeholder="email@address.com" class="form-control input-lg" name="Correo">
                                            </div>
                                            </div>
                                            </div>
                                            <div class="col-sm-6">
                                            <div class="form-group">
                                            <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-lg fa-calendar"></i></span>
                                            <input type="fecha" Id="r_fecha" placeholder="Fecha Nacimiento" class="form-control input-lg isDatepicker" name="FechaNacimiento" readonly="true">
                                            </div>
                                            </div>
                                            </div>				
                                    </div>	
                                    <div class="row">
                                        <a style=" margin-bottom: 12px; margin-top:12px ;margin-left:15px"  Id="btn_r_limpiar" class="btn btn-primary" href="javascript:fn_tab1_limpiar_submit('checkout-tab1');"> Limpiar</a>
                                        <a style=" margin-bottom: 12px; margin-top:12px; position: relative; left: 82% " Id="btn_r_agregar" class="btn btn-primary submit tab1" href="javascript:fn_tab1_agregar_submit('checkout-tab1');"> <i class='fa fa-floppy-o'></i>Agregar</a>
                                       <a style=" margin-bottom: 12px; margin-top:12px; position: relative; left: 82% " Id="btn_r_modificar" class="btn btn-primary submit tab1" href="javascript:fn_tab1_editar_submit('checkout-tab1');"> <i class='fa fa-floppy-o'></i>Guardar</a>
                                    </div>
                                <div class="row">
                                </div>

                            </div>
                           </form>

                </div>
                <!-- end widget content -->

            </div>
            <!-- end widget div -->

        </div>
        <!-- end widget --> 
     
     
     
     <!-- widget grid -->
		<section id="widget-grid" class="">

<!-- row -->
<div class="row">

    <!-- NEW WIDGET START -->
    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-0" data-widget-editbutton="false">
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
            <header>
                <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                <h2>Tabla de Propietarios/Residentes</h2>

            </header>

            <!-- widget div-->
            <div>

                <!-- widget edit box -->
                <div class="jarviswidget-editbox">
                    <!-- This area used as dropdown edit box -->

                </div>
                <!-- end widget edit box -->

                <!-- widget content -->
                <div class="widget-body">
                    <table id="grvDatos" class="table table-bordered">
                        <thead>
                        <tr>
                            <th data-hide="phone">ID</th>
                            <th>Nombres</th>
                            <th data-hide="phone"><i class="fa fa-fw fa-phone text-muted hidden-md hidden-sm hidden-xs"></i> Correo</th>
                            <th data-hide="phone,tablet"><i class="fa fa-fw fa-map-marker txt-color-blue hidden-md hidden-sm hidden-xs"></i> Fecha Nac.</th>
                            <th data-hide="phone"><i class="fa fa-fw fa-phone text-muted hidden-md hidden-sm hidden-xs"></i> Telefono</th>
                        </tr>
                        </thead>
                        
                        <tbody>
                            <tr>
                                    <td>1</td>
                                    <td>Jennifer</td>
                                    <td>x@com.co</td>
                                    <td>03/04/14</td>
                                    <td>31231231263</td>
                            </tr>
                        </tbody>
                          
                    </table>

                </div>
                <!-- end widget content -->

            </div>
            <!-- end widget div -->

        </div>
        <!-- end widget -->
<!-- ***************** Tab2 **************************************************** -->
    
     <!-- widget grid -->
		<section id="widget-grid" class="">

<!-- row -->
<div class="row">

    <!-- NEW WIDGET START -->
    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-0" data-widget-editbutton="false">
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
            <header>
                <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                <h2>Sección 2</h2>

            </header>

            <!-- widget div-->
            <div>

                <!-- widget edit box -->
                <div class="jarviswidget-editbox">
                    <!-- This area used as dropdown edit box -->

                </div>
                <!-- end widget edit box -->

                <!-- widget content -->
                <form action="" id="checkout-tab2"  novalidate="novalidate">
            <div class="tab-pane active form" id="tab2">
                    <br>
                    <h3> Vehículos</h3>
                    <div id="divMensajeV"></div>
                    <input type="hidden" id="IdActivoVehiculo" name="IdActivoVehiculo" value="0">
                    <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                    <div class="input-group">
                    <span class="input-group-addon"><input type="checkbox" Id="v_chkVigente" name="Vigente" value="1"></span>
                    <label class="checkbox">
                    <i></i>Vigente</label>

                    </div>
                    </div>
                    </div>	

                    </div>		
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                            <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-car fa-lg fa-fw"></i></span>
                            <select Id= "v_lsttipo" name="IdTipo" class="form-control input-lg" type="select">
                            </select>
                            </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                            <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-empire fa-lg fa-fw"></i></span>
                            <input type="text" Id="v_txtPlaca" name="Placa" placeholder="Placa o No aplica (*)" class="form-control input-lg" required maxlength="50">
                            </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-empire fa-lg fa-fw"></i></span>
                                <input type="text" Id="v_txtMarca" placeholder="Marca" class="form-control input-lg" name="Marca"  maxlength="50">
                            </div>
                        </div>
                        </div>
                        <div class="col-sm-6">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-empire fa-lg fa-fw"></i></span>
                                <input type="text" Id="v_txtModelo" name="Modelo" placeholder="Modelo" class="form-control input-lg" maxlength="50">
                            </div>
                        </div>
                        </div>
                    </div>	
                    <div class="row">
                        <a Id="btn_v_limpiar" style=" margin-bottom: 12px; margin-top:12px ;margin-left:15px" class="btn btn-primary" href="javascript:fn_tab2_limpiar_submit('checkout-tab2');"> Limpiar</a>
                        <a Id="btn_v_agregar"style=" margin-bottom: 12px; margin-top:12px; position: relative; left: 82% " class="btn btn-primary submit tab1" href="javascript:fn_tab2_agregar_submit('checkout-tab2');"> <i class='fa fa-floppy-o'></i>Agregar</a>
                        <a Id="btn_v_modificar"style=" margin-bottom: 12px; margin-top:12px; position: relative; left: 82%" class="btn btn-primary submit tab1" href="javascript:fn_tab2_editar_submit('checkout-tab2');"> <i class='fa fa-floppy-o'></i>Guardar</a>
                    </div>

                </div>
                <!-- end widget content -->

            </div>
            <!-- end widget div -->

        </div>
        <!-- end widget --> 
        <!-- row -->
<div class="row">

    <!-- NEW WIDGET START -->
    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-0" data-widget-editbutton="false">
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
            <header>
                <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                <h2>Tabla de vehículos</h2>

            </header>

            <!-- widget div-->
            <div>

                <!-- widget edit box -->
                <div class="jarviswidget-editbox">
                    <!-- This area used as dropdown edit box -->

                </div>
                <!-- end widget edit box -->

                <!-- widget content -->
                        <table id="grvDatosV" class="table table-striped table-bordered table-hover" width="100%">
                            <thead>
                                    <tr>
                                            <th data-hide="phone">ID</th>
                                            <th>Tipo</th>
                                            <th data-hide="phone"><i class="fa fa-fw fa-phone text-muted hidden-md hidden-sm hidden-xs"></i> Placa</th>
                                            <th data-hide="phone,tablet"><i class="fa fa-fw fa-map-marker txt-color-blue hidden-md hidden-sm hidden-xs"></i>Modelo</th>
                                            <th data-hide="phone,tablet"><i class="fa fa-fw fa-map-marker txt-color-blue hidden-md hidden-sm hidden-xs"></i>Marca</th>
                                            <th data-hide="phone,tablet"><i class="fa fa-fw fa-map-marker txt-color-blue hidden-md hidden-sm hidden-xs"></i> Vig.</th>
                                    </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                            <td>1</td>
                                            <td>Vehiculo</td>
                                            <td>BML776</td>
                                            <td>2012</td>
                                            <td>Renault</td>
                                            <td>S</td>
                                    </tr>
                            </tbody>
                        </table>                                    
                    </div>

            </div>
     </form>
                </div>
                <!-- end widget content -->

            </div>
            <!-- end widget div -->

        </div>
       
                   
<!-- ***************** Tab3 ******************************************************** -->
 
     <!-- widget grid -->
		<section id="widget-grid" class="">

<!-- row -->
<div class="row">

    <!-- NEW WIDGET START -->
    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-0" data-widget-editbutton="false">
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
            <header>
                <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                <h2>Sección 3</h2>

            </header>

            <!-- widget div-->
            <div>

                <!-- widget edit box -->
                <div class="jarviswidget-editbox">
                    <!-- This area used as dropdown edit box -->

                </div>
                <!-- end widget edit box -->

                <!-- widget content -->
                <form action="" id="checkout-tab3"  novalidate="novalidate">
                <div class="tab-pane active form" id="tab3">
                    <br>
                    <h3> Personal de Apoyo</h3>
                    <div id="divMensajeP"></div>
                    <input type="hidden" id="IdActivoAPoyo" name="IdActivoApoyo" value="0">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                            <div class="input-group">
                            <span class="input-group-addon"><input type="checkbox" Id="p_chkVigente" name="Vigente" value="1"></span>
                            <label class="checkbox">
                                <i></i>Vigente</label>

                                    </div>
                            </div>
                        </div>	

                    </div>		
                    <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-sitemap fa-lg fa-fw"></i></span>
                        <select Id= "p_lstIdTipoApoyo" name="IdTipoApoyo" class="form-control input-lg" type="select">
                        </select>
                    </div>
                    </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa-lg fa-fw"></i></span>
                        <input type="text" Id="p_txtNombres" placeholder="Nombres (*)" name="Nombres" class="form-control input-lg" required maxlength="50">
                    </div>
                    </div>
                    </div>

                    </div>
                    <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                    <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-pencil fa-lg fa-fw"></i></span>
                            <input type="text" Id="p_txtIdentificacion" placeholder="Identificacion" name="Identificacion" class="form-control input-lg" maxlength="50">
                    </div>
                    </div>
                    </div>
                    </div>	
                    <div class="row">
                        <a style=" margin-bottom: 12px; margin-top:12px ;margin-left:15px" Id="btn_p_limpiar" class="btn btn-primary" href="javascript:fn_tab3_limpiar_submit('checkout-tab3');"> Limpiar</a>
                        <a style=" margin-bottom: 12px; margin-top:12px; position: relative; left: 82% " Id="btn_p_agregar" class="btn btn-primary submit tab1" href="javascript:fn_tab3_agregar_submit('checkout-tab3');"> <i class='fa fa-floppy-o'></i>Agregar</a>
                        <a style=" margin-bottom: 12px; margin-top:12px; position: relative; left: 82%" Id="btn_p_modificar" class="btn btn-primary submit tab1" href="javascript:fn_tab3_editar_submit('checkout-tab3');"> <i class='fa fa-floppy-o'></i>Guardar</a>
                                    </div>
                                <div class="row">
                                </div>

                            </div>
                           </form>

                </div>
                <!-- end widget content -->

            </div>
            <!-- end widget div -->

        </div>
        <!-- end widget --> 
     
     
     
     <!-- widget grid -->
		<section id="widget-grid" class="">

<!-- row -->
<div class="row">

    <!-- NEW WIDGET START -->
    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-0" data-widget-editbutton="false">
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
            <header>
                <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                <h2>Tabla de Propietarios/Residentes</h2>

            </header>

            <!-- widget div-->
            <div>

                <!-- widget edit box -->
                <div class="jarviswidget-editbox">
                    <!-- This area used as dropdown edit box -->

                </div>
                <!-- end widget edit box -->

                <!-- widget content -->
                <div class="widget-body">
                    <table id="grvDatosP" class="table table-striped table-bordered table-hover" width="100%">
                                <thead>
                                        <tr>
                                                <th data-hide="phone">ID</th>
                                                <th>Nombres</th>
                                                <th data-hide="phone"><i class="fa fa-fw fa-phone text-muted hidden-md hidden-sm hidden-xs"></i> Identificación</th>
                                                <th data-hide="phone,tablet"><i class="fa fa-fw fa-map-marker txt-color-blue hidden-md hidden-sm hidden-xs"></i>TipoApoyo</th>
                                                <th data-hide="phone,tablet"><i class="fa fa-fw fa-map-marker txt-color-blue hidden-md hidden-sm hidden-xs"></i> Vig.</th>
                                        </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                                <td>1</td>
                                                <td>xyz</td>
                                                <td>776567</td>
                                                <td>Servicio</td>
                                                <td>S</td>
                                        </tr>
                                </tbody>
                            </table>  

                </div>
                <!-- end widget content -->

            </div>
            <!-- end widget div -->

        </div>
        <!-- end widget --> 
     <!-- widget grid -->
		<section id="widget-grid" class="">

<!-- row -->
<div class="row">
    
 
<!-- ***************** Tab4 ************************************************************ -->
   
     <!-- widget grid -->
		<section  style="margin-left: 15px; margin-right: 15px  "id="widget-grid" class="">

<!-- row -->
<div class="row">

    <!-- NEW WIDGET START -->
    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-0" data-widget-editbutton="false">
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
            <header>
                <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                <h2>Sección 4</h2>

            </header>

            <!-- widget div-->
            <div>

                <!-- widget edit box -->
                <div class="jarviswidget-editbox">
                    <!-- This area used as dropdown edit box -->

                </div>
                <!-- end widget edit box -->

                <!-- widget content -->
                <form action="" id="checkout-tab4"  novalidate="novalidate">
            <div class="tab-pane active form" id="tab4">
                    <br>
                    <h3>Mascotas</h3>
                    <div id="divMensajeM"></div>
                    <input type="hidden" id="IdActivoMascota" name="IdActivoMascota" value="0"> 
                    <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                        <div class="input-group">
                        <span class="input-group-addon"><input type="checkbox" Id="m_chkVigente" name="Vigente" value="1"></span>
                            <label class="checkbox">
                            <i></i>Vigente</label>
                        </div>
                        </div>
                    </div>	
                    </div>		
                    <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-paw fa-lg fa-fw"></i></span>
                        <input type="text" Id="m_txtRaza" name="Raza" placeholder="Raza (*)" class="form-control input-lg" required maxlength="50">
                    </div>
                    </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                    <div class="input-group">
                            <span class="input-group-addon"><i class="fa  fa-plus fa-lg fa-fw"></i></span>
                            <input type="number" Id="m_txtCantidad" name="Cantidad" placeholder="Cantidad" class="form-control input-lg" min="1" max="50">
                    </div>
                    </div>
                    </div>
                    </div>
                    <div class="row">
                        <a style=" margin-bottom: 12px; margin-top:12px ;margin-left:15px" Id="btn_m_limpiar" class="btn btn-primary" href="javascript:fn_tab4_limpiar_submit('checkout-tab4');"> Limpiar</a>
                        <a style=" margin-bottom: 12px; margin-top:12px; position: relative; left: 82% " Id="btn_m_agregar" class="btn btn-primary submit tab1" href="javascript:fn_tab4_agregar_submit('checkout-tab4');"> <i class='fa fa-floppy-o'></i>Agregar</a>
                        <a style=" margin-bottom: 12px; margin-top:12px; position: relative; left: 82%" Id="btn_m_modificar" class="btn btn-primary submit tab1" href="javascript:fn_tab4_editar_submit('checkout-tab4');"> <i class='fa fa-floppy-o'></i>Guardar</a>
                                    </div>
                                <div class="row">
                                </div>

                            </div>
                           </form>

                </div>
                <!-- end widget content -->

            </div>
            <!-- end widget div -->

        </div>
        <!-- end widget --> 
     
     
     
     <!-- widget grid -->
		<section id="widget-grid" class="">

<!-- row -->
<div class="row">

    <!-- NEW WIDGET START -->
    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-0" data-widget-editbutton="false">
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
            <header>
                <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                <h2>Tabla de Mascotas</h2>

            </header>

            <!-- widget div-->
            <div>

                <!-- widget edit box -->
                <div class="jarviswidget-editbox">
                    <!-- This area used as dropdown edit box -->

                </div>
                <!-- end widget edit box -->

                <!-- widget content -->
                <div class="widget-body">
                    <table id="grvDatosM" class="table table-striped table-bordered table-hover" width="100%">
                            <thead>
                                    <tr>
                                            <th data-hide="phone">ID</th>
                                            <th>Raza</th>
                                            <th data-hide="phone"><i class="fa fa-fw fa-phone text-muted hidden-md hidden-sm hidden-xs"></i> Cantidad</th>
                                    </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                            <td>1</td>
                                            <td>Chitzu</td>
                                            <td>2</td>
                                    </tr>
                            </tbody>
                        </table>    

                </div>
                <!-- end widget content -->

            </div>
            <!-- end widget div -->

        </div>
        <!-- end widget --> 
     <!-- widget grid -->
		<section id="widget-grid" class="">

<!-- row -->
<div class="row">
 
 
                        </div>
                        </div>
                        </div>
                        </div>
                        <!-- end widget content -->
                        </div>
                        </div>
                    </article>
        </div>
    </section>
<!-- ************************* Fin General  *************************************************-->

<script src="<?php echo ASSETS_URL; ?>/4_Utils/Utils.js?v=2"></script>
<script src="<?php echo ASSETS_URL; ?>/1_view/activoresidente_view.js?v=1"></script>

