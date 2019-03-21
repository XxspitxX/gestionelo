
// ***************** DATABIND HTML Objects ******************************************************************
function  utils_pintar_listahtml(domId, arrObjects, strIdField, strValueField, valDefecto) 
{
    var value;
    value= "";
    $(domId).empty();
    for(var i=0; i < arrObjects.length; i++)
    {		
    utils_pintar_listahtml_addOption(domId,arrObjects[i][strIdField], arrObjects[i][strValueField], true); 
    if (arrObjects[i][strIdField] == valDefecto) value = arrObjects[i][strIdField];
    };
     if (value != "") $(domId).val(value);
};

function utils_pintar_listahtml_addOption(domId,Id, Value, final)
{
    var option = document.createElement("option"); 
    option.value = Id;
    $(option).html(Value);
    if (final)
    {
    $(option).appendTo(domId); 
    }
    else
    {
    $(option).appendTo(domId);         
    }
}
 
function utils_getInputs_arrayObj(formid)
{
    var arr = new Array();
    var _formid =  "#" + formid;
    
    $(_formid).find(':input').each(function() {
            var name = $(this).attr("name");
            var id = $(this).attr("id");
            var type = $(this).attr("type");
            var val = $(this).val();
            var obj = new Object();
            if (typeof name !=='undefined' && typeof id !=='undefined') 
            {
                switch(type) {
                    case 'checkbox':
                        obj.Id = name;
                        obj.Value = $(this).prop('checked')? 1 : 0;
                        break;
                    case 'fecha':
                        obj.Id = name;
                        obj.Value = formatDatetoMySql(val);
                        break;
                      
                    default:
                        obj.Id = name;
                        obj.Value = val;
                        break;
                        };
                  arr.push(obj);
           };
   });
   
  return arr;
};

function utils_setInputsNull(formid)
{
        var  _formid =  "#" + formid;
        $(_formid).find(':input').each(function() {
         var name = $(this).attr("name");
         var id = $(this).attr("id");
         var type = $(this).attr("type");
         var val = $(this).val();

        if (typeof name !=='undefined' && typeof id !=='undefined') 
        {
                switch(type) {
                    case 'checkbox':
                        $(this).prop('checked',false);
                        break;
                    case 'select':
                        //$(this).val("");
                        break;                        
                    case 'fecha':
                        $(this).val("");
                        break;
                    default:
                        $(this).val("");
                        break;
                        };
       };
    });
};

function utils_setInputsArray(formid,arrObjects)
{
        var  _formid =  "#" + formid;
        //alert(JSON.stringify(arrObjects));
        $(_formid).find(':input').each(function() 
        {
                var name = $(this).attr("name");
                var id = $(this).attr("id");
                var type = $(this).attr("type");
                var val = $(this).val();

               if (typeof name !=='undefined' && typeof id !=='undefined') 
               {
                switch(type) {
                    case 'checkbox':
                        if (arrObjects[0][name] === "1") 
                        { $(this).prop('checked',true);}
                         else {$(this).prop('checked',false);};
                        break;
                    case 'fecha':
                        $(this).val(formatDateMySqltoInput(arrObjects[0][name]));
                        break;
                    case 'select':
                        $(this).val(arrObjects[0][name]);
                        break;
                    default:
                        $(this).val(arrObjects[0][name]);
                        break;
                        };
              };
    });
}

function utils_validateInputs(formid, DivMensaje)
{
        var  _formid =  "#" + formid;
        var strValido = "";
        $(_formid).find(':input').each(function() 
        {
                var name = $(this).attr("name");
                var id = $(this).attr("id");
                var type = $(this).attr("type");
                var val = $(this).val();

               if (typeof name !=='undefined' && typeof id !=='undefined') 
               {
                var inpObj = document.getElementById(id);
                if (!inpObj.checkValidity()) {
                    strValido = strValido + "<br>" + name + ": " + inpObj.validationMessage;
                                            }                
            
              };
    });
    if (strValido !== "")
    {
        mostrarMensajeEtiqueta(DivMensaje, "warning", strValido,3000);
        return false;
    }
    else
    {
        return true;
    }
}

function utils_validateConfig(formid)
{
     var _formid =  "#" + formid;
    $(_formid).validate({
                // Rules for form validation
                rules : {
                        email : {
                                required : true,
                                email : true
                        },
                        r_nombre : {
                                required : true
                        }                        
                },

                // Messages for form validation
                messages : {
                        email : {
                                required : 'Por favor ingrese su Email',
                                email : 'Por favor ingrese un Email valido'
                        },
                        r_nombre : {
                                required : 'Por favor ingrese un texto valido'
                        }                        
                },

                // Do not change code below
                errorPlacement : function(error, element) {
                        error.insertAfter(element.parent());
                }
        });
}

function utils_pintar_tablahtml(tableId, datos, strHtmlRow,arrFields)
{
  var strTable = "#" + tableId;
  $(strTable + " tbody").empty();
  for (i=0; i < datos.length; i++) 
  {
     strFila = strHtmlRow;
     
     for (j=0; j < arrFields.length; j++) 
     {
         //buscar hasta cuatro ocurriencia del mismo item, JS solo reempplaza la primera ocurrencia
         strFila = strFila.replace("@"+arrFields[j], datos[i][arrFields[j]]);
         strFila = strFila.replace("@"+arrFields[j], datos[i][arrFields[j]]);
         strFila = strFila.replace("@"+arrFields[j], datos[i][arrFields[j]]);
         strFila = strFila.replace("@"+arrFields[j], datos[i][arrFields[j]]);

     };
     
     $(strTable + " > tbody").append(strFila);
  }
    
}


// ***************** MENSAJES DE ERROR ADVERTENCIA E LA PAGINA *******************************************************************
function mostrarMensajeEtiqueta(divMensaje, tipoMensaje, msgEtiqueta, milisegundos) {
  if (milisegundos>0) 
  {
    var alertType = 'alert-warning';
    var alertIcon = 'fa-check';
    var alertTitle = 'Info!';
    var alertHtml = "<div class='alert %TYPE% fade in'><button class='close' data-dismiss='alert'>&#215</button><i class='fa-fw fa %ICON%'></i><strong>%TITLE%</strong> %MENSAJE%</div>";

    $(divMensaje).empty();

    if (tipoMensaje == 'error') {
        alertType = 'alert-danger';
        alertIcon = 'fa-times';
        alertTitle = 'Error!';
    }
    else if (tipoMensaje == 'warning') {
        alertType = 'alert-warning';
        alertIcon = 'fa-warning';
        alertTitle = 'Advertencia';
    }
    else if (tipoMensaje == 'success') {
        alertType = 'alert-success';
        alertIcon = 'fa-check';
        alertTitle = 'Exito';
    }
    else if (tipoMensaje == 'info') {
        alertType = 'alert-info';
        alertIcon = 'fa-info';
        alertTitle = 'Info!';
    };

    alertHtml = alertHtml.replace("%TYPE%", alertType);
    alertHtml = alertHtml.replace("%ICON%", alertIcon);
    alertHtml = alertHtml.replace("%TITLE%", alertTitle);
    alertHtml = alertHtml.replace("%MENSAJE%", msgEtiqueta);

    $(divMensaje).html(alertHtml).show(0).delay(milisegundos).hide('slow');
  };
};

function mostrarMensajePopup(tipoMensaje, msgContenido) {
    var alertIcon = 'fa-check';
    var alertColor = 'txt-color-yellow';
    var alertTitle = 'Info!';
    var alertHtml = "<i class='fa %ICON% %COLOR%'></i> Mensaje <span class='%COLOR%'><strong>%TITLE%</strong></span>";

    if (tipoMensaje == 'error') {
        alertIcon = 'fa-times';
        alertColor = 'txt-color-red';
        alertTitle = 'Error!';
    }
    else if (tipoMensaje == 'warning') {
        alertIcon = 'fa-warning';
        alertColor = 'txt-color-yellow';
        alertTitle = 'Advertencia';
    }
    else if (tipoMensaje == 'success') {
        alertIcon = 'fa-check';
        alertColor = 'txt-color-green';
        alertTitle = 'Exitoso';
    }
    else if (tipoMensaje == 'info') {
        alertColor = 'txt-color-blue';
        alertIcon = 'fa-info';
        alertTitle = 'Informativo';
    };

    alertHtml = alertHtml.replace("%ICON%", alertIcon);
    alertHtml = alertHtml.replace("%COLOR%", alertColor);
    alertHtml = alertHtml.replace("%TITLE%", alertTitle);

    $.SmartMessageBox({
        title: alertHtml,
        content: msgContenido,
        buttons: '[Aceptar]'
    });
};

function mostrarConfirm(tipoMensaje, btnPostback) {
    var titulo = '';
    var mensaje = '';

    if (tipoMensaje == 'eliminar') {
        titulo = '<i class="fa fa-trash-o txt-color-orangeDark"></i> Eliminando Registro!';
        mensaje = 'Esta seguro que desea eliminar este registro?';
    }
    else if (tipoMensaje == 'activar') {
        titulo = '<i class="fa fa-check txt-color-greenDark"></i> Activando Registro!';
        mensaje = 'Esta seguro que desea activar este registro?';
    }
    else if (tipoMensaje == 'inactivar') {
        titulo = '<i class="fa fa-times txt-color-red"></i> Inactivando Registro!';
        mensaje = 'Esta seguro que desea inactivar este registro?';
    };

    $.SmartMessageBox({
        title: titulo,
        content: mensaje,
        buttons: '[No][Si]'
    }, function (ButtonPressed) {
        if (ButtonPressed === "Si") {
            $(btnPostback).click();
        }
    });
};

// ***************** INICIAR DATA TABLE  *******************************************************************

function iniDataTable(grvDatos) {

};

// ***************** VALIDACIONES GENERALES *******************************************************************
//No permite Caracteres especiales
function txtValidarCaracteres(txtCampo) {
    //Caracteres validos
    var rgexp = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890-_';
    var string = txtCampo.val();
    var resultado = '';

    for (var i = 0; i < string.length; i++) {
        if (rgexp.indexOf(string.charAt(i)) != -1)
            resultado += string.charAt(i);
    }

    $(txtCampo).val(resultado);
};

//Eliminar espacios al inicio y al final
function txtQuitarEspaciosIniFin(txtCampo) {
    $(txtCampo).val(resultado.trim());
};
// ***************** activacion de estilos base ******************************************************************
$(function() {
         $('.isDatepicker').datepicker({
                dateFormat: 'dd/mm/yy',
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true,
                todayHighlight: true,
                zIndexOffset: 999999999 
         })
            .on('click', function (ev) {
                    $('.isDatepicker').css("z-index", "999999999");
            }).data('datepicker')         
            ;
});

 
function formatDatetoMySql(strdate) {
   // dd/mm/yyyy to yyyy-mm-dd
   var parts = strdate.split("/");
   return [ parts[2],  parts[1],  parts[0]].join('-');
}

function formatDateMySqltoInput(strdate) {
   // yyyy-mm-dd   to dd/mm/yyyy  
   var parts = strdate.split("-");
   return [ parts[2],  parts[1],  parts[0]].join('/');

}

function utils_Ajax (service, metodo,arrObj, divMensaje, fn_response, formid,milisegundosOk,milisegundosErr)
{      
            var parametros = {
                            "op" : metodo,
                            "Data": JSON.stringify(arrObj)
            };
            $.ajax({
                            data:  parametros,
                            url:   service,
                            type:  'post',
                            beforeSend: function () {
                            },
                            success:  function (response) {
                                objData =JSON.parse(response);
                                switch (objData.estado) 
                                {
                                        case -2:
                                        case -1:
                                        case 0:
                                            mostrarMensajeEtiqueta(divMensaje, "error", "Operación fallida ->" + objData.mensaje,milisegundosErr);
                                            break;
                                        default:
                                            mostrarMensajeEtiqueta(divMensaje, "success", "Operación realizada con éxito",milisegundosOk);
                                            fn_response(objData, formid);
                                            break;
                                }                                
                            }
            });    
}