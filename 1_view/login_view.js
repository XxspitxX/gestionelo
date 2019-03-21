// ==========================VALIDACIONES ================================= -->	
	runAllForms();

	$(function() {
		// Validation
		$("#login-form").validate({
			// Rules for form validation
			rules : {
				email : {
					required : true,
					email : true
				},
				password : {
					required : true,
					minlength : 3,
					maxlength : 20
				}
			},

			// Messages for form validation
			messages : {
				email : {
					required : 'Por favor ingrese su Email',
					email : 'Por favor ingrese un Email valido'
				},
				password : {
					required : 'Por favor ingrese su Contraseña'
				}
			},

			// Do not change code below
			errorPlacement : function(error, element) {
				error.insertAfter(element.parent());
			}
		});
	});
	
// ==========================ACCIONES DEL FORMULARIO ========================== -->	
	function fn_login_form_submit()
	{
		fn_login_validarContrasena();
	}
	

// ==========================AJAX ============================================= -->	
	function fn_login_validarContrasena(){
		

            var arrObj = [{Id: "email", Value: $('#email').val()}, {Id: "contrasena", Value: $('#password').val()}];

            var parametros = {
                            "op" : "Auth",
                            "Data": JSON.stringify(arrObj)
            };
            
		$.ajax({
				data:  parametros,
				url:   '../2_Model/login_service.php',
				type:  'post',
				beforeSend: function () {
						fn_Auth_beforeSend();
				},
				success:  function (response) {
					fn_Auth_response(JSON.parse(response));
				}
		});
		
}	
// ==========================VISUALIZACIÓN RESULTADOS ============================ -->	

	function fn_Auth_beforeSend()
	{   
		$("#divMensajeLogin").html("Procesando, espere por favor...");
	}
	
	function fn_Auth_response(objData)
	{	
		switch (objData.estado) 
			{
				case -2:
				case -1:
				case 0:
					$("#divMensajeLogin").html(objData.mensaje);
					break;
					
				default:
					 window.location.replace("../index.php#ajax/dashboard-social.php");
					break;
			}
	}
	
