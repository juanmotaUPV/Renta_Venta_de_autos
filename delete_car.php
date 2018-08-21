<?php
	if(!isset($_GET["idAutos"])) exit();// si idAutos esta vavcia, se sale
	$id = $_GET["idAutos"];
	include_once "database.php";
	// query donde se elimina el auto
	$sentencia ="DELETE FROM Autos WHERE idAutos = $id;";
	$resultado = $BD->query($sentencia);
	// mensaje de confirmacion
	if($resultado == TRUE) echo "Deleted";
	else echo "Something went wrong";
?>