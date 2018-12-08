<?php
	/*-------------------------
	Autor: Direccion de informatica Unerg 2018
	Jhonny Perez;
	Fidel Herrera;
	---------------------------*/
	require '../config/db.php';
	require '../config/conexion.php';
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
  	<!-- <link rel="stylesheet" href="DataTables/datatables.css"/> -->
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
						</select>
						<table id="example" class="container" style="font-size: 7">
							<thead>
								<tr>
									<th>Codigo</th>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                    <th>Costo</th>
                                    <th>Departamento</th>
                                    <th>Fecha</th>
								</tr>
							</thead>
							<tbody>
							<?php
							$query_producto=mysqli_query($con,"SELECT codigo_producto, id_producto, nombre_producto, stock, precio_producto, categorias.nombre_categoria as categoria, products.datea FROM products INNER JOIN categorias ON products.id_categoria = categorias.id_categoria");
							while($rw=mysqli_fetch_array($query_producto)):
							?>
								<tr>
									<td><?php echo $rw['codigo_producto'];?></td>
									<td><?php echo $rw['nombre_producto'];?></td>
									<td><?php echo $rw['stock'];?></td>
                                    <td><?php echo $rw['precio_producto'];?></td>
                                    <td><?php echo $rw['categoria'];?></td>
									<td><?php echo date('d/m/Y', strtotime($rw['datea']));?>
									</td>
								</tr>
							<?php
							endwhile;
							?>
							</tbody>
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