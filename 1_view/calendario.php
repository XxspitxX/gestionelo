 <?php 
define('__ROOT__', dirname(dirname(__FILE__))); 
require_once(__ROOT__.'/init.php'); 
// echo 

?>

    <div class="row">
    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
            <h1 class="page-title txt-color-blueDark">

            <!-- PAGE HEADER -->
            <i class="fa fa-calendar fa-fw"></i> 
                    CALENDARIO. 
            <label id="ObjetoRelTitulo" runat="server" >  
            </label>
            </h1>
     </div>
        <!-- 
      	    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
            <label class="select">
                <asp:DropDownList ID="filterProcedimiento" class="form-control"  name="filterProcedimiento" runat="server"  onchange = "fn_filtrarProcedimiento()"></asp:DropDownList>
                </label>
            <label class="select">
                <asp:DropDownList ID="filterActividad" class="form-control"  ame="filterActividad" runat="server"  onchange = "fn_filtrarActividad()"></asp:DropDownList>
            </label>
        </div>
     -->
  </div>
 <form action="" id="form1"  novalidate="novalidate">
    <section id="widget-grid" class="">
        <!-- START ROW -->
        <div class="row">
            <!-- NEW COL START -->
             <div id="divMensajeMain"></div>
            <article class="col-sm-12 col-md-12">
                <!-- MAIN CONTENT -->
                <input type="hidden" id="hddIdObjeto" name="hddIdObjeto" value="0">
                <input type="hidden" id="hddFechaCalendar" name="hddFechaCalendar" value="0">
                <input type="hidden" id="hddTipoObjeto" name="hddTipoObjeto" value="0">

                <div id="content">
                <!-- row -->
<!-- Add Event ************************************************************************* -->				
                <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-3">
                <!-- new widget -->
                <div class="jarviswidget jarviswidget-color-blueDark">
                <header>
                        <h2> Add Events </h2>
                </header>
                <!-- widget div-->
                
                <div>
                <div class="widget-body">
                        <!-- content goes here -->

                        <!-- <form id="add-event-form"> -->
                                <fieldset>
                                        <div class="form-group">
                    <!-- 
                                <label class="select">
                    <asp:DropDownList ID="DropDownList1" class="form-control" name="filterResponsable" runat="server" ></asp:DropDownList>
                    </label>
                    <br/>
                                <label class="select">
                    <asp:DropDownList ID="DropDownList2" class="form-control" name="filterResponsable" runat="server" ></asp:DropDownList>
                    </label>
                    <br/>
                    -->
                    <label>Responsable</label> 
                    <label class="select">
                    <select Id= "filterResponsableNew" name="filterResponsableNew" class="form-control input-xs" type="select">
                    </select>                         
                    </label>
                    <br/>
                    <label>Estado</label> 
                    <label class="select">
                    <select Id= "filterEstadoNew" name="filterEstadoNew" class="form-control input-xs" type="select">
                    </select> 
                    </label>
<br/>
                    <label>Tipo</label> 
                    <label class="select">
                    <select Id= "filterTipoNew" name="filterTipoNew" class="form-control  input-xs" type="select">
                    </select>
                    </label>
                    </div>

                    <div class="form-group">
                            <!-- <label>Event Title</label> -->
                            <input class="form-control"  id="title" name="title" maxlength="40" type="text" placeholder="Event Title">
                           <!-- <label>Event Description</label> -->
                            <textarea class="form-control" placeholder="Please be brief" rows="3" maxlength="40" id="description"></textarea>
                            <p class="note">Maxlength is set to 40 characters</p>
                    </div>

                    <div class="form-group">
                    <label>Select Event Color</label>
                    <div class="btn-group btn-group-justified btn-select-tick" data-toggle="buttons">
                            <label class="btn bg-color-darken active">
                                    <input type="radio" name="priority" id="option1" value="bg-color-darken txt-color-white" checked>
                                    <i class="fa fa-check txt-color-white"></i> </label>
                            <label class="btn bg-color-blue">
                                    <input type="radio" name="priority" id="option2" value="bg-color-blue txt-color-white">
                                    <i class="fa fa-check txt-color-white"></i> </label>
                            <label class="btn bg-color-orange">
                                    <input type="radio" name="priority" id="option3" value="bg-color-orange txt-color-white">
                                    <i class="fa fa-check txt-color-white"></i> </label>
                            <label class="btn bg-color-greenLight">
                                    <input type="radio" name="priority" id="option4" value="bg-color-greenLight txt-color-white">
                                    <i class="fa fa-check txt-color-white"></i> </label>
                            <label class="btn bg-color-blueLight">
                                    <input type="radio" name="priority" id="option5" value="bg-color-blueLight txt-color-white">
                                    <i class="fa fa-check txt-color-white"></i> </label>
                            <label class="btn bg-color-red">
                                    <input type="radio" name="priority" id="option6" value="bg-color-red txt-color-white">
                                    <i class="fa fa-check txt-color-white"></i> </label>
                    </div>
                    </div>

                    </fieldset>
                    <div class="form-actions">
                            <div class="row">
                                    <div class="col-md-12">
                                            <button class="btn btn-default" type="button" id="add-event" >
                                                    Add Event
                                            </button>
                                    </div>
                            </div>

                    </div>
                    <!-- </form> -->

                <!-- end content -->
                </div>
                </div>
                <!-- end widget div -->

                </div>
                <!-- end widget -->

                <div class="well well-sm" id="event-container">
                <!-- <form> -->
                <fieldset>
                    <legend>
                            Draggable Events
                    </legend>
                    <ul id='external-events' class="list-unstyled">
                            <li>
                                    <span class="bg-color-blue txt-color-white" data-description="Atención Usuario" data-icon="fa-pie">Atención Usuario</span>
                            </li>
                            <li>
                                    <span class="bg-color-red txt-color-white" data-description="Tarea Urgente" data-icon="fa-alert">Tarea Urgente</span>
                            </li>
                    </ul>
                    <div class="checkbox">
                            <label>
                                    <input type="checkbox" id="drop-remove" class="checkbox style-0" checked="checked">
                                    <span>remove after drop</span> </label>

                    </div>
                </fieldset>
               <!--  </form>-->

                </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-9">

                        <!-- new widget -->
                <div class="jarviswidget jarviswidget-color-blueDark">
                <label class="select">
                    <select Id="ddlFilterEquipo" name="ddlFilterEquipo" class="form-control input-xs" type="select" onchange="fn_filtrarEquipo();">
                    </select> 
                </label>
     <i></i>
    <label class="select">
        <select Id="ddlFilterResponsable" name="ddlFilterResponsable" class="form-control input-xs" type="select" onchange="fn_filtrarResponsable();">
        </select> 
    </label>
     <i></i>

    <label class="select">
        <select Id= "ddlFilterEstado" name="ddlFilterEstado" class="form-control input-xs" type="select"  onchange = "fn_filtrar();">
            <option value="0">(Sin filtro)</option>
            <option value="1" selected>Estados abiertos</option>
            <option value="2">Estados cerrados</option>
        </select> 
        <i></i>
    </label>
     <a Id="btnFiltrar" class="btn-sm btn btn-primary" href="javascript:fn_Filtrar_Click();"> <i class="fa fa-search"></i>Refresh</a>


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
            <span class="widget-icon"> <i class="fa fa-calendar"></i> </span>
            <h2 id="TituloCalendario"> My Task  </h2>
            <div class="widget-toolbar">
                    <!-- add: non-hidden - to disable auto hide -->
                    <div class="btn-group">
                            <button class="btn dropdown-toggle btn-xs btn-default" data-toggle="dropdown">
                                    Showing <i class="fa fa-caret-down"></i>
                            </button>
                            <ul class="dropdown-menu js-status-update pull-right">
                                    <li>
                                            <a href="javascript:void(0);" id="mt">Month</a>
                                    </li>
                                    <li>
                                            <a href="javascript:void(0);" id="ag">Week Agenda</a>
                                    </li>
                                    <li>
                                            <a href="javascript:void(0);" id="td">Today Agenda</a>
                                    </li>
                                    <li>
                                            <a href="javascript:void(0);" id="custom_ds">Day Agenda</a>
                                    </li>
                                    <li>
                                            <a href="javascript:void(0);" id="custom_All">List 1 Year</a>
                                    </li>
                                    <li>
                                            <a href="javascript:void(0);" id="custom_wk">Basic Week</a>
                                    </li>

                            </ul>
                    </div>
            </div>

    </header>
<!-- Calendario  ************************************************************************* -->				
    <!-- widget div-->
    <div>
    <div class="widget-body no-padding">
    <!-- content goes here -->
    <div class="widget-body-toolbar">
    <div id="calendar-buttons">
        <div class="btn-group">
                <a href="javascript:void(0)" class="btn btn-default btn-xs" id="btn-prev"><i class="fa fa-chevron-left"></i></a>
                <a href="javascript:void(0)" class="btn btn-default btn-xs" id="btn-next"><i class="fa fa-chevron-right"></i></a>
        </div>
    </div>
    </div>
    <div id="calendar"></div>
    <button id="btnActualizarModal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditarTarea" style="display: none;">
    ShowModal
    </button>
    <!-- <asp:Button ID="btnActualizarBehind" runat="server" OnClick="btnActualizar_Click"  style="display:none" />  -->

    <input type="text" Id="txtParam" name="txtParam" placeholder="" class="form-control input-lg" required maxlength="50">
    <input type="hidden" id="hdJSON" name="hdJSON" value="0">
    <!-- end content -->
    </div>
    </div>
    <!-- end widget div -->
    </div>
    <!-- end widget -->

    </div>
    </div>
    <!-- end row -->

    </div>
    <!-- END MAIN CONTENT -->
    </article>
    </div>
    </section>
 </form>

    <!-- Modal ************************************************************************* -->
    <form  action="" id="form2"  novalidate="novalidate">
    <div class="modal fade" id="modalEditarTarea" tabindex="-1" role="dialog">
    <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            &times;
                    </button>
                    <h4 class="modal-title">
                        <label ID="lblModalTitulo">Agregar Acción a una tarea</label>
                    </h4>
                </div>
                <div class="modal-body no-padding">

                <div id="frmMainAccion" class="smart-form form">
            <fieldset>
                <div id="bootstrap-wizard-1" class="col-sm-12">
                <section>    
                <div class="form-bootstrapWizard">
                <ul class="bootstrapWizard form-wizard">
                        <li class="active" data-target="#step1" id="ltab1">
                                <a href ="#" onclick= "fn_change_tab(1)" id="t1" data-toggle="tab"> <span class="step">1</span> <span class="title">Acción</span> </a>
                        </li>
                        <li data-target="#step2" id="ltab2">
                                <a href ="#" onclick= "fn_change_tab(2)" id="t2" data-toggle="tab"> <span class="step">2</span> <span class="title">Tarea</span> </a>
                        </li>
                        <li data-target="#step3" id="ltab3">
                                <a href ="#" onclick= "fn_change_tab(3)" id="t3" data-toggle="tab"> <span class="step">3</span> <span class="title">Info</span> </a>
                        </li>
                </ul>
                <div class="clearfix"></div>
                </div>
                </section> 
            <!-- TABS -->
                    <br>       
                    <div class="row">
                            <label class="label col col-2">Tarea</label>
                            <div class="col col-10">
                                    <label class="input">
                                        <input type="text" Id="Titulo" class="form-control input-lg" name="Titulo" required maxlength="250">
                                    </label>
                            </div>
                    </div> 
                    <!-- TAB1 -->
                    <div  class="tab-pane active" id="tab1">
                            <section>
                            <div class="row">
                                <label class="label col col-2">Acción</label>
                                <div class="col col-10">
                                    <label class="input">
                                        <textarea id="txtAccion" name="txtAccion" rows="5" cols="50" class="form-control input-lg" maxlength="250"> 
                                        </textarea>                    
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                <label class="label col col-2">Fecha Fin</label>
                                <div class="col col-4">
                                    <div class="input-group">
                                        <input type="text" Id="txtFechaFinAccion"  placeholder="Fecha Acción" class="form-control isDatepicker" name="txtFechaFinAccion" maxlength="50">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>
                                <div class="col col-2">
                                   <div class="input-group">
                                       <input type="text" Id="txtHH" class="form-control" name="txtHH" maxlength="50">
                                   </div>
                               </div>
                                <div class="col col-2">
                                     <div class="input-group">
                                         <input type="text" Id="txtMin" class="form-control" name="txtMin" maxlength="50">
                                     </div>
                                 </div>
                            </div>
                            </div>


                            <div class="row">
                                <label class="label col col-2">Horas Dur.</label>
                                <div class="col col-10">
                                    <label class="input">
                                        <input type="text" Id="txtHoras" class="form-control" name="txtHoras" maxlength="50">
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <label class="label col col-2">Min. Dur.</label>
                                <div class="col col-10">
                                    <label class="input">
                                        <input type="text" Id="txtMinutos" class="form-control" name="txtMinutos" maxlength="50">
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <label class="label col col-2">Ejecutor</label>
                                <div class="col col-10">
                                    <label class="select">
                                            <select Id= "ddlFiltroEjecutor" name="ddlFiltroEjecutor" class="form-control" type="select">
                                            </select>                     
                                    <i></i>
                                    </label>
                                </div>
                            </div>
                            </section>                        
                    </div>  
                    <!-- TAB2 -->
                    <div class="tab-pane active" id="tab2" style="display:none;">
                            <section>
                            <div class="row">
                            <label class="label col col-2">Id</label>
                            <div class="col col-10">
                            <label class="input">
                                <input type="text" Id="IdTarea" name="IdTarea" placeholder="" class="form-control input-xs" readonly="true"> 
                            </label>
                            </div>
                            </div>
                            <div class="row">
                                <label class="label col col-2">Tipo</label>
                                <div class="col col-10">
                                        <label class="input">
                                            <input type="text" Id="IdTipo" name="IdTipo" placeholder="" class="form-control input-xs" readonly="true"> 
                                        </label>
                                </div>
                            </div>

                            <div class="row">
                                    <label class="label col col-2">Descripción</label>
                                    <div class="col col-10">
                                            <label class="input">
                                                    <textarea id="Descripcion" name="Descripcion" rows="5" cols="50" class="form-control input-lg" maxlength="500"> 
                                                    </textarea>
                                            </label>
                                    </div>
                            </div>
                            </section> 
                            <section>
                                <div class="row">
                                    <label class="label col col-2">Estado</label>
                                    <div class="col col-10">
                                        <label class="select">
                                                <select Id= "IdEstado" name="IdEstado" class="form-control" type="select">
                                                </select>                    
                                        <i></i>
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="label col col-2">Responsable</label>
                                    <div class="col col-10">
                                        <label class="select">
                                                <select Id= "IdResponsable" name="IdResponsable" class="form-control" type="select">
                                                </select>                     
                                        <i></i>
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="label col col-2">Fecha Ini</label>
                                        <div class="col col-10">
                                            <div class="input-group">
                                                <input type="text" Id="PlanFechaInicio" placeholder="Fecha Acción" class="form-control isDatepicker" name="PlanFechaInicio" maxlength="50">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                </div>
                                <div class="row">
                                    <label class="label col col-2">Fecha Fin</label>
                                        <div class="col col-10">
                                        <div class="input-group">
                                            <input type="text" Id="PlanFechaFinal" placeholder="Fecha Acción" class="form-control isDatepicker" name="PlanFechaFinal" maxlength="50">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        </div>
                                        </div>
                                </div>
                            </section>
                    </div>
                    <!-- TAB3 -->
                    <div class="tab-pane active" id="tab3" style="display:none;">
                            <section>
                            <div class="row">
                                <label class="label col col-2">Tipo Rel.</label>
                                <div class="col col-10">
                                        <label class="input">
                                            <label ID="lblRelTipo"></label>
                                        </label>
                                </div>
                            </div>
                            <div class="row">
                                <label class="label col col-2">Nombre</label>
                                <div class="col col-10">
                                        <label class="input">
                                            <label  ID="lblRelTipoNm"></label>
                                        </label>
                                </div>
                            </div>

                            </section>  
                            <section>
                                <div class="row">
                                    <table id="grvDatos" class="table table-striped table-bordered table-hover" width="100%">
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
                            </section>                        
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
<!-- ******** SCripts ****************************************************************************-->


<script>
    
    function fn_filtrarProcedimiento() {
        //document.getElementById
    }

    function fn_filtrarActividad() {
        //document.getElementById
    }

    var copiedEventObjectNew;
    //Custon functions

    function UpdateTimeSuccess(updateResult) {
                //alert(updateResult);
                    } 

    function UpdateTimeFailure(updateResult) {
                //alert(updateResult);
                    } 


    function UpdateTimeSuccessNew(updateResult) {
            //alert(updateResult);
            copiedEventObjectNew.id = updateResult;
            $('#calendar').fullCalendar('renderEvent', copiedEventObjectNew, true);
    } 

    function updateEventOnDropResize(event, allDay) {

            //alert("allday: " + allDay);
            var eventToUpdate = {
                id: event.id,
                start: event.start
            };

            if (event.end === null || typeof event.end === "undefined") {
                eventToUpdate.end = eventToUpdate.start;
            }
            else {
                eventToUpdate.end = event.end;
            }

            var endDate;
            if (!event.allDay) {
                endDate = new Date(eventToUpdate.end + 60 * 60000);
                endDate = endDate.toJSON();
            }
            else {
                endDate = eventToUpdate.end.toJSON();
            }

            var fechainicial = moment(eventToUpdate.start).format();
            var fechafinal = moment(eventToUpdate.end).format();
            
            eventToUpdate.start = eventToUpdate.start.toJSON();
            eventToUpdate.end = eventToUpdate.end.toJSON(); //endDate;
            eventToUpdate.allDay = event.allDay;

            //PageMethods.UpdateEventTime(eventToUpdate, UpdateTimeSuccess);
             var arrObj = [{Id: "IdTarea",Value: eventToUpdate.id }
                          ,{Id: "PlanFechaInicio",Value: fechainicial },{Id: "PlanFechaFinal",Value: fechafinal}
                          ,{Id: "PlanFechaAviso",Value: fechafinal},{Id: "DiaCompleto",Value: 0}];  
                     
             utils_Ajax ('../2_Model/calendario_service.php', 'UpdateEventTime',arrObj, '#divMensajeMain', UpdateTimeSuccess, null, 0,5000);

    }

        function fn_eventResize(event, delta, revertFunc) {
            updateEventOnDropResize(event); 
             }


         function fn_eventDrop (event, delta, revertFunc) {

             updateEventOnDropResize(event); 
             }

        function fn_drop(event) {
            event.id = 0;
            var strIdObjeto;
            var strIdObjetoTipo;
            var hddFechaCalendar;
            var responsable;
            var estado;
            var tipo;
            var fechaFinal;

            strIdObjeto = $("#hddIdObjeto").val();
            strIdObjetoTipo = $("#hddTipoObjeto").val();
            responsable = $("#filterResponsableNew").val();
            estado = $("#filterEstadoNew").val();
            alert(estado);
            tipo = $("#filterTipoNew").val();

            fechaFinal = moment(event.start); //Clonar fecha no hacer referencia a
            fechaFinal.add(moment.duration(2, 'hours'));

            //PageMethods.UpdateEventNew(event.title, event.description, event.start.format(), fechaFinal.format(),strIdObjeto,strIdObjetoTipo,responsable,estado,tipo,event.className, UpdateTimeSuccessNew);
            var arrObj = [{Id: "Titulo",Value: event.title},{Id: "Descripcion",Value: event.description}
                         ,{Id: "PlanFechaInicio",Value: event.start.format()},{Id: "PlanFechaFinal",Value: fechaFinal.format()},{Id: "PlanFechaAviso",Value: event.start.format()}
                         ,{Id: "IdObjetoTipo",Value: strIdObjetoTipo}, {Id: "IdObjeto",Value: strIdObjeto}
                         ,{Id: "IdResponsable",Value: responsable},{Id: "IdEstado",Value: estado},{Id: "IdTipo",Value: tipo}
                         ,{Id: "className",Value: event.className},{Id: "DiaCompleto",Value: 0}];  
                     
            utils_Ajax ('../2_Model/calendario_service.php', 'UpdateEventNew',arrObj, '#divMensajeMain', UpdateTimeSuccessNew, null, 0,5000);
         }

        function fn_selectDate( start, end, jsEvent, view) {
            alert(start);
        }


        function fn_filtrar() {
            document.getElementById('btnFiltrar').click();
        }

		// DO NOT REMOVE : GLOBAL FUNCTIONS!
         function Init(objData) {
                  // *******  Validaciones de cada control iniciado (parámetros separados por coma ",")

            function getJSON() {
                return objData;
            };
            function getDateSelected() {
                var strDate = $('#hddFechaCalendar').val();
                var date;
                if (strDate == "0") date = moment()
                else {
                    date = moment(strDate);
                }
                return date;
            };
            "use strict";

            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();
			
            var hdr = {
                left: 'title',
                center: 'month,agendaWeek,agendaDay',
                right: 'prev,today,next'
            };
			
            var initDrag = function (e) {
                // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                // it doesn't need to have a start or end

                var eventObject = {
                    title: $.trim(e.children().text()), // use the element's text as the event title
                    description: $.trim(e.children('span').attr('data-description')),
                    icon: $.trim(e.children('span').attr('data-icon')),
                    className: $.trim(e.children('span').attr('class')) // use the element's children as the event class
                };
                // store the Event Object in the DOM element so we can get to it later
                e.data('eventObject', eventObject);

                // make the event draggable using jQuery UI
                e.draggable({
                    zIndex: 999,
                    revert: true, // will cause the event to go back to its
                    revertDuration: 0 //  original position after the drag
                });
            };
			
            var addEvent = function (title, priority, description, icon) {
                title = title.length === 0 ? "Untitled Event" : title;
                description = description.length === 0 ? "No Description" : description;
                icon = " ";
                priority = priority.length === 0 ? "label label-default" : priority;

                var html = $('<li><span class="' + priority + '" data-description="' + description + '" data-icon="' +
                    icon + '">' + title + '</span></li>').prependTo('ul#external-events').hide().fadeIn();

                $("#event-container").effect("highlight", 800);

                initDrag(html);
            };
			
            /* initialize the external events
                 -----------------------------------------------------------------*/

            $('#external-events > li').each(function () {
                initDrag($(this));
            });
			
            $('#add-event').click(function () {
                var title = $('#title').val(),
                    priority = $('input:radio[name=priority]:checked').val(),
                    description = $('#description').val(),
                    icon = $('input:radio[name=iconselect]:checked').val();

                addEvent(title, priority, description, icon);
            });
			
            /* initialize the calendar
                 -----------------------------------------------------------------*/
			
          $('#calendar').fullCalendar({

            eventClick: fn_eventClick ,
            eventDrop: fn_eventDrop ,
            eventResize: fn_eventResize,
            defaultView: 'agendaWeek',
            //selectable: true,
            //selectHelper: true,
            //select: fn_selectDate,
            header: hdr,
                        editable: true,
                        droppable: true, // this allows things to be dropped onto the calendar !!!

                    drop: function (date, allDay) { // this function is called when something is dropped

                        // retrieve the dropped element's stored Event Object
                        var originalEventObject = $(this).data('eventObject');
                        // we need to copy it, so that multiple events don't have a reference to the same object
                        var copiedEventObject = $.extend({}, originalEventObject);

                        // assign it the date that was reported
                        copiedEventObject.start = date;

                        copiedEventObject.allDay = allDay;
                        //alert(copiedEventObject.end.format());
                        copiedEventObjectNew = copiedEventObject;
                        // render the event on the calendar
                        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                       //jco.  $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

                        // is the "remove after drop" checkbox checked?
                        if ($('#drop-remove').is(':checked')) {
                            // if so, remove the element from the "Draggable Events" list
                            $(this).remove();
                        }
                        //alert(copiedEventObject.title + " was dropped onto " + copiedEventObject.start.format());
                        fn_drop(copiedEventObject);
                    },

                        select: function (start, end, allDay) {
                            var title = prompt('Event Title:');
                            if (title) {
                                calendar.fullCalendar('renderEvent', {
                                        title: title,
                                        start: start,
                                        end: end,
                                        allDay: allDay
                                    }, true // make the event "stick"
                                );
                            }
                            calendar.fullCalendar('unselect');

                        },

            events: getJSON(),
            defaultDate: getDateSelected(),
            timezone: 'local',
            minTime: "06:00:00",
            nowIndicator: true,
            navLinks: true, 
            eventLimit: 2,
                        eventRender: function (event, element, icon) {
                            if (!event.description == "") {
                                element.find('.fc-title').append("<br/><span class='ultra-light'>" + event.description +
                                    "</span>");
                            }
                            if (!event.icon == "") {
                                element.find('.fc-title').append("<i class='air air-top-right fa " + event.icon +
                                    " '></i>");
                }

                        },

                        windowResize: function (event, ui) {
                            $('#calendar').fullCalendar('render');
            }
            ,
          views: {
              listAll: {
              type: 'list',
              theme: true,
              visibleRange: function(currentDate) {
                return {
                  start: currentDate.clone().subtract(365, 'days'),
                  end: currentDate.clone().add(365, 'days') 
                };
              }
            }
          }

                    });

        /* hide default buttons */
        $('.fc-right, .fc-center').hide();
		
        $('#calendar-buttons #btn-prev').click(function () {
            $('.fc-prev-button').click();
            return false;
        });
				
        $('#calendar-buttons #btn-next').click(function () {
            $('.fc-next-button').click();
            return false;
        });

        $('#calendar-buttons #btn-today').click(function () {
            $('.fc-today-button').click();
            return false;
        });

        $('#mt').click(function () {
            $('#calendar').fullCalendar('changeView', 'month');
        });

        $('#ag').click(function () {
            $('#calendar').fullCalendar('changeView', 'agendaWeek');
        });

        $('#td').click(function () {
            $('#calendar').fullCalendar('changeView', 'agendaDay'); //jco. falta hoy
        });	

        $('#custom_ds').click(function () {
                            $('#calendar').fullCalendar('changeView', 'agendaDay');  
                        });            

        $('#custom_All').click(function () {
                            $('#calendar').fullCalendar('changeView', 'listAll');  //jco. ajustar forma comose ve la vista
        });  

        $('#custom_wk').click(function () {
                            $('#calendar').fullCalendar('changeView', 'basicWeek');  //jco. ajustar forma comose ve la vista
                        });             
        }
        $(function() {
            //Init();
              // Validation
              runAllForms();
              //load_pagina(0);

      }); 

    </script>

<script src="<?php echo ASSETS_URL; ?>/4_Utils/Utils.js?v=3"></script>
<script src="<?php echo ASSETS_URL; ?>/1_view/calendario_view.js?v=2"></script>

<script>
    function fn_eventClick (calEvent, jsEvent, view) 
    {
     var arrObj = [{Id: "IdTarea",Value: calEvent.id }]; 
     utils_Ajax ('../2_Model/calendario_service.php', 'getTareaId',arrObj, '#divMensajeMain', showModalTareaIdSuccess, "form2", 10,5000);
    }

    function showModalTareaIdSuccess(objData,formid)
    {
       if (objData.datos.length >0)
       {
           utils_setInputsArray(formid,objData.datos);
           $("#btnActualizarModal").click();
       };
    }
    
         function fn_change_tab(tab) {
         switch (tab) {
             case 1:
                 $('#tab1').show();
                 $('#tab2').hide();
                 $('#tab3').hide();
                 $('#ltab1').addClass('active');
                 $('#ltab2').removeClass('active');
                 $('#ltab3').removeClass('active');
                 break;
             case 2:
                 $('#tab1').hide();
                 $('#tab2').show();
                 $('#tab3').hide();
                 $('#ltab1').removeClass('active');
                 $('#ltab2').addClass('active');
                 $('#ltab3').removeClass('active');
                 break;
             case 3:
                 $('#tab1').hide();
                 $('#tab2').hide();
                 $('#tab3').show();
                 $('#ltab1').removeClass('active');
                 $('#ltab2').removeClass('active');
                 $('#ltab3').addClass('active');
                 break;
         }
     }
 </script>