<?php
require_once('config/db.php');
require_once('config/conexion.php');
require_once('config/constante.php');
extract($_GET);

function eliminar_producto($id_producto){
	global $con;

	$query=mysqli_query($con,"select * from products where id_producto='$id_producto'");
	$row=mysqli_fetch_array($query);
	$filename= "img/foto_producto/".$row['img'];
	unlink($filename); #Elimina foto en el servidor
 
	$query= "DELETE FROM products WHERE products.id_producto=$id_producto";
	$eliminar=mysqli_query($con, $query); #Elimina producto en la base de datos

	if ($eliminar){
				header('Location:'.$index.'stock.php');
			return 1;
	} else {
		return 0;
	}
		
}

eliminar_producto($id_producto);

 ?>