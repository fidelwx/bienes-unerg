<?php
require_once('config/db.php');
require_once('config/conexion.php');
extract($_GET);

function eliminar_producto($id_producto){
	global $con;
	
	$query= "DELETE FROM products WHERE products.id_producto=$id_producto";
	$eliminar=mysqli_query($con, $query);

	if ($eliminar){
				// header("location: ../");
			// header("location:javascript://history.go(-1)");
			header('Location:http://127.0.0.1/JHONNY/bienes-unerg/stock2.php');
			return 1;
	} else {

		return 0;
	}
		
}

eliminar_producto($id_producto);

 ?>