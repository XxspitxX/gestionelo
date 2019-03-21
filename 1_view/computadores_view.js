// ==========================CARGAR LA PAGINA ================================= -->	

$(function() {

    // Validation
    runAllForms();
    //utils_validateConfig("checkout-tab1");
    load_pagina(0);

});

// ==========================ACCIONES DEL FORMULARIO ========================== -->	
function load_pagina(idEstado)
{
var arrObj = [{Id: "id",Value: 0}];

utils_Ajax ('2_Model/computadores_service.php', 'getcomputadoresAllInfo',arrObj, '#divMensaje', fn_load_pagina_response, null, 0,5000);

}

function fn_load_pagina_response(objData,formid)
{	
//Pintar combo de activos, si fue llamado con ACtivo=0

fn_pintar_computadores(objData.datos);
}

// ========================== VARIOS ================================= -->	

function fn_pintar_computadores(objData)
{	

        var arrFields = new Array ("id","Marca","Referencia", "perifericos","Incidencias");
       
     var strHtmlRow = '<tr>'+
        '<td>@id</td>'+
        '<td>@Marca</td>'+
        '<td>@Referencia</td>'+
        '<td>@perifericos</td>'+
        '<td>@Incidencias</td>'+
        '<td><a class="btn btn-warning" href=javascript:fn_tab1_editar_Id("feditar",@id);>   <i class="fa fa-pencil"></i></a></td>'+
        '<td><a class="btn btn-danger" href=javascript:fn_tab1_eliminar_Id("form1",@id);> <i class="fa fa-remove"></i></a></td>' 
    '</tr>';

        utils_pintar_tablahtml("grvDatos", objData, strHtmlRow,arrFields);
}


function fn_tab1_guardar_submit()  //boton agregar
{   var formid ="form1";
    if (!utils_validateInputs(formid,"#divMensajeEdicion")) return;
    var arrObj;
    arrObj = utils_getInputs_arrayObj (formid);
    utils_Ajax ('2_Model/computadores_service.php', 'addcomputadores',arrObj, '#divMensajeEdicion', fn_tab1_guardar_submit_response, formid,2000,5000);

    
    
}

	function  fn_tab1_guardar_submit_response(objData, formid)
{ 
	fn_pintar_computadores(objData.datos);
    
}

$(function () {
    
    $(".custom-close").on('click', function() {
        $('#modalNuevo').modal('hide');
    });
});


function fn_tab1_editar_Id(f, controlId)
{
     
    $('#btnEditarModal').click();    
    var arrObj = [{Id: "id",Value: controlId}];
    utils_Ajax ('2_Model/computadores_service.php', 'getIdcomputadores',arrObj, '#divMensajeEdicion', fn_tab1_editar_Id_response, f,0,5000);

  

}

function fn_tab1_editar_Id_response(objData, formid)
{
  utils_setInputsArray(formid,objData.datos);
}

 
function fn_tab1_editar_submit() //editar
{   var formid ="feditar";
    if (!utils_validateInputs(formid,"#divMensajeEdicion")) return;
    var arrObj;
    arrObj = utils_getInputs_arrayObj (formid);
    utils_Ajax ('2_Model/computadores_service.php', 'updatecomputadores',arrObj, '#divMensajeEdicion', fn_tab1_guardar_submit_response, formid,2000,5000);
	alertify.confirm('Confirm Message', function(){ alertify.success('Ok') });

}

function fn_tab1_eliminar_submit() //eliminar
{   var formid ="feliminar";
    if (!utils_validateInputs(formid,"#divMensajeEdicion")) return;
    var arrObj;
    arrObj = utils_getInputs_arrayObj (formid);
    utils_Ajax ('2_Model/computadores_service.php', 'deletecomputadores',arrObj, '#divMensajeEdicion', fn_tab1_guardar_submit_response, formid,2000,5000);
    alertify.confirm('Confirm Message', function(){ alertify.success('Ok') });
    

}
function fn_tab1_eliminar_Id(f, controlId)
{
     
    $('#btnEliminarModal').click();    
    var arrObj = [{Id: "id",Value: controlId}];
    utils_Ajax ('2_Model/computadores_service.php', 'deletecomputadores',arrObj, '#divMensajeEdicion', fn_tab1_eliminar_Id_response, f,0,5000);
    

  

}
function fn_tab1_eliminar_Id_response(objData, formid)
{
  utils_setInputsArray(formid,objData.datos);
}

$(function () {
    
    $(".custom-close").on('click', function() {
        $('#modalNuevo').modaldelete('hide');
    });
});