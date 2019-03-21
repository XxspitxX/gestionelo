<?php 

if (session_id()) session_destroy();
require_once'../4_Utils/Utils.php'; 
require_once'../3_Datos/CapaDatos.php';
	

switch ($_POST['op']) 
	{
		case "Auth":
			Auth();
			break;
		case 1:
			break;
	
	}
	

//************************ Detalle servicios prestados
//************************ Funcion
function Auth() {
        
     $obj = json_decode($_POST['Data']);

		$dat = new CapaDatos;
			
		$datos = $dat->execute_array("seguridad", "Auth", $obj, "Consulta");
 	
		    
		if ($datos["estado"] == 1)  //Consulta en la capa de datos no dió error
		{
			if ( count($datos["datos"]) == 0)	//No hubo coincidencia usuario/clave
			{
				$datos["estado"] = -2;
				$datos["mensaje"] = "Usuario y clave no coinciden...";
			}

			else
			{
		
				if ( ! session_id() ) session_start();
				$_SESSION['Email'] = $datos["datos"][0]["email"];
				$_SESSION["IdUserNet"] = $datos["datos"][0]["Id"];
				$_SESSION["IdEmpresa"] = $datos["datos"][0]["IdEmpresa"];
				$_SESSION["IdUsuario"] = $datos["datos"][0]["IdUsuario"];
				$_SESSION["Alias"] = $datos["datos"][0]["Alias"];
				$_SESSION["NivelAdmin"] = $datos["datos"][0]["NivelAdmin"];
			};
		};
		
		echo json_encode($datos);
 }
//************************ Funcion

?>