// ==========================CARGAR LA PAGINA ================================= -->	

$(function() {
    
        // Validation
        runAllForms();
        //utils_validateConfig("checkout-tab1");
        load_pagina(0);

});
	
// ==========================ACCIONES DEL FORMULARIO ========================== -->	
function fn_lstFiltroEstados_onchange()
{
    load_pagina($("#lstFiltroEstados").val());
}
function load_pagina(idEstado)
{
    var arrObj = [{Id: "idEstado",Value: idEstado}];
    fn_tab1_limpiar_submit("form1");
    utils_Ajax ('2_Model/mejora_service.php', 'getMejoraAllInfo',arrObj, '#divMensaje', fn_load_pagina_response, null, 0,5000);
  
}

function fn_load_pagina_response(objData,formid)
{	
    //Pintar combo de activos, si fue llamado con ACtivo=0
    if (objData.datosEstados.length >0)
    {
        utils_pintar_listahtml("#lstFiltroEstados", objData.datosEstados, "IdEstado", "Nombre", "");
        utils_pintar_listahtml("#IdTipo", objData.datosTipos, "IdTipo", "Nombre", "");
        utils_pintar_listahtml("#IdEstado", objData.datosEstados, "IdEstado", "Nombre", "");
        utils_pintar_listahtml("#IdUsuarioReporta", objData.datosUsuarios, "IdUsuarioReporta", "Alias", "");
    };
    fn_pintar_Mejora(objData.datosMejoras);
}
// ==========================TAB1 ========================== -->
function fn_tab1_limpiar_submit(formid)
{
    utils_setInputsNull(formid);
   
    $("#btn_agregar").show();
    $("#btn_modificar").hide();

}

function fn_tab1_guardar_submit()
{   var formid ="form1";
    if (!utils_validateInputs(formid,"#divMensajeEdicion")) return;

    var arrObj;
    arrObj = utils_getInputs_arrayObj (formid);
    
    if ($('#IdMejora').val() !== "")
    {
        utils_Ajax ('../2_Model/mejora_service.php', 'updateMejora',arrObj, '#divMensajeEdicion', fn_tab1_guardar_submit_response, formid, 2000,5000);
    }
    else
    {
        utils_Ajax ('../2_Model/mejora_service.php', 'addMejora',arrObj, '#divMensajeEdicion', fn_tab1_guardar_submit_response, formid,2000,5000);
    };

}
    
function fn_tab1_guardar_submit_response(objData, formid)
{ 
   fn_pintar_Mejora(objData.datos);
};
        
	
function fn_tab1_mostrar_Id(formid, Id)
{   
    $("#btn_agregar").hide();
    $("#btn_modificar").show();
    
   $('#lblModalTitulo').html("Editar Mejora");    
    $('#btnAgregarModal').click();

    var arrObj = [{Id: "IdMejora",Value: Id}];
    utils_Ajax ('../2_Model/mejora_service.php', 'getMejoraId',arrObj, '#divMensajeEdicion', fn_tab1_mostrar_Id_response, formid,0,5000);
};
        
function fn_tab1_mostrar_Id_response(objData, formid)
{ 
    utils_setInputsArray(formid,objData.datos);
};

function fn_btn_ver_agregar()
{ 
   $('#lblModalTitulo').html("Agregar Mejora");
   utils_setInputsNull("form1");
   $('#btnAgregarModal').click();
};
// ========================== VARIOS ================================= -->	
function fn_pintar_Mejora(objDatadatosMejora)
{	
            var strHtmlRow = '<tr>'+
                '<td><a class="btn btn-primary" href=javascript:fn_tab1_mostrar_Id("form1",@IdMejora);> <i class="fa fa-edit"></i></a></td>'+
                '<td>@Tipo</td>'+
                '<td>@Nombre</td>'+
                '<td>@Estado</td>'+
                '<td>@UsuarioReporta</td>'
            '</tr>';
            var arrFields = new Array ("IdMejora","Tipo","Nombre", "Estado","UsuarioReporta");
            utils_pintar_tablahtml("grvDatos", objDatadatosMejora, strHtmlRow,arrFields);
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