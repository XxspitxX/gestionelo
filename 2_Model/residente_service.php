<?php 
if (!session_id()) {session_start();}
require_once("../3_Datos/CapaDatos.php");
require_once("../4_Utils/Utils.php");

$varSeleccion = "";
if (isset($_POST['op'])){ 
	//llamada como servicio
	$varSeleccion =$_POST['op']; 
        $obj = json_decode($_POST['Data']);
         
	switch ($varSeleccion) 
		{       //Residente
			case "getResidenteAllInfo":
				getResidenteAllInfo($obj);
				break;
			case "addResidente":
				addResidente($obj);
				break;
			case "updateResidente":
				updateResidente($obj);
				break;
			case "getResidenteId":
				getResidenteId($obj);
				break;
                          //Vehiculo
			case "addVehiculo":
				addVehiculo($obj);
				break;
			case "updateVehiculo":
				updateVehiculo($obj);
				break;
			case "getVehiculoId":
				getVehiculoId($obj);
				break;
                          //Personal Apoyo
			case "addPersonal":
				addPersonal($obj);
				break;
			case "updatePersonal":
				updatePersonal($obj);
				break;
			case "getPersonalId":
				getPersonalId($obj);
				break; 
                          //Mascota
			case "addMascota":
				addMascota($obj);
				break;
			case "updateMascota":
				updateMascota($obj);
				break;
			case "getMascotaId":
				getMascotaId($obj);
				break;                              
		}
	} 



//************************ Detalle servicios prestados
//************************ Funcion

function addResidente($arrObj) {
                //ejecución del insert
		$dat = new CapaDatos;
		$datos = $dat->execute_array("activoResidente", "Residente_Insert", $arrObj, "Ejecución");

                //Traer listado de residentes
		$datos = $dat->execute_array("activoResidente", "Residente_GetAllActivo", $arrObj, "Consulta");
        echo json_encode($datos);                
}

function updateResidente($arrObj) {
		$dat = new CapaDatos;
		$datos = $dat->execute_array("activoResidente", "Residente_Update", $arrObj, "Ejecución");

                //Traer listado de residentes
		$datos = $dat->execute_array("activoResidente", "Residente_GetAllActivo", $arrObj, "Consulta");
        echo json_encode($datos);
}

function getResidenteId($arrObj) {
     $dat = new CapaDatos;
      //traer 1 residente
    $datos = $dat->execute_array("activoResidente", "Residente_Get", $arrObj, "Consulta");
    //utils_debugfile( "CapaDatos2", json_encode($datos));
        echo json_encode($datos);
  }
  
function getResidenteAllInfo($arrObj) {
    //retornará todas las secciones para el cargar pagina, en una nueva estructura compuesta
     $idActivo = $arrObj[0]->{'Value'};
    
    $resultado=array
            (
                    "estado" => -1,
                    "mensaje" => "(sin mensaje)",
                    "detalle" => "",
                    "info" => "",
                    "datosA" => array(),
                    "datosR" => array(),
                    "datosV" => array(),
                    "datosP" => array(),
                    "datosM" => array(),
                    "ListaTipoVehiculo" => array() ,
                    "ListaTipoApoyo" => array()        
            );
    $dat = new CapaDatos;
                
    if ($idActivo == 0)
    {
      //traer litado de activos
		$datos = $dat->execute_array("activo", "GetAllUsuario", $arrObj, "Consulta");
                $resultado["estado"] = $datos["estado"];
                $resultado["mensaje"] = $datos["mensaje"];
                $resultado["detalle"] = $datos["detalle"];
                $resultado["datosA"] = $datos["datos"];
                //elegir primer activo para recuperar su resultado
                if (count($resultado["datosA"]) >0 )
                {
                    $idActivo = $resultado["datosA"][0]["IdActivo"];
                    $resultado["info"] = "Cargar Activos";
                }
        //traer listado de tipo de vehiculos
                $parametrosV= array  ();
                $parametrosV[0] = (object) ["Id" => "IdEntidad", "Value" => 11];                
                $listaTipoV = $dat->execute_array("tipos", "Tipo_GetAllEntidad", $parametrosV, "Consulta");
                $resultado["ListaTipoVehiculo"] = $listaTipoV["datos"];
                
        //traer listado de tipo de mascotas
                $parametrosP= array  ();
                $parametrosP[0] = (object) ["Id" => "IdEntidad", "Value" => 12];                
                $listaTipoP = $dat->execute_array("tipos", "Tipo_GetAllEntidad", $parametrosP, "Consulta");   
                $resultado["ListaTipoApoyo"] = $listaTipoP["datos"];
    };
    
     if ($idActivo != 0)
     {
                $parametros= array  ();
                $parametros[0] = (object) ["Id" => "IdActivo", "Value" => $idActivo];
                
                //Traer listado de residentes
		$datos = $dat->execute_array("activoResidente", "Residente_GetAllActivo", $parametros, "Consulta");
                $resultado["estado"] = $datos["estado"];
                $resultado["mensaje"] = $datos["mensaje"];
                $resultado["detalle"] = $datos["detalle"];
                $resultado["datosR"] = $datos["datos"];

                //Traer listado de vehiculos
		$datos = $dat->execute_array("activoResidente", "Vehiculo_GetAllActivo", $parametros, "Consulta");
                $resultado["estado"] = $datos["estado"];
                $resultado["mensaje"] = $datos["mensaje"];
                $resultado["detalle"] = $datos["detalle"];
                $resultado["datosV"] = $datos["datos"];

                //Traer listado de Personal de apoyo
		$datos = $dat->execute_array("activoResidente", "Personal_GetAllActivo", $parametros, "Consulta");
                $resultado["estado"] = $datos["estado"];
                $resultado["mensaje"] = $datos["mensaje"];
                $resultado["detalle"] = $datos["detalle"];
                $resultado["datosP"] = $datos["datos"];

                //Traer listado de mascotas
		$datos = $dat->execute_array("activoResidente", "Mascota_GetAllActivo", $parametros, "Consulta");
                $resultado["estado"] = $datos["estado"];
                $resultado["mensaje"] = $datos["mensaje"];
                $resultado["detalle"] = $datos["detalle"];
                $resultado["datosM"] = $datos["datos"];
     }

    echo json_encode($resultado);
 
  }
//Vehiculo *********************************************************************************
function addVehiculo($arrObj) {
                //ejecución del insert
		$dat = new CapaDatos;
		$datos = $dat->execute_array("activoResidente", "Vehiculo_Insert", $arrObj, "Ejecución");

                //Traer listado de residentes
		$datos = $dat->execute_array("activoResidente", "Vehiculo_GetAllActivo", $arrObj, "Consulta");
        echo json_encode($datos);                
}

function updateVehiculo($arrObj) {
		$dat = new CapaDatos;
		$datos = $dat->execute_array("activoResidente", "Vehiculo_Update", $arrObj, "Ejecución");

                //Traer listado de residentes
		$datos = $dat->execute_array("activoResidente", "Vehiculo_GetAllActivo", $arrObj, "Consulta");
        echo json_encode($datos);
}

function getVehiculoId($arrObj) {
     $dat = new CapaDatos;
      //traer 1 residente
    $datos = $dat->execute_array("activoResidente", "Vehiculo_Get", $arrObj, "Consulta");
    //utils_debugfile( "CapaDatos2", json_encode($datos));
        echo json_encode($datos);
  }  

  //Personal *********************************************************************************
function addPersonal($arrObj) {
                //ejecución del insert
		$dat = new CapaDatos;
		$datos = $dat->execute_array("activoResidente", "Personal_Insert", $arrObj, "Ejecución");

                //Traer listado de residentes
		$datos = $dat->execute_array("activoResidente", "Personal_GetAllActivo", $arrObj, "Consulta");
        echo json_encode($datos);                
}

function updatePersonal($arrObj) {
		$dat = new CapaDatos;
		$datos = $dat->execute_array("activoResidente", "Personal_Update", $arrObj, "Ejecución");

                //Traer listado de residentes
		$datos = $dat->execute_array("activoResidente", "Personal_GetAllActivo", $arrObj, "Consulta");
        echo json_encode($datos);
}

function getPersonalId($arrObj) {
     $dat = new CapaDatos;
      //traer 1 residente
    $datos = $dat->execute_array("activoResidente", "Personal_Get", $arrObj, "Consulta");
    //utils_debugfile( "CapaDatos2", json_encode($datos));
        echo json_encode($datos);
  }  
  
   //Mascota *********************************************************************************
function addMascota($arrObj) {
                //ejecución del insert
		$dat = new CapaDatos;
		$datos = $dat->execute_array("activoResidente", "Mascota_Insert", $arrObj, "Ejecución");

                //Traer listado de residentes
		$datos = $dat->execute_array("activoResidente", "Mascota_GetAllActivo", $arrObj, "Consulta");
        echo json_encode($datos);                
}

function updateMascota($arrObj) {
		$dat = new CapaDatos;
		$datos = $dat->execute_array("activoResidente", "Mascota_Update", $arrObj, "Ejecución");

                //Traer listado de residentes
		$datos = $dat->execute_array("activoResidente", "Mascota_GetAllActivo", $arrObj, "Consulta");
        echo json_encode($datos);
}

function getMascotaId($arrObj) {
     $dat = new CapaDatos;
      //traer 1 residente
    $datos = $dat->execute_array("activoResidente", "Mascota_Get", $arrObj, "Consulta");
    //utils_debugfile( "CapaDatos2", json_encode($datos));
        echo json_encode($datos);
  } 
?>