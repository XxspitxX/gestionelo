<?php 
if (!session_id()) session_start();
require_once("3_Datos/CapaDatos.php");
require_once("4_Utils/Utils.php");

		$breadcrumbs = array(
			"Home" => APP_URL
		);
		 utils_debugfile( "index_menu", "llamado a index_menu");

		$parametros = array ();
		$dat = new CapaDatos;
		$datos = $dat->execute_array("menu", "GetParents", $parametros, "Consulta");
		$menu = array();
		 utils_debugfile( "index_menu", $datos["estado"]);
		if ($datos["estado"] == 1)  //Consulta en la capa de datos no dió error
		{
			$Cantidad = count($datos["datos"]);
			
			$page_nav = "";
			$PrimeraVez = true;
			foreach ($datos["datos"] as $item => $value) 
			{
				$menu[$value["Nombre"]] = 
							array (
								"title" => $value["Nombre"],
								"icon" => $value["Icono"],					
								"url" => $value["Url"]
								
									);
			};
		};
		$page_nav = $menu;


?>