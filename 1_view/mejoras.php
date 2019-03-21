<?php 
require_once dirname(__DIR__).'/init.php';
// echo 
?>

    <div class="row">
        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                <h1 class="page-title txt-color-blueDark">

                        <!-- PAGE HEADER -->
                        <i class="fa-fw fa fa-pencil-square-o"></i> 
                                GESTIONAR MEJORA CONTINUA 
                </h1>
        </div>
    </div>

    <!-- widget grid -->
    <section id="widget-grid" class="">
        <!-- START ROW -->
        <div class="row">
        <!-- NEW COL START -->
           <div id="divMensajeMain"></div>
                <div class="row">
                        <div class="col-sm-3">
                                <div class="form-group">
                                        <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-recycle fa-lg fa-fw"></i></span>
                                        <label class="select">
                                        <select Id= "lstFiltroEstados" class="form-control input-lg" onchange="fn_lstFiltroEstados_onchange();">
                                        </select> 
                                         </label>
                                        </div>
                                </div>
                        </div>
            </div>
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
                <header>
                        <span class="widget-icon">
                        <i class="fa fa-table"></i>
                        </span>
                        <h2>Lista Mejoras</h2>
                </header>

                <!-- widget div-->
                <div>

                <!-- widget edit box -->
                <div class="jarviswidget-editbox">
                        <!-- This area used as dropdown edit box -->

                </div>
                <!-- end widget edit box -->

            <!-- widget content -->
            <div class="widget-body no-padding">
                <div id="divMensaje"></div>
                <div class="col-sm-2">
                <a Id="btn_ver_agregar" class="btn btn-primary  form-control" href="javascript:fn_btn_ver_agregar();"> <i class='fa fa-chevron-circle-right'></i>Agregar</a>
                </div>
                <table id="grvDatos" class="table table-striped table-bordered table-hover" width="100%">
                        <thead>
                                <tr>
                                        <th data-hide="phone">IdMejora</th>
                                        <th>Tipo</th>
                                        <th>Nombre</th>                                        
                                        <th data-hide="phone"><i class="fa fa-fw fa-phone text-muted hidden-md hidden-sm hidden-xs"></i> Estado</th>
                                        <th data-hide="phone,tablet"><i class="fa fa-fw fa-map-marker txt-color-blue hidden-md hidden-sm hidden-xs"></i> UsuarioReporta</th>

                                </tr>
                        </thead>
                        <tbody>
                                <tr>
                                        <td>10</td>
                                        <td>Felicitacion</td>
                                        <td>agua caliente ....</td>
                                        <td>Abierta</td>
                                        <td>jco</td>
                                </tr>
                        </tbody>
                </table>                
                <button id="btnAgregarModal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalSet" style="display: none;">
                    ShowModal
                </button>

            </div>
            </div>
        </div>
        </article>


    </div>
    </section>

    <!-- *********Modal NUEVA/EDICION  MEJORA-->
    <form action="" id="form1"  novalidate="novalidate">
    <div class="modal fade" id="modalSet" tabindex="-1" role="dialog">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                </button>
                <h4 class="modal-title">
                <div ID="lblModalTitulo"> titulox</div>
                <div id="divMensajeEdicion"></div>
                </h4>
            <div class="form-horizontal">
                <fieldset>
                    <div class="form-group">
                        <div class="col-sm-5">
                            <div class="input-group">
                                <div class="input-group-btn">
                                <a Id="LinkButCalendario" class="btn btn-success" href="javascript:fn_calendario('xxId');"> <i class='fa fa-calendar'></i>Calendario</a>
                                    <button id="btnCerrarModal" type="button" class="btn btn-default" data-dismiss="modal">
                                            Cancelar
                                    </button>
                                    <a Id="btn_guardar" class="btn btn-primary" href="javascript:fn_tab1_guardar_submit();">Guardar</a>                            
                                </div>
                        </div>
                    </div>
                </fieldset>
            </div>
            </div>
                <div class="modal-body no-padding">
                <div class="smart-form">
                <fieldset>
                <div id="bootstrap-wizard-1" class="col-sm-12">
                <section>    
                <div class="form-bootstrapWizard">
                <ul class="bootstrapWizard form-wizard">
                        <li class="active" data-target="#step1" id="ltab1">
                                <a href ="#" onclick= "fn_change_tab(1)" id="t1" data-toggle="tab"> <span class="step">1</span> <span class="title">Reporte</span> </a>
                        </li>
                        <li data-target="#step2" id="ltab2">
                                <a href ="#" onclick= "fn_change_tab(2)" id="t2" data-toggle="tab"> <span class="step">2</span> <span class="title">Solución</span> </a>
                        </li>
                        <li data-target="#step3" id="ltab3">
                                <a href ="#" onclick= "fn_change_tab(3)" id="t3" data-toggle="tab"> <span class="step">3</span> <span class="title">Acciones</span> </a>
                        </li>
                </ul>
                <div class="clearfix"></div>
                </div>
                </section>    
                <section>
                 <div class="row">
                     <label class="label col col-2">Id</label>
                     <div class="col col-1">
                        <input type="text" Id="IdMejora" name="IdMejora" placeholder="" class="form-control input-xs" readonly="true"> 
                     </div>
                 </div>
                 <div class="row">
                         <label class="label col col-2">Título</label>
                         <div class="col col-10">
                             <label class="input">
                             <input type="text" Id="txtNombre" placeholder="título mejora (*)" class="form-control input-lg" name="Nombre" required maxlength="50">
                             </label>
                         </div>
                 </div>
                 </section>
               <div  class="tab-pane active" id="tab1">

               <section>

                <div class="row">
                    <label class="label col col-2">Descripcion</label>
                    <div class="col col-10">
                        <label class="input">
                        <textarea id="txtDescripcion" name="DescripcionDetalle" rows="5" cols="50" placeholder="Descripción mejora (*)" class="form-control input-lg" maxlength="250"> 
                        </textarea>
                        </label>
                    </div>
                </div>
                <div class="row">
                <label class="label col col-2">Tipo</label>
                    <div class="col col-10">
                        <label class="select">
                        <select Id= "IdTipo" name="IdTipo" class="form-control input-lg" type="select">
                        </select> 
                        </label>
                    </div>
                </div>
                <div class="row">
                <label class="label col col-2">Reportado Por</label>
                <div class="col col-10">
                        <label class="input">
                        <input type="text" Id="ReportadoPor" name="ReportadoPor" placeholder="" class="form-control input-lg" required maxlength="50">
                        </label>
                </div>
                </div>

                </section>
             </div>
               <div class="tab-pane active" id="tab2" style="display:none;">
               <section>
                <div class="row">
                    <label class="label col col-2">Estado</label>
                    <div class="col col-10">
                    <label class="select">
                        <select Id= "IdEstado" name="IdEstado" class="form-control input-lg" type="select">
                        </select> 
                    </label>
                    </div>
                </div>
                <div class="row">
                    <label class="label col col-2">Usuario</label>
                    <div class="col col-10">
                    <label class="select">
                    <select Id= "IdUsuarioReporta" name="IdUsuarioReporta" class="form-control input-lg" type="select">
                    </select>                         
                    </label>
                    </div>
                </div>

                <div class="row">
                    <label class="label col col-2">Causa</label>
                    <div class="col col-10">
                            <label class="input">
                            <textarea id="DescripcionCausa" name="DescripcionCausa" rows="5" cols="50" placeholder="Descripción causa" class="form-control input-lg" maxlength="250"> 
                            </textarea>
                            </label>
                    </div>
                </div>
                <div class="row">
                    <label class="label col col-2">Solución</label>
                    <div class="col col-10">
                            <label class="input">
                            <textarea id="DescripcionSolucion" name="DescripcionSolucion" rows="5" cols="50" placeholder="Descripción Solucion" class="form-control input-lg" maxlength="250"> 
                            </textarea>                                
                            </label>
                    </div>
                </div>
                <div class="row">
                    <label class="label col col-2">Eficacia</label>
                    <div class="col col-10">
                            <label class="input">
                            <textarea id="DescripcionEficacia" name="DescripcionEficacia" rows="5" cols="50" placeholder="Descripción Eficacia" class="form-control input-lg" maxlength="250"> 
                            </textarea>
                            </label>
                    </div>
                </div>
                </section>
               <section>
                <div class="row">
                    <label class="label col col-2">Eficacia</label>
                    <div class="col col-10">
                            <label class="input">
                            <input type="number" Id="Eficacia" name="Eficacia" placeholder="0..5" class="form-control input-lg" min="0" max="5"> 
                            </label>
                    </div>
                </div>
                </section>
              </div>
               <div class="tab-pane active" id="tab3" style="display:none;">
               <section>
                <div class="row">
                <div class="col col-12">
                <table id="grvDatosAccion" class="table table-striped table-bordered table-hover" width="100%">
                    <thead>
                            <tr>
                                    <th data-hide="phone">Alias</th>
                                    <th>Descripcion</th>
                                    <th data-hide="phone"><i class="fa fa-fw fa-phone text-muted hidden-md hidden-sm hidden-xs"></i> FechaCreacion</th>
                            </tr>
                    </thead>
                    <tbody>
                            <tr>
                                    <td>sdsdfsd</td>
                                    <td>sdfasd</td>
                                    <td>10-sep-2018</td>
                            </tr>
                    </tbody>
                </table>                     
                </div>
                </div>
               </section>
            </div>
            </div>
            </fieldset>

            <footer>
                <a Id="btn_guardar" class="btn btn-primary" href="javascript:fn_tab1_guardar_submit();">Guardar</a>
                <button id="btnCerrarModal" type="button" class="btn btn-default" data-dismiss="modal">
                        Cancelar
                </button>
            </footer>
            </div>
            </div>
        </div>
        </div>
    </div>
    </form>
<!-- ************************* Fin General  *************************************************-->

<script src="<?php echo ASSETS_URL; ?>/4_Utils/Utils.js?v=2"></script>
<script src="<?php echo ASSETS_URL; ?>/1_view/mejoras_view.js?v=1"></script>
