<?php
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
  		padding: 10px;
  	}

  	td{
  		padding: 10px;
  	}

  </style>
  <body>
	<div class="panel panel-info">
		<div class="panel-heading">
			<h4>Bienes - UNERG</h4>
		</div>
		<div class="panel-body">
			<form class="form-horizontal" role="form" id="datos">
				<div class="row">
					<div class='col-md-12'>
						</select>
						<table id="example" class="container">
							<thead>
								<tr>
									<th>Codigo</th>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                    <th>Costo</th>
                                    <th>Categoria</th>
                                    <th>Fecha de Adquisicion</th>
								</tr>
							</thead>
							<tbody>
							<?php
							$query_producto=mysqli_query($con,"select * from products order by id_producto");
							while($rw=mysqli_fetch_array($query_producto)):
							?>
								<tr>
									<td><?php echo $rw['codigo_producto'];?></td>
									<td><?php echo $rw['nombre_producto'];?></td>
									<td><?php echo $rw['stock'];?></td>
                                    <td><?php echo $rw['precio_producto'];?></td>
                                    <td><?php echo $rw['id_categoria'];?></td>
									<td><?php echo $rw['date_added'];?></td>
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