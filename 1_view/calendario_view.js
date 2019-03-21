// ==========================CARGAR LA PAGINA ================================= -->	

$(function() {
    
        // Validation
        runAllForms();
        load_pagina(0);

});
	
// ==========================ACCIONES DEL FORMULARIO ========================== -->	
function load_pagina(idEstado)
{
    var arrObj = [{Id: "idEstado",Value: idEstado}];
    //fn_tab1_limpiar_submit("form1");
    utils_Ajax ('2_Model/calendario_service.php', 'getCalendarAllInfo',arrObj, '#divMensajeMain', fn_load_pagina_response, null, 200,5000);
  
}

function fn_load_pagina_response(objData,formid)
{	
    //Pintar combos al cargar la pagina
    if (objData.datosEquipo.length >0)
    {
        utils_pintar_listahtml("#ddlFilterEquipo", objData.datosEquipo, "IdEquipo", "Nombre", "");
        utils_pintar_listahtml_addOption("#ddlFilterEquipo","0","(Todos mis equipos)",true);
        utils_pintar_listahtml("#ddlFilterResponsable", objData.datosUsuario, "IdUsuario", "Alias", "");
        utils_pintar_listahtml_addOption("#ddlFilterResponsable","0","(Todos los usuario)",true);
        utils_pintar_listahtml("#filterResponsableNew", objData.datosUsuario, "IdUsuario", "Alias", "");
        utils_pintar_listahtml("#ddlFiltroEjecutor", objData.datosUsuario, "IdUsuario", "Alias", "");
        utils_pintar_listahtml("#IdResponsable", objData.datosUsuario, "IdUsuario", "Alias", "");
        utils_pintar_listahtml("#ddlFilterEstado", objData.datosEstado, "IdEstado", "Nombre", "");
        utils_pintar_listahtml("#filterEstadoNew", objData.datosEstado, "IdEstado", "Nombre", "");
        utils_pintar_listahtml("#IdEstado", objData.datosEstado, "IdEstado", "Nombre", "");
        utils_pintar_listahtml("#filterTipoNew", objData.datosTipo, "IdTipo", "Nombre", "");
        fn_pintar_Tareas(objData.datosTareas);
    };

};

function fn_pintar_Tareas(objData)
{	
 Init(objData);
};
 
function fn_filtrarEquipo() {
   var arrObj = [{Id: "idEquipo",Value: $("#ddlFilterEquipo").val()}];
   utils_Ajax ('2_Model/calendario_service.php', 'getCalendarEquipo',arrObj, '#divMensajeMain', fn_filtrarEquipo_response, null, 0,5000);

}

function fn_filtrarEquipo_response(objData,formid)
{
   utils_pintar_listahtml("#ddlFilterResponsable", objData.datosUsuario, "IdUsuario", "Alias", "");
   utils_pintar_listahtml_addOption("#ddlFilterResponsable","0","(Todos los usuario)",true);

   utils_pintar_listahtml("#filterResponsableNew", objData.datosUsuario, "IdUsuario", "Alias", "");

    $('#calendar').fullCalendar('removeEvents');
    $('#calendar').fullCalendar('addEventSource',objData.datosTareas);
    $('#calendar').fullCalendar('rerenderEvents');   
}

function fn_filtrarResponsable() {
   var arrObj = [{Id: "idResponsable",Value: $("#ddlFilterResponsable").val()}
                ,{Id: "idEquipo",Value: $("#ddlFilterEquipo").val()}];
   utils_Ajax ('2_Model/calendario_service.php', 'getCalendarUsuario',arrObj, '#divMensajeMain', fn_filtrarResponsable_response, null, 0,5000);
}

function fn_filtrarResponsable_response(objData,formid)
{
    $('#calendar').fullCalendar('removeEvents');
    $('#calendar').fullCalendar('addEventSource',objData.datosTareas);
    $('#calendar').fullCalendar('rerenderEvents');
    
} 