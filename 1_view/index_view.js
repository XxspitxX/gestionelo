// ==========================VALIDACIONES ================================= -->	

	
// ==========================ACCIONES DEL FORMULARIO ========================== -->	
	function fn_lstrEmpresaMaster_load()
	{
		fn_lstrEmpresaMaster_ajax();
	}
	
// ==========================AJAX ============================================= -->	
	function fn_lstrEmpresaMaster_ajax(){
		var parametros = {
				"op" : "getEmpresas"
		};
		$.ajax({
				data:  parametros,
				url:   '2_Model/index_service.php',
				type:  'post',
				beforeSend: function () {
				},
				success:  function (response) {
					fn_getEmpresas_response(JSON.parse(response));
				}
		});
	}
	function fn_cambiarMenuMaster_ajax(IdEmpresa){
	  var parametros = {
				"op" : "getMenu",
				"IdEmpresa" : IdEmpresa
		};
		$.ajax({
				data:  parametros,
				url:   '2_Model/index_service.php',
				type:  'post',
				beforeSend: function () {
				},
				success:  function (response) {
					fn_getMenu_response(JSON.parse(response));
				}
		});		
	}	
// ==========================VISUALIZACIÓN RESULTADOS ============================ -->	

	function fn_getEmpresas_response(objData)
	{	
		switch (objData.estado) 
			{
				case -2:
				case -1:
				case 0:
					//$("#divMensajeMaster").html(objData.mensaje);
					alert("Error");
					break;
				default:
					utils_pintar_listahtml("#lstrEmpresaMaster", objData.datos, "IdEmpresa", "Nombre", objData.info);
					break;
			}
	}

	function fn_getMenu_response(objData)
	{	
		switch (objData.estado) 
			{
				case -2:
				case -1:
				case 0:
					//$("#divMensajeMaster").html(objData.mensaje);
					alert("Error");
					break;
				default:
					location.reload();
					break;
			}
	}	
	

