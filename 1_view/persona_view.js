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

utils_Ajax ('2_Model/persona_service.php', 'getAllInfo',arrObj, '#divMensaje', fn_load_pagina_response, null, 0,5000);

}

function fn_load_pagina_response(objData,formid)
{	
//Pintar combo de activos, si fue llamado con ACtivo=0

fn_pintar_Persona(objData.datos);
}

// ========================== VARIOS ================================= -->	

function fn_pintar_Persona(objData)
{	

        var arrFields = new Array ("id","nombre","apellido", "email","telefono");
       
     var strHtmlRow = '<tr>'+
        '<td>@id</td>'+
        '<td>@nombre</td>'+
        '<td>@apellido</td>'+
        '<td>@email</td>'+
        '<td>@telefono</td>'+
        '<td><a class="btn btn-warning btn-sm" href=javascript:fn_tab1_editar_Id("feditar",@id);>   <i class="fa fa-pencil"></i></a></td>'+
        '<td><a class="btn btn-danger btn-sm" href=javascript:fn_tab1_eliminar_Id("form1",@id);>  <i class="fa fa-remove"></i></a></td>' 
        '</tr>';

        utils_pintar_tablahtml("grvDatos", objData, strHtmlRow,arrFields);
}



function fn_tab1_guardar_submit() //agregar
{   var formid ="form1";
    if (!utils_validateInputs(formid,'#divMensajeAgregar')) return;
    var arrObj;
    arrObj = utils_getInputs_arrayObj (formid);
    utils_Ajax ('2_Model/persona_service.php', 'add' ,arrObj, '#divMensajeAgregar', fn_tab1_guardar_submit_response, formid,2000,5000);
    alertify.success('Registro Agregado Correctamente...'); 
       
}
	
	function  fn_tab1_guardar_submit_response(objData,formid)
{ 
     alert("11");
    fn_pintar_Persona(objData.datos);
    $('#button').click();
    
}

function limpiar() {

    utils_setInputsNull("form1");

}

function fn_tab1_editar_Id(f, controlId)
{
     
 $('#btnEditarModal').click();
 var arrObj = [{Id: "id",Value: controlId}];
 utils_Ajax ('2_Model/persona_service.php', 'getId',arrObj, '#divMensajeEdicion', fn_tab1_editar_Id_response, f,0,5000);


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
    utils_Ajax ('2_Model/persona_service.php', 'update',arrObj, '#divMensajeEdicion', fn_tab1_guardar_submit_response, formid,2000,5000);
    alertify.message('Registro Actualizado');}

function fn_tab1_eliminar_submit() //eliminar
{   var formid ="feliminar";
    if (!utils_validateInputs(formid,"#divMensajeEdicion")) return;
    var arrObj;
    arrObj = utils_getInputs_arrayObj (formid);
    utils_Ajax ('2_Model/persona_service.php', 'delete',arrObj, '#divMensajeEdicion', fn_tab1_eliminar_submit_response, formid,2000,5000);
    $(".custom-close").on('click', function() {
        $('#ModalEliminar').modal('hide');
    });
    alertify.warning('¡Registro Eliminado!'); 


}
function fn_tab1_eliminar_Id(f, controlId)
{
     
    $('#btnEliminarModal').click();    
    var arrObj = [{Id: "id",Value: controlId}];
    utils_Ajax ('2_Model/persona_service.php', 'delete',arrObj, '#divMensajeEdicion', fn_tab1_eliminar_Id_response, f,0,5000);
    
if (result.value) {
           window.location.href = grvDatos;
        }
  

}
function fn_tab1_eliminar_Id_response(objData, formid)
{
  utils_setInputsArray(formid,objData.datos);
}
function  fn_tab1_eliminar_submit_response(objData,formid)
{ 
	fn_pintar_Persona(objData.datos);

}

