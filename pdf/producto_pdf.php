<?php
	/*-------------------------
	Autor: Direccion de informatica Unerg 2018
	Jhonny Perez;
	Fidel Herrera;
	---------------------------*/
	require '../config/db.php';
	require '../config/conexion.php';
	extract($_GET);
	$id_producto = $id;
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
						 <table class='table table-bordered'>
						<tr>
							<th class='text-center' colspan=5 > HISTORIAL DE PRODUCTO </th>
						</tr>
						<tr>
							<td>Fecha</td>
							<td>Hora</td>
							<td>Descripción</td>
							<td>Codigo</td>
							<td class='text-center'>Total</td>
						</tr>
						<?php
							$query=mysqli_query($con,"select * from historial where id_producto='$id_producto'");
							while ($row=mysqli_fetch_array($query)){
								?>
						<tr>
							<td><?php echo date('d/m/Y', strtotime($row['fecha']));?></td>
							<td><?php echo date('H:i:s', strtotime($row['fecha']));?></td>
							<td><?php echo $row['nota'];?></td>
							<td><?php echo $row['referencia'];?></td>
							<td class='text-center'><?php echo number_format($row['cantidad']);?></td>
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