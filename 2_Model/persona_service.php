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
			case "getAllInfo":
				getAllInfo($obj);
				break;
			case "add":
				add($obj);
				break;
			case "delete":
				delete($obj);
				break;				
			case "update":
				update($obj);
				break;
			case "getId":
				getId($obj);
				break;
		}
	} 


function add($arrObj) {
		//ejecución del insert
		$dat = new CapaDatos;
		$datos = $dat->execute_array("zpersona", "persona_Insert", $arrObj, "Ejecución");

                //Traer listado
		$datos = $dat->execute_array("zpersona", "persona_GetAll", $arrObj, "Consulta");
        echo json_encode($datos);                
}


function update($arrObj) {
		$dat = new CapaDatos;
		$datos = $dat->execute_array("zpersona", "persona_Update", $arrObj, "Ejecución");

                //Traer listado de residentes
		$datos = $dat->execute_array("zpersona", "persona_GetAll", $arrObj, "Consulta");
        echo json_encode($datos);
}

function getId($arrObj) {
     $dat = new CapaDatos;
      //traer 1 residente
    $datos = $dat->execute_array("zpersona", "persona_Get", $arrObj, "Consulta");
    //utils_debugfile( "CapaDatos2", json_encode($datos));
        echo json_encode($datos);
  }
  
function getAllInfo($arrObj) {
    $dat = new CapaDatos;
    //retornará todas las secciones para el cargar pagina, en una nueva estructura compuesta
     $datos = $dat->execute_array("zpersona", "persona_GetAll", $arrObj, "Consulta");
      echo json_encode($datos);
   }

function delete($arrObj) {
	//ejecución del insert
	$dat = new CapaDatos;
	$datos = $dat->execute_array("zpersona", "persona_Delete", $arrObj, "Ejecución");

	//Traer listado
	$datos = $dat->execute_array("zpersona", "persona_GetAll", $arrObj, "Consulta");
echo json_encode($datos);                
}
?>