<?php
	// datos de la base de datos
	$pass = "database";
	$user = "id6868474_root";
	$BDName = "id6868474_rentosell_a_car";
	try{
		$BD = new PDO('mysql:host=localhost;dbname=' . $BDName, $user, $pass);// conexion a la base de datos
	}catch (Exception $e){
		echo "Something went wrong with the database: " . $e->getMessage();
	}
?>