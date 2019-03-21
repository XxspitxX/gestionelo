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
		{       
			case "getCalendarAllInfo":
				getCalendarAllInfo($obj);
				break;
			case "UpdateEventNew":
				UpdateEventNew($obj);
				break;
			case "UpdateEventTime":
				UpdateEventTime($obj);
				break;
			case "getTareaId":
				getTareaId($obj);
				break;
            case "addTarea":
				addTarea($obj);
				break;
			case "updateTarea":
				updateTarea($obj);
				break;

			case "getCalendarEquipo":
				getCalendarEquipo($obj);
				break;
			case "getCalendarUsuario":
				getCalendarUsuario($obj);
				break;                            
                            }
	} 

//************************ Detalle servicios prestados
//************************ Funcion
function UpdateEventNew($arrObj) {
		$dat = new CapaDatos;
		$datos = $dat->execute_array("tarea", "Tarea_InsertDate", $arrObj, "Ejecución");
                echo json_encode($datos);
}

function UpdateEventTime($arrObj) {
		$dat = new CapaDatos;
		$datos = $dat->execute_array("tarea", "Tarea_UpdateDate", $arrObj, "Ejecución");
                echo json_encode($datos);
}

function getTareaId($arrObj) {
     $dat = new CapaDatos;
     $datos = $dat->execute_array("tarea", "Tarea_Get", $arrObj, "Consulta");
     utils_debugfile( "getTareaId ", json_encode($datos));
     echo json_encode($datos);
  }


function addTarea($arrObj) {
                //ejecución del insert
		$dat = new CapaDatos;
		$datos = $dat->execute_array("tarea", "Tarea_Insert", $arrObj, "Ejecución");

                //Traer listado de residentes
		$datos = $dat->execute_array("tarea", "Tarea_GetAllEmpresa", $arrObj, "Consulta");
        echo json_encode($datos);                
}

function updateTarea($arrObj) {
		$dat = new CapaDatos;
		$datos = $dat->execute_array("tarea", "Tarea_Update", $arrObj, "Ejecución");

                //Traer listado de residentes
		$datos = $dat->execute_array("tarea", "Tarea_GetAllEmpresa", $arrObj, "Consulta");
        echo json_encode($datos);
}

function getCalendarAllInfo($arrObj) {
    //retornará todas las secciones para el cargar pagina, en una nueva estructura compuesta
     $IdEstado = $arrObj[0]->{'Value'};

    $resultado=array
            (
                    "Estado" => -1,
                    "mensaje" => "(sin mensaje)",
                    "detalle" => "",
                    "info" => "",
                    "datosEquipo" => array(),
                    "datosUsuario" => array(),
                    "datosEstado" => array(),
                    "datosTipo" => array(),
                    "datosTareas" => array()
            );
    $dat = new CapaDatos;
    if ($IdEstado ==0)
    {    
            $parametros= array  ();
            $parametros[0] = (object) ["Id" => "IdEntidad", "Value" => 9];     
        //traer listado de estados              
            $datos = $dat->execute_array("Estado", "Estado_GetAllEntidad", $parametros, "Consulta");
            $resultado["datosEstado"] = $datos["datos"];
            if (count($resultado["datosEstado"]) >0 )
            {
                $IdEstado = $resultado["datosEstado"][0]["IdEstado"];
            };        

          //traer listado de tipo de tareas
            $listaTipo = $dat->execute_array("tipos", "Tipo_GetAllEntidad", $parametros, "Consulta");
            $resultado["datosTipo"] = $listaTipo["datos"];
            
        //traer listado de equipos
            $listaEquipos = $dat->execute_array("Equipo", "Equipo_GetAllUsuario", $parametros, "Consulta");
            $resultado["datosEquipo"] = $listaEquipos["datos"];
            $IdEquipo = -1;
            if (count($listaEquipos["datos"]) >0 )
            {
                $IdEquipo = $listaEquipos["datos"][0]["IdEquipo"];
            };             

          //traer listado de usuarios. 
            $parametros= array  ();
            $parametros[0] = (object) ["Id" => "EsObservador", "Value" => 0];  //Excluya los observadores (valor = 1)
            $parametros[1] = (object) ["Id" => "IdEquipo", "Value" => $IdEquipo]; //jco. leer idequipo
            $listaUsuarios = $dat->execute_array("Usuario", "Usuario_GetAllEmpresaEquipo", $parametros, "Consulta"); 
            $resultado["datosUsuario"] = $listaUsuarios["datos"]; 
            $IdResponsable =-1;
            if (count($listaUsuarios["datos"]) >0 )
            {
                $IdResponsable = $listaUsuarios["datos"][0]["IdUsuario"];
            };            
    }
    //traer listado de tareas
        $parametros= array  ();
        $parametros[0] = (object) ["Id" => "EsFinal", "Value" => 0];
        $parametros[1] = (object) ["Id" => "IdResponsable", "Value" => $IdResponsable];
        $parametros[2] = (object) ["Id" => "IdObjeto", "Value" => 0];
        $parametros[3] = (object) ["Id" => "IdObjetoTipo", "Value" => '$IdEstado'];
        $parametros[4] = (object) ["Id" => "IdEquipo", "Value" => $IdEquipo];
        $parametros[5] = (object) ["Id" => "EsObservador", "Value" => 0]; //0

        $datos = $dat->execute_array("tarea", "Tarea_GetAllFilters", $parametros, "Consulta");
        $resultado["Estado"] = $datos["Estado"];
        $resultado["mensaje"] = $datos["mensaje"];
        $resultado["detalle"] = $datos["detalle"];
        $resultado["datosTareas"] = $datos["datos"];
        
        
        echo json_encode($resultado);
 
  }
  
function getCalendarEquipo($arrObj) {
    $resultado=array
            (
                    "Estado" => -1,
                    "mensaje" => "(sin mensaje)",
                    "detalle" => "",
                    "info" => "",
                    "datosUsuario" => array(),
                    "datosTareas" => array()
            );
    
    $IdEquipo = $arrObj[0]->{'Value'};
    $dat = new CapaDatos;
    //traer listado de usuarios. 
      $parametros= array  ();
      $parametros[0] = (object) ["Id" => "EsObservador", "Value" => 0];  //Excluya los observadores (valor = 1)
      $parametros[1] = (object) ["Id" => "IdEquipo", "Value" => $IdEquipo]; 
      $listaUsuarios = $dat->execute_array("Usuario", "Usuario_GetAllEmpresaEquipo", $parametros, "Consulta"); 
      $resultado["datosUsuario"] = $listaUsuarios["datos"];    
      $IdResponsable = -1;
        if (count($listaUsuarios["datos"]) >0 )
        {
            $IdResponsable = $listaUsuarios["datos"][0]["IdUsuario"];
        }; 
            

    //traer listado de tareas
        $parametros= array  ();
        $parametros[0] = (object) ["Id" => "EsFinal", "Value" => 0];
        $parametros[1] = (object) ["Id" => "IdResponsable", "Value" => $IdResponsable];
        $parametros[2] = (object) ["Id" => "IdObjeto", "Value" => 0];
        $parametros[3] = (object) ["Id" => "IdObjetoTipo", "Value" => '$IdEstado'];
        $parametros[4] = (object) ["Id" => "IdEquipo", "Value" => $IdEquipo];
        $parametros[5] = (object) ["Id" => "EsObservador", "Value" => 0]; //0

        $datos = $dat->execute_array("tarea", "Tarea_GetAllFilters", $parametros, "Consulta");
        $resultado["Estado"] = $datos["Estado"];
        $resultado["mensaje"] = $datos["mensaje"];
        $resultado["detalle"] = $datos["detalle"];
        $resultado["datosTareas"] = $datos["datos"];
        
        utils_debugfile( "getCalendarEquipo: ", json_encode($resultado));
        echo json_encode($resultado);
 
  }

function getCalendarUsuario($arrObj) {
    $resultado=array
            (
                    "Estado" => -1,
                    "mensaje" => "(sin mensaje)",
                    "detalle" => "",
                    "info" => "",
                    "datosTareas" => array()
            );
    
    $IdResponsable = $arrObj[0]->{'Value'};
    $IdEquipo = $arrObj[1]->{'Value'};
    $dat = new CapaDatos;

    //traer listado de tareas
        $parametros= array  ();
        $parametros[0] = (object) ["Id" => "EsFinal", "Value" => 0];
        $parametros[1] = (object) ["Id" => "IdResponsable", "Value" => $IdResponsable];
        $parametros[2] = (object) ["Id" => "IdObjeto", "Value" => 0];
        $parametros[3] = (object) ["Id" => "IdObjetoTipo", "Value" => '0'];
        $parametros[4] = (object) ["Id" => "IdEquipo", "Value" => $IdEquipo];
        $parametros[5] = (object) ["Id" => "EsObservador", "Value" => 0]; //0

        $datos = $dat->execute_array("tarea", "Tarea_GetAllFilters", $parametros, "Consulta");
        $resultado["Estado"] = $datos["Estado"];
        $resultado["mensaje"] = $datos["mensaje"];
        $resultado["detalle"] = $datos["detalle"];
        $resultado["datosTareas"] = $datos["datos"];
        
        utils_debugfile( "resultadojson2", json_encode($resultado));
        echo json_encode($resultado);
 
  }
?>