// ==========================CARGAR LA PAGINA ================================= -->	

$(function() {
        // Validation
        runAllForms();
        //utils_validateConfig("checkout-tab1");
        load_pagina(0);

});
	
// ==========================ACCIONES DEL FORMULARIO ========================== -->	
function fn_lstMisActivos_onchange()
{
    load_pagina($("#lstMisActivos").val());
}
function load_pagina(idActivo)
{
    var arrObj = [{Id: "IdActivo",Value: idActivo}];
    fn_tab1_limpiar_submit("checkout-tab1");
    
    utils_Ajax ('2_Model/residente_service.php', 'getResidenteAllInfo',arrObj, '#divMensajeR', fn_load_pagina_response, null, 200,5000);
    $("#btn_r_agregar").show();
    $("#btn_r_modificar").hide();
    $("#btn_r_eliminar").hide();
    $("#btn_v_agregar").show();
    $("#btn_v_modificar").hide();
    $("#btn_p_agregar").show();
    $("#btn_p_modificar").hide();
    $("#btn_m_agregar").show();
    $("#btn_m_modificar").hide();    

}

function fn_load_pagina_response(objData,formid)
{	
    //Pintar combo de activos, si fue llamado con ACtivo=0
    if (objData.datosA.length >0)
    {
        utils_pintar_listahtml("#lstMisActivos", objData.datosA, "IdActivo", "Nombre", "");
        utils_pintar_listahtml("#v_lsttipo", objData.ListaTipoVehiculo, "IdTipo", "Nombre", "");
        utils_pintar_listahtml("#p_lstIdTipoApoyo", objData.ListaTipoApoyo, "IdTipo", "Nombre" ,  "");
    };
    fn_pintar_Residente(objData.datosR);
    fn_pintar_Vehiculo(objData.datosV);
    fn_pintar_Personal(objData.datosP);
    fn_pintar_Mascota(objData.datosM);
}
// ==========================TAB1 ========================== -->
function fn_tab1_limpiar_submit(formid)
{
    utils_setInputsNull(formid);
    
    $("#btn_r_agregar").show();
    $("#btn_r_modificar").hide();

}

function fn_tab1_agregar_submit(formid)
{
    if (!utils_validateInputs(formid,"#divMensajeR")) return;
    
    var arrObj;
    arrObj = utils_getInputs_arrayObj (formid);

    var obj = new Object();
    obj.Id = "IdActivo";
    obj.Value = $("#lstMisActivos").val();
    arrObj.push(obj);
    utils_Ajax ('2_Model/residente_service.php', 'addResidente',arrObj, '#divMensajeR', fn_tab1_agregar_submit_response, formid,2000,5000);
}
    
function fn_tab1_agregar_submit_response(objData, formid)
{ 
   fn_pintar_Residente(objData.datos);
};
        
function fn_tab1_editar_submit(formid)
{
    if (!utils_validateInputs(formid,"#divMensajeR")) return;
    
    var arrObj;
    arrObj = utils_getInputs_arrayObj (formid);
    var obj = new Object();
    obj.Id = "IdActivo";
    obj.Value = $("#lstMisActivos").val();
    arrObj.push(obj);
    utils_Ajax ('2_Model/residente_service.php', 'updateResidente',arrObj, '#divMensajeR', fn_tab1_editar_submit_response, formid, 2000,5000);

}
function fn_tab1_editar_submit_response(objData, formid)
{ 
   fn_pintar_Residente(objData.datos);
};	
function fn_tab1_mostrar_Id(formid, Id)
{   
    $("#btn_r_agregar").hide();
    $("#btn_r_modificar").show();
    $("#btn_r_eliminar").hide();

    var arrObj = [{Id: "IdActivoResidente",Value: Id}];
    utils_Ajax ('2_Model/residente_service.php', 'getResidenteId',arrObj, '#divMensajeR', fn_tab1_mostrar_Id_response, formid,0,5000);
};
        
function fn_tab1_mostrar_Id_response(objData, formid)
{ 
    utils_setInputsArray(formid,objData.datos);
};

// ==========================TAB2 ========================== -->        
function fn_tab2_limpiar_submit(formid)
{
    utils_setInputsNull(formid);
    $("#btn_v_agregar").show();
    $("#btn_v_modificar").hide();

}
        
function fn_tab2_agregar_submit(formid)
{
    if (!utils_validateInputs(formid,"#divMensajeV")) return;
    var arrObj;
    arrObj = utils_getInputs_arrayObj (formid);

    var obj = new Object();
    obj.Id = "IdActivo";
    obj.Value = $("#lstMisActivos").val();
    arrObj.push(obj);
    utils_Ajax ('2_Model/residente_service.php', 'addVehiculo',arrObj, '#divMensajeV', fn_tab2_agregar_submit_response, formid,2000,5000);
}
    
function fn_tab2_agregar_submit_response(objData, formid)
{ 
   fn_pintar_Vehiculo(objData.datos); 
};
        
function fn_tab2_editar_submit(formid)
{
    if (!utils_validateInputs(formid,"#divMensajeV")) return;
    var arrObj;
    arrObj = utils_getInputs_arrayObj (formid);
    var obj = new Object();
    obj.Id = "IdActivo";
    obj.Value = $("#lstMisActivos").val();
    arrObj.push(obj);
    utils_Ajax ('2_Model/residente_service.php', 'updateVehiculo',arrObj, '#divMensajeV', fn_tab2_editar_submit_response, formid, 2000,5000);

}
function fn_tab2_editar_submit_response(objData, formid)
{ 
   fn_pintar_Vehiculo(objData.datos);
};	
function fn_tab2_mostrar_Id(formid, Id)
{   
    $("#btn_v_agregar").hide();
    $("#btn_v_modificar").show();

    var arrObj = [{Id: "IdActivoVehiculo",Value: Id}];
    utils_Ajax ('2_Model/residente_service.php', 'getVehiculoId',arrObj, '#divMensajeV', fn_tab2_mostrar_Id_response, formid,0,5000);
};
        
function fn_tab2_mostrar_Id_response(objData, formid)
{ 
    utils_setInputsArray(formid,objData.datos);
};
// ==========================TAB3 ========================== -->
function fn_tab3_limpiar_submit(formid)
{
    utils_setInputsNull(formid);
    $("#btn_p_agregar").show();
    $("#btn_p_modificar").hide();

}
        
function fn_tab3_agregar_submit(formid)
{
    if (!utils_validateInputs(formid,"#divMensajeP")) return;
    var arrObj;
    arrObj = utils_getInputs_arrayObj (formid);

    var obj = new Object();
    obj.Id = "IdActivo";
    obj.Value = $("#lstMisActivos").val();
    arrObj.push(obj);
    utils_Ajax ('2_Model/residente_service.php', 'addPersonal',arrObj, '#divMensajeP', fn_tab3_agregar_submit_response, formid,2000,5000);
}
    
function fn_tab3_agregar_submit_response(objData, formid)
{ 
   fn_pintar_Personal(objData.datos); 
};
        
function fn_tab3_editar_submit(formid)
{
    if (!utils_validateInputs(formid,"#divMensajeP")) return;
    var arrObj;
    arrObj = utils_getInputs_arrayObj (formid);
    var obj = new Object();
    obj.Id = "IdActivo";
    obj.Value = $("#lstMisActivos").val();
    arrObj.push(obj); //agregarlo al final
    utils_Ajax ('2_Model/residente_service.php', 'updatePersonal',arrObj, '#divMensajeP', fn_tab3_editar_submit_response, formid, 2000,5000);

}
function fn_tab3_editar_submit_response(objData, formid)
{ 
   fn_pintar_Personal(objData.datos);
};	
function fn_tab3_mostrar_Id(formid, Id)
{   
    $("#btn_p_agregar").hide();
    $("#btn_p_modificar").show();

    var arrObj = [{Id: "IdActivoApoyo",Value: Id}];
    utils_Ajax ('2_Model/residente_service.php', 'getPersonalId',arrObj, '#divMensajeP', fn_tab3_mostrar_Id_response, formid,0,5000);
};
        
function fn_tab3_mostrar_Id_response(objData, formid)
{ 
    utils_setInputsArray(formid,objData.datos);
};
// ==========================TAB4 ========================== -->
function fn_tab4_limpiar_submit(formid)
{
    utils_setInputsNull(formid);
    $("#btn_m_agregar").show();
    $("#btn_m_modificar").hide();

}
        
function fn_tab4_agregar_submit(formid)
{
    if (!utils_validateInputs(formid,"#divMensajeM")) return;
    var arrObj;
    arrObj = utils_getInputs_arrayObj (formid);

    var obj = new Object();
    obj.Id = "IdActivo";
    obj.Value = $("#lstMisActivos").val();
    arrObj.push(obj);
    utils_Ajax ('2_Model/residente_service.php', 'addMascota',arrObj, '#divMensajeM', fn_tab4_agregar_submit_response, formid,2000,5000);
}
    
function fn_tab4_agregar_submit_response(objData, formid)
{ 
   fn_pintar_Mascota(objData.datos); 
};
        
function fn_tab4_editar_submit(formid)
{
    if (!utils_validateInputs(formid,"#divMensajeM")) return;
    var arrObj;
    arrObj = utils_getInputs_arrayObj (formid);
    var obj = new Object();
    obj.Id = "IdActivo";
    obj.Value = $("#lstMisActivos").val();
    arrObj.push(obj);
    utils_Ajax ('2_Model/residente_service.php', 'updateMascota',arrObj, '#divMensajeM', fn_tab4_editar_submit_response, formid, 2000,5000);

}
function fn_tab4_editar_submit_response(objData, formid)
{ 
   fn_pintar_Mascota(objData.datos);
};	
function fn_tab4_mostrar_Id(formid, Id)
{   
    $("#btn_m_agregar").hide();
    $("#btn_m_modificar").show();

    var arrObj = [{Id: "IdActivoMascota",Value: Id}];
    utils_Ajax ('2_Model/residente_service.php', 'getMascotaId',arrObj, '#divMensajeM', fn_tab4_mostrar_Id_response, formid,0,5000);
};
        
function fn_tab4_mostrar_Id_response(objData, formid)
{ 
    utils_setInputsArray(formid,objData.datos);
};

// ========================== VARIOS ================================= -->	
function fn_pintar_Residente(objDatadatosR)
{	
            var strHtmlRow = '<tr>'+
                '<td><a class="btn btn-primary" href=javascript:fn_tab1_mostrar_Id("checkout-tab1",@IdActivoResidente);> <i class="fa fa-edit"></i></a></td>'+
                '<td>@Nombres</td>'+
                '<td>@Correo</td>'+
                '<td>@FechaNacimiento</td>'+
                '<td>@Telefono</td>'+
                
            '</tr>';
            var arrFields = new Array ("IdActivoResidente","Nombres","Correo","FechaNacimiento","Telefono","Vigente");
            utils_pintar_tablahtml("grvDatos", objDatadatosR, strHtmlRow,arrFields);
}
function fn_pintar_Vehiculo(objDatadatosV)
{   
    strHtmlRow = '<tr>'+
                '<td><a class="btn btn-primary" href=javascript:fn_tab2_mostrar_Id("checkout-tab2",@IdActivoVehiculo);> <i class="fa fa-edit"></i></a></td>'+
                '<td>@Tipo</td>'+
                '<td>@Placa</td>'+
                '<td>@Modelo</td>'+
                '<td>@Marca</td>'+
                '<td>@Vigente</td>'+
            '</tr>';
            arrFields = new Array ("IdActivoVehiculo","Tipo","Placa","Modelo","Marca","Vigente");
            utils_pintar_tablahtml("grvDatosV", objDatadatosV, strHtmlRow,arrFields);
}

function fn_pintar_Personal(objDatadatosP)
{
            strHtmlRow = '<tr>'+
                '<td><a class="btn btn-primary" href=javascript:fn_tab3_mostrar_Id("checkout-tab3",@IdActivoApoyo);> <i class="fa fa-edit"></i></a></td>'+
                '<td>@Nombres</td>'+
                '<td>@Identificacion</td>'+
                '<td>@TipoApoyo</td>'+
                '<td>@Vigente</td>'+
            '</tr>';
            arrFields = new Array ("IdActivoApoyo","Nombres","Identificacion","TipoApoyo","Vigente");
            utils_pintar_tablahtml("grvDatosP", objDatadatosP, strHtmlRow,arrFields);
}
function fn_pintar_Mascota(objDatadatosM)
{
            strHtmlRow = '<tr>'+
                '<td><a class="btn btn-primary" href=javascript:fn_tab4_mostrar_Id("checkout-tab4",@IdActivoMascota);> <i class="fa fa-edit"></i></a></td>'+
                '<td>@Raza</td>'+
                '<td>@Cantidad</td>'+
            '</tr>';
            arrFields = new Array ("IdActivoMascota","Raza","Cantidad");
            utils_pintar_tablahtml("grvDatosM", objDatadatosM, strHtmlRow,arrFields);
}