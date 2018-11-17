<?php
require_once('config/db.php');
require_once('config/conexion.php');
require_once('config/constante.php');
extract($_GET);

function eliminar_producto($id_producto){
	global $con;
	
	$query= "DELETE FROM products WHERE products.id_producto=$id_producto";
	$eliminar=mysqli_query($con, $query);

	if ($eliminar){
				header('Location:'.$index.'stock.php');
			return 1;
	} else {
		return 0;
	}
		
}

eliminar_producto($id_producto);

 ?>