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
			case "getMejoraAllInfo":
				getMejoraAllInfo($obj);
				break;
			case "addMejora":
				addMejora($obj);
				break;
			case "updateMejora":
				updateMejora($obj);
				break;
			case "getMejoraId":
				getMejoraId($obj);
				break;
		}
	} 

//************************ Detalle servicios prestados
//************************ Funcion

function addMejora($arrObj) {
                //ejecución del insert
		$dat = new CapaDatos;
		$datos = $dat->execute_array("Mejora", "Mejora_Insert", $arrObj, "Ejecucion");

                //Traer listado de residentes
		$datos = $dat->execute_array("Mejora", "Mejora_GetAllEmpresa", $arrObj, "Consulta");
        echo json_encode($datos);                
}

function updateMejora($arrObj) {
		$dat = new CapaDatos;
		$datos = $dat->execute_array("Mejora", "Mejora_Update", $arrObj, "Ejecucion");

                //Traer listado de residentes
		$datos = $dat->execute_array("Mejora", "Mejora_GetAllEmpresa", $arrObj, "Consulta");
        echo json_encode($datos);
}

function getMejoraId($arrObj) {
     $dat = new CapaDatos;
      //traer 1 residente
    $datos = $dat->execute_array("Mejora", "Mejora_Get", $arrObj, "Consulta");
    //utils_debugfile( "CapaDatos2", json_encode($datos));
        echo json_encode($datos);
  }
  
function getMejoraAllInfo($arrObj) {
    //retornará todas las secciones para el cargar pagina, en una nueva estructura compuesta
     $IdEstado = $arrObj[0]->{'Value'};

    $resultado=array
            (
                    "Estado" => -1,
                    "mensaje" => "(sin mensaje)",
                    "detalle" => "",
                    "info" => "",
                    "datosEstados" => array(),
                    "datosTipos" => array(),
                    "datosUsuarios" => array(),
                    "datosMejoras" => array()
    
            );
    $dat = new CapaDatos;
     
    if ($IdEstado ==0)
    {
        $parametros= array  ();
        $parametros[0] = (object) ["Id" => "IdEntidad", "Value" => 3];     
        //traer litado de estados              
            $datos = $dat->execute_array("Estado", "Estado_GetAllEntidad", $parametros, "Consulta");
            $resultado["datosEstados"] = $datos["datos"];
            if (count($resultado["datosEstados"]) >0 )
            {
                $IdEstado = $resultado["datosEstados"][0]["IdEstado"];
            };        

          //traer listado de tipo de mejoras
            $listaTipo = $dat->execute_array("tipos", "Tipo_GetAllEntidad", $parametros, "Consulta");
            $resultado["datosTipos"] = $listaTipo["datos"];
            
          //traer listado de usuarios
             $listaUsuarios = $dat->execute_array("Usuario", "UsuarioReporta_GetAllEmpresa", $parametros, "Consulta");
            $resultado["datosUsuarios"] = $listaUsuarios["datos"];           
    }
    //traer listado de mejoras
        $parametros= array  ();
        $parametros[0] = (object) ["Id" => "IdEstado", "Value" => $IdEstado];

        $datos = $dat->execute_array("Mejora", "Mejora_GetAllEmpresa", $parametros, "Consulta");
        $resultado["Estado"] = $datos["Estado"];
        $resultado["mensaje"] = $datos["mensaje"];
        $resultado["detalle"] = $datos["detalle"];
        $resultado["datosMejoras"] = $datos["datos"];

        echo json_encode($resultado);
 
  }
?>