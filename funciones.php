<?php 

	function conexion(){
		try {
			$con = new PDO("mysql: host=localhost; dbname=imagenes", 'root', '');
			return $con;
		} catch (Exception $e) {
			return $e -> getMessage();
		}
	}

?>