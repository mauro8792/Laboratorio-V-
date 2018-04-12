<?php namespace Vistas;

?>
<section style="margin-bottom: 50px">
		<div class="container">
        	<div class="row centered-form">
		        <div class="col-md-10 col-md-offset-1">
		        	<div class="panel panel-default">
		        		<div class="panel-heading">
					    		<h3 class="panel-title">Listado de Empleados <small></small></h3>
					 	</div>
					 			<table class="table table-inverse"  border="1">
					<thead>
						<tr>
							<th width="10px">legajo</th>
							<th width="100px">Apellido</th>
							<th width="100px">Nombre</th>
							<th width="50px">Dni</th>
							<th width="100px">Direccion</th>
							<th width="50px">Telefono</th>
							<th width="50px">Email</th>
							<th width="50px">Rol</th>
							<th width="5px"></th>
							<th width="5px"></th>
						</tr>
					</thead>
					<tbody>
					<?php
					if(!empty($personal)){ 
					foreach ($personal as $i) {
						
					?>
					<tr>
						<td><?php echo $i['legajo'] ; ?></td>
						<td><?php echo $i['apellido'] ; ?></td>
						<td><?php echo $i['nombre'] ; ?></td>
						<td><?php echo $i['dni'] ; ?></td>
						<td><?php echo $i['direccion'] ; ?></td>
						<td><?php echo $i['telefono'] ; ?></td>
						<td><?php echo $i['email'] ; ?></td>
						<td><?php echo $i['rol'] ; ?></td>
						<td><a href="<?php echo DIR .'admin/modificarPersonal/'?><?php echo $i['legajo']; ?>" class="btn btn-primary btn-block" style="color: white" role="button">Editar</a></td>
						<td align="center"><a href="<?php echo DIR .'admin/eliminarPersonal/'?><?php echo $i['legajo'] ; ?>" class="btn btn-primary btn-block" style="color: white" role="button">Eliminar</a></td>
					</tr>
					<?php
						}
					}
					?>
					</tbody>
				</table>
			    	</div>
		    	</div>
		    </div>
    	</div>
</section>

