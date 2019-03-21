<?php 
		session_start();
		require_once "Paises/php/conexion.php";
	$conexion=conexion();
	$idper=$_POST['valor'];

	$_SESSION['consulta']=$idper;

	echo $idper;

 ?>