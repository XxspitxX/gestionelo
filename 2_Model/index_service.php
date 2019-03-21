<?php 
if (!session_id()) session_start();
//require_once("3_Datos/CapaDatos.php");
//require_once("4_Utils/Utils.php");
require_once'../4_Utils/Utils.php'; 
require_once'../3_Datos/CapaDatos.php';
$varSeleccion = "";
if (isset($_POST['op'])){ 
	//llamada como servicio
	$varSeleccion =$_POST['op']; 
	switch ($varSeleccion) 
		{
			case "getEmpresas":
				getEmpresas();
				break;
			case "getMenu":
				getMenues();
				break;
			
		}
	} 



//************************ Detalle servicios prestados
//************************ Funcion

function getEmpresas() {
		$parametros = array (); //tomará los parámeros de la sesión, reemplazando @@
		$dat = new CapaDatos;
		$datos = $dat->execute_array("empresa", "GetAllEmail", $parametros, "Consulta");
		$datos["info"] = $_SESSION['IdEmpresa'];
		echo json_encode($datos);
}

//************************ Funcion
function getMenues() {
                //solo guarda la variable de sessión y luego al recargar la página se carga el menú con base a la variable de sesión con la nueva IdEmpresa
		$_SESSION['IdEmpresa'] = $_POST['IdEmpresa'];
		$datos=array
			(
				"estado" =>  1,
				"mensaje" => "(sin datos N/A)",
				"detalle" => "",
				"datos" => array()
			);
		echo json_encode($datos);
}
?>