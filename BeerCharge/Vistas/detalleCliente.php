<?php namespace Vistas;

?>
<section style="margin-bottom: 50px">
		<div class="container">
        	<div class="row centered-form">
		        <div class="col-md-10 col-md-offset-1">
		        	<div class="panel panel-default">
		        		<div class="panel-heading">
					    		<h3 class="panel-title">Cliente: <?php echo $idCliente?> <small></small></h3>
					 	</div>
					 			<table class="table table-inverse"  border="1">
					<thead>
						<tr>
							<th width="100px">Apellido</th>
							<th width="100px">Nombre</th>
							<th width="100px">Direccion</th>
							<th width="100px">Localidad</th>
							<th width="100px">Provincia</th>
							<th width="50px">Telefono</th>
							<th width="50px">Email</th>
							
						</tr>
					</thead>
					<tbody>
					<?php
					if(!empty($cliente)){ 	
					?>
					<tr>
						<td><?php echo $cliente['apellido'] ; ?></td>
						<td><?php echo $cliente['nombre'] ; ?></td>
						<td><?php echo $cliente['direccion'] ; ?></td>
						<td><?php echo $cliente['localidad'] ; ?></td>
						<td><?php echo $cliente['provincia'] ; ?></td>
						<td><?php echo $cliente['telefono'] ; ?></td>
						<td><?php echo $cliente['email'] ; ?></td>
					</tr>
					<?php
					}
					?>
					</tbody>
					</table>
					<div class="row centered-form col-md-2 col-md-offset-5">
    					<a href="<?php echo DIR . 'pedido/listarPedidos';?>"><input type="button" class="btn btn-primary btn-block" style="color: white" value="Volver"></a>
					</div>
			    	</div>
		    	</div>
		    </div>
    	</div>
</section>

