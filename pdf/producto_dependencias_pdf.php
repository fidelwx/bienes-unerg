<?php
	/*-------------------------
	Autor: Direccion de informatica Unerg 2018
	Jhonny Perez;
	Fidel Herrera;
	---------------------------*/
	require '../config/db.php';
	require '../config/conexion.php';
	extract($_GET);
	$id_dependencia = $id;
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
  	<link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/custom.css">
  </head>
  <style>
  	th{
  		padding: 1px 1px 4px 4px;
  	}

  	td{
  		padding: 1px 1px 4px 4px;
  	}

  </style>
  <body>
	<div class="panel panel-info">
		<div class="panel-heading">
			<p align="center" style="color: black; font-size: 10;">
				Universidad Romulo Gallegos<br>
				Bienes Nacionales no Depreciados por Dependencia
			</p>
		</div>
		<div class="panel-body">
			<form class="form-horizontal" role="form" id="datos">
				<div class="row">
					<div class='col-md-12'>
						<?php 
							$sql = "SELECT * FROM categorias WHERE id_categoria = $id_dependencia";

							$query=mysqli_query($con,$sql);
							$row_dep = mysqli_fetch_array($query);
						 ?>
						<p class="text-center"><?php echo strtoupper($row_dep['nombre_categoria']); ?></p>
						 <table class='table table-bordered'>
						<tr>
							<td>Codigo</td>
							<td>Nombre</td>
							<td>Dependencia</td>
							<td class='text-center'>Cantidad</td>
							<td>Fecha</td>
							<td>Hora</td>
						</tr>
						<?php
							$sql = "SELECT nombre_categoria, nombre_producto, codigo_producto, products.date_added, stock, datea FROM products JOIN categorias ON categorias.id_categoria = products.id_categoria WHERE categorias.id_categoria = $id_dependencia";

							$query=mysqli_query($con,$sql);
							while ($row=mysqli_fetch_array($query)){
						?>
						<tr>
							<td><?php echo $row['codigo_producto'];?></td>
							<td><?php echo $row['nombre_producto'];?></td>
							<td><?php echo $row['nombre_categoria']; ?></td>
							<td class='text-center'><?php echo number_format($row['stock']);?></td>
							<td><?php echo date('d/m/Y', strtotime($row['date_added']));?></td>
							<td><?php echo date('H:i:s', strtotime($row['date_added']));?></td>
						</tr>		
								<?php
							}
						?>
					 </table>
					</div>
				</div>
				<hr>
			</form>
		  </div>
		</div>
    </div>
    <!-- <script src="DataTables/datatables.min.js"></script> -->
  	<script src="js/bootstrap.js" type="text/javascript"></script>
  	<!-- <script src="js/jquery.min.js"></script> -->
  </body>
</html>