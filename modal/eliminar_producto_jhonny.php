	<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-trash'></i> Eliminar producto?</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="eliminar_producto_jhonny" name="editar_producto">
			<label for="codigo">Codigo: </label>
			<input class="form-control" type="text" readonly=”readonly” id="codigo" name="" value="<?=$row['codigo_producto']?>">		 
			<label for="nombre">Nombre: </label>
			<input class="form-control" type="text" readonly=”readonly” id="nombre" name="" value="<?=$row['nombre_producto']?>">
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			<a class="btn btn-primary" href="<?='eliminar_producto_jhonny_2.php?id_producto=',$row['id_producto']?>"  id="eliminar_datos">Eliminar</a>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	<?php
		}
	?>