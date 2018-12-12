<?php
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	include("../funciones.php");

	$id_product = intval($_POST['prod_id']);
	// Jhonny modificando, prueba
		$sql1 = "SELECT * FROM products WHERE products.id_producto = $id_product";
		$query1 = mysqli_query($con,$sql1);
		$row1=mysqli_fetch_array($query1);
	// Jhonny modificando, prueba

	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['mod_id'])) {
           $errors[] = "ID vacío";
        }else if (empty($_POST['mod_codigo'])) {
           $errors[] = "Código vacío";
        } else if (empty($_POST['mod_nombre'])){
			$errors[] = "Nombre del producto vacío";
		} else if ($_POST['mod_categoria']==""){
			$errors[] = "Selecciona la categoría del producto";
		} else if (empty($_POST['mod_precio'])){
			$errors[] = "Precio de venta vacío";
		} else if (
			!empty($_POST['mod_id']) &&
			!empty($_POST['mod_codigo']) &&
			!empty($_POST['mod_nombre']) &&
			$_POST['mod_categoria']!="" &&
			!empty($_POST['mod_precio'])
		){
		/* Connect To Database*/

		// escaping, additionally removing everything that could be (html/javascript-) code
		$codigo=mysqli_real_escape_string($con,(strip_tags($_POST["mod_codigo"],ENT_QUOTES)));
		$nombre=mysqli_real_escape_string($con,(strip_tags($_POST["mod_nombre"],ENT_QUOTES)));
		$categoria=intval($_POST['mod_categoria']);
		$stock=intval($_POST['mod_stock']);
		$precio_venta=floatval($_POST['mod_precio']);
		$id_producto=$_POST['mod_id'];
		
		$sql="UPDATE products SET codigo_producto='".$codigo."', nombre_producto='".$nombre."', id_categoria='".$categoria."', precio_producto='".$precio_venta."', stock='".$stock."' WHERE id_producto='".$id_producto."'";

		$query_update = mysqli_query($con,$sql);

		// Jhonny modificando, prueba

		$sql2 = "SELECT id_producto, nombre_categoria, products.id_categoria as c FROM products JOIN categorias ON  products.id_categoria =  categorias.id_categoria WHERE id_producto = $id_producto";
		$query2 = mysqli_query($con,$sql2);
		$row2=mysqli_fetch_array($query2);


		$departamento_actual = $row1['id_categoria'];
		$departamento_nuevo =  $categoria;

		if ($departamento_nuevo!=$departamento_actual) {

			$quantity=intval($_POST['mod_stock']);
			$reference=mysqli_real_escape_string($con,(strip_tags($_POST["mod_codigo"],ENT_QUOTES)));
			$id_producto=$_POST['mod_id'];
			$user_id=$_SESSION['user_id'];
			$firstname=$_SESSION['firstname'];
			$departamenton = $row2['nombre_categoria'];
			$nota="$firstname cambio el departamento a $departamenton";
			$fecha=date("Y-m-d H:i:s");

			guardar_historial($id_producto,$user_id,$fecha,$nota,$reference,$quantity);	
		}
		// Jhonny modificando, prueba

			if ($query_update){
				$messages[] = "Producto ha sido actualizado satisfactoriamente.";
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
			}
			
		} else {
			$errors []= "Error desconocido.";
		}
		
		if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>