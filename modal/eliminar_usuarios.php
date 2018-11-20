	<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-trash'></i> Eliminar Usuario?</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="eliminar_producto_jhonny" name="editar_producto">
			<label for="codigo">Usuario: </label>
			<input class="form-control" type="text" readonly=”readonly” id="codigo" name="" value="<?php echo $fullname; ?>">
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			<a class="btn btn-primary" href="<?='ajax/eliminar_usuario.php?id_usuario=',$user_id?>"  id="eliminar_datos">Eliminar</a>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	<?php
		}
	?>