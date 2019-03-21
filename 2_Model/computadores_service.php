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
		{       //computador
			case "getcomputadoresAllInfo":
				getAllInfo($obj);
				break;
			case "addcomputadores":
				add($obj);
				break;
			case "editcomputadores":
				edit($obj);
				break;
			case "deletecomputadores":
				delete($obj);
				break;
			case "updatecomputadores":
				update($obj);
				break;
			case "getIdcomputadores":
				getId($obj);
				break;
		}
	} 

//************************ Detalle servicios prestados
//************************ Funcion

function add($arrObj) {
                //ejecución del insert
		$dat = new CapaDatos;
		$datos = $dat->execute_array("computadores", "computadores_Insert", $arrObj, "Ejecución");

                //Traer listado de residentes
		$datos = $dat->execute_array("computadores", "computadores_GetAll", $arrObj, "Consulta");
        echo json_encode($datos);                
}

function getId($arrObj) {
     $dat = new CapaDatos;
      //traer 1 residente
    $datos = $dat->execute_array("computadores", "computadores_Get", $arrObj, "Consulta");
    //utils_debugfile( "CapaDatos2", json_encode($datos));
        echo json_encode($datos);
  }
  
function getAllInfo($arrObj) {
    $dat = new CapaDatos;
    //retornará todas las secciones para el cargar pagina, en una nueva estructura compuesta
     $datos = $dat->execute_array("computadores", "computadores_GetAll", $arrObj, "Consulta");
      echo json_encode($datos);
   }

   
function update($arrObj) {
	$dat = new CapaDatos;
	$datos = $dat->execute_array("computadores", "computadores_Update", $arrObj, "Ejecución");

	//Traer listado de residentes
	$datos = $dat->execute_array("computadores", "computadores_GetAll", $arrObj, "Consulta");
echo json_encode($datos);
}

function delete($arrObj) {
	//ejecución del insert
	$dat = new CapaDatos;
	$datos = $dat->execute_array("computadores", "computadores_Delete", $arrObj, "Ejecución");

	//Traer listado
	$datos = $dat->execute_array("computadores", "computadores_GetAll", $arrObj, "Consulta");
echo json_encode($datos);                
}
?>