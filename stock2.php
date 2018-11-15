<?php
	/*-------------------------
	Autor: Obed Alvarado
	Web: obedalvarado.pw
	Mail: info@obedalvarado.pw
	---------------------------*/
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }

	/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
	
	$active_productos="active";
	$title="Inventario";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("head.php");?>
  </head>
  <body>
	<?php
	include("navbar.php");
	?>
	
    <div class="container">
	<div class="panel panel-info">
		<div class="panel-heading">
		    <div class="btn-group pull-right">
				<button type='button' class="btn btn-info" data-toggle="modal" data-target="#nuevoProducto"><span class="glyphicon glyphicon-plus" ></span> Agregar</button>
			</div>
			<h4><i class='glyphicon glyphicon-search'></i> Consultar inventario</h4>
		</div>
		<div class="panel-body">
		
			
			
			<?php
			include("modal/registro_productos.php");
			include("modal/editar_productos.php");
			?>
			<form class="form-horizontal" role="form" id="datos">
				
						
				<div class="row">
				<div class="col-md-1"></div>					
					<div class='col-md-10 center'>
						</select>
						<table id="example">
							<thead>
								<tr>
									<th>ID</th>
									<th>Codigo</th>
									<th>Nombre</th>
									<th>Cantidad</th>
									<th>Fecha de Adquisicion</th>
									<th>Precio</th>
									<th>Categoria</th>
									<th>Acción</th>
								</tr>
							</thead>
							<tbody>
							<?php 
							$query_producto=mysqli_query($con,"select * from products order by id_producto");
							while($rw=mysqli_fetch_array($query_producto)):
							?>
								<tr>
									<td><?php echo $rw['id_producto'];?></td>
									<td><?php echo $rw['codigo_producto'];?></td>
									<td><?php echo $rw['nombre_producto'];?></td>
									<td><?php echo $rw['stock'];?></td>
									<td><?php echo $rw['date_added'];?></td>
									<td><?php echo $rw['precio_producto'];?></td>
									<td><?php echo $rw['id_categoria'];?></td>
									<td>
										<a href="<?='producto2.php?id=',$rw['id_producto'];?>">
											Ver
										</a>
											
									</td>
								</tr>
							<?php
							endwhile;
							?>
							</tbody>
						</table>
					</div>
				<div class="col-md-1"></div>					
					<div class='col-md-12 text-center'>
						<span id="loader"></span>
					</div>
				</div>
				<hr>
			</form>
		  </div>
		</div>
		 
	</div>
	<hr>
	<?php
	include("footer.php");
	?>
	<script type="text/javascript" src="js/productos.js"></script>
  </body>
</html>
<script>
function eliminar (id){
		var q= $("#q").val();
		var id_categoria= $("#id_categoria").val();
		$.ajax({
			type: "GET",
			url: "./ajax/buscar_productos.php",
			data: "id="+id,"q":q+"id_categoria="+id_categoria,
			 beforeSend: function(objeto){
				$("#resultados").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados").html(datos);
			load(1);
			}
		});
	}
		
	$(document).ready(function(){
			
		<?php 
			if (isset($_GET['delete'])){
		?>
			eliminar(<?php echo intval($_GET['delete'])?>);	
		<?php
			}
		?>	
	});
		
$( "#guardar_producto" ).submit(function( event ) {
  $('#guardar_datos').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/nuevo_producto.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax_productos").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax_productos").html(datos);
			$('#guardar_datos').attr("disabled", false);
			load(1);
		  }
	});
  event.preventDefault();
})

</script>